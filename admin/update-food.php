<?php include('partials/menu.php')?>

<!-- $id is for food tabel -->
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM tbl_food WHERE id=$id";

        $res2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category_id = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active']; 
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1 class='color-green'>Update Food Items</h1>
        <br>

        <form action="" method="post" enctype="mutlipart/form-data">

            <table class="tbl-full btn-text color-green">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" value="<?php echo $title;?>"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description" cols="30" rows="5"><?php echo $description;?></textarea></td>
                </tr>
                
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price" value="<?php echo $price?>"></td>
                </tr>
                <tr>
                    <td>Image: </td>
                    <td>
                        <?php
                            if($current_image == ""){
                                echo "<div>No Image Available</div>";
                            }
                            else
                            {
                                ?>
                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image;?>" alt="" width="200px">
                                <?php
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td><input type="file" name="image"></td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">
                            <?php
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);
                                if($count>0){
                                    while($row=mysqli_fetch_assoc($res)){
                                        $category_title = $row['title'];
                                        $category_id = $row['id'];
                                        ?>
                                         <option <?php if($current_category_id == $category_id){echo "selected";}?> value="<?php echo $category_id;?>"><?php echo $category_title;?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "option value='0'>No Category Available</option>";
                                }
                            ?>
                        </select>
                </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" <?php if($featured == "Yes"){echo "checked";}?> name="featured" value="Yes"> Yes
                        <input type="radio" <?php if($featured == "No"){echo "checked";}?> name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                    <input type="radio" <?php if($active == "Yes"){echo "checked";}?> name="active" value="Yes"> Yes
                        <input <?php if($active == "No"){echo "checked";}?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image?>">
                        <input type="submit" name="submit" value="Update" class="btn-secondary btn-text">
                    </td>
                </tr>
            </table>
        </form>

<?php
    if(isset($_POST['submit'])){
        $id= $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $current_image = $_POST['current_image'];
        $category = $_POST['category'];
        $featured=$_POST['featured'];
        $active=$_POST['active'];

        // if(isset($_FILES['image']['name'])){
        //     //upload button is clicked
        //     $image_name = $_FILES['image']['name'];


        //     if($image_name !=""){

                
        //         //image is available
        //         $src_path = $_FILES['image']['tmp_name'];
        //         $dest_path = '../images/food/'.$image_name;
                
        //         $upload = move_uploaded_file($src_path, $dest_path);

        //         if($upload == FALSE){
        //             $_SESSION['upload']="<div class='error'>Fail to upload image</div>";
        //             header('location:'.SITEURL.'admin/manage-food.php');
        //             echo "Failed to Update Image";

        //             die();
        //         }

                

        //         if($current_image!=""){
        //             $remove_img_path = "../images/food/".$current_image;
        //             $remove = unlink($remove_img_path);

        //             if($remove == false){
        //                 // $_SESSION['fail-rem']="<div class='error'>Fail to remove current image</div>";
        //                 echo ('Image was not deleted');
        //                 // header('location:'.SITEURL.'admin/manage-category.php');
        //                 die();

        //             }
        //         }
        //     }
        //     else
        //     {
        //         $image_name = $current_image;
        //     }
        // }
        // else
        // {
        //     $image_name = $current_image;
        // }


        if(isset($_FILES['image']['name']))
                            {
                                $image_name = $_FILES['image']['name'];

                                if($image_name != ""){
                                    //uploading the new image
                                       
                                        $source_path = $_FILES['image']['tmp_name'];
                                        
                                        $destination_path = "../images/food/".$image_name;

                                        $upload = move_uploaded_file($source_path, $destination_path);

                                        if($upload == FALSE){
                                            $_SESSION['upload']="<div class='error'>Fail to upload image</div>";
                                            header('location:'.SITEURL.'admin/manage-food.php');
                                            echo "Failed to Update Image";
                                            die();
                                        }


                                    //removing the current or image

                                    if($current_image != ""){
                                        $remove_img_path = "../images/food/".$current_image;
                                        $remove = unlink($remove_img_path);
    
                                        if($remove == false){
                                            // $_SESSION['fail-rem']="<div class='error'>Fail to remove current image</div>";
                                            echo ('noooo');
                                            // header('location:'.SITEURL.'admin/manage-category.php');
                                            die();
                                        }

                                    }
                                    
                                }
                                else{
                                $image_name = $current_image;

                                }
                            }
                            else{
                                $image_name = $current_image;
                            }

        $sql3 = "UPDATE tbl_food SET
        title='$title',
        description = '$description',
        price = $price,
        image_name = '$image_name',
        category_id = '$category',
        featured = '$featured',
        active = '$active'
        WHERE id = $id
        
        ";

        $res3 = mysqli_query($conn, $sql3);

        if($res3 == true){
            echo "Updated";
        }
        else{
            echo "Failed to Update";
        }


    }
?>

    </div>
</div>
<?php include('partials/footer.php')?>
