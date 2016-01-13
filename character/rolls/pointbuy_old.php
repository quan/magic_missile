<?php include('session.php'); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Point Buy - Ability Scores</title>
	<link rel="stylesheet" type="text/xss" href="css/main.css"></link>
	<style>
		*{
			margin: 0;
		}
		body{
			text-align: center;
		}
		form{
			margin: 4px;
			padding: 0;
		}
		.viewer{
			width: 20px;
		}
		.wrapper1{
			
			width: 50%;
			height: 300px;
			display: flex;
			margin: auto;
		}
		.left{
			
			text-align: right;
			width: 50%;
			margin: auto;
			font-size: 30px;
			padding: 10px;
		}
		.right{
			padding: 10px;
			text-align: left;
			width: 50%;
			margin: auto;
		}

	input[type=text] {
		font-size: 20px;
		text-align: center;
		width: 30px;
		height: 30px;
		border: none;

	}
	</style>
	
<?php
		$error_message = '';
		$start_available = 21;
		$stat_min = 3;
		$stat_max = 18;
		$start_stat = 10;
	if(	!isset($_POST['up_str']) && !isset($_POST['down_str']) && 
		!isset($_POST['up_wis']) && !isset($_POST['down_wis']) &&
		!isset($_POST['up_int']) && !isset($_POST['down_int']) &&
		!isset($_POST['up_cha']) && !isset($_POST['down_cha']) &&
		!isset($_POST['up_dex']) && !isset($_POST['down_dex']) &&
		!isset($_POST['up_con']) && !isset($_POST['down_con']) &&
		!isset($_POST['save_scores'])
		){
		$_SESSION['total'] = $start_available;
		$_SESSION['strength'] = $start_stat;
		$_SESSION['wisdom'] = $start_stat;
		$_SESSION['intelligence'] = $start_stat;
		$_SESSION['charisma'] = $start_stat;
		$_SESSION['dexterity'] = $start_stat;
		$_SESSION['constitution'] = $start_stat;
		}
	
	#Strength
	if(isset($_POST['up_str']) && $_SESSION['total']>0 && $_SESSION['strength']<$stat_max){
		$_SESSION['strength']++;
		$_SESSION['total']--;
	}
	if(isset($_POST['down_str']) && $_SESSION['strength']>$stat_min){
		$_SESSION['strength']--;
		$_SESSION['total']++;
	}
	#Wisdom
	if(isset($_POST['up_wis']) && $_SESSION['total']>0 && $_SESSION['wisdom']<$stat_max){
		$_SESSION['wisdom']++;
		$_SESSION['total']--;
	}
	if(isset($_POST['down_wis']) && $_SESSION['wisdom']>$stat_min){
		$_SESSION['wisdom']--;
		$_SESSION['total']++;
	}
	#Intelligence
	if(isset($_POST['up_int']) && $_SESSION['total']>0 && $_SESSION['intelligence']<$stat_max){
		$_SESSION['intelligence']++;
		$_SESSION['total']--;
	}
	if(isset($_POST['down_int']) && $_SESSION['intelligence']>$stat_min){
		$_SESSION['intelligence']--;
		$_SESSION['total']++;
	}
	#Charisma
	if(isset($_POST['up_cha']) && $_SESSION['total']>0 && $_SESSION['charisma']<$stat_max){
		$_SESSION['charisma']++;
		$_SESSION['total']--;
	}
	if(isset($_POST['down_cha']) && $_SESSION['charisma']>$stat_min){
		$_SESSION['charisma']--;
		$_SESSION['total']++;
	}
	#Dexterity
	if(isset($_POST['up_dex']) && $_SESSION['total']>0 && $_SESSION['dexterity']<$stat_max){
		$_SESSION['dexterity']++;
		$_SESSION['total']--;
	}
	if(isset($_POST['down_dex']) && $_SESSION['dexterity']>$stat_min){
		$_SESSION['dexterity']--;
		$_SESSION['total']++;
	}
	#Constitution
	if(isset($_POST['up_con']) && $_SESSION['total']>0 && $_SESSION['constitution']<$stat_max){
		$_SESSION['constitution']++;
		$_SESSION['total']--;
	}
	if(isset($_POST['down_con']) && $_SESSION['constitution']>$stat_min){
		$_SESSION['constitution']--;
		$_SESSION['total']++;
	}
	//Save Scores
	if(isset($_POST['save_scores'])){
		if($_SESSION['total'] == 0){
			$save_scores = "UPDATE `user_char` SET 
			`char_str` = '$_SESSION[strength]',
			`char_dex` = '$_SESSION[dexterity]',
			`char_con` = '$_SESSION[constitution]',
			`char_int` = '$_SESSION[intelligence]',
			`char_wis` = '$_SESSION[wisdom]',
			`char_cha` = '$_SESSION[charisma]' WHERE
			`id_username` = '$_SESSION[login_user]' AND
			`char_number` = '$_SESSION[char_number]'";
			mysql_query($save_scores);
			$_SESSION['task_message'] = "Scores Saved";
			header('location: new_char.php');
		}
		else{
			$error_message = "Please allocate all your points.";
		}
	}
?>


</head>
<body>


		
		<div class="header">Ability Scores</div>

		<div class="subtitle">You have <?php echo $_SESSION['total'] ?> points available.</div>
		
		<div class="wrapper1">
			<div class="left">
				<label>Strength</label><br>
				<label>Dexterity</label><br>
				<label>Constitution</label><br>
				<label>Intelligence</label><br>
				<label>Wisdom</label><br>
				<label>Charisma</label><br>


			</div>
			<div class="right">
				<!--Strength-->
				<form action="" method="POST">
					<input type="submit" name="down_str" value="-" class="button">
					<input type="text" name="score" value="<?php echo $_SESSION['strength'] ?>" class="viewer">
					<input type="submit" name="up_str" value="+" class="button">
				</form>
				
				<!--Dexterity-->
				<form action="" method="POST">
					<input type="submit" name="down_dex" value="-" class="button">
					<input type="text" name="score" value="<?php echo $_SESSION['dexterity'] ?>" class="viewer">
					<input type="submit" name="up_dex" value="+" class="button">
				</form>
				
				<!--Constitution-->
				<form action="" method="POST">
					<input type="submit" name="down_con" value="-" class="button">
					<input type="text" name="score" value="<?php echo $_SESSION['constitution'] ?>" class="viewer">
					<input type="submit" name="up_con" value="+" class="button">
				</form>
				
				<!--Intelligence-->
				<form action="" method="POST">
					<input type="submit" name="down_int" value="-" class="button">
					<input type="text" name="score" value="<?php echo $_SESSION['intelligence'] ?>" class="viewer">
					<input type="submit" name="up_int" value="+" class="button">
				</form>
				
				<!--Wisdom-->
				<form action="" method="POST">
					<input type="submit" name="down_wis" value="-" class="button">
					<input type="text" name="score" value="<?php echo $_SESSION['wisdom'] ?>" class="viewer">
					<input type="submit" name="up_wis" value="+" class="button">
				</form>
				
				<!--Charisma-->
				<form action="" method="POST">
					<input type="submit" name="down_cha" value="-" class="button">
					<input type="text" name="score" value="<?php echo $_SESSION['charisma'] ?>" class="viewer">
					<input type="submit" name="up_cha" value="+" class="button">
				</form>
				

				

				
			</div>
		</div>
		<br>
		<form method="POST">
			<input type="submit" name="save_scores" value="Save Scores" title="Save Scores" class="button" />
		</form>
		
		<br></br>
		<div>
			<?php echo $error_message; ?>
		</div>



</body>
</html>

