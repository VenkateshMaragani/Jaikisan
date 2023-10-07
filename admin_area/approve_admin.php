<head>
<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>


$(document).ready(function(){ 
    $('.button').click(function(){ 
        var clickBtnValue = $(this).val(); 
        var ajaxurl = 'Approval.php', 
        data =  {'action': clickBtnValue}; 
        $.post(ajaxurl, data, function (response) { 
            // Response div goes here. 
            alert("Status has been changed"); 
        }); 
    }); 
 
}); 

</script>
</head>

<table width="795" align="center" bgcolor="pink"> 
		
	<tr align="center">
		<td colspan="6"><h2>Approve Admin Login Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile</th>
		  <th>CurrentStatus</th>
         <th>Approval</th>
		
		
	</tr>
	<tr></tr>

	<?php 
	include("includes/db.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

	
	$get_admins = "select * from admins where Confirm='Pending'";
	
	$run_admins = mysqli_query($con, $get_admins); 
	
	$i = 0;
	
	while ($row_order=mysqli_fetch_array($run_admins)){
		$a_id = $row_order['admin_id'];
		$afirstname = $row_order['Firstname'];
		$alastname = $row_order['Lastname'];
		$admin_email = $row_order['admin_email'];
		$mobile = $row_order['mobile'];
		$cstatus = $row_order['Confirm'];
		$superadmin = $row_order['superadmin'];
	
		
	
		$i++;
			
	        
 
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
	    <td><?php echo $afirstname." ".$alastname; ?></td>
        <td><?php echo $admin_email; ?></td>
		<td><?php echo $mobile ;?></td>
	<td><?php echo $cstatus;?></td>
		<td>
	
		<a href="Approval.php?Approval=<?php echo $admin_email;?>">Approve</a>
		<a>&nbsp;/</a>
		<a href="Rejection.php?Rejection=<?php echo $admin_email;?>">Reject</a>
		
		</td>
	
	
	<!--<input type="submit" name="status_post" value ="Submit Status"></input> -->
		
		<?php
	}
?>	
		
		<tr></tr>
		
		<tr></tr>
		
		
		<tr></tr>
		
		<tr></tr>
		
		<tr></tr>
		
		<tr></tr>
		<tr align="center">
				
			</tr>
	
</table>



			