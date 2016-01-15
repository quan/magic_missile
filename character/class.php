<?php

	session_start();

	if (isset($_POST['save'])) {
		$_SESSION['char_class'] = $_POST['char_class'];
		$_SESSION['char_domain'] = $_POST['char_domain'];
		$_SESSION['char_school'] = $_POST['char_school'];
		$_SESSION['char_alignment'] = $_POST['char_alignment'];
		header('location: suex.php');
	}

	include('../db.php');
	
	$query_class = "SELECT `class_name` FROM class ORDER BY `class_name` ASC";
	$query_class1 = "SELECT `class_name` FROM class ORDER BY `class_name` ASC LIMIT 6";
	$query_class2 = "SELECT `class_name` FROM class ORDER BY `class_name` DESC LIMIT 5";
	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Select Class | Magic Missile</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!--JS-->
	<script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="character.css" />
	<style>
		.leftbutton{
			background-image: url("img/left_button.png");
			background-size: 150px 50px;
			width: 150px;
			height:50px;
			border: 0px groove #666;
			font-size: 1.75em;
			font-family: 'Kaushan Script', cursive;
			margin: 20px 0 20px -23px;
			cursor: pointer;
			position: relative;
		}		
		.rightbutton{
			background-image: url("img/right_button.png");
			background-size: 150px 50px;
			width: 150px;
			height:50px;
			border: 0px groove #666;
			font-size: 1.75em;
			font-family: 'Kaushan Script', cursive;
			margin: 30px -23px 30px 0;
			cursor: pointer;
			position: relative;
		}
		.namesL{
			font-size: 0.9em;
			text-align: center;
			width: 115px;
			height: 38px;
			position: absolute;
			right: 5px;
			top: 7px;
		}		
		.namesR{
			font-size: 0.9em;
			text-align: center;
			width: 115px;
			height: 38px;
			position: absolute;
			left: 5px;
			top: 5px;
		}
		.activity{
			display: none;
		}
		.left{
			width: 127px;
			padding: 90px 0 0 0;
		}
		.center{
			width:646px;
		}
		.right{
			width: 127px;
			padding: 100px 0 0 0;
		}
	</style>
</head>

<body class="noselect">
	<?php $level=1; include('logo.php');?>
	
<div class="board">
	<div class="top">
		<?php include('nav.php'); ?>
	</div>
	<div class="middle">

		<!------------------------------------------Content Wrapper--------------------------------->
		<div class="content">

			<!--Left Panel-->
			<div class="left">

				<?php
					$class_results1 = mysql_query($query_class1);
					while ($row = mysql_fetch_assoc($class_results1)) {
						echo '<div class="leftbutton" id="' . strtolower($row['class_name']) . '" />
								<div class="namesL">' . $row['class_name'] . '</div>
							</div>';
					}
				?>

			</div>

			<!--Center Panel-->
			<div class="center fade1">
				<?php 
					$results = mysql_query($query_class);
					include('class/default.php');
					while ($row = mysql_fetch_assoc($results)) {
						$page = 'class/' . strtolower($row['class_name']) . '.php';
						echo '<div class="activity" id="' . strtolower($row['class_name']) . '_content">';
							include($page);
						echo '</div>';
					}
				?>
			</div>

			<!--Right Panel-->
			<div class="right">
				<?php
					$class_results2 = mysql_query($query_class2);
					while ($row = mysql_fetch_assoc($class_results2)) {
						echo '<div class="rightbutton" id="' . strtolower($row['class_name']) . '" />
								<div class="namesR">' . $row['class_name'] . '</div>
							</div>';
					}
				?>
			</div>

		</div>
		<!---------------------------------------------------------------------------------------------->
	</div>
	<div class="bottom">
		<?php include('progress.php') ?>
	</div>
</div>
	<div style="padding: 10px 0 0 0">
		<?php $level=1; include('footer.php'); ?>
	</div>
	<?php mysql_close($con); ?>
</body>

	<script type="text/javascript">
		$('#char_class').hide();
		$("#default_content").show();
		$('#next_button').attr('type', 'hidden');
		$('#next_button').prop('disabled', true);


		//Buttons on the Left
		$(".leftbutton").click(function(){
			//Glowing
			$(".leftbutton").removeClass("shadowLight");
			$(".rightbutton").removeClass("shadowLight");
			$(this).toggleClass("shadowLight");
			//Display relavant div
			var chosen = "#".concat($(this).attr('id')).concat('_content');
			$(".activity").hide();
			$(chosen).fadeIn(750);
			//Disable Next Button
			$('#next_button').attr('type', 'hidden');
			$('#next_button').prop('disabled', true);
		});		

		//Buttons on the Right
		$(".rightbutton").click(function(){
			//Glowing
			$(".leftbutton").removeClass("shadowLight");
			$(".rightbutton").removeClass("shadowLight");
			$(this).toggleClass("shadowLight");
			//Display relavant div
			var chosen = "#".concat($(this).attr('id')).concat('_content');
			$(".activity").hide();
			$(chosen).fadeIn(750);
			//Disable Next Button
			$('#next_button').attr('type', 'hidden');
			$('#next_button').prop('disabled', true);

		});

	</script>

	<?php
		if (isset($_SESSION['char_class'])) {
			$class = strtolower($_SESSION['char_class']);
			echo '<script>
					//Glowing
					$("#' . $class . '").toggleClass("shadowLight");
					//Display relavant div
					$(".activity").hide();
					$("#' . $class . '_content").fadeIn(750);
					$("#char_class").val($("#' . $class . '").find(".names").html());
					//Next Button
					$("#next_button").css("color", "white");
					$("#next_button").css("cursor", "pointer");
					$("#next_button").prop("disabled", false);
					</script>';
		}
	?>

</html>
