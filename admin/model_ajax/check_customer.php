<?php
include_once '../../model/pdo.php';

if (isset($_GET['username'])) {
    $user = $_GET['username'];

    $sql = "SELECT * From tbl_customer where username='" . $user . "'";
    $result = pdo_query_column($sql);
     echo $result;
}
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    
 
     echo $name;
}
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $sql = "SELECT * From tbl_customer where email='" . $email . "'";
    $result = pdo_query_column($sql);
     echo $result;
}