
<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Products Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Title</th>
		<th>Image</th>
		<th>PriceBeforeDiscount(in Rs)</th>
		<th>Discount(%)</th>
		<th>Price(in Rs)</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
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
		$get_pro = "select * from products";

	
	$run_pro = mysqli_query($con, $get_pro); 
	
$i = 0;
	}
else{
	$get_pro = "select p.* from products p,admins a where a.admin_email='$email' and a.admin_id=p.admin_id";

	
	$run_pro = mysqli_query($con, $get_pro); 
	
$i = 0;
}
	
	while ($row_pro=mysqli_fetch_array($run_pro))
	{
		
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_image = $row_pro['product_image'];
		$pro_price = $row_pro['product_price'];
		$discount = $row_pro['Discount'];
		$o_price = $row_pro['Originalprice'];
		
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $pro_title;?></td>
		<td><img src="../product_images/<?php echo $pro_image;?>" width="60" height="60"/></td>
		<td><?php echo $o_price;?></td>
		<td><?php echo $discount;?></td>
		<td><?php echo $pro_price;?></td>
		<td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
		<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id;?>">Delete</a></td>
	
	</tr>
	<?php }} ?>
</table>

