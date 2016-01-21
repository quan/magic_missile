<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<title>Template | Magic Missile</title>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
	<!--JS-->
	<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="character/character.css" />

	<style>
		body{
			background-image: url('img/mapbg.jpg');
			background-position: center top;
			background-repeat: no-repeat;
			background-color: #000;
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

				

		</div>

		<div class="bottom">
			<div style="padding: 20px 0 0 0; font-size: 16pt;">
				<?php $level=0; include('footer.php'); ?>
			</div>
		</div>
		
	</div>
	
		
		
	<script content-type="text/Javascript">

		//Zoom window on screen resize

		function reSize(){
				var height_ratio = $(window).height()/850;
				var width_ratio = $(window).width()/950;
				if (height_ratio < 1 || width_ratio < 1) {
					if (height_ratio < width_ratio) {
						$('body').css('zoom', height_ratio);
					} else {
						$('body').css('zoom', width_ratio);
					}	
				}
			}

		$(document).ready(function(){
			reSize();
		});

		$(window).on('resize', function(){
			reSize();
		});
		
	</script>

		

</body>
	
</html>
