<?php include('partials-front/menu.php');

if (!isset($_SESSION['email'])) {
    $_SESSION['message'] = "Please login to order food";
    header('location:' . SITEURL . 'user_login.php');
    exit();
}

?>
<section>
    <div class="container-contact">
        <h2 class="text-center color-green">Contact Us</h2>
        <form action="" class="contact" method='post'>
            <table class='tbl-full color-green text-larger'>
                <tr>
                    <td>
                        <div class="order-label">Full Name:</div>
                    </td>
                    <td><input type="text" class="input-responsive" name='fullname'></td>
                </tr>

                <tr>
                    <!-- <td>
                        <div class="order-label">Email:</div>
                    </td> -->
                    <?php
                    $user_data_query = "SELECT * FROM users WHERE email = '" . $_SESSION['email'] . "'";
                    $run_query = mysqli_query($conn, $user_data_query);
                    $count = mysqli_num_rows($run_query);
                    if ($count == 1) {
                        $get_row = mysqli_fetch_assoc($run_query);
                        $name = $get_row['username'];
                        $email = $get_row['email'];
                    } else {
                        $name = "";
                        $email = "";
                    }

                    ?>
                    <td><input type="hidden" class="input-responsive" value="<?php echo ($email) ?>" name='email'></td>
                </tr>

                <tr>
                    <td>
                        <div class="order-label">Subject:</div>
                    </td>
                    <td><input type="text" class="input-responsive" name='subject'></td>
                </tr>

                <tr>
                    <td>
                        <div class="order-label">Detail</div>
                    </td>
                    <td><textarea name="detail" class='input-responsive' cols="30" rows="4"></textarea></td>
                </tr>

                <tr>
                    <td colspan='2' class='text-center'>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $detail = $_POST['detail'];


            $sql = "INSERT INTO tbl_contact SET
                    full_name = '$fullname',
                    email ='$email',
                    subject = '$subject',
                    detail = '$detail'
                    ";

            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                echo "<br><br><div class='color-green text-center text-larger'>Thank You! Have a Good Day.</div>";
            } else {
                echo "<br><br><div class='color-green text-center text-larger'>Sorry! unable to sunbmit.</div>";
            }
        }

        ?>

    </div>
</section>
<?php include('partials-front/footer.php') ?>