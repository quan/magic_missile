<?php

	session_start();
	session_unset();

	include('../db.php');

	if (isset($_POST['save'])) {
		$_SESSION['char_level'] = $_POST['char_level'];
		header('location: race.php');
	}
	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>New Character | Magic Missile</title>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!--JS-->
	<script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>

	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="character.css" />
	<style>
		.content{
			flex-direction: column;
			justify-content: top;
			align-items: center;
		}
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

			<div class="title">
				Choose your Character's Level
			</div>

			<div class="subtitle">
				If you are making a new character choose Level 1. If you know what you are doing choose a different Level.
			</div>
			<br></br>

				<select id="level" style="width: 100px;">
					<option></option>
					<option>1</option>
				</select>
				


		</div>
	</div>
	<div class="bottom">
		<?php include('progress.php'); ?>
	</div>
</div>
	<div style="padding: 10px 0 0 0">
		<?php $level=1; include('footer.php'); ?>
	</div>
	<?php mysql_close($con); ?>
</body>

<script>
	$('.progressitem').hide();
	
	$('#NEXT').css('position', 'absolute');
	$('#NEXT').css('left', '756px');

	$('#level').change(function(){
		$('#NEXT').show();
		$('#char_level').val($(this).val());
	});
</script>


</html>


