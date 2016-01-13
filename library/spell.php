<?php


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Library Spell</title>
	<link rel="stylesheet" type="text/css" href="library.css">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
</head>

<body>
	<!--Logo Area-->
	<?php $level=1; include('logo.php'); ?>
	<!--Nav Bar-->
	<div class="top shadowLight" style="position: relative; z-index: 1;">
		<?php $level = 1; include('nav.php'); ?>
	</div>
	<div class="title">
		Spells
	</div>
	
	<?php {include('library_nav.php');} ?>
	
	<!--Footer-->
	<div style="padding: 10px 0 0 0">
		<?php $level=1; include('footer.php'); ?>
	</div>
</body>

</html>
