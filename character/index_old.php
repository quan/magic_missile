<?php
	session_start();
	session_unset();

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/char_creator.css" />
	<title>Character Creator | Magic Missile</title>
</head>

<body>
	<div class="content shadow">
			
			<div class="title">
				Choose your Character's Level
			</div>

			<select>
				<?php 
					for ($i=1; $i < 11; $i++) { 
						echo '<option>' . $i . '</option>';
					}
				?>
			</select>

	
	</div>
</body>
</html>
