<?php
$prodId;

$row_product = product_cat_select_by_id($prodId);

$catId = $row_product['catId'];
$price = $row_product['price'];
$discount = $row_product['discount'];
$price_discount = $price * (1 - $discount);
?>
<!-- function tăng view mỗi lần xem sản phẩm chi tiết -->
<?php
if (isset($prodId) && $prodId != "") {
  product_up_view($prodId);
}

?>


<?php
if (isset($_POST['comment'])) {
  $res_comment = comment_insert($_POST, $_FILES, 0);
}


?>

<script>
  $(document).ready(function() {
    // hiển thị bình luận
    $.get("view/comment_show.php", {
      prodId: <?= $prodId ?>
    }, function(data) {
      $('#comment_show').html(data);
    });
    // comment
    $("#submit_comment").click(function() {
      var custId = $('#custId').val();
      var content = $('#comm_content').val();
      $.get("view/comment_insert.php", {
        prodId: <?= $prodId ?>,
        custId: custId,
        content: content
      }, function(data) {

        // hiển thị bình luận
        $.get("view/comment_show.php", {
          prodId: <?= $prodId ?>
        }, function(data) {
          $('#comment_show').html(data);
        });
      })
    });


  });
</script>




<div class="test">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
      </div>
    </div>
  </div>
</div>
<div class="ps-product--detail pt-60">
  <div class="ps-container">
    <div class="row">
      <div class="col-lg-10 col-md-12 col-lg-offset-1">
        <div class="ps-product__thumbnail">
          <div class="ps-product__preview">
            <div class="ps-product__variants">
              <div class="item"><img src="admin/uploads/<?php echo $row_product['image']; ?>" alt=""></div>
              <!-- <div class="item"><img src="images/shoe-detail/2.jpg" alt=""></div>
                    <div class="item"><img src="images/shoe-detail/3.jpg" alt=""></div>
                    <div class="item"><img src="images/shoe-detail/3.jpg" alt=""></div>
                    <div class="item"><img src="images/shoe-detail/3.jpg" alt=""></div> -->
            </div><a class="popup-youtube ps-product__video" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><img src="images/shoe-detail/1.jpg" alt=""><i class="fa fa-play"></i></a>
          </div>
          <div class="ps-product__image">
            <div class="item"><img class="zoom" src="admin/uploads/<?php echo $row_product['image']; ?>" alt="" data-zoom-image="admin/uploads/<?php echo $row_product['image']; ?>"></div>
            <!-- <div class="item"><img class="zoom" src="images/shoe-detail/2.jpg" alt="" data-zoom-image="images/shoe-detail/2.jpg"></div>
                  <div class="item"><img class="zoom" src="images/shoe-detail/3.jpg" alt="" data-zoom-image="images/shoe-detail/3.jpg"></div> -->
          </div>
        </div>
        <div class="ps-product__thumbnail--mobile">
          <div class="ps-product__main-img"><img src="images/shoe-detail/1.jpg" alt=""></div>
          <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on"><img src="images/shoe-detail/1.jpg" alt=""><img src="images/shoe-detail/2.jpg" alt=""><img src="images/shoe-detail/3.jpg" alt=""></div>
        </div>
        <div class="ps-product__info">
          <div class="ps-product__rating">
            <select class="ps-rating">
              <option value="1">1</option>
              <option value="1">2</option>
              <option value="1">3</option>
              <option value="1">4</option>
              <option value="2">5</option>
            </select><a href="#">(Mời bạn đánh giá)</a>
          </div>
          <h1><?php echo $row_product['prodName'] ?></h1>
          <p class="ps-product__category"><a href="#"> <?php echo $row_product['catName'] ?></a></p>
          <h3 class="ps-product__price"><?php echo number_format($price_discount) ?> VNĐ <del><?php echo $row_product['price'] ?></del></h3>
          <div class="ps-product__block ps-product__quickview">
            <h4>Đánh Giá Nhanh</h4>
            <p><?php echo $row_product['prodDesc'] ?></p>
          </div>
          <form action="index.php?act=addcart" method="post">
            <input type="hidden" name="prodId" value="<?php echo $row_product['prodId'] ?>">
            <div class="ps-product__block ps-product__style">
              <h4>Lựa chọn màu sắc</h4>
              <ul>
                <li><a href="product-detail.html"><img src="images/shoe/sidebar/1.jpg" alt=""></a></li>
                <li><a href="product-detail.html"><img src="images/shoe/sidebar/2.jpg" alt=""></a></li>
                <li><a href="product-detail.html"><img src="images/shoe/sidebar/3.jpg" alt=""></a></li>
                <li><a href="product-detail.html"><img src="images/shoe/sidebar/2.jpg" alt=""></a></li>
              </ul>
            </div>
            <div class="ps-product__block ps-product__size">
              <h4>Chọn size<a href="#">Đặt riêng</a></h4>
              <select class="ps-select selectpicker">
                <option value="1">Chọn size</option>
                <option value="2">4</option>
                <option value="3">4.5</option>
                <option value="3">5</option>
                <option value="3">6</option>
                <option value="3">6.5</option>
                <option value="3">7</option>
                <option value="3">7.5</option>
                <option value="3">8</option>
                <option value="3">8.5</option>
                <option value="3">9</option>
                <option value="3">9.5</option>
                <option value="3">10</option>
              </select>
              <div class="form-group">
                <input class="form-control" name="quantity" type="number" value="1">
              </div>
            </div>
            <div class="ps-product__shopping"><button class="ps-btn mb-10" type="submit" name="addcart">Thêm vào giỏ hàng<i class="ps-icon-next"></i></button>
              <div class="ps-product__actions"><a class="mr-10" href="whishlist.html"><i class="ps-icon-heart"></i></a><a href="compare.html"><i class="ps-icon-share"></i></a></div>
            </div>
          </form>
        </div>
        <div class="clearfix"></div>
        <div class="ps-product__content mt-50">
          <ul class="tab-list" role="tablist">
            <?php
            $count_cmt = comment_count($prodId);

            ?>
            <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Tổng Quan </a></li>
            <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Đáng Giá<sup class="sup-comment"><?php echo $count_cmt['count']; ?></sup></a></li>
            <li><a href="#tab_03" aria-controls="tab_03" role="tab" data-toggle="tab">TAG Sản Phẩm</a></li>
            <li><a href="#tab_04" aria-controls="tab_04" role="tab" data-toggle="tab">Gửi Phản hồi</a></li>
          </ul>
        </div>
        <div class="tab-content mb-60">
          <div class="tab-pane active" role="tabpanel" id="tab_01">
            <p>
              <?php echo $row_product['prodDesc'] ?>
            </p>
          </div>
          <!-- phần bình luận -->


          <div class="tab-pane" role="tabpanel" id="tab_02">
            <p class="mb-20"><?php echo $count_cmt['count']; ?> Bình luận cho <strong><?php echo $row_product['prodName'] ?></strong></p>
            <div id="comment_show"></div>
            <!-- form bình luận -->





            <!-- kiểm tra người dùng đã đăng nhập hay chưa, nếu chưa đăng nhập thì form chỉ là gửi mail bình luận
còn néu đã đăng nhập rồi thì cho phép người dùng bình luận -->
            <?php
            if (isset($_SESSION['login']) == false) {
            ?>
              <!-- với không đăng nhập -->
              <form class="ps-product__review" action="./view-other/login.php" method="post">
                <p>Bạn nên <a href="view-other/login.php"><b>Đăng Nhập</b></a> để được hổ trợ một cách nhanh chóng</p>
                <h4>Thêm bình luận của Bạn</h4>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <div class="form-group">
                      <label>Name:<span>*</span></label>
                      <input class="form-control" type="text" placeholder="">
                    </div>
                    <div class="form-group">
                      <label>Email:<span>*</span></label>
                      <input class="form-control" type="email" placeholder="">
                    </div>
                    <div class="form-group">
                      <label>Đánh giá của Bạn<span></span></label>
                      <select class="ps-rating">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                    <div class="form-group">
                      <label>Bình Luận:</label>
                      <textarea class="form-control" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                      <button class="ps-btn ps-btn--sm">Submit<i class="ps-icon-next"></i></button>

                    </div>
                  </div>
                </div>
              </form>
            <?php } else { ?>
              <!-- với trường hợp đã đănh nhập -->
              <!-- form bình luận -->
              <div class="ps-product__review">
                <h4>Thêm Đánh Giá</h4>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <!-- các trường ẩn -->
                    <input type="hidden" id="custId" name="custId" value="<?php echo $_SESSION['custId'] ?>">
                    <input type="hidden" id="prodId" name="prodId" value="<?php echo $prodId ?>">
                    <input type="hidden" name="commId" value="Null">


                    <div class="form-group">
                      <label>Your rating<span></span></label>
                      <select class="ps-rating" name="rating">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                    <div class="form-group">
                      <label>Bình luận của bạn:</label>
                      <textarea class="form-control" id="comm_content" name="content" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                      <button type='submit' name="comment" id="submit_comment" class="ps-btn ps-btn--sm">Gửi<i class="ps-icon-next"></i></button>
                      <span>
                        <?php
                        if (isset($res_comment)) {
                          echo $res_comment;
                        }

                        ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- bình luaanj -->
            <?php } ?>
          </div>
          <!-- kết thức bình luận -->
          <div class="tab-pane" role="tabpanel" id="tab_03">
            <p>Add your tag <span> *</span></p>
            <form class="ps-product__tags" action="_action" method="post">
              <div class="form-group">
                <input class="form-control" type="text" placeholder="">
                <button class="ps-btn ps-btn--sm">Add Tags</button>
              </div>
            </form>
          </div>
          <div class="tab-pane" role="tabpanel" id="tab_04">
            <div class="form-group">
              <textarea class="form-control" rows="6" placeholder="Enter your addition here..."></textarea>
            </div>
            <div class="form-group">
              <button class="ps-btn" type="button">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="ps-section ps-section--top-sales ps-owl-root ">
  <div class="ps-container">
    <div class="ps-section__header ">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
          <h3 class="ps-title">Các sản phẩm Liên Quan</h3>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
          <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
        </div>
      </div>
    </div>
    <div class="ps-section__content">
      <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">




        <?php

        $limit = 4;
        $product_thesame_cat = product_select_thesame_cat($prodId, $catId, $limit);
        foreach ($product_thesame_cat as $value) {
        ?>

          <div class="ps-shoes--carousel">
            <div class="ps-shoe">
              <div class="ps-shoe__thumbnail">
                <div class="ps-badge"><span>New</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="admin/uploads/<?php echo $value['image'] ?>" alt=""><a class="ps-shoe__overlay" href="index.php?act=product_detail&prodId=<?php echo $value['prodId'] ?>"></a>
              </div>
              <div class="ps-shoe__content">
                <div class="ps-shoe__variants">
                  <div class="ps-shoe__variant normal"><img src="admin/uploads/<?php echo $value['image'] ?>" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/3.jpg" alt="">
                  </div>
                  <select class="ps-rating ps-shoe__rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select>
                </div>
                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="index.php?act=product_detail&prodId=<?php echo $value['prodId'] ?>"><?php echo $value['prodName'] ?> </a>
                  <?php
                  $cat_prod = category_select_by_id($value['catId']);
                  ?>
                  <p class="ps-shoe__categories"><a href="index.php?act=category&catId=<?php echo $value['catId'] ?>"><?php echo $cat_prod['catName']; ?></a></p>
                  <span class="ps-shoe__price">
                    <del><?php echo $value['price'] ?></del> <?php echo ($value['price'] - $value['price'] * $value['discount']) ?></span>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>





      </div>
    </div>
  </div>
</div>