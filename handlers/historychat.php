<?php 
	include 'hackathon/model/chatM.php';
	$chat_C_obj = new chatC();
	$s_id=$_POST['sid'];
	$result=$chat_C_obj->history_fun($s_id);

foreach ($result as $r) {
	foreach ($r as  $a) {
		echo
		'
			<div class="panel panel-default" >
						  <div class="panel-body" onclick="openchat()">
						  		<img src="'.$a['logo'].'" class="img-responsive col-md-5" /	>'.$a['company_name'].'<input type="hidden" name="cname"  value="'.$a['company_name'].'"></input>'.'
						  </div>
			</div>';
	}
}

//echo $result;

?>