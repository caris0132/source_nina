<?php  if(!defined('_source')) die("Error");



	$per_page = 8;

	$id =  addslashes($_GET['id']);

	$idl =  addslashes($_GET['idl']);

	if ($id!='') {

		$d->reset();

		$d->query("select id,mota_$lang,noidung_$lang,title,keywords,description,photo, ten_$lang from #_album where hienthi=1 and id='".$id."'");

		$row_detail = $d->fetch_array();



		$title_detail = $row_detail['ten_'.$lang];

		if($row_detail['title']!=''){

			$title_bar = $row_detail['title'];

		}else{

			$title_bar = $row_detail['ten_vi'];

		}

		$keywords_bar = $row_detail['keywords'];

		$description_bar = $row_detail['description'];



		$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';

		$share_facebook .= '<meta property="og:type" content="website" />';

		$share_facebook .= '<meta property="og:title" content="'.$row_detail['ten_'.$lang].'" />';

		$share_facebook .= '<meta property="og:description" content="'.$row_detail['mota_'.$lang].'" />';

		$share_facebook .= '<meta property="og:image" content="'.$http.$config_url.'/'._upload_album_l.$row_detail['photo'].'" />';



		$d->reset();

		$d->query("select photo from #_album_photo where hienthi=1 and id_album ='".$row_detail['id']."' order by id desc");

		$album_images = $d->result_array();



	}if($idl!=''){

		$d->reset();

		$d->query("select id,title,keywords,description,ten_$lang from #_album_list where id='".$idl."' and type='".$type_bar."'");



		$row_detail = $d->fetch_array();

		$where = " #_album where type='".$type_bar."' and id_list='".$row_detail['id']."' and hienthi=1";

		$sql="select id,mota_$lang,noidung_$lang,title,keywords,description,photo from";



		$startpoint = ($page * $per_page) - $per_page;

		$limit = ' limit '.$startpoint.','.$per_page;

		$sql.=$where." order by stt,ngaytao desc $limit";

		$d->query($sql);

		$album = $d->result_array();

		$url = getCurrentPageURL();

		$paging = pagination($where,$per_page,$page,$url);

		$title_detail = $row_detail['ten_'.$lang];

		if($row_detail['title']!=''){

			$title_bar = $row_detail['title'];

		}else{

			$title_bar = $row_detail['ten_'.$lang];

		}

		$keywords_bar = $row_detail['keywords'];

		$description_bar = $row_detail['description'];

	}else{

		$upload_file = _upload_seo_l;

		$d->reset();

		$d->query("select title,keywords,description,photo from #_title where type='".$type_bar."' limit 0,1");

		$row_detail = $d->fetch_array();



		$title_bar = $row_detail['title'];

		$keywords_bar = $row_detail['keywords'];

		$description_bar = $row_detail['description'];



		$sql="select id,ten_$lang,tenkhongdau,photo from";

		$startpoint = ($page * $per_page) - $per_page;

		$limit = ' limit '.$startpoint.','.$per_page;

		$where = " #_album where type='".$type_bar."' and hienthi=1";

		$sql.=$where." order by stt,id desc $limit";

		$d->query($sql);

		$album = $d->result_array();

		$url = getCurrentPageURL();

		$paging = pagination($where,$per_page,$page,$url);

	}

?>
