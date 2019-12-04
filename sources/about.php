<?php  if(!defined('_source')) die("Error");


	$upload_file = _upload_hinhanh_l;

	$d->reset();
	$d->query("select noidung_$lang,title,keywords,description,photo from #_info where type='".$type_bar."'");
	$row_detail = $d->fetch_array();

	$title_bar = $row_detail['title'];
	$keywords_bar = $row_detail['keywords'];
	$description_bar = $row_detail['description'];

?>