<?php 
	include("includes/db.php"); 
	
	if(isset($_GET['delete_a'])){
	
	$delete_id = $_GET['delete_a'];
	
	$delete_c = "delete from admins where admin_id='$delete_id'"; 
	
	$run_delete = mysqli_query($con, $delete_c); 
	
	if($run_delete){
	
	echo "<script>alert('Admin has been Removed permanently!')</script>";
	echo "<script>window.open('index.php?view_admins','_self')</script>";
	}
	
	}

?>