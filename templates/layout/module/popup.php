
<?php
	$sql_popup="select photo_$lang as photo,ten_$lang as ten from #_photo where type='popup' limit 0,1";
	$d->query($sql_popup);
	$popup=$d->fetch_array();

	if($popup['photo'] and $_SESSION['popup']==false){
?>

<div style="display: none;" id="popup_fancy">
	<a href="<?= $popup['link'] ?>" title="<?= $popup['ten'] ?>">
		<img src="<?= _upload_hinhanh_l . $popup['photo'] ?>" alt="<?= $popup['ten'] ?>">
	</a>
</div>

<?php $_SESSION['popup']=true;} ?>
