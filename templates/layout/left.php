<div class="sub_left">
    <div class="title_left"><i class="fas fa-bars"></i><span><?= _danhmucsanpham ?></span></div>
    <div class="content_left">
        <ul class="left-ul">
            <?php foreach ($list as $item_list) : ?>
                <li>
                    <?php
                        $d->reset();
                        $d->query("select ten_$lang as ten,id,tenkhongdau,photo from #_product_cat where  id_list={$item_list['id']} and hienthi=1 order by stt,id desc");
                        $product_cat = $d->result_array();
                        ?>
                    <a href="<?= $item_list['tenkhongdau'] ?>">
                        <?= $item_list['ten'] ?>
                        <?php if ($product_cat) : ?>
                            <i class="fas fa-caret-down"></i>
                        <?php endif; ?>
                    </a>
                    <?php if ($product_cat) : ?>
                        <ul>
                            <?php foreach ($product_cat as $item_cat) : ?>
                                <li>
                                    <a href="<?= $item_cat['tenkhongdau'] ?>"><?= $item_cat['ten'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>


<div class="sub_left">
    <div class="title_left"><i class="fas fa-bars"></i><span>Sản phẩm bán chạy</span></div>
    <div class="content_left">
        <div class="product-banchay-scroll">
            <?php foreach ($product_banchay as $item) : ?>
                <div class="product-item">
                    <a href="<?= $item['tenkhongdau'] ?>" class="product-item-img hover-img">
                        <img onerror="noImg(this, 275, 200)" src="<?= _upload_product_l . $item['thumb'] ?>" alt="<?= $item['ten_' . $lang] ?>">
                    </a>
                    <a href="<?= $item['tenkhongdau'] ?>" class="product-item-ten"><?= $item['ten_' . $lang] ?></a>
                    <div class="product-item-price">
                        Giá: <span class="price-now"><?= $item['giaban'] == 0 ? "Liên hệ" : number_format($item['giaban'], 0, ',', '.') . 'đ' ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php /* ?>
<div class="sub_left">
    <div class="owl-carousel quangcao-owl">
        <?php foreach ($quangcao as $item) : ?>
            <a href="<?= $item['link'] ?>"><img src="<?= _upload_hinhanh_l . $item['thumb'] ?>" alt="<?= $item['ten'] ?>"></a>
        <?php endforeach; ?>
    </div>
</div>

<?php */ ?>
