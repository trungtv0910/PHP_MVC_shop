<div class="container">
<div class="row">
    <div class="col-md-12">
    <h1>Biểu Đồ Thống Kê Sản Phẩm Theo Danh Mục</h1>

<div id="piechart"></div>

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
  var options = {'title':'Thống kê sản phẩm theo danh mục ', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>