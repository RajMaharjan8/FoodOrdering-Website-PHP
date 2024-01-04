<?php include "partials/menu.php"?>

        <div class="main-content">
        <div class="wrapper">
                <h1 class='color-green'>Dashboard</h1>
                <br><br>
                <?php  
                        if(isset($_SESSION['login'])){
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }
                    ?>

                    <br><br>
                <div class="col-4 text-center">
                    <h1>
                        <?php
                            $sql1 = "SELECT * FROM tbl_admin";
                            $res1 = mysqli_query($conn, $sql1);
                            $count1 = mysqli_num_rows($res1);
                            
                            echo "$count1";
                        ?>
                    </h1>
                    <br>
                    Admins
                </div>



                <div class="col-4 text-center">
                    <h1>
                    <?php
                            $sql2 = "SELECT * FROM tbl_category";
                            $res2 = mysqli_query($conn, $sql2);
                            $count2 = mysqli_num_rows($res2);
                            
                            echo "$count2";
                        ?>
                    </h1>
                    <br>
                    Categories
                </div>


                <div class="col-4 text-center">
                    <h1>
                    <?php
                            $sql3 = "SELECT * FROM tbl_food";
                            $res3 = mysqli_query($conn, $sql3);
                            $count3 = mysqli_num_rows($res3);
                            
                            echo "$count3";
                        ?>
                    </h1>
                    <br>
                    Foods
                </div>


                <div class="col-4 text-center">
                    <h1>
                    <?php
                            $sql4 = "SELECT * FROM tbl_order";
                            $res4 = mysqli_query($conn, $sql4);
                            $count4 = mysqli_num_rows($res4);
                            
                            echo "$count4";
                        ?>
                    </h1>
                    <br>
                    Orders
                </div>
            
        <div class="clearfix"></div>

            </div>
            
        </div>

       <?php include "partials/footer.php" ?>