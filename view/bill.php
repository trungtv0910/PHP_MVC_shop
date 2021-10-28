<?php
$custId = $_SESSION['custId'];
?>
<div class="ps-blog-grid pt-10 pb-80">

    <div class="ps-container">
        <div class="row">
            <!-- div nội dung chính -->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12  ">
                <?php
                include './inc/siderbar-client.php';
                ?>

            </div>

            <!-- div nội dung chính -->
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">

                <?php $check_bill = bill_check($custId);
                ?>


                <div class="ps-content">
                    <p>Đơn Hàng Của Tôi</p>
                    <?php
                    if ($check_bill == 0) {
                        echo '<h3 class="text-danger text-center pt-100 pb-100">Bạn Chưa Có Đơn Hàng</h3>';
                    } else {

                    ?>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Ngày mua</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Tổng Tiền</th>
                                    <th scope="col">Trạng thái đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $bill = bill_select_by_id($custId);
                                foreach ($bill as $row_bill) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row_bill['billId'] ?></th>
                                        <td><?php echo $row_bill['date'] ?></td>
                                        <td><?php
                                            $product=bill_select_cart($row_bill['billId']);
                                            foreach($product as $row_prod){
                                                echo $row_prod['prodName']. '<br>';

                                            }
                                            ?>
                                        </td>
                                        <td>

                                            <?php
                                           
                                            echo number_format( $row_bill['total_money']) . ' VNĐ' ?></td>
                                        <td>
                                            <?php if ($row_bill['payment_status'] == 0) {
                                                echo 'Chưa Thanh Toán';
                                            } else if ($row_bill['payment_status'] == 1) {
                                                echo 'Đã Thanh Toán';
                                            } else {
                                                echo "Huỷ Đơn";
                                            }  ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>


                </div>



            </div>
            <!-- col9 -->
        </div>
    </div>
</div>