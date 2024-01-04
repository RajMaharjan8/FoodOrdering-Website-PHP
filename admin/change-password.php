<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1 class='color-green'>Change Password</h1>
        <br><br>
        <?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        
        }
        
        ?>
        <form action="" method="POST">
            <table class='tbl-full color-green'>
                <tr>
                    <td>Old Password: </td>
                    <td> <input type="password" name="old_password"></td>
                </tr>
                <tr>
                    <td>New Password: </td>
                    <td><input type="password" name="new_password"></td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td><input type="password" name="confirm_password"></td>
                </tr>

                <tr >
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary btn-text">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

//1. check whether the submit button is clicked or not
if(isset($_POST['submit'])){
    
    $id = $_POST['id'];
    $old_password = md5($_POST['old_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);


//2. Check if the id and old password exists
    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password = '$old_password'";
    
    //execute the query
    $res = mysqli_query($conn, $sql);

    if($res == TRUE){
        //Data is available
        $count = mysqli_num_rows($res);

        if($count == 1){
            // user exists and password can be changes

            //check whether the new password and confirm password match or not

            if($new_password == $confirm_password){
                //update the password
                $sql1 = "UPDATE tbl_admin SET 
                password = '$new_password'
                WHERE id = $id
                ";

                //execute the query
                $res1 = mysqli_query($conn, $sql1);

                //check whether the query is executed or not
                if($res == TRUE){
                    //Password change successfully
                    $_SESSION['password-change']="<div class='success'>Password Changed Successfully</div>";
                    header('location: '.SITEURL.'admin/manage-admin.php');

                }
                else{
                    //Please try again
                    $_SESSION['password-change']="<div class='error'>Password did not change</div>";
                    header('location: '.SITEURL.'admin/manage-admin.php');
                }
            }
            else{
                //redirect to manage admin
                $_SESSION['not-match']="<div class='error'>Password didn't match</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }   
        else{
            //user does nt exist
            $_SESSION['msg']="<div class='error'>Password Cannot be changed</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }

//Check Whether the New Password and Confirm Password Match or not

}


?>


<?php include('partials/footer.php')?>
