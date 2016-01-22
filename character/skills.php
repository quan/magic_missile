<?php 
	session_start();

	if (isset($_POST['save'])) {
		$_SESSION['char_skill'] = $_POST['char_skill'];
		$_SESSION['char_xskill'] = $_POST['char_xskill'];
		header('location: feats.php');
	}
	
	include('../db.php');

	$col_name = strtolower($_SESSION['char_class']);
	//MYSQL
	//Query for Class Skills and Domain Skills; Alphabetically
	$query_skill = "(SELECT `skill_name` FROM `class_skill` WHERE `$col_name` = 1) UNION (SELECT `skill_name` FROM `domain_skill` WHERE `domain_name` = '$_SESSION[char_domain]') ORDER BY `skill_name` ASC";
	//Query for Cross Class Skills
	$query_cross = "SELECT `skill_name` FROM `class_skill` WHERE `$col_name` = 0 ORDER BY `skill_name` ASC";
	//Results of Queries in a MYSQL array format
	$skill_results = mysql_query($query_skill);
	$cross_results = mysql_query($query_cross);

	//Create function to Calculate number of Skill Points
	function skillpoints($class, $race, $int)
	{	
		//Partition of the classes
		$group1 = array("Cleric", "Fighter", "Paladin", "Sorcerer", "Wizard");
		$group2 = array("Barbarian", "Druid", "Monk");
		$group3 = array("Bard", "Ranger");
		$group4 = array("Rogue");
		//Calculates modifier
		$mod = floor(($int-10)/2);
		//Checks if Human
		$hum = ($race == "Human" ? 1 : 0);
		//Gets Character Level
		$lvl = $_SESSION['char_level'];
		//Assigns the parameter
		if (in_array($class, $group1)) {
			$plus = 2;
		} elseif (in_array($class, $group2)){
			$plus = 4;
		} elseif (in_array($class, $group3)){
			$plus = 6;
		} elseif (in_array($class, $group4)){
			$plus = 8;
		};
		//Returns the # of skill points awarded
		return ($plus + $hum + $mod) * (4 + $lvl -1);
	}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Select Skills | Magic Missile</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!--JS-->
	<script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
	<script>
		//Defines Skill List object
		var skillList = new Object();
		skillList.skills = [];
		skillList.points = [];
		//Defines Cross Class Skill List object
		var xskillList = new Object();
		xskillList.xskills = [];
		xskillList.xpoints = [];
	</script>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="character.css" />
	<style>
		.content{
			flex-direction: column;
			-webkit-flex-direction: column;
		}
		.above{
			height: 175px;
			width: 100%;
			position: relative;

		}
		.below{
			height: 160px;
			width: 100%;
			position: absolute;
			bottom: 0;
			overflow-y: auto;
		}
		.activity{
			display: none;
		}

		#subtitle{
			background-image: url('img/titlecrossbar.png');
			background-size: 100% 75px;
			height: 75px;
			width: 964px;
			margin: 10px 0 0 -32px;
			color: #fff;
			font-size: 2.5em;
			}

		#chains{
			background-image: url('img/chainlink_long.png');
			background-size: 800px 400px;
			width: 800px;
			height: 400px;
			margin: -340px auto 0 auto;
			position: relative;
			z-index: 1;
			pointer-events: none;
		}

		#submenu{
			background-image: url('img/mediumcrossbar.png');
			background-size: 800px 64px;
			width: 800px;
			height: 64px;
			margin: -55px auto 0 auto;
			position: relative;
			display: flex;
			display: -webkit-flex;
			flex-direction: row;
			-webkit-flex-direction: row;
			justify-content: center;	
			-webkit-justify-content: center;	
			align-items: center;
			-webkit-align-items: center;
		}
		.space{
			width: 720px;
			height: 285px;
			margin: auto;
			display: flex;
			display: -webkit-flex;
			flex-direction: row;
			-webkit-flex-direction: row;
		}
		.podL{
			background-color: transparent;
			width: 360px;
			height: 285px;
			display: flex;
			display: -webkit-lex;
			flex-direction: row;
			-webkit-flex-direction: row;
			flex-wrap: wrap;
			-webkit-flex-wrap: wrap;
			justify-content: left;
			-webkit-justify-content: left;
			align-items: center;
			-webkit-align-items: center;
			overflow-y: auto;
		}

		.podR{
			background-color: transparent;
			width: 360px;
			height: 285px;
			display: flex;
			display: -webkit-flex;
			flex-direction: row;
			-webkit-flex-direction: row;
			flex-wrap: wrap;
			-webkit-flex-wrap: wrap;
			justify-content: left;
			-webkit-justify-content: left;
			align-items: center;
			-webkit-align-items: center;
			overflow-y: auto;
		}
		.pea, .peax{
			font-size: 1em;
			width: 100%;
			height: 50px;
			position: relative;
			display: flex;
			display: -webkit-flex;
			flex-direction: row;
			-webkit-flex-direction: row;
			justify-content: space-between;
			-webkit-justify-content: space-between;
		}
		.remain{
			background-image: url('img/totalpoint.png');
			background-size: 150px 60px;
			height: 60px;
			width: 150px;
			margin: 0 20px 0 20px;
			font-size: 1.5em;
			display: flex;
			display: -webkit-flex;
			flex-diretion: row;
			-webkit-flex-diretion: row;
			align-items: center;
			-webkit-align-items: center;
			justify-content: center;
			-webkit-justify-content: center;
		}
		.skill_name{
			font-size: 1.25em;
			margin: 5px;
		}
		.controls{
			display: flex;
			display: -webkit-flex;
			flex-direction: row;
			-webkit-flex-direction: row;
		}
		.points{
			width: 30px;
			height: 30px;
			border-bottom: 2px solid #000;
		}
		.plus, .plusx{
			background-image: url('img/plus.png');
			background-size: 25px 25px;
			background-color: transparent;
			height: 25px;
			width: 25px;
		}	
		.minus, .minusx{
			background-image: url('img/minus.png');
			background-size: 25px 25px;
			background-color: transparent;
			height: 25px;
			width: 25px;
			margin: 5px;
		}
		.skill_lable{
			background-image: url('img/insetbutton.png');
			background-size: 250px 50px;
			height: 50px;
			width: 250px;
			font-size: 2em;
		}
		.writeIn{
			color: red;
		}
	</style>
</head>

<body class="noselect">
	<?php $level=1; include '../common/logo.php';?>
	
<div class="board">
	<div class="top">
		<?php include '../common/nav.php'; ?>
	</div>
	<div class="middle">
		<div class="content">

			<div class="above">
				<div id="subtitle" class="glow1">
					Skills
				</div>
	
				<div class="space">
					<div class="podL">

						<!--This is where the skill go-->

						<?php
							while ($row = mysql_fetch_assoc($skill_results)) {
								echo '<div class="pea">
										<div class="skill_name">' . $row['skill_name'] . '</div>
										<div class="controls">
											<div class="minus"></div>
											<div class="points">0</div>
											<div class="plus"></div>
										</div>
									</div>';
							}
						?>

					</div>

					<div class="podR">

						<?php
							while ($row = mysql_fetch_assoc($cross_results)) {
								echo '<div class="peax">
										<div class="skill_name">' . $row['skill_name'] . '</div>
										<div class="controls">
											<div class="minusx"></div>
											<div class="points">0</div>
											<div class="plusx"></div>
										</div>
									</div>';
							}
						?>

					
					</div>
				</div>

				<div id="chains">
					
				</div>		

				<div id="submenu" class="shadow">
					<div class="skill_lable">Class Skills</div>
					<div class="remain"><?php echo skillpoints($_SESSION['char_class'], $_SESSION['char_race'], $_SESSION['char_int']); ?></div>
					<div class="skill_lable">Cross Class Skills</div>
				</div>
			</div>

			<div class="below">
				<?php include('skills/default.php'); ?>
			</div>
			
		</div>
	</div>
	<div class="bottom">
		<?php include 'progress.php'; ?>
	</div>
</div>

	<div style="padding: 10px 0 0 0;">
		<?php $level=1; include '../common/footer.php'; ?>
	</div>

</body>

<script>
	//Hides the Next Button when page is loaded
	$('#next_button').hide();

	//Sets Class skill max function
	function maxSkill(lvl){
		return lvl + 3;
	}	
	//Sets Croxx Class skill max function
	function maxSkillX(lvl){
		return Math.floor((lvl + 3)/2);
	}

	//Minus button for Class Skills
	$('.minus').click(function(){
		//Subtract 1 from skill, add 1 to remaining
		if ($(this).siblings('.points').html() > 0) {
			$(this).siblings('.points').html(parseInt($(this).siblings('.points').html())-1);
			$('.remain').html(parseInt($('.remain').html())+1);
		} else {
			return false;
		};
		//Trigger event to hide Next Button
		if ($('.remain').html() == 1) {
			$('#next_button').hide();
		};
		updateSkills();
	});

	//Plus button for Class Skills
	$('.plus').click(function(){
		if ($('.remain').html() > 0 && $(this).siblings('.points').html() < maxSkill(<?php echo $_SESSION['char_level']; ?>)) {
			$(this).siblings('.points').html(parseInt($(this).siblings('.points').html())+1);
			$('.remain').html(parseInt($('.remain').html())-1);
		} else {
			return false;
		};
		if ($('.remain').html() == 0) {
			$('#next_button').show();
		};
		updateSkills();
	});	

	//Minus button for Cross Class Skills
	$('.minusx').click(function(){
		if ($(this).siblings('.points').html() > 0) {
			$(this).siblings('.points').html(parseInt($(this).siblings('.points').html())-1);
			$('.remain').html(parseInt($('.remain').html())+2);
		} else {
			return false;
		};
		if ($('.remain').html() > 0) {
			$('#next_button').hide();
		};
		updateXSkills();
	});

	//Plus button for Cross Class Skills
	$('.plusx').click(function(){
		if ($('.remain').html() > 1 && $(this).siblings('.points').html() < maxSkillX(<?php echo $_SESSION['char_level']; ?>)) {
			$(this).siblings('.points').html(parseInt($(this).siblings('.points').html())+1);
			$('.remain').html(parseInt($('.remain').html())-2);
		} else {
			return false;
		};

		if ($(this).parent().siblings(".skill_name").html().indexOf("___") >= 0) {
			var skillKind = $(this).parent().siblings(".skill_name").html().split(" ")[0];
			var input = prompt(skillKind, "?");
			$(this).parent().siblings(".skill_name").html(skillKind + " (" + input + ")");
		};

		if ($('.remain').html() == 0) {
			$('#next_button').show();
		};
		updateXSkills();
	});

	//Finds all the Skills which have a fill in the blank
	var writeIn = $(".pea:contains('___')").find('.skill_name');
	//Turns these Skills red
	writeIn.addClass('writeIn');
	//Makes Skills clickable and prompts user to fill in the blank
	writeIn.click(function(){
		var skillKind = $(this).html().split(" ")[0];
		var input = prompt(skillKind, "?");
		$(this).html(skillKind + " (" + input + ")");
		$(this).removeClass('writeIn');
	});

	//Creates JSON array of Class skills and points
	
	function updateSkills() {
		for (var i = 0; i < $('.pea').length; i++) {
			skillList.skills[i] = $('.pea').eq(i).find('.skill_name').html();
			skillList.points[i] = $('.pea').eq(i).find('.points').html();
		}
		console.log(skillList);
	}

	function updateXSkills(){
		for (var k = 0; k < $('.peax').length; k++) {
			xskillList.xskills[k] = $('.peax').eq(k).find('.skill_name').html();
			xskillList.xpoints[k] = $('.peax').eq(k).find('.points').html();
		}
		console.log(xskillList);
	}

	$('#next_button').click(function(){
		$('#char_skill').val(JSON.stringify(skillList));
		$('#char_xskill').val(JSON.stringify(xskillList));
	});

</script>

</html>
