<?php
include_once 'C:/xampp/htdocs/hackathon/include/connect.php';
class chatC
{
	protected $database;
	protected $reciver_id=7;
	public function __construct()
	{
		$this->database = new Database();
	}
	

	public function getreciverid($cid){
		$this->database->query('SELECT company_id FROM company_reg WHERE company_name =:c_name');
		$this->database->bind(':c_name',$cid);

		$rs = $this->database->single();
			if(($this->database->rowCount() > 0))
			{
			$reciver_id= (int)$rs['company_id'];
			return $reciver_id;
			}
	}


	public function printmessages($reciver_id,$sender_id){
		$r=$this->chatting($reciver_id,$sender_id);
		$result='';
		foreach($r as $sender)
		{
			if($sender['sender_id'] == $sender_id)
			{ 
					$result=$result.'<div class="alert alert-warning sender" style="width:650px; word-wrap: break-word;" >';
				    $result=$result.$sender['msg'];
					$result=$result.'</div>';
			}
			else
			{
						$result=$result.'<div class="alert alert-info reciver" style="width=650px; word-wrap:break-word;">';
			  			$result=$result.$sender['msg'];
						$result=$result."</div>";
			}
		}
		return $result;		
	}

	public function history_fun($cid)
	{	
		$this->database->query('SELECT distinct(reciver_id) FROM chating WHERE sender_id = :session');
		$this->database->bind(':session',$cid);
		$h=$this->database->resultset();
		//echo "h :<br>";
		//print_r($h);
		$cidValue=array();
		if($this->database->rowCount() > 0)
		{
			for($i=0;$i<count($h);$i++)
			{
				$this->database->query('select company_reg.company_id as reciver_id , company_reg.company_name , company_info.logo  from company_reg , company_info where company_reg.company_id = :reciver_id and company_info.company_id = :reciver_id');
			$this->database->bind(':reciver_id',$h[$i]['reciver_id']);
			$history = $this->database->resultset();
			$history=array($history);
			$cidValue=array_merge($cidValue,$history);
			}
		}
		//echo "cidValue : <br>";
		//print_r($cidValue);
		return $cidValue;
	}
	
	public function messegesend($dt,$type_msg,$sender_id,$reciver_id)
	{
		$this->database->query("insert into chating(sender_id , reciver_id , msg , time) values (:sid , :session , :msg , :time)");
	$this->database->bind(':sid',$sender_id);
	$this->database->bind(':session',$reciver_id);
	$this->database->bind(':msg',$type_msg);
	$this->database->bind(':time',$dt);
	$this->database->execute();
	}	
	
	
	public function chatting($reciver_id,$sender_id)
	{
		$this->database->query("select distinct(msg),sender_id from chating where sender_id=:session and reciver_id=:reciver or sender_id=:reciver and reciver_id=:session");
		$this->database->bind(':session',$sender_id);
		$this->database->bind(':reciver',$reciver_id);
		$row = $this->database->resultset();
		return $row;
	}
}
?>

