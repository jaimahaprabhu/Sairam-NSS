
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registration";
    // Create connection
    
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
	$phone = $_POST["phone"];
			$name = $_POST["name"];

			$college = $_POST["college"];
		
		    $email = $_POST["email"];
        $year=$_POST["year"];

        
    static $count = 0;
 
	       $sql= "INSERT INTO registration(name,email,phone,college,year) VALUES ('$name','$email','$phone','$college','$year')" ;
        	if ($conn->query($sql) === TRUE) {
   ini_set("SMTP", "smtp.server.com");//confirm smtp
$to=$email;

$subject="Thank You! 
You have been successfully registered";

$header="from: test email <Test@test.com>";

$message="Your Comfirmation link\r\n";
$message.="Click on this link to activate your account\r\n";
$message.="You can not login to your new account until you have confirmed your activation\r\n";
$message.="http://test.com/activation-confirmation.php?passkey=$securecode";
$sentmail = mail($to,$subject,$message,$header);
                         
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	}

?>

