<?php
//session_start();
if(isset($_POST['logout'])) {
      session_destroy();
}
?>
<?php

if(!class_exists('Database'))
{
include 'C:/xampp/htdocs/hackathon/include/databasec.php';
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "project_h");
}
class ActiveC
{	
	protected $_database;
	public function __construct()
	{	
		$this->_database = new Database();
	}
	function getInfo()
	{
		$this->_database->query('SELECT * FROM  company_info where company_id =:cid');
		$this->_database->bind(':cid',$_SESSION['cid']);
		$row = $this->_database->single();
		$flag = 0;
		foreach($row as $keys)
		{
        	if(!empty($keys))
        	{
        		$flag++;
        	}
		}
		if($flag > 8)
		{
    		return 1;
		}
		else 
		{
 		   return 0;
		}	
	}
	function getDetail()
	{
		$this->_database->query('SELECT * FROM  company_detail where company_id =:cid');
		$this->_database->bind(':cid',$_SESSION['cid']);
		$row = $this->_database->single();
		print_r($row);
		$flag = 0;
		foreach($row as $keys)
		{
        	if(!empty($keys))
        	{
        		$flag++;
        	}
		}
		if($flag > 5)
		{
    		return 1;
		}
		else 
		{
 		   return 0;
		}	
	}
}
error_reporting(0);
?>