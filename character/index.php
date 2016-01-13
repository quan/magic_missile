<?php
	session_start();

	if(isset($_POST['getstarted'])){
		$_SESSION['char_level'] = 1;
		header('location: character/race.php');
		}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<title>Home | Magic Missile</title>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
	<!--JS-->
	<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="css/index.cssx" />
	<link rel="stylesheet" type="text/css" href="character/character.css" />

	<style>
		body{
			background-image: url('img/mapbg.jpg');
			background-position: center top;
			background-repeat: no-repeat;
			background-color: #000;
		}

		#content{
			font-family: 'Lato', sans-serif;
			background-image: url('img/parchment2.png');
			background-size: 900px 600px;
			width: 900px;
			height: 600px;
			margin: auto;
			position: relative;
			display: flex;
			flex-direction: column;
		}
		@keyframes swayz{
			0%{transform: rotate(0deg);}
			25%{transform: rotate(-1deg)};
			50%{transform: rotate(0deg);}
			75%{transform: rotate(1deg);}
			100%{transform: rotate(0deg);}
		}


		.getstarted{
			background-image: url('img/get_started.png');
			width: 180px;
			height: 50px;
			border: none;
			position: relative;
			margin: 10px 0 0 0;
			cursor: pointer;
		}
		.message{
			width: 600px;
			margin: 0 auto 0 auto;
			font-family: 'Playfair Display', serif;
		}
		.login_wrapper{
			background-image: url("img/parchment.png");
			background-size: 500px 400px;
			width: 500px;
			height: 400px;
			margin: auto;
			position: relative;
		}

	</style>
</head>
<body class="noselect">

		<!--Logo Area-->
		<?php $level=0; include('logo.php'); ?>

		
	<div class="board">

		<!--Nav Bar-->
		<div class="top">
			<?php $level=0; include('nav.php'); ?>
		</div>
		
		
		<!--Sign Content-->
		<div class="middle">

			<div class="fade2">
				
				<div class="title glow2">
					Welcome to The Magic Missile!
				</div>

				<!--UNDER CONSTRUCTION-->
				<img src='img/construction.png' width="400px" height="80px" class="shadow"/>
				<!--VERSION #-->
				<div style="font-size: 3em; color: #f00;">v0.2.2</div>
				<div class="message">
					Magic Missile is a Guided Character Creator for D &amp; D 3.5
					<br></br>
					Click below to get started building your very own character and in the end you will even get a completed character sheet! Hell yeah! :D
					<br></br>
					Also you can check our our library of character attributes to learn up on all the things that stuff can do. :)
					<br></br>
					If you are already a member, login to your profile to view past character sheets and other fun stuffs!
				</div>	
				<form method="POST">
					<input type="submit" name="getstarted" class="getstarted" value=""/>			
				</form>
			</div>

					<!--
					<div style="position: absolute; bottom: 0px; margin: auto; width: 100%; height: 10px;">
						<?php // include('footer.php'); ?>
					</div>
					-->
		</div>

		<div class="bottom">
			<div style="padding: 20px 0 0 0; font-size: 16pt;">
				<?php $level=0; include('footer.php'); ?>
			</div>
		</div>
		
	</div>
	
		
		<div class="post"></div>
		<div class="grass"></div>
		
		
		<!--            VERSION GOODIE        -->

		<!--Audio-->
		<audio id="sound" src="snd/moon.mp3" loop></audio>
		<!--Animation GIF with Mute Button-->

			<img src="img/unmute.png" id="muteButton" onClick="muteTheThing()" title="Mute/Unmute" />

		
		<style>
		#muteButton{
			width: 50px;
			height: 50px;
			position: absolute;
			top: 12px;
			right: 12px;
			z-index: 999;
		}

		#anim{
			position: absolute;
			right: 50px;
			bottom: 50px;
			background-image: url('img/2016.gif');
			background-size: 100% 100%;
			height: 200px;
			width: 300px;
		}
		
		</style>
		
		<script content-type="text/Javascript">
			var audio = document.getElementById("sound");
			audio.play();

			function muteTheThing(){
				var audio = document.getElementById("sound");
				var pic = document.getElementById("muteButton");

				
				if (audio.paused) {
					audio.play();
					pic.setAttribute("src", "img/unmute.png");

				} else {
					audio.pause();
					pic.setAttribute("src", "img/mute.png");

				}				
				
			}
		</script>

		

</body>
	
</html>
