<ul class="product-list-menu">
    <?php foreach ($product_list_noibat as $key_list => $item_list) : ?>
        <li class="<?= $key_list == 0 ? 'active' : '' ?>"><a data-toggle="tab" href="#product_list_<?= $key_list ?>"><?= $item_list['ten'] ?></a></li>
    <?php endforeach; ?>
</ul>
<div class="tab-content">
    <?php foreach ($product_list_noibat as $key_list => $item_list) : ?>
        <?php if ($key_list >= 8) break; ?>
        <div id="product_list_<?= $key_list ?>" class="tab-pane fade <?= $key_list == 0 ? 'in active' : '' ?>">
            <div class="grid-product">
                <?php foreach ($product_noibat_groupby_list[$item_list['id']] as $item) : ?>
                    <div class="item-product">
                        <a class="img-product" href="<?= $item['tenkhongdau'] ?>" title="<?= $item['ten_' . $lang] ?>">
                            <img onerror="noImg(this, 245, 250)" src="<?= _upload_product_l . $item['thumb'] ?>" alt="<?= $item['ten_' . $lang] ?>">
                        </a>
                        <a class="ten-product" href="<?= $item['tenkhongdau'] ?>" title="<?= $item['ten_' . $lang] ?>"><?= $item['ten_' . $lang] ?></a>
                        <div class="price-product clearfix">
                            <span class="price-now"><?= $item['giaban'] == 0 ? "Liên hệ" : number_format($item['giaban'], 0, ',', '.') . 'đ' ?></span>
                            <?php if ($item['giacu']) : ?>
                                <span class="percent-product">-<?= ceil(($item['giacu'] - $item['giaban']) / $item['giacu'] * 100) ?>%</span>
                            <?php endif; ?>

                        </div>
                        <div class="old-price-product clearfix">
                            <?php if ($item['giacu'] > 0) { ?><span class="price-old"><?= number_format($item['giacu'], 0, ',', '.') . 'đ' ?></span><?php } ?>
                            <span class="see-product"><i class="fa fa-user-o" aria-hidden="true"></i> <?= $item['luotxem'] ?></span>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <a href="<?= $item_list['tenkhongdau'] ?>" class="product-seemore">Xem tất cả <i class="fa fa-angle-down" aria-hidden="true"></i></a>
        </div>
    <?php endforeach; ?>
</div>


<div class="index-box">
    <div class="inner clearfix">
        <div class="news-box clearfix">
            <div class="news-title">
                Tin tức mới
            </div>
            <?php if ($tintuc_index) : ?>
                <div class="news-main">
                    <a href="<?= $tintuc_index[0]['tenkhongdau'] ?>" class="news-main-img hover-img"><img onerror="noImg(this, 370, 230)" src="thumb/370x230/1/<?= _upload_baiviet_l . $tintuc_index[0]['photo'] ?>" alt="<?= $item['ten'] ?>"></a>
                    <a href="<?= $tintuc_index[0]['tenkhongdau'] ?>" class="news-main-ten"><?= $tintuc_index[0]['ten'] ?></a>
                    <p><?= catchuoi($item['mota'], 100) ?></p>
                </div>
                <div class="news-list">
                    <div class="news-scroll">
                        <?php foreach ($tintuc_index as $item) : ?>
                            <div class="news-item clearfix">
                                <a href="<?= $item['tenkhongdau'] ?>" class="news-item-img"><img onerror="noImg(this, 130, 90)" src="thumb/130x90/1/<?= _upload_baiviet_l . $item['photo'] ?>" alt="<?= $item['ten'] ?>"></a>
                                <a href="<?= $item['tenkhongdau'] ?>" class="news-item-ten"><?= $item['ten'] ?></a>
                                <p><?= catchuoi($item['mota'], 100) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="video-box">
            <div class="news-title">
                Video - Clips
            </div>
            <?php include _template . "layout/module/video_owl.php" ?>
        </div>
    </div>
</div>



<style>
    .news-box {
        float: left;
        width: 65%;
        font-size: 13px;
        color: #3e3e3e;
        font-family: 'RobotoRegular';
    }

    .news-title {
        font-family: 'UTMHelvetIns';
        font-size: 30px;
        color: #222222;
        text-transform: uppercase;
        margin-bottom: 30px;
        padding-bottom: 20px;
        position: relative;
    }

    .news-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        border-bottom: 2px solid #28c24c;
        width: 70px;
    }

    .news-main {
        float: left;
        width: 49%;
    }

    .news-main-ten {
        margin: 10px 0;
        font-family: 'RobotoBold';
        display: block;
        font-size: 15px;
        color: #3e3e3e;
    }

    .news-main-seemore {
        font-size: 13px;
        color: #212121;
        display: inline-block;
        margin-top: 20px;
        padding: 10px;
        border: 2px solid #333333;
    }

    .news-list {
        float: right;
        width: 49%;
    }

    .news-item {
        padding: 15px 0;
        border-bottom: 1px dashed #cacaca;
    }

    .news-item-img {
        float: left;
        margin-right: 15px;
    }

    .news-item-ten {
        margin: 5px 0;
        font-family: 'RobotoBold';
        display: block;
        font-size: 15px;
        color: #3e3e3e;
    }

    .news-list .vert,
    .news-list .vert .simply-scroll-clip {
        width: 100%;
        height: 320px;
    }

    .content_left .vert,
    .content_left .vert .simply-scroll-clip {
        width: 100%;
        height: 250px;
    }

    .video-box {
        float: right;
        width: 32%;
    }
</style>
