<!DOCTYPE>

<?php 

include("includes/db.php");

?>
<html>
	<head>
		<title>Inserting Product</title> 
		<link rel="icon" href ="../Tablogo.png" type="image/png"/>
		
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
	</head>
	
<body bgcolor="skyblue">


	<form action="insert_product.php" method="post" enctype="multipart/form-data"> 
		
		<table align="center" width="795" border="2" bgcolor="#187eae" style="padding:20px;border-spacing:15px;">
			
			<tr align="center">
				<td colspan="7"><h2>Insert New Post Here</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Title:</b></td>
				<td><input type="text" name="product_title" size="60" required/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Category:</b></td>
				<td>
				<select name="product_cat" >
					<option>Select a Category</option>
					<?php 
		$get_cats = "select * from categories";
	
		$run_cats = mysqli_query($con, $get_cats);
	
		while ($row_cats=mysqli_fetch_array($run_cats)){
	
		$cat_id = $row_cats['cat_id']; 
		$cat_title = $row_cats['cat_title'];
	
		echo "<option value='$cat_id'>$cat_title</option>";
	
	
	}
					
					?>
				</select>
				
				
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Image:</b></td>
				<td><input type="file" name="product_image" /></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Price(Rs):</b></td>
				<td><input type="text" name="product_price" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Discount(%):</b></td>
				<td><input type="text" name="discount" required/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Keywords:</b></td>
				<td><input type="text" name="product_keywords" size="60" required/></td>
			</tr>
			
			<tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
			</tr>
		
		</table>
	
	
	</form>


</body> 
</html>
<?php 

	if(isset($_POST['insert_post'])){
	
		//getting the text data from the fields
		$product_title = $_POST['product_title'];
		$product_cat= $_POST['product_cat'];
		$product_price = $_POST['product_price'];
		$discount = $_POST['discount'];
		$product_keywords = $_POST['product_keywords'];
		
		
	
		//getting the image from the field
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		
		
		if ($product_cat=='Select a Category')
	{
		echo "<script>alert('Please select the Category option')</script>";
		 echo "<script>window.open('index.php?insert_product','_self')</script>";
	}
	else
	{
		session_start();


	$email=$_SESSION["email"];
	

	$get_admins = "select superadmin,admin_id from admins where admin_email='$email'";
	
	
	$run_admins = mysqli_query($con, $get_admins); 
	
		
	
	while ($row_order=mysqli_fetch_array($run_admins)){
		$admin_id = $row_order['admin_id'];
		
		 $insert_product = "insert into products (product_cat,product_title,product_price,Discount,Originalprice,product_image,product_keywords,admin_id) values ('$product_cat','$product_title',$product_price-(('$product_price'*'$discount')/100),'$discount','$product_price','$product_image','$product_keywords','$admin_id')";
		 
		 $insert_pro = mysqli_query($con, $insert_product);
		 
		 if($insert_pro){
		 
		 echo "<script>alert('Product Has been inserted!')</script>";
		 echo "<script>window.open('index.php?insert_product','_self')</script>";
		 
		 }
	}	 
	}}








?>



