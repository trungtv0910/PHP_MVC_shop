<?php

extract($row);
?>
<script>
    $(document).ready(function() {
        $('#catName').keyup(function() {
            var catName = $(this).val();
            $.get("model_ajax/checkName_cat.php", {
                catName: catName
            }, function(data) {
                if (data != 0) {
                    $('#message_catName').html("Tên danh mục đã tồn tại");
                    $('#message_catName').addClass('text-danger');
                    $('#message_catName').removeClass('text-success');
                    $('#addCat').attr('disabled', 'disabled');
                    $('#addCat').addClass('btn-danger');

                } else {
                    $('#message_catName').html("Tên danh mục hợp lệ");
                    $('#message_catName').addClass('text-success');
                    $('#message_catName').removeClass('text-danger');
                    $('#addCat').removeAttr("disabled");
                    $('#addCat').removeClass('btn-danger');

                }
            });
        });
    });
</script>
<!-- Sửa Danh mục -->
<h2>Sửa Danh Mục</h2>
<div class="form">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-left">

            <input type="hidden" name="ma_loai" value="<?php echo $catId ?>" />
            <div class="form-group">
                <label for="">Tên Danh Mục</label>
                <input type="text" id="catName" name="ten_loai" value="<?php echo $catName ?>">
                <span>
                    <?php if (isset($result)) {
                        echo $result;
                    } ?>
                </span>
                <div id="message_catName"></div>
            </div>
            <div class="form-group">

                <button class="btn-submit" type="submit" name="update" value="Sửa">Cập nhật</button>
            </div>
        </div>
    </form>
</div> <!-- form-->