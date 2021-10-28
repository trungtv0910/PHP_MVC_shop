<?php



?>

<script>
    $(document).ready(function(){
      
        check('#name');
        check('#phone');
    });

</script>
<script src="view/check_about.js"></script>
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
                    <p>Thông tin tài khoản</p>
                    <?php
                    if (isset($messge)) {
                        echo $messge;
                    }

                    ?>
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
                                    <label for="name" class="col-sm-2 col-form-label">Họ Tên</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row_cust['name'] ?>">
                                        <span id="message_name"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo $row_cust['email'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password <br><a href="#"> Thay đổi</a></label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword3" value="<?php echo $row_cust['password'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">Số điện thoại</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row_cust['phone'] ?>">
                                        <span id="message_phone"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Địa chỉ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row_cust['address'] ?>">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" type="submit" id="addCust" name="update_account_client" onclick="return confirm('Xác nhận cập nhập?')"> Cập nhật </button>
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