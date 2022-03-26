<?php session_start(); ?>
<?php
include'C:/xampp/htdocs/hackathon/include/connect.php';
class Matchmaking
{
	protected $databse;
	protected $cn;
	protected $row;
	protected $store;
	public function __construct()
	{ 
		$this->database = new Database();
		$this->cn='';
		$this->store=array();
	}
	public function insustry_name_fun()
	{
		$this->database->query('select * from industry_cat');
		$indu_name = $this->database->resultset();
		return $indu_name;
	}
	
	public function customer_namefun()
	{
		$this->database->query('select * from customer_cat');
		$cus_name = $this->database->resultset();
		return $cus_name;
	}
	
	public function company_stage_fun()
	{
		$this->database->query('select * from company_stage');
		$com_stg = $this->database->resultset();
		return $com_stg;
	}
	
	public function search_cname($search_text)
	{
		$this->database->query('select * from company_reg where company_name=:sname');
		$this->database->bind(':sname',$search_text);
		$row=$this->database->single();
		if($this->database->rowCount()>0)
		return $row['company_id'];		
	}
	
	public function display_search_cname($row)
	{
		$this->database->query('select * from company_info where company_id=:cid');
		$this->database->bind(':cid',$row);
		$r = $this->database->single();
		if($this->database->rowCount() > 0)
		return $r;
	}
	
	
	public function industry_search($industry)
	{
		$this->store=array();
		$this->database->query('select * from company_info
		where primary_industry=:indu_cat or secondary_industry=:indu_cat');
		$this->database->bind(':indu_cat',$industry);
		$row = $this->database->resultset();
		for($i=0;$i<count($row);$i++)
		{
			array_push($this->store,$row[$i]['company_id']);
		}
		return $this->store;
	}
	
	public function customer_category($cust_cat)
	{
		$this->store=array();
		$this->database->query('select * from company_detail
		where customer_cat_id=:catid');
		$this->database->bind(':catid',$cust_cat);
		$row = $this->database->resultset();
		for($i=0;$i<count($row);$i++)
		{
			array_push($this->store,$row[$i]['company_id']);
		}
		return $this->store;
	}
	
	public function company_stage($cstage)
	{
		$this->store=array();
		$this->database->query('select * from company_detail
		where stage_id=:cstage');
		$this->database->bind(':cstage',$cstage);
		$row =$this->database->resultset();
		for($i=0;$i<count($row);$i++)
		{
			array_push($this->store,$row[$i]['company_id']);
		}
		return $this->store;
	}
	
	
	public function allCompany()
	{
		$this->store=array();
		$this->database->query('select * from company_reg');
		$row =$this->database->resultset();
		for($i=0;$i<count($row);$i++)
		{
			array_push($this->store,$row[$i]['company_id']);
		}
		return $this->store;
	}
	
	public function country($c)
	{
		$this->store=array();
		$this->database->query('select * from company_info where country=:country');
		$this->database->bind(':country',$c);
		$row = $this->database->resultset();
		for($i=0;$i<count($row);$i++)
		{
			array_push($this->store,$row[$i]['company_id']);
		}
		return $this->store;
	}
	
	public function getdetail($companyid)
	{
		$this->database->query('SELECT company_reg.company_name, 
		company_info.logo, industry_cat.cat_name as industry, 
		company_stage.stage_name as stage, 
		company_info.foundation_date, 
		company_info.addr_l1, company_info.addr_l2, company_info.city, company_info.zip, company_info.state, company_info.country, customer_cat.cat_name
FROM company_reg, company_info, company_detail, company_stage, industry_cat, customer_cat
WHERE company_reg.company_id =:companyid
AND company_info.company_id =:companyid
AND company_detail.company_id =:companyid
AND company_stage.stage_id = company_detail.stage_id
AND customer_cat.cat_id = company_detail.customer_cat_id
AND (
industry_cat.cat_id = company_info.primary_industry
OR industry_cat.cat_id = company_info.secondary_industry
)');
		$this->database->bind(':companyid',$companyid);
		$result = $this->database->resultset();
		if($this->database->rowCount()>0)
		echo"<br><br>";
		return $result;
	}
	
	public function uniqe_value($r)
	{
		$s_name=array();
		$r=array_unique($r);
		for($i=0;$i<count($r);$i++)
		{
			$this->database->query('select * from company_info where company_id=:cid');
			$this->database->bind(':cid',$r[$i]);
			$s_name=array_merge($s_name,$this->database->resultset());
		}
		return $s_name;
	}
	
	
	
	public function s_cname($key)
	{
		$this->database->query('select * from company_reg where company_name like :key');
		$this->database->bind(":key",$key);
		$data=$this->database->resultset();
		if($data == 0)
		{?>
			<div id='item'>	<?php echo"not found"; ?> </div>
		<?php 
		}
		else
		{
			$_SESSION['calling_page'] = $_SERVER['PHP_SELF'];
			foreach($data as $row)
			{ 
				echo "<a href=Displayprofile.php?task=".$row['company_id'].">$row[company_name]</a><br>";
			}
		}
	}

}
?>