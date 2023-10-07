
<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Admins Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>FirstName</th>
		<th>LastName</th>
		<th>Email</th>
		<th>AdminStatus</th>
		<th>Super Admin Access</th>
		<th>Super Admin</th>
		<th>Remove Admin</th>
	</tr>
	<?php 
	include("includes/db.php");

	$email=$_SESSION["email"];
	
	$get_c = "select * from admins";
	
	$run_c = mysqli_query($con, $get_c); 
	
	$i = 0;
	
	while ($row_c=mysqli_fetch_array($run_c)){
		
		$a_id = $row_c['admin_id'];
		$c_fname = $row_c['Firstname'];
		$c_lname = $row_c['Lastname'];
		$c_email = $row_c['admin_email'];
			$c_c = $row_c['Confirm'];
			$superadmin = $row_c['superadmin'];
		
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $c_fname;?></td>
		<td><?php echo $c_lname;?></td>
		<td><?php echo $c_email;?></td>
		<td><?php echo $c_c;?></td>
		<td><?php if($superadmin==1)
		{
			echo "Yes";
			}
			else if($superadmin==0)
			{
				echo "No";
			} else
			{ 
		echo "Not Defined";
		}
			?></td>
			
		<td>
		<?php if($superadmin==1 and $email!=$c_email and ($c_c!='Rejected' and $c_c!='Pending'))
		{
			?>
				<a href="super_a.php?Remove_a=<?php echo $a_id;?>">Remove</a>
				<?php
		}		
			else if($superadmin==0 and $email!=$c_email and ($c_c!='Rejected' and $c_c!='Pending'))
			{
				?>
				<a href="super_a.php?Change_a=<?php echo $a_id;?>">Make</a>
				<?php
			} else if ($email==$c_email)
			{
				echo "";
			}
		else if ($c_c=='Rejected')
		{
			
		}
		else if ($c_c=='Pending')
		{
			
		}
			else { 
		echo "Not Defined";
		}
			?>
			</td>
			<?php 
		if($email!=$c_email)
			{
			?>
			<td><a href="delete_a.php?delete_a=<?php echo $a_id;?>">Remove</a></td>
		<?php 
			}
		?>
	
	</tr>
	<?php } ?>




</table>