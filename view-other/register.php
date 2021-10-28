
<title>Đăng Ký</title>
<?php
include_once '../inc/header-other.php';

    if(isset($_POST['create_acc'])){
        $create_client =customer_insert_client($_POST);

        if($create_client==0){
            $alert = "<span class='text-danger'> Các trường không được rỗng</span>";
        }else{
            $alert = "<span class='text-success'> Tạo tài khoản Thành Công<br>Hệ thống sẽ chuyển quý khách đến trang đăng nhập    </span>";
            echo '<script type="text/javascript">';
            echo 'setTimeout(function() {
                window.location="login.php";
            },3000);';
           echo '</script>';
        }

    }


?>
<script src="register.js"></script>
<script>
    $(document).ready(function(){
        check('#username');
        check('#name');
        check('#email');
        check_pass('#password');
        check_pass_repass('#password','#re_password');
        check('#phone');
    });




</script>


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
                                <h1 class="h4 text-gray-900 mb-4">Tạo Tài Khoản!</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="username" id="username" class="form-control form-control-user"
                                            placeholder="Tài Khoản">
                                            <span id="message_username"></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" id="name" class="form-control form-control-user" 
                                            placeholder="Họ tên">
                                            <span id="message_name"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control form-control-user"
                                        placeholder="Địa chỉ Email">
                                        <span id="message_email"></span>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" id="password" class="form-control form-control-user"
                                            placeholder="Mật khẩu">
                                            <span id="message_password"></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" id="re_password" class="form-control form-control-user"
                                             placeholder="Nhập lại mật khẩu">
                                             <span id="message_password_re"></span>
                                            
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="phone" id="phone" class="form-control form-control-user"
                                            placeholder="Số điện thoại">
                                            <span id="message_phone"></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="address" class="form-control form-control-user"
                                         placeholder="Địa chỉ">
                                    </div>
                                </div>

                                
                                <input type="submit" name="create_acc" id="addCust" class="btn btn-primary btn-user btn-block" value="Tạo Tài Khoản">
                                <br> 
                                <p>
                                    <?php
                                    if(isset($alert)){
                                        echo $alert;
                                    }
                                    ?>
                                </p>

                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Đăng ký với Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Đăng ký với Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Quên mật khẩu?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Đã có tài khoản? Đăng Nhập!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



</body>

</html>