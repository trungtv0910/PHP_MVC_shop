<style>
    .table td,
    .table th {
        white-space: normal
    }

    .table th:nth-child(1) {
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
                        <h3 class="mb-0">Thống Kê Sản Phẩm Theo Danh Mục</h3>
                    </div>
                    <div class="col">
                        <a href="index.php?act=statistical&chart"> <button class="btn btn-success float_right">Biểu Đồ Chart</button></a>

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
                                <th>Tên Danh mục</th>
                                <th>Giá Bán Cao Nhất</th>
                                <th>Giá Bán Thấp Nhất</th>
                                <th>Giá Bán Trung Bình</th>
                                <th>Doanh Thu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $row = category_select_all();

                            $i = 0;
                            foreach ($row as $value) {
                                extract($value);
                            ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td class="text-left"><?php echo $catName ?>
                                        <br>
                                        <b>Số lượng: <?php
                                                        $quantity_prod = statistical_quantity_category($catId);
                                                        echo $quantity_prod['count'];
                                                        ?> Sản Phẩm</b>
                                    </td>
                                    <!-- giá tiền cao nhất -->
                                    <td><?php
                                        $price_max = statistical_price_max_category($catId);
                                        echo number_format($price_max['max']);
                                        ?> <b>VNĐ</b></td>
                                    <!-- giá tiền thấp nhất -->
                                    <td><?php
                                        $price_min = statistical_price_min_category($catId);
                                        echo number_format($price_min['min']);
                                        ?> <b>VNĐ</b></td>

                                    <!-- giá tiền trung bình -->
                                    <td><?php
                                        $price_avg = statistical_price_avg_category($catId);
                                        echo number_format($price_avg['avg']);
                                        ?> <b>VNĐ</b></td>



                                    <td> Chưa cập nhập ????</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>