<?php
	//Joins the PHP Session
	session_start();
	
	//Sets Character Level permanently to 1.
	//This is the ONLY INSTANCE of this variable!!!
	$_SESSION['char_level'] = 1;

	//Sets column name of table equal to chosen Class
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
<!--HTML-->
<!--Main Display Window-->
<!--Outermost containment div-->
<div style="width: 100%; height: 100%; display: flex; flex-direction: column;" oncontextmenu="return false;">
	<!--Title div-->
	<div class="title" style="margin: -20px 0 -20px 0;">
		Please Upgrade Your Skills.
	</div>
	<!--Skillpoints sentence-->
	<p style="font-size: 1.5em;">
	<?php
		echo 'As ';
		echo ($_SESSION['char_race'] == "Elf" ? 'an ' : 'a ');
		echo $_SESSION['char_race'] . ' ' . $_SESSION['char_class'];
		echo ' with ' . $_SESSION['char_int'] . ' intelligence, you have ';
		$skillPoints = skillpoints($_SESSION['char_class'],$_SESSION['char_race'],$_SESSION['char_int']);
		echo '<span id="remain">' . ($skillPoints < 4 ? 4 : $skillPoints) . '</span>';
		echo ' skill points to allocate.';
	?>
	</p>
	<!--Class Skills Viewer Area-->
	<div class="pod" id="class_skills_viewer">
	<?php
		//PHP to list each skill from Query
		while ($row = mysql_fetch_assoc($skill_results)) {
			echo '<div class="pea1" id="' . mb_strtolower($row['skill_name']) . '" title="' . $row['skill_name'] . '">
					<div class="skill_name">' . $row['skill_name'] . '</div>
					<div class="points">
						0
					</div>
				</div>';
		}
	?>
	</div>
	<!--Cross Class Skills Viewer Area-->
	<div class="pod" id="cross_skills_viewer">
	<?php
		while ($row = mysql_fetch_assoc($cross_results)) {
			echo '<div class="pea2" id="' . mb_strtolower($row['skill_name']) . '" title="' . $row['skill_name'] . '"><div class="skill_name">' . $row['skill_name'] . '</div><div class="points">0</div></div>';
		}
	?>
	</div>

</div>

<div class="button_wrapper">
	<button id="class_skills" class="default">Class Skills</button>
	<button id="cross_skills" class="default">Cross Skills</button>
	<button id="save_skills" class="default">Save Skills</button>
</div>

<style type="text/css">
	.content{
		flex-direction: column;
	}
	.button_wrapper{
		display: flex;
		flex-direction: row;
		justify-content: space-around;
		align-items: center;
		margin: 0 0 15px 0;
		height: 60px;
		width: 100%;
		font-size: 10pt;
	}

	.pod{
		border: 5px solid #000;
		background: tan;
		width: 800px;
		height: 375px;
		margin: auto;
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
		overflow-y: scroll; 
	}
	.pea1{
		background-color: #fff;
		border: 3px solid #000;
		width: 120px;
		height: 50px;
		margin: 10px;
		text-align: center;
		position: relative;
	}
	.pea2{
		background-color: #fff;
		border: 3px solid #000;
		width: 120px;
		height: 50px;
		margin: 10px;
		text-align: center;
		position: relative;
	}
	.points{
		color: #060;
		font-size: 2em;
		width: 120px;
		height: 40px;
		position: absolute;
		top: 10px;
		left: 0;
		text-align: center;
		opacity: 0.7;
		-webkit-touch-callout: none;
    	-webkit-user-select: none;
    	-khtml-user-select: none;
    	-moz-user-select: none;
    	-ms-user-select: none;
    	user-select: none;
	}
</style>

<script type="text/javascript">
	<?php
		echo 'var $points_max = ' . $_SESSION['char_level'] . ' + 3;';
		?>
	$('.points').hide();
	$('#cross_skills_viewer').hide();
	//Show Class Skills
	$('#class_skills').hover(function(){
		$(this).css("color", "white");
	},function(){
		$(this).css("color", "black");
	});
	$('#class_skills').click(function(e){
		$('.default').css("color","#000");
		$(this).toggleClass("shadowLight");
		$('#class_skills_viewer').show();
		$('#cross_skills_viewer').hide();
	});
	//Show Cross Class Skills
	$('#cross_skills').click(function(e){
		$('.default').css("color","#000");
		$(this).css("color", "#666");
		$('#cross_skills_viewer').show();
		$('#class_skills_viewer').hide();
	});


	//Allocate Class Skill Points
	$('.pea1').mousedown(function(event) {
    switch (event.which) {
        case 1:
        	
        	if (parseInt($('#remain').html()) > 1 && $(this).find($('.points')).html() < $points_max) {
        		$(this).find($('.points')).show();
        		$(this).find($('.points')).html(parseInt($(this).find($('.points')).html())+1);
        		$('#remain').html(parseInt($('#remain').html())-1);
        		break;
        	} else {
        		if (parseInt($('#remain').html()) == 1) {
        			$(this).find($('.points')).show();
        			$(this).find($('.points')).html(parseInt($(this).find($('.points')).html())+1);
        			$('#remain').html(parseInt($('#remain').html())-1);
        			$('#next_button').attr('type', 'submit');
        			$('#next_button').prop('disabled', false);
        			$('#next_button').css('color', '#fff');
        			$('#next_button').css('cursor', 'pointer');
        		}
        	};
        case 2:
            break;
        case 3:

        	if( parseInt( $('#remain').html() ) == 0 && parseInt($(this).find('.points').html()) != 0){
        		$('#next_button').attr('type', 'hidden');
        	}

        	if ( parseInt($(this).find($('.points')).html()) > 1 ) {
				$(this).find($('.points')).html(parseInt($(this).find($('.points')).html())-1);
            	$('#remain').html(parseInt($('#remain').html())+1);
            	break;
        	} else {
        		if(parseInt($(this).find($('.points')).html()) == 1){
					$(this).find($('.points')).html(parseInt($(this).find($('.points')).html())-1);
	            	$('#remain').html(parseInt($('#remain').html())+1);
	        		$(this).find($('.points')).hide();
	        		break;
        		} else {
        			break;
        		}
        	};

        default:
            alert('You have a strange Mouse!');
    	}
	});

	//Allocate Cross Class Skill Points
	$('.pea2').mousedown(function(event) {
    switch (event.which) {
        case 1:
        	if (parseInt($('#remain').html()) > 1 && $(this).find($('.points')).html() < Math.floor(($points_max)/2)) {
        		$(this).find($('.points')).show();
        		$(this).find($('.points')).html(parseInt($(this).find($('.points')).html())+1);
        		$('#remain').html(parseInt($('#remain').html())-2);
        		break;
        	} else {
        		break;
        	};
        case 2:
            break;
        case 3:
        	if ( parseInt($(this).find($('.points')).html()) > 1 ) {
				$(this).find($('.points')).html(parseInt($(this).find($('.points')).html())-1);
            	$('#remain').html(parseInt($('#remain').html())+2);
            	break;
        	} else {
        		if(parseInt($(this).find($('.points')).html()) == 1){
					$(this).find($('.points')).html(parseInt($(this).find($('.points')).html())-1);
	            	$('#remain').html(parseInt($('#remain').html())+2);
	        		$(this).find($('.points')).hide();
	        		break;
        		} else {
        			break;
        		}
        	};

        default:
            alert('You have a strange Mouse!');
    	}
	});
	
	//Save Skill Points
	$('#save_skills').click(function(){
		if (parseInt($('#remain').html()) == 0) {
			var skills_list = [];
			$(".pea1").each(function(){
				skills_list.push([$(this).find('.skill_name').html() , $(this).find('.points').html()]);
				$('#char_skill').val(skills_list);
			});
			alert('Done');
			//Next Button
				$('#next_button').css("color", "white");
				$('#next_button').css("cursor", "pointer");
				$('#next_button').prop('disabled', false);
		} else {
			alert('Fix yo shit!');
		};
	});


	
	
</script>
