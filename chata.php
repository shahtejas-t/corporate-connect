<?php session_start(); ?>
<?php
include 'include/connect.php';
include 'model/chatM.php';

$chat_C_obj = new chatC();

//$database = new Database();

//$reciver_id=6;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Messages</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		body{
  			 background: url('images/connect.png') repeat;
  		}

  		.sender{
  			margin-left: 100px;
  		}
  		.reciver{
  			margin-right: 100px;
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
				<a class="btn btn-link btn-lg" href="signup.php" style="margin-top: 20px;" >Logout</a>
			</div>
		</div>
	


	<nav class="navbar navbar-inverse ">
  		<div class="container-fluid">
    		
    		<ul class="nav navbar-nav">
      			<li class="active" style="margin-left: 70px;"><a href="#">Newsfeed</a></li>
      			<li><a href="matchmaking.php" style="margin-left: 30px;">Matchmaking</a></li>
      			<li><a href="#" style="margin-left: 30px;">Page 2</a></li>
    		</ul>
		    <form class="navbar-form navbar-right">
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
		<div class="col-md-3" style="border-right: 1px solid gray; position: relative; overflow-y: auto; height: 450px;">
			<center><h2 style="padding-bottom: 20px;">Chat History</h2></center>
			<div  id="history_data" >
					
			</div>
				
		</div>
			<div class="col-md-7" style="">
			<div class="panel panel-default" style="width:800px;  ">
			  <div class="panel-heading" style="scroll-behavior: smooth;"><b><?php echo $_SESSION['pro_company']; ?> </b></div>
			  <div class="panel-body" style="height: 400px; overflow-y:scroll; overflow-x: white-space:nowrap;" id="chat_data">
			  							</div>
			</div>
			
			<form name="f1" action="chata.php" method="post">
			<div class="form-group">
				<div class="col-md-9">
					  	<textarea name="msg" style="resize:none;" class="form-control" id="msg" placeholder="Type Your message" cols="50" row="1"  ></textarea>
					  	
				</div>

				<div class="col-md-3">
			 	 	<input type="button" id="submit" class="btn btn-default" onclick="msgsend()" style="width: 100%" value="send"></input>
				</div>
			</div>
		</div>
	</div>
		<footer style="margin-top: 100px; height: 200px; color:white; background-color: #2c3e50;">	
			Devloped By BrainCoders
		</footer>
	</div>
<?php
$reciver_id=$chat_C_obj->getreciverid($_SESSION['pro_company']);
$sender_id = (int)$_SESSION['C_id'];

?>
  	<script type="text/javascript">
  		var s_id;
		var r_id;
		var tmsg;
		$(document).ready(function(){
			s_id = "<?php echo $sender_id; ?>";
			r_id = "<?php echo $reciver_id; ?>";
						$.ajax({
								    type: "POST",
								    data: {
								      sid :s_id
								    },
								    url: "handlers/historychat.php",
								    dataType: "html",
								    async: true,
								    success: function(data) {
								    	//alert(data);
								      //$("#chat_data").append("this is demo");
								      $("#history_data").html(data);
								    }
								  });

		});

						function openchat(){
					   	r_id = document.getElementsByName("cname").value;
						$.ajax({
								    type: "POST",
								    data: {
								      sid :s_id,
								      rid : r_id
								    },
								    url: "handlers/openchat.php",
								    dataType: "html",
								    async: true,
								    success: function(data) {
								    	//alert(data);
								      //$("#chat_data").append("this is demo");
								      $("#chat_data").html(data);
								    }
								  });

					}
									
			function msgsend(){
			 			tmsg = document.getElementById("msg").value;
						$.ajax({
								    type: "POST",
								    data: {
								      msg :tmsg,
								      sid :s_id,
								      rid : r_id
								    },
								    url: "handlers/insertchat.php",
								    dataType: "html",
								    async: true,
								    success: function(data) {
								    	//alert(data);
								      //$("#chat_data").append("this is demo");
								      //$("#chat_data").html(data);
								    }
								  });
							}

					function ajax_call(){
						$.ajax({
								    type: "POST",
								    data: {
								      sid :s_id,
								      rid : r_id
								    },
								    url: "handlers/displaychat.php",
								    dataType: "html",
								    async: true,
								    success: function(data) {
								    	//alert(data);
								      //$("#chat_data").append("this is demo");
								      $("#chat_data").html(data);
								    }
								  });
							}


					
					setInterval(function(){ajax_call()}, 1000); 
		</script>
</body>
</html>