<?php
session_start();
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
class LoginC
	{	
		public function __construct($cemail,$pswd)
		{	
			$errMsg='';
			$database = new Database();
			if($cemail == '')
			{
				$errMsg .= 'You must enter your Username<br>';
 			}
 			if($pswd == '')
 			{
	 			$errMsg .= 'You must enter your Password<br>';
 			} 
 			echo " ".$errMsg;
 
 			if($errMsg == '')
 			{
	 			$database->query('SELECT * FROM  Company_Reg WHERE company_email = :cemail AND company_password = :pswd');
				$database->bind(":cemail", $cemail);
				$database->bind(":pswd",$pswd);
				$row = $database->single();

				if (CRYPT_MD5 == 1)
				{
					$hash=crypt($row['company_password'],'$1$somethin$');
					//echo "MD5: ".crypt('something','$1$somethin$')."\n<br>"; 
				}
				
				if(($database->rowCount() > 0))
				{
					$_SESSION["cid"] = $row['company_id'];
					$_SESSION["cname"] = $row['company_name'];
					$_SESSION["cemail"] = $row['company_email'];
					//$_SESSION["uname"] = $row['UserName'];
					//echo "login successful";
					header("Location:home.php");

					//exit;
				}
 				else
 				{
	 				$errMsg .= 'Username and Password are not found<br>';
 				}
			}
			$database = null;
		}
	}
?>