<?php
	session_start();
	$_SESSION['logout'] = FALSE;
	if(isset($_POST['guest_login'])){
		$_SESSION['login_user'] = 'guest';
		$_SESSION['login_pass'] = md5(swordfish);
		header('location: home.php');
		}
	if(isset($_POST['login'])){
		header("location: login.php");
		}
	if(isset($_POST['register'])){
		header("location: register.php");
		}
	if(isset($_POST['library'])){
		header("location: library.php");
		}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	
<head>

	<title>Home | Magic Missile</title>
	
	<link rel="stylesheet" href="css/main.css"></link>
	
	<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	
	<style>
	input#un-mute {
		display: none;
	}

	.unmute img {
		display: none;
	}

	input#un-mute:checked ~ .unmute img {
		display: initial;
	}

	input#un-mute:checked ~ .mute img {
		display: none;
	}
	</style>
	
</head>

<body>
	<div class="wrapper">
		<div class="title">
			<a href="index.php" class="inherit">Project: Magic Missile</a>
		</div>
		
		<?php if($_SESSION['logout']){echo "Thank you! Come again!";} ?>
		
		<div class="fade">
			<form method="POST">
				<p>Welcome to the site that does the things that you came to the site to do.</p>
				<br>
				<p>This is a secription of what this bitch does. It will be decriptive and informative and helpful.</p>
				<br>
				<p>You may login to do login stuff.</p>
				<input type="submit" name="login" value="Login Here" title="Login" class="button" />
				<br>
				<p>You may regiser for the first time if you are a n00b.</p>
				<input type="submit" name="register" value="Register Here" title="Register" class="button" />
				<br>
				<p>You can continue as a guest if you are a punk-ass bitch. Yup. You a punk-ass bitch!</p>
				<input type="submit" name="guest_login" value="Continue as Guest" title="Guest Login" class="button" />
				<br>
				<p>You can check out all the character attributes in this cool library thing.</p>
				<input type="submit" name="library" value="Browse Library" title="Attribute Library" class="button" />
			</form>
		</div>
		
		<div class="bg1">
			<img src="img/char1.png" height="100%"/>
		</div>
		<div class="bg2">
			<img src="img/char2.png" height="100%"/>
		</div>
		
		<!--Audio Stuff-->
		<audio id="background_audio" autoplay="autoplay">
			<source src="snd/dungeon.mp3" />
			</audio> 
			
			<input type="checkbox" name="un-mute" id="un-mute">
		<label for="un-mute" class="unmute">
			<img src="img/mute.svg" alt="Mute_Icon.svg" title="Mute icon" height="200px" width="200px">
		</label>
		<label for="un-mute" class="mute">
			<img src="img/unmute.svg" alt="Speaker_Icon.svg" title="Unmute/speaker icon" height="200px" width="200px">
		</label>
			
		<script>
			var audio = document.getElementById('background_audio');

			document.getElementById('un-mute').addEventListener('click', function (e)
			{
				e = e || window.event;
				audio.muted = !audio.muted;
				e.preventDefault();
			}, false);
		</script>
		
		
		<div class="push"></div>
	</div>
	
	<?php include('footer.php'); ?>
</body>

</html>
