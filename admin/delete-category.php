<?php include('../config/constants.php')?>

<?php
    //CHECKING whether the id and image name value is set or not
    //so that delete-category.php can only be accessed if id and img_name is given


    if((isset($_GET['id'])) AND (isset($_GET['image_name']))){
        // echo'got value';
        
            $id = $_GET['id'];
            $image_name = $_GET['image_name'];

        //removing the image physically from the folder
            if($image_name != ""){
                $path_image = "../images/category/".$image_name;

                $remove = unlink($path_image); //unlink is a function to delete the file from the folder
                
                if($remove == FALSE){
                    $_SESSION['rem']="<div class='error'>Unable to delete the image from categories</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');

                    die(); // die() stops the process 
                }
            }
         
            $sql = "DELETE FROM tbl_category WHERE id=$id ";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE){
                $_SESSION['delete'] = '<div class="success">Category Deleted</div>';
                header('location:'.SITEURL.'admin/manage-category.php');
            }
            else{
                $_SESSION['delete'] = '<div class="error">Fail to Delete Category</div>';
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        
    }
    else{
        header('location:'.SITEURL.'admin/manage-category.php');
    }


?>