<?php
$quantity_limit = 12;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    settype($page, 'int');
} else {
    $page = 1;
}
if(isset($_GET['catChildId'])){
    $cat_childId=$_GET['catChildId'];
}else{
    $cat_childId=0;
}

$from = ($page - 1) * $quantity_limit;
$select_prod_by_cat = product_select_by_cat($key, $catId, $quantity_limit, $cat_childId, $from);
$sum_prod = 0;


?>


<div class="ps-products-wrap pt-80 pb-80">
    <div class="ps-products" data-mh="product-listing">
        <div class="ps-product-action">
            <div class="ps-product__filter">
                <select class="ps-select selectpicker">
                    <option value="1">Shortby</option>
                    <option value="2">Tên Sản Phẩm</option>
                    <option value="3">Giá (Thấp đến Cao)</option>
                    <option value="3">Giá (Cao đến Thấp)</option>
                </select>
            </div>
            <div class="ps-pagination">
                <ul class="pagination">
                    
                    <?php
                    $total_prod     =   total_product_category($catId, $cat_childId);
                    $sum_prod       = $total_prod['total_prod_cat'];
                    $sum_page       = ceil($sum_prod / $quantity_limit);
                    for ($i = 1 ; $i <= $sum_page; $i++) {

                    ?>

                        <li class="<?php echo $page == $i ? "active" : " " ?>"><a href="index.php?act=category&catId=<?php echo $catId ?><?php if (isset($_GET['catChildId'])) {
                                                                                                                                        echo '&catChildId=' . $cat_childId;
                                                                                                                                    } ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php } ?>
                  
                </ul>
            </div>
        </div>
        <div class="ps-product__columns">

            <?php
            foreach ($select_prod_by_cat as $value) {
                $img_extension = $value['image'];
                $image         = $img_global . $img_extension;

            ?>

                <div class="ps-product__column">
                    <div class="ps-shoe mb-30">
                        <div class="ps-shoe__thumbnail">

                            <?php
                            if ($value['type'] == 1) { ?>
                                <div class="ps-badge">
                                    <span> Mới </span>
                                </div>
                            <?php
                            } else if ($value['type'] == 2) { ?>
                                <div class="ps-badge">
                                    <span> Best </span>
                                </div>
                            <?php }
                            ?>
                            <?php if (!empty($value['discount'])) { ?>

                                <div class="ps-badge ps-badge--sale ps-badge--2nd">
                                    <?php
                                    echo '<span>' . $value['discount'] * 100 . '%</span>';
                                    ?>
                                </div>

                            <?php } ?>
                            <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="<?php echo $image; ?>" alt=""><a class="ps-shoe__overlay" href="index.php?act=product_detail&prodId=<?php echo $value['prodId'] ?>"></a>
                        </div>
                        <div class="ps-shoe__content">
                            <div class="ps-shoe__variants">
                                <div class="ps-shoe__variant normal"><img src="admin/uploads/<?php echo $value['image'] ?>" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/3.jpg" alt=""></div>
                                <select class="ps-rating ps-shoe__rating">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select>
                            </div>
                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="index.php?act=product_detail&prodId=<?php echo $value['prodId'] ?>"><?php echo $value['prodName'] ?></a>
                            <?php
                                $cat_prod=category_select_by_id($value['catId']);
                                ?>
                                    <p class="ps-shoe__categories"><a href="index.php?act=category&catId=<?php echo $value['catId'] ?>"><?php echo $cat_prod['catName']; ?></a></p>
                                <span class="ps-shoe__price">
                                    <del><?php echo number_format($value['price']); ?></del>
                                    <?php echo number_format(($value['price'] - $value['price'] * $value['discount'])) . 'đ' ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class="ps-product-action">
            <div class="ps-product__filter">
                <select class="ps-select selectpicker">
                    <option value="1">Shortby</option>
                    <option value="2">Name</option>
                    <option value="3">Price (Low to High)</option>
                    <option value="3">Price (High to Low)</option>
                </select>
            </div>
            <div class="ps-pagination">
                <ul class="pagination">
                 
                    <?php
                    $total_prod =   total_product_category($catId, $cat_childId);
                    $sum_prod   = $total_prod['total_prod_cat'];
                    $sum_page   = ceil($sum_prod / $quantity_limit);
                    for ($i = 1; $i <= $sum_page; $i++) {

                    ?>

                        <li class="<?php echo $page == $i ? "active" : " " ?>"><a href="index.php?act=category&catId=<?php echo $catId ?><?php if (isset($_GET['catChildId'])) {
                                                                                                                                        echo '&catChildId=' . $cat_childId;
                                                                                                                                    } ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php } ?>
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="ps-sidebar" data-mh="product-listing">
        <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
                <h3>Danh Mục</h3>
            </div>
            <div class="ps-widget__content">
                <ul class="ps-list--checked">
                    <li class="current"><a href="product-listing.html">Nam</a></li>
                    <li><a href="product-listing.html">Nữ</a></li>
                    <li><a href="product-listing.html">Trẻ Em</a></li>
                    <li><a href="product-listing.html">Dụng Cụ</a></li>
                    <li><a href="product-listing.html">Máy Tập thể Hình</a></li>
                    <li><a href="product-listing.html">Xem Thêm</a></li>
                </ul>
            </div>
        </aside>
        <aside class="ps-widget--sidebar ps-widget--filter">
            <div class="ps-widget__header">
                <h3>Khoảng Giá</h3>
            </div>
            <div class="ps-widget__content">
                <div class="ac-slider" data-default-min="300" data-default-max="2000" data-max="3450" data-step="50" data-unit="$"></div>
                <p class="ac-slider__meta">Price:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span></p><a class="ac-slider__filter ps-btn" href="#">Filter</a>
            </div>
        </aside>
        <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
                <h3>Nhãn Hàng</h3>
            </div>
            <div class="ps-widget__content">
                <ul class="ps-list--checked">
                    <li class="current"><a href="product-listing.html">Nike(521)</a></li>
                    <li><a href="product-listing.html">Adidas(76)</a></li>
                    <li><a href="product-listing.html">Baseball(69)</a></li>
                    <li><a href="product-listing.html">Gucci(36)</a></li>
                    <li><a href="product-listing.html">Dior(108)</a></li>
                    <li><a href="product-listing.html">B&G(108)</a></li>
                    <li><a href="product-listing.html">Louis Vuiton(47)</a></li>
                </ul>
            </div>
        </aside>
        <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
                <h3>Width</h3>
            </div>
            <div class="ps-widget__content">
                <ul class="ps-list--checked">
                    <li class="current"><a href="product-listing.html">Narrow</a></li>
                    <li><a href="product-listing.html">Regular</a></li>
                    <li><a href="product-listing.html">Wide</a></li>
                    <li><a href="product-listing.html">Extra Wide</a></li>
                </ul>
            </div>
        </aside>
        <div class="ps-sticky desktop">
            <aside class="ps-widget--sidebar">
                <div class="ps-widget__header">
                    <h3>Size</h3>
                </div>
                <div class="ps-widget__content">
                    <table class="table ps-table--size">
                        <tbody>
                            <tr>
                                <td class="active">3</td>
                                <td>5.5</td>
                                <td>8</td>
                                <td>10.5</td>
                                <td>13</td>
                            </tr>
                            <tr>
                                <td>3.5</td>
                                <td>6</td>
                                <td>8.5</td>
                                <td>11</td>
                                <td>13.5</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>6.5</td>
                                <td>9</td>
                                <td>11.5</td>
                                <td>14</td>
                            </tr>
                            <tr>
                                <td>4.5</td>
                                <td>7</td>
                                <td>9.5</td>
                                <td>12</td>
                                <td>14.5</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>7.5</td>
                                <td>10</td>
                                <td>12.5</td>
                                <td>15</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </aside>
            <aside class="ps-widget--sidebar">
                <div class="ps-widget__header">
                    <h3>Color</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--color">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </div>
            </aside>
        </div>

    </div>
</div>