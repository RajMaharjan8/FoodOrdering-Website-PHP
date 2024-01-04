<?php include('../config/constants.php')?>

<?php 


if(isset($_GET['id']) && isset($_GET['image_name'])){
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if($image_name != ""){
        $path_image = "../images/food/".$image_name;

        $remove = unlink($path_image); //unlink is a function to delete the file from the folder
        
        if($remove == FALSE){
            $_SESSION['rem']="<div class='error'>Unable to delete the image from categories</div>";
            header('location:'.SITEURL.'admin/manage-category.php');

            die(); 
        }
    }
    
    $sql = "DELETE FROM tbl_food WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if($res == true){
        $_SESSION['del'] = "<div class='success'>Food Item Sucessfully Deleted<div>";
        header("location:".SITEURL."admin/manage-food.php");
    }
    else
    {
        $_SESSION['del'] = "<div class='error'>Fail to Remove the Food Item<div>";
        header("location:".SITEURL."admin/manage-food.php");
    }

}
else{
    header("location:".SITEURL."admin/manage-food.php");

}

    
?>