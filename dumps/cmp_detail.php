<!DOCTYPE html>
<html>
<head>
  <title>Company Details</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
      body{
         background: url('images/connect.png') repeat;
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
 <?php
session_start();
if(isset($_POST['logout'])) {
      session_destroy();
}
?>
<?php
include 'model/cmp_detailM.php';
$cd=new cmp_detailC();
$cust_cat=$cd->getCustomerCat();
$product_cat=$cd->getProductCat();
$cstage=$cd->getCompanyStage();
$display_row=$cd->display();
$display_adv=$cd->adv_display();
$display_inv=$cd->inv_display();
$display_pat=$cd->pat_display();
  
if(isset($_POST['submit']))
{
  if (!empty($_POST['cust']) && !empty($_POST['prod']) && !empty($_POST['stage']) && !empty($_POST['epitch']) && !empty($_POST['cdesc']) && !empty($_POST['emp'])) {
    
      $cust=$_POST['cust'];
      $prod=$_POST['prod'];
      $stage=$_POST['stage'];
      $epitch=$_POST['epitch'];
      $cdesc=$_POST['cdesc'];
      $emp=$_POST['emp'];
      $cd->insert_Detail($cust,$prod,$stage,$epitch,$cdesc,$emp);
    }
    else
      echo "samajh nai aata kya sari feilds select karna";
    
    if (!empty($_POST['adv_name1'])) {
      if (!empty($_POST['adv_email1'])) {
        $name=$_POST['adv_name1'];
        $email=$_POST['adv_email1'];
        $pos=$_POST['adv_pos1'];
        $web=$_POST['adv_web1'];
        $cd->adv_Insert($name,$email,$pos,$web);
      }
      else
        echo "please Enter Email";
    }
    
    if (!empty($_POST['adv_name2'])) {
      if (!empty($_POST['adv_email2'])) {
        $name=$_POST['adv_name2'];
        $email=$_POST['adv_email2'];
        $pos=$_POST['adv_pos2'];
        $web=$_POST['adv_web2'];
        $cd->adv_Insert($name,$email,$pos,$web);
      }
      else
        echo "please Enter Email";
    }

    if (!empty($_POST['adv_name3'])) {
      if (!empty($_POST['adv_email3'])) {
        $name=$_POST['adv_name3'];
        $email=$_POST['adv_email3'];
        $pos=$_POST['adv_pos3'];
        $web=$_POST['adv_web3'];
        $cd->adv_Insert($name,$email,$pos,$web);
      }
      else
        echo "please Enter Email";
    }

    if (!empty($_POST['inv_name1'])) {
      if (!empty($_POST['inv_email1'])) {
        $name=$_POST['inv_name1'];
        $email=$_POST['inv_email1'];
        $pos=$_POST['inv_pos1'];
        $web=$_POST['inv_web1'];
        $cd->inv_Insert($name,$email,$pos,$web);
      }
      else
        echo "please Enter Email";
    }

    if (!empty($_POST['inv_name2'])) {
      if (!empty($_POST['inv_email2'])) {
        $name=$_POST['inv_name2'];
        $email=$_POST['inv_email2'];
        $pos=$_POST['inv_pos2'];
        $web=$_POST['inv_web2'];
        $cd->inv_Insert($name,$email,$pos,$web);
      }
      else
        echo "please Enter Email";
    }

    if (!empty($_POST['inv_name3'])) {
      if (!empty($_POST['inv_email3'])) {
        $name=$_POST['inv_name3'];
        $email=$_POST['inv_email3'];
        $pos=$_POST['inv_pos3'];
        $web=$_POST['inv_web3'];
        $cd->inv_Insert($name,$email,$pos,$web);
      }
      else
        echo "please Enter Email";
    }

    if (!empty($_POST['pat_name1'])) {
      if (!empty($_POST['pat_email1'])) {
        $name=$_POST['pat_name1'];
        $email=$_POST['pat_email1'];
        $pos=$_POST['pat_pos1'];
        $web=$_POST['pat_web1'];
        $cd->pat_Insert($name,$email,$pos,$web);
      }
      else
        echo "please Enter Email";
    }

    if (!empty($_POST['pat_name2'])) {
      if (!empty($_POST['pat_email2'])) {
        $name=$_POST['pat_name2'];
        $email=$_POST['pat_email2'];
        $pos=$_POST['pat_pos2'];
        $web=$_POST['pat_web2'];
        $cd->pat_Insert($name,$email,$pos,$web);
      }
      else
        echo "please Enter Email";
    }

    if (!empty($_POST['pat_name3'])) {
      if (!empty($_POST['pat_email3'])) {
        $name=$_POST['pat_name3'];
        $email=$_POST['pat_email3'];
        $pos=$_POST['pat_pos3'];
        $web=$_POST['pat_web3'];
        $cd->pat_Insert($name,$email,$pos,$web);
      }
      else
        echo "please Enter Email";
    }

} 
?>
 <script type="text/javascript">

 //for advisor
$(document).ready(function(){

$("#advisor2").hide();
$("#advisor3").hide();
 $("#add1").hide();
   

    $("#del1").click(function(){
      $("#advisor1").hide();
      $("#add1").show();
      $("#adv_name1").val("");
      $("#adv_pos1").val("");
      $("#adv_email1").val("");
      $("#adv_web1").val("");   
      });

    $("#add1").click(function(){
       $("#advisor1").show();});

    $("#add2").click(function(){
       $("#advisor2").show();});

    $("#del2").click(function(){
        $("#advisor2").hide();
      $("#adv_name2").val("");
      $("#adv_pos2").val("");
      $("#adv_email2").val("");
      $("#adv_web2").val("");
      });

    $("#add3").click(function(){
       $("#advisor3").show();});

    $("#del3").click(function(){
        $("#advisor3").hide();
      $("#adv_name3").val("");
      $("#adv_pos3").val("");
      $("#adv_email3").val("");
      $("#adv_web3").val("");
      });
});

//for investor
$(document).ready(function(){


$("#investor2").hide();
$("#investor3").hide();
$("#iadd1").hide();
   

    $("#idel1").click(function(){
      $("#investor1").hide();
       $("#iadd1").show();
      $("#inv_name1").val("");
      $("#inv_pos1").val("");
      $("#inv_email1").val("");
      $("#inv_web1").val("");
    });

    $("#iadd1").click(function(){
       $("#investor1").show();});

    $("#iadd2").click(function(){
       $("#investor2").show();});

    $("#idel2").click(function(){
        $("#investor2").hide();
      $("#inv_name2").val("");
      $("#inv_pos2").val("");
      $("#inv_email2").val("");
      $("#inv_web2").val("");
      });

    $("#iadd3").click(function(){
       $("#investor3").show();});

    $("#idel3").click(function(){
        $("#investor3").hide();
      $("#inv_name3").val("");
      $("#inv_pos3").val("");
      $("#inv_email3").val("");
      $("#inv_web3").val("");
      });
  });

    //for partner
    $(document).ready(function(){


$("#partner2").hide();
$("#partner3").hide();
$("#padd1").hide();
   

    $("#pdel1").click(function(){
      $("#partner1").hide();
       $("#padd1").show();
      $("#pat_name1").val("");
      $("#pat_pos1").val("");
      $("#pat_email1").val("");
      $("#pat_web1").val("");
    });

    $("#padd1").click(function(){
       $("#partner1").show();});

    $("#padd2").click(function(){
       $("#partner2").show();});

    $("#pdel2").click(function(){
        $("#partner2").hide();
      $("#pat_name2").val("");
      $("#pat_pos2").val("");
      $("#pat_email2").val("");
      $("#pat_web2").val("");    
    });

    $("#padd3").click(function(){
       $("#partner3").show();});

    $("#pdel3").click(function(){
        $("#partner3").hide();
            $("#pat_name3").val("");
      $("#pat_pos3").val("");
      $("#pat_email3").val("");
      $("#pat_web3").val("");
});
 
});
</script>
<form method="post" action="cmp_detail.php">
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


<div class="container-full pos-relative overflow-hidden hide-on-no-js">

     <div class="container-fluid container-padding">

        <div class="row">
           <div class="col-xs-8" cn-i18n=''>
              <div>

                <form name="form" autocomplete="off" novalidate="novalidate" class="form-horizontal" id="edit_company_1874" action="cmp_detail.php" accept-charset="UTF-8" method="post">

                    <div class="cn-form-group-wrapper">

    

                      <div class="form-group">
                          <label class="control-label col-xs-3">
                            Customer category
                          </label>

                         <div class="col-xs-9">
                              <div class="cn-select-wrapper">
                                  <select class="form-control" name="cust" id="company_customer_segment_id">
                                  <?php
                                    if(!empty($display_row['customer_name']))
                                    {?>
                                      <option value= "<?php echo $display_row['customer_id']; ?>">
                                      <?php echo $display_row['customer_name']; ?></option>;
                                    <?php } ?>
                                  <option value="">Please select your type of customers</option>
                                    <?php foreach ($cust_cat as $cc) {
                                      echo "<option value='".$cc['cat_id']."'>".$cc['cat_name']."</option>";
                                    }?> 
                                     <!-- <option value="1">B2B</option>
                                      <option value="2">B2C</option>
                                      <option value="3">B2B and B2C</option>
                                      <option value="4">B2G</option>--></select>
                              </div>
                          </div>
                          <span ng-cloak class="fa fa-check form-control-feedback" ></span>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-xs-3">
                            Product category
                          </label>

                          <div class="col-xs-9">
                              <div class="cn-select-wrapper">
                                  <select class="form-control" name="prod" id="company_product_component_id">
                                  <?php
                                    if(!empty($display_row['product_name']))
                                    {?>
                                      <option value= "<?php echo $display_row['product_id']; ?>">
                                      <?php echo $display_row['product_name']; ?></option>;
                                    <?php } ?>
                                  <option value="">Please select your type of product</option>
                                      <?php foreach ($product_cat as $pc) {
                                      echo "<option value='".$pc['cat_id']."'>".$pc['cat_name']."</option>";
                                    }?>
                                      <!--<option value="1">Hardware</option>
                                      <option value="2">Software</option>
                                      <option value="3">Hardware &amp; Software</option>--></select>
                              </div>
                          </div>
                          <span ng-cloak class="fa fa-check form-control-feedback" ></span>
                      </div>


                      <div class="form-group" >
                          <label class="control-label col-xs-3" >
                            Company stage
                              <span class="fa fa-info-circle" ></span>
                          </label>

                          <div class="col-xs-9">  
                              <div class="cn-select-wrapper" >
                              <select class="form-control" name="stage" id="company_company_stage_id">
                               <?php
                                    if(!empty($display_row['stage_name']))
                                    {?>
                                      <option value= "<?php echo $display_row['stage_id']; ?>">
                                      <?php echo $display_row['stage_name']; ?></option>;
                                    <?php } ?>
                                    <option value="" >Please select a company stage</option>
                                      <?php foreach ($cstage as $cstg) {
                                      echo "<option value='".$cstg['stage_id']."'>".$cstg['stage_name']."</option>";
                                    }?>
                                    <!--<option value="1">Concept stage (got an idea)</option>
                                    <option value="2">Seed stage (working on product)</option>
                                    <option value="3">Early stage (close to market)</option>
                                    <option value="4">Growth stage (we&#39;re out there &amp; making cash)</option>
                                    <option value="5">USD 50k in TTM Revenue</option>
                                    <option value="6">USD 100k in TTM Revenue</option>
                                    <option value="7">USD 250k in TTM Revenue</option>
                                    <option value="8">USD 500k in TTM Revenue</option>
                                    <option value="9">USD 1M in TTM Revenue</option>
                                    <option value="10">USD 5M in TTM Revenue</option>
                                    <option value="11">USD 10M+ in TTM Revenue</option>-->
                              </select>
                              </div>
                          </div>
                          <span ng-cloak class="fa fa-check form-control-feedback" ng-show="model.company_stage_id > 0"></span>
                      </div>

                      <div class="form-group">
                           <label class="col-xs-3 control-label">Number of employees</label>
    
                           <div class="col-xs-9">
                                <div class="cn-select-wrapper" >
                                  <select name="emp" class="form-control" >
                                  <?php
                                    if(!empty($display_row['no_of_emp']))
                                    {?>
                                      <option value= "<?php echo $display_row['customer_id']; ?>">
                                      <?php echo $display_row['no_of_emp']; ?></option>;
                                    <?php } ?>
                                      <option value="">Please select a number of employees</option>
                                      <option value="1-10">1-10</option>
                                      <option value="10-50">10-50</option>
                                      <option value="50-100">50-100</option>
                                      <option value="100+">100+</option>                                      
                                  </select>
                                  <span class="fa fa-check form-control-feedback" ></span>
                                </div>
                           </div>
                      </div>

                      <div class="form-group">
                          <label class="col-xs-3 control-label">Elevator pitch (business or product)</label>
                          <div class="col-xs-9">
                            <textarea style="resize: none;" class="form-control " name="epitch" 
                           value ="<?php if(!empty($display_row['elevator_pitch'])) {
                              echo $display_row['elevator_pitch'];
                            } ?>" placeholder="Please pitch your business and USP to us" id="company_elevator_pitch">
    
                            
                            </textarea>
                          </div>
                      </div>

                    <div class="form-group" >
                        <label class="col-xs-3 control-label">
                          <span class="translation_missing" title="translation missing: en.activerecord.attributes.company.company_overview">Company Description</span>
                        </label>
                        <div class="col-xs-9">
                          <textarea class="form-control " name="cdesc" placeholder="Please provide a brief overview of your business. You might like to include your business model, structure and products/services..." id="company_overview">
                            <?php if(!empty($display_row['company_ovrview'])) {
                              echo $display_row['company_ovrview'];
                            } ?>
                          </textarea>
                        </div>
                    </div>

                    <div class="form-group" class="col-xs-9" style="margin-left: 70px;">
                  <button id="add1" class="btn btn-2x btn-default" type="button" >
                    + Add 1st advisor
                  </button>
              </div>
     
 <!-- 1st advisor-->  

        <div id="advisor1">

                    <div  class="form-group">
                         <label class="col-xs-3 control-label control-label-clear">Advisors<small> (optional)</small></label>
               
                          <div class="col-xs-9">
                             <div >
               
                                <div class="form-group" >
                                     <label class="col-xs-3 control-label">Name</label>
                           
                                    <div class="col-xs-9">
                                      <input class="form-control" value="<?php if(!empty($display_adv[0]['advisor_name'])) {
                                         echo $display_adv[0]['advisor_name'];
                                       } ?>" id="adv_name1" name="adv_name1" type="text" placeholder="Name"/>              
                                    </div>
                                </div>

                                 <div class="form-group" >
                                      <label class="col-xs-3 control-label">Position<small> (optional)</small></label>
                                     
                                      <div class="col-xs-9">
                                        <input class="form-control" name="adv_pos1" value="<?php if(!empty($display_adv[0]['advisor_pos'])) {
                                         echo $display_adv[0]['advisor_pos'];
                                       } ?>" id="adv_pos1" type="text" placeholder="Position"/>
                                      </div>
                                 </div>

                                <div class="form-group" >
                                      <label class="col-xs-3 control-label">
                                        Email
                                      </label>

                                      <div class="col-xs-9">
                                        <input class="form-control" value="<?php if(!empty($display_adv[0]['advisor_email'])) {
                                         echo $display_adv[0]['advisor_email'];
                                       } ?>" name="adv_email1" id="adv_email1" type="email" placeholder="Email"/>
                                      </div>
                                </div>

                                <div class="form-group" >
                                        <label class="col-xs-3 control-label">Website<small> (optional)</small> </label>
                                        
                                        <div class="col-xs-9">
                                          <input class="form-control" value="<?php if(!empty($display_adv[0]['advisor_website'])) {
                                         echo $display_adv[0]['advisor_website'];
                                       } ?>" name="adv_web1" id="adv_web1" type="url" placeholder="Website"/>
                                        </div>
                                </div>

                                <div class="text-right">
                                    <button id="del1" class="btn btn-2x btn-danger" type="button" >
                                      Delete
                                    </button>
                                </div>

                              </div>
                                    
                               
                             </div>
                         </div>
               </div> 
               

               <div class="form-group" class="col-xs-9" style="margin-left: 70px;">
                  <button id="add2" class="btn btn-2x btn-default" type="button" >
                    + Add 2nd advisor
                  </button><hr>
              </div>

<!-- 2nd advisor-->

                           <div id="advisor2">

                                <div  class="form-group">
                                     <label class="col-xs-3 control-label control-label-clear">Advisors<small> (optional)</small></label>
                           
                                      <div class="col-xs-9">
                                         <div >
                           
                                            <div class="form-group" >
                                                 <label class="col-xs-3 control-label">Name</label>
                                       
                                                <div class="col-xs-9">
                                                  <input class="form-control" value="<?php if(!empty($display_adv[1]['advisor_name'])) {
                                                     echo $display_adv[1]['advisor_name'];
                                                   } ?>" name="adv_name2" id="adv_name2" type="text" placeholder="Name">
                                                   </input>
                                                </div>
                                            </div><br>

                                             <div class="form-group" >
                                                  <label class="col-xs-3 control-label">Position<small> (optional)</small></label>
                                                 
                                                  <div class="col-xs-9">
                                                    <input class="form-control" value="<?php if(!empty($display_adv[1]['advisor_pos'])) {
                                                       echo $display_adv[1]['advisor_pos'];
                                                     } ?>" name="adv_pos2" id="adv_pos2" type="text" placeholder="Position"/>
                                                  </div>
                                             </div><br>

                                            <div class="form-group" >
                                                  <label class="col-xs-3 control-label">
                                                    Email
                                                  </label>

                                                  <div class="col-xs-9">
                                                    <input class="form-control" value="<?php if(!empty($display_adv[1]['advisor_email'])) {
                                                       echo $display_adv[1]['advisor_email'];
                                                     } ?>" name="adv_email2" id="adv_email2" type="email" placeholder="Email"/>
                                                  </div>
                                            </div><br>

                                            <div class="form-group" >
                                                <label class="col-xs-3 control-label">Website<small> (optional)</small> </label>
                                                
                                                <div class="col-xs-9">
                                                  <input class="form-control" value="<?php if(!empty($display_adv[1]['advisor_website'])) {
                                                       echo $display_adv[1]['advisor_website'];
                                                     } ?>" name="adv_web2" id="adv_web2" type="url" placeholder="Website"/>
                                                </div>
                                             </div>

                                            <div class="text-right">
                                                <button id="del2" class="btn btn-2x btn-danger" type="button" >
                                                  Delete
                                                </button>
                                                 
                                            </div>

                                          </div>
                                      
                                     <button id="add3" class="btn btn-2x btn-default" type="button" style="margin-left: 70px;">
                                                  + Add 3rd advisor
                                                </button><hr>
                                  </div>
                                  </div>
                           </div>
<!-- 3rd advisor--> 

                             <div id="advisor3">

                                  <div  class="form-group">
                                       <label class="col-xs-3 control-label control-label-clear">Advisors<small> (optional)</small></label>
                             
                                        <div class="col-xs-9">
                                           <div >
                             
                                              <div class="form-group" >
                                                   <label class="col-xs-3 control-label">Name</label>
                                         
                                                  <div class="col-xs-9">
                                                    <input class="form-control" value="<?php if(!empty($display_adv[2]['advisor_name'])) {
                                                         echo $display_adv[2]['advisor_name'];
                                                       } ?>" name="adv_name3" id="adv_name3" type="text" placeholder="Name"/>               
                                                  </div>
                                              </div>

                                               <div class="form-group" >
                                                    <label class="col-xs-3 control-label">Position<small> (optional)</small></label>
                                                   
                                                    <div class="col-xs-9">
                                                      <input class="form-control" value="<?php if(!empty($display_adv[2]['advisor_pos'])) {
                                                         echo $display_adv[2]['advisor_pos'];
                                                       } ?>" name="adv_pos3" id="adv_pos3" type="text" placeholder="Position"/>
                                                    </div>
                                               </div>

                                              <div class="form-group" >
                                                    <label class="col-xs-3 control-label">
                                                      Email
                                                    </label>

                                                    <div class="col-xs-9">
                                                      <input class="form-control" value="<?php if(!empty($display_adv[2]['advisor_email'])) {
                                                         echo $display_adv[2]['advisor_email'];
                                                       } ?>" name="adv_email3" id="adv_email3" type="email" placeholder="Email"/>
                                                    </div>
                                              </div>

                                              <div class="form-group" >
                                                  <label class="col-xs-3 control-label">Website<small> (optional)</small> </label>
                                                  
                                                  <div class="col-xs-9">
                                                    <input class="form-control" value="<?php if(!empty($display_adv[2]['advisor_website'])) {
                                                         echo $display_adv[2]['advisor_website'];
                                                       } ?>" name="adv_web3" id="adv_web3" type="url" placeholder="Website"/>
                                                  </div>
                                              </div>

                                              <div class="text-right">
                                                  <button id="del3" class="btn btn-2x btn-danger" type="button" >
                                                    Delete
                                                  </button>
                                              </div>
                                                <hr size="80%; width=80% ">
                                            </div>
                                                  
                                              </div>
                                           </div>
                                       </div>
                             </div>    

                             <button id="iadd1" class="btn btn-2x btn-default" style="margin-left: 70px;" type="button" ng-click="addInvestor()" ng-disabled="isAddBtnDisabled('company_investors')">
                                  + Add 1st investor
                                </button>


  <!-- 1st investor-->


                <div id="investor1">
                         <div  class="form-group">
                              <hr size="80%; width=60% ">
                               <label class="col-xs-3 control-label control-label-clear">Previous &amp; current investors<small> (optional)</small> </label>
                
             
                               <div class="col-xs-9">

                                  <div >

                                      <div class="form-group" >
                                        <label class="col-xs-3 control-label">
                                          Name
                                          <span class="cn-privacy-info text-success-light">
                                        </label>
                                        <div class="col-xs-9">
                                          <input class="form-control" value="<?php if(!empty($display_inv[0]['investor_name'])) {
                                                         echo $display_inv[0]['investor_name'];
                                                       } ?>" name="inv_name1" id="inv_name1" type="text" placeholder="Name"/>
                                        </div>
                                      </div>

                                      <div class="form-group" >
                                        <label class="col-xs-3 control-label">
                                          Position
                                          <small> (optional)</small>
                                        </label>

                                        <div class="col-xs-9">
                                          <input class="form-control" value="<?php if(!empty($display_inv[0]['investor_pos'])) {
                                                         echo $display_inv[0]['investor_pos'];
                                                       } ?>" name="inv_pos1" id="inv_pos1" type="text" placeholder="Position"/>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-xs-3 control-label">Email</label>
                                        
                                        <div class="col-xs-9">
                                          <input class="form-control" value="<?php if(!empty($display_inv[0]['investor_email'])) {
                                                         echo $display_inv[0]['investor_email'];
                                                       } ?>" name="inv_email1" id="inv_email1" type="email" placeholder="Email"/>
                                        </div>
                                      </div>

                                      <div class="form-group" >
                                        <label class="col-xs-3 control-label">Website<small> (optional)</small> </label>
                                        
                                        <div class="col-xs-9">
                                          <input class="form-control" value="<?php if(!empty($display_inv[0]['investor_website'])) {
                                                         echo $display_inv[0]['investor_website'];
                                                       } ?>" name="inv_web1" id="inv_web1" type="url" placeholder="Website"/>
                                        </div>
                                      </div>

                                      <div  class="text-right">
                                        <button id="idel1" class="btn btn-2x btn-danger" type="button">
                                          Delete
                                        </button>
                                      </div>

                                  </div>

                                
                             </div>
                       </div>
                    </div>
                    <div class="form-group" class="col-xs-9" style="margin-left: 70px;">
                    <button id="iadd2" class="btn btn-2x btn-default" style="margin-left: 70px;" type="button" ng-click="addInvestor()" ng-disabled="isAddBtnDisabled('company_investors')">
                        + Add 2nd investor
                      </button>
                      </div>
     


      <!-- 2nd investor-->


        <div id="investor2">
             <div  class="form-group">
                               <label class="col-xs-3 control-label control-label-clear">Previous &amp; current investors<small> (optional)</small> </label>
                
             
                               <div class="col-xs-9">

                                  <div >

                                      <div class="form-group" >
                                        <label class="col-xs-3 control-label">
                                          Name
                                          <span class="cn-privacy-info text-success-light">
                                        </label>
                                        <div class="col-xs-9">
                                          <input class="form-control" value="<?php if(!empty($display_inv[1]['investor_name'])) {
                                                         echo $display_inv[1]['investor_name'];
                                                       } ?>" name="inv_name2" id="inv_name2" type="text" placeholder="Name"/>
                                        </div>
                                      </div>

                                      <div class="form-group" >
                                        <label class="col-xs-3 control-label">
                                          Position
                                          <small> (optional)</small>
                                        </label>

                                        <div class="col-xs-9">
                                          <input class="form-control" value="<?php if(!empty($display_inv[1]['investor_pos'])) {
                                                         echo $display_inv[1]['investor_pos'];
                                                       } ?>" name="inv_pos2" id="inv_pos2" type="text" placeholder="Position"/>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-xs-3 control-label">Email</label>
                                        
                                        <div class="col-xs-9">
                                          <input class="form-control" value="<?php if(!empty($display_inv[1]['investor_email'])) {
                                                         echo $display_inv[1]['investor_email'];
                                                       } ?>" name="inv_email2" id="inv_email2" type="email" placeholder="Email"/>
                                        </div>
                                      </div>

                                      <div class="form-group" >
                                        <label class="col-xs-3 control-label">Website<small> (optional)</small> </label>
                                        
                                        <div class="col-xs-9">
                                          <input class="form-control" value="<?php if(!empty($display_inv[1]['investor_website'])) {
                                                         echo $display_inv[1]['investor_website'];
                                                       } ?>"  name="inv_web2" id="inv_web2" type="url" placeholder="Website"/>
                                        </div>
                                      </div>

                                      <div  class="text-right">
                                        <button id="idel2" class="btn btn-2x btn-danger" type="button">
                                          Delete
                                        </button>
                                      </div>

                                  </div>

                                <button id="iadd3" class="btn btn-2x btn-default" style="margin-left: 70px;" type="button" ng-click="addInvestor()" ng-disabled="isAddBtnDisabled('company_investors')">
                                  + Add 3rd investor
                                </button>
                             </div>
                       </div>
                  </div>

     

      <!-- 3rd investor-->

              <div id="investor3">
                  <div  class="form-group">
                               <label class="col-xs-3 control-label control-label-clear">Previous &amp; current investors<small> (optional)</small> </label>
                
             
                               <div class="col-xs-9">

                                  <div >

                                      <div class="form-group" >
                                        <label class="col-xs-3 control-label">
                                          Name
                                          <span class="cn-privacy-info text-success-light">
                                        </label>
                                        <div class="col-xs-9">
                                          <input class="form-control" value="<?php if(!empty($display_inv[2]['investor_name'])) {
                                                         echo $display_inv[2]['investor_name'];
                                                       } ?>" name="inv_name3" id="inv_name3" type="text" placeholder="Name"/>
                                        </div>
                                      </div>

                                      <div class="form-group" >
                                        <label class="col-xs-3 control-label">
                                          Position
                                          <small> (optional)</small>
                                        </label>

                                        <div class="col-xs-9">
                                          <input class="form-control" value="<?php if(!empty($display_inv[2]['investor_pos'])) {
                                                         echo $display_inv[2]['investor_pos'];
                                                       } ?>" name="inv_pos3" id="inv_pos3" type="text" placeholder="Position"/>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-xs-3 control-label">Email</label>
                                        
                                        <div class="col-xs-9">
                                          <input class="form-control" value="<?php if(!empty($display_inv[2]['investor_email'])) {
                                                         echo $display_inv[2]['investor_email'];
                                                       } ?>"  name="inv_email3" id="inv_email3" type="email" placeholder="Email"/>
                                        </div>
                                      </div>

                                      <div class="form-group" >
                                        <label class="col-xs-3 control-label">Website<small> (optional)</small> </label>
                                        
                                        <div class="col-xs-9">
                                          <input class="form-control" value="<?php if(!empty($display_inv[2]['investor_website'])) {
                                                         echo $display_inv[2]['investor_website'];
                                                       } ?>" name="inv_web3" style="margin-left: 70px;" id="inv_web3" type="url" placeholder="Website"/>
                                        </div>
                                      </div>

                                      <div  class="text-right">
                                        <button id="idel3" class="btn btn-2x btn-danger" type="button">
                                          Delete
                                        </button>
                                      </div>

                                  </div>

                                
                             </div>
                       </div>
                    </div>

          <button id="padd1" class="btn btn-2x btn-default" style="margin-left: 70px;" type="button" ng-click="addInvestor()" ng-disabled="isAddBtnDisabled('company_investors')">
                                  + Add 1st partner
                                </button>


      <!-- 1st partner-->
                <div id="partner1">
                        <div  class="form-group"><hr>
                              <label class="col-xs-3 control-label control-label-clear">
                                Previous &amp; current cooperation partners
                                <small> (optional)</small>
                               </label>

                              <div class="col-xs-9">

                                    <div ng-repeat="item in model.company_partners" >
                                            <div class="form-group" >
                                                  <label class="col-xs-3 control-label">
                                                    Name
                                                  </label>

                                                  <div class="col-xs-9">
                                                    <input class="form-control" value="<?php if(!empty($display_adv[0]['partner_name'])) {
                                                         echo $display_pat[0]['partner_name'];
                                                       } ?>" name="pat_name1" id="pat_name1" type="text" placeholder="Name"/>
                                                  </div>
                                            </div>

                                            <div class="form-group" >
                                                <label class="col-xs-3 control-label">
                                                  Position
                                                  <small> (optional)</small>
                                                </label>

                                                <div class="col-xs-9">
                                                  <input class="form-control" value="<?php if(!empty($display_pat[0]['partner_pos'])) {
                                                         echo $display_pat[0]['partner_pos'];
                                                       } ?>" name="pat_pos1" id="pat_pos1" type="text" placeholder="Position"/>
                                                </div>
                                            </div>

                                            <div class="form-group" >
                                                <label class="col-xs-3 control-label">
                                                  Email
                                                </label>

                                                <div class="col-xs-9">
                                                  <input class="form-control" value="<?php if(!empty($display_pat[0]['partner_email'])) {
                                                         echo $display_pat[0]['partner_email'];
                                                       } ?>" name="pat_email1" id="pat_email1" type="email" placeholder="Email"/>
                                                </div>
                                            </div>

                                            <div class="form-group" >
                                                  <label class="col-xs-3 control-label">
                                                    Website
                                                    <small> (optional)</small>
                                                  </label>

                                                  <div class="col-xs-9">
                                                    <input class="form-control" value="<?php if(!empty($display_pat[0]['partner_website'])) {
                                                         echo $display_pat[0]['partner_website'];
                                                       } ?>" name="pat_web1" id="pat_web1" type="url" placeholder="Website"/>
                                                  </div>
                                            </div>

                                            <div class="text-right">
                                              <button id="pdel1" class="btn btn-2x btn-danger" type="button" >
                                                Delete
                                              </button>
                                            </div>    

                                  </div>

                                            
                              </div>
                       </div>
                  </div>
                  <div class="form-group" class="col-xs-9" style="margin-left: 70px;">
                      <button id="padd2" class="btn btn-2x btn-default" style="margin-left: 70px;" type="button" >
                        + Add 2nd partner
                      </button>
                    </div>
                      
     <!--2nd partner-->
                      <div id="partner2">
                              <div  class="form-group">
                              <label class="col-xs-3 control-label control-label-clear">
                                Previous &amp; current cooperation partners
                                <small> (optional)</small>
                               </label>

                              <div class="col-xs-9">

                                    <div ng-repeat="item in model.company_partners" >
                                            <div class="form-group" >
                                                  <label class="col-xs-3 control-label">
                                                    Name
                                                  </label>

                                                  <div class="col-xs-9">
                                                    <input class="form-control" value="<?php if(!empty($display_pat[1]['partner_name'])) {
                                                         echo $display_pat[1]['partner_name'];
                                                       } ?>" name="pat_name2" id="pat_name2" type="text" placeholder="Name"/>
                                                  </div>
                                            </div>

                                            <div class="form-group" >
                                                <label class="col-xs-3 control-label">
                                                  Position
                                                  <small> (optional)</small>
                                                </label>

                                                <div class="col-xs-9">
                                                  <input class="form-control" value="<?php if(!empty($display_pat[1]['partner_pos'])) {
                                                         echo $display_pat[1]['partner_pos'];
                                                       } ?>" name="pat_pos2" id="pat_pos2" type="text" placeholder="Position"/>
                                                </div>
                                            </div>

                                            <div class="form-group" >
                                                <label class="col-xs-3 control-label">
                                                  Email
                                                </label>

                                                <div class="col-xs-9">
                                                  <input class="form-control" value="<?php if(!empty($display_pat[1]['partner_email'])) {
                                                         echo $display_pat[1]['partner_email'];
                                                       } ?>" name="pat_email2" id="pat_email2" type="email" placeholder="Email"/>
                                                </div>
                                            </div>

                                            <div class="form-group" >
                                                  <label class="col-xs-3 control-label">
                                                    Website
                                                    <small> (optional)</small>
                                                  </label>

                                                  <div class="col-xs-9">
                                                    <input class="form-control" value="<?php if(!empty($display_pat[1]['partner_website'])) {
                                                         echo $display_pat[1]['partner_website'];
                                                       } ?>" name="pat_web2" id="pat_web2" type="url" placeholder="Website"/>
                                                  </div>
                                            </div>

                                            <div class="text-right">
                                              <button id="pdel2" class="btn btn-2x btn-danger" type="button" >
                                                Delete
                                              </button>
                                            </div>    

                                  </div>

                                            <button id="padd3" class="btn btn-2x btn-default" style="margin-left: 70px;"         type="button" >
                                              + Add 3rd partner
                                            </button>
                              </div>
                       </div>
                    </div>

<!--3rd partner-->
                        <div id="partner3">
                               <div  class="form-group">
                              <label class="col-xs-3 control-label control-label-clear">
                                Previous &amp; current cooperation partners
                                <small> (optional)</small>
                               </label>

                              <div class="col-xs-9">

                                    <div ng-repeat="item in model.company_partners" >
                                            <div class="form-group" >
                                                  <label class="col-xs-3 control-label">
                                                    Name
                                                  </label>

                                                  <div class="col-xs-9">
                                                    <input class="form-control" value="<?php if(!empty($display_pat[2]['partner_name'])) {
                                                         echo $display_pat[2]['partner_name'];
                                                       } ?>" name="pat_name3" id="pat_name3" type="text" placeholder="Name"/>
                                                  </div>
                                            </div>

                                            <div class="form-group" >
                                                <label class="col-xs-3 control-label">
                                                  Position
                                                  <small> (optional)</small>
                                                </label>

                                                <div class="col-xs-9">
                                                  <input class="form-control" value="<?php if(!empty($display_pat[2]['partner_pos'])) {
                                                         echo $display_pat[2]['partner_pos'];
                                                       } ?>" name="pat_pos3" id="pat_pos3" type="text" placeholder="Position"/>
                                                </div>
                                            </div>

                                            <div class="form-group" >
                                                <label class="col-xs-3 control-label">
                                                  Email
                                                </label>

                                                <div class="col-xs-9">
                                                  <input class="form-control" value="<?php if(!empty($display_pat[2]['partner_email'])) {
                                                         echo $display_pat[2]['partner_email'];
                                                       } ?>" name="pat_email3" id="pat_email3" type="email" placeholder="Email"/>
                                                </div>
                                            </div>

                                            <div class="form-group" >
                                                  <label class="col-xs-3 control-label">
                                                    Website
                                                    <small> (optional)</small>
                                                  </label>

                                                  <div class="col-xs-9">
                                                    <input class="form-control" value="<?php if(!empty($display_pat[2]['partner_website'])) {
                                                         echo $display_pat[2]['partner_website'];
                                                       } ?>" name="pat_web3" id="pat_web3" type="url" placeholder="Website"/>
                                                  </div>
                                            </div>

                                            <div id="pdel3" class="text-right">
                                              <button class="btn btn-xs btn-danger" type="button" >
                                                Delete
                                              </button>
                                            </div>    

                                  </div>

                                            
                              </div>
                       </div>
                   </div>

<!-- save button-->
                    <div class="form-group">
                      <div class="col-md-offset-7 col-md-9">
                        <button name="submit" type="submit" class="btn btn-4x btn-primary" 
                        >Save</button>
                      </div>
                    </div>

            </div>
       </div>
  </div>

</form>
</body>
</html>