<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Quản Lý Đơn Hàng</h3>
                    </div>
                    <div class="col text-right">
                        <a href="#!" class="btn btn-sm btn-primary">See all</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <form action="" method="post">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Mã Đơn Hàng</th>
                                <th scope="col">Tên Khách Hàng</th>
                                <th scope="col">Ngày Tạo Đơn</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col">Đơn Giá</th>
                                <th scope="col">Phương Thức Pay</th>
                                <th scope="col">View</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 0;
                            $bill = bill_select_all();
                            foreach ($bill as $row_bill) {
                            ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><i class="fas fa-barcode"> </i><?php echo $row_bill['billId']; ?> </td>
                                    <td><i class="ni ni-single-02"></i><?php echo $row_bill['username']; ?></td>
                                    <td><i class="ni ni-time-alarm"></i><?php echo  $row_bill['date'];  ?></td>
                                    <td width="180">
                                        <?php if ($row_bill['payment_status'] == 0) {
                                            echo '<span class="text-primary"> Chưa Thanh Toán</span>';
                                        } else if ($row_bill['payment_status'] == 1) {
                                            echo '<span class="text-success">Đã Thanh Toán</span>';
                                        } else {
                                            echo '<span class="text-danger">Huỷ Đơn</span>';
                                        }  ?>

                                    </td>
                                    <td><?php echo  number_format($row_bill['total_money']) . ' VNĐ';  ?></td>

                                    <td><i class="fas fa-money-check-alt"></i><?php echo  $row_bill['payment_methods'];  ?></td>
                                    <td><a class="btn btn-primary" href="index.php?act=manage-bill&bill-detail=<?php echo $row_bill['billId'] ?>&custId=<?php echo $row_bill['custId'] ?>">Xem Chi tiết</a></td>
                                    <!-- <button class="btn btn_sua">Sửa</button> -->


                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>