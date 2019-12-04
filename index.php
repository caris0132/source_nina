<?php
session_start();

@define('_template', './templates/');
@define('_source', './sources/');
@define('_lib', './libraries/');

// include_once _lib . "Mobile_Detect.php";
// $detect = new Mobile_Detect;
// $deviceType = ($detect->isMobile() ?  'phone' : 'computer');

// if ($deviceType == 'phone') {
//     @define('_template', './m/');
// } else {
//     @define('_template', './templates/');
// }

//require 'vendor/autoload.php';

include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "class.database.php";
$d = new database($config['database']);
//include_once _lib . "router.php";

$d->reset();
$d->query("select * from #_setting limit 0,1");
$row_setting = $d->fetch_array();

$lang = $_SESSION['lang'];
if (!array_key_exists($lang, $config['lang'])) {
    $lang = $row_setting['lang'];
}

include_once _source . "lang_$lang.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "counter.php";
include_once _source . "template.php";
include_once _lib . "file_requick.php";
if ($source != "") include _source . $source . ".php";
?>
<!DOCTYPE html>
<html class="no-js" lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <base href="<?= $http . $config_url ?>/">
    <link id="favicon" rel="shortcut icon" href="<?= _upload_hinhanh_l . $favicon['thumb_' . $lang] ?>" type="image/x-icon" />
    <title><?= $title_bar ?></title>
    <meta name="description" content="<?= $description_bar ?>">
    <meta name="keywords" content="<?= $keywords_bar ?>">
    <?= $row_setting['meta'] ?>
    <meta name="robots" content="noodp,index,follow" />
    <meta http-equiv="audience" content="General" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <meta name='revisit-after' content='1 days' />
    <meta name="ICBM" content="<?= $row_setting['toado'] ?>">
    <meta name="geo.position" content="<?= $row_setting['toado'] ?>">
    <meta name="geo.placename" content="<?= $row_setting['diachi_' . $lang] ?>">
    <meta name="author" content="<?= $row_setting['ten_' . $lang] ?>">
    <link rel="canonical" href="<?= getCurrentPageURL_CANO() ?>" />
    <meta property="og:site_name" content="<?= $row_setting['website'] ?>" />
    <meta property="og:locale" content="vi_VN" />
    <?php include _template . 'layout/meta_share.php'; ?>
    <meta name="dc.language" CONTENT="vietnamese">
    <meta name="dc.source" CONTENT="<?= $http . $config_url ?>">
    <meta name="dc.title" CONTENT="<?= $title_bar ?>">
    <meta name="dc.keywords" CONTENT="<?= $keywords_bar ?>">
    <meta name="dc.description" CONTENT="<?= $description_bar ?>">
    <?php include_once _template . 'layout/css.php'; ?>
    <?= $row_setting['analytics'] ?>
</head>

<body>
    <!--[if IE]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
    <script>
        function noImg(that, width, height) {
            width = width || 200;
            height = height || 200;
            that.removeAttribute('onerror');
            that.removeEventListener('error', noImg);
            //return that.src= "thumb/" + width + "x" + height + "/1/images/noimage.png";
            return that.src = "https://via.placeholder.com/" + width + "x" + height;
        }
    </script>
    <div id="fb-root"></div>
    <div id="full">
        <div id="wrapper">
            <?php
            include _template . 'layout/header.php';
            include _template . 'layout/menu.php';
            if ($template == 'index') include_once _template . 'layout/slider.php';
            ?>
            <div id="container" class="<?= $template != 'index' ? 'inner' : '' ?> clearfix">
                <?php include_once _template . $template . "_tpl.php"; ?>
            </div>
            <?php include_once _template . 'layout/footer.php'; ?>
        </div><!-- #wrapper -->
    </div><!-- #full -->
    <?php include_once _template . 'layout/json_strucdata.php'; ?>
    <?php include_once _template . 'layout/js.php';  ?>
    <?= $row_setting['vchat'] ?>
    <?= $row_setting['script_bottom'] ?>
    <?= $row_setting['script_top'] ?>
    <?php
    include_once _template . 'layout/module/chat_fb.php';
    include_once _template . 'layout/module/chat_zalo.php';
    ?>
</body>

</html>
