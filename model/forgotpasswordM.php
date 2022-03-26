<?php
session_start();
if(isset($_POST['logout'])) {
      session_destroy();
}
?>
<?php
$cname=$_SESSION["cname"];
$cemail=$_SESSION["cemail"];
if(!class_exists('Database'))
{
include 'C:/xampp/htdocs/hackathon/include/databasec.php';
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "project_h");
}
class forgotpasswordC
{	
public function __construct($pswd)
{
	echo $pswd;	
	$database = new Database();
			$database->query('update Company_Reg set company_password =:pswd where company_email =:cemail');
			$database->bind(':cemail', $_SESSION["cemail"]);
			$database->bind(':pswd', $pswd);
			$database->execute();
			header("Location: index.php");
		}
}
?>