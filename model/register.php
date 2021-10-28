<?php
include_once 'pdo.php';
    function check_user($user){
        $sql ="SELECT * From tbl_customer where username=$user";
       $result = pdo_query_column($sql);
        if($result!=0){
            return  1;
        }
        return 0;
    }








?>