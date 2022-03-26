
<?php
include'C:/xampp/htdocs/hackathon/include/connect.php';

class so_wrk
{
	protected $database='';
	
	public function __construct()
	{
		$this->database=new Database();
		
	}
	
	public function detail()
	{
		$this->database->query('select company_reg.company_id,company_reg.company_name,company_info.logo,company_detail.company_ovrview from company_reg,company_info,company_detail
		where company_info.company_id=company_reg.company_id and company_detail.company_id=company_reg.company_id');
		$row=$this->database->resultset();
	    return $row;
	}
	
	
}

?>