<?php include('partials-front/menu.php')?>

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center color-green">Food Menu</h2>

            <?php 
            $sql2 ="SELECT * FROM tbl_food WHERE active ='Yes'";
            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);
            if($count2 > 0){
                while($row2 = mysqli_fetch_assoc($res2)){
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    ?>
                                    <div class="food-menu-box">
                                        <div class="food-menu-img">
                                        <?php
                                            if($image_name == ""){
                                                echo "<div>Image Not Available</div>";
                                            }
                                            else
                                            {
                                                ?>
                                                    <img src="<?php echo SITEURL?>images/food/<?php echo $image_name?>" alt="<?php echo $title?>" class="img-responsive img-curve">
                                                <?php
                                            }

                                        ?>

                                        </div>
                                        <div class="food-menu-desc">
                                            <h4><?php echo $title?></h4>
                                            <p class="food-price">Rs. <?php echo $price?></p>
                                            <p class="food-detail">
                                                <?php echo $description?>
                                            </p>
                                            <br>

                                            <a href="<?php echo SITEURL?>order.php?id=<?php echo $id?>" class="btn btn-primary">Order Now</a>
                                        </div>
                                    </div>
                    <?php
                }
            }
            else{
                echo "<div class='color-green'>No Food Available</div>";
            }
            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
   

<?php include('partials-front/footer.php')?>