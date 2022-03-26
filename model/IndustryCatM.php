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
class IndustryCatC
{	
	protected $_database;
	public function __construct()
	{	
		$this->_database = new Database();
	}
	function Industryf()
	{
		$this->_database->query('SELECT * FROM  Industry_Cat');
		$row = $this->_database->resultset();
		return $row;	
	}
}
?>