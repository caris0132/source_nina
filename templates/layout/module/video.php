<?php
$d->reset();
$d->query("select ten_$lang as ten,id,links from #_video where hienthi=1 and type='video' order by stt asc,id desc");
$video = $d->result_array();
$arr_links = explode('watch?v=', $video[0]['links']);
?>
<div class="box_video">
    <div class="contain_video">
        <div id="video">
            <iframe width="100%" height="320" src="https://www.youtube.com/embed/<?= $arr_links[1] ?>" frameborder="0" allowfullscreen></iframe>
        </div>
        <center>
            <select id="list_video">
                <?php if (count($video) > 0) {
                    foreach ($video as $key => $value) { ?>
                        <option value="https://www.youtube.com/embed/<?= youtobi($value['links']) ?>"><?= $value['ten'] ?></option>
                <?php }
                } ?>
            </select>
        </center>
    </div>
</div>
