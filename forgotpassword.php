<!DOCTYPE html>
<html>
<head>
	<title>Create New Password</title>
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
include 'model/forgotpasswordM.php';
if(isset($_POST['r_insert']))
{
	echo "button event";
	if(($_POST['pswd'])==($_POST['cpswd']))
	{
    	$pswd=$_POST['pswd'];
  		$r=new forgotpasswordC($pswd);
	}
	else
		echo "Password and confirm Password must be equal";
}
?>
<form method="post" action="forgotpassword.php">
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

		<div class="row" style="margin-top: 50px; ">
			<div class="col-md-6 col-md-offset-3">
				<div class="well well-lg form-group">
					<h1>Confirm  Password</h1><br>
					<br>
					<input type="password" class="form-control" id="pswd" name="pswd" placeholder="New Password" style="height: 50px;"></input>	
					<br>

					<input type="password" class="form-control" id="cpswd" name="cpswd" placeholder="Re-enter Password" style="height: 50px;"></input>	
					<br>
					<center><button type="submit" id="r_insert" name="r_insert" class="btn btn-primary" style="width: 300px; height: 50px; font-size: 20px;">Confirm</button>
					<br>
					Don't have an account? <a class="btn btn-link" href="signup.php">Sign Up</a></center>
				</div>
			</div>
		</div>	


		<footer style="margin-top: 200px; height: 200px; color:white; background-color: #2c3e50;">
			Devloped By BrainCoders
		</footer>

	</div>
	</form>
</body>
</html>