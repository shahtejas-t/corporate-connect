<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
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
<?php
session_start();
if(isset($_POST['logout'])) {
      session_destroy();
}
?>
<?php
include 'model/signupM.php';
if(isset($_POST['r_insert']))
{
	if(strrchr($_POST['cemail'], '@'))
	{
	if(($_POST['pswd'])==($_POST['cpswd']))
	{

		$cname=$_POST['cname'];
    	$cemail=$_POST['cemail'];
    	$pswd=$_POST['pswd'];
  		$r=new signupC($cname,$cemail,$pswd);
	}
	else
		echo "Password and confirm Password must be equal";
}
else
	echo "Invalid E-mail address";
}  
?>
<form method="post" action="signup.php">
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
				<h1 style="padding-top: 50px; margin-left: 30px;">Join the global innovation platform where <br>digital startups and leading corporations connect.</h1>
				<hr style="margin-left:30px; width: 60%; border: 0.5px solid #000" />
		<br>
		<div class="row">
		<div class="col-md-4 col-md-offset-1 form-group"> 
		
					<input type="text" class="form-control" id="cname" name="cname" placeholder="Company Name" style="height: 50px;"></input>	
					<br>
					<input type="email" class="form-control" id="cemail" name="cemail" placeholder="Email" style="height: 50px;"></input>	
					<br>
					<input type="password" class="form-control" id="pswd" name="pswd" placeholder="Password" style="height: 50px;"></input>	
					<br>
					<input type="password" class="form-control" id="cpswd" name="cpswd" placeholder="Confirm Password" style="height: 50px;"></input>	
					<br>
					<center><button type="submit" id="r_insert" name="r_insert" class="btn btn-primary" style="width: 300px; height: 50px; font-size: 20px;">Sign Up</button>	
					<br>
					Already have an account? <a class="btn btn-link" href="login.php">Sign In</a></center>		

			</div>
		</div>

		<footer style="margin-top: 200px; height: 200px; color:white; background-color: #2c3e50;">
			Devloped By BrainCoders
		</footer>

	</div>
	</form>
</body>
</html>