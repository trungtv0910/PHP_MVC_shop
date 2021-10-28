<style>
    th,
    td {
        text-align: left;
    }

    tr>td:nth-child(2)>input {
        padding: 5px;
        width: 350px;
    }
</style>


<?php
if (isset($_POST['update'])) {
    $customer_update = customer_update($_POST, $_FILES);
}


?>




<br>
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Sửa Thông Tin Khách Hàng</h3>
                </div>
                <div class="col text-right">

                </div>
            </div>
        </div>

        <div class="table-responsive">
            <!-- Projects table -->
            <form action="" method="post" enctype="multipart/form-data">
                <table class="table align-items-center table-flush">

                    <tbody>
                        <tr>
                            <td width="170"> Tên khách hàng</td>
                            <td width="800">
                            <input type="hidden" name='custId' value="<?php echo $row['custId'] ?>">
                                <input type="text" name='name' value="<?php echo $row['name'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td> <i class="ni ni-circle-08"></i> Tài khoản</td>
                            <td>
                                <input type="text" name="username" value="<?php echo $row['username'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Mật khẩu</td>
                            <td><input type="password" name="password" value="<?php echo $row['password'] ?>"></td>
                        </tr>
                       
                        <tr>
                            <td> <i class="ni ni-circle-08"></i> Ảnh đại diện</td>
                            <td>
                                <img width="100" src="uploads/<?php echo $row['urlImage'] ?>" alt="">
                                <input type="file" name="image">

                            </td>
                        </tr>
                        <tr>
                            <td><i class="ni ni-email-83"></i> Email</td>
                            <td><input type="email" name="email" value="<?php echo $row['email'] ?>"></td>
                        </tr>

                        <tr>
                            <td><i class="fas fa-phone"></i> Số điện thoại</td>
                            <td><input type="text" name="phone" value="<?php echo $row['phone'] ?>"> </td>
                        </tr>
                        <tr>
                            <td><i class="ni ni-square-pin"></i> Địa chỉ Giao hàng</td>
                            <td> <input type="text" name="address" value="<?php echo $row['address'] ?>"> </td>
                        </tr>
                        <tr>
                            <td> Trạng Thái</td>
                            <td>
                                <select name="active" id="">
                                    <option>-----Chọn quyền Trạng Thái-----</option>

                                    <option <?php
                                            echo $row['active'] == 0 ? 'selected' : '';
                                            ?> value="0">Khoá</option>
                                    <option <?php
                                            echo $row['active'] == 1 ? 'selected' : '';
                                            ?> value="1">Hoạt Động</option>
                                </select>
                            </td>
                        </tr>



                        <tr>
                            <td> Vai Trò</td>
                            <td>
                                <select name="role" id="">
                                    <option>-----Chọn quyền truy cập-----</option>

                                    <option <?php
                                            echo $row['roles'] == 0 ? 'selected' : '';
                                            ?> value="0">Thành Viên</option>
                                    <option <?php
                                            echo $row['roles'] == 1 ? 'selected' : '';
                                            ?> value="1">Quản Trị Viên</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <input class="btn btn-success" type="submit" name="update" value="Cập nhập">

                            </td>
                            <td> <span><?php
                                        if (isset($customer_update)) {
                                            echo $customer_update;
                                        }
                                        ?></span></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>

    </div>
</div>