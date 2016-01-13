<?php 
	session_start();

	include('../db.php');
	
	if (isset($_POST['save'])) {
		$_SESSION['char_pet'] = $_POST['char_pet'];
		header('location: items.php');
	}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Select Pets | Magic Missile</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!--JS-->
	<script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="character.css" />
	<style>

		.sidebutton{
			background-image: url("../img/side_button.png");
			width: 250px;
			height:50px;
			border: 0px groove #666;
			font-size: 1.75em;
			font-family: 'Kaushan Script', cursive;
			padding:0 0 0 35px;
			cursor: pointer;
		}
		.outer_button{
			width: 250px;
			height:50px;
			margin: 50px 0 50px -23px;
		}

		.shadowLight{
			box-shadow: 0px 0px 5px 5px #FFF;
		}
			
	</style>
</head>

<body>
	<?php $level=1; include('logo.php');?>
	
<div class="board">
	<div class="top">
		<?php include('nav.php'); ?>
	</div>
	<div class="middle">
		<div class="content">
			
			<!--CONTENT HERE-->
			<?php include('pets/default.php'); ?>
			
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
	$('#next_button').attr('type', 'hidden');
	$('#next_button').prop('disabled', true);
</script>
</html>
