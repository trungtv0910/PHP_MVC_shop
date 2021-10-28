<?php
require_once 'inc/header.php';
require_once 'model/pdo.php';
include_once 'global.php';
?>
        
  <?php
    if (isset($_GET['act'])) {
        $path = $_GET['act'];
        switch ($path) {
            case 'category': {
                    if (isset($_GET['catId']) && $_GET['catId'] != Null) {
                        $path_child         = $_GET['catId'];
                        if (isset($_GET['catChildId'])) {
                            $cat_childId    = $_GET['catChildId'];
                        } else {
                            $cat_childId    = 0;
                        }
                        $idcat = category_check_id();
                        foreach ($idcat     as $valueId) {
                            if ($path_child == $valueId['catId']) {
                                $catId      = $path_child;
                                $key        = " ";
                                include     'view/product-listing.php';
                                break;
                            }
                        }
                    } else {
                        require  'view-other/404.php';
                    }
                }
                break;

            case 'product_detail': {
                    if (isset($_GET['prodId']) && $_GET['prodId'] != Null) {
                        $prodId         = (int)$_GET['prodId'];
                        // kiểm tra id có tồn tại hay không nếu có thì trả về 1
                        $check_id       =  product_check_id($prodId);
                        if ($check_id   == 1) {
                            include     'view/product-detail.php';
                        } else {
                            require     'view-other/404.php';
                        }
                    } else {
                        require     'view-other/404.php';
                    }
                }
                break;

            case 'about-account': {
                    if (isset($_GET['change-pass'])) {
                        require     'view/change-pass.php';
                    } else if (isset($_POST['change_pass'])) {
                        $pass=$_POST['password'];
                       
                        if($pass=="" || $pass==null ){
                            $messge     = "<span class='text-danger'>Đổi mật khẩu không thành công</span>";
                        }else{
                            change_password_account(md5($_POST['password']), $_POST['custId']);
                            $messge     = "<span class='text-success'>Thay đổi mật khẩu thành công</span>";
                        }
                       
                        require 'view/about-account.php';
                    } else if (isset($_POST['update_account_client'])) {
                        $messge=    update_account_client($_POST);
                        require 'view/about-account.php';
                    } else {
                        require 'view/about-account.php';
                    }
                }
                break;
            case 'manage-bill': {
                    include 'view/bill.php';
                }
                break;

            case 'contact': {
                    require 'view/contact.php';
                }
                break;

            case 'search': {
                    if (isset($_POST['key_search'])) {
                        $key        = $_POST['key_search'];
                        $catId      = 0;
                        include 'view/product-listing.php';
                    }
                }
                break;
            case 'addcart': {
                    if (isset($_POST['addcart']) && isset($_SESSION['login']) == true) {
                        $prodId         = $_POST['prodId'];
                        $quantitycart   = $_POST['quantity'];
                        $get_prod       = product_select_by_id($prodId);
                        addsession($prodId, $quantitycart, $get_prod);
                        include 'view/cart.php';
                    } else {
                        echo "<div class='text-center pb-100 pt-100 text-danger'> Bạn chưa đăng nhập!<br> <a style='color:black;font-weight:bold' href='login.php'>Đăng nhập </a> để tiếp tục mua hàng</div>";
                    }
                }
                break;
            case 'viewcart': {
                    if (isset($_SESSION['login']) == true) {
                        include 'view/cart.php';
                    } else {
                        echo "<div class='text-center pb-100 pt-100 text-danger'> Bạn chưa đăng nhập!<br> <a style='color:black;font-weight:bold' href='login.php'>Đăng nhập </a> để tiếp tục mua hàng</div>";
                    }
                }
                break;
            case 'cart': {
                    if (isset($_GET['id_delete'])) {
                        $id_cart        = $_GET['id_delete'];
                        unset($_SESSION['mycart'][$id_cart]);
                        include 'view/cart.php';
                    }
                    if (isset($_POST['pay'])) {

                        $lastId =   addbill($_POST);

                        foreach ($_SESSION['mycart'] as $key => $value) {
                            addcart($key, $value['prodName'], $value['quantity'], $value['price'], $value['image'], $lastId);
                        }
                        echo '<script>';
                        echo "Swal.fire(
                                    'Đặt Hàng Thành Công!',
                                    'Đơn hàng sẽ sớm được giao đến quý khách!',
                                    'success')";

                        echo '</script>';
                        echo '<script>';
                        echo  'votay.play()';
                        echo '</script>';

                        unset($_SESSION['mycart']);
                        include 'view/bill.php';
                    }
                }
                break;

            default: {
                }
                break;
        }
    } else {


        include 'view/home.php';
    }

    ?>
         
 <?php
    include 'inc/footer.php';

?>