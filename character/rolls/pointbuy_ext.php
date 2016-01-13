<?php
	session_start();

	if (isset($_POST['save_rolls'])) {
		$_SESSION['strength'] = $_POST['strength'];
		$_SESSION['wisdom'] = $_POST['wisdom'];
		$_SESSION['intelligence'] = $_POST['intelligence'];
		$_SESSION['charisma'] = $_POST['charisma'];
		$_SESSION['dexterity'] = $_POST['dexterity'];
		$_SESSION['constitution'] = $_POST['constitution'];
	}
	
		$start_available = 21;
		$stat_min = 3;
		$stat_max = 18;
		$start_stat = 10;
	if(!isset($_POST['up_str']) && !isset($_POST['down_str']) && 
		!isset($_POST['up_wis']) && !isset($_POST['down_wis']) &&
		!isset($_POST['up_int']) && !isset($_POST['down_int']) &&
		!isset($_POST['up_cha']) && !isset($_POST['down_cha']) &&
		!isset($_POST['up_dex']) && !isset($_POST['down_dex']) &&
		!isset($_POST['up_con']) && !isset($_POST['down_con'])
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
?>