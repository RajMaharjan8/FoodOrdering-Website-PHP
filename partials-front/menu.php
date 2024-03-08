<?php include 'config/constants.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIMS Restaurent</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&family=Roboto:wght@100;300;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/user.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
</head>

<body>

    <section class="nav">
        <div class="container">
            <div class="logo">
                <a href="index.php" title="Logo">
                    <h1>IIMS</h1>
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL?>index.php">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL?>contact.php">Contact</a>
                    </li>
                    <li>
                   
                        <?php
                        if (isset($_SESSION['user'])){
                        ?>
                        <a href="<?php echo SITEURL?>user_logout.php">Logout</a>
                        <?php 
                        }else{
                            ?>
                              <a href="<?php echo SITEURL?>user_login.php">SignUp</a>
                        <?php
                        }
                        ?>
                        
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>