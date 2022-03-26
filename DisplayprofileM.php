<?php
/*session_start();
if(isset($_POST['logout'])) {
      session_destroy();
}*/
?>
<?php

if(!class_exists('Database'))
{
include 'H:/wamp/www/Corporate Connect-20170328T074925Z-001/hackathon/include/databasec.php';
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "project_h");
}
class profileDisplayC
{	
	protected $_database;
	protected $cid;
	public function __construct()
	{	
		$this->_database = new Database();
		
	}
	function getInfo()
	{
		$this->_database->query('select * from company_info,Industry_cat where company_info.company_id =:cid and (company_info.primary_industry=Industry_Cat.cat_id or company_info.secondary_industry=Industry_Cat.cat_id)');
		$this->_database->bind(':cid',$this->cid);
		$row=$this->_database->single();
		return $row;	
	}
	
	function getDetail()
	{
		$this->_database->query('select * from company_detail,company_stage where company_detail.company_id =:cid and company_detail.stage_id=company_stage.stage_id');
		$this->_database->bind(':cid',$this->cid);
		$row=$this->_database->single();
		return $row;	
	}
	
	
	public function cmopany_reg($cname)
	{
		$this->_database->query('select * from company_reg where company_id=:cname');
		$this->_database->bind(':cname',$cname);
		$row=$this->_database->single();
		if ($this->_database->rowCount() > 0)
		{
			$this->cid = $row['company_id'];
			return $row;
		}
		
		
	}
}
?>