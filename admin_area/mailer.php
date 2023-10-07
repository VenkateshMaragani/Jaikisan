<!DOCTYPE>
<html>
	<head>
		<title>Update Product</title> 
		
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
	</head>
	
<body bgcolor="skyblue">


	<form action="" method="post" enctype="multipart/form-data"> 
		
		<table align="center" width="795" border="2" bgcolor="#187eae">
			
			<tr align="center">
				<td colspan="7"><h2>Edit & Update Mailer Setting </br></h2></td>
			</tr>
			<tr></tr>
			
			<?php 

include("includes/db.php");



	
	$get_mr= "select * from mailer";
	
	$run_mr = mysqli_query($con, $get_mr); 
	
	
	$row_mr=mysqli_fetch_array($run_mr);
		
		$mailid = $row_mr['Mailid'];
		$password = $row_mr['Password'];
		

?>

			<tr>
				<td align="right"><b> </br> Mail ID : </b></td>
				<td></br><input type="text" name="mailer_id" size="50" value="<?php echo $mailid;?>"/></td>
			</tr>
			<tr>
				<td align="right"><b> </br> Mail Password : </b></td>
				<td></br><input type="password" name="mailer_password" size="50" value="<?php echo ($password);?>"/></td>
			</tr>
			
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr align="center">
				<td colspan="7"><input type="submit" name="update_mailer" value="Update Credentials"/></td>
			</tr>
		
		</table>
	
	
	</form>


</body> 
<?php 
if(isset($_POST['update_mailer'])){
	
		//getting the text data from the fields
		
		
		$mailer_id = $_POST['mailer_id'];
		$mailer_password= $_POST['mailer_password'];
		
		  
		  $update_mailer = "update mailer set Mailid='$mailer_id',Password=('$mailer_password')";
		 
		 $run_mailer = mysqli_query($con, $update_mailer);
		  
		 
		 if($run_mailer){
		 
		 echo "<script>alert('Mailer has been updated!')</script>";
		 
		 echo "<script>window.open('index.php?mailer','_self')</script>";
		 
		 }
	}
	?>
</html>