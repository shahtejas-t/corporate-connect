<?php
include'H:/wamp/www/hackathon/model/matchmakingM.php';
$match = new Matchmaking();
$key = $_POST['keyword'];
if(!empty($key))
{
	$key="%$key%";
	$match->s_cname($key);
	
}
?>