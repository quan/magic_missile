<?php


	include('../db.php');
	mysql_close($con);

	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Legal | Magic Missile</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!--JS-->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/legal.js"></script>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="character/character.css" />
	<style>
		.content{
			flex-direction: column;
			justify-content: top;
			align-items: center;
		}
	</style>

</head>

<body class="noselect">
	<?php $level=0; include 'common/logo.php';?>
	
<div class="board">
	<div class="top">
		<?php $level=0; include 'common/nav.php'; ?>
	</div>

	<div class="middle">
		<div class="content">

			<div class="title">
				Legal
			</div>

			<div class="subtitle">
				These are legal words.
			</div>

		</div>
	</div>
	<div class="bottom"></div>
</div>
	<div>
		<?php $level=0; include 'common/footer.php'; ?>
	</div>

	
	
</body>

</html>


