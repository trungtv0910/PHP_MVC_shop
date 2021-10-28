<?php
include_once '../model/comment.php';
include_once '../model/product.php';
include_once '../model/customer.php';
$prodId=$_GET['prodId'];

$comment_product = comment_select_product_detail($prodId, 0);
foreach ($comment_product as $cmt) {

?>

    <div class="ps-review">
        <div class="ps-review__thumbnail">
            <?php
            if (empty($cmt['urlImage'])) {
                echo '<img width="50" src="admin/uploads/nonavatar2.jpg" alt="">';
            } else {
                echo '<img width="50" src="admin/uploads/' . $cmt['urlImage'] . '" alt="">';
            }
            ?>


        </div>
        <div class="ps-review__content">
            <header>
                <!-- star -->
                <select class="ps-rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="5">5</option>
                </select>
                <p>By<a href=""> <?php echo $cmt['name'] ?></a> - <?php echo $cmt['date'] ?></p>
            </header>
            <p><?php echo $cmt['content'] ?></p>
            <!-- bình luận con -->
            <?php



            $commId = $cmt['commId'];
            $comment_reply = comment_reply($commId, 5);
            foreach ($comment_reply as $cmt_reply) {

            ?>
                <div class="ps-review ps-review-child">
                    <div class="ps-review__thumbnail">
                        <?php
                        if (empty($cmt_reply['urlImage'])) {
                            echo '<img width="50" src="admin/uploads/nonavatar2.jpg" alt="">';
                        } else {
                            echo '<img width="50" src="admin/uploads/' . $cmt_reply['urlImage'] . '" alt="">';
                        }
                        ?>
                    </div>
                    <div class="ps-review__content">
                        <header>

                            <select class="ps-rating">
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                                <option value="1">4</option>
                                <option value="5">5</option>
                            </select>
                            <p>ADMIN:<a href=""> <?php echo $cmt_reply['name'] ?></a> <?php echo $cmt['date'] ?></p>
                        </header>
                        <p> <?php echo $cmt_reply['content'] ?></p>
                    </div>
                </div>
                <!-- end bình luận con -->
            <?php
            } ?>



        </div>
    </div>
<?php } ?>