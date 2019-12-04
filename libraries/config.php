<?php
	/**
	 * NINA Framework
	 * Vertion 1.0
	 * Author NINA Co.,Ltd. (nina@nina.vn)
	 * Copyright (C) 2015 NINA Co.,Ltd. All rights reserved
	*/
	if(!defined('_lib')) die("Error");
	include_once _lib.'AntiSQLInjection.php';
	function nettuts_error_handler($number, $message, $file, $line, $vars)
	{
		if ( ($number !== E_NOTICE) && ($number < 2048) ) {
			die('a');
		}
    }

	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$api_url     = 'https://www.google.com/recaptcha/api/siteverify';
	$site_key    = '6LdwTJkUAAAAANBf_AzZ7uowFtjU-Bq2kXRibflQ';
	$secret_key  = '6LdwTJkUAAAAADjh_AHpymU8ODzZibKSK8HgwPF9';

    $config_url_f = '/source_nina';
    $config_url=$_SERVER["SERVER_NAME"]. $config_url_f;

    // cấu hình đường dẫn tương đối trong ckeditor
    $_SESSION['ckeditor_url'] = $config_url;

	$config_file = "//".$config_url."/admin";
	$config['arrayDomainSSL'] = array("yourdomainssl.com.vn");
	$config['debug'] = 0;    #Bật chế độ debug dành cho developer
	$config['lang']="vi";
	$config['index']=0; #Mở index 1
	$config_email="noreply@demo98.ninavietnam.com.vn";
	$config_pass="QWDQBA4lY";
	$config_ip="127.0.0.1";
	$config['lang']= array('vi'=>'Tiếng việt','en'=>'Tiếng anh');
	$config['lang_active']= 'vi';
	$config['salt']='@#$fd_!34^';
	$config['login_name'] = $config_url;
	$config['login']['attempt'] = 5;
	$config['login']['delay'] = 15;
	$config['database']['debug'] = $config['debug'];
	$config['database']['servername'] = 'localhost';
	$config['database']['username'] = 'root';
	$config['database']['password'] = '';
	$config['database']['database'] = 'source_sample';
	$config['database']['refix'] = 'table_';

	if (version_compare(phpversion(), '7.0.0', '<')) {
	    $config['database']['dbtype'] = 'mysql';
	}else{
		$config['database']['dbtype'] = 'mysqli';
	}


	error_reporting($config['debug']);
?>
