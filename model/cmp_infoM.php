<?php
session_start();
if(isset($_POST['logout'])) {
      session_destroy();
}
?>
<?php

if(!class_exists('Database'))
{
include 'C:/wamp/www/hackathon/include/databasec.php';
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "project_h");
}
class cmp_infoC
{	
	protected $_database;
	public function __construct()
	{	
		$this->_database = new Database();
	}
	function insert_logo($logo)
	{
		echo "logo";
		echo $_SESSION['cid'];
		echo $logo;
		$this->_database->query('update company_info set logo =:logo where company_id =:cid');
		$this->_database->bind(':logo', $logo);
		$this->_database->bind(':cid', $_SESSION['cid']);	
		$this->_database->execute();
	}
	function insert_primary_industry($c_p_indust)
	{
		echo "industry";
		$this->_database->query('update company_info set primary_industry =:pindust where company_id =:cid');
		$this->_database->bind(':pindust', $c_p_indust);
		$this->_database->bind(':cid', $_SESSION['cid']);	
		$this->_database->execute();
	}
	function insert_secondary_industry($c_s_indust)
	{
		$this->_database->query('update company_info set secondary_industry =:cindust where company_id =:cid');
		$this->_database->bind(':cindust', $c_s_indust);
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->execute();	
	}
	function insert_foundation_date($foundation)
	{
		$this->_database->query('update company_info set foundation_date =:foundation where company_id =:cid');
		$this->_database->bind(':foundation', $foundation);
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->execute();	
	}
	function insert_addr1($addr1)
	{
		$this->_database->query('update company_info set addr_l1 =:addr1 where company_id =:cid');
		$this->_database->bind(':addr1', $addr1);
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->execute();	
	}
	function insert_addr2($addr2)
	{
		$this->_database->query('update company_info set addr_l2 =:addr2 where company_id =:cid');
		$this->_database->bind(':addr2', $addr2);
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->execute();	
	}
	function insert_city($city)
	{
		$this->_database->query('update company_info set city =:city where company_id =:cid');
		$this->_database->bind(':city', $city);
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->execute();	
	}
	function insert_zip($zip)
	{
		$this->_database->query('update company_info set zip =:zip where company_id =:cid');
		$this->_database->bind(':zip', $zip);
		$this->_database->bind(':cid', $_SESSION['cid']);	
		$this->_database->execute();
	}
	function insert_state($state)
	{
		$this->_database->query('update company_info set state =:state where company_id =:cid');
		$this->_database->bind(':state', $state);
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->execute();	
	}
	function insert_country($country)
	{
		$this->_database->query('update company_info set country =:country where company_id =:cid');
		$this->_database->bind(':country', $country);
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->execute();	
	}
	function insert_website($c_website)
	{
		$this->_database->query('update company_info set company_website =:c_website where company_id =:cid');
		$this->_database->bind(':c_website', $c_website);
		$this->_database->bind(':cid', $_SESSION['cid']);	
		$this->_database->execute();
	}
	function insert_fb($fb)
	{
		$this->_database->query('update company_info set fb =:fb where company_id =:cid');
		$this->_database->bind(':fb', $fb);
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->execute();	
	}
	function insert_linkedin($linkedin)
	{
		$this->_database->query('update company_info set linkedin =:linkedin where company_id =:cid');
		$this->_database->bind(':linkedin', $linkedin);
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->execute();	
	}
	function insert_contact($contact)
	{
		$this->_database->query('update company_info set contact =:contact where company_id =:cid');
		$this->_database->bind(':contact', $contact);
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->execute();	
	}
	function insert_twitter($twitter)
	{
		$this->_database->query('update company_info set twitter =:twitter where company_id =:cid');
		$this->_database->bind(':twitter', $twitter);
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->execute();	
	}
	function insert_blog($blog)
	{
		$this->_database->query('update company_info set blog =:blog where company_id =:cid');
		$this->_database->bind(':blog', $blog);
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->execute();	
	}
	function insert_skype($skype)
	{
		$this->_database->query('update company_info set skype =:skype where company_id =:cid');
		$this->_database->bind(':skype', $skype);
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->execute();
	}
	function getInfo()
	{
		$this->_database->query('select * from company_info,industry_cat where company_id =:cid and (industry_cat.cat_id=company_info.primary_industry or industry_cat.cat_id=company_info.secondary_industry)');
		$this->_database->bind(':cid', $_SESSION['cid']);
		$row=$this->_database->resultset();
		return $row;	
		//print_r($row);
	}
}
?>