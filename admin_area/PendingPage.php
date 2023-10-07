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
		.btn-block{
    width: 6%;
	height :6%;
    display: block;
	box-sizing: border-box;
	background-color:#337ab7;
    text-color:white;
    box-shadow: inset 0 1px 0 rgb(255 255 255 / 20%), 0 1px 2px rgb(0 0 0 / 50%);;
	    }
		.btn-block:hover{ 
		text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff;
        cursor: pointer;		
		}
    </style>
	</head>
<body>
<div class="wait overlay">
	<div class="loader">
	
	</div>
</div>

<center>
<div>
<h2 style="color:white; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>

<h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>
	</br>
	<h1><u>Admin Portal</u></h1>
	</br>
	<h1>Hi <?php $email=$_SESSION["email"]; echo $email;?></h1>
	<h1>You account is pending for approval</h1>
	<h1>Please wait until we connect you and approve your profile...</h1>
   <h1><//h1>
</div>
<div >
<a href="login.php"  id = "u_remove">
          
		  <button class="btn-block" >
		  Back
		  </button>
		 
		  </a>
		  <p style="color:white">
			Click "Back" otherwise You will be redirected to Admin portal in 10 seconds..
		 </p> 
		  </div>
</center>
</br></br>

	<?php 
	
			header_remove(); 
			session_destroy();
			header( "refresh:10,url=login.php" );
		
		?>
</body>
</html>
