<?php include "partials/menu.php"?>

<div class="main-content">
    <div class="wrapper">
    <h1 class="color-green">Categories</h1>

    <br>

    <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['rem'])){
                echo $_SESSION['rem'];
                unset($_SESSION['rem']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['no-cat'])){
                echo $_SESSION['no-cat'];
                unset($_SESSION['no-cat']);
            }

            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['fail-rem'])){
                echo $_SESSION['fail-rem'];
                unset($_SESSION['fail-rem']);
            }
        ?>


    <br><br>


        <a href="<?php echo SITEURL ;?>admin/add-category.php" class="btn-primary btn-text">Add Category</a>
        <br><br><br>
        <table class="tbl-full color-green btn-text">
                <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>

                </tr>
            <?php
            //query to get all category from the db
            $sql = "SELECT * FROM tbl_category";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            
            $sn = 1;

            if($count > 0){
                //if we have data we get the data
                while($row = mysqli_fetch_assoc($res))
                {
                        $id= $row['id'];
                        $title= $row['title'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        //now breaking the php to add html table
                        ?> 


                        <tr>
                                <td><?php echo $sn++?></td>
                                <td><?php echo $title?></td>

                                <td>
                                    <?php 
                                        //checking if the image name is available or not
                                        if ($image_name != ""){
                                            // breaking the php
                                            ?>
                                            <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name?>" width='100px'>
                                            <?php
                                        }
                                        else{
                                            echo "<div class='error'>No Image Available</div>";
                                        }
                                    ?>
                                </td>
                                
                                <td><?php echo $featured?></td>
                                <td><?php echo $active?></td>
                                
                                <td>
                                        <a href="<?php echo SITEURL?>admin/update-category.php?id=<?php echo $id?>" class="btn-secondary btn-text">Update</a>
                                        <a href="<?php echo SITEURL?>admin/delete-category.php?id=<?php echo $id?>&image_name=<?php echo $image_name?>" class="btn-danger btn-text">Delete</a>
                                        
                                </td>
                         </tr>
                        <?php
                }
            }
            else{
                        ?>
                        
                        <tr>
                                <td colspan="6"><div class="error">No Category Added.</div></td>
                        </tr>


                        <?php
            }
            ?>


               
                
        </table>


    </div>
</div>

<?php include "partials/footer.php" ?>