
<table width="795" align="center" bgcolor="pink"> 

	
<tr align="center">
	<td colspan="8"><h2>View All Customers Here</h2></td>
</tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr align="center">
<td colspan="8"><h4>DOR : Date Of Registration , T_O : Total Orders  </h4></td>
</tr>
<td> </td>

<tr align="center" bgcolor="skyblue">
	<th>S.N</th>
	<th>Name</th>
	<th>PhoneNo</th>
	<th>Email</th>
	<th>AreaNPinCode</th>
	<th>DOR</th>
	<th>T_O</th>
	<th>Remove</th>
</tr>
<?php 
include("includes/db.php");

$get_c = "select * from user_info";

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
	$dor=$row_c['DOR'];
	$get_c1 = "select count(order_id) as 'coid', o.user_id from user_info u, orders o where o.user_id=u.user_id and u.user_id='$c_id'";

$run_c1 = mysqli_query($con, $get_c1); 

	$row_c1=mysqli_fetch_array($run_c1);
	$coid=$row_c1['coid'];
	//$c_image = $row_c['customer_image'];
	$i++;

?>
<tr align="center">
	<td><?php echo $i;?></td>
	<td><?php echo trim($f_name." ".$l_name);?></td>
	<td><?php echo $mbl;?></td>
	<td><?php echo $c_email;?></td>
	<td><?php echo $area.",".$pincode ;?></td>
	<td><?php echo $dor ;?></td>
	<td><?php echo $coid ;?></td>
	<!--<td><img src="../customer/customer_images/<?php echo $c_image;?>" width="50" height="50"/></td>-->
	<td><a href="delete_c.php?delete_c=<?php echo $c_id;?>">Remove</a></td>

</tr>
<?php } ?>




</table>