<?php include('session.php'); ?>

<?php
	if(isset($_POST['save_scores'])){
		$save_query = "UPDATE `user_char` SET 
			`char_roll1` = '$_SESSION[char_roll1]',
			`char_roll2` = '$_SESSION[char_roll2]',
			`char_roll3` = '$_SESSION[char_roll3]',
			`char_roll4` = '$_SESSION[char_roll4]',
			`char_roll5` = '$_SESSION[char_roll5]',
			`char_roll6` = '$_SESSION[char_roll6]'
			WHERE `id_username` = '$_SESSION[login_user]' AND `char_number` = '$_SESSION[char_number]'";
		mysql_query($save_query);
		$_SESSION['task_message'] = 'Scores Saved';
		header('location: new_char.php');
		}
	if(isset($_POST['reroll'])){
		$_SESSION['counter']=0;
		header('location: 4d6.php');
		}
	$mod1 = floor(($_SESSION['char_roll1']-10)/2);
	$mod2 = floor(($_SESSION['char_roll2']-10)/2);
	$mod3 = floor(($_SESSION['char_roll3']-10)/2);
	$mod4 = floor(($_SESSION['char_roll4']-10)/2);
	$mod5 = floor(($_SESSION['char_roll5']-10)/2);
	$mod6 = floor(($_SESSION['char_roll6']-10)/2);
	$total_mod = $mod1 + $mod2 + $mod3 + $mod4 + $mod5 + $mod6;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Ability Scores</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
</head>

<body>
	<div class="wrapper">
	<?php include('header.php'); ?>
	<div class="title">Ability Scores</div>
	<div class="subtitle">4d6 Ability Score Roller</div>
	
	<div>Scores</div>
	<div class="container">
		<div class="number"><?php echo $_SESSION['char_roll1'];?></div>
		<div class="number"><?php echo $_SESSION['char_roll2'];?></div>
		<div class="number"><?php echo $_SESSION['char_roll3'];?></div>
		<div class="number"><?php echo $_SESSION['char_roll4'];?></div>
		<div class="number"><?php echo $_SESSION['char_roll5'];?></div>
		<div class="number"><?php echo $_SESSION['char_roll6'];?></div>
	</div>
	
	<div>Modifiers</div>
	<div class="container">
		<div class="number"><?php echo $mod1 ;?></div>
		<div class="number"><?php echo $mod2 ;?></div>
		<div class="number"><?php echo $mod3 ;?></div>
		<div class="number"><?php echo $mod4 ;?></div>
		<div class="number"><?php echo $mod5 ;?></div>
		<div class="number"><?php echo $mod6 ;?></div>
	</div>
	
	<div>You Have a total Modifier of <?php echo $total_mod; ?></div>
	<br />
	<?php
		if($total_mod <= 3){ ?>
			<div>You are eligible for a Re-Roll</div>
			<br>
			<form method="POST">
				<input type="submit" name="reroll" value="Re-Roll" title="Re-Roll" class="button" />
				<input type="submit" name="save_scores" value="Save Anyway" title="Save Anyway" class="button" />
			</form>
	<?php }
		if($total_mod > 3){ ?>
			<form method="POST">
				<input type="submit" name="save_scores" value="Save Scores" title="Save Scores" class="button" />
			</form>
	<?php } ?>
		<div class="push"></div>
	</div>
	
	<?php include('footer.php'); ?>
</body>
</html>
