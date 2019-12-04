<?php
	$d->reset();
	$d->query("select ten_$lang as ten,id,links from #_video where hienthi=1 and type='video' order by stt asc,id desc");
	$video=$d->result_array();
	$id_y= youtobi($video[0]['links']) ;
?>
<div id="box_video_owl">
	<div id="main_video_owl">
		<iframe width="100%" height="230" src="https://www.youtube.com/embed/<?=$id_y?>" frameborder="0" allowfullscreen></iframe>
	</div>
	<div id="sub_video_owl">
		<div id="owl_video" class="owl-carousel">
			<?php if($video){
				foreach ($video as $key => $value) { ?>
					<div class="item_video" data-id="<?=youtobi($value["links"])?>" >
						<img src="http://img.youtube.com/vi/<?=youtobi($value["links"])?>/0.jpg" class="w100"/>
					</div>
			<?php }}?>
		</div>
	</div>
</div>
