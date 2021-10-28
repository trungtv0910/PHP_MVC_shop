<!-- thêm sản phẩm -->
<h2>Sửa Sản Phẩm </h2>
<span>
    <?php

    if (isset($product_update)) {
        echo $product_update;
    }
    ?>
</span>
<script>
    $(document).ready(function() {

    $('#catId').change(function() {
        var Id = $(this).val();
        $.get("model_ajax/catChild.php", {
            catId: Id
        }, function(data) {
            $('#catChild').html(data);
        })

    });
    // kiểm tra tên   $('#prodName').keyup(function() {
        $('#prodName').keyup(function() {
            var prodName = $(this).val();
            $.get("model_ajax/checkName_product.php", {
                prodName: prodName
            }, function(data) {
                if (data != 0) {
                    $('#message_prodName').html("Tên sản phẩm đã tồn tại");
                    $('#message_prodName').addClass('text-danger');
                    $('#message_prodName').removeClass('text-success');
                    $('#addProd').attr('disabled', 'disabled');
                    $('#addProd').addClass('btn-danger');

                } else {
                    $('#message_prodName').html("Tên sản phẩm hợp lệ");
                    $('#message_prodName').addClass('text-success');
                    $('#message_prodName').removeClass('text-danger');
                    $('#addProd').removeAttr("disabled");
                    $('#addProd').removeClass('btn-danger');

                }
            });
        });




    });
</script>
<div class="form">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-left">
            <div class="form-group">
                <label for="">Mã sản phẩm</label>
                <input type="hidden" name="prodId" value="<?php echo $row['prodId']; ?>">
                <input type="text"  disabled value="<?php echo $row['prodId']; ?>">
            </div>
            <div class="form-group">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" id="prodName" name="prodName" value="<?php echo $row['prodName']; ?>">
                <span id="message_prodName"></span>
            </div>

            <div class="form-group">
                <label for="">Danh Mục</label>

                <select name="catId" id="catId">
                    <?php
                    $row_cat = category_select_all();
                    foreach ($row_cat as $value) { ?>
                        <option <?php if ($value['catId'] == $row['catId']) {
                                    echo 'selected';
                                } ?> value="<?php echo $value['catId'] ?>"><?php echo $value['catName'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="catChild">Loại Sản Phẩm</label><br>
                <select name="catChildId" id="catChild">
                    <?php $res_childCat = categoryChild_catChild_all($row['catId']);
                    foreach ($res_childCat as $row_catChild) { ?>
                        <option <?php
                                echo $row_catChild['catChildId'] == $row['catChildId'] ? 'selected' : '';
                                ?> value="<?php echo $row_catChild['catChildId']; ?>"><?php echo $row_catChild['catChildName']; ?></option>

                    <?php   }  ?>




                </select>

            </div>


            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>">
            </div>
            <div class="form-group">
                <label for="">Giá bán</label>
                <input type="text" name="price" value="<?php echo $row['price']; ?>">
            </div>
            <div class="form-group">
                <label for="">Giảm Giá</label>


                <select name="discount" id="">
                    <option value="0">-----Chọn giảm giá------</option>
                    <?php
                    for ($i = 0.1; $i <= 1; $i = $i + 0.1) { ?>

                        <option <?php if ($i == $row['discount']) {
                                    echo 'selected';
                                } ?> value="<?php echo $i ?>">Giảm <?php echo $i * 100; ?> % </option>
                    <?php       }
                    ?>


                </select>
            </div>

            <div class="form-group">
                <label for="">Lượt Xem</label>
                <input type="number" name="view" value="<?php echo $row['view']; ?>">
            </div>
            <!-- submit -->
            <div class="form-group">
                <button class="btn-submit" type="submit" name="update" value="Sản Phẩm">Cập Nhật Sản Phẩm</button>
            </div>

        </div>
        <!--form-left-->
        <div class="form-right">

            <div class="form-group">
                <label for="">Loại</label>

                <select name="type">

                    <?php
                    if ($row['type'] == 0) {
                        echo ' <option value="0" selected>Thường</option>
               <option value="1" >Mới</option>
               <option value="2" >Bán Chạy</option>';
                    } else if ($row['type'] == 1) {
                        echo ' <option value="0" >Thường</option>
                    <option value="1" selected>Mới</option>
                    <option value="2" >Bán Chạy</option>';
                    } else {
                        echo ' <option value="0" >Thường</option>
                    <option value="1" >Mới</option>
                    <option value="2" selected>Bán Chạy</option>';
                    }

                    ?>



                </select>
            </div>
            <div class="form-group">
                <label for="">Ảnh sản phẩm</label>
                <img width="300" src="uploads/<?php echo $row['image']; ?>" alt="">
                <input type="file" name="image" value="<?php echo $row['image']; ?>">
            </div>

            <div class="form-group">
                <label for="">Mô tả sản phẩm</label>
                <textarea class="textarea" id="mytextarea" name="prodDesc"><?php echo $row['prodDesc']; ?>"</textarea>
            </div>
        </div>
        <!--form right-->


    </form>
</div> <!-- form-->