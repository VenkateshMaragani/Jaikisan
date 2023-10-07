<?php
if (isset($_GET["register"])) {
	session_start();
	?>

<!DOCTYPE html>
<html>
	<head>
		<style>
form i {
    margin-left:-30px;
    cursor: pointer;
	color : black ;
}
</style>
		<meta charset="UTF-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
	
		<title>JAI KISAN</title>
		<link rel="icon" href ="Tablogo.png" type="image/png"/>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body id="top">
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">

<a href="login_form.php" class="navbar-brand"><p style="font-size:19px"><img src="rice.png" width="40" height="30"/>&nbsp;&nbsp;&nbsp;JAI KISAN</p></a>
			</div>
			<ul class="nav navbar-nav navbar-right">
			<?php
			if ($_SESSION["uid"]??NULL<>NULL)
			{
			?>
				<li><a href="profile.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
			<?php 
			}
			else
			{?>
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
				<?php
			}
				?>
				
			<!--	<li><a href="index.php"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;Product</a></li> -->
			</ul>
		</div>
	</div>
	
	<p><br/></p>
	<p><br/></p>
	

	<div class="container-fluid" >
       <div class="row" >
			<div class="col-md-2"></div>
			<div class="col-md-8"  id="signup_msg" >
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" >
				<div class="panel panel-primary" > 
					<div class="panel-heading" >Customer SignUp Form</div>
					<div class="panel-body" >
					
					<form id="signup_form" onsubmit="return false">
						<div class="row">
							<div class="col-md-6">
								<label for="f_name">*First Name</label>
								<input type="text" id="f_name" name="f_name" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="f_name">*Last Name</label>
								<input type="text" id="l_name" name="l_name"class="form-control">
								
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="email">*Email</label>
								<input type="text" id="email" name="email"class="form-control">

							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<p>
								<label for="password">*Password</label>
								<input type="password" id="password" name="password"class="form-control" style="display: inline-table;">
								<i class="bi bi-eye-slash" id="togglePassword"></i>
		                    </p>
							</div>
							<div class="col-md-6">
								<label for="repassword">*Re-enter Password</label>
								<p>
								<input type="password" id="repassword" name="repassword"class="form-control" style="display: inline-table;">
								<i class="bi bi-eye-slash" id="togglePassword1"></i>
		                    </p>
							
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="mobile">*Mobile</label>
								<input type="text" id="mobile" name="mobile"class="form-control">
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address1">*Address Line 1</label>
								<input type="text" id="address1" name="address1"class="form-control">
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address2">*Address Line 2</label>
								<input type="text" id="address2" name="address2"class="form-control">
								
							</div>
						</div>
							
						   <div class="row">
						   <div class="col-md-6">
								<label for="area">*Area/Locality</label>
								<input type="text" id="area"  name="area"class="form-control">
								
							</div>
							<div class="col-md-6">
								<label for="pincode">*Pincode</label>
								<input type="text" id="pincode" name="pincode"class="form-control">
								
							</div>

						  </div>
	                     </br>
						<div class="row">
							<div class="col-md-12">
								<input style="width:100%;" id="signup" value="Sign Up" type="submit" name="signup_button" class="btn btn-success btn-lg">
							</div>
						</div>
				</div>
					</form>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	

	<script>
	
	$('#signup_form').submit(function() {
    window.location = window.location + "#top";
});
        const togglePassword = document.querySelector("#togglePassword");
		const togglePassword1 = document.querySelector("#togglePassword1");
        const password = document.querySelector("#password");
		 const repassword = document.querySelector("#repassword");
   

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);			
            // toggle the icon
            this.classList.toggle("bi-eye");
        });	   
	
	 togglePassword1.addEventListener("click", function () {
            // toggle the type attribute
            const type1 = repassword.getAttribute("type") === "password" ? "text" : "password";
            repassword.setAttribute("type", type1);			
            // toggle the icon
            this.classList.toggle("bi-eye");
        });	   
	

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('btn btn-success btn-lg', function (e) {
            e.preventDefault();
        });
    </script>
</body>
</html>
	<?php
}



?>






















