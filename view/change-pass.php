<?php



?>
  <script src="view/check_about.js"></script>
<script>
  
    $(document).ready(function(){
      
        check_pass('#password');
        check_pass_repass('#password','#re_password');
    });

</script>

<div class="ps-blog-grid pt-10 pb-80">

    <div class="ps-container">
        <div class="row">
            <!-- div nội dung chính -->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12  ">
                <?php
                include './inc/siderbar-client.php';
                ?>

            </div>
            <!-- col3 -->

            <!-- div nội dung chính -->
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                <div class="ps-content">
                    <p>Thay đổi mật khẩu</p>

                    <?php
                    if (isset($_SESSION['login']) == true) {
                        $custId = $_SESSION['custId'];
                        $row_cust = customer_select_by_id($custId);

                    ?>
                        <div class="content-box pl-15 pr-15 pt-20 pb-20 bg-color-grey">
                            <form method="post" action="index.php?act=about-account">
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">Tài Khoản:</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" id="custId" name="custId" value="<?php echo $row_cust['custId'] ?>">
                                        <input type="text" class="form-control" id="username" value="<?php echo $row_cust['username'] ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu mới">
                                        <span id="message_password"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nhập Lại Password </label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="re_password" placeholder="Nhập lại mật khẩu">
                                        <span id="message_password_re"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" id="addCust" type="submit" name="change_pass" onclick="return confirm('Xác nhận cập nhập?')"> Cập nhật </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                </div>



            </div>
            <!-- col9 -->
        </div>
    </div>
</div>