<?php
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
			<?php
			if ($_SESSION["uid"]??NULL<>NULL)
			{
			?>
				<li><a href="profile.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
			<?php 
			}
			else
			{?>
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
				<?php
			}
				?>
				
				<!-- <li><a href="index.php"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;All Products</a></li> -->
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
				<div class="panel panel-primary">
					<div class="panel-heading"><b align="center">Cart Checkout</b>
				<br>
									
					<center><p> Confirm the quantity for each update...!!</br> To confirm the product press &nbsp;"&nbsp;<span class="glyphicon glyphicon-ok-sign"></span>&nbsp;" &nbsp; and To delete the product press &nbsp;"&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;" buttons.&nbsp;</p></div>
					</center>
					
					<div class="panel-body">
					    						
						<div class="row">
							<div class="col-md-1 col-xs-2"><b>Remove</b></div>
							<div class="col-md-2 col-xs-1"><b>Product Image</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Name</b></div>
							<div class="col-md-1 col-xs-2"></div>
				         	<div class="col-md-1 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-1 col-xs-2"><b>Confirm</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Price</b></div>
							<div class="col-md-2 col-xs-2"><b>Price in &#x20b9</b></div>
				
						</div>
						<div id="cart_checkout"></div>
						<?php
					include_once("db.php");
							$user_id = $_SESSION["uid"]??'-1';
							$orders_list = "SELECT * FROM cart WHERE user_id='$user_id'";
							$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) >0) {
								while ($row=mysqli_fetch_array($query)) {
									
									?>
						<!--<div class="row">
							<div class="col-md-2">
								<div class="btn-group">
									<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									<a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
								</div>
							</div>
							<div class="col-md-2"><img src='product_images/imges.jpg'></div>
							<div class="col-md-2">Product Name</div>
							<div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
						</div> -->
						<!--<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b>Total &#x20b9 500000</b>
							</div> -->
							
				<?php
								}
								}
									
							else if($user_id =='-1')
							{
								?>
								</br>
							</div> 
							<h1 align="center" > <span class="glyphicon glyphicon-shopping-cart"></span>Your cart is empty</br></h1>
				        	</div>
							<?php
							}
							else
							{
							?>
								</br>
							</div> 
							<h1 align="center" > <span class="glyphicon glyphicon-shopping-cart"></span>Your cart is empty</br></h1>
				        	</div>
							<?php	
							}
						?>
					
					
					<?php	
	 ?>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>
</body>	
</html>
















		