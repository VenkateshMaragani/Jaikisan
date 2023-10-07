<?php 
session_start();
		
		
?>
<!DOCTYPE>
<html>
	<head>
		<title>Login Form</title>
		<link rel="icon" href ="../Tablogo.png" type="image/png"/>
<link rel="stylesheet" href="styles/login_style.css" media="all" /> 
<style>
        #u_remove {
            text-decoration: none;
        }
		form i {
    margin-left: -30px;
    cursor: pointer;
	color : white ;
}
    </style>
	 <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
	
	</head>
<body>
</br></br></br>
<h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>
<h2 style="color:white; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>
<div class="login">
	<h1>Admin Portal</h1>
    <form method="post" action="login.php">
    	<input type="text" name="email" placeholder="Email" required="required" />
       
       <p>	   
	   <input type="password" id="password" name="password" placeholder="Password" required="required" />
		<i class="bi bi-eye-slash" id="togglePassword"></i>
		</p>
        <button type="submit" class="btn btn-primary btn-block btn-large"  name="login">Login</button>
		<p></p>
		 
		  <a href="admin_registration.php?register=1" id = "u_remove" >
		  <label class="btn btn-primary btn-block btn-large" name="signup">
		  Sign Up
		  </label>
		  </a>
		  
		  <p></p>
		  
		  <a href="../login_form.php"  id = "u_remove" >
		  <label class="btn btn-primary btn-block btn-large" name="signup">
		  <center>Back to Customer Login</center>
		  </label>
		  </a>
		  <?php 

include("includes/db.php"); 

	if(isset($_POST['login'])){
	
		$email = $_POST['email'];
		$_SESSION["email"] = $email;
		
		$password = $_POST['password'];
	
	$sel_user = "select * from admins where admin_email='$email' AND admin_password='$password'";
	
	$run_user = mysqli_query($con, $sel_user); 
	
	 $check_user = mysqli_num_rows($run_user); 
	 
	 $sel_user1 = "select distinct admin_email,admin_password from admins where admin_email='$email'";
	
	$run_user1 = mysqli_query($con, $sel_user1); 
	
	$r_user = mysqli_fetch_array($run_user1); 
	
	$a_email=  $r_user['admin_email']?? 'Null';
	$a_password=  $r_user['admin_password']?? 'Null';
	
	if($check_user==1){
	
	
	 $approvalstatus = "select confirm from admins where admin_email='$email' AND admin_password='$password'";
	 $run_approval = mysqli_query($con, $approvalstatus); 
	 			$r_c = mysqli_fetch_array($run_approval); 
                    $confirm=  $r_c['confirm'];

	if($confirm=='Pending')
	{
	echo "<script>window.open('pendingpage.php','_self')</script>";
	}
	else if($confirm=='Rejected')
	{
		echo "<script>window.open('RejectPage.php','_self')</script>";
	}
	else if($confirm=='Approved')
	{
		
		if($password==$a_password)
		{
		echo "<script>window.open('index.php?logged_in= Hi $email </br>You have successfully Logged in!','_self')</script>";
		}
		else
		{
			echo "<script>window.open('login.php?logged_out=Password is incorrect, Please enter the correct Password !!','_self')</script>";
		
		}
		
	}
	else 
	{
		
		
	echo "<script>window.open('login.php?logged_out=Admin status is not defined. Try registering with another mail..!!','_self')</script>";
		
		
	}
	
	}
	
	else if(Strtoupper($email)==Strtoupper($a_email) and $password!=$a_password)
	{
		

       // echo "<script>window.alert('Password is incorrect !! Please enter the correct Password ','_self')</script>";
		echo "<script>window.open('login.php?logged_out=Password is incorrect, Please enter the correct Password !!','_self')</script>";
		
		
	}	
   else if(Strtoupper($email)!=Strtoupper($a_email))
	{
	

    //echo "<script>window.alert('Email is not registered with us. Kindly register yourself using SignUp in Admin Portal ','_self')</script>";
	echo "<script>window.open('login.php?logged_out=Email is not registered with us. Kindly register yourself using SignUp !!','_self')</script>";
		
	}		
	else{
       

       // echo "<script>window.alert('Email or password is incorrect !! Please enter correct details or register yourself using SignUp in Admin portal ','_self')</script>";
		echo "<script>window.open('login.php?logged_out=Email or password is incorrect !! Please enter correct details or register yourself using SignUp in Admin portal ','_self')</script>";
	

		}
	}
	
?>
		  
    </form>
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
        form.addEventListener('btn btn-primary btn-block btn-large', function (e) {
            e.preventDefault();
        });
    </script>
</body>
</html>