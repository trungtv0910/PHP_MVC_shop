<?php
include_once 'pdo.php';


function addbill($data){
    $date=date('d/m/y  h:i:s');
    $custId=$data['custId'];
    $payment_methods=$data['payment_methods'];
    $total_money=$data['total'];
    // với 0 chưa thanh toán, 1 đã thanh toán
    $payment_status=0;
    $sql="INSERT INTO tbl_bill (custId,date,payment_methods,total_money,payment_status) 
    values('$custId','$date','$payment_methods',$total_money,$payment_status)";
    return  pdo_execute_lastId($sql);
     
}



function bill_select_by_id($custId)
{
    $sql = "SELECT * FROM tbl_bill
    where custId=$custId";
    return pdo_query($sql);
   
   
}



function bill_check($custId)
{
    $sql = "SELECT tbl_bill.*,tbl_cart.prodName FROM tbl_bill
    inner join tbl_cart on tbl_cart.billId = tbl_bill.billId
    where tbl_bill.custId=$custId";
    return pdo_query_column($sql);
}

function bill_select_all()
{
    $sql = "SELECT tbl_bill.*,tbl_customer.username FROM tbl_bill
    inner join tbl_customer on tbl_customer.custId = tbl_bill.custId ORDER By billId Desc";
    return pdo_query($sql);

}

function bill_select_cart($billId)
{
    $sql = "SELECT * FROM tbl_cart,tbl_bill WHERE tbl_cart.billId=tbl_bill.billId 
    AND tbl_cart.billId=$billId ORDER BY tbl_cart.billId DESC";
    return pdo_query($sql);
}
function bill_update($status,$billId)
{
    $sql = "UPDATE  tbl_bill set payment_status=$status where billId=$billId ";
    return pdo_execute($sql);
}








?>