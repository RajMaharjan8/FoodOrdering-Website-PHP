<?php include('partials/menu.php')?>
    <div class="main-content">
        <div class="wrapper">
            <h1 class='color-green'>Update Order</h1>
            <br><br>

            <?php 
                if(isset($_GET['id'])){
                    $id= $_GET['id'];
                    
                    $sql = "SELECT * FROM tbl_order WHERE id = $id";
                    
                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if($count == 1){
                        $row = mysqli_fetch_assoc($res);
                        
                        $title = $row['food'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $status = $row['status'];
                    }   
                    else
                    {   
                    header('location:'.SITEURL.'admin/manage-order.php');
                    }



                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            ?>

            <form action="" method='post'>
                <table class='tbl-full color-green btn-text'>
                    <tr>
                            <td>Title:</td>
                            <td><?php echo $title?></td>
                    </tr>

                    <tr>
                        <td>Price:</td>
                        <td>Rs. <?php echo $price?></td>
                    </tr>

                    <tr>
                        <td>Quantity:</td>
                        <td><input type="number" name="new-quantity" value="<?php echo $quantity?>"></td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="new-status" >
                                <option <?php if($status=='Ordered'){echo 'selected';}?> value="Ordered">Ordered</option>
                                <option <?php if($status=='On Delivery'){echo 'selected';}?> value="On Delivery">On Delivery</option>
                                <option <?php if($status=='Delivered'){echo 'selected';}?> value="Delivered">Delivered</option>
                                <option <?php if($status=='Cancel'){echo 'selected';}?> value="Cancel">Cancel</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td colspan='2'>
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <input type="hidden" name="price" value="<?php echo $price?>">
                            <input type="submit" value='Update' class='btn-text btn-secondary' name='submit'>
                        </td>
                    </tr>
                </table>
            </form>


            <?php 
                if(isset($_POST['submit'])){
                    $id = $_POST['id'];
                    $price = $_POST['price'];
                    $new_quantity = $_POST['new-quantity'];
                    $new_status = $_POST['new-status'];
                    $total = $price*$new_quantity;


                    $sql2 = "UPDATE tbl_order SET
                       quantity = $new_quantity,
                       total = $total,
                       status = '$new_status'
                       WHERE id = $id 
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2){
                        echo "<div class='color-green text-center btn-text'>Order Updated Successfully</div>";
                        // header('location:'.SITEURL.'admin/manage-order.php');

                    } 
                    else
                    {
                        echo "<div class='color-green text-center btn-text'>Order Failed Update</div>";
                    }  
                }
            ?>
        </div>
    </div>
<?php include('partials/footer.php')?>

