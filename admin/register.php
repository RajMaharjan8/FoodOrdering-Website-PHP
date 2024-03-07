<?php include('../config/constants.php');
if(isset($_SESSION['user'])){
    header('location:'.SITEURL.'admin/');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
       
    </style>
</head>
<body>
    <div class="register">
        <h1>Register</h1>
        <?php  
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        if(isset($_SESSION['no-login'])){
            echo $_SESSION['no-login'];
            unset($_SESSION['no-login']);
        }
        ?>
        <form action="" method="POST" class="register-form" onsubmit=" return confirmPassword(), preventDefault(event)">
            <input type="text" name="username" placeholder="Username" id="username" "/>
            <input type="email" name="email" placeholder="Email" id="email" />
            <div class="input-container">
    <input type="password" name="password" placeholder="Password" id="password" onkeyup="checkPasswordStrength()"/>
    <button type="button" class="toggle-password" onclick="togglePasswordVisibility('password')">Show</button>
</div>
<p id="strongPassword"></p>

<div class="input-container">
    <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirmPassword">
    <button type="button" class="toggle-password" onclick="togglePasswordVisibility('confirmPassword')">Show</button>
</div>
<p id="confirmPasswordMessage"></p>

            <input type="submit" name="submit" value="Register">
        </form>
        <p class="login-text">Already have an account? <a href="login.php">Login</a></p>
    </div>
    <p class="footer">IIMS restaurant</p>

    <script src="../script/script.js"></script>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = md5 ($password);
    $confirm_password = md5 ($_POST['confirm_password']);

    if($hash_password === $confirm_password){
        $query = "INSERT INTO tbl_admin (username, email, password) VALUES ('$username', '$email', '$hash_password')";
        $res = mysqli_query($conn, $query);
    
        if($res == TRUE){
            $_SESSION['user'] = $username; 
            header('location:'.SITEURL.'admin/');
        
    
    
        }
        else
        {
            $_SESSION['register']="<div class='error'>register</div>" ;
            header('location:'.SITEURL.'admin/register.php');
        }
    
    }else{
        $_SESSION['login']="<div class='error'>Confirm Password doesn't match the password</div>" ;
        header('location:'.SITEURL.'admin/register.php');
    }
   
}


?>