<?php
if (isset($_GET["register"])) {
	
	session_start();

	
	?>
	
	<!DOCTYPE html>
<html>
	<head>

		<meta charset="UTF-8">
		<title>JAI KISAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
		<link rel="icon" href ="../Tablogo.png" type="image/png"/>
		<link rel="stylesheet" href="styles/style.css" media="all" />
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/new/bootstrap.min.css"/>
		<script src="js/new/bootstrap.min.js"></script>
		<script src="js/new/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery2.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="styles/logon_style.css" media="all" /> 
<style>
        #u_remove {
            text-decoration: none;
        }
		form i {
    margin-left: -30px;
    cursor: pointer;
	color : black ;
}
    </style>
		
	</head>
<body>
<div>

    </div>

<div class="logon">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">

<a href="#" class="navbar-brand"><p style="font-size:19px"><img src="rice.png" width="40" height="30"/>&nbsp;&nbsp;&nbsp;JAI KISAN</p></a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php" class="navbar-brand" ><span ></span>&nbsp;&nbsp;Back</a></li>
			<!--	<li><a href="index.php"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;Product</a></li> -->
			</ul>
		</div>
	</div>
	
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
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading"><h4 align="center">Admin SignUp Form<h4></div>
					<div class="panel-body">
					
					<form id="signup_form" onsubmit="return false">
					
						<div class="row">
							<div class="col-md-6">
								<label for="a-z0-9f_name">First Name</label>
								<input type="text" id="af_name" name="af_name" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="af_name">Last Name</label>
								<input type="text" id="al_name" name="al_name"class="form-control">
								
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="text" id="aemail" name="aemail"class="form-control">

							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="password">Password</label>
								<p>
								<input type="password" id="apassword" name="apassword"class="form-control" style="display: inline-table;">
								<i class="bi bi-eye-slash" id="togglePassword"></i>
		                       </p>
							</div>
							<div class="col-md-6">
								<label for="repassword">Re-enter Password</label>
								<p>
								<input type="password" id="arepassword" name="arepassword"class="form-control" style="display: inline-table;">
								<i class="bi bi-eye-slash" id="togglePassword1"></i>
		                       </p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="mobile">Mobile</label>
								<input type="text" id="amobile" name="amobile"class="form-control">
								
							</div>
						</div>
					
	                     </br>
						<div class="row">
							<div class="col-md-12">
								<input style="width:100%;" id="signup" value="Sign Up" name="signup_button" type="submit" class="btn btn-primary btn-block btn-large">
								
	
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
	</div>
	<script>
        const togglePassword = document.querySelector("#togglePassword");
		 const togglePassword1 = document.querySelector("#togglePassword1");
        const apassword = document.querySelector("#apassword");
		const arepassword = document.querySelector("#arepassword");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = apassword.getAttribute("type") === "password" ? "text" : "password";
            apassword.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });
		togglePassword1.addEventListener("click", function () {
            // toggle the type attribute
            const type1 = arepassword.getAttribute("type") === "password" ? "text" : "password";
            arepassword.setAttribute("type", type1);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('btn btn-primary btn-block btn-large', function (e) {
            e.preventDefault();
        });
    </script>
</body>

</html>
<?php
}
?>




















