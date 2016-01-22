<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Library Home</title>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
	<!--JS-->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="library.css">
	<link rel="stylesheet" type="text/css" href="../character/character.css">
	
	<style>
		#header{
			background-image: url('img/slat.png');
			background-size: 950px 66px;
			height: 66px;
			width: 950px;
			margin: auto;
			border-left: 2px solid #000;
			border-right: 2px solid #000;
		}
	</style>
		
</head>

<body class="noselect">
	<!--Logo Area-->
	<?php $level=1; include('logo.php'); ?>

	<!--Nav Bar-->
	<div class="top" style="position: relative; z-index: 1; margin: auto;">
		<?php $level = 1; include('nav.php'); ?>
	</div>

	<!--Libaray Contents-->
	<div class="title">
		Library Home
	</div>
	
	<!--Library Nav bar-->
	<div>
		<?php include('library_nav.php'); ?>
	</div>

	<!--Footer-->
	<div style="padding: 10px 0 0 0">
		<?php $level=1; include('footer.php'); ?>
	</div>
</body>
</html>