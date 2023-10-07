<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>JAI KISAN</title>
		<link rel="icon" href ="Tablogo.png" type="image/png"/>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<style>
			table tr td {padding:10px;}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
			<a href="profile.php" class="navbar-brand"><p style="font-size:19px"><img src="rice.png" width="40" height="30"/>&nbsp;&nbsp;&nbsp;JAI KISAN</p></a>
		
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="profile.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
				<!-- <li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>&nbsp;&nbsp;Product</a></li> -->
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	
	<div class="container-fluid">
	
		<div class="row">
		<div class="col-md-20">
		
				
					<div class="panel-body">
						<h1 align="Center"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						MyProfile Details : </b></h1>
						
	                                   
						<?php
							include_once("db.php");
							$user_id = $_SESSION["uid"];
							$orders_list = 
							"SELECT * FROM user_info WHERE user_id='$user_id'" ;
							$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									?>
									
                                       
										<div class="row">
																		
											<table>
											<div class="col-md-5">
											</br>
												<table>
													<tr><td>First Name :</td><td><b><?php echo $row["first_name"]; ?></b> </td></tr>
													<tr><td>Last Name :</td><td><b><?php echo $row["last_name"]; ?></b></td></tr>
													<tr><td>Email ID :</td><td><b><?php echo $row["email"]; ?></b></td></tr>
													<tr><td>Phone number :</td><td><b><?php echo $row["mobile"]; ?></b></td></tr>
													<tr><td>Address :</td><td><b><?php echo $row["address1"].",".$row["address2"]; ?></b></td></tr>
													<tr><td>Area/Locality :</td><td><b><?php echo $row["area"]; ?></b></td></tr>
													<tr><td>Pincode :</td><td><b><?php echo $row["pincode"]; ?></b></td></tr>
										
												</table>
											</div>
											</table>
											<div> </div>
											<div> </div>
											<div> </div>
										</div>
										
									<?php
								}
								}
									
							else
							{
								?>
								</br>
							<h2 align="center">No Orders found</br></h2>
							<?php
							}
						?>
						
					</div>
					<div class="panel-footer"></div>
			
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
















































