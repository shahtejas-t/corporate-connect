<?php
include'include/connect.php'; 
include'model/matchmakingM.php';
$matchmaking_obj = new Matchmaking();
$indu_ser='';
$database = new Database();
$display=array();
?>

<!DOCTYPE html>
<html>
<head>
	<title>MatchMaking</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="C:/xampp/htdocs/hackathon/js/countries.js"> </script>
	
	<script language="javascript">
	var search_t;
    $(document).ready(function ()
	{
        $("#search_text").on('keyup',function ()
		{
            var key = $(this).val();

            $.ajax
			({
                url:'handlerl/search.php',
                type:'POST',
                data:'keyword='+key,
                beforeSend:function ()
				{
                    $("#results").slideUp('fast');
                },
                success:function (data)
				{
                    $("#results").html(data);
                    $("#results").slideDown('fast');
                }
            });
        });
    });
	
</script>
	
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
		        <input type="search" class="form-control" placeholder="Search" id="search_text">
		        <div class="input-group-btn">
		          <button class="btn btn-default" type="submit">
		            <i class="glyphicon glyphicon-search"></i>
		          </button>
		        </div>
		      </div>
		    </form>
  		</div>
	</nav>
	
	<div id="results">
		 
	</div>

	<div class="row">
			<div style="" class="col-md-3 col-md-offset-1">
				<h2>Find your partner.</h2>
				<hr>
				<div class="input-group" style="">
		        		<input type="text" class="form-control" placeholder="Search">
		        		<div class="input-group-btn">
		          		<button class="btn btn-default" type="submit">
		            	<i class="glyphicon glyphicon-search"></i>
		          		</button>
		        		</div>
		      	</div>
		      	<hr>

			<form name="f1" action="matchmaking.php" method="post">	
				<div class="form-group">
 				  <label for="sel1">Industry:</label>
				    <select class="form-control" id="sel1" name="industry">
					<option value=""> Select Industry </option>
<?php
$industry_name = $matchmaking_obj->insustry_name_fun();
foreach($industry_name as $ind_name)
{ 
				  echo "<option value='".$ind_name['cat_id']."'>$ind_name[cat_name]</option>";

} ?>
					</select>
				<br><br>
				  <label for="sel1">Customer category :</label>
				  <select class="form-control" id="sel1" name="Customer_category">
				  <option value=""> Select Customer Catagory</option>
<?php
$customer_name = $matchmaking_obj->customer_namefun();
foreach($customer_name as $cat_name)
{
			echo "<option value='".$cat_name['cat_id']."'>$cat_name[cat_name]</option>";
}
?>
				  </select>
				<br><br>
				<label for="sel1">Company Stage:</label>
				  <select class="form-control" name="Company_Stage" id="sel1">
				  <option value=""> Company Stage </option>
<?php 
$comp_stg = $matchmaking_obj->company_stage_fun();
foreach($comp_stg as $com_stg)
{
			echo "<option value='".$com_stg['stage_id']."'>$com_stg[stage_name]</option>";
}
?>
				  </select>
				<br><br>
				<label for="sel1">Country:</label>
				<select class="form-control" id="country2" name ="country2">
				<script type="text/javascript">
				populateCountries("country2");
				</script>
				 </select>
				</div>
			<input type="submit" value="submit" name="submit">
</form>


			</div>
			<div class="col-md-7" style="margin-left: 20px;">
				<h1 style="margin-left: 20px;">
					Search Results:
				</h1><br>
<?php
if(isset($_POST['submit']))
{
	$row=array();
	$row_industry=array();
	$row_cust=array();
	$row_stage=array();
	$row_country=array();
	$result_cid=$matchmaking_obj->allCompany();
	if(!empty($_POST['industry']))
	{
		$row_industry=$matchmaking_obj->industry_search($_POST['industry']);
		$result_cid=array_intersect($row_industry,$result_cid);
	}
	if(!empty($_POST['Customer_category']))
	{
		$row_cust=$matchmaking_obj->customer_category($_POST['Customer_category']);
		$result_cid=array_intersect($row_cust,$result_cid);
	}
	if(!empty($_POST['Company_Stage']))
	{
		$row_stage=$matchmaking_obj->company_stage($_POST['Company_Stage']);
		$result_cid=array_intersect($result_cid,$row_stage);
	}
	if($_POST['country2']<>'-1')
	{
		$row_country=$matchmaking_obj->country($_POST['country2']);
		$result_cid=array_intersect($result_cid,$row_country);
	}
	
	$display=array_unique($result_cid);
	display_record($display);
}

/*if(isset($_POST['search']))
{
	$row = $matchmaking_obj->search_cname($_POST['search_text']);
	$display=$matchmaking_obj->display_search_cname($row);
	display_record($display);
}*/

function display_record($display)
{
   if(empty($display))
	{
		echo "<h2> Record Not Found. </h2>";
	}
	else
	{
		foreach($display as &$value)
		{
			global $matchmaking_obj;
			$result = $matchmaking_obj->getdetail($value);
?>
				<div class="well well-sm">
					
					<div class="row">
						<div class="col-md-3" >
							<img src="<?php echo $result[0]['logo']; ?>" class="img-responsive">
						</div>
						<div class="col-md-7 col-md-offset-1">
							<h4><a href=""><?php echo $result[0]['company_name']; ?></a></h4>
							<hr>
							<div>
								<?php echo " ".$result[0]['industry']." | ".$result[1]['industry']." | ".$result[0]['stage']." <br>
								| ".$result[0]['foundation_date']." | ".$result[0]['city']." ".$result[0]['state']." ".$result[0]['zip'] ?>
							</div>
						</div>
					</div>


				</div>
		<?php
		}
   }
}
?>
			</div>
	</div>

</div>
</body>
</html>