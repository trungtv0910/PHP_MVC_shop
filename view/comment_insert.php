<?php
include_once '../model/comment.php';
include_once '../model/product.php';
include_once '../model/customer.php';
include_once '../model/pdo.php';
$prodId=$_GET['prodId'];
$custId=$_GET['custId'];
$content =$_GET['content'];
$date= date('d-m-y h:m:s');
$role=0;


$sql = "INSERT into tbl_comment(content,prodId,custId,date,role) 
values('$content','$prodId','$custId','$date','$role')";
$result = pdo_execute($sql);




?>