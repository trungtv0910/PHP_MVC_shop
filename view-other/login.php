<title>Đăng Nhập</title>
<?php
include_once '../inc/header-other.php';
include_once '../model/session.php';

    if(isset($_POST['login'])){

    $username = $_POST['username'];
	$password = md5($_POST['password']);
    $check_login= check_login($username,$password);
    
    }


?>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome QuangHaiSport!</h1>
                                    </div>
                                    <form class="user" method="post"> 
                                        <div class="form-group">
                                            <input type="text" name='username' class="form-control form-control-user"
                                            
                                                placeholder="Nhập Vào Tên Đăng Nhập">
                                        </div>
                                        <div class="form-group">
                                            <input type="password"name='password' class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Mật Khẩu">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Lưu đăng nhập</label>
                                            </div>
                                        </div>
                                        <input type="submit" name ="login" value="Login" class="btn btn-primary btn-user btn-block">
                                           <span>
                                               <?php
                                               if(isset($check_login)){
                                                   echo $check_login;
                                               }
                                               ?>
                                           </span>
                                       
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Đăng nhập với Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Đăng nhập với Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Quên mật khẩu?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Tạo tài khoản!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


</body>

</html>