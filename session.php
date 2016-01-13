<?php
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	include('db.php');
	// Starting Session
	session_start();
	// Storing Session
	$user_check = $_SESSION['login_user'];
	$pass_check = $_SESSION['login_pass'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysql_query("SELECT user_name FROM user_login WHERE user_name='$user_check' AND user_password='$pass_check'", $con);
	$row = mysql_fetch_assoc($ses_sql);
	$login_session =$row['user_name'];
	if($login_session == ''){
		session_destroy();
		mysql_close($con); // Closing Connection
		header('Location: login.php'); // Redirecting To Home Page
	}
?>
