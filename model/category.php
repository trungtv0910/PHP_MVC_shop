<?php
include_once 'pdo.php';
function category_insert($catName)
{

    if (empty($catName)) {
        $alert = "<span class='text-danger'> Vui lòng nhập danh mục</span>";
        return $alert;
    } else 
    { 
            $sql = "INSERT into tbl_category(catName) values('$catName')";
            $result = pdo_execute($sql);
            if ($result) {
                return  $alert = "<span class='text-success'> Thêm Thành Công </span>";
            } else {
                return  $alert = "<span class='text-danger'> Thêm Thành Không Thành Công </span>";
            }
      
    }
}

function category_update($catName, $catId)
{
    if (empty($catName)|| empty($catId)) {
        $alert = "<span class='text-danger'> Vui lòng nhập danh mục</span>";
        return $alert;
    } else 
    { 
        $sql = "UPDATE tbl_category SET  catName='" . $catName . "' WHERE catId='$catId'";
            $result = pdo_execute($sql);
            if ($result) {
                return  $alert = "<span class='text-success'> Sửa Thành Công </span>";
            } else {
                return  $alert = "<span class='text-danger'> Sửa Không Thành Công </span>";
            }
      
    }


}

function category_delete($catId)
{
    if (empty($catId)) {
        $alert = "<span class='text-danger'>Xoá không thành công! Không tìm thấy danh mục</span>";
        return $alert;
    } else 
    { 
        $sql = "DELETE from tbl_category where catId=?";
            $result = pdo_execute($sql,$catId);
            if ($result) {
                return  $alert = "<span class='text-success'>Xoá Thành Công </span>";
            } else {
                return  $alert = "<span class='text-danger'> Xoá Không Thành Công </span>";
            }
      
    }
  
 
}



function category_select_by_id($id)
{
    $sql = "SELECT * From tbl_category where catId=$id";
    return pdo_query_one($sql);
}

function category_select_by_name($catName)
{
    $sql = "SELECT * From tbl_category where catName ='$catName'";
    return pdo_query_TF($sql);
   
}


function category_exist()
{
}

function category_select_all()
{
    $sql = "SELECT * FROM tbl_category";
    return pdo_query($sql);
}
function category_check_id(){
    $sql = "SELECT * From tbl_category";
    return pdo_query($sql);
}
// danh mục con

function categoryChild_select_by_id($id)
{
    $sql = "SELECT * From tbl_category_child where catId=$id";
    return pdo_query($sql);
}
function categoryChild_catChildName($catChildId)
{
    $sql = "SELECT * From tbl_category_child where catChildId=$catChildId";
    return pdo_query_one($sql);
}
function categoryChild_catChild_all($catId)
{
    $sql = "SELECT * From tbl_category_child where catId=$catId";
    return pdo_query($sql);
}
// thêm danh mục con
function categoryChild_insert($catChildName,$catId)
{

    
            $sql = "INSERT into tbl_category_child(catChildName,catId) values('$catChildName','$catId')";
            $result = pdo_execute($sql);
            if ($result) {
                return  $alert = "<span class='text-success'> Thêm Thành Công </span>";
            } else {
                return  $alert = "<span class='text-danger'> Thêm Thành Không Thành Công </span>";
            }
      
    
}