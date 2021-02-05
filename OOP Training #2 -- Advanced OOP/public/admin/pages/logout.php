<?php include("login.php");


session_destroy();

if(isset($_COOKIE['email'])) {
    
    unset($_COOKIE['email']);
    
}


header("Location: login.php");



