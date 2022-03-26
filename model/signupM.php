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
class signupC
{	
public function __construct($cname,$cemail,$pswd)
{	
	$database = new Database();
	$database->query('SELECT * FROM  Company_Reg where company_email=:Email');
	$database->bind(':Email', $cemail);
	$database->execute();

	if (($database->rowCount())>0)
	{
		echo "You have already registered.";
	}
	else
	{
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
		$database->query('DELETE FROM  Company_Verify where company_email=:Email');
		$database->bind(':Email', $cemail);
		$row = $database->execute();
		
		$database->query('INSERT INTO Company_Verify (rand_pswd,company_email,hash_pswd) VALUES (  :pswd, :email, :hash)');
		$database->bind(':pswd', $pswd);
		$database->bind(':email', $cemail);
		$database->bind(':hash', $hash);
		$database->execute();
		//$_SESSION["session_usr_id"] = $new_id;
		$_SESSION["email"] = $cemail;
		$to      = $cemail; // Send email to our user
		$subject = 'Signup | Verification'; // Give the email a subject 
		$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$cemail.'
Password: '.$password.'
------------------------
 
Please copy this code to activate your account:
'.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From:noreply@corporate_connect.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email*/

		$_SESSION["cname"] = $cname;
		$_SESSION["cemail"] = $cemail;
		$_SESSION["password"] = $password;

		header("Location: otp.php");
	}
}
}
?>