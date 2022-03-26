<!DOCTYPE html>
<html>
  <head>
    <title>comp_info</title>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
        <script type= "text/javascript" src="js/countries.js"></script>
    <style type="text/css">
      body{
         background: url('images/connect.png') repeat;
      }
    </style>
  </head>
<body>
  <?php error_reporting(0); ?>
  <?php
session_start();
if(isset($_POST['logout'])) {
      session_destroy();
}
?>
<?php
include 'model/IndustryCatM.php';
include 'model/cmp_infoM.php';
$Ic = new IndustryCatC();
$Indust_row= $Ic->industryf();

$cmpi = new  cmp_infoC();
$cmpInf=$cmpi->getInfo();
if(empty($cmpInf))
$cmpInf=array();
print_r($cmpInf);
if(isset($_POST['save']))
{
  if(!empty($_POST['c_logo']))
  {
    $logo="images\\".$_POST['c_logo'];
    $cmpi->insert_logo($logo);
  }
  if(!empty($_POST['c_p_indust']))
  {
    $c_primary_industry=$_POST['c_p_indust'];
    $cmpi->insert_primary_industry($c_primary_industry);
  }
  if(!empty($_POST['c_s_indust']))
  {
    $c_secondary_industry=$_POST['c_s_indust'];  
    $cmpi->insert_secondary_industry($c_secondary_industry);
  }
  if(!empty($_POST['date_month']) && !empty($_POST['date_year']))
  {
    echo "Month : ".$_POST['date_month'];
    echo "Year : ".$_POST['date_year']; 
    $foundation=$_POST['date_month']."/".$_POST['date_year'];  
    $cmpi->insert_foundation_date($foundation);
  }
  else
  {
    echo "Month : ".$_POST['date_month'];
    echo "Year : ".$_POST['date_year']; 
    echo "please select month and year for foundation of company";
  }
  if(!empty($_POST['address1']))
  {
    $addr1=$_POST['address1'];  
    $cmpi->insert_addr1($addr1);
  }
  if(!empty($_POST['address2']))
  {
    $addr2=$_POST['address2'];  
    $cmpi->insert_addr2($addr2);
  }
  if(!empty($_POST['city']))
  {
    $city=$_POST['city'];
    $cmpi->insert_city($city);  
  }
  if(!empty($_POST['zip']))
  {
    $zip=$_POST['zip'];  
    $cmpi->insert_zip($zip);
  }
  if(!empty($_POST['state']))
  {
    $state=$_POST['state'];
    $cmpi->insert_state($state);  
  }
  if(($_POST['country']) != '-1')
  {
    $country=$_POST['country'];  
    $cmpi->insert_country($country);
  }
  if(!empty($_POST['c_website']))
  {
    $c_website=$_POST['c_website'];  
    $cmpi->insert_website($c_website);
  }
  if(!empty($_POST['c_fb']))
  {
    $c_fb=$_POST['c_fb'];
    $cmpi->insert_fb($c_fb);  
  }
  if(!empty($_POST['c_twitter']))
  {
    $c_twitter=$_POST['c_twitter'];  
    $cmpi->insert_twitter($c_twitter);
  }
  if(!empty($_POST['c_linkedin']))
  {
    $c_linkedin=$_POST['c_linkedin'];  
    $cmpi->insert_linkedin($c_linkedin);
  }
  if(!empty($_POST['c_blog']))
  {
    $c_blog=$_POST['c_blog'];  
    $cmpi->insert_blog($c_blog);
  }
  if(!empty($_POST['contact']))
  {
    $c_contact=$_POST['contact'];  
    $cmpi->insert_contact($c_contact);
  }
  if(!empty($_POST['c_skype']))
  {
    $skype=$_POST['c_skype'];  
    $cmpi->insert_skype($skype);
  }
}

?>
  <div class="container-fluid" >
    <div class="header row">
      <div class="col-md-3"> 
      <a href="index.php"><img src="images/cc.png" /></a>
      </div>
      <div class="col-md-2 col-md-offset-7">
      <a class="btn btn-link btn-lg" href="signup.php" style="margin-top: 20px;" >Logout</a>
      </div>
    </div>
  </div>

    <div class="container-fluid">
      <nav class="cn-quick-header navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
        <ul class="nav navbar-nav">
        <li class="">
        <a href="#">
        Newsfeed
        </a>
        </li>
        <li>
        <a href="#">Search &amp; Matchmaking</a>
        </li>
                <li>
                <a href="#">Social Voting</a>
                </li>
        </ul>
        <form class="navbar-form navbar-right">
          <div class="input-group" style="margin-right: 50px; width: 300px;">
            <input type="search" class="form-control" placeholder="Search" id="search_text">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>

  <div id="results" style="z-index: 2; position: absolute; background-color: white; " class="input-group">
     
  </div>
          </div>
        </form>
      </nav>
  </div>

  <div class="cn-notifications"></div>
    <div class="container-full pos-relative overflow-hidden hide-on-no-js">

      <div class="container-fluid container-padding">

        <div class="row"> 
          <div class="col-xs-8">
          <div>
            <form action="cmp_info.php"  method="post" class="form-horizontal">
              <div class="cn-form-group-wrapper">
                <div class="form-group">
                  <label class="col-xs-3 control-label">
                    Company name
                    <span class="cn-privacy-info text-success-light">Public</span>
                  </label>

                  <div class="col-xs-9">
                    <input class="form-control" type="text" placeholder="company Name" value="<?php echo $_SESSION["cname"];?>" name="cname" id="cname" readonly />      
                  </div>
                </div>

              <div>
              <div class="form-group">
                <label class="col-xs-3 control-label">
                  Logo        
                </label>
                <div class="flow-dropzone">
                  <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>            
                  <div class="col-sm-4">
                    <input type="file" name="c_logo" id="c_logo" />
                  </div>
                </div>        
              </div>
              </div>   
              <hr/>
  
              <div class="form-group">
                <label class="control-label col-xs-3">
                  Primary industry
                  <span class="cn-privacy-info text-success-light">Public</span>
                </label>

                <div class="col-xs-9">
                  <div class="cn-select-wrapper">
            <select class="form-control" name="c_p_indust"  id="c_p_indust">
           <?php if(!empty($cmpInf) && !empty($cmpInf[0]['cat_name']))  ?>
          <option  value="<?php echo $cmpInf[0]['cat_name']; ?>"><?php echo $cmpInf[0]['cat_name']; ?> </option>
          <option value="">Please select a primary industry</option>
<?php foreach ($Indust_row as $Irows) {
    echo "<option value='".$Irows['cat_id']."'>".$Irows['cat_name']."</option>";
} ?>
                    </select>
                  </div>
                </div>  
              </div>

              <div class="form-group">  
                <label class="control-label col-xs-3">
                Secondary industry
                <span class="cn-privacy-info text-success-light">Public</span>
                </label>
                <div class="col-xs-9">
                  <div class="cn-select-wrapper">
                    <select class="form-control" name="c_s_indust" id="c_s_indust">
            <?php if(!empty($cmpInf) && !empty($cmpInf[1]['cat_name']))  ?>
          <option  value="<?php echo $cmpInf[1]['cat_name']; ?>"><?php echo $cmpInf[1]['cat_name']; ?> </option>

          <option value="">Please select a secondary industry</option>
<?php foreach ($Indust_row as $Irows) {
    echo "<option value='".$Irows['cat_id']."'>".$Irows['cat_name']."</option>";
} ?>
                    </select>
                  </div>
                </div>  
              </div>

              <div class="form-group">
                <label class="col-xs-3 control-label">
                Foundation
                <span class="cn-privacy-info text-success-light">Public</span>
                </label>
                <div class="col-xs-9">
                  <div class="form-inline">
                    <div class="form-group">
                    <input type="hidden" name="company[founded_at]" id="company_founded_at" />
                    <div class="cn-select-wrapper">
                      <select id="date_month" name="date_month" class="form-control">
                      <?php if(!empty($cmpInf) && !empty($cmpInf[0]['foundation_date']))
                      { 
                      $fd=array();
                      $fd=explode('/',$cmpInf[0]['foundation_date']);
                      ?>
                      <option value="<?php echo $fd[0]; ?>"><?php echo $fd[0]; ?></option>
                      <?php } ?>
                      <option value="">Month</option>
                      <option value="January">January</option>
                      <option value="February">February</option>
                      <option value="March">March</option>
                      <option value="April">April</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="August">August</option>
                      <option value="September">September</option>
                      <option value="October">October</option>
                      <option value="November">November</option>
                      <option value="December">December</option>
                      </select>
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="cn-select-wrapper">
                        <select id="selectElementId" name="" class="form-control">
                        <?php if(!empty($cmpInf) && !empty($cmpInf[0]['foundation_date']))
                      { ?>
                      <option value="<?php echo $fd[1]; ?>"><?php echo $fd[1]; ?></option>
                      <?php } ?>
                        <option value="">Year</option>
                        <script>
                        var myDate = new Date();
                        var year = myDate.getFullYear();
                        for(var i = 1950; i < year+1; i++){
                        document.write('<option value="'+i+'">'+i+'</option>');
                        }
                        </script>
                        </select>
                      </div>
                    </div>            
                  </div>
                </div>
              </div>    <hr/>

              <div class="form-group">
                <label class="col-xs-3 control-label">
                Address line 1
                <small> (optional)</small>
                <span class="cn-privacy-info text-success-light">Public</span>
                </label>
                <div class="col-xs-9">
                  <input class="form-control" type="text" value="<?php if(!empty($cmpInf) && !empty($cmpInf[0]['addr_l1'])) echo $cmpInf[0]['addr_l1']; ?>" name="address1" id="address1" />     
                </div>
              </div>

              <div class="form-group">
                <label class="col-xs-3 control-label">
                Address line 2
                <small> (optional)</small>
                <span class="cn-privacy-info text-success-light">public</span>
                </label>
                <div class="col-xs-9">
                  <input class="form-control" type="text" value="<?php if(!empty($cmpInf) && !empty($cmpInf[0]['addr_l2'])) echo $cmpInf[0]['addr_l2']; ?>" name="address2" id="address2" />      
                </div>
              </div>

              <div class="form-group">
                <label class="col-xs-3 control-label">
                City
                <span class="cn-privacy-info text-success-light">Public</span>
                </label>
                <div class="col-xs-9">
                  <input class="form-control" type="text" value="<?php if(!empty($cmpInf) && !empty($cmpInf[0]['city'])) echo $cmpInf[0]['city']; ?>" name="city" id="city" />      
                </div>
              </div>

              <div class="form-group">
                <label class="col-xs-3 control-label">
                ZIP<br/>
                <small> (optional)</small>
                <span class="cn-privacy-info text-success-light">Public</span>
                </label>

                <div class="col-xs-9">
                  <input class="form-control" type="text" value="<?php if(!empty($cmpInf) && !empty($cmpInf[0]['zip'])) echo $cmpInf[0]['zip']; ?>" name="zip" id="zip" />
                </div>
              </div>    
              <div class="form-group">
                <label class="col-xs-3 control-label">
                  Country
                  <span class="cn-privacy-info text-success-light">Public</span>
                </label>
                <div class="col-xs-9">
                  <div class="cn-select-wrapper">
                    <select id="country" name="country" class="form-control">
           <?php if(!empty($cmpInf) && !empty($cmpInf[0]['country']))?>
          <option  value="-1"><?php echo $cmpInf[0]['country']; ?> </option>
          </select>
                  </div>
                </div>
              </div>
    
              <div class="form-group">
                  <label class="col-xs-3 control-label">
                  State
                  <small> (optional)</small>
                  <span class="cn-privacy-info text-success-light">Public</span>
                  </label>
                  <script type="text/javascript">
                    populateCountries("country","state");
                  </script>
                  <div class="col-xs-9">
                    <select class="form-control" name="state" id="state">
                      <?php if(!empty($cmpInf) && !empty($cmpInf[0]['state']))?>
          <option  value="-1"><?php echo $cmpInf[0]['state']; ?> </option>
                    </select>                  
                  </div>
              </div>
                <hr/>

              <div class="form-group">
                <label class="col-xs-3 control-label">
                  Company website
                  <small> (optional)</small>
                  <span class="cn-privacy-info text-success-light">Public</span>
                </label>

                <div class="col-xs-9">
                  <input class="form-control" value="<?php if(!empty($cmpInf) && !empty($cmpInf[0]['company_website'])) echo $cmpInf[0]['company_website']; ?>" type="url" name="c_website" id="c_website" />               
                </div>
              </div>  

              <div class="form-group">
                <label class="col-xs-3 control-label">
                Company blog
                <small> (optional)</small>
                <span class="cn-privacy-info text-success-light">Public</span>
                </label>
                <div class="col-xs-9">
                  <input class="form-control" value="<?php if(!empty($cmpInf) && !empty($cmpInf[0]['blog'])) echo $cmpInf[0]['blog']; ?>" type="url" name="c_blog" id="c_blog" />        
                </div>
              </div>

              <div class="form-group">
                <label class="col-xs-3 control-label">
                Telephone number
                <small> (optional)</small>
                <span class="cn-privacy-info text-success-light"> Public </span>
                </label>
                <div class="col-xs-9">
                  <input class="form-control" value="<?php if(!empty($cmpInf) && !empty($cmpInf[0]['contact'])) echo $cmpInf[0]['contact']; ?>" type="text" name="contact" id="contact" />      
                </div>
              </div>
              <hr/>
              <div class="form-group">
                <label class="col-xs-3 control-label">
                Social media channels
                <small> (optional)</small>
                <span class="cn-privacy-info text-success-light">Public</span>
                </span>
                </label>
                <div class="col-xs-9">                      
                  Facebook<input type="text" class="form-control" value="<?php if(!empty($cmpInf) && !empty($cmpInf[0]['fb'])) echo $cmpInf[0]['fb']; ?>" name="c_fb" id="c_fb"/></div>
                  <div class="col-xs-3"></div>
                  <div class="col-xs-9">Twitter<input type="text" value="<?php if(!empty($cmpInf) && !empty($cmpInf[0]['twitter'])) echo $cmpInf[0]['twitter']; ?>" class="form-control" name="c_twitter" id="c_twitter"/></div>
                  <div class="col-xs-3"></div>
                  <div class="col-xs-9">LinkedIn<input type="text" value="<?php if(!empty($cmpInf) && !empty($cmpInf[0]['linkedin'])) echo $cmpInf[0]['linkedin']; ?>" class="form-control" name="c_linkedin" id="c_linkedin"/></div>
                  <div class="col-xs-3"></div>
                  <div class="col-xs-9">Skype<input type="text" value="<?php if(!empty($cmpInf) && !empty($cmpInf[0]['skype'])) echo $cmpInf[0]['skype']; ?>" class="form-control" name="c_skype" id="c_skype"/></div>
              </div>
            </div>
          </div>
          <hr/>
          <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
              <button  id="save" name="save" type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>      
        <div class="alert alert-info" role="alert">
            <center>
            <div class="container">
              <div class="col-xs-9">
               Please don't forget to save your changes.
            </div>
          </center>
          </div>        
      </div>     
    </div>
  </div>
</div>
<div class="container-full"></div>
</body>
</html>