<?php
$d->reset();
$d->query("select ten_vi,id,link,photo_vi as photo,thumb_vi as thumb from #_photo where hienthi=1 and type='thuvienanh' order by id asc");
$thuvienanh = $d->result_array();
?>
<div class="sub_main">
    <div class="title_main"><span><?= $title_detail ?></span></div>
    <div class="content_main">
        <div class="row flex-template-detail">
            <?php if ($thuvienanh) { ?>
                <?php foreach ($thuvienanh as $key => $item) { ?>
                    <div class="col_news col-md-3 col-sm-4 col-xs-6">
                        <div class="box_news clearfix">
                            <a data-fancybox="gallery" href="<?= _upload_hinhanh_l . $item['photo'] ?>" class="thuvien-item hover-img"><img onerror="noImg(this, 400, 250)" src="thumb/400x250/1/<?= _upload_hinhanh_l . $item['photo'] ?>" alt="<?= $item['ten'] ?>"></a>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?><div class="text" style="text-align:center"><b style="color:#F00; font-size: 17px;"><?= _thongbaonull ?></b></div><?php } ?>
        </div>
    </div>
</div>
<!--end sub main-->
