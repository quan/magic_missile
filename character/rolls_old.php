<?php 

	session_start();

	if (isset($_POST['save'])) {
		$_SESSION['char_str'] = $_POST['char_str'];
		$_SESSION['char_wis'] = $_POST['char_wis'];
		$_SESSION['char_int'] = $_POST['char_int'];
		$_SESSION['char_cha'] = $_POST['char_cha'];
		$_SESSION['char_dex'] = $_POST['char_dex'];
		$_SESSION['char_con'] = $_POST['char_con'];
		header('location: skills.php');
	}
	
	if(isset($_POST['fourDsix'])){
		$_SESSION['char_roll_type'] = '4D6';

		$_SESSION['counter'] = 0;
		}
	if(isset($_POST['pointbuy'])){
		$_SESSION['char_roll_type'] = 'Point Buy';

		}
	if(isset($_POST['manual'])){
		$_SESSION['char_roll_type'] = 'Manual';

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

		.sidebutton{
			background-image: url("../img/side_button.png");
			background-size: 200px 50px;
			width: 200px;
			height:50px;
			border: 0px groove #666;
			font-size: 1.75em;
			font-family: 'Kaushan Script', cursive;
			padding:0 0 0 25px;
			cursor: pointer;
		}
		.outer_button{
			width: 200px;
			height:50px;
			margin: 50px 0 50px -23px;
		}

		.shadowLight{
			box-shadow: 0px 0px 5px 5px #FFF;
		}
		.left{
			width:177px;
			height: 100%;
		}
		.right{
			position: relative;
			width:723px;
			height:100%;
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

			<div class="left">
				<form method="POST" style="padding: 125px 0 0 0;"> 
					<div class="outer_button" />
							<input type="submit" name="fourDsix" value="4D6 Method" class="sidebutton <?php if ($_SESSION['char_roll_type'] == '4D6') {echo 'shadowLight';} ?>" />
					</div>
					<div class="outer_button" />
							<input type="submit" name="pointbuy" value="Point Buy" class="sidebutton <?php if ($_SESSION['char_roll_type'] == 'Point Buy') {echo 'shadowLight';} ?>" />
					</div>
					<div class="outer_button" />
							<input type="submit" name="manual" value="Manual" class="sidebutton <?php if ($_SESSION['char_roll_type'] == 'Manual') {echo 'shadowLight';} ?>" />
					</div>

				</form>
			</div>
						
			<div class="right fade1">
				<?php 
					if (!isset($_SESSION['char_roll_type'])) {
						include('rolls/default.php');
					}
					if ($_SESSION['char_roll_type']=='4D6') {
						include('rolls/fourDsix.php');
					}
					if ($_SESSION['char_roll_type']=='Point Buy') {
						include('rolls/pointbuy.php');
					}				
					if ($_SESSION['char_roll_type']=='Manual') {
						include('rolls/manual.php');
					}
				?>

			</div>
			
		</div>
	</div>
	<div class="bottom">
		<?php include('progress.php') ?>
	</div>
</div>

	<?php include('footer.php'); ?>

</body>
	<script type="text/javascript">
		$('#next_button').prop('disabled', true);
	</script>
</html>
