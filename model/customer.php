<?php
include_once 'pdo.php';

function customer_insert($data, $files)
{
    $username = $data['username'];
    $password = md5($data['password']);
    $name = $data['name'];
    // $urlImage = $data[''];
    // active mặc định là 1 vì là được hoạt động
    // active =0 tức là bị khoá
    $active = 1;

    $address = $data['address'];
    $phone = $data['phone'];
    $email = $data['email'];
    $roles= $data['role'];
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





    if ($username == "" || $password == "" || $name == "" || $active == "" || $address == "" || $phone == ""|| $email== ""|| $roles=="") {
        $alert = "<span class='text-danger'> Các trường không được rỗng</span>";
        return $alert;
    } else {
       

        if(!empty($file_name)){
            move_uploaded_file($file_temp, $uploaded_image);
            $sql = "INSERT into tbl_customer(username,password,name,urlImage,active,address,phone,email,roles) 
            values('$username','$password','$name','$unique_image','$active','$address','$phone','$email','$roles')";
        }
        else{
            $sql = "INSERT into tbl_customer(username,password,name,active,address,phone,email,roles) 
            values('$username','$password','$name','$active','$address','$phone','$email','$roles')";
        }
        $result = pdo_execute($sql);
        if ($result) {
            return  $alert = "<span class='text-success'> Thêm Thành Công </span>";
        } else {
            return  $alert = "<span class='text-danger'> Thêm  Không Thành Công </span>";
        }
       
    }
}




function customer_update($data, $files)
{
    $custId=$data['custId'];
    $username = $data['username'];
    $password = md5($data['password']);
    $name = $data['name'];
    // $urlImage = $data[''];
    // active mặc định là 1 vì là được hoạt động
    // active =0 tức là bị khoá
    $active = $data['active'];

    $address = $data['address'];
    $phone = $data['phone'];
    $email = $data['email'];
    $roles= $data['role'];
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

    if ($username == "" || $password == "" || $name == "" || $active == "" || $address == "" || $phone == ""|| $email== ""|| $roles=="") {
        $alert = "<span class='text-danger'> Các trường không được rỗng</span>";
        return $alert;
    } else {
       

        if(!empty($file_name)){
            move_uploaded_file($file_temp, $uploaded_image);
            $sql = "UPDATE tbl_customer SET username='$username',password='$password',name='$name',urlImage='$unique_image',active='$active',address='$address',phone='$phone',email='$email',roles='$roles' where custId='$custId'";
        }
        else{
            $sql = "UPDATE tbl_customer SET username='$username',password='$password',name='$name',active='$active',address='$address',phone='$phone',email='$email',roles='$roles' where custId='$custId'";
        }
        $result = pdo_execute($sql);
        if ($result) {
            return  $alert = "<span class='text-success'> Sửa Thành Công </span>";
        } else {
            return  $alert = "<span class='text-danger'> Sửa Không Thành Công </span>";
        }
       
    }
}

function customer_delete($custId){
    if (empty($custId)) {
        $alert = "<span class='text-danger'>Xoá không thành công! Không tìm thấy khách hàng</span>";
        return $alert;
    } else 
    { 
        $sql="DELETE from tbl_customer where custId=?";
            $result = pdo_execute($sql,$custId);
            if ($result) {
                return  $alert = "<span class='text-success'>Xoá Thành Công </span>";
            } else {
                return  $alert = "<span class='text-danger'> Xoá Không Thành Công </span>";
            }
    }
}
function customer_select_all(){}

function customer_select_by_id($id){
    $sql = "SELECT * From tbl_customer where custId=$id";
    return pdo_query_one($sql);
}

function customer_exist(){}

function customer_selectall(){
    $sql="SELECT * FROM tbl_customer ORDER BY custId Desc";
    return pdo_query($sql);
    
}



function customer_insert_client($data)
{
    $username = $data['username'];
    $password = md5($data['password']);
    $name = $data['name'];
    $active = 1;
    $email = $data['email'];
    $phone = $data['phone'];
    $address = $data['address'];
    $roles=0;
    $urlImage='';

    if ($username == "" || $password == "" || $name == "" || $phone == ""|| $email== ""|| $address=="") {
        return 0;
    } else {
            $sql = "INSERT into tbl_customer(username,password,name,active,address,phone,email,roles,urlImage) 
            values('$username','$password','$name','$active','$address','$phone','$email','$roles','$urlImage')";
        
        $result = pdo_execute($sql);
       
        if ($result) {
            return 1;
        } else {
            return  0;
        }
        
       
    }
}




function check_acount($username,$email){
    $sql ="SELECT * FROM tbl_customer where username='".$username."' and email='".$email."' ";
  
    $result = pdo_query_one($sql);
 
    return $result;

   

}


function change_password_account($password,$custId){
    $sql ="UPDATE  tbl_customer SET  password='".$password."' where custId='".$custId."' ";
  
    $result = pdo_execute($sql);
    if ($result) {
        return  $alert = "<span class='text-success'> Đổi Mật Khẩu Thành Công </span>";
    } else {
        return  $alert = "<span class='text-danger'>  Đổi Mật Khẩu Không Thành Công </span>";
    }
    return $result;
}



function update_account_client($data){
    $custId=$data['custId'];
    $name= $data['name'];
    $phone= $data['phone'];
    $address =$data['address'];

    if ($name == "" ||  $address == "" || $phone == "") {
        $alert = "<span class='text-danger'> Các trường không được rỗng</span>";
        return $alert;
    }else{
        $sql ="UPDATE  tbl_customer SET  name='".$name."', phone='".$phone."',address='".$address."'  where custId='".$custId."' ";
  
        $result = pdo_execute($sql);
        if ($result) {
            return  $alert = "<span class='text-success'> Thay Đổi Thông Tin Thành Công </span>";
        } else {
            return  $alert = "<span class='text-danger'>  Thay Đổi Không Thành Công </span>";
        }
    }
  
    
}




function customer_select_bill($custId){
    $sql ="SELECT * FROM tbl_customer where custId=$custId";
    $result = pdo_query_one($sql);
 
    return $result;

   

}





?>
