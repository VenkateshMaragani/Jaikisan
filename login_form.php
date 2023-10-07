<?php
#this is Login form page , if user is already logged in then we will not allow user to access this page by executing isset($_SESSION["uid"])
#if below statment return true then we will send user to their profile.php page
if (isset($_SESSION["uid"])) {
	header("location:profile.php");
}
//in action.php page if user click on "ready to checkout" button that time we will pass data in a form from action.php page
if (isset($_POST["login_user_with_product"])) {
	//this is product list array
	$product_list = $_POST["product_id"];
	//here we are converting array into json format because array cannot be store in cookie
	$json_e = json_encode($product_list);
	//here we are creating cookie and name of cookie is product_list
	setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);

}
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
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
					<a href="index.php" class="navbar-brand"><p style="font-size:19px"><img src="rice.png" width="40" height="30"/>&nbsp;&nbsp;&nbsp;JAI KISAN</p></a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
	
				<!-- <li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>&nbsp;&nbsp;Product</a></li> -->
			</ul>
						<ul class="nav navbar-nav navbar-right">
				<li><a href="admin_area/login.php"><span class="navbar-brand"></span>&nbsp;&nbsp;Admin Login</a></li>
	
				<!-- <li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>&nbsp;&nbsp;Product</a></li> -->
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading" > <h4 font-size="10" ><b>JAI KISAN - Customer Portal</b> <h1></div>
					<div class="panel-body">
						<!--User Login Form-->
						<form onsubmit="return false" id="login">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" id="email" required/>
		<br>
		<br>                <p>							
		                    <label for="email">Password</label>
							<input type="password" class="form-control" name="password" style="display: inline-table;" id="password" required/>
							<i class="bi bi-eye-slash" id="togglePassword"></i>
		                    </p>

							<p><br/></p>
							<br>
							<a href="forgetpasswordindex.php" >Forgot Password</a>
							<input type="submit" class="btn btn-success" style="float:right;" Value="Login">
							<!--If user dont have an account then he/she will click on create account button--><br>
							<br>
							<div><a href="customer_registration.php?register=1">Sign Up</a></div>						
						</form>
				</div>
				<div class="panel-footer"><div id="e_msg"></div></div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
	<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('btn btn-success', function (e) {
            e.preventDefault();
        });
    </script>
</body>
</html>






















