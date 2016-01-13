<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
	<style>
		* {
			margin: 0;
		}
		
		html, body {
		height: 100%;
		}
		
		.wrapper {
		min-height: 100%;
		height: auto;
		margin: 0 auto -30px;
		}
		
		.push {
		height: 4em;
		}
		
		.footer {
			height:20px;
			font-family: 'Lato', sans-serif;
			font-size:1em;
			font-weight: bold;
			}
		
	</style>
</head>
<body>
	<div class="wrapper">
		<?php include('header.php'); ?>
			<div class="push"></div>
			<div class="header">
			Page Title
			</div>
			<div class= "subtitle">
				the subtitle
			</div>
		<div class="push"></div>
	</div>
	<div class="footer">
            <p>&copy; 2015 Magic Missile Team</p>
    </div>
</body>
</html>
