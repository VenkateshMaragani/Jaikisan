<?php 
include("includes/db.php"); 
		include "../db.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

	if(isset($_GET['Rejection'])){
	
	$admin_email = $_GET['Rejection'];
	
	 $update_status = "update admins set Confirm='Rejected' where admin_email='$admin_email'";
		 
	
	 $update_pro = mysqli_query($con, $update_status);
			
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
    $mail->addAddress($admin_email);     // Add a recipient
   

    //Content
    $mail->isHTML(true);                               // Set email format to HTML
    $mail->Subject =  'JAIKISAN- Admin Status Change-Rejected';
    $mail->Body    = ' Hello '.$admin_email.'. Your account got Rejected due to security concerns, For more details write us back. Thank you !!';
   

    $mail->send();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
 if($update_pro){
		 
		 echo "<script>alert('Admin has been Rejected')</script>";
		 echo "<script>window.open('index.php?approve_admin','_self')</script>";
		 
		 }
	}
	
		

?> 