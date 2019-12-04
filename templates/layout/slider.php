<div id="slider" class="owl-carousel">
 <?php  foreach ($slider as $key => $value) { ?>
 	<a class="slider-img" href="<?=$value['link']?>" title="<?=$value['ten']?>">
		<img class="owl-lazy" data-src="<?=_upload_hinhanh_l.$value['thumb']?>" alt="<?=$value['ten']?>" 
		data-srcset="thumb/440x155/1/<?=_upload_hinhanh_l.$value['thumb']?> 440w, thumb/768x270/1/<?=_upload_hinhanh_l.$value['thumb']?> 768w, <?=_upload_hinhanh_l.$value['thumb']?>" 
		data-sizes="(max-width: 440px) 420px, (max-width: 768px) 748px, (min-width: 769px) 749px"/>
	</a>
 <?php } ?>
</div>