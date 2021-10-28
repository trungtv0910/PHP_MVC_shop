<?php
include_once '../../model/pdo.php';
include_once '../../model/category.php';

?>
<?php
if (isset($_GET['catId'])) {
?>
    <?php
    $id = $_GET['catId'];
    $row_catChild =  categoryChild_select_by_id($id);
    foreach ($row_catChild as $value) { ?>
        <option value="<?php echo $value['catChildId'] ?>"><?php echo $value['catChildName'] ?></option>
    <?php } ?>


<?php } ?>



<?php
if (isset($_GET['catId_edit'])) {
?>
    <?php
    $id = $_GET['catId_edit'];
    $row_catChild =  categoryChild_select_by_id($id);
    foreach ($row_catChild as $value) { ?>
        <option value="<?php echo $value['catChildId'] ?>"><?php echo $value['catChildName'] ?></option>
    <?php } ?>


<?php }
?>

<!-- code php kiểm tra tên danh mục đã tồn tại hay chưa? -->
