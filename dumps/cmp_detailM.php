<?php
session_start();
if(isset($_POST['logout'])) {
      session_destroy();
}
?>
<?php

if(!class_exists('Database'))
{
include 'C:/xampp/htdocs/cc/include/database.php';
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "project_h");
}
class cmp_detailC
{	
	protected $_database;
	public function __construct()
	{	
		$this->_database = new Database();
	}
	function insert_Detail($cust,$prod,$stage,$epitch,$cdesc,$emp)
	{
		$this->_database->query('update company_detail set stage_id=:stage,no_of_emp=:emp,elevator_pitch=:epitch,company_ovrview=:cdesc,customer_cat_id=:cust,product_cat_id=:prod where company_id=:cid' );
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->bind(':stage', $stage);
		$this->_database->bind(':emp', $emp);
		$this->_database->bind(':epitch', $epitch);
		$this->_database->bind(':cdesc', $cdesc);
		$this->_database->bind(':prod', $prod);
		$this->_database->bind(':cust', $cust);
		$this->_database->execute();
	}
	function getDetail()
	{
		$this->_database->query('select * from company_detail where company_id =:cid');
		$this->_database->bind(':cid', $_SESSION['cid']);
		$row=$this->_database->single();
		return $row;	
	}
	function getCustomerCat()
	{
		$this->_database->query('select * from Customer_cat');
		$row=$this->_database->resultset();
		return $row;	
	}
	function getProductCat()
	{
		$this->_database->query('select * from Product_cat');
		$row=$this->_database->resultset();
		return $row;	
	}
	function getCompanyStage()
	{
		$this->_database->query('select * from company_stage');
		$row=$this->_database->resultset();
		return $row;	
	}
	function adv_Insert($name,$email,$pos,$web)
	{
		$this->_database->query('select * from advisor where advisor_email=:email');
		$this->_database->bind(':email', $email);
		$row=$this->_database->single();
		if ($this->_database->rowCount()>0) {
		}
		else
		{
			$this->_database->query('insert into advisor (advisor_name,advisor_email,advisor_pos,advisor_website) values(:name,:email,:pos,:web)');
			$this->_database->bind(':name',$name);
			$this->_database->bind(':email',$email);
			$this->_database->bind(':pos',$pos);
			$this->_database->bind(':web',$web);
			$this->_database->execute();

			$this->_database->query('select * from advisor where advisor_email=:email');
			$this->_database->bind(':email', $email);
			$row=$this->_database->single();
			echo "<br>row :: <br>";print_r($row);

		}
		echo "<br>";
		echo $row['advisor_id'] ;
		$this->_database->query('select * from company_advisor where company_id=:cid and advisor_id=:aid');
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->bind(':aid', $row['advisor_id']);
		$carow=$this->_database->single();
		if ($this->_database->rowCount()>0)
		{
		}
		else
		{
			$this->_database->query('insert into company_advisor(company_id,advisor_id) values(:cid,:aid)');
			$this->_database->bind(':cid', $_SESSION['cid']);
			$this->_database->bind(':aid', $row['advisor_id']);
			$this->_database->execute();
		}
	}



	function inv_Insert($name,$email,$pos,$web)
	{
		$this->_database->query('select * from investor where investor_email=:email');
		$this->_database->bind(':email', $email);
		$row=$this->_database->single();
		if ($this->_database->rowCount()>0) {
		}
		else
		{
			$this->_database->query('insert into investor (investor_name,investor_email,investor_pos,investor_website) values(:name,:email,:pos,:web)');
			$this->_database->bind(':name',$name);
			$this->_database->bind(':email',$email);
			$this->_database->bind(':pos',$pos);
			$this->_database->bind(':web',$web);
			$this->_database->execute();

			$this->_database->query('select * from investor where investor_email=:email');
			$this->_database->bind(':email', $email);
			$row=$this->_database->single();

		}
		$this->_database->query('select * from company_investor where company_id=:cid and investor_id=:aid');
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->bind(':aid', $row['investor_id']);
		$cirow=$this->_database->single();
		if ($this->_database->rowCount()>0)
		{
		}
		else
		{
			$this->_database->query('insert into company_investor(company_id,investor_id) values(:cid,:aid)');
			$this->_database->bind(':cid', $_SESSION['cid']);
			$this->_database->bind(':aid', $row['investor_id']);
			$this->_database->execute();
		}
	}


	function pat_Insert($name,$email,$pos,$web)
	{
		$this->_database->query('select * from partner where partner_email=:email');
		$this->_database->bind(':email', $email);
		$row=$this->_database->single();
		if ($this->_database->rowCount()>0) {
		}
		else
		{
			$this->_database->query('insert into partner (partner_name,partner_email,partner_pos,partner_website) values(:name,:email,:pos,:web)');
			$this->_database->bind(':name',$name);
			$this->_database->bind(':email',$email);
			$this->_database->bind(':pos',$pos);
			$this->_database->bind(':web',$web);
			$this->_database->execute();

			$this->_database->query('select * from partner where partner_email=:email');
			$this->_database->bind(':email', $email);
			$row=$this->_database->single();

		}
		$this->_database->query('select * from company_partner where company_id=:cid and partner_id=:aid');
		$this->_database->bind(':cid', $_SESSION['cid']);
		$this->_database->bind(':aid', $row['partner_id']);
		$cprow=$this->_database->single();
		if ($this->_database->rowCount()>0)
		{
		}
		else
		{
			$this->_database->query('insert into company_partner(company_id,partner_id) values(:cid,:aid)');
			$this->_database->bind(':cid', $_SESSION['cid']);
			$this->_database->bind(':aid', $row['partner_id']);
			$this->_database->execute();
		}
	}

	function display()
	{
		$this->_database->query('select customer_cat.cat_name as customer_name ,
		 company_detail.customer_cat_id as customer_id, 
		 company_detail.product_cat_id as product_id, 
		 company_detail.stage_id as stage_id, 
		 product_cat.cat_name as product_name, 	
		 company_stage.stage_name ,
		 company_detail.no_of_emp , 
		 company_detail.elevator_pitch , 
		 company_detail.company_ovrview
			from company_detail , company_stage , customer_cat , product_cat
			WHERE company_detail.company_id=:cid
			and company_detail.customer_cat_id=customer_cat.cat_id
			and company_detail.product_cat_id=product_cat.cat_id
			and company_detail.stage_id=company_stage.stage_id');
		$this->_database->bind(':cid', $_SESSION['cid']);
		$row=$this->_database->single();
		return $row;
	}

	function adv_display()
	{
		$this->_database->query('select advisor.* from company_advisor,advisor
			where company_advisor.company_id=:cid and company_advisor.advisor_id=advisor.advisor_id');
		$this->_database->bind(':cid', $_SESSION['cid']);
		$rows=$this->_database->resultset();
		print_r($rows);
		return $rows;

	}

	function inv_display()
	{
		$this->_database->query('select investor.* from company_investor,investor
			where company_investor.company_id=:cid and company_investor.investor_id=investor.investor_id');
		$this->_database->bind(':cid', $_SESSION['cid']);
		$rows=$this->_database->resultset();
		print_r($rows);
		return $rows;

	}

	function pat_display()
	{
		$this->_database->query('select partner.* from company_partner,partner
			where company_partner.company_id=:cid and company_partner.partner_id=partner.partner_id');
		$this->_database->bind(':cid', $_SESSION['cid']);
		$rows=$this->_database->resultset();
		print_r($rows);
		return $rows;

	}

}
	?>