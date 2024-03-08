<?php include('partials-front/menu.php');

if (isset($_SESSION['user'])) {
    header('location:' . SITEURL);
}
?>
<section>
    <div class="form-container">
        <form class="form" action="" method="post" onsubmit=" return confirmPassword(), preventDefault(event)">
            <h2>Register</h2>
            <?php
            if (isset($_SESSION['register_message'])) {
                echo "<p style='color: #ff0000; text-align: center;'>" . $_SESSION['register_message'] . "</p>";
                unset($_SESSION['register_message']);
            }

            ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Password" onkeyup="checkPasswordStrength()" required>
                <button type="button" class="toggle-password" data-input="password" onclick="togglePasswordVisibility('password')">Show</button>
            </div>
            <p id="strongPassword"></p>
            <div class="password-container">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                <button type="button" class="toggle-password" data-input="confirm_password" onclick="togglePasswordVisibility('confirm_password')">Show</button>
            </div>
            <input type="text" name="contact" placeholder="Contact" required>
            <textarea name="address" placeholder="Address" required></textarea>
            <input type="submit" name="submit" value="Register">

            <div class="register-link">
                <p>Already have an account? <a href="user_login.php">Login</a></p>
            </div>
        </form>
    </div>


    <script src="script/script.js"></script>
    <script>
        function togglePasswordVisibility(inputId) {
            var input = document.getElementById(inputId);
            var button = document.querySelector(`button[data-input="${inputId}"]`);

            if (input.type === "password") {
                input.type = "text";
                button.textContent = "Hide";
            } else {
                input.type = "password";
                button.textContent = "Show";
            }
        }
    </script>
</section>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = md5($password);
    $confirm_password = md5($_POST['confirm_password']);
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    if ($hash_password === $confirm_password) {
        $query = "INSERT INTO users (username, email, password , contact, address) VALUES ('$username', '$email', '$hash_password', '$contact','$address')";
        $res = mysqli_query($conn, $query);

        if ($res == TRUE) {
            $_SESSION['user'] = $username;
            header('location:' . SITEURL);
        } else {
            $_SESSION['register_message'] = "Fail to register user";
        }
    } else {
        $_SESSION['register_message'] = "Confirm Password doesn't match the password";
        header('location:' . SITEURL . 'user_register.php');
    }
}

include('partials-front/footer.php');
?>