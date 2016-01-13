<?php
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = mysql_connect("127.0.0.1", "guest", "swordfish");
	// Selecting Database
	$db = mysql_select_db("magic_missile", $connection);
	// Starting Session
	session_start();
	// Storing Session
	$user_check = 'guest';
	$pass_check = md5(swordfish);
	$_SESSION['login_user'] = $user_check;
	$_SESSION['login_pass'] = $pass_check;
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysql_query("SELECT user_name FROM user_login WHERE user_name='$user_check' AND user_password='$pass_check'", $connection);
	$row = mysql_fetch_assoc($ses_sql);
	$login_session =$row['user_name'];
	if($login_session == ''){
		session_destroy();
		mysql_close($connection); // Closing Connection
		header('Location: login.php'); // Redirecting To Home Page
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo ucfirst($login_session); ?> | Magic Missile</title>

	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	<?php include('header.php'); ?>

	<div class="header">
		What would you like to do?
	</div>

	<a href="new_char.php" title="Create New Character"><input type="submit" value="Create New Character" class="button big" /></a>
	
	<a href="library.php" title="Browse Attribute Library"><input type="submit" value="Browse Attribute Library" class="button big" /></a>
	
	<?php include('footer.php'); ?>
</body>
</html>

