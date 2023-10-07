<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:profile.php");
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
		<style>
			table tr td {padding:10px;}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
			<a href="profile.php" class="navbar-brand"><p style="font-size:19px"><img src="rice.png" width="40" height="30"/>&nbsp;&nbsp;&nbsp;JAI KISAN</p></a>
		
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="profile.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
				<!-- <li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>&nbsp;&nbsp;Product</a></li> -->
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	
	<div class="container-fluid">
	
		<div class="row">
		<div class="col-md-20">
		
				
					<div class="panel-body">
						<h1 align="center">Customer Order Details : </b></h1>
						
	                                   
						<?php
							include_once("db.php");
							$user_id = $_SESSION["uid"];
							$orders_list = "SELECT distinct o.order_id,o.p_status,o.user_id,o.product_id,o.qty,o.trx_id,py.payment_date,o.p_status,p.product_title,p.product_price,p.product_image FROM orders o,products p,payments py WHERE o.user_id='$user_id' AND o.product_id=p.product_id AND p.product_id=py.product_id AND o.user_id=py.user_id" ;
							$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									?>
									
                                       
										<div class="row">
										
									
											
											<div class="col-md-6">
											</br>
											</br>
											<table>
												<img style="float:right;" src="product_images/<?php echo $row['product_image']; ?>" />
											</table>
											</div>
											<table>
											<div class="col-md-6">
											</br>
												<table>
													<tr><td>Product Name :</td><td><b><?php echo $row["product_title"]; ?></b> </td></tr>
													<tr><td>Product Price :</td><td><b><?php echo "Rs. ".$row["product_price"]; ?></b></td></tr>
													<tr><td>Quantity :</td><td><b><?php echo $row["qty"]; ?></b></td></tr>
													<tr><td>Total Price :</td><td><b><?php echo $row["qty"]*$row["product_price"]; ?></b></td></tr>
													<tr><td>Transaction Id :</td><td><b><?php echo $row["trx_id"]; ?></b></td></tr>
													<tr><td>Payment Date :</td><td><b><?php echo $row["payment_date"]; ?></b></td></tr>
													<tr><td>Order Status :</td><td><b><?php echo $row["p_status"]; ?></b></td></tr>
												</table>
											</div>
											</table>
											<div> </div>
											<div> </div>
											<div> </div>
										</div>
										
									<?php
								}
								}
									
							else
							{
								?>
								</br>
							<h2 align="center">No Orders found</br></h2>
							<?php
							}
						?>
						
					</div>
					<div class="panel-footer"></div>
			
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
















































