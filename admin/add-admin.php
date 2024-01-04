<?php include ("partials/menu.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1 class='color-green'>Add Administrator</h1>
        <br><br>
                <?php 
                if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                }
                ?>
        <br><br>
        <form action="" method="POST">
            <table class="tbl-30 color-green">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include ("partials/footer.php"); ?>



<?php 
// processing the value from form and saving it in the database
//check whether the submit button is clicked or not
if(isset($_POST['submit'])){
        //button clicked
        
        //get thee data from the form

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5( $_POST['password']); // password encryped with md5 (one way encryption)


        //1 SQL QUERY TO SAVE THE DATA INTO THE DATABASE
        $sql = "INSERT INTO tbl_admin SET
                full_name = '$full_name',
                username = '$username',
                password = '$password'
        ";

        //2 execute query and save data in database
        
        // $conn = mysqli_connect('localhost','root','') or die(mysqli_error()); // database connection
        // $db_select = mysqli_select_db($conn,'restaurant') or die(mysqli_error());  //selecting database 
        
        
        //3 executing qury and saving data to database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());  
        
        //4 check whether the data is inserted or not
        if($res == TRUE){
            //Data Inserted
            
            //Creating a session variable to display message
            $_SESSION['add']="<div class='color-green'>Admin Added Successfully</div>";

            //Redirect Page to manage admin once admin is added
            header('location:'.SITEURL.'admin/manage-admin.php');


        }
        else
        {
            //Failed to insert data
              //Creating a session variable to display message
              $_SESSION['add']="Failed to Add Admin";

              //Redirect Page to add admin
              header('location:'.SITEURL.'admin/add-admin.php');
        }

        }

?>