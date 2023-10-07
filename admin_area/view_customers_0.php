
<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Customers Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>PhoneNo</th>
		<th>Email</th>
		<th>Location,Pincode</th>
		<!--<th>Delete</th> -->
	</tr>
	<?php 
	include("includes/db.php");
	$email=$_SESSION["email"];
	
	$get_c = "SELECT distinct u.user_id,u.first_name,u.last_name,u.mobile,u.email,u.area,u.pincode from orders o,user_info u,products p,admins a WHERE u.user_id=o.user_id AND p.product_id=o.product_id AND p.admin_id=a.admin_id AND a.admin_email='$email' ";
	
	$run_c = mysqli_query($con, $get_c); 
	
	$i = 0;
	
	while ($row_c=mysqli_fetch_array($run_c)){
		
		$c_id = $row_c['user_id'];
		$f_name = $row_c['first_name'];
		$l_name = $row_c['last_name'];
		$mbl = $row_c['mobile'];
		$c_email = $row_c['email'];
		$area=$row_c['area'];
		$pincode=$row_c['pincode'];
		//$c_image = $row_c['customer_image'];
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $l_name;?></td>
		<td><?php echo $f_name;?></td>
		<td><?php echo $mbl;?></td>
		<td><?php echo $c_email;?></td>
		<td><?php echo $area.",".$pincode ;?></td>
		<!--<td><img src="../customer/customer_images/<?php echo $c_image;?>" width="50" height="50"/></td>-->
		<!--<td><a href="delete_c.php?delete_c=<?php echo $c_id;?>">Delete</a></td> -->
	
	</tr>
	<?php } ?>




</table>