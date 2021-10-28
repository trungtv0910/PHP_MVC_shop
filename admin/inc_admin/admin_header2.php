<!DOCTYPE html>
<html lang="en">
<?php
// include '../database.php';

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/quanly.css">
    <!-- <link rel="stylesheet" href="../css/allproduct.css">-->
    <link rel="stylesheet" href="./assets/plugin/fontawesome/css/all.css">
    <!-- <title> </title> -->



    <!-- <link rel="icon" href="assets/img/brand/favicon.png" type="image/png"> -->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="./assets/css/argon.css?v=1.2.0" type="text/css">
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
</head>
<style>
    .table td,
    .table th {
        white-space: normal
    }

    ul li ul {
        display: none;
    }

    ul li:hover ul {
        display: block;
    }

    /* th:nth-child(1){width: 30px;}
th:nth-child(2){width: 60px;} */
    th,
    td {
        text-align: center;
    }

    /* td{padding: 5px 10px;} */
</style>

<body>
    <div class="wraper">
        <div class="header">
            <ul>
                <li><a href="../index.php">Trang chủ</a></li>
                <!-- <li><a href="">Cài đặt Giao diện</a></li> -->
                <li class="width:70%"><a href="">Xin chào trung</a></li>
                <?php
                // session_start();
                // if (isset($_SESSION["username"])) {
                //     echo ' <li><a href="">Welcome - ' . $_SESSION["username"] . '</a></li>';
                //     echo ' <li><a href="logout.php">Logout</a> </li>';
                // } else {
                //     header("location:pdo_admin_login.php");
                // }
                ?>

            </ul>
        </div>
        <!-- bọc nội dung chính -->
        <div class="content">
            <!-- phần side bar quản lý bên trái, thanh control quản lý các mục của trang quản lý -->
            <div class="side_bar">
              <?php 
              include 'sidebar.php';
              
              ?>
            </div>
            <!-- phần nội dung chính -->
            <div class="main">