<?php
    //Including constants.php for url
    include('../config/constants.php');


    //1. destroy the session and redirect to log in page
    session_destroy(); // unsets $_SESSION['user']
    header('location: '.SITEURL.'admin/login.php');
?>