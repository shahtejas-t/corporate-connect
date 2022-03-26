<?php

include 'C:/xampp/htdocs/hackathon/include/databasec.php';

class compose
{
	protected $database='';
	
	public function __construct()
	{
		$this->database = new Database();
	}
	public function insertprob($rev,$msg)
	{
		$errMsg='';
		$id;
		$receive;
		$r_email;
		
		if($msg=='')
		{
			$errMsg = "plz enter messges in msgbox";
		}	
	
		$this->database->query("select cat_id from industry_cat where cat_name = :rev");
		
		$this->database->bind(":rev", $rev);
		$row = $this->database->single();
		if(($this->database->rowCount() > 0))
		{
			$receive=$row['cat_id'];
		}
	
		
		echo ' '.$errMsg;
		$d=date("Y/m/d H:i:s");
		if($errMsg=='')
		{
			$this->database->query('insert into problem_statement (company_id , description , post_time , cat_id) values (:company_id, :description,:post_time,:cat_id)');

			$this->database->bind(':company_id', $_SESSION['cid']);
			$this->database->bind(':description', $msg);
			$this->database->bind(':post_time',$d);
			$this->database->bind(':cat_id', $receive);
			$this->database->execute();
			
		}			
	}
	
	public function problem_soln($pid)
	{
		$this->database->query('SELECT problem_soln. * , company_reg.company_name
FROM problem_soln, company_reg
WHERE problem_soln.company_id = company_reg.company_id
AND problem_soln.problem_id =:pid');
		$this->database->bind(':pid',$pid);
		$row = $this->database->resultset();
		return $row;
	}
}
?>


