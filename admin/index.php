<?php
include 'inc_admin/admin_header.php';

?>
<!-- lấy địa chỉ truy cập -->
<?php
include_once '../model/category.php';
include_once '../model/product.php';
include_once '../model/comment.php';
include_once '../model/customer.php';
include_once '../model/bill.php';
include_once '../model/dashboard.php';
include_once '../model/statistical.php';
// thư viện hổ trợ format
include_once '../model/format.php';
include_once '../global.php';

if (isset($_GET['act'])) {
  $path = $_GET['act'];
  switch ($path) {
    case 'category': {
      echo '<head><title>Danh Mục</title></head>';
        if (isset($_GET['id_edit'])) {
          $id   = $_GET['id_edit'];
          if (isset($_POST['update'])) {
            $ma_loai  = $_POST['ma_loai'];
            $ten_loai = $_POST['ten_loai'];
            $result   = category_update($ten_loai, $ma_loai);
          }
          $row = category_select_by_id($id);
          require 'category/edit.php';
        } else if (isset($_GET['id_delete'])) {
          $id         = $_GET['id_delete'];
          $cat_delete = category_delete($id);
          include      'category/add-list.php';
        } else {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $catName    = $_POST['catName'];
            $cat_insert = category_insert($catName);
          }
          include       'category/add-list.php';
        }
      }
      break;
    case 'category_child': {
        if (isset($_POST['submit'])) {
          $catId = $_POST['catId'];
          $catChildName = $_POST['catChildName'];
          echo categoryChild_insert($catChildName, $catId);
          include 'category/add-list.php';
        }
      }
      break;
    case 'customer': {
      echo '<head><title>Quản Lý Khách Hàng</title></head>';
        if (isset($_GET['add'])) {
          require 'customer/add.php';
        } else if (isset($_GET['id_edit'])) {
          $id       = $_GET['id_edit'];
          $row      = customer_select_by_id($id);
          require 'customer/edit.php';
        } else if (isset($_GET['id_delete'])) {
          $id              =  $_GET['id_delete'];
          $custmer_delete  =  customer_delete($id);
          include             'customer/list.php';
        } else {
          include           'customer/list.php';
        }
      }
      break;
    case 'product': {
      echo '<head><title>Quản Lý Sản Phẩm</title></head>';
        if (isset($_GET['add'])) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
            $product_insert = product_insert($_POST, $_FILES);
          }
          include 'product/add.php';
        } else if (isset($_GET['id_edit'])) {
          $id         = $_GET['id_edit'];
          if (isset($_POST['update'])) {
            $product_update   = product_update($_POST, $_FILES);
          }

          $row = product_select_by_id($id);
          require 'product/edit.php';
          // $result   = product_update($_POST, $_FILES);

        } else if (isset($_GET['id_delete'])) {
          $id              =  $_GET['id_delete'];
          $product_delete  =  product_delete($id);
          include             'product/list.php';
        } else {

          include 'product/list.php';
        }
      }
      break;
    case "comment": {
      echo '<head><title>Quản Lý Bình Luận</title></head>';
        if (isset($_GET['list_statistics'])) {
          include 'comment/list_statistics.php';
        } else if (isset($_GET['id_show_cmt'])) {
          $id            = $_GET['id_show_cmt'];
          require        'comment/id_show_cmt.php';
        } else if (isset($_GET['id_reply'])) {
          $id            = $_GET['id_reply'];
          require        'comment/reply.php';
        } else if (isset($_GET['id_delete'])) {
          $id            = $_GET['id_delete'];

          $comment_delete = comment_delete($id);
          include        'comment/list.php';
        } else {

          include 'comment/list.php';
        }
      }
      break;

    case 'manage-bill': {
      echo '<head><title>Quản Lý Đơn Hàng</title></head>';
        if (isset($_GET['bill-detail'])) {
          $billId = $_GET['bill-detail'];
          $custId = $_GET['custId'];
          include 'bill/detail.php';
        } else {
          include 'bill/list.php';
        }
      }
      break;
    case 'statistical': {
      echo '<head><title>Thống Kê</title></head>';
        if (isset($_GET['chart'])) {
          include 'statistical/chart.php';
        } else
          include 'statistical/list.php';
      }
      break;
    default: {
        include 'dashboard/dashboard.php';
      }
      break;
  }
} else {
  echo '<head><title>Bản Tin</title></head>';
  include 'dashboard/dashboard.php';
}

?>

<?php
include 'inc_admin/admin_footer.php';
?>