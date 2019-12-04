<?php
	session_start();
	error_reporting(0);
	@define ( '_template' , '../templates/');
	@define ( '_source' , '../sources/');
	@define ( '_lib' , '../libraries/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
    include_once _lib."class.database.php";

    $http = get_http();
    $d = new database($config['database']);
    $d->reset();
	$d->query("select * from #_setting limit 0,1");
    $row_setting = $d->fetch_array();

    $lang=$_SESSION['lang'];
    if (!array_key_exists($lang, $config['lang'])) {
        $lang=$row_setting['lang'];
    }
