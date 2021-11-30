<?php include('../../includes/constants.inc.php'); ?>
<?php
	if (isset($_SESSION["username"]))
	{

	}
	else
	{
		header("location: ../../index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../styles/login.css">
	<title>UOC Admin Page</title>
	<link rel="shortcut icon" href="../../img/favicon.png" type="image/png"
</head>
<body>
	<a href="../index.php"><h2>UOC Admin Page</h2></a><br>

	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="../../includes/signUp.inc.php" method="POST">	
				<h2>Welcome New Administrator</h2>
				<br>
				<input type="text" name="name" placeholder="Full Name..." required>
				<input type="email" name="email" placeholder="Email..." required>
				<input type="password" name="passwrd" placeholder="Password..." required>
				<input type="password" name="repasswrd" placeholder="Confirm Password..." required>
				<br>
				<button type="submit" name="sbmtSignUp">Sign Up</button>
			</form><br>
		</div>

		<div class="form-container sign-in-container">
			<form action="../../includes/logIn.inc.php" method="POST">
				<h2>Log In</h2>
				<br>
				<input type="email" name="usr_mail"placeholder="Email" required>
				<input type="password" name="pwd" placeholder="Password" required>
				<a href="forgot.php">Forgot your password?</a>
				<button type="submit" name="sbmtLogIn">Sign In</button>
				<?php
					if (isset($_SESSION["username"]))
					{
						echo "<a href='../../includes/logOut.inc.php'>Back</a>";
					}
            	?>
				<?php
					if (isset($_GET["newPwd"]))
					{
						if ($_GET["newPwd"] == "passwordUpdated")
						{
							echo "<p>Your password has been reset!</p>";
						}
					}

					if (isset($_GET["error"]))
					{
						if ($_GET["error"] == "none")
						{
							echo "<p>You have signed up!</p>";
						}   
					}
				?>
			</form>
		</div>

		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p style = "color: white;">Login with existing admin account</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello Novice!</h1>
					<p style = "color: white;">Sign up now and register your account</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
	<script src="../../scripts/login.js"></script>
</body>
</html>