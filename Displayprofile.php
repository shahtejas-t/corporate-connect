<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
include 'model/DisplayprofileM.php';

$pd=new profileDisplayC();
if(!empty($_REQUEST['task']))
{
	
	if(strpos($_SESSION['calling_page'] ,("handlers/search.php"))>0 or strpos($_SESSION['calling_page'] ,("matchmaking.php"))>0)
	{
		$temp=$pd->cmopany_reg($_REQUEST['task']);
	}
}
else
{
	$temp=$pd->cmopany_reg($_SESSION['cid']);
}
$ci_row=$pd->getInfo();
$cd_row=$pd->getDetail();
?>
<form method="post" action="profileDisplay.php">
	<div class="container-fluid" >
		<div class="header row">
			<div class="col-md-3"> 
				<a href="index.php"><img src="images/cc.png" /></a>
			</div>
			<div class="col-md-2 col-md-offset-7">
				<a class="btn btn-link btn-lg" href="signup.php" style="margin-top: 20px;" >Logout</a>
			</div>
		</div>
	


	<nav class="navbar navbar-inverse ">
  		<div class="container-fluid">
    		
    		<ul class="nav navbar-nav">
      			<li class="active" style="margin-left: 70px;"><a href="matchmaking.php">Back</a></li>
    
    		</ul>
		    
  		</div>
	</nav>

	

	<div class="row">
		<div class="col-md-3 col-md-offset-2" style="margin-top: 10px;"> 
				<a href="index.php"><img src="images/cc.png" class="img-responsive" /></a>
		</div>
			<div style="margin-top: 10px;" class="col-md-7">
				<h2><?php echo $temp['company_name'];?></h2>
				<hr style="margin-left:10px; width: 60%;" />
			<p>Elevators Speech : <?php echo $cd_row['elevator_pitch'];?> </p><br>
		
  			&nbsp;<?php if(!empty($ci_row[0]['company_website']))
  			{?><a href="<?php echo $ci_row[0]['company_website'];?>"><i class="fa fa-globe fa-2x" aria-hidden="true"></i></a>&nbsp;<?php header("Location: ".$ci_row['fb']);?>
  			<?php } ?>
  			<?php if(!empty($ci_row[0]['fb']))
  			{?>
  			<a href="<?php echo $ci_row[0]['fb'];?>"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>&nbsp;
  			<?php } ?>
  			<?php if(!empty($ci_row[0]['twitter']))
  			{?>
  			<a href="<?php echo $ci_row[0]['twitter'];?>"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>&nbsp;
  			<?php } ?>
  			<?php if(!empty($ci_row[0]['linkedin']))
  			{?>
  			<a href="<?php echo $ci_row[0]['linkedin'];?>"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
  			<?php } ?>
  			<br>	
	    </div>
	</div>    

			<hr style="border: 10px;">

			<ul class="nav nav-tabs col-md-offset-2" style="margin-top: 40px;" >
				<li class="active"><a data-toggle="tab" href="#home"><h4>Profile</h4></a></li>
				<li><a data-toggle="tab" href="#menu1"><h4>Description</h4></a></li>
				<li><a data-toggle="tab" href="#menu2"><h4>Contact Company</h4></a></li>
			</ul>

			<div class="tab-content col-md-offset-2" >
				<div id="home" class="tab-pane fade in active">
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-2 "  >
							<h4>Company </h4>
						</div>
						<div  >
							<h4>Profile </h4>
						</div><hr style="width: 80%">
					</div>
					<div class="row" >
						<div class="col-md-2 "  >
							<div class="row" >
							<h6>Primary Industry </h6></div>
							<div class="row" style="margin-top: 10px;" >
							<h6>Secondary Industry </h6></div>
							<div class="row" style="margin-top: 10px;">
							<h6>Stage </h6></div>
							<div class="row" style="margin-top: 10px;">
							<h6>Address</h6></div>
						</div>
						<div class="row" >
							<div class="col-md-offset-2" class="row" >
							<h6><?php echo $ci_row[0]['cat_name'];?> </h6>
							</div>
							<div class="col-md-offset-2" class="row" style="margin-top: 20px;" >
							<h6><?php echo $ci_row[1]['cat_name'];?> </h6>
							</div>
							<div class="col-md-offset-2" class="row" style="margin-top: 30px;" >
							<h6><?php echo $cd_row['stage_name'];?> </h6>
							</div>
							<div class="col-md-offset-2" class="row" style="margin-top: 30px;" >
							<p><?php echo $ci_row[0]['addr_l1']." , ".$ci_row[0]['addr_l2']." , ".$ci_row[0]['city']." , ".$ci_row[0]['zip']." , ".$ci_row[0]['state']." , ".$ci_row[0]['country'];?> </p>
							</div>
						</div><hr>
					</div>
					
					
					</div>
						<div id="menu1" class="tab-pane fade">
						<h3>Description</h3>
						<p><?php echo $cd_row['company_ovrview'];?></p>
						<h3>Business Model</h3>
						<p><?php echo $cd_row['business_model'];?></p>
					</div>

					<div id="menu2" class="tab-pane fade">
						<h3>Contact Us</h3><hr>
						<div  class="row"  >
							<div class="col-md-2"><h6>Contact No</h6></div>
							<div class="col-md-offset-2"> <h6><?php echo $ci_row[0]['contact'];?></h6></div>
						</div>
						<div  class="row" style="margin-top: 10px;" >
							<div class="col-md-2"><h6>Email</h6></div>
							<div><h6 class="col-md-offset-2"><?php echo $temp['company_email']; ?></h6></div>
						</div>
					</div>
								
				    </div>


</div>
</form>
</body>
</html>