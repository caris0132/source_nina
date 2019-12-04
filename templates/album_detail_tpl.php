<!--fotorama-->

<script type="text/javascript" src="js/fotorama/fotorama.js"></script> 

<div class="sub_main">
    <div class="title_main"><span><?=$title_detail?></span></div>
    <div class="content_main">
        <div class="box_fotorama">
            <div class="fotorama" data-maxheight="450" data-arrows="true" data-thumbwidth="" data-thumbheight="" data-loop="true" data-autoplay="4000" data-fit="contain" data-allowfullscreen="true" data-stopautoplayontouch="false" data-width="700" data-ratio="700/467" data-nav="thumbs">
                <?php for($i=0,$count_ab=count($album_images);$i<$count_ab;$i++){?>
                <img src="<?=_upload_album_l.$album_images[$i]['thumb']?>" alt="<?=$album_detail[0]['ten_'.$lang]?>">
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="text"><?=$album_detail['noidung_'.$lang]?></div>
</div>