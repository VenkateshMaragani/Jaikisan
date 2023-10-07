<?php




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

        session_start(); 
	
	
	if(!isset($_SESSION["name"])){
	
			echo "</br>
	</br>
	</br><script>alert('Login first then Order the product ')</script>";
	echo "<script>window.open('index.php?index.php','_self')</script>";
			exit();
		}
		
	
	
   
?>


<html>
	<head>
									<meta charset="UTF-8">
							<title>JAI KISAN</title>
								<link rel="icon" href ="Tablogo.png" type="image/png"/>
							<link rel="stylesheet" href="css/bootstrap.min.css"/>
							<script src="js/jquery2.js"></script>
							<script src="js/bootstrap.min.js"></script>
							<script src="main.js"></script>
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
    <body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
					<a href="#" class="navbar-brand"><p style="font-size:19px"><img src="rice.png" width="40" height="30"/>&nbsp;&nbsp;&nbsp;</p></a>
			
			</div>
			</div>
			    
			</div>
			<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
											<div class="panel-heading"></div>
												<div class="panel-heading"></div>
											<div class="panel-heading"></div>
											
											<div class="field-group"></div>
										<div class="field-group"></div>
										<div class="field-group"></div>
										<div class="field-group"></div>
										<div class="field-group">
		<div class="form-submit-button">
		<br>
		<center><h2> Your Payment was Successfull!</h2>
		<h1>&#10004;</h1>
	</center>
		</div>
	
</div>
										<div class="panel-body">
										
											<h1>Thank you </h1>
											<hr/>
											<h4>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Your payment is processed
											successfully   and  your  Transaction  id  is  </b><?php 
											
	     if(isset($_POST['txn_id']))
	     
	     {          $cc="INR";
			$trx_id = $_POST['txn_id'];
			echo "." ;
			
	        
	     }
			
			else
			{   $trx_id=mt_rand();
				     echo $trx_id;
                      $cc="INR";

				echo "." ;
			}
	
	
	         ?>
	         </br>
	         </br>
	       							You  can  continue  your  Shopping <h4/></p>
	       							</br>
											<a href="profile.php" class="btn btn-success btn-lg">Continue Shopping</a>
											</br>
											</br>
											
											<p color="red">
											Click the Continue Shopping otherwise You will be redirected to your account in 5 seconds..
										</p>
										</div>
										
										<div class="panel-footer"></div>
									
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
					
	<?php
	include("db.php");
		include("action.php");
		
		//this is all for product details
		
		
		global $con; 
		
		$ip = getIp(); 
		
		$sql = "select * from cart where ip_add='$ip'";
		
		$query = mysqli_query($con, $sql); 
		
		while($p_price=mysqli_fetch_array($query)){
			
			$pro_id = $p_price['p_id']; 
			
			$c_id = $p_price['user_id'];
		     
			$qty =$p_price['qty'];
			
				 $o_id=mt_rand();
			
			$sql = "select * from products where product_id='$pro_id'";
			
			$query = mysqli_query($con,$sql); 
			
			while ($pp_price = mysqli_fetch_array($query)){
			
			$product_price = array($pp_price['product_price']);
			
			$product_id = $pp_price['product_id'];
			
			$pro_name = $pp_price['product_title'];
		    
			$amt=$pp_price['product_price'];
			 if($qty==0)
			    {
			        $qty=1;
				}
				else
				{
					
					$qty=$qty;
					$amt=$amt*$qty;
				}

		
			
			
			}
			// getting Quantity of the product 
				while($p_price=mysqli_fetch_array($query)){
			
			$pro_id = $p_price['p_id']; 
			
			$sql = "select * from cart where p_id='$pro_id'";
			
			$query= mysqli_query($con, $sql); 
			
		
		
			}
			

			
			// this is about the customer
				
			
			
			
			
		if(isset($_SESSION["uid"])){
		    

		$user_id = $_SESSION["uid"];

		$sql1 = "SELECT * FROM cart  WHERE user_id = '$user_id' and p_id= '$pro_id'";
				
		$query1 = mysqli_query($con, $sql1); 
				
			$row_c = mysqli_fetch_array($query1); 
	 
			
          
		
			if (mysqli_num_rows($query1) > 0) {
									 
								
			for ($i=1; $i<= mysqli_num_rows($query1); $i++) 
			{ 
	        	

			$sql2 = "INSERT INTO orders (order_id,user_id,product_id,qty,trx_id,p_status) VALUES ('$o_id','$c_id','$pro_id','$qty','$trx_id','OrderPlaced')";
				mysqli_query($con,$sql2);
				
				$sql3 = "INSERT INTO payments (amount,user_id,product_id,trx_id,currency,payment_date) VALUES ('$amt','$c_id','$pro_id','$trx_id','$cc',NOW())";
				mysqli_query($con,$sql3);
	
				
		    $sql = "DELETE FROM cart where p_id='$pro_id'";
			mysqli_query($con,$sql);
			
			next($row_c);
			
			}
			
		
		
		}	
		
		
			
			
				
			// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
			if(isset($_SESSION["uid"])){
		    

		$user_id = $_SESSION["uid"];
		$s = "SELECT * FROM user_info WHERE user_id = '$user_id'";
	    $quer = mysqli_query($con, $s); 
				
			$r_c = mysqli_fetch_array($quer); 
                    $email=  $r_c['email'];
			}
			
			for ($i=1; $i <=mysqli_num_rows($query1); $i++) { 
//Load Composer's autoloader
require 'vendor/autoload.php';
include "db.php";
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
   //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
	$mail->CharSet =  "utf-8";
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;   	// Enable SMTP authentication
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
    $mail->Subject =  ' Your Order is Successfull';
    $mail->Body    = 'Hello '.$_SESSION['name'].', Thank you for choosing JAIKISAN store. Your order is successfully completed a payment with an amount of Rs';

    $mail->send();
	
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
			}
			}
	
		
			
		 if(isset($_SESSION["name"]))
			 
		{
			header_remove(); 
			header( "refresh:5,url=profile.php" );
		}
			}
		 
			?>
					</body>
					</html>



