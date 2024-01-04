<?php include('partials/menu.php')?>
<div class="main-content">
    <div class="wrapper">
        <h1 class='color-green'>Add Your Categories</h1>
        <br><br>


        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>


        <br><br>
        <form action="" method="POST" enctype= multipart/form-data>
        <!-- enctype="mutlipart/form-data" allows us to enter image in a form -->


            <table class="tbl-full btn-text color-green">
                <tr>
                    <td>Title: </td>
                    <td><input type="text" name="title"></td>
                </tr>

                <tr>
                    <td>Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <!-- the value="yes" will be stored in the database -->
                        <input type="radio" name="featured" value="No"> No
                        
                    </td>
                </tr>


                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes" > Yes
                        <input type="radio" name="active" value="No" > No

                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Submit " class="btn-secondary btn-text">
                    </td>
                </tr>
            </table>
        </form>

<?php  
    //checking if the submit button is clicked or not

    if(isset($_POST['submit'])){
        
        // getting the value from the form
        $title = $_POST['title'];

        //for radio input type, we need to check whether the button is selected or not
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
            $active = "No";
        }

        // $img = $_FILES['image'];
        // print_r($img);

        // die();


        // checking if the image is submited for not
        if(isset($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];


            if($image_name !=""){
                

            // //auto renaming the image file
            // // get the extention of our image
            // $ext = end(explode('.', $image_name));
            // //renaming the image
            // $image_name = "food_category_".rand(000,999).'.'.$ext;

                    
                    $source_path = $_FILES['image']['tmp_name'];
                    
                    $destination_path = "../images/category/".$image_name;

                    // finally upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check whether the image is uploaded or not
                    //and if the image is not apploaded then we will stop the process and redirect with error message

                    if($upload == FALSE){
                        $_SESSION['upload']="<div class='error'>Fail to upload image</div>";
                        header('location:'.SITEURL.'admin/add-category.php');

                        //Stop the prcoess
                        die();
                    }
        }


        }
        else{
            $image_name ="";

        }
        



        //sql query
        $sql = "INSERT INTO tbl_category SET
            title='$title',
            image_name ='$image_name',
            featured='$featured',
            active='$active'
        ";

        //execue the query
        $res = mysqli_query($conn, $sql);

        if($res == TRUE){
                // $_SESSION['add']="<div class='success'>Category is Added</div>";
                // header('location:'.SITEURL.'admin/manage-category.php');
                echo "<div class='color-green text-center btn-text'>Category Added Successfully</div>";

               
        }
        else{

                // $_SESSION['add']="<div class='error'>Failed to add category</div>";
                // header('location:'.SITEURL.'admin/add-category.php');
                echo "<div class='color-green text-center btn-text'>Fail to Add Category</div>";
 

        }

    }

?>

    </div>
</div>
<?php include('partials/footer.php')?>

