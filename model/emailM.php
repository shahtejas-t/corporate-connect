<?php
session_start();
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
class emailC
{	
public function __construct($cemail)
{	
	$database = new Database();
	$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
									// Example output: f4552671f8909587cf485ea990207f3b
		$password = $pswd; // Generate random number between 1000 and 5000 and assign it to a local variable.
									// Example output: 4568

		

		/*$database->query('INSERT INTO Company_Reg (company_name,company_email,company_password) VALUES ( :name, :email, :pswd)');
		$database->bind(':name', $cname);
		$database->bind(':email', $cemail);
		$database->bind(':pswd', $pswd);
		$database->execute();

		$database->query('SELECT * FROM  Company_Reg where company_email=:Email');
		$database->bind(':Email', $cemail);
		$row = $database->single();
		$id=$row['company_id'];*/
		$database->query('SELECT * FROM  Company_Reg where company_email=:Email');
	$database->bind(':Email', $cemail);
	$database->execute();

	if (($database->rowCount())<1)
	{
		echo "You have not registered.<br>Please Register with us.";
	}
	else
	{
		$database->query('DELETE FROM  Company_Verify where company_email=:Email');
		$database->bind(':Email', $cemail);
		$row = $database->execute();
		
		$database->query('INSERT INTO Company_Verify (rand_pswd,company_email,hash_pswd) VALUES (  :pswd, :email, :hash)');
		$database->bind(':pswd', $hash);
		$database->bind(':email', $cemail);
		$database->bind(':hash', $hash);
		$database->execute();
		//$_SESSION["session_usr_id"] = $new_id;
		$_SESSION["email"] = $cemail;
		$to      = $cemail; // Send email to our user
		$subject = 'New Password | Verification'; // Give the email a subject 
		$message = '
 
Thanks for visiting us!
You can create new password by copying the otp code to our website.
 
------------------------
Username: '.$cemail.'
------------------------
 
Please copy this code to activate your account:
'.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From:noreply@corporate_connect.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email*/

		$_SESSION["cname"] = $cname;
		$_SESSION["cemail"] = $cemail;

		header("Location: FPotp.php");
	}
}
}
?>