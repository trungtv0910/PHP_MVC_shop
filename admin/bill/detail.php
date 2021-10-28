<br>
<?php
$row_cust=customer_select_bill($custId);
if(isset($_POST['bill-status'])){
        $status =$_POST['bill-status'];
        bill_update($status,$billId);
        // header('location:index?act=manage-bill');
        echo '<script>window.location="index.php?act=manage-bill"</script>';
}






?>

<div class="col-xl-12">
    <div class="card">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Thông Tin Đơn Hàng </h3>
                </div>
                <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">Mã đơn: </i><?php echo $billId ?></a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">

                <tbody>
                    <style>
                        td,
                        th:nth-child(2) {
                            text-align: left;
                        }

                        td:nth-child(5) {
                            text-align: center;
                        }
                    </style>
                    <tr>
                        <td width="150" scope="row">Tên khách hàng</td>
                        <td width="800"><?php echo $row_cust['name'] ?></td>
                    </tr>
                
                    <tr>
                        <td>Số điện thoại</td>
                        <td><?php echo $row_cust['phone'] ?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ Giao hàng</td>
                        <td><?php echo $row_cust['address'] ?></td>
                    </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Giỏ Hàng</h3>
                    </div>
                    <div class="col text-right">
                        <!-- <a href="#!" class="btn btn-sm btn-primary">See all</a> -->
                      
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <form action="" method="post">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Mã SP</th>
                                <th scope="col">Ảnh Sản Phẩm</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">số Lượng</th>
                                <th scope="col">Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_money=0;
                            $bill_cart=bill_select_cart($billId);
                            $stt = 0;
                           foreach($bill_cart as $row_cart) {
                                $stt++;
                                $urlImage=$img_path.$row_cart['image'];
                            ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $row_cart['prodId'] ?></td>
                                    <td><img width="100" src="<?php echo $urlImage; ?>" alt=""></td>
                               
                                   
                                    <td><?php echo $row_cart['prodName'] ?></td>
                                    <td><?php echo $row_cart['quantity'] ?></td>
                                    <td><?php 
                                    $price =$row_cart['quantity']*$row_cart['price'];
                                  echo  number_format($price); $total_money=$row_cart['total_money'] ?> VNĐ</td>

                                </tr>
                            <?php } ?>
                         
                        </tbody>
                      
                    </table>
                    <span class="float-right">  Tổng Tiền :<?php echo number_format($total_money).' VNĐ' ?></span>
            </div>
            <!--from-->

        </div>
    </div>


</div>



















<br>
<div class="dieu_khien">
    <form action="" method="post">
        <button class="btn btn-warning " onclick="return confirm('Xác nhận Đơn Hàng Chưa Thanh Toán ?')" type="submit" name="bill-status" value="0">Chưa Thanh Toán</button>
        <button class="btn btn-success " onclick="return confirm('Xác nhận Đơn Hàng Đã Thanh Toán ?')" type="submit" name="bill-status" value="1">Đã Thanh Toán</button>
        <button class="btn btn-danger " onclick="return confirm('Xác nhận Huỷ Đơn ?')" type="submit" name="bill-status" value="2">Huỷ Đơn</button>
    </form>
</div>
<!-- điều khiển -->