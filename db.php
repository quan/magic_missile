<?php

//	$mysqli = mysqli_connect("127.0.0.1", "nickrwpj_mmadmin", "MagicMissile!", "nickrwpj_magic_missile");


	$con = mysql_connect("127.0.0.1", "nickrwpj_mmadmin", "MagicMissile!");
	$db = mysql_select_db("nickrwpj_magic_missile", $con);

?>