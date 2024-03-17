<?php include('partials-front/menu.php');
if (!isset($_SESSION['email'])) {
    $_SESSION['message'] = "Please login to order food";
    $_SESSION['route'] = "order.php?id=" . $_GET['id'];
    header('location:' . SITEURL . 'user_login.php');
    exit();
}

?>


<?php
if (isset($_GET['id'])) {
    $food_id = $_GET['id'];

    $sql = "SELECT * FROM tbl_food WHERE id = $food_id";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {

        header('location:' . SITEURL);
    }
} else {
    header('location:' . SITEURL);
}

?>


<section class="food-order">
    <div class="container-order">

        <h2 class="text-center color-green">Order Your Food</h2>

        <form action="" class="order" method="post">


            <div>
                <div class="food-menu-img">
                    <?php
                    if ($image_name != '') {
                    ?>
                        <img src="<?php echo SITEURL ?>images/food/<?php echo $image_name ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                    <?php
                    } else {
                        echo "<div class='color-green'>No image available</div>";
                    }

                    ?>
                </div>

                <div class="food-menu-desc color-green">
                    <h3>
                        <?php echo $title ?>
                        <input type="hidden" name="food" value='<?php echo $title ?>'>
                    </h3>



                    <table class="tbl-full">
                        <tr>
                            <td>
                                <div class="order-label">Price</div>
                            </td>
                            <td>
                                <p class="food-price">
                                    Rs. <?php echo $price ?>
                                    <input type="hidden" id="price" name="price" value='<?php echo $price ?>'>
                                </p>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="order-label">Quantity</div>
                            </td>
                            <td> <input type="number" name="quantity" id="quantity" value="1" required></td>
                        </tr>

                        <tr>
                            <td>
                                <div class="order-label">Your Total: </div>
                            </td>
                            <td>
                                <p id='total'>Rs.
                                    <script src="script/myscripts.js">

                                    </script>
                                </p>
                            </td>
                        </tr>
                    </table>



                </div>
            </div>
            <?php
            $user_data_query = "SELECT * FROM users WHERE email = '" . $_SESSION['email'] . "'";
            $run_query = mysqli_query($conn, $user_data_query);
            $count = mysqli_num_rows($run_query);
            if ($count == 1) {
                $get_row = mysqli_fetch_assoc($run_query);
                $name = $get_row['username'];
                $contact = $get_row['contact'];
                $address = $get_row['address'];
                $email = $get_row['email'];
            } else {
                $name = "";
                $contact = "";
                $address = "";
                $email = "";
            }

            ?>

            <div class=' color-green'>
                <table class='tbl-full'>
                    <tr>
                        <td>
                            <div class="order-label">Full Name</div>
                        </td>
                        <td>
                            <input type="text" name="fullname" value="<?php echo ($name) ?>" class="input-responsive" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="order-label">Email</div>
                        </td>
                        <td><input type="email" name="email" value="<?php echo ($email) ?>" class="input-responsive" required></td>
                    </tr>

                    <tr>
                        <td>
                            <div class="order-label">Phone Number</div>
                        </td>
                        <td><input type="tel" name="contact" value="<?php echo ($contact) ?>" class="input-responsive" required></td>
                    </tr>

                    <tr>
                        <td>
                            <div class="order-label">Address</div>
                        </td>
                        <td><input type="text" name="address" value="<?php echo ($address) ?>" class="input-responsive" required></td>
                    </tr>

                    <tr>
                        <td colspan='2'> <input type="submit" name="submit" value="Order Confirm" class="btn btn-primary"></td>
                    </tr>
                </table>



            </div>

        </form>

        <?php

        if (isset($_POST['submit'])) {
            $food = $_POST['food'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

            $total = $price * $quantity;

            $order_date = date("Y-m-d h:i:sa"); // Order Date

            $status = "Ordered";

            $customer_name = $_POST['fullname'];
            $customer_email = $_POST['email'];
            $customer_contact = $_POST['contact'];
            $customer_address = $_POST['address'];

            $sql2 = "INSERT INTO tbl_order SET
                    food='$food',
                    price = $price,
                    quantity = $quantity,
                    total = $total,
                    order_date = '$order_date',
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_email = '$customer_email',
                    customer_contact = '$customer_contact',
                    customer_address = '$customer_address'
                ";

            $res2 = mysqli_query($conn, $sql2);

            if ($res2 == true) {
                echo "<div class='color-green text-center text-larger'>Successfully Ordered Food</div>";
            } else {
                echo "<alert>Failed to Order Food</alert>";
            }
        }

        ?>

    </div>
</section>


<?php include('partials-front/footer.php') ?>