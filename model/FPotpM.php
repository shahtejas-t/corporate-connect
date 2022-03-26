<?php
session_start();
if(isset($_POST['logout'])) {
      session_destroy();
}
?>
<?php
$cname=$_SESSION["cname"];
$cemail=$_SESSION["cemail"];

echo $_SESSION["cname"];
		echo $_SESSION["cemail"];

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
	
	$database->query('SELECT * FROM  Company_Verify where company_email=:Email');
	$database->bind(':Email', $_SESSION["cemail"]);
	$row = $database->single();
	$hash=$row['hash_pswd'];

		if($otp==$hash)
		{
			header("Location: forgotpassword.php");
		}
	}
}
?>