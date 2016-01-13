<!DOCTYPE html>
<html>
<head>

	<link href="css/main.css" rel="stylesheet" type="text/css">

	<!--Username validation function-->
	<?php
		function IsSafe($string)
		{
			if(preg_match('/[^a-zA-Z0-9_]/', $string) == 0){return true;} else {return false;}
		}
	?>
	
	<?php
		session_start(); // Starting Session
		$error=''; // Variable To Store Error Message
		$user_error = ''; //Username error
		$message_style = ''; //Red or green message color
		if (isset($_POST['register'])) {
			//Check for empty fields
			if ($_POST['username']=="" || empty($_POST['password1']) || empty($_POST['password2'])) {
			$error = "Please enter all fields";
			$message_style = "error";
			$user_error_style = 'style="border:2px solid red;"';
			$pass_error_style = 'style="border:2px solid red;"';
			goto end;
			}
			//Check for invalid username characters
			if(!IsSafe($_POST['username'])){
				$error = "Invalid Characters";
				$message_style = "error";
				$user_error_style = 'style="border:2px solid red;"';
				goto end;
			}
			//Check for reserved usernames
			$reserved = array("guest", "admin", "administrator", "anonymous");
			if(in_array(strtolower($_POST['username']), $reserved)){
				$error = "Username Invalid";
				$message_style = "error";
				$user_error_style = 'style="border:2px solid red;"';
				goto end;
				}
			//Query database for taken username
			$username=strtolower($_POST['username']);
			//Connect to and select DB
			include('db.php');
			//
			$username = stripslashes($username);
			$username = mysql_real_escape_string($username);
			$query = mysql_query("SELECT * FROM user_login WHERE user_name='$username'", $con);
			$rows = mysql_num_rows($query);
			//Check for taken username
			if ($rows >= 1) {
				$error = "Username taken";
				$message_style = "error";
				$user_error_style = 'style="border:2px solid red;"';
				mysql_close($con);
				goto end;
			}
			if($_POST['password1'] != $_POST['password2']){
				$error = "Passwords don't match";
				$message_style = "error";
				$pass_error_style = 'style="border:2px solid red;"';
				goto end;
			}
			
			//Successful Registration Routine
			$username=strtolower($_POST['username']);
			$password=$_POST['password2'];
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			include('db.php');
			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			$password = md5($password);
			// Selecting Database
			
			// SQL query to fetch information of registerd users and finds user match.
			$query = "INSERT INTO user_login (user_name, user_password) VALUES ('$username', '$password')";
			mysql_query($query);
			$error = "Registration Success! Redirecting to login.";
			$message_style = "success";
			header( "refresh:1; url=login.php" );
			
			end:
		}
		
	?>

	<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

	<title>New User Registration</title>

</head>
<body>
	<div class="wrapper">
		<div class="title">
			<a href="index.php" class="inherit">Project: Magic Missile</a>
		</div>

		<div class="login_wrapper <?php if(!isset($_POST['register'])){echo 'fade';} ?>">
			<div id="register">
				<br>
				<div class="register_title">
					Sign Up Here!
				</div>
				
				<form action="" method="post">
					<input id="name" name="username" placeholder="choose username" type="text" value="<?php echo $_POST['username'];?>" <?php echo $user_error_style; ?> />
					<br>
					<input id="password1" name="password1" placeholder="choose password" type="password" <?php echo $pass_error_style; ?> />
					<br>
					<input id="password2" name="password2" placeholder="re-enter password" type="password" <?php echo $pass_error_style; ?> />
					
					<div class="<?php echo $message_style; ?> fade1" style="height:30px; padding: 5px 0 5px 0;">
						<?php echo $error; ?>
					</div>
					
					<input class="button" name="register" type="submit" value=" Register " />
					<br>

				</form>
				<br>
			</div>
		</div>

		<br></br>
		<div class="newuser" style="margin: 12px 0 0 0;">
			<a href="login.php" class="button">Return to Login</a>
		</div>
		<div class="push"></div>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>
