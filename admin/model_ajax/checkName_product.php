<?php
include_once '../../model/pdo.php';
include_once '../../model/category.php';

if (isset($_GET['prodName'])) {
    $prodName=$_GET['prodName'];
    // echo category_select_by_name($catName);
    $sql="SELECT * FROM tbl_product where prodName='".$prodName."'";
    echo pdo_query_column($sql);
    
}
?>