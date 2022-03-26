<?php
session_start();
if(isset($_POST['logout'])) {
      session_destroy();
}
?>
<?php
include 'model/activeM.php';
//$_SESSION['cid']=2;
$actv=new ActiveC();
$info=$actv->getInfo();
$detail=$actv->getDetail();
if($info=='1' && $detail=='1')
{
	$_SESSION['active']=true;
}
else
	$_SESSION['active']=false;
?>