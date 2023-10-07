<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View all orders here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Email</th>
		<th>Product id</th>
                <th>order id</th>
		<th>Quantity</th>
		<th>Order Date</th>
		<th>Status</th>
		<th>Change Status</th>
		
	</tr>
	<?php 
	include("includes/db.php");
	$email=$_SESSION["email"];
	$get_order = "select * from orders o";

	
	$run_order = mysqli_query($con, $get_order); 
	
	$i = 0;
	
	while ($row_order=mysqli_fetch_array($run_order)){
		
		$order_id = $row_order['order_id'];
		$qty = $row_order['qty'];
		$pro_id = $row_order['product_id'];
		$c_id = $row_order['user_id'];
		$status = $row_order['p_status'];
		
	
		$i++;
			$get_pay = "select * from payments";
		$run_pay = mysqli_query($con, $get_pay); 
		
		$row_pay=mysqli_fetch_array($run_pay); 
			$order_date = $row_pay['payment_date'];
			
			
		

		$get_c = "select * from user_info where user_id='$c_id'";
		$run_c = mysqli_query($con, $get_c); 
		
		$row_c=mysqli_fetch_array($run_c); 
		
		$c_email = $row_c['email'];
		

	          
 
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
	    <td><?php echo $c_email; ?></td>
	    <td><?php echo $pro_id;?></td>
        <td><?php echo $order_id; ?></td>
		<td><?php echo $qty ;?></td>
	    <td><?php echo $order_date;?></td>
	    <td><?php echo $status;?></td>
	    <td>
		<a href="Change_s.php?InTransit=<?php echo $order_id;?>">InTransit/</a> 
	    <a href="Change_s.php?Cancelled=<?php echo $order_id;?>">Cancelled/</a> 
	    <a href="Change_s.php?Delivered=<?php echo $order_id;?>">Delivered</a>
		</td> 
		
	</tr>
 <?php

	} ?>
</table>