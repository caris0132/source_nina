<?php
error_reporting(0);
include("../ajax/ajax_config.php");
include_once "class_paging_ajax.php";
if (isset($_POST["page"])) {
    $paging = new paging_ajax();

    $paging->class_pagination = "pagination";
    $paging->class_active = "active";
    $paging->class_inactive = "inactive";
    $paging->class_go_button = "go_button";
    $paging->class_text_total = "total";
    $paging->class_txt_goto = "txt_go_button";
    $paging->per_page = 8;
    $paging->page = $_POST["page"];

    if ($_POST['id_cat']) {
        $where = " hienthi=1 and noibat=1 and id_cat={$_POST['id_cat']} ";
    } else {
        $where = " hienthi=1 and noibat=1 and type='product' ";
    }
    $paging->text_sql = "select id,ten_$lang , tenkhongdau,photo,thumb,giacu,giaban,masp,mota_$lang from table_product where $where order by stt asc, id desc";
    $product = $paging->GetResult();
    $message = '';
    $paging->data = "" . $message . "";
}
?>
<div class="product-list-grid">
    <?php foreach ($product as $item) : ?>
        <div class="product-item">
            <a href="<?= $item['tenkhongdau'] ?>" class="hover-img">
                <img onerror="noImg(this, 220, 245)" src="<?= _upload_product_l . $item['thumb'] ?>" alt="<?= $item['ten_' . $lang] ?>">
            </a>
            <a href="<?= $item['tenkhongdau'] ?>" class="product-item-ten"><?= $item['ten_' . $lang] ?></a>
            <div class="product-item-price">
                <span class="price-now"><?= $item['giaban'] == 0 ? "Liên hệ" : number_format($item['giaban'], 0, ',', '.') . 'đ' ?></span>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="clear">

</div>
<?php // $paging->Load(); ?>
