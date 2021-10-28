

<?php
if (isset($_GET['catId'])) {
    $id = $_GET['catId'];
?>
    <form action="index.php?act=category_child" method="post">
        <label for="">Nhập Loại Hàng</label>
        <input type="text" value="" name="catChildName" placeholder="Loại hàng">
        <input type="hidden" name="catId" value="<?php echo $id ?>">
        <input type="submit" id="submit" name="submit" value="Thêm">
        <span id="alert"></span>
    </form>
<?php } ?>