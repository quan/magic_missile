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
	$skills = $_SESSION['char_skill'];
	$pet = $_SESSION['char_pet'];

	ini_set('display_errors', 1);
	require('fpdf/fpdf.php');

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);

	$pdf->Cell(50,10,'Level: ' . $level,1,1,"L");
	$pdf->Cell(50,10,'Race: ' . $race,1,1,"L");
	$pdf->Cell(50,10,'Class: ' . $class,1,1,"L");
	$pdf->Cell(50,10,'Deity: ' . $deity,1,1,"L");
	$pdf->Cell(50,10,'Domain: ' . $domain,1,1,"L");
	$pdf->Cell(50,10,'School: ' . $school,1,1,"L");
	$pdf->Cell(50,10,'Roll: ' . $roll,1,1,"L");
	$pdf->Cell(50,10,'Strength: ' . $str,1,1,"L");
	$pdf->Cell(50,10,'Dexterity: ' . $dex,1,1,"L");
	$pdf->Cell(50,10,'Constitution: ' . $con,1,1,"L");
	$pdf->Cell(50,10,'Intelligence: ' . $int,1,1,"L");
	$pdf->Cell(50,10,'Wisdom: ' . $wis,1,1,"L");
	$pdf->Cell(50,10,'Charisma: ' . $cha,1,1,"L");
	$pdf->Cell(50,10,'Skills: ' . $skills,1,1,"L");
	$pdf->Cell(50,10,'Pet: ' . $pet,1,1,"L");


	$pdf->Output();
?>