<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View all payments here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Customer Email</th>
		<th>Product id</th>
		<th>Paid Amount</th>
		<th>Transaction ID</th>
		<th>Payment Date</th>
	</tr>
	<?php 
	include("includes/db.php");
	$email=$_SESSION["email"];
	$get_payment = "select py.* from payments py, admins a,products p where a.admin_email='$email' and a.admin_id=p.admin_id and py.product_id=p.product_id ";

	
	$run_payment = mysqli_query($con, $get_payment); 
	
	$i = 0;
	
	while ($row_payment=mysqli_fetch_array($run_payment)){
		
		$amount = $row_payment['amount'];
		$trx_id = $row_payment['trx_id']; 
		$payment_date = $row_payment['payment_date'];
		$pro_id = $row_payment['product_id'];
		$c_id = $row_payment['user_id'];
		
		$i++;
		
		$get_pro = "select * from products where product_id='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro); 
		
		$row_pro=mysqli_fetch_array($run_pro); 
		
		$pro_image = $row_pro['product_image']; 
		$pro_title = $row_pro['product_title'];
		
		$get_c = "select * from user_info where user_id='$c_id'";
		$run_c = mysqli_query($con, $get_c); 
		
		$row_c=mysqli_fetch_array($run_c); 
		
		$c_email = $row_c['email'];
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $c_email; ?></td>
		
		<td><?php echo $pro_id;?>
		</td>
	<td><?php echo $amount;?></td>
		<td><?php echo $trx_id;?></td>
		<td><?php echo $payment_date;?></td>
	
	</tr>
	<?php } ?>
</table>