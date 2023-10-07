<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

?>
<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="UTF-8">
		<title>JAI KISAN</title>
			<link rel="icon" href ="Tablogo.png" type="image/png"/>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			<a href="login_form.php" class="navbar-brand"><p style="font-size:19px"><img src="rice.png" width="40" height="30"/>&nbsp;&nbsp;&nbsp;JAI KISAN</p></a>
		
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
				<!-- <li><a href="index.php"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;Product</a></li> -->
			</ul>
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message--> 
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">

		<?php 
    error_reporting(0);
    if($_POST['submit']=='Send') {
        //keep it inside
        $email=$_POST['email'];

        $con=mysqli_connect("localhost","root","","ecom");
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $query = mysqli_query($con,"select * from user_info where user_email='$email'") or die(mysqli_error($con)); 

        $numrows = $query->num_rows();                                  

        if ($numrows == 1) {  
            $code=rand(100,999);
            $message='You activation link is: http://bing.fun2pk.com/forgot.php?email=$email&code=$code';
            mail($email, "Subject Goes Here", $message);
            echo 'Email sent';
        } else {
            echo 'No user exist with this email id';
        }
    }
?>

<link href="demo-style.css" rel="stylesheet" type="text/css">

<script>
function validate_forgot() {
	if(document.getElementById("user-email").value == "") {
		document.getElementById("validation-message").innerHTML = "Email is required!"
		return false;
	}
	return true
}
</script>
<form name="frmForgot" id="frmForgot" action="forgetpasswordindex.php" method="post">
<h1>Forgot Password?</h1>


	<?php if(!empty($success_message)) { ?>
	<div class="success_message"><?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>

	
	<div class="field-group">
	<label for="email">Please enter your Email </label>
  <input type="email" class="form-control" name="email" id="email" required/>
	</div>
	
	<div class="field-group">
     <div class="row">
	<div>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button">
   
	<?php
			if ($_SESSION["uid"]??NULL<>NULL)
			{
			?>
				<a href="login_form.php"><input type="button" value="Back" class="form-submit-button"></a>
			<?php 
			}
			else
			{?>
				<a href="index.php"><input type="button" value="Back" class="form-submit-button"></a>
				<?php
			}
				?>
	
	</div>
	</div>
	</div>
<div class="row">
			
		<?php
		include "db.php";
		
			
	
		if(isset($_POST["email"]))
		{ 
			$email = $_POST["email"];
	$sql = "SELECT user_id,password FROM user_info WHERE email = '$email' LIMIT 1" ;
	
	$query = mysqli_query($con,$sql);

	if(mysqli_num_rows($query) <= 0){

echo "<script>alert('Entered email address is not registered with us. Kindly register yourself first..!')</script>";
     session_destroy();
		echo "<script>window.open('login_form.php','_self')</script>";
			exit();
			
		}
		else{
			if(isset($_POST["forgot-password"]))
		{
echo "<script>alert('Your password has been sent to your email. Please check ...!!')</script>";
   
		echo "<script>window.open('login_form.php','_self')</script>";
		

			}
		while($row=mysqli_fetch_array($query))
		{
			$name= $row['first_name'];
			$pwrd= $row['password'];
		
		
		
			// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
	$mail->CharSet =  "utf-8";
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;   	// Enable SMTP authentication
	include "../db.php";
	$sqlmailer = "SELECT * from mailer" ;
	$mailing = mysqli_query($con,$sqlmailer);
	$row_mailing=mysqli_fetch_array($mailing);
	$Mailid = $row_mailing['Mailid'];
	$Mailpwrd = $row_mailing['Password'];
    $mail->Username = $Mailid;                 // SMTP username
    $mail->Password = $Mailpwrd;                            // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
                                  // TCP port to connect to

    //Recipients
    $mail->setFrom('Jaikisan.shop@outlook.com', 'JAIKISAN');
    $mail->addAddress($email);     // Add a recipient
   

    //Content
    $mail->isHTML(true);                               // Set email format to HTML
    $mail->Subject =  $name.'Password';
    $mail->Body    = ' Hello '.$email.
	' Your registered password is '.$pwrd.'. Kindly dont share your password with anyone.';
   

    $mail->send();
	
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
		
		}}
		}
		
		?>
</div>
	
</form>
<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>
		
		
</body>	
</html>


	
		
	


















