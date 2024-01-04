<?php include('partials/menu.php')?>
    <div class="main-content">
        <div class="wrapper">
            <h1 class='color-green'>Update Your Admin Here</h1>
            <br><br>

            <?php 
                //1. Get the id of selected Admin
                $id=$_GET['id'];


                //2. Create SQL Query to get the details 
                $sql = "SELECT * FROM tbl_admin WHERE id = $id";

                    //execute the query
                $res = mysqli_query($conn,$sql);

                //Check whether the qury is executed or not
                if($res == TRUE){
                    $count = mysqli_num_rows($res);
                    if($count == 1){
                        $row = mysqli_fetch_assoc($res);

                        $full_name = $row["full_name"];
                        $username = $row['username'];
                    }
                    else{
                        //redirect to manage admin page
                        header("location:".SITEURL.'admin/manage-admin.php');
                    }
                }
            
            ?>


            <form action="" method="POST">
                <table class='tbl-full color-green'>
                       <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name?>">
                        </td>
                       </tr> 

                       <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username?>">
                        </td>
                       </tr>

                       <tr>
                        <td colspan="2">
                            <input type="hidden" name ="id" value="<?php echo $id?>">
                            <input type="submit" name ="submit" value="Update Admin" class="btn-secondary btn-text">
                        </td>
                       </tr>

                </table>
            </form>
        </div>
    </div>

    
<?php

//checking if the submit button is pressed or not

    if(isset($_POST['submit'])){

        //get all the value from the form
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
        
    
    //sql query to update the table
    $sql = "UPDATE tbl_admin SET
    full_name = '$full_name',
    username = '$username'
    WHERE id=$id" ;

    //executing query
    $res = mysqli_query($conn, $sql);

        if($res== TRUE){
            $_SESSION['edit'] = "<div class='success'>Update Successful</div>";
            header('location:'.SITEURL."admin/manage-admin.php");
        }
        else{
            $_SESSION['edit'] = "<div class='error'>Update was Successfull</div>";
            header('location:'.SITEURL."admin/manage-admin.php");
        }

    }
 

?>

<?php include('partials/footer.php')?>



