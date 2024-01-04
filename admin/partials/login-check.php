<?php
    // Authorization
    //check whether the user is log in or not
    if(!isset($_SESSION['user'])){ 
        $_SESSION['no-login']="<div class='success text-center'>Log in to Access the Admin Panel</div>";
        header('location: '.SITEURL.'admin/login.php');
    }
?>