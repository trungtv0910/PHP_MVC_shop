<br>
<h2 class="card-title text-uppercase text-muted mb-0">Bảng Tin Quang Hai Sport</h2>
<br>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <?php
                $bill = count_bill();
                ?>
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Đơn Hàng</h5>
                        <span class="h2 font-weight-bold mb-0">
                            <?php
                            echo $bill['countBill'];
                            ?>
                        </span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                            <i class="ni ni ni-box-2"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"><a href="index.php?act=manage-bill">Xem Chi Tiết</a></span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <?php
                    $cust = count_cust();
                    ?>
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Khách hàng</h5>
                        <span class="h2 font-weight-bold mb-0">
                            <?php
                            echo $cust['countCust'];
                            ?>
                        </span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                            <i class="ni ni-circle-08"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">

                    <span class="text-nowrap"><a href="index.php?act=customer&list">Xem Chi Tiết</a></span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <?php
                    $prod = count_prod();
                    ?>
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Sản phẩm</h5>
                        <span class="h2 font-weight-bold mb-0">
                            <?php
                            echo $prod['countProd'];
                            ?>
                        </span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                            <i class="ni ni ni-bag-17"></i>

                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"><a href="index.php?act=product&list">Xem Chi Tiết</a></span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <?php
                    $income = income_bill();
                    ?>
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Thu nhập</h5>
                        <span class="h2 font-weight-bold mb-0">
                            <?php
                            echo number_format($income['sumBill']);
                            ?>
                            đ</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"><a href="index.php?act=manage-bill">Xem Chi Tiết</a></span>
                </p>
            </div>
        </div>
    </div>
</div>
<!--row-->
<div class="row">
    <!-- Card Body -->
    <div class="col-md-8">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thống Kê Danh Mục</h6>
            </div>
            <div class="card-body">
                <?php
                $row = category_select_all();
                foreach ($row as $value) {
                    extract($value);
                ?>
                    <h4 class="small font-weight-bold"><?php echo $catName ?> <span class="float-right">Sản Phẩm:
                            <?php
                            $quantity_prod = statistical_quantity_category($catId);
                            echo $quantity_prod['count'];
                            ?> </span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $quantity_prod['count']; ?>%" aria-valuenow="<?php echo $quantity_prod['count']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                <?php } ?>





                <!-- <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Biểu Đồ Chart:Danh mục</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <!-- <canvas id="myPieChart"></canvas> -->
                    <div id="piechart"></div>
                
                </div>
               
            </div>
        </div>
    </div>

</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
        ['Danh mục', 'số lượng sản phẩm'],

<?php
        $statistical = statistical_chart();
        $total_cat=count($statistical);
        $i = 1;
        foreach($statistical as $value) {
            extract($value);
            if($i==$total_cat){$dauphay=" ";}else{$dauphay=",";}
            echo "['".$value['catName']."', ".$value['countProduct']."]".$dauphay;
             $i+=1;   
        }
        ?>
]);
    
  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Thống kê sản phẩm theo danh mục ', 'width':350, 'height':250};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>