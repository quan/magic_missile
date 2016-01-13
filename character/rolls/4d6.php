<?php session_start();

	if (isset($_POST['reroll'])) {
		$_SESSION['counter']=0;
	}

	if ($_SESSION['counter']==0) {
		unset($_SESSION['total_1']);
		unset($_SESSION['total_2']);
		unset($_SESSION['total_3']);
		unset($_SESSION['total_4']);
		unset($_SESSION['total_5']);
		unset($_SESSION['total_6']);
	}
	
	if(!isset($_POST['roll'])){
		$die1 = $die2= $die3 = $die4 = $total = 0;

		}
	else{
		if($_SESSION['counter'] < 6){
			$_SESSION['counter']++;
			$counter = $_SESSION['counter'];
			$die1 = rand(1,6);
			$die2 = rand(1,6);
			$die3 = rand(1,6);
			$die4 = rand(1,6);
		}
		else{
			header('location: replay.php');
		}
	}
	$roll_name1 = 'r_'. $_SESSION['counter'] . '_1';
	$roll_name2 = 'r_'. $_SESSION['counter'] . '_2';
	$roll_name3 = 'r_'. $_SESSION['counter'] . '_3';
	$roll_name4 = 'r_'. $_SESSION['counter'] . '_4';
	
	$_SESSION[$roll_name1] = $die1;
	$_SESSION[$roll_name2] = $die2;
	$_SESSION[$roll_name3] = $die3;
	$_SESSION[$roll_name4] = $die4;
	
	$rolls = array($die1, $die2, $die3, $die4);
	sort($rolls);
	$low_name = 'low_' . $_SESSION['counter'];
	$_SESSION[$low_name] = $rolls[0];
	
	$sum = $die1 + $die2 + $die3 + $die4;
	$total = $sum - $rolls[0];
	
	$total_name = 'total_' . $_SESSION['counter'];
	
	$_SESSION[$total_name] = $total;
	
	$mod_name = 'mod_' . $_SESSION['counter'];
	
	$mod = floor(($total - 10)/2);
	$_SESSION[$mod_name] = $mod;
	
	$roll_name = "char_roll" . $counter;
	$_SESSION[$roll_name] = $total;
?>


	<style>
		.title{
			font-family: 'Kaushan Script', cursive;
			color: #663300;
			text-align: center;
			font-size: 5em;
			text-shadow: 2px 2px #333;
		}
		.container{
			background-color: default;
			margin: auto;
			display: flex;
			padding: 20px;
			text-align: center;
			}
			
		.num_box{
			font-size: 2em;
			position: relative;
			width: 20%;
		}

		.number{
			font-family: 'Kaushan Script', cursive;
			font-size: 2em;
			position: relative;
		}

		.X{
			color: #FF0000;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			opacity: 0.8;
		}
		table{
			font-family: 'Kaushan Script', cursive;
			text-align: center;
			margin: auto;
			width: 500px;
		}
		.rollbutton{
			background-image: url('../img/button.png');
			background-size: 200px 50px;
			width: 200px;
			height: 50px;
			border: none;
			font-family: 'Kaushan Script', cursive;
			font-size: 2em;
			margin: auto;
		}
		.shadow{
			box-shadow: 0px 2px 10px 1px rgba(0,0,0,1);
		}
		.roll_wrapper{
			position: absolute;
			bottom: 0;
			margin: auto;
			height: 75px;
			width: 640px;
			display:flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
		}
	</style>
		<div class="title">
			4 d 6
		</div>
		
		<table border="0">
			<tr>
				<th colspan="4" width="300px">
					Rolls
				</th>
				<th width="100px">
					Score
				</th>
				<th width="100px">
					Modifier
				</th>
			</tr>
			<!--ROLL 1-->
			<?php 
				if(isset($_SESSION['total_1'])){ $_SESSION['trip_1'] = FALSE; ?>
					
				<tr>
					<td width="75px" border="1"><div class="number"><?php echo $_SESSION['r_1_1']; if($_SESSION['r_1_1'] == $_SESSION['low_1'] && !$_SESSION['trip_1']){echo '<div class="X">X</div>'; $_SESSION['trip_1']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_1_2']; if($_SESSION['r_1_2'] == $_SESSION['low_1'] && !$_SESSION['trip_1']){echo '<div class="X">X</div>'; $_SESSION['trip_1']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_1_3']; if($_SESSION['r_1_3'] == $_SESSION['low_1'] && !$_SESSION['trip_1']){echo '<div class="X">X</div>'; $_SESSION['trip_1']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_1_4']; if($_SESSION['r_1_4'] == $_SESSION['low_1'] && !$_SESSION['trip_1']){echo '<div class="X">X</div>'; $_SESSION['trip_1']=TRUE;} ?></div></td>

					<td><div class="number"><?php echo $_SESSION['total_1']; ?></div></td>
					<td><div class="number"><?php echo $_SESSION['mod_1']; ?></div></td>
				</tr>
			
			<?php }
				//ROLL 2
				if(isset($_SESSION['total_2'])){ $_SESSION['trip_2'] = FALSE; ?>
					
				<tr>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_2_1']; if($_SESSION['r_2_1'] == $_SESSION['low_2'] && !$_SESSION['trip_2']){echo '<div class="X">X</div>'; $_SESSION['trip_2']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_2_2']; if($_SESSION['r_2_2'] == $_SESSION['low_2'] && !$_SESSION['trip_2']){echo '<div class="X">X</div>'; $_SESSION['trip_2']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_2_3']; if($_SESSION['r_2_3'] == $_SESSION['low_2'] && !$_SESSION['trip_2']){echo '<div class="X">X</div>'; $_SESSION['trip_2']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_2_4']; if($_SESSION['r_2_4'] == $_SESSION['low_2'] && !$_SESSION['trip_2']){echo '<div class="X">X</div>'; $_SESSION['trip_2']=TRUE;} ?></div></td>

					<td><div class="number"><?php echo $_SESSION['total_2']; ?></div></td>
					<td><div class="number"><?php echo $_SESSION['mod_2']; ?></div></td>
				</tr>
			
			<?php }
				//ROLL 3
				if(isset($_SESSION['total_3'])){ $_SESSION['trip_3'] = FALSE;?>

				<tr>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_3_1']; if($_SESSION['r_3_1'] == $_SESSION['low_3'] && !$_SESSION['trip_3']){echo '<div class="X">X</div>'; $_SESSION['trip_3']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_3_2']; if($_SESSION['r_3_2'] == $_SESSION['low_3'] && !$_SESSION['trip_3']){echo '<div class="X">X</div>'; $_SESSION['trip_3']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_3_3']; if($_SESSION['r_3_3'] == $_SESSION['low_3'] && !$_SESSION['trip_3']){echo '<div class="X">X</div>'; $_SESSION['trip_3']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_3_4']; if($_SESSION['r_3_4'] == $_SESSION['low_3'] && !$_SESSION['trip_3']){echo '<div class="X">X</div>'; $_SESSION['trip_3']=TRUE;} ?></div></td>

					<td><div class="number"><?php echo $_SESSION['total_3']; ?></div></td>
					<td><div class="number"><?php echo $_SESSION['mod_3']; ?></div></td>
				</tr>
			
			<?php } 
				//ROLL 4 
				if(isset($_SESSION['total_4'])){ $_SESSION['trip_4'] = FALSE;?>
					
			
				<tr>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_4_1']; if($_SESSION['r_4_1'] == $_SESSION['low_4'] && !$_SESSION['trip_4']){echo '<div class="X">X</div>'; $_SESSION['trip_4']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_4_2']; if($_SESSION['r_4_2'] == $_SESSION['low_4'] && !$_SESSION['trip_4']){echo '<div class="X">X</div>'; $_SESSION['trip_4']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_4_3']; if($_SESSION['r_4_3'] == $_SESSION['low_4'] && !$_SESSION['trip_4']){echo '<div class="X">X</div>'; $_SESSION['trip_4']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_4_4']; if($_SESSION['r_4_4'] == $_SESSION['low_4'] && !$_SESSION['trip_4']){echo '<div class="X">X</div>'; $_SESSION['trip_4']=TRUE;} ?></div></td>

					<td><div class="number"><?php echo $_SESSION['total_4']; ?></div></td>
					<td><div class="number"><?php echo $_SESSION['mod_4']; ?></div></td>
				</tr>
			
			<?php } 
				//ROLL 5
				if(isset($_SESSION['total_5'])){ $_SESSION['trip_5'] = FALSE;?>
					
				<tr>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_5_1']; if($_SESSION['r_5_1'] == $_SESSION['low_5'] && !$_SESSION['trip_5']){echo '<div class="X">X</div>'; $_SESSION['trip_5']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_5_2']; if($_SESSION['r_5_2'] == $_SESSION['low_5'] && !$_SESSION['trip_5']){echo '<div class="X">X</div>'; $_SESSION['trip_5']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_5_3']; if($_SESSION['r_5_3'] == $_SESSION['low_5'] && !$_SESSION['trip_5']){echo '<div class="X">X</div>'; $_SESSION['trip_5']=TRUE;} ?></div></td>
					<td width="75px"><div class="number"><?php echo $_SESSION['r_5_4']; if($_SESSION['r_5_4'] == $_SESSION['low_5'] && !$_SESSION['trip_5']){echo '<div class="X">X</div>'; $_SESSION['trip_5']=TRUE;} ?></div></td>

					<td><div class="number"><?php echo $_SESSION['total_5']; ?></div></td>
					<td><div class="number"><?php echo $_SESSION['mod_5']; ?></div></td>
				</tr>
			
			<?php }
				//ROLL 6
				if(isset($_SESSION['total_6'])){ $_SESSION['trip_6'] = FALSE;?>

				<tr>
					<td width="76px"><div class="number"><?php echo $_SESSION['r_6_1']; if($_SESSION['r_6_1'] == $_SESSION['low_6'] && !$_SESSION['trip_6']){echo '<div class="X">X</div>'; $_SESSION['trip_6']=TRUE;} ?></div></td>
					<td width="76px"><div class="number"><?php echo $_SESSION['r_6_2']; if($_SESSION['r_6_2'] == $_SESSION['low_6'] && !$_SESSION['trip_6']){echo '<div class="X">X</div>'; $_SESSION['trip_6']=TRUE;} ?></div></td>
					<td width="76px"><div class="number"><?php echo $_SESSION['r_6_3']; if($_SESSION['r_6_3'] == $_SESSION['low_6'] && !$_SESSION['trip_6']){echo '<div class="X">X</div>'; $_SESSION['trip_6']=TRUE;} ?></div></td>
					<td width="76px"><div class="number"><?php echo $_SESSION['r_6_4']; if($_SESSION['r_6_4'] == $_SESSION['low_6'] && !$_SESSION['trip_6']){echo '<div class="X">X</div>'; $_SESSION['trip_6']=TRUE;} ?></div></td>

					<td><div class="number"><?php echo $_SESSION['total_6']; ?></div></td>
					<td><div class="number"><?php echo $_SESSION['mod_6']; ?></div></td>
				</tr>
			
			<?php } 
				if($_SESSION['counter']>=6){ 

					$mod_total = $_SESSION['mod_1']	+ $_SESSION['mod_2'] + $_SESSION['mod_3'] + $_SESSION['mod_4'] + $_SESSION['mod_5'] + $_SESSION['mod_6'];
					?>

					<tr>
						<td colspan="5"></td>
						<td><div class="number"><?php echo $mod_total; ?></div></td>
					</tr>

				<?php }

			?>
		
		</table>

	<div class="roll_wrapper">

	<?php if($_SESSION['counter']<6){ ?>
	
		<form method="POST">
			<input type="submit" name="roll" value="Roll 1" title="Roll the Dice!" class="rollbutton shadow"/>
		</form>
		
		
	<?php } else { ?>

		<form method="POST">
			<input type="submit" name="save" value="Save Scores" title="Save Scores" class="rollbutton shadow"/>
		</form>
		
		<?php if($mod_total<4){ ?>

			<form method="POST">
				<input type="submit" name="reroll" value="Re-Roll" title="Re-Roll Scores" class="rollbutton shadow"/>
			</form>

		<?php } ?>

	<?php } ?>
	
	</div>