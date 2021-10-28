<style>
    .float-left {
        float: left;
    }

    .reply {
        display: flex;
        gap: 0px;
        width: 960px;
    }

    .reply_img {
        width: 10%;
    }

    .reply_img img {
        margin-top: 10px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .reply_content {
        width: 90%;
        text-align: left;
        background-color: #f9f9f9;
        border-radius: 2%;
        padding: 10px;
        box-sizing: border-box;
    }

    .name {
        font-size: 16px;
        font-weight: bold;
    }

    .from a {
        font-size: 14px;
        font-weight: bold;
        display: inline-block;
    }

    .time {
        font-weight: inherit;
        color: gray;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .reply_content .comment {
        /* font-weight:inherit; */
        color: black
            /* font-size: 12px; */
    }

    .reply_child {
        width: 90%;
        display: flex;
        flex-direction: row;
        margin: 10px 0;
    }

    .reply_child .reply_content {
        background-color: white;
        border-radius: 0 2%;
    }
</style>


<?php
   $prodId=$id;
    if(isset($_POST['delete_comment'])){
        $commId= $_POST['commId'];
        $comment_delete = comment_delete($commId);
        // header('location:index.php?act=comment&id_show_cmt='.$id.'' );
        echo '<script>window.location="index.php?act=comment&id_show_cmt='.$id.'" </script>';
    }

?>



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
                         
                            // $row = comment_selectall();
                            $comment_product = comment_select_product_detail($prodId, 0);
                            $i = 0;
                            foreach ($comment_product as $value) {
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
                                                echo '<img width="50" src="uploads/' . $value['urlImage'] . '" alt="">';
                                            }
                                            ?>

                                        </div>
                                        <div class="reply_content">
                                            <span class="name"><?php echo $row_cust['name']; ?></span> From <span class="from"><a href="index.php?act=product&id_edit=<?php echo $row_prod['prodId'] ?>"><?php echo $row_prod['prodName']; ?> (View Post )</a></span>
                                            <p class="time">Lúc: <?php echo $value['date'] ?></p>
                                            <p class="comment"><?php echo $value['content'] ?></p>

                                            <?php

                                            $row_reply = comment_reply($commId,5);
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
                                    <form action="" method="post">
                                    <td>
                                        <input type="hidden" name="commId" value='<?php echo $value['commId']; ?>'>
                                        <button class="btn btn-danger" name="delete_comment">Xoá</button></td>
                                    </form>
                                  
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