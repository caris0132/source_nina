<?php  if(!defined('_source')) die("Error");
    $upload_file = _upload_hinhanh_l;
    $title_bar = $row_setting['title'];
    $keywords_bar = $row_setting['keywords'];
    $description_bar = $row_setting['description'];
    $row_detail['photo'] = $logo['photo_'.$lang];

    $d->reset();
    $d->query("select ten_vi,id,link,photo_vi as photo,thumb_vi as thumb from #_photo where hienthi=1 and type='slider' order by id asc");
    $slider = $d->result_array();

	$d->reset();
	$d->query("select ten_$lang,id,tenkhongdau,photo,giaban,giacu,soluong from #_product where type='product' and banchay=1 and hienthi=1 order by stt,id desc");
	$product_index = $d->result_array();


    $d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,photo from #_product_list where  type='product' and hienthi=1 and noibat=1 order by stt,id desc";
    $d->query($sql);
    $product_list_noibat = $d->result_array();

    if ($product_list_noibat) {
        $list_id = array_column($product_list_noibat, 'id');
        $list_id_string = implode(',', $list_id);

        $d->reset();
        $sql = "select ten_$lang,id,tenkhongdau,photo,giaban,giacu, masp, thumb, id_list from #_product where id_list in ( {$list_id_string} ) and noibat=1 and hienthi=1 order by stt,id desc";
        $d->query($sql);
        $product_noibat_for_list = $d->result_array();

        $product_noibat_groupby_list = arrayChunkByKeyValue($product_noibat_for_list, 'id_list');
    }


    $d->reset();
    $d->query("select id,ten_$lang as ten,photo,mota_$lang as mota,tenkhongdau,ngaytao from #_baiviet where type='tintuc' and noibat=1 and hienthi=1 order by stt asc,id desc");
    $news_scroll=$d->result_array();

    $d->reset();
    $d->query("select photo_$lang as photo from #_photo where type='bgemail'");
    $bgemail = $d->fetch_array();

?>
