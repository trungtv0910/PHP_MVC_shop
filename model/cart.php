<?php
include_once 'pdo.php';

function addsession($prodId,$quantitycart,$get_prod)
{
    if (!empty($_SESSION['mycart'])) {
        $cart = $_SESSION['mycart'];
        if (array_key_exists($prodId, $cart)) {
            $cart[$prodId] = array(
                'quantity'   =>  (int)$cart[$prodId]['quantity'] + $quantitycart,
                'price'      =>  $get_prod['price'],
                'prodName'   =>  $get_prod['prodName'],
                'image'      =>  $get_prod['image']
            );
        } else {
            $cart[$prodId] = array(
                'quantity' => $quantitycart,
                'price'    => $get_prod['price'],
                'prodName' => $get_prod['prodName'],
                'image'      =>  $get_prod['image']
            );
        }
    } else {
        // $_SESSION['mycart'] = [];
        $cart[$prodId] = array(
            'quantity' => $quantitycart,
            'price'    => $get_prod['price'],
            'prodName' => $get_prod['prodName'],
            'image'      =>  $get_prod['image']
        );
    }
    $_SESSION['mycart'] = $cart;

}

// function addbill($data){
//     $date=date('d/m/y  h:i:s');
//     $custId=$data['custId'];
//     $payment_methods=$data['payment_methods'];
//     $total_money=$data['total'];
//     // với 0 chưa thanh toán, 1 đã thanh toán
//     $payment_status=0;
//     $sql="INSERT INTO tbl_bill (custId,date,payment_methods,total_money,payment_status) 
//     values('$custId','$date','$payment_methods',$total_money,$payment_status)";
//     return  pdo_execute_lastId($sql);
     
// }


function addcart($prodId,$prodName,$quantity,$price,$image,$billId){
    $sql="INSERT INTO tbl_cart (prodId,prodName,quantity,price,image,billId) 
    values('$prodId','$prodName','$quantity','$price','$image','$billId')";
    return pdo_execute($sql);
}




?>