<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
$message_style = '';
$user_error_style = '';
$pass_error_style = '';
if (isset($_POST['login'])) {
	//Check for both fields empty
	if (empty($_POST['username']) && empty($_POST['password'])) {
		$error = "Please Enter Login Info";
		$message_style = "error";
		$user_error_style = 'style="border:2px solid red;"';
		$pass_error_style = 'style="border:2px solid red;"';
		goto end;
	}
	//Check if password field is empty
	if(empty($_POST['password'])){
		$error = "Please Enter Password";
		$message_style = "error";
		$pass_error_style = 'style="border:2px solid red;"';
		goto end;
	}
	//Checks for 'guest' account login
	if($_POST['username'] == 'guest'){
		$error = "Invalid Username or Password";
		$message_style = "error";
		$user_error_style = 'style="border:2px solid red;"';
		$pass_error_style = 'style="border:2px solid red;"';
		goto end;
		}
	
	// Define $username and $password
	$username=$_POST['username'];
	$password=$_POST['password'];
	// Establishing Connection with Server
	include('db.php');
	// To protect MySQL injection for Security purpose
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	//MD5 Password encryption
	$password = md5($password);
	// SQL query to fetch information of registerd users and finds user match.
	$query = mysql_query("SELECT * FROM `user_login` WHERE `user_password` = '$password' AND `user_name` = '$username'", $con);
	mysql_close($con); // Closing Connection
	$rows = mysql_num_rows($query);
	if ($rows != 1) {
		$error = "Invalid Username or Password";
		$message_style = "error";
		$user_error_style = 'style="border:2px solid red;"';
		$pass_error_style = 'style="border:2px solid red;"';
		goto end;
	}
	$_SESSION['login_user']=$username;
	$_SESSION['login_pass']=$password;
	$error = "Login Successful";
	$message_style = "success";
	header( "refresh:0.7; url=home.php" ); // Redirecting To Other Page
	end:
}
?>

<?php
	session_start();
	if(isset($_POST['getstarted'])){
		header('location: new_char.php');
		}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--JS-->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<title>Home | Magic Missile</title>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="css/index.css" />

	<link rel="stylesheet" type="text/css" href="character/character.css" />
	<style>
	@import url(https://fonts.googleapis.com/css?family=Lobster+Two);
		#footer{
			font-family: 'Lato', sans-serif;
			font-size:1em;
			font-weight: bold;
			color: #fff;
			width: 100%;

		}
		#header{
			background-image: url('img/slat.png');
			background-size: 950px 66px;
			height: 66px;
			width: 950px;
			margin: auto;
			border-left: 2px solid #000;
			border-right: 2px solid #000;
			position: relative;
			z-index: 1;
		}
		#content{
			font-family: 'Lato', sans-serif;
			background-image: url('img/parchment2.png');
			background-size: 900px 600px;
			width: 900px;
			height: 600px;
			margin: auto;
			position: relative;
			z-index: 0;
			display: flex;
			flex-direction: column;
		}
		#login_button{
			background-image: url('img/button.png');
			background-size: 100px 50px;
			width: 100px;
			height: 50px;
			font-family: inherit;
			font-size: 1em;
			border: none;
		}


		.login_wrapper{
			background-image: url("img/parchment.png");
			background-size: 500px 400px;
			width: 500px;
			height: 400px;
			margin: auto;
			position: relative;
			}

		#login {
			color: #fff;
			width: 500px;
			height: 400px;
			text-align: center;
			font-size: 1.5em;
			font-family: 'Lobster Two', cursive;
			position: relative;
			z-index: 1;

		}
		.login_title{
			text-align: center;
			padding: 40px 0 30px 0;
			font-size: 1.25em;
		}
		.register_title{
			text-align: center;
			padding: 6px 0 10px 0;
			font-size: 1.25em;
		}
		input[type=text],input[type=password] {
			background-color:#E29F43;
			color: #000000;
			text-align: center;
			height: 50px;
			width: 250px;
			font-size:1em;
			font-family: 'Lato', sans-serif;
			border: 2px inset #FC3;
			border-radius:5px;
			margin: 2px 0 2px -2px;
			}
			
			input:focus::-webkit-input-placeholder { color:transparent; }
			input:focus:-moz-placeholder { color:transparent; } /* Firefox 18- */
			input:focus::-moz-placeholder { color:transparent; } /* Firefox 19+ */
			input:focus:-ms-input-placeholder { color:transparent; } /* oldIE ;) */
		}
		.error{
			color: #FF0000;
		    text-shadow:
		    -1px -1px 0 #333,
		    1px -1px 0 #333,
		    -1px 1px 0 #333,
		    1px 1px 0 #333;
		    }
		    
		.success{
			color: #00FF00;
		    text-shadow:
		    -1px -1px 0 #333,
		    1px -1px 0 #333,
		    -1px 1px 0 #333,
		    1px 1px 0 #333;
		}

	</style>
</head>
<body>

	<!--Logo Area-->
	<?php $level=0; include 'common/logo.php'; ?>
	<!-- -->
	
	<div class="board">

		<div class="top">
			<!--Nav Bar-->
			<?php $level=0; include 'common/nav.php'; ?>
		</div>

		<!--Sign Content-->
		<div class="middle" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
			
			<!--Login Sign-->
			<div id="login" class="login_wrapper">
				
					<div class="login_title">
						Please Log In&nbsp;
					</div>
					<form method="POST">
						<!--Username Box-->
						<input id="name" name="username" placeholder="username" type="text" value="<?php echo $_POST['username']; ?>" <?php echo $user_error_style; ?> />
						<!--Error Message Area-->
						<div class="fade1" style="height:30px; padding: 5px 0 5px 0;">
							<?php echo $error; ?>
						</div>
						<!--Password Box-->
						<input id="password" name="password" placeholder="password" type="password" <?php echo $pass_error_style; ?> />
						<br></br>
						<!--Buttons-->
						
						<!--<button class="default" style="font-size: 14pt;">Log In</button>-->
						<input type="submit" value="Log In" name="login" id="login_button" class="shadow"/>
					</form>

					<button id="register_button" class="default shadow" style="font-size: 14pt;">Register for Free</button>

				

			</div>

			<!--Register Sign-->
			<div id="register" class="login_wrapper">
				
					
					<div class="register_title">
						Sign Up Here!
					</div>
					
					<form action="" method="post">
						<!--Username Box-->
						<input id="name" name="username" placeholder="choose username" type="text" value="<?php echo $_POST['username'];?>" <?php echo $user_error_style; ?> />
						<br>
						<!--Password Box-->
						<input id="password1" name="password1" placeholder="choose password" type="password" <?php echo $pass_error_style; ?> />
						<br>
						<!--Password Box-->
						<input id="password2" name="password2" placeholder="re-enter password" type="password" <?php echo $pass_error_style; ?> />
						<!--Error Message Area-->
						<div class="fade1" style="height:30px; padding: 5px 0 5px 0;">
							<?php echo $error; ?>
						</div>
						<!--Buttons-->
						<input class="button" name="register" type="submit" value=" Register " />
						<br>

					</form>
					
			</div>
			

		</div>

		<div class="bottom"></div>
		
	</div>
	
	<!--Footer-->
	<div>
		<?php $level=0; include 'common/footer.php'; ?>
	</div>


</body>

	<script>
		$(document).ready(function(){
			$('#register').hide();
			$('#register_button').click(function(){
				$('#login').hide();
				$('#register').show();
			});
		});
	</script>

</html>