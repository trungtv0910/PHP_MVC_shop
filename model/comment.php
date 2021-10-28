<?php
include_once 'pdo.php';
function comment_insert($data, $files,$role=1)
{
  // $commId = $id;
  $custId = $data['custId'];
  $prodId = $data['prodId'];
  $date= date('d-m-y h:m:s');
  $content= $data['content'];
 
  $replyId=$data['commId'];
    //với file là hình ảnh    

    if ($content == "") {
        $alert = "<span class='text-danger'> Các trường không được rỗng</span>";
        return $alert;
    } else {
        // khi có file rồi thì nó đưa vào move_upload_file(lấy biến tạm, thả vào thư mục uploads)
       
        $sql = "INSERT into tbl_comment(replyId,content,prodId,custId,date,role) 
            values('$replyId','$content','$prodId','$custId','$date','$role')";
        $result = pdo_execute($sql);
        if ($result) {
            return  $alert = "<span class='text-success'> Đã Trả Lời </span>";
        } else {
            return  $alert = "<span class='text-danger'> Lỗi </span>";
        }
    }
}

function comment_insert_client($data, $files)
{
  // $commId = $id;
  $custId = $data['custId'];
  $prodId = $data['prodId'];
  $date= date('d-m-y h:m:s');
  $content= $data['content'];
  $role=0;
  $replyId=Null;
    //với file là hình ảnh    

    if ($content == "") {
        $alert = "<span class='text-danger'> Các trường không được rỗng</span>";
        return $alert;
    } else {
        // khi có file rồi thì nó đưa vào move_upload_file(lấy biến tạm, thả vào thư mục uploads)
       
        $sql = "INSERT into tbl_comment(replyId,content,prodId,custId,date,role) 
            values('$replyId','$content','$prodId','$custId','$date','$role')";
        $result = pdo_execute($sql);
        if ($result) {
            return  $alert = "<span class='text-success'> Thêm Thành Công </span>";
        } else {
            return  $alert = "<span class='text-danger'> Thêm Thành Không Thành Công </span>";
        }
    }
}







function comment_update($catName, $commId)
{
    if (empty($catName)|| empty($commId)) {
        $alert = "<span class='text-danger'> Vui lòng nhập danh mục</span>";
        return $alert;
    } else 
    { 
        $sql = "UPDATE tbl_comment SET  catName='" . $catName . "' WHERE commId='$commId'";
            $result = pdo_execute($sql);
            if ($result) {
                return  $alert = "<span class='text-success'> Sửa Thành Công </span>";
            } else {
                return  $alert = "<span class='text-danger'> Sửa Không Thành Công </span>";
            }
      
    }


}

function comment_delete($commId)
{
    if (empty($commId)) {
        $alert = "<span class='text-danger'>Xoá không thành công! Không tìm thấy comment</span>";
        return $alert;
    } else 
    { 
        $sql = "DELETE from tbl_comment where commId=?";
            $result = pdo_execute($sql,$commId);
            if ($result) {
                return  $alert = "<span class='text-success'>Xoá Thành Công </span>";
            } else {
                return  $alert = "<span class='text-danger'> Xoá Không Thành Công </span>";
            }
      
    }
  
 
}

function comment_select_all()
{
}

function comment_select_by_id($id)
{
    $sql = "SELECT * From tbl_comment where commId=$id";
    return pdo_query_one($sql);
}

function comment_select_by_name($catName)
{
    $sql = "SELECT * From tbl_comment where catName ='$catName'";
    return pdo_query_TF($sql);
   
}


function comment_exist()
{
}

function comment_selectall()
{
    $sql = "SELECT * FROM tbl_comment where role=0 order by commId DESC";
    return pdo_query($sql);
}

function comment_reply($commId,$limit=1)
{
    $sql = "SELECT tbl_comment.*,tbl_customer.name,tbl_customer.urlImage, tbl_product.prodName ,tbl_customer.roles
    FROM tbl_comment inner join tbl_customer ON tbl_comment.custId = tbl_customer.custId
    INNER JOIN tbl_product ON tbl_comment.prodId = tbl_product.prodId
    HAVING replyId=$commId and role=1 ORDER by commId DESC  limit $limit";
    return pdo_query($sql);
}


function comment_select_product_detail($prodId,$role=0,$limit=10)
{
    $sql = "SELECT tbl_comment.*,tbl_customer.name,tbl_customer.urlImage, tbl_product.prodName ,tbl_customer.roles
    FROM tbl_comment inner join tbl_customer ON tbl_comment.custId = tbl_customer.custId
    INNER JOIN tbl_product ON tbl_comment.prodId = tbl_product.prodId
    having role=$role and prodId=$prodId
    order by commId DESC limit $limit";
    return pdo_query($sql);
}
function comment_count($prodId)
{
    $sql = "SELECT count(*) as count FROM tbl_comment where prodId=$prodId";
    return pdo_query_one($sql);

}
function comment_day_last($prodId)
{
    $sql = "SELECT tbl_comment.* FROM tbl_comment
    INNER join tbl_product on tbl_comment.prodId =tbl_product.prodId
    HAVING prodId =$prodId ORDER by commId DESC";
    return pdo_query_one($sql);

}