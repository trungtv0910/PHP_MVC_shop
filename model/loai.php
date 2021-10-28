<?php
include_once 'pdo.php';
function loai_insert($ten_loai){
    $sql="INSERT into loaihang(ten_loai) values(?)";
    return pdo_execute($sql,$ten_loai);

}
function loai_update(){}
function loai_delete($ma_loai){
    $sql="DELETE from loaihang where ma_loai=?";
    return pdo_execute($sql,$ma_loai);
}
function loai_select_all(){}
function loai_select_by_id(){}
function loai_exist(){}

function loai_selectall(){
    $sql="SELECT * FROM loaihang ";
    return pdo_query($sql);
    
}


?>
