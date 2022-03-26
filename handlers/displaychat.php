<?php 
include_once('hackathon/model/chatM.php');
	
	$chat_C = new chatC();
	
	$s_id = $_POST['sid'];
	$r_id = $_POST['rid'];
	$result=$chat_C->printmessages($r_id,$s_id);	
	//header('location:chata.php');
	echo $result;
	
?>