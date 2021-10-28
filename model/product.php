<?php
include_once 'pdo.php';
function product_insert($data, $files)
{

    // $proId = $data['prodId'];
    $prodName = $data['prodName'];
    $catId = $data['catId'];
    $quantity = $data['quantity'];
    $price = $data['price'];
    $discount = $data['discount'];
    $prodDesc = $data['prodDesc'];
    $dayInput =  date("d/m/Y");
    $view = 0;
    $type = $data['type'];
    //với file là hình ảnh    
    // kiểm tra hinh ảnh và lấy hình ảnh cho vào folder upload
    $catChildId=$data['catChildId'];

    $permited  = array('jpg', 'jpeg', 'pgn', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $uploaded_image = "uploads/" . $unique_image;





    if ($prodName == "" || $catId == "" || $quantity == "" || $price == "" || $prodDesc == "" || $file_name == ""||$catChildId=="") {
        $alert = "<span class='text-danger'> Các trường không được rỗng</span>";
        return $alert;
    } else {
        // khi có file rồi thì nó đưa vào move_upload_file(lấy biến tạm, thả vào thư mục uploads)
        move_uploaded_file($file_temp, $uploaded_image);
        $sql = "INSERT into tbl_product(prodName,quantity,price,discount,image,dayInput,prodDesc,view,catId,type,catChildId) 
            values('$prodName','$quantity','$price','$discount','$unique_image','$dayInput','$prodDesc','$view','$catId','$type','$catChildId')";
        $result = pdo_execute($sql);
        if ($result) {
            return  $alert = "<span class='text-success'> Thêm Thành Công </span>";
        } else {
            return  $alert = "<span class='text-danger'> Thêm Thành Không Thành Công </span>";
        }
    }
}

function product_update($data, $files)
{
    $prodId = $data['prodId'];
    $prodName = $data['prodName'];
    $catId = $data['catId'];
    $quantity = $data['quantity'];
    $price = $data['price'];
    $discount = $data['discount'];
    $prodDesc = $data['prodDesc'];
    $type = $data['type'];
    $view = $data['view'];
    $catChildId=$data['catChildId'];
    //với file là hình ảnh    
    // kiểm tra hinh ảnh và lấy hình ảnh cho vào folder upload

    $permited  = array('jpg', 'jpeg', 'pgn', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $uploaded_image = "uploads/" . $unique_image;





    if ($prodName == "" || $catId == "" || $quantity == "" || $price == "" || $prodDesc == ""|| $catChildId=="") {
        $alert = "<span class='text-danger'> Các trường không được rỗng</span>";
        return $alert;
    } else {

        if (!empty($file_name)) {
            //nếu file name không trống thì ->
            if ($file_size > 204800) {
                $alert =  '<span class="text-danger">hình ảnh kích thước quá lớn 2MB!</span>';

                return $alert;
            } else if (in_array($file_ext, $permited) == FALSE) {
                $alert = "<span class='text-danger'>Bạn chỉ có thể tải lên file:-" . implode(',', $permited) . "</span>";
                return $alert;
            }
            // khi có file rồi thì nó đưa vào move_upload_file(lấy biến tạm, thả vào thư mục uploads)
            move_uploaded_file($file_temp, $uploaded_image);
            $sql = "UPDATE tbl_product SET prodName='$prodName',quantity='$quantity',price='$price',discount='$discount',image='$unique_image',prodDesc='$prodDesc',view='$view',catId='$catId',type=$type,catChildId='$catChildId' where  prodId='$prodId'";
        } else {
            // nếu file name trống thì->
            $sql = "UPDATE tbl_product SET prodName='$prodName',quantity='$quantity',price='$price',discount='$discount',prodDesc='$prodDesc',view='$view',catId='$catId',type=$type,catChildId='$catChildId' where  prodId='$prodId'";
        }

        // khi có file rồi thì nó đưa vào move_upload_file(lấy biến tạm, thả vào thư mục uploads)

        $result = pdo_execute($sql);
        if ($result) {
            return  $alert = "<span class='text-success'> Cập nhập Thành Công </span>";
        } else {
            return  $alert = "<span class='text-danger'> Cập nhập Không Thành Công </span>";
        }
    }
}

function product_delete($prodId)
{
    if (empty($prodId)) {
        $alert = "<span class='text-danger'>Xoá không thành công! Không tìm thấy danh mục</span>";
        return $alert;
    } else {
        $sql = "DELETE from tbl_product where prodId=?";
        $result = pdo_execute($sql, $prodId);
        if ($result) {
            return  $alert = "<span class='text-success'>Xoá Thành Công </span>";
        } else {
            return  $alert = "<span class='text-danger'> Xoá Không Thành Công </span>";
        }
    }
} {
}

function product_select_by_id($id)
{
    $sql = "SELECT * From tbl_product where prodId=$id";
    return pdo_query_one($sql);
}

function product_select_by_name($catName)
{
    $sql = "SELECT * From tbl_product where catName ='$catName'";
    return pdo_query_TF($sql);
}


function product_exist()
{
}

function product_select_all($key=' ' , $_cat=0)
{
    $sql = "SELECT * FROM tbl_product where 1  ";
    if ($key != '') {
        $sql .= "  And prodName LIKE '%$key%' ";
    }
    if ($_cat >0) {
        $sql .= "  And catId =$_cat ";
    }

    $sql .= ' Order by prodId DESC';
    return pdo_query($sql);
}
function product_select_by_cat($key=' ' , $_cat=0,$limit=20,$catChildId=0,$from=0)
{
    $sql = "SELECT * FROM tbl_product where 1  ";
    if ($key != '') {
        $sql .= "  And prodName LIKE '%$key%' ";
    }
    if ($_cat >0) {
        $sql .= "  And catId =$_cat ";
    }
    if($catChildId > 0)
    {
        $sql .= "  And catChildId =$catChildId ";
    }

    $sql .= ' Order by prodId DESC limit '.$from.','.$limit.'';
    return pdo_query($sql);
}




function product_select_option($type,$limit)
{
    $sql = "SELECT * From tbl_product where type= $type order by prodId desc limit $limit";
    return pdo_query($sql);
}
// top sản phẩm bán chạy
function product_select_topsale($type,$limit)
{
    $sql = "SELECT * From tbl_product where type= $type order by view desc limit $limit";
    return pdo_query($sql);
}

function product_select_category($cat,$limit)
{
    $sql = "SELECT * From tbl_product where catId=$cat
     order by prodId desc limit $limit";
    return pdo_query($sql);
}

// function kiểm tra productId có tồn tại trong hàm không ?
function product_check_id($prodId)
{
    $sql = "SELECT * From tbl_product where prodId=$prodId";
    $res =pdo_query_one($sql);
    if($res==true){
        return 1;
    }
    return 0;
}
function product_cat_select_by_id($id)
{
    $sql = "SELECT tbl_product.*,tbl_category.catName,tbl_category.catId From tbl_product
    INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
    having prodId=$id";
    return pdo_query_one($sql);
}
// sản phẩm cùng loại
function product_select_thesame_cat($prodId,$catId,$limit=8)
{
    $sql = "SELECT * from tbl_product where catId = $catId And prodId <> $prodId
    limit $limit";
    
    return pdo_query($sql);
}
// tĂNG view cho mỗi sản phẩm khi người dùng xem sản phẩm
function product_up_view($prodId){
    
    $sql = "UPDATE tbl_product SET view=view +1 where  prodId=".$prodId."";
    return  pdo_execute($sql);
}


//phân trang sản phẩm
// tổng số sản phẩm theo danh mục
function total_product_category($catId,$catChildId=0)
{
    $sql = "SELECT count(*) as total_prod_cat From tbl_product where 1 ";
     if($catChildId > 0)
    {
        $sql .= "  And catChildId =$catChildId ";
    }
     $sql   .= " and catId=$catId";
    return pdo_query_one($sql);
}