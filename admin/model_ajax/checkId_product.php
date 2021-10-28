<?php
include_once '../../model/pdo.php';
include_once '../../model/category.php';

if (isset($_GET['prodId'])) {
    $prodId=$_GET['prodId'];
    // echo category_select_by_name($catName);
    $sql="SELECT * FROM tbl_product where prodId='".$prodId."'";
    echo pdo_query_column($sql);
    
}
?>