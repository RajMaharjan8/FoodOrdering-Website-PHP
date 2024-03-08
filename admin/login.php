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
    <title>Login - Food Order System</title>
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
    <div class="login">
        <h1>Admin Log In</h1>
        <?php  
        if(isset($_SESSION['login'])){
            echo "<p style='color: #ff0000; text-align: center;'>".$_SESSION['login']."</p>";
            unset($_SESSION['login']);
        }

        if(isset($_SESSION['no-login'])){
            echo $_SESSION['no-login'];
            unset($_SESSION['no-login']);
        }
        ?>
        <form action="" method="POST" class="login-form">
            Username: <br>
            <input type="text" name="username" >
            <br><br>
            Password: <br>
            <input type="password" name="password">
            <br><br>
            <input type="submit" name="submit" value="Log In">
        </form>
        <p class="register-text">Don't have an account? <a href="register.php" class="register-link">Register</a></p>
    </div>
    <p class="footer">IIMS restaurant</p>
</body>
</html>
<?php
    //check if the submit button is clicked or not

    if(isset($_POST['submit'])){
        //1. get the data from log in form
        $username = $_POST['username'];
        $password = md5 ($_POST['password']);

        //2. sql to check whether the user with username and password exists or not
        $sql = "SELECT * from tbl_admin WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);

        //3. count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count == 1){
            // user available
            $_SESSION['login'] = 'Sucessfully Loged In';
            $_SESSION['user'] = $username; // to check whether the user is login or not

            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login']="Invalid Credentials" ;
            // user not available
            header('location:'.SITEURL.'admin/login.php');

        }
    }

?>