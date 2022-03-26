<?php 
include_once('hackathon/model/chatM.php');
	
	$chat_C = new chatC();
	
	$s_id = $_POST['sid'];
	$r_name = $_POST['rid'];
	echo "name:".$r_name;
	$id = $chat_C->getreciverid($r_name);
	//$result=$chat_C->printmessages($id,$s_id);	
	//header('location:chata.php');
	//echo $result;
	echo 'ID : '.$id;
?>