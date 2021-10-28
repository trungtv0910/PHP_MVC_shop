<?php
include_once 'pdo.php';


function init()
{
    session_start();
}

function check_login($username, $password)
{
    init();
    if (empty($username) || empty($password)) {
        $alert = '<lable class="text-danger">Bạn chưa nhập Tài khoản hoặc Mật khẩu</lable>';
        return $alert;
    } else {

        $query = "SELECT * FROM tbl_customer WHERE username = '" . $username . "' AND password = '" . $password . "'";
        $result = pdo_query_one($query);


        // $count = $statement->rowCount();
        // if ($count > 0) {
        //     $_SESSION["username"] = $_POST["username"];

        //     header("location:san_pham.php");
        // } else {

        //     $message = " <script>
        //        Swal.fire({
        //            icon: 'error',
        //            title: 'Oops...',
        //            text: 'Đăng nhập thất bại!'

        //          });
        //        </script>";
        // }




        if ($result != false) {

            // set đã tồn tại cái admin này rồi
            set('login', true);
            set('custId', $result['custId']);
            set('username', $result['username']);
            set('password', $result['password']);
            set('name', $result['name']);
            set('roles', (int)$result['roles']);
            header('location:../index.php');
        } else {
            $alert = '<lable class="text-danger"> Bạn nhập sai mật khẩu hoặc tài khoản mời nhập lại</lable> ';
            return $alert;
        }
    }
}
function set($key, $val)
{
    $_SESSION[$key] = $val;
}
function get($key)
{
    if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
    } else {
        return false;
    }
}

function checkSession()
{
    // self::init();
    if (get("adminlogin") == false) {
        destroy();
        header("Location:login.php");
    }
}

function checkLogin()
{
    // self::init();
    if (get("adminlogin") == true) {
        header("Location:index.php");
    }
}

function destroy()
{
    session_destroy();
    header("Location:login.php");
}

