<?php include "partials/menu.php"?>

        <div class="main-content">
        <div class="wrapper">
                <h1 class='color-green'>Admin</h1>
            
                <br>
                        <?php 
                                if(isset($_SESSION['add'])){
                                        echo $_SESSION['add']; // displaying session message
                                        unset($_SESSION['add']); // removing session message
                                }

                                if(isset($_SESSION['delete'])){
                                        echo $_SESSION['delete'];
                                        unset($_SESSION['delete']);
                                }
                                if(isset($_SESSION['edit'])){
                                        echo $_SESSION['edit'];
                                        unset($_SESSION['edit']);
                                }
                                if(isset($_SESSION['msg'])){
                                        echo $_SESSION['msg'];
                                        unset($_SESSION['msg']);
                                }
                        
                                if(isset($_SESSION['not-match'])){
                                        echo $_SESSION['not-match'];
                                        unset($_SESSION['not-match']);
                                }
                                if(isset($_SESSION['password-change'])){
                                        echo $_SESSION['password-change'];
                                        unset($_SESSION['password-change']);
                                }
                        
                        
                        ?>
                        <br><br>
                <a href="add-admin.php" class="btn-primary btn-text">Add Admin</a>
                <br><br><br>
                <table class="tbl-full color-green btn-text">
                        <tr>
                                <th>S.N.</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Actions</th>

                        </tr>

                        <?php 
                                //sql code to get the data from the database table
                                $sql = "SELECT * FROM tbl_admin";

                                //execute the query
                                $res = mysqli_query($conn, $sql);

                                //check whether the query is executed or not
                                
                                if($res == TRUE){
                                        //Count rows to check whether we have data in database or not
                                        $count = mysqli_num_rows($res); // function to get all the rows in the database

                                        $sn = 1; 



                                        //check the number of rows 
                                        if($count > 0){
                                                //we have data in the database
                                                while($rows=mysqli_fetch_assoc($res)){
                                                        //Using while loop to get all the data from the database
                                                        
                                                        //getting individual data
                                                        $id = $rows['id'];
                                                        $email=$rows['email'];
                                                        $username = $rows['username'];

                                                        //displaying the values in our table
                                                        ?>
                                                        <tr>
                                                                <td><?php echo $sn++;?></td>
                                                                <td><?php echo $email?></td>
                                                                <td><?php echo $username?></td>
                                                                <td>
                                                                        <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id?>" class="btn-secondary">Update Admin</a>
                                                                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id?>" class="btn-danger">Delete Admin</a>
                                                                        <a href="<?php echo SITEURL;?>admin/change-password.php?id=<?php echo $id?>" class="btn-primary">Change Password</a>
                                                                        
                                                                </td>
                                                        </tr>

                                                        <?php
                                                }
                                        }
                                        else
                                        {
                                                //we dont have data in the database
                                        }

                                }
                        ?>
                       
                </table>
      

            </div>
            
        </div>

        <?php include "partials/footer.php" ?>