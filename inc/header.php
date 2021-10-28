<!DOCTYPE html>
<html lang="en">
<?php
include_once 'model/pdo.php';
include_once 'model/session.php';
//hàm chứa sesstion_start(()
init();
include_once 'model/category.php';
include_once 'model/product.php';
include_once 'model/comment.php';
include_once 'model/cart.php';
include_once 'model/bill.php';
include_once 'model/customer.php';
include_once 'global.php';
?>

<?php


?>





<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/1.css">
    <link rel="stylesheet" href="plugin/fontawesome/css/all.css">
    <!-- <link rel="stylesheet" href="css/css/bootstrap.min.css"> -->
    <script src="js/jquery.js"></script>
    <!-- 
    <script src="js/easing.js"></script> -->
    <title>Quang Hải Sport</title>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/ps-icon/style.css">
    <!-- CSS Library-->
    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="plugins/Magnific-Popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="plugins/revolution/css/layers.css">
    <link rel="stylesheet" href="plugins/revolution/css/navigation.css">


    <link rel="shortcut icon" href="images/logofacon.ico" type="image/x-icon">
    <!-- Custom-->
    <link rel="stylesheet" href="css/style.css">
    <!-- <link href="../css/sb-admin-2.min.css" rel="stylesheet"> -->


    <!-- hiệu ứng thanhf công-->
    <script src="js/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="js/dist/sweetalert2.min.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VTW5V0Z8GX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-VTW5V0Z8GX');
    </script>
</head>

<body class="ps-loading ">


    <body>
        <div class="header--sidebar"></div>
        <header class="header">
            <div class="header__top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                            <p>Assignment Dự Án Mẫu - Trần Văn Trung - PD04212</p>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                            <div class="header__actions">
                                <?php
                                // var_dump($_SESSION);

                                if (isset($_SESSION['login']) == false) {
                                ?>
                                    <a href="view-other/login.php">Login & Regiser</a>
                                <?php  } else { ?>

                                    <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Xin Chào : <?php echo $_SESSION['name'] ?><i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="index.php?act=about-account"><i class="fas fa-user-circle"></i> Thông tin tài khoản</a></li>
                                            <li><a href="index.php?act=viewcart"><i class="fas fa-shopping-cart"></i> Giỏ Hàng</a></li>
                                            <li><a href="index.php?act=manage-bill"><i class="fas fa-user-circle"></i> Quản Lý Đơn Hàng</a></li>
                                            <li><a href="view-other/logout.php"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a></li>
                                        </ul>
                                    </div>

                                    <?php
                                    if ($_SESSION['roles'] == 1) { ?>
                                        <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quản lý Admin<i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="./admin">Vào Admin</a></li>

                                                <li><a href="#">Cài Đặt</a></li>
                                            </ul>
                                        </div>
                                    <?php
                                    }

                                    ?>

                                <?php
                                }
                                ?>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navigation">
                <div class="container-fluid">
                    <div class="navigation__column left">
                        <div class="header__logo"><a class="ps-logo" href="index.php"><img src="images/logo_quanghaisport2.png" alt=""></a></div>
                    </div>
                    <div class="navigation__column center">
                        <ul class="main-menu menu">
                            <li class="menu-item menu-item-has-children dropdown"><a href="index.php">Trang Chủ</a>
                                <!-- <ul class="sub-menu">
                                    <li class="menu-item"><a href="index.html">Homepage #1</a></li>
                                    <li class="menu-item"><a href="#">Homepage #2</a></li>
                                    <li class="menu-item"><a href="#">Homepage #3</a></li>
                                </ul> -->
                            </li>
                            <!-- show danh mục -->
                            <?php
                            $menu_cat = category_select_all();
                            foreach ($menu_cat as $menu) {

                            ?>


                                <li class="menu-item menu-item-has-children dropdown"><a href="index.php?act=category&catId=<?php echo $menu['catId'] ?>"><?php echo $menu['catName'] ?></a>

                                    <ul class="sub-menu">
                                        <?php
                                        $cat_child = categoryChild_select_by_id($menu['catId']);
                                        foreach ($cat_child as $menu_child) {
                                        ?>
                                            <li class="menu-item"><a href="index.php?act=category&catId=<?php echo $menu['catId'] ?>&catChildId=<?php echo $menu_child['catChildId'] ?>"><?php echo $menu_child['catChildName'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                            <!-- end phần menu cat -->
                            <!-- <li class="menu-item"><a href="index.php?act=category&cat_name=woment">Nữ</a></li>
                            <li class="menu-item"><a href="index.php?act=category&cat_name=child">Trê Em</a></li>
                            <li class="menu-item menu-item-has-children dropdown"><a href="index.php?act=category&cat_name=accessory">Phụ Kiện</a> -->
                            <!-- <ul class="sub-menu">
                                    <li class="menu-item menu-item-has-children dropdown"><a href="blog-list.php">Blog-grid</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="blog-list.php">Blog Grid 1</a></li>
                                            <li class="menu-item"><a href="blog-list.php">Blog Grid 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item"><a href="blog-list.html">Blog List</a></li>
                                </ul> -->
                            </li>
                            <li class="menu-item menu-item-has-children dropdown"><a href="index.php?act=contact">Liên Hệ</a>

                            </li>
                        </ul>
                    </div>
                    <div class="navigation__column right">

                        <form class="ps-search--header" action="index.php?act=search" method="post">
                            <input class="form-control" name="key_search" type="text" placeholder="Search Product…">
                            <button><i type="submit" name="search_product" class="ps-icon-search"></i></button>
                        </form>

                        <div class="ps-cart"><a class="ps-cart__toggle" href="index.php?act=viewcart"><span><i>I</i></span><i class="ps-icon-shopping-cart"></i></a>
                            <div class="ps-cart__listing">
                                <?php
                                if (!isset($_SESSION['mycart'])) {
                                } else {
                                    $array_cart = $_SESSION['mycart'];
                                }
                                ?>
                                <?php
                                if (empty($_SESSION['mycart'])) { ?>


                                    <div class="col-md-12" style="text-align:center">
                                        <img class="mx-auto" src="images/cart-preview/emptycart.png" alt="">
                                        <p>Không có sản phẩm nào trong giỏ hàng của bạn.</p>
                                    </div>

                                <?php } else { ?>
                                    <div class="ps-cart__content">
                                        <?php
                                        $total_price = 0;
                                        foreach ($array_cart as $key => $value) {
                                            $total = 0;
                                            $urlImage = $img_global . $value['image'];
                                        ?>
                                            <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>
                                                <div class="ps-cart-item__thumbnail"><a href="product-detail.php"></a><img src="<?php echo $urlImage ?>" alt=""></div>
                                                <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.php"> <?php echo $value['prodName']; ?></a>
                                                    <p><span>SL:<i><?php echo $value['quantity'];
                                                                    $total += $value['price'] * $value['quantity'] ?></i></span><span>Giá:<i><?php echo number_format($total);
                                                                                                                                                                            $total_price += $total;  ?></i></span></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="ps-cart__total">
                                        <!-- <p>Number of items:<span>36</span></p> -->
                                        <p>Thanh Toán:<span> <?php echo number_format($total_price) . 'đ' ?></span></p>
                                    </div>
                                    <div class="ps-cart__footer"><a class="ps-btn" href="index.php?act=viewcart">Check out<i class="ps-icon-arrow-left"></i></a></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="menu-toggle"><span></span></div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="header-services">
            <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free ship</strong>: Miễn phí vận chuyển trong khu vực thành phố Đà Nẵng</p>
                <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Sale 20%</strong>: Giảm giá 20% đối với sinh viên học sinh</p>
                <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Flash Sale</strong>: 20/11 Giảm Giá 50% Chúc Mừng Ngày Nhà Giáo Việt Nam</p>
            </div>
        </div>
        <main class="ps-main">