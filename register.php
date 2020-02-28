<?php
include("includes/config.php");

include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account=new Account($con);


include("includes/handler/registor-handler.php");
include("includes/handler/login-handler.php");

function getInputValue($name){
	if(isset($_POST[$name])){
		echo $_POST[$name];
	}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Login Yourself!</title>
	<link rel="stylesheet" type="text/css" href="assests/css/register.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script  src="assests/js/register.js"></script>
</head>
<body>

	<?php
	if(isset($_POST['registorbutton'])){
		echo '<script>
		$(document).ready(function(){
		
		$("#loginform").hide();
		$("#resgistorform").show();
		
		});
			</script>';
		}
		else{
			echo '<script>
		$(document).ready(function(){
		
		$("#loginform").show();
		$("#resgistorform").hide();
		
		});
			</script>';
		}
		
		?>
	
	<div id="background">
			<div id="logincontainer">
				<div id="inputcontainer">
					
						<form id="loginform" action="register.php" method="POST">
							<h2>Login to your account</h2>
							<p>
								<?php echo $account->getError(Constants::$loginfailed); ?>
								<label for="loginusername">Username</label>
								<input type="text" name="loginusername" id="loginusername" placeholder="e.g. jack willson" value="<?php getInputValue('loginusername')?>" required>
							</p>

							<p>
								<label for="loginpassword">Password</label>
								<input type="password" name="loginpassword" id="loginpassword"  placeholder="password" required>
							</p>
							<button type="submit" name="logibutton">Log In</button>
								<div class="hasaccounttext">
									<span id="hidelogin">Don't have an account yet? Signup here</span>
								</div>

						</form>






						<form id="resgistorform" action="register.php" method="POST">
							<h2>Create Your Free Account</h2>
								<p>
									<?php echo $account->getError(Constants::$usernameCharacter); ?>
									<?php echo $account->getError(Constants::$usernametaken); ?>

									<label for="username">Username</label>
									<input type="text" name="username" id="username" placeholder="e.g. jack willson" value="<?php getInputValue('username')?>" required>
								</p>

								<p>
									<?php echo $account->getError(Constants::$firstnameCharacter); ?>
									<label for="firstname">First name</label>
									<input type="text" name="firstname" id="firstname" placeholder="e.g. jack " value="<?php getInputValue('firstname')?>" required>
								</p>

								<p>
									<?php echo $account->getError(Constants::$lastnameCharacter); ?>
									<label for="lastname">Last name</label>
									<input type="text" name="lastname" id="lastname" placeholder="e.g.  willson" value="<?php getInputValue('lastname')?>" required>
								</p>

								<p>
									<?php echo $account->getError(Constants::$emailDoNotMatch); ?>
									<?php echo $account->getError(Constants::$emailInvalid); ?>
									<?php echo $account->getError(Constants::$emailtaken); ?>

									<label for="email">E-mail</label>
									<input type="email" name="email" id="email" placeholder="e.g. jackwillson@gmail.com" value="<?php getInputValue('email')?>" required>
								</p>

								<p>
									<label for="email2">Confirm email</label>
									<input type="email" name="email2" id="email2"  placeholder="e.g. jackwillson@gmail.com" value="<?php getInputValue('email2')?>" required>
								</p>

								<p>
									<?php echo $account->getError(Constants::$passwordCharacters); ?>
									<?php echo $account->getError(Constants::$passwordsNotAlphnumeric); ?>
									<?php echo $account->getError(Constants::$passwordDoNotMatch); ?>

									<label for="password">Password</label>
									<input type="password" name="password" id="password" placeholder="your password" value="<?php getInputValue('password')?>" equired>
								</p>

								<p>
									<label for="password2">Confirm Password</label>
									<input type="password" name="password2" id="password2" placeholder="Confirm your password" value="<?php getInputValue('password2')?>" required>
								</p>


									<button type="submit" name="registorbutton">Sign Up</button>
										<div class="hasaccounttext">
											<span id="hideregister">Already have an account here? Login here</span>
											</div>
						</form>
					
				</div>

				<div id="loginText">
					<h1>Get great music, right now</h1>
					<h2>listen loads of songs for free</h2>
					<ul>
						<li>Discover music you will fall in love with</li>
						<li>Create your own playlist</li>
						<li>Follow artist to keep up to date</li>

					</ul>
				</div>
			</div>

	</div>


</body>
</html>