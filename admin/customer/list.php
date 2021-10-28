<br>
<style>
    th,
    td {
        text-align: left;

    }

    td:nth-child(2) {
        max-width: 140px;
    }

    th:nth-child(2) {
        max-width: 140px;
    }

    td:nth-child(6) {
        width: 200px;
        padding-left: 0px;
        padding-right: 0px;
    }
</style>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Quản Lý Khách Hàng</h3>
                    </div>
                    <div class="col text-right">
                        <a href="index.php?act=customer&add" class="btn btn-sm btn-primary">Thêm Khách Hàng</a>
                        <span>
                            <?php
                            if (isset($custmer_delete)) {
                                echo $custmer_delete;
                            }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <form action="" method="post">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush ">
                        <thead class="thead-light">
                            <tr class="table_01">
                               
                                <th>Mã KH</th>
                                <th>Tên Khách Hàng</th>
                                <th>Tài Khoản</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Địa chỉ</th>
                                <th>Hoạt Động</th>
                                <th>Vai trò</th>
                                <th>Tùy Chỉnh</th>


                            </tr>
                        </thead>
                        <tbody>
                            <!-- code xóa khách hàng -->


                            <?php

                            $row = customer_selectall();
                            $i = 0;
                            foreach ($row as $value) {
                                // extract($item);
                            ?>
                                <tr>
                                  
                                    <td><i class="fas fa-barcode"> <?php echo $value['custId']; ?></td>
                                    <td>
                                        <div class="reply_img text-center">
                                            <?php
                                            if (empty($value['urlImage'])) {
                                                echo '<img width="50" src="uploads/nonavatar2.jpg" alt="">';
                                            } else {
                                                echo '<img width="50" src="uploads/' . $value['urlImage'] . '" alt="">';
                                            }
                                            ?>

                                        </div>
                                        <i class="ni ni-single-02"><?php echo $value['username']; ?>
                                    </td>
                                    <td>
                                    <?php echo $value['name']; ?>
                                </td>
                                    <td><i class="ni ni-email-83"></i> <?php echo $value['email']; ?> </td>
                                    <td><i class="fas fa-phone"></i> <?php echo $value['phone']; ?></td>
                                    <td> <?php echo $value['address']; ?></td>
                                    <td><?php echo $value['active']==1?"<span class='text-success'>Hoạt Động</span>":"<span class='text-danger'>Khoá</span>" ?></td>
                                    <td>
                                        <?php
                                        if ($value['roles'] == 0) {
                                            echo 'Thành Viên';
                                        } else {
                                            echo 'Quản Trị Viên';
                                        }
                                        ?>
                                    </td>

                                    <td><a class="btn  btn-primary" href="index.php?act=customer&id_edit=<?php echo $value['custId'] ?>">Sửa</a>
                                        <!-- <button class="btn btn_sua">Sửa</button> -->
                                        <a class="btn btn_xoa btn-danger" onclick="return confirm('Bạn có chắc xóa khách hàng này')" href="index.php?act=customer&id_delete=<?php echo $value['custId'] ?>">Xóa</a>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>




</div>