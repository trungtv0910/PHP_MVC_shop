<?php
include_once 'pdo.php';
function count_bill(){
    $sql="SELECT count(billId) as countBill FROM tbl_bill";
    return  pdo_query_one($sql);
}

function count_cust(){
    $sql="SELECT count(custId) as countCust FROM tbl_customer";
    return  pdo_query_one($sql);
}
function count_prod(){
    $sql="SELECT count(prodId) as countProd FROM tbl_product";
    return  pdo_query_one($sql);
}

function income_bill(){
    $sql="SELECT sum(total_money) as sumBill FROM tbl_bill where payment_status=1 ";
    return  pdo_query_one($sql);
}




?>