<?php 

	session_start();

	if (isset($_POST['save'])) {
		$_SESSION['char_roll_type'] = $_POST['char_roll_type'];
		$_SESSION['char_str'] = $_POST['char_str'];
		$_SESSION['char_wis'] = $_POST['char_wis'];
		$_SESSION['char_int'] = $_POST['char_int'];
		$_SESSION['char_cha'] = $_POST['char_cha'];
		$_SESSION['char_dex'] = $_POST['char_dex'];
		$_SESSION['char_con'] = $_POST['char_con'];
		header('location: skills.php');
	}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Ability Scores | Magic Missile</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!--JS-->
	<script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
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
			height: 425px;
			width: 100%;
			position: relative;
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
			background-image: url('img/chainlink.png');
			background-size: 620px 120px;
			width: 620px;
			height: 120px;
			margin: -55px auto 0 auto;
			position: relative;
			z-index: 1;
			pointer-events: none;
		}

		#nails{
			background-image: url('img/nailheads.png');
			background-size: 620px 120px;
			width: 620px;
			height: 120px;
			margin: -120px auto 0 auto;
			position: relative;
			z-index: 1;
			pointer-events: none;
		}

		#submenu{
			background-image: url('img/smallcrossbar.png');
			background-size: 670px 90px;
			width: 670px;
			height: 90px;
			margin: -65px auto 0 auto;
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

		.rollnav{
			background-image: url('img/navbutton.png');
			background-size: 150px 40px;
			height: 40px;
			width: 150px;
			margin: 0 15px 0 15px;
			font-family: inherit;
			font-size: 1.5em;
			border: 2px solid #000;
		}
	</style>
</head>

<body class="noselect">
	<?php $level=1; include('logo.php');?>
	
<div class="board">
	<div class="top">
		<?php $level=1; include('nav.php'); ?>
	</div>
	<div class="middle">
		<div class="content">

			<div class="above">
				<div id="subtitle" class="glow1">
					Ability Scores
				</div>
				<div id="chains">
					
				</div>				
				<div id="nails">
					
				</div>
				<div id="submenu">
					<button class="rollnav" id="fourDsix_nav">4 D 6 </button>
					<button class="rollnav" id="pointbuy_nav">Point Buy</button>
					<button class="rollnav" id="manual_nav">Manual</button>
				</div>
			</div>

			<div class="below">
				<div class="activity" id="default">
					<?php include('rolls/default.php'); ?>
				</div>				

				<div class="activity" id="fourDsix">
					<?php include('rolls/fourDsix.php'); ?>
				</div>

				<div class="activity" id="pointbuy">
					<?php include('rolls/pointbuy.php'); ?>
				</div>

				<div class="activity" id="manual">
					<?php include('rolls/manual.php'); ?>
				</div>

			</div>

		</div>
	</div>
	<div class="bottom">
		<?php include('progress.php') ?>
	</div>
</div>

	<div style="padding: 10px 0 0 0">
		<?php $level=1; include('footer.php'); ?>
	</div>

</body>
<script>
	$('#default').show();

	
	$('#next_button').attr('type', 'hidden');
	


	$('#fourDsix_nav').click(function(){
		$('.activity').hide();
		$('#fourDsix').show();
		//$('#subtitle').html("Four D-6");
		$('.rollnav').css("color", "#000");
		$(this).css("color", "#FFF");
		$('#char_roll_type').val('4D6');
	});	
	$('#pointbuy_nav').click(function(){
		$('.activity').hide();
		$('#pointbuy').show();
		//$('#subtitle').html("Point Buy");
		$('.rollnav').css("color", "#000");
		$(this).css("color", "#FFF");
		$('#char_roll_type').val('Point Buy');
	});
	$('#manual_nav').click(function(){
		$('.activity').hide();
		$('#manual').show();
		//$('#subtitle').html("Manual");
		$('.rollnav').css("color", "#000");
		$(this).css("color", "#FFF");
		$('#char_roll_type').val('Manual');
	});
</script>
</html>
