<?php
include_once '../../model/pdo.php';
include_once '../../model/category.php';

if (isset($_GET['catName'])) {
    $catName=$_GET['catName'];
    // echo category_select_by_name($catName);
    $sql="SELECT * FROM tbl_category where catName='".$catName."'";
    echo pdo_query_column($sql);
    
}
?>