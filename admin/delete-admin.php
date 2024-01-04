<?php 
    //Include constants.php file here
    include('../config/constants.php');

    if(isset($_GET['id'])){

              //1. Get the id of the admin that is to be delete
                $id = $_GET['id'];


                //2. Create SQL query to delete Admin 
                $sql = "DELETE FROM tbl_admin WHERE id=$id";

                        // executing the query
                
                $res = mysqli_query($conn, $sql);
                        //Check whether the query executed sucessfully or not
                if($res == TRUE){
                    //query executed successfully and admin is deleted
                    // echo "Admin deleted";


                    //create session variable to display message
                    $_SESSION['delete']="<div class='success'>Admin Deleted</div>";
                    //Redirect to Manage Admin Page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                } 
                else
                {
                    //failed to delete admin
                    // echo "failed to delete admin";
                    $_SESSION['delete']="<div class='error'>Failed to Delete Admin</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                    
                }
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-admin.php');

    }

    //3. Redirect to manage admin page with message (success or error);


?>