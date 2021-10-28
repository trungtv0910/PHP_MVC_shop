<!-- thêm sản phẩm -->
<h2>Thêm Sản Phẩm mới</h2>
<span>
    <?php
    if (isset($product_insert)) {
        echo $product_insert;
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

        // kiểm tra tên sản phẩm đã tồn tại hay chưa?
        $('#prodName').keyup(function() {
            var prodName = $(this).val();
            if (prodName != "") {
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
            } else {
                $('#message_prodName').html("Tên sản phẩm Trống");
                $('#message_prodName').addClass('text-danger');
                $('#message_prodName').removeClass('text-success');
                $('#addProd').attr('disabled', 'disabled');
                $('#addProd').addClass('btn-danger');
            }
        });
        // kiểm tra id sản phẩm có tồn tại hay chưa ?
        $('#prodId').blur(function() {
            var prodId = $(this).val();
            $.get("model_ajax/checkId_product.php", {
                prodId: prodId
            }, function(data) {
                if (data != 0) {
                    $('#message_prodId').html("Mã đã tồn tại");
                    $('#message_prodId').addClass('text-danger');
                    $('#message_prodId').removeClass('text-success');
                    $('#addProd').attr('disabled', 'disabled');
                    $('#addProd').addClass('btn-danger');

                } else {
                    $('#message_prodId').html("Mã hợp lệ");
                    $('#message_prodId').addClass('text-success');
                    $('#message_prodId').removeClass('text-danger');
                    $('#addProd').removeAttr("disabled");
                    $('#addProd').removeClass('btn-danger');

                }
            });
        });

    });
</script>
<div class="form">
    <form action="index.php?act=product&add" method="post" enctype="multipart/form-data">
        <div class="form-left">
            <!-- <div class="form-group">
                <label for="">Mã sản phẩm</label>
                <input type="text" id="prodId" name="prodId">
                <i>Bạn có thể bỏ qua mục này nếu muốn mã sản phẩm được điền tự động</i>
                <span id="message_prodId"></span>
            </div> -->
            <div class="form-group">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" id="prodName" name="prodName">
                <span id="message_prodName"></span>
            </div>

            <div class="form-group">
                <label for="">Danh Mục</label>
                <br>
                <select name="catId" id="catId">
                    <option value="0">--------Chọn Danh Mục--------</option>
                    <?php
                    $row_cat = category_select_all();
                    foreach ($row_cat as $value) { ?>
                        <option value="<?php echo $value['catId'] ?>"><?php echo $value['catName'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="catChild">Loại Sản Phẩm</label><br>
                <select name="catChildId" id="catChild">
                    <option value="">--------Mời Chọn Loại Sản phẩm--------</option>

                </select>

            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="number" name="quantity">
            </div>
            <div class="form-group">
                <label for="">Giá bán</label>
                <input type="text" name="price">
            </div>
            <div class="form-group">
                <label for="">Giảm Giá</label>

                <select name="discount" id="">
                    <option value="0">-----Chọn giảm giá------</option>
                    <option value="0.1">Giảm 10%</option>
                    <option value="0.2">Giảm 20%</option>
                    <option value="0.3">Giảm 30%</option>
                    <option value="0.4">Giảm 40%</option>
                    <option value="0.5">Giảm 50%</option>
                    <option value="0.6">Giảm 60%</option>
                    <option value="0.7">Giảm 70%</option>
                    <option value="0.8">Giảm 80%</option>
                    <option value="0.9">Giảm 90%</option>

                </select>


            </div>
            <!-- submit -->
            <div class="form-group">
                <button class="btn-submit" type="submit" id="addProd" name="add" value="Đăng Sản Phẩm">Đăng Sản Phẩm</button>
            </div>
        </div>
        <!--form-left-->
        <div class="form-right">
            <div class="form-group">
                <label for="">Loại</label>
                <select name="type" id="">
                    <option value="0">Bình thường</option>
                    <option value="1">New</option>
                    <option value="2">Bán Chạy</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Ảnh sản phẩm</label>
                <input type="file" name="image">
            </div>

            <div class="form-group">
                <label for="">Mô tả sản phẩm</label>
                <!-- <textarea class="textarea" name="prodDesc"></textarea> -->
                <textarea class="area1" id="" style="width:100%;height:200px" name="prodDesc"></textarea>

            </div>
        </div>
        <!--form right-->
        mytextarea

    </form>
</div> <!-- form-->