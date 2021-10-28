<?php

if (!isset($_SESSION['mycart'])) {
    $alert = 'chưa mưa hàng';
} else {
    $alert = 'đã có hàng trong giỏ';
    $array_cart = $_SESSION['mycart'];
}
// echo '<pre>';
// print_r($array_cart);
// echo '</pre>';

?>
<div class="ps-blog-grid pt-80 pb-80">

    <div class="ps-container">
        <div class="row">
            <?php

            if (empty($_SESSION['mycart'])) { ?>


                <div class="col-md-12" style="text-align:center">
                    <img class="mx-auto" src="images/cart-preview/emptycart.png" alt="">
                    <p>Không có sản phẩm nào trong giỏ hàng của bạn.</p>
                </div>


            <?php  } else { ?>
                <form action="index.php?act=cart&pay" method="post">
                    <!-- div nội dung chính -->
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                        <!--  -->
                        <div class="ps-content pt-80 pb-80">




                            <div class="ps-cart-listing">
                                <table class="table ps-cart__table">
                                    <thead>
                                        <tr>
                                            <th>All Products</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total_all_price = 0;
                                        foreach ($array_cart as $key => $value) {
                                            $total = 0;
                                            $urlImage = $img_global . $value['image'];
                                        ?>
                                            <tr>
                                                <td><a class="ps-product__preview" href="product-detail.html">
                                                        <img width="100" class="mr-15" src="<?php echo $urlImage; ?>" alt="">
                                                        <?php echo $value['prodName']; ?>
                                                    </a></td>
                                                <td><?php echo number_format($value['price']) ?> </td>
                                                <td>
                                                    <div class="form-group--number">
                                                        <button class="minus"><span>-</span></button>
                                                        <input class="form-control" type="text" value="<?php echo $value['quantity'];
                                                                                                        $total += $value['price'] * $value['quantity']; ?>">
                                                        <button class="plus"><span>+</span></button>
                                                    </div>
                                                </td>
                                                <td><?php echo number_format($total);
                                                    $total_all_price += $total;  ?></td>
                                                <td>
                                                    <a onclick="return confirm('Bạn muốn xóa sản phẩm này khỏi giỏ hàng ?')" href="index.php?act=cart&id_delete=<?php echo $key; ?>" class="ps-remove"></a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                                <div class="ps-cart__actions">
                                    <div class="ps-cart__promotion">
                                        <div class="form-group">
                                            <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                                                <input class="form-control" type="text" placeholder="Promo Code">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="ps-btn ps-btn--gray" href="index.php">Tiếp tục mua hàng</button>
                                        </div>
                                    </div>
                                    <div class="ps-cart__total">
                                        <h3>Thành Tiền: <span> <?php echo number_format($total_all_price) . ' VNĐ' ?></span></h3>
                                        <input type="hidden" name="total" value=<?php echo $total_all_price ?>>

                                        <button class="ps-btn" type="submit" name="pay">Thanh Toán<i class="ps-icon-next"></i></button>
                                    </div>
                                </div>
                            </div>




                        </div>
                        <!-- end nọi dung chinhs -->
                    </div>
                    <!-- sider bar -->
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__order">
                            <header>
                                <h3>Thông tin giao hàng</h3>
                            </header>
                            <div class="content">
                                <table class="table ps-checkout__products color-while">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase">Thông Tin</th>
                                            <th class="text-uppercase">
                                                <a style=" float:right ;border-radius:50px; background:white; padding:5px ;color:black; font-size:12px" href="index.php?act=about-account">Sửa đổi</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $custId = $_SESSION['custId'];
                                        $get_cust = customer_select_by_id($custId);

                                        ?>
                                        <input type="hidden" name="custId" value=<?php echo $custId ?>>

                                        <tr>
                                            <td>Tên</td>
                                            <td><?php echo $get_cust['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td><?php echo $get_cust['phone'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $get_cust['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td><?php echo $get_cust['address'] ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <footer>
                                <h3>Phương thức thanh toán</h3>
                                <div class="form-group cheque">
                                    <div class="ps-radio">
                                        <input class="form-control" type="radio" name="payment_methods" id="rdo01" value="Thanh Toán khi nhận hàng" checked>
                                        <label for="rdo01">Thanh Toán Khi Nhận Hàng</label>
                                        <p>Sau khi nhận được hàng từ shipper quý khách được kiểm tra hàng, rồi mới thanh toán.</p>
                                    </div>
                                </div>
                                <div class="form-group paypal">
                                    <div class="ps-radio ps-radio--inline">
                                        <input class="form-control" type="radio" name="payment_methods" id="rdo02" value="Thanh Toán Bằng ATM">
                                        <label for="rdo02">Thanh Toán Bằng ATM Nội Địa</label>
                                    </div>
                                    <ul class="ps-payment-method">
                                        <li><a href="#"><img src="images/payment/The-Visa-debit-ACB.png" alt=""></a></li>
                                        <li><a href="#"><img src="images/payment/1.jpg" alt=""></a></li>
                                        <li><a href="#"><img src="images/payment/viettin.png" alt=""></a></li>
                                    </ul>


                                </div>
                                <div class="form-group paypal">
                                    <div class="ps-radio ps-radio--inline">
                                        <input class="form-control" type="radio" name="payment_methods" id="rdo03" value="Thanh Toán Bằng Paypal">
                                        <label for="rdo03">Thanh Toán Bằng Paypal</label>
                                    </div>
                                    <ul class="ps-payment-method">
                                        <li><a href="#"><img src="images/payment/1.png" alt=""></a></li>
                                        <li><a href="#"><img src="images/payment/2.png" alt=""></a></li>
                                        <li><a href="#"><img src="images/payment/3.png" alt=""></a></li>
                                    </ul>

                                    <button class="ps-btn ps-btn--fullwidth">Place Order<i class="ps-icon-next"></i></button>
                                </div>
                            </footer>
                        </div>
                        <div class="ps-shipping">
                            <h3>FREE SHIPPING</h3>
                            <p>YOUR ORDER QUALIFIES FOR FREE SHIPPING.<br> <a href="#"> Singup </a> for free shipping on every order, every time.</p>
                        </div>
                    </div>
                </form>
            <?php }
            ?>
        </div>

    </div>
</div>
</div>