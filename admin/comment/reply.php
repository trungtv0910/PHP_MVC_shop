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

    .reply_content .name {
        font-size: 16px;
        font-weight: bold;
    }

    .reply_content .from a {
        font-size: 14px;
        font-weight: bold;
        display: inline-block;
    }

    .reply_content .time {
        font-weight: inherit;
        color: gray;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .reply_content .comment {
        /* font-weight:inherit; */
        color: red;
        /* font-size: 12px; */
    }
</style>
<?php
$value = comment_select_by_id($id);
?>

<?php
if (isset($_POST['reply'])) {
    $comment_insert = comment_insert($_POST, $_FILES);
    
    // echo '<script>window.location="index.php?act=comment&list"</script>';
}


?>
<div class="row">

    <form action="" method="post">
        <div class="reply">
            <?php
            $row_cust = customer_select_by_id($value['custId']);
            ?>
            <?php $row_prod = product_select_by_id($value['prodId']); ?>

            <div class="reply_img">
                <?php
                if (empty($value['urlImage'])) {
                    echo '<img width="50" src="uploads/nonavatar2.jpg" alt="">';
                } else {
                    echo '<img width="50" src="uploads/' . $value['urlImage'] . '" alt="">';
                }
                ?>

            </div>
            <div class="reply_content">
                <input type="hidden" name="custId" value="<?php if(isset($_SESSION['login'])==true){echo $_SESSION['custId'];} ?>">
                <input type="hidden" name="prodId" value="<?php echo $value['prodId']; ?>">
                <input type="hidden" name="commId" value="<?php echo $id; ?>">
                <span class="name"><?php echo $row_cust['name']; ?></span> From <span class="from"><a href="index.php?act=product&id_edit=<?php echo $row_prod['prodId'] ?>"><?php echo $row_prod['prodName']; ?> (View Post )</a></span>
                <p class="time">Lúc: <?php echo $value['date'] ?></p>
                <p class="comment"><?php echo $value['content'] ?></p>
                <label for="">Trả lời:</label>

                <textarea name="content"     id="mytextarea" cols="30" rows="10"></textarea>
                <input type="submit" class="btn btn-success" value="Trả lời" name="reply">
                <span>
                    <?php
                    if (isset($comment_insert)) {
                        echo $comment_insert;
                    }
                    ?>

                </span>
            </div>
        </div>
    </form>

</div>