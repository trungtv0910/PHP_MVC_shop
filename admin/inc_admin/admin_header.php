<!DOCTYPE html>
<html lang="en">
<?php
// include '../database.php';
include_once '../model/session.php';
init();
if (isset($_SESSION['login']) != true) {
    header('location:../404.php');
} else {
    if ($_SESSION['login'] == true && $_SESSION['roles'] != 1) {
        header('location:../404.php');
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logofacon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/quanly.css">
    <!-- <title>Admin</title> -->

    <link rel="stylesheet" href="./assets/plugin/fontawesome/css/all.css">
    <script type="text/javascript" src="./assets/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>

    <!-- <link rel="icon" href="assets/img/brand/favicon.png" type="image/png"> -->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="./assets/css/argon.css?v=1.2.0" type="text/css">
    <script src="assets/js/jquery.js"></script>
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<style>
   
    .table td,
    .table th {
        white-space: normal
    }


    /* th,
    td {
        text-align: center;
    } */


</style>

<body>
    <div class="wraper">
        <div class="header">
            <ul>
                <li><a href="../index.php">Trang chủ</a></li>
                <!-- <li><a href="">Cài đặt Giao diện</a></li> -->
                <li class="width:70%"><a href="">Xin chào :<?php echo $_SESSION['name'] ?></a></li>
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
        <!-- <div class="content"> -->
        <div id="wrapper" class="mt-30">

            <!-- phần side bar quản lý bên trái, thanh control quản lý các mục của trang quản lý -->
            <!-- <div class="side_bar"> -->
            <ul class="navbar-nav bg-customer sidebar sidebar-dark accordion " id="accordionSidebar">

                     <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Bảng Tin</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?act=category">
                <i class="fas fa-tasks"></i>
                    <span>Danh Mục</span></a>
            </li>



                <li class="nav-item">
                    <a class="nav-link collapsed" href="index.php" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
                    <i class="ni ni ni-bag-17"></i>
                        <span>Sản Phẩm</span>
                    </a>
                    <div id="collapseProduct" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Quản Lý Sản Phẩm:</h6>
                            <a class="collapse-item" href="index.php?act=product&add">Thêm Sản Phẩm</a>
                            <a class="collapse-item" href="index.php?act=product&list">Danh Sách Sản Phẩm</a>
                            
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="index.php" data-toggle="collapse" data-target="#collapseBill" aria-expanded="true" aria-controls="collapseBill">
                    <i class="ni ni ni-box-2"></i>
                        <span>Đơn Hàng</span>
                    </a>
                    <div id="collapseBill" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Quản Lý Đơn Hàng:</h6>
                            <a class="collapse-item" href="index.php?act=manage-bill">Danh Sách Đơn Hàng</a>
                        
                            
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="index.php" data-toggle="collapse" data-target="#collapseComment" aria-expanded="true" aria-controls="collapseComment">
                    <i class="fas fa-comment"></i>
                        <span>Bình Luận</span>
                    </a>
                    <div id="collapseComment" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Quản Lý Bình Luận:</h6>
                            <a class="collapse-item" href="index.php?act=comment&list_statistics">Thống Kê Bình Luận</a>
                            <a class="collapse-item" href="index.php?act=comment&list">Trả Lời Bình Luận</a>
                        
                            
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="index.php" data-toggle="collapse" data-target="#collapseCustomer" aria-expanded="true" aria-controls="collapseCustomer">
                    <i class="fas fa-users"></i>
                        <span>Khách Hàng</span>
                    </a>
                    <div id="collapseCustomer" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Quản Lý Khách Hàng:</h6>
                            <a class="collapse-item" href="index.php?act=customer&add">Thêm Tài Khoản</a>
                            <a class="collapse-item" href="index.php?act=customer&list">Danh Sách Khách Hàng</a>
                        
                            
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="index.php?act=statistical">
                <i class="fas fa-chart-pie"></i>
                    <span>Thống Kê</span></a>
            </li>



              
            </ul>
            <!-- </div> -->
            <!-- phần nội dung chính -->
            <!-- <div class="main"> -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <div class="container-fluid">