<?php 
session_start();
if (!isset($_SESSION["email"])) {
	header("location:login.php");
}
  
?>

<!DOCTYPE> 

<html>
	<head>
		<title>admin area</title> 
		<link rel="icon" href ="../Tablogo.png" type="image/png"/>
	<link rel="stylesheet" href="styles/style.css" media="all" /> 
	
	</head>
	


<body> 

	<div class="main_wrapper">
	

		<div id="header"></div>
		
		<div id="right">
		
		<?php 
	
	include("includes/db.php");
	
	
	$email=$_SESSION["email"];
	$get_admins = "select superadmin,admin_id from admins where admin_email='$email'";
	
	
	$run_admins = mysqli_query($con, $get_admins); 
	$admin_id = $row_order['admin_id']??NULL;
		$admin_id=$_SESSION["admin_id"]??NULL;
		
		$_SESSION["admin_id"] = $admin_id;
	
	while ($row_order=mysqli_fetch_array($run_admins)){
		
		$superadmin = $row_order['superadmin'];
	if ($superadmin==1)
	{
		?>
		<div>
        
		<h2 style="text-align:center;">Manage Content</h2>
			<a href="index.php?mailer">Mailer Configuration</a>
			<a href="index.php?approve_admin">Admin Approval</a>
			<a href="index.php?insert_product">Insert New Product</a>
			<a href="index.php?view_products">View All Products</a>
			<a href="index.php?insert_cat">Insert New Category</a>
			<a href="index.php?view_cats_1">View All Categories</a>
			<a href="index.php?view_customers_1">View Customers</a>
			<a href="index.php?view_admins">Manage Admins</a>
			<a href="index.php?view_orders_sa">View Orders</a>
			<a href="index.php?view_payments_sa">View Payments</a>
			<a href="logout.php">Admin Logout</a>
		
		</div>
	<?php
		
	}
	else if($superadmin==0)
	{
		?>
		
		<h2 style="text-align:center;">Manage Content</h2>
			<a href="index.php?insert_product">Insert New Product</a>
			<a href="index.php?view_products">View All Products</a>
			<a href="index.php?insert_cat">Insert New Category</a>
			<a href="index.php?view_cats_0">View All Categories</a>
			<a href="index.php?view_customers_0">View Customers</a>
			<a href="index.php?view_orders">View Orders</a>
			<a href="index.php?view_payments">View Payments</a>
			<a href="logout.php">Admin Logout</a>
		
	
		
		
		<?php
	}

	else
	{
		
	}
	
	}
		?>
			</div>
		
		<div id="left">
		 <h3 style="color:Brown; text-align:center;"> Current Logged Mail : <?php echo $email;?></h3>
		<h1 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h1>
		<?php include("includes/db.php");
		
		if(isset($_GET['approve_admin'])){
		
		include("approve_admin.php"); 
		
		
		}
		if(isset($_GET['mailer'])){
		
		include("mailer.php"); 
		
		
		}
		if(isset($_GET['insert_product'])){
		
		include("insert_product.php"); 
		
		}
		if(isset($_GET['view_orders_sa'])){
		
		include("view_orders_sa.php"); 
		
		}
		if(isset($_GET['view_payments_sa'])){
		
		include("view_payments_sa.php"); 
		
		}
		if(isset($_GET['view_products'])){
		
		include("view_products.php"); 
		
		}
		if(isset($_GET['edit_pro'])){
		
		include("edit_pro.php"); 
		
		}
		if(isset($_GET['insert_cat'])){
		
		include("insert_cat.php"); 
		
		}
		
		if(isset($_GET['view_cats_0'])){
		
		include("view_cats_0.php"); 
		
		}
		if(isset($_GET['view_cats_1'])){
		
		include("view_cats_1.php"); 
		
		}
		
		if(isset($_GET['edit_cat'])){
		
		include("edit_cat.php"); 
		
		}
		

		if(isset($_GET['view_customers_1'])){
		
		include("view_customers_1.php"); 
		
		}
		if(isset($_GET['view_customers_0'])){
		
		include("view_customers_0.php"); 
		
		}
		
		if(isset($_GET['view_admins'])){
		
		include("view_admins.php"); 
		
		}
		if(isset($_GET['view_orders'])){
		
		include("view_orders.php"); 
		
		}
		if(isset($_GET['view_payments'])){
		
		include("view_payments.php"); 
		
	}
		?>
		</div>





</div>
	</div>


</body>
</html>
