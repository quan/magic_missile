<?php 

	include('session.php');

	if(isset($_POST['logout'])){
		header('location: logout.php');
		}
	$error_message = '';
	if(isset($_POST['new_char'])){
		$check_char = "SELECT * FROM user_char WHERE id_username = '$login_session'";
		$results = mysql_query($check_char);
		$num_chars = mysql_num_rows($results);
		$_SESSION['char_number'] = $num_chars+1;
		if($num_chars >= 3){
			$error_message = "You have reached your maximum number of characters.";
		}
		else{
			$new_char = "INSERT INTO user_char (id_username, char_number) VALUES ('$login_session', '$_SESSION[char_number]')";
			mysql_query($new_char);
			header("location: new_char.php");
		}
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?php echo ucfirst($login_session); ?> | Magic Missile</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/home.js"></script>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<style>
		*{
			margin: 0;
		}
		.board{
			width: 950px;
			margin: auto;
		}
		.top{
			background-image: url("img/top.png");
			background-size: 950px 66px;
			height: 66px;
			width: 950px;
		}
		.middle{
			background-image: url("img/middle.png");
			background-size: 950px 600px;
			
			height: 600px;
			width: 950px;
			overflow-x: hidden;
		}
		.bottom{
			background-image: url("img/bottom.png");
			background-size: 950px 68px;
			height: 68px;
			width: 950px;
		}
		.content{
			width: 900px;
			height: 600px;
			margin: auto;

			position: relative;
		}
		#controls{
			background-image: url('img/sidebutton.png');
			background-size: 200px 50px;
			width: 200px;
			height: 50px;
			position: absolute;
			top: 5px;
			right: -23px;
		}
		#controls_wrapper{
			width: 158px;
			height: 38px;
			position: absolute;
			top: 5px;
			left: 5px;
			display: flex;
			flex-direction: row;
			justify-content: space-around;
			align-items: center;
			padding: 3px 0 0 0;
		}

		input[type=submit].logout{
			background-image: url('img/logout.png');
			background-size: 25px 25px;
			background-repeat: no-repeat;
			background-color: transparent;
			height: 25px;
			width: 25px;
			border: none;
			cursor: pointer;
		}
		input[type=submit].settings{
			background-image: url('img/settings.png');
			background-size: 25px 25px;
			background-repeat: no-repeat;
			background-color: transparent;
			height: 25px;
			width: 25px;
			border: none;
			cursor: pointer;
		}
			
	</style>
</head>

<body>
	<?php include('logo.php'); ?>


<div class="board shadowLight" style="position: relative; z-index: 1;">
	<div class="top">
		<?php include('nav.php'); ?>
	</div>
	<div class="middle">
		
	

		<div class="content">
			
			<!--Logout and Settings Buttons-->	
			<div id="controls">
				<div id="controls_wrapper">
					
					<div style="position: relative">
						<form method="POST">
							<input type="submit" name="settings" value="" title="Settings" class="settings" />
						</form>
					</div>

					<div style="position: relative">
						<form method="POST">
							<input type="submit" name="logout" value="" title="Logout" class="logout" />
						</form>
					</div>
					
				</div>
			</div>

			<!-- -->
			<div class="title">
				Welcome <?php echo ucfirst($login_session); ?>
			</div>

			<form method="POST" style="display: flex; flex-direction: row;">
				<input type="submit" name="new_char" value="Create New Character" class="button big" />
			</form>
			
			<?php
				if($login_session <> 'guest'){ ?>
					<a href="#" title="View Existing Characters"><input type="submit" value="View Existing Characters" class="button big" /></a>
			<?php } ?>
			
			<a href="library.php" title="Browse Attribute Library"><input type="submit" value="Browse Attribute Library" class="button big" /></a>
			<br></br>
			<div>
				<?php echo $error_message; ?>
			</div>
			<!-- -->
			
			
			
		</div>
	</div>
	<div class="bottom">
		<?php include('footer.php') ?>
	</div>
</div>


</body>

</html>
