<title>Lấy lại password</title>
<?php
include_once '../inc/header-other.php';
?>
<?php
include_once '../model/customer.php';
if (isset($_POST['check_account'])) {
    $check_account = check_acount($_POST['username'], $_POST['email']);
}
if (isset($_POST['chance_password_account'])) {

    $chance_pass = change_password_account(md5($_POST['password']), $_POST['custId']);
    $alert="<span class=text-success>Đổi Mật Khẩu Thành Công </span> ";
   
}


?>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Đặt Lại Mật Khẩu</h1>
                                <?php
                                  if (isset($alert)) {
                                    echo $alert;
                                }
                                ?>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group ">
                                    <?php if (empty($check_account)) { ?>
                                        <input type="text" name="username" class="form-control form-control-user" id="exampleFirstName" placeholder="Tài Khoản">


                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                </div>
                                <input type="submit" name="check_account" class="btn btn-primary btn-user btn-block" value="Kiểm Tra">

                                <p>
                                    <?php if (isset($check_account) && $check_account != true) {
                                            echo '<span class="text-danger">  Tài Khoản Không Đúng </span>';
                                        } ?>
                                </p>
                            <?php } ?>
                            <?php
                            if (!empty($check_account) && is_array($check_account)) { ?>
                                <input type="hidden" value="<?php echo $check_account['custId'] ?>" name="custId">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Nhập lại mật khẩu">
                                    </div>
                                </div>
                                <input type="submit" name="chance_password_account" class="btn btn-primary btn-user btn-block" value="đổi mật khẩu">
                                <p><?php
                                    if (isset($chance_pass)) {
                                        echo $chance_pass;
                                    }
                                    ?></p>
                            <?php }
                            ?>





                            <br>



                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="login.php">Đã có tài khoản? Đăng nhập!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>