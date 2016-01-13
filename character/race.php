<?php

	session_start();

	if (isset($_POST['save'])) {
		$_SESSION['char_race'] = $_POST['char_race'];
		header('location: class.php');
	}

	include('../db.php');
	
	$query_race = "SELECT * FROM race ORDER BY `race_name` ASC";
	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Select Race | Magic Missile</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!--JS-->
	<script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>

	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="character.css" />
	<style>
		.sidebutton{
			background-image: url("../img/side_button.png");
			background-size: 200px 50px;
			background-repeat: no-repeat;
			width: 200px;
			height:50px;
			border: 0px groove #666;
			font-size: 1.75em;
			font-family: 'Kaushan Script', cursive;
			margin: 10px 0 10px -23px;
			cursor: pointer;
			position: relative;
		}
		.names{
			font-size: 0.9em;
			text-align: center;
			width: 158px;
			height: 38px;
			position: absolute;
			right: 5px;
			top: 7px;
		}
		.activity{
			display: none;
		}
		.left{
			width:177px;
			padding: 80px 0 0 0;
		}
		.right{
			width:723px;
			height:100%;
			padding:0;
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
			<div class="left">

				<?php
					$race_results = mysql_query($query_race);
					while ($row = mysql_fetch_assoc($race_results)) {
						echo '<div class="sidebutton" id="';
						echo mb_strtolower(str_replace('-','',$row['race_name'])) . '" />';
						echo '<div class="names">';
						echo $row['race_name'] . '</div></div>';
					}
				?>

			</div>
			
			<div class="right fade1">

				<?php 
					include('race/default.php');
					$race_results = mysql_query($query_race);
					while ($row = mysql_fetch_assoc($race_results)) {
						include("race/" . mb_strtolower(str_replace('-','',$row['race_name'])) . ".php");
					}
				?>

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
	<?php mysql_close($con); ?>
</body>
	<script>
		//Shows the default info page
		$('#default_content').show();
		//Disables Next Button
		$('#next_button').prop('disabled', true);
		$('#next_button').attr('type', 'hidden');

		//
		//Side Button Click Funcions
		$(".sidebutton").click(function(){
			//Glowing
			$(".sidebutton").removeClass("shadowLight");
			$(this).toggleClass("shadowLight");
			//Display relavant div
			var chosen = "#".concat($(this).attr('id')).concat('_content');
			$(".activity").hide();
			$(chosen).fadeIn(750);
			$('#char_race').val($(this).find('.names').html());
			//Next Button
			$('#next_button').attr('type', 'submit');
			$('#next_button').css("color", "white");
			$('#next_button').css("cursor", "pointer");
			$('#next_button').prop('disabled', false);
		});

	</script>

	<?php
		if (isset($_SESSION['char_race'])) {
			$race = strtolower($_SESSION['char_race']);
			echo '<script>
					//Glowing
					$("#' . $race . '").toggleClass("shadowLight");
					//Display relavant div
					$(".activity").hide();
					$("#' . $race . '_content").fadeIn(750);
					$("#char_race").val($("#' . $race . '").find(".names").html());
					//Next Button
					$("#next_button").css("color", "white");
					$("#next_button").css("cursor", "pointer");
					$("#next_button").prop("disabled", false);
					</script>';
		}
	?>


</html>


