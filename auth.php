<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
	include "db.php";
if(isset($_SESSION["uid"])){
		    

		$user_id = $_SESSION["uid"];
		$s = "SELECT * FROM user_info WHERE user_id = '$user_id'";
	    $quer = mysqli_query($con, $s); 
				
			$r_c = mysqli_fetch_array($quer); 
                    $email=  $r_c['email'];
					$hash=   $r_c['hash'];
					$name=   $r_c['first_name'];
					$attempts=   $r_c['attempts'];
				
}
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
			<a href="#" class="navbar-brand"><p style="font-size:19px"><img src="rice.png" width="40" height="30"/>&nbsp;&nbsp;&nbsp;JAI KISAN</p></a>
		
			</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6" id="cart_msg">
				<!--Cart Message--> 
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading"><center><h3>Check your Email </h3>A 6 digit code is sent your email</br><?php echo $email; ?></center>
				<br>
					
					<div class="panel-body">
<form action="" method="post">


	<?php if(!empty($success_message)) { ?>
	<div class="success_message"><?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>


   <table align="center" width="600">
	<p>
	</p>
	<div class="row">
	
<div class="col-md-5"></div>
<div class="col-md-2">
	<input type="text" size="6" class="form-control" maxlength="6"    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="otp" id="otp"  />
	<p></p>
	</div>
	
	</div>
	
	<center>Enter the code Here</center>
	<tr align="center">
	
	<td><input type="submit" name="verify" id="verify" value="verify" style="background-color:white; 
    border: none;
    color: black;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 2px 2px;
    cursor: pointer;
	border-radius: 12px"/ ></td>
	
	</tr>
	</tr>
	<td align="right"></td>
	<td></td>
	</tr>
	
	
	<tr align="center">
	<td colspan="3"></br><input type="submit" value="Quit Registration" id="quit1" name="quit1"  style="background-color:white; 
    border: none;
    color: black;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 2px 2px;
    cursor: pointer;
	border-radius: 12px"/ >
	</br>
	</td>
	</tr>
	</br>
	</table>
	</center>
	
	<?php
	
			
		if(isset($_POST["quit1"])){

		$sql1 = "delete  FROM user_info WHERE email = '$email'" ;
		$query1 = mysqli_query($con,$sql1);
		session_destroy();
		echo "<script>window.open('login_form.php','_self')</script>";
			exit();
			
			}
			
		if(isset($_POST["verify"]))
			
		
			{
	if(isset($_POST["otp"]))
	       
		{ 
		
			$otp = $_POST["otp"];
	$sql = "SELECT user_id FROM user_info WHERE email = '$email' " ;
	
	$query = mysqli_query($con,$sql);
	if(mysqli_num_rows($query) >0){
		
		
			if($otp==$hash)
			{
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
    $mail->Subject =  $name.' Email is verified';
    $mail->Body    = ' Hello '.$email.
	'. Your Email is successfully verified!';

    $mail->send();
	
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
    echo "<script>alert('Your email is successfully Verified')</script>";
 
	echo "<script>window.open('profile.php','_self')</script>";
			exit();
			}
			
			
			
			else if($otp!=$hash)
		{ 
	
	if(!isset($otp) || trim($otp) == '')
	{
		
		echo "</br>
			<div class='alert alert-warning'>
				<a class='close' data-dismiss='alert' aria-label='close'>&times;</a>

				<b>Enter your 6 Digit code first..!</b>
			</div>";
			exit();
	}

	  else{
		 $counter= ($attempts -1);
			echo "</br>
			<div class='alert alert-warning'>
				<a class='close' data-dismiss='alert' aria-label='close'>&times;</a>

				<b>Entered verification code is incorrect, You have only $counter / 3 attempt(s) left..!! </b>
			</div>";
			
			$sql2 = "update user_info set attempts = $attempts -1 WHERE user_id = '$user_id'";
		    $query2 = mysqli_query($con,$sql2);

			
		if($attempts == 1)
		{
			
			echo "<script>alert('You have reached maximum number of failed attempts(3). Please register again..!!')</script>";
			$sql3 = "delete  FROM user_info WHERE email = '$email'" ;
		    $query3 = mysqli_query($con,$sql3);
			echo "<script>window.open('login_form.php','_self')</script>";
			exit();
		
		}
			exit();
	
		}
		}

		}
	}
		

	                              }

		   
		
		
		
	
		
		?>

</form>

						
						</div> 
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>
</body>	
</html>



	
		
	


















