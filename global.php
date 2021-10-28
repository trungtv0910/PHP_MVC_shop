<?php
$ROOT_URL   ="/xshop";
$CONTEN_URL ="$ROOT_URL/content";
$ADMIN_URL  ="$ROOT_URL/admin";
$SITE_URL   ="$ROOT_URL/site";

function exist_param($fieldname){
    return array_key_exists($fieldname, $_REQUEST);
}
$img_admin  ="admin/";
$img_path   ="uploads/";
$img_global =$img_admin.$img_path;



?>
<!-- viết href="<?=$CONTEN_URL?>/css/xxxx" -->