<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
include "db.php";
if (isset($_POST["f_name"])) {

	$f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$area=$_POST['area'];
	$pincode=$_POST['pincode'];
	$name = "/^[a-zA-Z0-9]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";
	$hash= mt_rand(0,999999);
	//$uid= srand(); 

if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
	empty($mobile) || empty($address1) || empty($address2) || empty($area) || empty($pincode)){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill all the details..!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($name,$f_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b> Entered $f_name is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($name,$l_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Entered $l_name is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Entered $email is not valid..!</b>
			</div>
		";
		exit();
	}
	if($email==$emailValidation)
	{
	    echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Entered $email is already exist..!</b>
			</div>
		";
		exit();
	}
	    
		if($password != $repassword){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password and Confirm Password should match</b>
			</div>
		";
	}
	if($password == $repassword){
	if(strlen($password) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
		exit();
	}
	if(strlen($repassword) < 9 ){
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
    
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>
		";
		exit();
	}
	
	$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	
	$sql1 = "SELECT user_id FROM user_info WHERE mobile = '$mobile'" ;
	$check_query1 = mysqli_query($con,$sql1);
	$count_phone = mysqli_num_rows($check_query1);
	if($count_phone > 0 && $count_email > 0 ){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email address and mobile number is already available Try  registering with Another</b>
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
		
		$sql = "INSERT INTO `user_info` 
		(`first_name`, `last_name`, `email`, 
		`password`, `mobile`, `address1`, `address2`,`hash`,`pincode`,`area`) 
		VALUES ('$f_name', '$l_name', '$email', 
		'$password', '$mobile', '$address1', '$address2','$hash','$pincode','$area')";
		$run_query = mysqli_query($con,$sql);
		$_SESSION["uid"] = mysqli_insert_id($con);
		$_SESSION["name"] = $f_name;
		$ip_add = getenv("REMOTE_ADDR");
		$sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
	


	}
	if(mysqli_query($con,$sql)){
include "db.php";
if(isset($_SESSION["uid"])){
		    

		$user_id = $_SESSION["uid"];
		$s = "SELECT * FROM user_info WHERE user_id = '$user_id'";
	    $quer = mysqli_query($con, $s); 
				
			$r_c = mysqli_fetch_array($quer); 
                    $email=  $r_c['email'];
					$hash=   $r_c['hash'];
					$name=   $r_c['first_name'];
}
if(mysqli_num_rows($quer) > 0 || mysqli_num_rows($quer) <= 0){
	require 'vendor/autoload.php';
$mail = new PHPMailer(true);  
                            // Passing `true` enables exceptions
try {
	error_log(print_r($email, true));
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
	$mail->CharSet =  "utf-8";
    $mail->isSMTP();                                      // Set mailer to use SMTP
   $mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'Jaikisan.shop@outlook.com';                 // SMTP username
    $mail->Password = 'Akhil@7730027334';                            // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
   $mail->setFrom('Jaikisan.shop@outlook.com', 'JAIKISAN');
    $mail->addAddress($email);     // Add a recipient
    //Content
    $mail->isHTML(true);                               // Set email format to HTML
    $mail->Subject =  $name.' Verify your email';
    $mail->Body    = ' Hello '.$email.
	' Your verification code is '.$hash.'.';
   
    $status=$mail-> send();
   	if($status)
	{
		echo '';
	}
	else 
	{
		echo "Mailer Error:".$mail->ErrorInfo;
		echo '</br>
			<div class="alert alert-danger">
				<a class="close" data-dismiss="alert" aria-label="close">&times;</a>

				<b>Entered Email is not correct go back & registered with correct email..!</b>

			</div>';
			$sql1 = "delete  FROM user_info WHERE email = '$email'" ;
		$query1 = mysqli_query($con,$sql1);
		session_destroy();
		echo "<script>window.open('index.php','_self')</script>";
		exit();
	}
   
} 


catch (Exception $e) {
    echo '</br>
			<div class="alert alert-danger">
				<a class="close" data-dismiss="alert" aria-label="close">&times;</a>

				<b>Entered Email is not correct go back & registered with correct email..!</b>

			</div>';
			$sql1 = "delete  FROM user_info WHERE email = '$email'" ;
		$query1 = mysqli_query($con,$sql1);
		session_destroy();
		echo "<script>window.open('index.php','_self')</script>";
		exit();
		
}




}

 
	echo "<script>window.open('auth.php','_self')</script>";
	
		}
	}
	
}



?>






















































