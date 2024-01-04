<?php include('partials/menu.php')?>
    
<div class="main-content">
    <div class="wrapper">

    <h1 class="btn-text color-green">Add Food</h1>
    <br>
    <?php
        if(isset($_SESSION['upload'])){
           echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
    ?>
    <br><br>
        <form action="" enctype="multipart/form-data" method="post">
            <table class="tbl-full btn-text color-green">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description" cols="30" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td> <input type="number" name="price"></td>
                   
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                    <select name="category">
                        <?php 

                            $sql ="SELECT * FROM tbl_category WHERE active ='Yes'";
                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);

                            if($count > 0){
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $title;?></option>

                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                <option value="0"> No category available</option>
                                <?php
                            }
                        ?>

                    </select>

                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No

                </td>
                </tr>

                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No

                </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add" name="submit" class="btn-primary btn-text">
                    </td>
                </tr>

            </table>
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
                }
                else{
                    $featured = 'No';
                }

                if(isset($_POST['active'])){
                    $active = $_POST['active'];
                }
                else{
                    $active = 'No';
                }

                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];

                    if($image_name != "")
                    {
                        //renaming the image
                        //geting the extention of the image like jpg png etc
                        // $ext = end(explode('.', $image_name));

                        //creating a new name for the image
                        // $image_name = "Food-Name-".rand(0000,9999).".".$ext; //new image name

                        //uplaoding the image
                        //for that getting the source path

                        $src = $_FILES['image']['tmp_name'];
                        
                        //destination path for the image to be located
                        $dst = "../images/food/".$image_name;
                    
                    
                        
                        //finally uploading food image
                        $upload = move_uploaded_file($src, $dst);


                        //checking whether the image is uploaded or not

                        if($upload == false){
                            $_SESSION['upload']="<div class='error'>Failed to upload image</div>";
                            header('location:'.SITEURL.'admin/add-food.php');
                            die();
                        }

                    }
                }
                else
                {
                    $image_name = "";
                }


                $sql2 = "INSERT INTO tbl_food SET
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'

                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res == true)
                {
                    // $_SESSION['add']="<div class='success'>Food Added</div>";
                    // header('location:'.SITEURL.'admin/manage-food.php');
                    // echo "<div class='success'>Food Successfully Added</div>";
                echo "<div class='color-green text-center btn-text'>Food Item Added Successfully</div>";

                }
                else
                {
                    // $_SESSION['add']="<div class='error'>Failed to add food</div>";
                    // header('location:'.SITEURL.'admin/manage-food.php');
                    // echo "<div class='error'>Fail to Add Food</div>";
                echo "<div class='color-green text-center btn-text'>Failed to Add Food Item</div>";


                }
            }
        ?>
    </div>
</div>

<?php include('partials/footer.php')?>


