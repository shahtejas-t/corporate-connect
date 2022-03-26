<!DOCTYPE html>
<html>
<head>
	<title>Verify Account</title>
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
if(isset($_POST['submit']))
{
	include 'model/otpM.php';
	if(!empty($_POST['otpV']))
	{

		$otp=$_POST['otpV'];
  		$r=new otpC($otp);
	}
	
else
	echo "Please Enter OTP value";
}  
?>
<form method="post" action="otp.php">
	<div class="container-fluid" >
		<div class="header row">
			<div class="col-md-3"> 
				<a href="index.php"><img src="images/cc.png" /></a>
			</div>
			<div class="col-md-2 col-md-offset-7">
				<a class="btn btn-link btn-lg" href="login.php" style="margin-top: 20px;">Login</a>
				<a class="btn btn-link btn-lg" href="signup.php" style="margin-top: 20px;" >Sign Up</a>
			</div>
		</div><br><br>
	<div class="col-md-4 col-md-offset-4">
	<center>	<h1>Verify Your Account.</h1>
				<hr style="margin-left:30px; width: 30%;" />
				<div class="form-group">
				  <input type="password"  class="form-control" id="otpV" name="otpV" placeholder="Enter OTP"><br><br>
				  <input type="submit" value="Verify" id="submit" name="submit" class="btn btn-success" style="width: 60%; height: 40px;"></input>
				</div>
	</center>
	</div>
	</div>
</form>
</body>
</html>