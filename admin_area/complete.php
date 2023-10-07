<?php 
	include("includes/db.php"); 
	
	if(isset($_GET['complete'])){
	
	$user_id = $_SESSION["uid"];
	
	$delete_c = "delete from orders where product_id='$pro_id' and user_id='$user_id'"; 
	
	$run_delete = mysqli_query($con, $delete_c); 
	
	if($run_delete){
	
	echo "<script>alert('A order  has been  successfully completed the process!')</script>";
	echo "<script>window.open('index.php?view_orders','_self')</script>";
	}
	
	}

?>