<?php
include 'model/LoginM.php';
if(isset($_POST['submit']))
{
	if(strrchr($_POST['cemail'], '@'))
	{
    	$cemail=$_POST['cemail'];
    	$pswd=$_POST['pswd'];
  		$l=new LoginC($cemail,$pswd);
	}
	else
		echo "Invalid E-mail address";
}  
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		body{
  			  	background: url('images/connect.png') repeat;
  		}
  	</style>
</head>
<body>
	<div class="container-fluid" >
		<div class="header row">
			<div class="col-md-3"> 
				<a href="index.php"><img src="images/cc.png" /></a>
			</div>
			<div class="col-md-2 col-md-offset-7">
				<a class="btn btn-link btn-lg" href="login.php" style="margin-top: 20px;">Login</a>
				<a class="btn btn-link btn-lg" href="signup.php" style="margin-top: 20px;" >Sign Up</a>
			</div>
		</div>
		
		<form name="f" action="Login.php" method="post">

		<div class="row" style="margin-top: 50px; ">
			<div class="col-md-6 col-md-offset-3">
				<div class="well well-lg form-group">
					<h1>Sign In</h1><br>
					<input type="email" class="form-control" id="usr" name="cemail" placeholder="Email" style="height: 50px;"></input>	
					<br>
					<input type="password" class="form-control" id="pwd" name="pswd" placeholder="Password" style="height: 50px;"></input>	
					
					<a class="btn btn-link" href="email.php">Forgot Password?</a>
					<br>
					<center><input type="submit" value="Sign In" name="submit" class="btn btn-primary" style="width: 300px; height: 50px; font-size: 20px;">
										<br>
					Don't have an account? <a class="btn btn-link" href="signup.php">Sign Up</a></center>
				</div>
			</div>
		</div>
		</form>	


		<footer style="margin-top: 200px; height: 200px; color:white; background-color: #2c3e50;">
			Devloped By BrainCoders
		</footer>

	</div>
</body>
</html>