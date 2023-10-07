<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


?>
<!DOCTYPE html>
<html>
	<head>
	<style>
form i {
    margin-left:-30px;
    cursor: pointer;
	color : black ;
}
</style>
		<meta charset="UTF-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
		<title>JAI KISAN</title>
		<link rel="icon" href ="Tablogo.png" type="image/png"/>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<style>
			@media screen and (max-width:480px){
				#search{width:80%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
			}
		</style>
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
				<a href="profile.php" class="navbar-brand"><p style="font-size:19px"><img src="rice.png" width="40" height="30"/>&nbsp;JAI KISAN</p></a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="profile.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
			<!--	<li><a href="index.php"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;Product</a></li> -->
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
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<p>
			</p>
<div class="panel panel-primary">
<div class="panel-heading"><h4>Change Your Password</h4></div>
<form action="" method="post"> 
	
	<table align="center" width="600">
	<tr>
	<td align="right"><b>Current Password: &nbsp;&nbsp;</b></td>
	<td>
	<p>
	<input type="password" name="current_pass" id="curpassword" required>
	<i class="bi bi-eye-slash" id="togglePassword"></i>
    </p>
    </td>
	
	</br>
	
	</tr>
	<td></td>
	<td></td>
	</tr>
	
	
	<tr>
	<td align="right"><b></br>New Password:&nbsp;&nbsp;</br></b></td>
	<td></br>
	<p>
	<input type="password" name="new_pass" id="newpassword" required>
	<i class="bi bi-eye-slash" id="togglePassword1"></i>
    </p>
	</td>
	</tr>
	</tr>
	<td align="right"></td>
	<td></td>
	</tr>
	
	
	<tr>
	<td align="right"><b></br>Confirm Password:&nbsp;&nbsp;</br></b></td>
	<td></br>
	<p>
	<input type="password" name="new_pass_again" id="conpassword" required>
		<i class="bi bi-eye-slash" id="togglePassword2"></i>
    </p>
	</td>
	</tr>
	
	
	<tr align="center">
	<td colspan="3"></br><input type="submit" name="change_pass" color="blue" value="Change Password"
	
	style="background-color:#0063cc; 
    border: none;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
	border-radius: 12px"/>
	</br>
	</td>
	</tr>
	</br>
	</table>
<p></br>
</p>

</form>
<?php 

include("db.php"); 


	if(isset($_POST['change_pass'])){
		if(isset($_SESSION["uid"])){
		    

		$user_id = $_SESSION["uid"];
	      
		$current_pass = $_POST['current_pass']; 
		$new_pass = $_POST['new_pass']; 
		$new_again = $_POST['new_pass_again']; 
		
		$sel_pass = "select * from user_info where user_id = '$user_id' and password='$current_pass'"; 
		
		$run_pass = mysqli_query($con, $sel_pass); 
		
		$check_pass = mysqli_num_rows($run_pass); 
         
		
	
		if($check_pass==0){
		echo "</br>
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>

				<b>Your current password is wrong...!</b>
			</div>";
		exit();
		}
		
		if($current_pass==$new_pass){
		echo "</br>
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>

				<b> Your current password and new password should not match...!</b>
			</div>";
		
		exit();
		}
		if($new_pass!=$new_again){
		echo "</br>
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>

				<b> Your new password and Confirm password should match...!</b>
			</div>";
		
		exit();
		}
		
		
		else {
		
		$update_pass = "update user_info set password='$new_pass' where user_id='$_SESSION[uid]'";
		
		$run_update = mysqli_query($con, $update_pass); 
		if(isset($_SESSION["uid"])){
		    

		$user_id = $_SESSION["uid"];
		$s = "SELECT * FROM user_info WHERE user_id = '$user_id'";
	    $quer = mysqli_query($con, $s); 
				
			$r_c = mysqli_fetch_array($quer); 
                    $email=  $r_c['email'];
			}
		
		
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
    $mail->Subject =  'Your Password has changed';
    $mail->Body    = ' Hello '.$email.
	'. Your Password has been Reset successfully !';
   

    $mail->send();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
echo "<script>alert('Your password have been updated succesfully, Kindly login again with your new password !')</script>";
     session_destroy();
		echo "<script>window.open('login_form.php','_self')</script>";
		
		}
	}
	}
?>
</div>
</div>	
</form>
<div class="panel-footer"></div>
				</div>
			</div>
			<script>
        const togglePassword = document.querySelector("#togglePassword");
		 const togglePassword1 = document.querySelector("#togglePassword1");
		  const togglePassword2 = document.querySelector("#togglePassword2");

        const curpassword = document.querySelector("#curpassword");
		const newpassword = document.querySelector("#newpassword");
		const conpassword = document.querySelector("#conpassword");
		
  

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = curpassword.getAttribute("type") === "password" ? "text" : "password";
            curpassword.setAttribute("type", type);			
            // toggle the icon
            this.classList.toggle("bi-eye");
        });	  
        togglePassword1.addEventListener("click", function () {
            // toggle the type attribute
            const type1 = newpassword.getAttribute("type") === "password" ? "text" : "password";
            newpassword.setAttribute("type", type1);			
            // toggle the icon
            this.classList.toggle("bi-eye");
        });	  
       togglePassword2.addEventListener("click", function () {
            // toggle the type attribute
            const type2 = conpassword.getAttribute("type") === "password" ? "text" : "password";
            conpassword.setAttribute("type", type2);			
            // toggle the icon
            this.classList.toggle("bi-eye");
        });	  		

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('btn btn-success btn-lg', function (e) {
            e.preventDefault();
        });
    </script>
</body>	
</html>
















		

