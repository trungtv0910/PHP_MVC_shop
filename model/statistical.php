<?php
include_once 'pdo.php';


// thống kê
function statistical_quantity_category($catId)
{
    $sql = "SELECT count(*) as count From tbl_product where catId=$catId";
    return pdo_query_one($sql);
}
function statistical_price_max_category($catId)
{
    $sql = "SELECT max(price) as max From tbl_product where catId=$catId
    ";
    return pdo_query_one($sql);
}
function statistical_price_min_category($catId)
{
    $sql = "SELECT min(price) as min From tbl_product where catId=$catId
    ";
    return pdo_query_one($sql);
}
function statistical_price_avg_category($catId)
{
    $sql = "SELECT avg(price) as avg From tbl_product where catId=$catId
    ";
    return pdo_query_one($sql);
}

function statistical(){
    $sql = "SELECT tbl_category.catId , tbl_category.catName as catName ,count(tbl_product.prodId) as countProduct, min(tbl_product.price) as min, max(tbl_product.price) as max ,AVG(tbl_product.price) as avg
     From tbl_product LEFT JOIN tbl_category on tbl_product.catId = tbl_category.catId group by tbl_category.catId";
    return pdo_query($sql);
}

function statistical_chart(){
    $sql = "SELECT tbl_category.catName as catName ,count(tbl_product.prodId) as countProduct From tbl_product LEFT JOIN tbl_category on tbl_product.catId = tbl_category.catId group by tbl_category.catId";
    return pdo_query($sql);
}