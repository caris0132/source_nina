<?php

	$d->reset();

	$d->setTable("lang");

	$d->setWhere("type","lang");

	$d->select("define,lang_vi");

	$result_lang = $d->result_array();

	foreach ($result_lang as $key => $value) {

		@define($value['define'],$value['lang_vi']);

    }

    if (!defined('_dichvukhac')) {
        define('_dichvukhac','Dịch vụ khác');
    }

    if (!defined('_chinhsach')) {
        define('_chinhsach','Chính sách');
    }

?>
