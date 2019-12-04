<?php
$d->reset();
$d->query("select ten_$lang as ten,id,links from #_video where hienthi=1 and type='video' order by stt asc,id desc");
$video=$d->result_array();
?>
<div class="sub_main">
    <div class="title_main"><span><?= $title_detail ?></span></div>
    <div class="content_main">
        <div class="row flex-template-detail">
            <?php if ($video) { ?>
                <?php foreach ($video as $key => $item) { ?>
                    <div class="col_news col-md-3 col-sm-4 col-xs-6">
                        <div class="box_news clearfix">
                            <a data-fancybox="gallery" href="<?= $item['links'] ?>" class="thuvien-item hover-img"><img onerror="noImg(this, 400, 250)" src="https://img.youtube.com/vi/<?= youtobi($item['links']) ?>/0.jpg" alt="<?= $item['ten'] ?>"></a>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?><div class="text" style="text-align:center"><b style="color:#F00; font-size: 17px;"><?= _thongbaonull ?></b></div><?php } ?>
        </div>
    </div>
</div>
<!--end sub main-->
