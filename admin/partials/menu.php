<?php
include('../config/constants.php');
include('login-check.php');
?>

<html>

<head>
    <title>IIMS|Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&family=Roboto:wght@100;300;700&display=swap" rel="stylesheet">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <style>
        .success {
            color: rgb(26, 177, 26);
        }

        .error {
            color: rgb(238, 87, 87);
        }

        .tbl-full {
            width: 100%;
        }

        table tr th {
            border-bottom: 1px solid black;
            padding: 1%;
            text-align: left;
        }

        table tr td {
            padding: 1%;
        }

        .tbl-30 {
            width: 30%;
        }

        .btn-primary {
            background-color: #1e90ff;
            padding: 1%;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 20px;
            border: none;

        }

        .btn-primary:hover {
            background-color: #3742fa;

        }

        .btn-secondary {
            background-color: #2ecc71;
            padding: 1%;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 20px;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #27ae60;

        }

        .btn-danger {
            background-color: #ff6b81;
            padding: 1%;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 20px;
            border: none;


        }

        .btn-danger:hover {
            background-color: #ff4757;

        }
    </style>

</head>

<body>
    <div class="menu">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-food.php">Food</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="logout.php">LogOut</a></li>


            </ul>
        </div>

    </div>