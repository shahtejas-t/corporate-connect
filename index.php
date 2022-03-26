<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <script type="text/javascript" src="js/particle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!--
	
	<script type="text/javascript" src="js/particle.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  -->
	<style type="text/css">
	body{
  			  	background: url('images/connect.png') repeat;
  		}
#particle-canvas {
  width: 100%;
  height: 300px;
}
.header{
	width: 100%;
	height: 20%;
}

	</style>


</head>
<body>
	<div class="container-fluid">
		<div class="header row">
			<div class="col-md-3"> 
				<a href="index.php"><img src="images/cc.png" /></a>
			</div>
			<div class="col-md-2 col-md-offset-7">
				<a class="btn btn-link btn-lg" href="login.php" style="margin-top: 20px;">Login</a>
				<a class="btn btn-link btn-lg" href="signup.php" style="margin-top: 20px;" >Sign Up</a>
			</div>
		</div>
		<div  style="z-index: 2; position: absolute; color: white; text-align: center; margin-top: 70px;">
			<h1 style="text-indent: 250px;">Join the community of Entrepreneurs and Corporates.</h1>
			<h5 style="text-indent: 250px;">Join the global innovation platform where 
											digital startups and leading corporations connect.</h5>
		</div>
		<div id="particle-canvas">

		</div>
		<br>
		<div class="col-mid-3 col-md-offset-4">
		<h1>Why Corporate Connect? </h1>
		 <ul class="nav nav-pills">
    		<li class="active"><a data-toggle="pill" href="#startup"  style="width: 200px; font-size: 20px;">as a Start Up</a></li>
    		<li><a data-toggle="pill" href="#corporate" style="width: 200px; font-size: 20px;">as a Corporates</a></li>
  		 </ul>
  		</div>
  		<br>
  <div class="tab-content">
    <div id="startup" class="tab-pane fade in active">
      <div class="row">
			<div class="col-md-4">
					<div class="jumbotron">
  						<h2>Get Discovered</h2> 
  						<p>Sign up to join the global Corporate Connect community, get exclusive access to leading corporations.</p> 
					</div>
			</div>
			

			<div class="col-md-4">
					<div class="jumbotron">
  						<h2>Get matched</h2> 
  						<p>Specify your needs for collaboration and we will connect you with the ones who help you realize your ideas.</p> 
					</div>
			</div>

			<div class="col-md-4">
					<div class="jumbotron">
  						<h2>Boost your business</h2> 
  						<p>Take your business to the next level by leveraging the capacities and longstanding experience of established corporations.</p> 
					</div>
			</div>
		</div>
    </div>
    <div id="corporate" class="tab-pane fade">
      <div class="row">
			<div class="col-md-4">
					<div class="jumbotron">
  						<h2>Boost innovation</h2> 
  						<p>Accelerate your pace of innovation as we connect you with pioneering entrepreneurs.</p>
					</div>
			</div>
			

			<div class="col-md-4">
					<div class="jumbotron">
  						<h2>Gain insights</h2> 
  						<p>Learn about new innovative business models and the application of state-of-the-art technologies for your sustainable growth.</p> 
					</div>
			</div>

			<div class="col-md-4">
					<div class="jumbotron">
  						<h2>Be Inspired</h2> 
  						<p>Open up to new trends and impulses to find out what’s shaping the digital economy and future business.</p> 
					</div>
			</div>
		</div>
    </div>
    
  </div>




		<footer style="margin-top: 200px; height: 200px; color:white; background-color: #2c3e50;">	
			Devloped By BrainCoders
		</footer>
	
	</div>
	


	  <script type="text/javascript">
	  	var canvasDiv = document.getElementById('particle-canvas');
		var options = {
  		particleColor: '#d5d5d5',
  		background: 'images/homepagebg.jpg',
  		interactive: true,
  		speed: 'medium',
  		density: 'high'
		};
		var particleCanvas = new ParticleNetwork(canvasDiv, options);
	  </script>
	  
</body>
</html>