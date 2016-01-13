<?php include('session.php'); ?>

<!DOCTYPE html>
<html>
<head>	
	<link rel="stylesheet" type="text/xss" href="css/main.css"></link>
	<title>Ability Score Roller</title>
</head>
<body>
	<?php include('header.php'); ?>
	<div id="main">
		<br>
		<div class="header">Roll Your Scores!</div>


		<?php 
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$counter = isset($_POST['counter']) ? $_POST['counter'] : 0;
				if(isset($_POST["roll"]) && $counter <6){
					$counter++;
					echo "Roll: " . $counter;
					$var_roll = "roll" . $counter;
				}
				else{
					
					include('replay.php');
					
					exit();
				}
			}
			else{
				echo "<br />";
			}
		?>

		<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
			<form action = "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "post">
				<?php
					if($counter == 0){
						$die1 = 0;
						$die2 = 0;
						$die3 = 0;
						$die4 = 0;
					}
					else{
						$die1 = rand(1,6);
						$die2 = rand(1,6);
						$die3 = rand(1,6);
						$die4 = rand(1,6);
					}

					$rolls = array($die1, $die2, $die3, $die4);
					sort($rolls);
					$sum = $die1 + $die2 + $die3 + $die4;
					$total = $sum - $rolls[0];
					
					$_SESSION['$var_roll'] = $total;
					$trip = 0;
				?>

				<div class="container">
					
					<div class="number">
						<?php echo $die1 . "<br />"; ?>
						<?php if($die1 == $rolls[0] && $trip < 1 && $counter != 0){
							echo '<div class="X">X</div>' ;
							$trip++;
							}	
						?>
					</div>
					
						
					<div class="number">
						<?php echo $die2 . "<br />"; ?>
						<?php if($die2 == $rolls[0] && $trip < 1 && $counter != 0){
							echo '<div class="X">X</div>' ;
							$trip++;
							}
						?>
					</div>
					
					<div class="number">
						<?php echo $die3 . "<br />"; ?>
						<?php if($die3 == $rolls[0] && $trip < 1 && $counter != 0){
							echo '<div class="X">X</div>' ;
							$trip++;
							}
						?>
					</div>
					
					<div class="number">
						<?php echo $die4 . "<br />"; ?>
						<?php if($die4 == $rolls[0] && $trip < 1 && $counter != 0){
							echo '<div class="X">X</div>' ;
							$trip++;
							}
						?>
					</div>

				</div>
		
				<br></br>
		
				<div class="header2">Score:</div>
				<div class="container">
					<div class="number">
						<?php echo $total . "<br />"; ?>
					</div>
				</div>
				<br></br>
				<input type = "hidden" name = "counter" value = "<?php print $counter; ?>"; />
				<?php
					$query = "UPDATE char_info SET $var_roll='$total' WHERE user_name='$login_session'";
					mysql_query($query);
				?>
				<input type='submit' name='roll' value='Roll the Dice'></input>
				<br></br>
			</form>
		</form>
	</div>
</body>
</html>
