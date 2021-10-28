



<script>
     
    $(document).ready(function() {
    
        var i = 0;
        while (i < 6) {

            var bien = '#addClick' + i; //addclick1
            // var retu ='.addChild'+i;//addchild1
            $(bien).click(function() {

                var id = $(this).val();
                $.get("category/add_cat_child.php", {
                    catId: id
                }, function(data) {
                    $('#addChildCat').html(data);
                });

            });
            i++;

        }
// kiểm tra catName
        $('#catName').keyup(function(){
            var catName=$(this).val();
            $.get("model_ajax/checkName_cat.php",{catName:catName},function(data){
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



<div class="row">
    <div class="col-md-3">
        <form action="index.php?act=category" method="post">

            <h2>Thêm Danh Mục</h2>
            <div class="form-group" style="width:100%">
                <label for="">Tên Danh Mục</label>
                <input type="text" name="catName" id="catName" placeholder="Nhập tên danh mục">
                <span id="message_catName"></span>
            </div>

            <!-- submit -->
            <div class="form-group">
              
                        <button class="btn-submit" type="submit" id="addCat" name="addDanhMuc"  value="Thêm" >Thêm Danh Mục</button>
                  
                
                <span>
                    <?php
                    if (isset($cat_insert)) {
                        echo $cat_insert;
                    }
                    if (isset($cat_delete)) {
                        echo $cat_delete;
                    }
                    ?>

                </span>
            </div>

            <!--form-left-->

        </form>
    </div> <!-- form-->

    <div class="col-md-9">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Tất Cả Danh Mục</h3>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Loại hàng </th>
                                <th colspan="3">Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- code pap hiển thị danh sách loại hàng  -->
                            <?php
                            $i = 0;
                            $row = category_select_all();
                            foreach ($row as $value) {
                                extract($value);
                            ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo  $catName ?>
                                    </th>
                                    <td class="text-left">
                                        <!-- <div class="d-flex align-items-center">
                                            <span class="mr-2">2</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:60%"></div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <?php
                                        $row_catChild = categoryChild_catChild_all($value['catId']);
                                        foreach ($row_catChild as $value_child) {
                                        ?>
                                            <button class="btn"><?php echo $value_child['catChildName'] ?></button>
                                        <?php } ?>

                                    </td>
                                    <td><button class="btn  btn-primary" id="addClick<?php echo $i ?>" value="<?php echo $value['catId']  ?>">Thêm </button></td>
                                    <td><a href="index.php?act=category&id_edit=<?php echo $catId ?>"><button class="btn  btn-success">Sửa</button></a></td>
                                    <td> <a href="index.php?act=category&id_delete=<?php echo $catId ?>"><button class="btn  btn-danger">Xóa</button></a></td>
                                </tr>

                            <?php
                                $i++;
                            } ?>
                            <!-- end code php danh sách loại hàng -->
                        </tbody>
                        <div id="addChildCat">

                        </div>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>