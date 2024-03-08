<?php include('partials-front/menu.php');

if(isset($_SESSION['user'])){
    header('location:'.SITEURL);
}
?>
<section>
    <?php 
        if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
            echo "<p style='background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; text-align: center;'>$message</p>";
            unset($_SESSION['message']);
        }
    ?>
<div class="login-container">
        <div class="login-form">
            <h2>Login</h2>
            <?php  
                if(isset($_SESSION['login_message'])){
                    echo "<p style='color: #ff0000; text-align: center;'>".$_SESSION['login_message']."</p>";
                    unset($_SESSION['login_message']);
                }   
            ?>
            <form action="" method="post">
                <input type="text" name="email" placeholder="Email" required>
                <br>
                <input type="password" name="password" placeholder="Password" required>
                <br>
                <input type="submit" name="submit" value="Login">
            </form>
            <div class="register-link">
            Don't have an account? <a href="user_register.php">Register</a>
            </div>
        </div>
    </div>
</section>


<?php
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if($count == 1){
            $row = mysqli_fetch_assoc($res);
            $username = $row['username'];
            $_SESSION['user'] = $username; 

            if(isset($_SESSION['route'])){
                header('location:'.SITEURL.$_SESSION['route']);
                unset($_SESSION['message']);
                exit();
            }else{
                header('location:'.SITEURL);
            }
        }
        else {
            $_SESSION['login_message'] = "Incorrect Credentials";
            header('location:'.SITEURL.'user_login.php');
        }
    }

    include('partials-front/footer.php');
?>