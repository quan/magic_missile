<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.cssx">
	<style>
		*{
			text-align: center;
			margin: 0;
			padding: 0;
		}
		.red{
			background-color: red;
		}
		.blue{
			background-color: blue;
		}
		.content{
		background-color: pink;
		}
	</style>
</head>

<body>
	<table width="100%" height="100%" cellspacing="0">
		<tr class="red" height="50px">
			<td>
				<?php include('header.php'); ?>
			</td>
		</tr>
		<tr class="blue">
			<td>
				<div class="content">
					this is where the content is
				</div>
			</td>
		</tr>
		<tr height="50px">
			<td height =50px;>
				footer
			</td>
		</tr>
	</table>

</body>

</html>
