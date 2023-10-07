<?php 
	include("includes/db.php"); 
	
	if(isset($_GET['Change_a'])){
	
	$change_id = $_GET['Change_a'];
	
	$change_c = "update admins set superadmin='1' where admin_id='$change_id'"; 
	
	$run = mysqli_query($con, $change_c); 
	
	if($run){
	
	echo "<script>alert('SuperAdmin access has been provided for this Admin!')</script>";
	echo "<script>window.open('index.php?view_admins','_self')</script>";
	}
	
	}
	if(isset($_GET['Remove_a'])){
	
	$removeid_id = $_GET['Remove_a'];
	
	$remove_c = "update admins set superadmin='0' where admin_id='$removeid_id'"; 
	
	$run_remove = mysqli_query($con, $remove_c); 
	
	if($run_remove){
	
	echo "<script>alert('SuperAdmin access been removed for this Admin!')</script>";
	echo "<script>window.open('index.php?view_admins','_self')</script>";
	}
	
	}

?>