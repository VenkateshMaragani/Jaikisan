<?php 
	include("includes/db.php"); 
	
	if(isset($_GET['InTransit'])){
	
	$order_id = $_GET['InTransit'];
	
	$inTransit_c = "update orders set p_status='InTransit' where order_id='$order_id'"; 
	
	$run_inTransit = mysqli_query($con, $inTransit_c); 
	
	if($run_inTransit){
	
	echo "<script>alert('Order Status has been changed to InTransit!')</script>";
	echo "<script>window.open('index.php?view_orders_sa','_self')</script>";
	}
	
	}
	if(isset($_GET['Cancelled'])){
	
	$order_id1 = $_GET['Cancelled'];
	
	$Cancelled_c = "update orders set p_status='Cancelled' where order_id='$order_id1'"; 
	
	$run_Cancelled = mysqli_query($con, $Cancelled_c); 
	
	if($run_Cancelled){
	
	echo "<script>alert('Order Status has been changed to Cancelled!')</script>";
	echo "<script>window.open('index.php?view_orders_sa','_self')</script>";
	}
	
	}
	if(isset($_GET['Delivered'])){
	
	$order_id2 = $_GET['Delivered'];
	
	$Delivered_c = "update orders set p_status='Delivered' where order_id='$order_id2'"; 
	
	$run_Delivered = mysqli_query($con, $Delivered_c); 
	
	if($run_Delivered){
	
	echo "<script>alert('Order Status has been changed to Delivered!')</script>";
	echo "<script>window.open('index.php?view_orders_sa','_self')</script>";
	}
	
	}

?>