<?php

session_start();
if(isset($_POST['logout'])) {
      session_destroy();
}
?>	

<?php 
include'model/social_votingM.php';


$so_wrk_obj=new so_wrk();

$result=$so_wrk_obj->detail();

$_SESSION["calling_page"]=$_SERVER['PHP_SELF'];

?>


<!DOCTYPE html>
<html>
<head>
	<title>Company Details</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="cc/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		body{
  			 background: url('connect.png') repeat;
  		}


hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
}
</style>
</head>
<body>
<div class="container-fluid">
 <div class="header row">
			<div class="col-md-3"> 
				<a href="index.php"><img src="cc.png" /></a>
			</div>
			<div class="col-md-2 col-md-offset-7">
				<a class="btn btn-link btn-lg" href="signup.php" style="margin-top: 20px;" >Logout</a>
			</div>
		</div>

  <nav class="navbar navbar-inverse ">
      <div class="container-fluid">
        
          <ul class="nav navbar-nav">
              <li class="active" style="margin-left: 70px;"><a href="#">Newsfeed</a></li>
              <li><a href="#" style="margin-left: 30px;">Matchmaking</a></li>
              <li><a href="#" style="margin-left: 30px;">Page 2</a></li>
          </ul>

        <div class="navbar-form navbar-right">
          <div class="input-group" style="margin-right: 50px;">
            <input type="text" class="form-control" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
          </div>
		  
        </form>

      </div>
  </nav>
 
	<div class="row">
			<div class="col-md-7">
					<h2>company name and profile</h2>
					
						<div class="panel panel-default" class="col-md-7">
						
		  
 <?php
 foreach($result as $row)
 {
?>				
                            <form name="vote" method="POST" action="Displayprofile.php">
							<div class="panel-body">
								<img src="<?php echo $row['logo']; ?>" style="width:100px">							
								<div><span><?php echo $row['company_name']; ?></span></div> 
								<p><?php echo $row['company_ovrview']; ?></p>
							    <input type="hidden" name="hvote" value="<?php echo $row['company_id']; ?>">
								<a href><i class="fa fa-globe fa-2x" aria-hidden="true"></i></a>
								<a href><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>  			
								<a href><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>  			
								<a href><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a> 
								
								<div style="text-align: right">
								<button id="mk_details" type="submit" class="btn btn-default" name="submit" >More Details </button>
															</div>
															<hr/>
							</div>
							</form>
 <?php
 } ?>	
						

                       </div>
		</div>	
					
	

		<!--<div class="col-md-4" style="margin-right:20px">
				<div class="panel panel-default">
					<div class="panel-body">
					<form>
					<div class="navbar-form navbar-left">
						<div class="input-group" style="margin-right: 50px;">
							<input type="text" class="form-control" placeholder="Search">
								<div class="input-group-btn">
								<button class="btn btn-default" type="submit">
								<i class="glyphicon glyphicon-search"></i>
								</button>								
								</div>
						</div>
					</div>					
					</form>						
				</div>
				<div class="panel-body">
					<p>search company along with vote.</p></div>
			</div>
		</div> -->
	</div>
	</div>
</div>
</body>
</html>