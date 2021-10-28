<style>
    .table td,
    .table th {
        white-space: normal
    }

    .table th:nth-child(1),
    .table th:nth-child(2) {
        width: 20px;
        padding-right: 0px;
        padding-left: 0px;
    }
</style>

<?php
if (isset($_POST['search'])) {
    $key = $_POST['key_search'];
    $id_cat = $_POST['id_cat'];
} else {
    $key = '';
    $id_cat = 0;
}
?>


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col ">
                        <h3 class="mb-0">Thống kê Bình luận</h3>
                    </div>
                    <div class="col">
                        <!-- <a href="index.php?act=product&add"> <button class="btn btn-success float_right">Thêm Sản Phẩm</button></a> -->

                    </div>



                </div>
            </div>
            <div class="table-responsive">
                <form action="" method="post">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Số TT</th>
                                <th>Mã Sản Phẩm</th>
                                <th>Hình</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Ngày Bình luận Cuối cùng</th>
                                <th>Tùy chọn</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $row = product_select_all($key, $id_cat);

                            $i = 0;
                            foreach ($row as $value) {
                                extract($value);
                            ?>

                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $prodId; ?></td>
                                    <td class="sup_parent"><img width="100" src="uploads/<?php echo $image ?>" alt="">
                                        <!-- sup -->
                                        <?php
                                        if ($type == 0) {
                                            $alert_type = '<span class="sup_nomal sup_title">Thường</span>';
                                        } else if ($type == 1) {
                                            $alert_type = '<span class="sup_new sup_title">Mới</span>';
                                        } else {
                                            $alert_type = '<span class="sup_bestsale sup_title">Bán Chạy</span>';
                                        }
                                        echo $alert_type;
                                        ?>
                                        <!-- end sup -->
                                    </td>
                                    <td class="text-left"><?php echo $prodName ?>
                                        <br>
                                        <b>Số lượng còn lại: <?php echo $quantity ?></b>
                                        <br>
                                        <b>Giá Bán: </b> <?php echo number_format($price) ?> <b>VNĐ</b>
                                    </td>
                                    <td>
                                        <?php $count_cmt = comment_count($prodId);
                                        echo $count_cmt['count']
                                        ?> <b>Bình luận</b>
                                    </td>
                                    <td>
                                        <?php   $day_last_cmt =comment_day_last($prodId); 
                                            if($day_last_cmt==false){
                                                echo 'Chưa có bình luận';
                                            }
                                            else{
                                             
                                                echo $day_last_cmt['date'];
                                            }
                                        ?>
                                    </td>


                                    <td><a class="btn btn-primary" href="index.php?act=comment&id_show_cmt=<?php echo $prodId ?>">Xem toàn bộ</a>

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