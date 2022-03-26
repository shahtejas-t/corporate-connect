<?php session_start(); ?>

<?php
include 'model/compose_submit.php';
include 'C:/xampp/htdocs/hackathon/include/connect.php';


$database = new Database();
$des='';
$c = new compose();
if(isset($_POST['submit']))
{
	$rev = $_POST['select_c'];	
	$msg = $_POST['msg'];
	$c->insertprob($rev,$msg);
}

if(isset($_POST['reply']))
{
	$_SESSION['pro_company']= $_POST['pro_company'];
	header('location:chat.php');	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
				<a class="btn btn-link btn-lg" href="signup.php" style="margin-top: 20px;" >Logout</a>
			</div>
		</div>
	


	<nav class="navbar navbar-inverse ">
  		<div class="container-fluid">
    		
    		<ul class="nav navbar-nav">
      			<li class="active" style="margin-left: 70px;"><a href="home.php">Newsfeed</a></li>
      			<li><a href="matchmaking.php" style="margin-left: 30px;">Matchmaking</a></li>
      			<li><a href="matchmaking.php" style="margin-left: 30px;">Page 2</a></li>
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
		<div class="col-md-7 col-md-offset-1">
		<form name="f1" method="post" action="home.php">
		<select id="select_c" name="select_c">
<?php 
	
	$database->query("select cat_name from industry_cat");
	
	$result=$database->resultset();
	
	foreach($result as $s)
	{
	
		echo "<option>$s[cat_name]</option>";
	}
?>
</select>
		
		<div class="well well-sm">
					<div class="form-group">
		  						<textarea class="form-control" rows="5" id="msg" name="msg" placeholder="What's new?" maxlength="500" style="resize: none"></textarea>
		  					<input type="submit" class="btn btn-default pull-right" style="width: 100px; margin-top: 10px;" value="post" name="submit"></input>
								</div>
								<br><br>
				
				</div>			

</form>
<?php	
$database->query("select * from problem_statement  order by problem_id desc");
$row=$database->resultset();
foreach($row as $t)
{

?>	
			<hr>
			<div class="row">
<?php
	$database->query('select company_name from company_reg where company_id =:company_id');
	
$database->bind(':company_id', $t['company_id']);
$row = $database->single();
if(($database->rowCount() > 0))
{
	$c_name = $row['company_name'];
}
	//$des = 
	
?>
				<div class="col-md-2">
					<img src="images/cc.png" class="img-responsive">
				</div>
				<div class="col-md-10">
					<div class="well well-sm">
						<div class="form-group">
							<a href="#" class="btn btn-link"><?php /*print company name*/ echo $c_name; ?></a>
				<form name="f_reply" method="post" action="home.php">
				<input type="hidden" value="<?php echo $c_name; ?>" name="pro_company" id="pro_company">
		  					<textarea class="form-control" readonly rows="5" id="#" placeholder="What's new?" maxlength="500" style="resize: none" name="pro_msg"  ><?php /* print problem discription */ echo $t['description']; ?></textarea>

			<input type="submit" class="btn btn-default pull-right" style="margin-top: 10px;" value="Message" name="reply" id="reply" style="disab"></input>

<?php 
//display problem soln
$soln = $c->problem_soln($t['problem_id']);
foreach($soln as $row)
{
?>
			<a href="#" class="btn btn-link"><?php /*print company name*/ echo $row['company_name']; ?></a>			
			
			<textarea class="form-control" readonly rows="5" id="#" placeholder="probem Solun" maxlength="500" style="resize: none" name="pro_msg" none" ><?php /* print problem solution */ echo $row['soln_desc']; ?></textarea>

<?php 
} ?>
			
			<input type="text" name="soln_text" id="soln_text" placeholder="enter your soln">
			
			<input type="submit" class="btn btn-default pull-right" style="margin-top: 10px;" value="Reply" name="soln" id="soln" style="disab"></input>



<?php 
 
if($t['company_id'] == $_SESSION['cid'])
{?>
	 <script language="javascript" >
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    document.getElementById("demo").attr("disabled", "disabled");
</script>
</script>	
<?php }
?>
			</form>

		  			</div><br><br>
				</div>
			</div>
		</div>
<?php } ?>
	</div>
</form>


		<div class="col-md-3" style="background-color: green; margin-left: 30px;">
				
		</div>
	</div>
	</div>
</body>
</html>