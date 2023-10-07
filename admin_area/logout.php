<html>
<script language="javascript" type="text/javascript">
    window.history.forward();
  </script>

<?php 
session_start(); 

session_destroy(); 

echo "<script>window.open('login.php?logged_out=You have logged out, come back soon!','_self')</script>";

if (isset($_SESSION)) {
    session_destroy();
    }



?> 
</html>