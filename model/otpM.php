<?php
session_start();
if(isset($_POST['logout'])) {
      session_destroy();
}
?>
<?php
$cname=$_SESSION["cname"];
$cemail=$_SESSION["cemail"];
$pswd=$_SESSION["password"];

if(!class_exists('Database'))
{
include 'C:/xampp/htdocs/hackathon/include/databasec.php';
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "project_h");
}
class otpC
{	
public function __construct($otp)
{	
	$database = new Database();
	echo $_SESSION["cemail"];
	$database->query('SELECT * FROM  Company_Verify where company_email=:Email');
	$database->bind(':Email', $_SESSION["cemail"]);
	$row = $database->single();
	$hash=$row['hash_pswd'];


		if($otp==$hash)
		{
			$database->query('INSERT INTO Company_Reg (company_name,company_email,company_password) VALUES ( :name, :email, :pswd)');
			$database->bind(':name', $_SESSION["cname"]);
			$database->bind(':email', $_SESSION["cemail"]);
			$database->bind(':pswd', $_SESSION["password"]);
			$database->execute();
			$database->query('select * from company_reg where company_email =:email');
			$database->bind(':email', $_SESSION["cemail"]);
			$crow=$database->single();
			$_SESSION["cid"]=$crow['company_id'];

			$database->query('INSERT INTO Company_Info (company_id) VALUES ( :id)');
			$database->bind(':id', $_SESSION["cid"]);
			$database->execute();
			$database->query('INSERT INTO Company_detail (company_id) VALUES ( :id)');
			$database->bind(':id', $_SESSION["cid"]);
			$database->execute();
			header("Location: home.php");
		}
	}
}
?>