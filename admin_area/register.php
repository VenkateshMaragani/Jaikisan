<body>

<?php
session_start();
include "../db.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["af_name"])) {

	$af_name = $_POST["af_name"];
	$al_name = $_POST["al_name"];
	$aemail = $_POST['aemail'];
	$apassword = $_POST['apassword'];
	$arepassword = $_POST['arepassword'];
	$amobile = $_POST['amobile'];
	$aname = "/^[a-zA-Z0-9]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";
	
	$_SESSION["email"]=$aemail;

if(empty($af_name) || empty($al_name) || empty($aemail) || empty($apassword) || empty($arepassword) ||
	empty($amobile)){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill all the details..!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($aname,$af_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b> Entered $af_name is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($aname,$al_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Entered $l_name is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$aemail)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Entered $aemail is not valid..!</b>
			</div>
		";
		exit();
	}
	/*if($aemail==$emailValidation)
	{
	    echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Entered $aemail is already exist..!</b>
			</div>
		";
		exit();
	}*/
	    
		if($apassword != $arepassword){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password and Confirm Password should match</b>
			</div>
		";
	}
	if($apassword == $arepassword){
	if(strlen($apassword) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
		exit();
	}
	if(strlen($arepassword) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
		exit();
	}
	
}
else
{
    exit();
}
    
	if(!preg_match($number,$amobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $amobile is not valid</b>
			</div>
		";
		exit();
	}
	if(!(strlen($amobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>
		";
		exit();
	}
	
	$sql = "SELECT admin_id FROM admins WHERE admin_email = '$aemail' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	
	$sql1 = "SELECT admin_id FROM admins WHERE mobile = '$amobile'" ;
	$check_query1 = mysqli_query($con,$sql1);
	$count_phone = mysqli_num_rows($check_query1);
	if($count_phone > 0 && $count_email > 0 ){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email address and mobile number is already available Try registering with Another</b>
			</div>
		";
		exit();
	}
	
	else if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is already available Try Another email address</b>
			</div>
		";
		exit();
	}
	else if($count_phone > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>mobile number is already available Try  registering with Another mobile number</b>
			</div>
		";
		exit();
	}	
		
else {
		
		$sql = "INSERT INTO `admins` 
		(`firstname`, `lastname`, `admin_email`, 
		`admin_password`, `mobile`) 
		VALUES ('$af_name', '$al_name', '$aemail', 
		'$apassword', '$amobile')";
		$run_query = mysqli_query($con,$sql);
		
		

require '../vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
	$mail->CharSet =  "utf-8";
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;   	// Enable SMTP authentication
	include "../db.php";
	$sql = "SELECT * from mailer" ;
	$mailing = mysqli_query($con,$sql);
	$row_mailing=mysqli_fetch_array($mailing);
	$Mailid = $row_mailing['Mailid'];
	$Mailpwrd = $row_mailing['Password'];
    $mail->Username = $Mailid;                 // SMTP username
    $mail->Password = $Mailpwrd;                            // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('Jaikisan.shop@outlook.com', 'JAIKISAN');
    $mail->addAddress($aemail);     // Add a recipient
   

    //Content
    $mail->isHTML(true);                               // Set email format to HTML
    $mail->Subject =  'JAIKISAN- Admin registration Pending';
    $mail->Body    = ' Hello '.$aemail.
	' You have Successfully registered as an Admin for JAIKISAN . However, You account is pending for approval for security reasons .
	Please wait until we connect you and approve your profile. Thank you !!';
   

    $mail->send();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
	?>
	

	<?php
	

	echo "<script>alert('Registration Successful..!!')</script>";
	
    echo "<script>window.open('PendingPage.php','_self')</script>";
	}

	}
	
}


?>

	
</body>




















































