<?php include('partials/menu.php')?>

    <div class="main-content">
        <div class="wrapper">
            <h1 class='color-green'>Update Category</h1>
            <br>

            <?php 
                // checking whether the id is set of not
                //only allow to access this page if id is provided
                $id = $_GET['id'];
                if(isset($id)){
                    
                    $sql = "SELECT * FROM tbl_category WHERE id=$id";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if($count == 1){
                            $row = mysqli_fetch_assoc($res);
                            $title = $row['title'];
                            $current_image = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                    }
                    else{
                        $_SESSION['no-cat']='<div class="error">No Category found</div>';
                          header("location: ".SITEURL.'admin/manage-category.php');

                    }
                    



                }
                else{
                    header("location: ".SITEURL.'admin/manage-category.php');
                }
            



            ?>

            <form action="" method="post" enctype="mutlipath/form-data">
            <table class="tbl-full color-green btn-text">
                <tr>
                    <td>Title: </td>
                    <td><input type="text" name="title" value="<?php echo $title?>"></td>
                </tr>

                <tr>
                    <td>Image: </td>
                    <td>
                        <?php
                        if($current_image != "")
                        {
                        ?>
                        <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image?>" alt="" width='100px'>
                        <?php
                        }
                        else{
                            echo "<div class='error'>No Image Available</div>";
                        }
                         ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image:</td>
                    <td><input type="file" name="image"></td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured == "Yes"){echo "checked";}?> type="radio" name="featured" value="Yes" >Yes
                        <input <?php if($featured == "No"){echo "checked";}?> type="radio" name="featured" value="No" >No

                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active == 'Yes'){echo 'checked';}?>  type="radio" name="active" value="Yes" >Yes
                        <input <?php if($active == 'No'){echo 'checked';}?> type="radio" name="active" value="No" >No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image?>">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="Submit" name="submit" class="btn-secondary btn-text" value="Update">
                    </td>
                </tr>
            </table>
            </form>




        </div>
    </div>

<?php
        //checking if the submit button is clicked 
                        if(isset($_POST['submit'])){
                            $id = $_POST['id'];
                            $title= $_POST['title'];
                            $current_image = $_POST['current_image'];
                            $featured = $_POST['featured'];
                            $active = $_POST['active'];

                            // updating new image if selected
                            //checking whether the image is selected or not
                            if(isset($_FILES['image']['name']))
                            {
                                $image_name = $_FILES['image']['name'];

                                if($image_name != ""){
                                    //uploading the new image
                                       
                                        $source_path = $_FILES['image']['tmp_name'];
                                        
                                        $destination_path = "../images/category/".$image_name;

                                        $upload = move_uploaded_file($source_path, $destination_path);

                                        if($upload == FALSE){
                                            $_SESSION['upload']="<div class='error'>Fail to upload image</div>";
                                            header('location:'.SITEURL.'admin/manage-category.php');
                                            echo "Failed to Update Image";
                                            die();
                                        }


                                    //removing the current or image

                                    if($current_image != ""){
                                        $remove_img_path = "../images/category/".$current_image;
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
                            

                            $sql2 = "UPDATE tbl_category  SET
                                title = '$title',
                                image_name = '$image_name',
                                featured = '$featured',
                                active = '$active'
                                WHERE id=$id
                                ";

                            $res2 = mysqli_query($conn, $sql2);
                            
                            if($res2 == true)
                            {
                                // $_SESSION['update'] = "<div class='success'>Successfully Updated the Category</div>";
                                // header('location:'.SITEURL.'admin/manage-category.php');
                                echo "<div class='success'>Updated</div>";
                            

                            }
                            else{
                                // $_SESSION['update'] = "<div class='error'>Unable to Update Category</div>";
                                echo "<div class='error'>Failed to Update</div>";

                                // header('location:'.SITEURL.'admin/manage-category.php');
                            }
                               

                        }?>

<?php include('partials/footer.php')?>
