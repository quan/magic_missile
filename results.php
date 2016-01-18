<?php
	session_start();

	$level = $_SESSION['char_level'];
	$race = $_SESSION['char_race'];
	$class = $_SESSION['char_class'];
	$deity = $_SESSION['char_deity'];
	$domain = $_SESSION['char_domain'];
	$school = $_SESSION['char_school'];
	$roll = $_SESSION['char_roll_type'];
	$str = $_SESSION['char_str'];
	$wis = $_SESSION['char_wis'];
	$int = $_SESSION['char_int'];
	$cha = $_SESSION['char_cha'];
	$dex = $_SESSION['char_dex'];
	$con = $_SESSION['char_con'];
	//This one is a JSON array
	$skillz = json_decode($_SESSION['char_skill'], true);
	for ($i=0; $i < count($skillz['skills']); $i++) { 
		$skill[$i] = $skillz['skills'][$i];
		$point[$i] = $skillz['points'][$i];
	}

	$pet = $_SESSION['char_pet'];

	ini_set('display_errors', 1);
	require('fpdf/fpdf.php');

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);

	$pdf->Cell(100,10,'Level: ' . $level,1,1,"L");
	$pdf->Cell(100,10,'Race: ' . $race,1,1,"L");
	$pdf->Cell(100,10,'Class: ' . $class,1,1,"L");
	$pdf->Cell(100,10,'Deity: ' . $deity,1,1,"L");
	$pdf->Cell(100,10,'Domain: ' . $domain,1,1,"L");
	$pdf->Cell(100,10,'School: ' . $school,1,1,"L");
	$pdf->Cell(100,10,'Roll: ' . $roll,1,1,"L");
	$pdf->Cell(100,10,'Strength: ' . $str,1,1,"L");
	$pdf->Cell(100,10,'Dexterity: ' . $dex,1,1,"L");
	$pdf->Cell(100,10,'Constitution: ' . $con,1,1,"L");
	$pdf->Cell(100,10,'Intelligence: ' . $int,1,1,"L");
	$pdf->Cell(100,10,'Wisdom: ' . $wis,1,1,"L");
	$pdf->Cell(100,10,'Charisma: ' . $cha,1,1,"L");
	for ($i=0; $i < count($skill); $i++) { 
		$j = $i + 1;
		$pdf->Cell(100,10,'Skill ' . $j . ': ' . $skill[$i] . ' , ' . $point[$i],1,1,"L");
	}


	$pdf->Output();
?>