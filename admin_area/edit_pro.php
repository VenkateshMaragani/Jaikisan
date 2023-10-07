<!DOCTYPE>

<?php 

include("includes/db.php");

if(isset($_GET['edit_pro'])){

	$get_id = $_GET['edit_pro']; 
	
	$get_pro = "select * from products where product_id='$get_id'";
	
	$run_pro = mysqli_query($con, $get_pro); 
	
	
	$row_pro=mysqli_fetch_array($run_pro);
		
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_image = $row_pro['product_image'];
		$O_price = $row_pro['Originalprice'];
		$pro_cat = $row_pro['product_cat'];
			$discount = $row_pro['Discount'];
		
		
		$get_cat = "select * from categories where cat_id='$pro_cat'";
		
		$run_cat=mysqli_query($con, $get_cat); 
		
		$row_cat=mysqli_fetch_array($run_cat); 
		
		$category_title = $row_cat['cat_title']??NULL;
		
		
?>
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
				<td colspan="7"><h2>Edit & Update Product</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Title:</b></td>
				<td><input type="text" name="product_title" size="60" value="<?php echo $pro_title;?>"/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Category:</b></td>
				<td>
				<select name="product_cat" >
					<option><?php echo $category_title; ?></option>
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
				<td>
				<input type="file" name="product_image" /><img src="product_images/
				<?php echo $pro_image; ?>
				" width="60" height="60"/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Original Product Price(Rs):</b></td>
				<td><input type="text" name="Original_price" value="<?php echo $O_price;?>"/></td>
			</tr>
	        <tr>
				<td align="right"><b>Product Discount(%):</b></td>
				<td><input type="text" name="discount_price" value="<?php echo $discount;?>"/></td>
			</tr>
			
			<tr align="center">
				<td colspan="7"><input type="submit" name="update_product" value="Update Product"/></td>
			</tr>
		
		</table>
	
	
	</form>


</body> 
</html>
<?php 

	if(isset($_POST['update_product'])){
	
		//getting the text data from the fields
		
		$update_id = $pro_id;
		
		$product_title = $_POST['product_title'];
		$product_cat= $_POST['product_cat'];
		
		$Original_price = $_POST['Original_price'];
		$discount_price = $_POST['discount_price'];
		
	
		//getting the image from the field
		
		
		if(!empty($_FILES['product_image']['name']))
		{
			$product_image = $_FILES['product_image']['name'];
			$product_image_tmp = $_FILES['product_image']['tmp_name'];
            	move_uploaded_file($product_image_tmp,"product_images/$product_image");
			
			}
		
		else{
			
			$product_image=$pro_image;
		
			
		    }
		
	
	
         $pro_price=$Original_price-(($Original_price*$discount_price)/100);
	
	
		  
		  $update_product = "update products set product_cat='$product_cat',product_title='$product_title',Originalprice='$Original_price',product_image='$product_image',Discount='$discount_price',product_price='$pro_price' where product_id='$update_id'";
		 
		 $run_product = mysqli_query($con, $update_product);
		  
		 
		 if($run_product){
		 
		 echo "<script>alert('Product has been updated!')</script>";
		 
		 echo "<script>window.open('index.php?view_products','_self')</script>";
		 
		 }
	}






}

?>












