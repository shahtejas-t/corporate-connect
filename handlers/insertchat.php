<?php 
	include 'hackathon/model/chatM.php';
	$chat_C_obj = new chatC();

	$dt=date("Y/m/d H:i:s");
	$type_msg = $_POST['msg'];
	$s_id=$_POST['sid'];
	$r_id=$_POST['rid'];
	$chat_C_obj->messegesend($dt,$type_msg,$s_id,$r_id);
	//header('location:chata.php');


?>