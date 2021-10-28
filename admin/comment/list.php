<style>
    .float-left {
        float: left;
    }

   
</style>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Quản Lý Bình luận</h3>
                    </div>
                    <div class="col text-right">
                        <!-- <a href="#!" class="btn btn-sm btn-primary">See all</a> -->
                        <span> <?php if (isset($comment_delete)) {
                                    echo $comment_delete;
                                } ?></span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <form action="" method="post">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col-md-1">STT</th>

                                <th scope="col-md-3">Nội dung</th>


                                <th colspan="2" scope="col">Tuỳ chọn</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $row = comment_selectall();
                            $i = 0;
                            foreach ($row as $value) {
                                $commId = $value['commId'];
                            ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>

                                    <td class="reply">
                                        <?php $row_cust = customer_select_by_id($value['custId']); ?>
                                        <?php $row_prod = product_select_by_id($value['prodId']); ?>
                                        <div class="reply_img">
                                            <?php
                                            if (empty($row_cust['urlImage'])) {
                                                echo '<img width="50" src="uploads/nonavatar2.jpg" alt="">';
                                            } else {
                                                echo '<img width="50" src="uploads/'.$row_cust['urlImage'].'" alt="">';
                                            }
                                            ?>

                                        </div>
                                        <div class="reply_content">
                                            <span class="name"><?php echo $row_cust['name']; ?></span> From <span class="from"><a href="index.php?act=product&id_edit=<?php echo $row_prod['prodId'] ?>"><?php echo $row_prod['prodName']; ?> (View Post )</a></span>
                                            <p class="time">Lúc: <?php echo $value['date'] ?></p>
                                            <p class="comment"><?php echo $value['content'] ?></p>

                                            <?php

                                            $row_reply = comment_reply($commId);
                                            foreach($row_reply as $value_reply){
                                            ?>
                                                <div class="reply_child">
                                                    <div class="reply_img">
                                                        <?php
                                                        if (empty($value_reply['urlImage'])) {
                                                            echo '<img width="50" src="uploads/nonavatar2.jpg" alt="">';
                                                        } else {
                                                            echo '<img width="50" src="uploads/' . $value_reply['urlImage'] . '" alt="">';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="reply_content">
                                                        <span class="name"><?php
                                                        if($value_reply['roles']==1){
                                                            echo '<b style="color:red"> '.$value_reply['name'].' </b>';
                                                        }else{
                                                            echo $value_reply['name'];    
                                                        }
                                                       
                                                         
                                                         ?></span> From <span class="from"><?php echo $value_reply['prodName']; ?> </span>
                                                        <p class="time">Lúc: <?php echo $value_reply['date'] ?></p>
                                                        <p class="comment"><?php echo $value_reply['content'] ?></p>
                                                    </div>

                                                </div>
                                            <?php } ?>

                                        </div>
                                    </td>


                                    <td><a class="btn btn-default" href="index.php?act=comment&id_reply=<?php echo $value['commId']; ?>">Trả lời</a></td>
                                    <td><a class="btn btn-danger" href="index.php?act=comment&id_delete=<?php echo $value['commId']; ?>">Xoá</a></td>
                                    <!-- <button class="btn btn_sua">Sửa</button> -->


                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>