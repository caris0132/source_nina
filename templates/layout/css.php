<?php

$css_link_array = array();

$css_link_array[] = 'css/bootstrap.min.css';
$css_link_array[] = 'css/owl.carousel.min.css';
$css_link_array[] = 'css/owl.theme.default.min.css';
$css_link_array[] = 'css/fonts.css';
$css_link_array[] = 'assets/fontawesome5/css/all.min.css';
$css_link_array[] = 'css/cart.css';
$css_link_array[] = 'css/phantrang.css';


$js_link_array[] = 'js/bootstrap.min.js';
$js_link_array[] = 'js/lazyload.min.js';
$js_link_array[] = 'js/owl.carousel.min.js';
$js_link_array[] = 'js/my_js/script_menu_top.js';

if (in_array($template, array('thuvienanh', 'video'))) {
    $css_link_array[] = 'assets/fancybox/jquery.fancybox.min.css';
    $js_link_array[] = 'assets/fancybox/jquery.fancybox.min.js';
}

if (true) {
    //$css_link_array[] = 'css/jquery.mmenu.all.css';
    //$js_link_array[] = 'js/jquery.mmenu.all.min.js';

    $css_link_array[] = 'assets/mmenu/jquery.mmenu.all.css';
    $js_link_array[] = 'assets/mmenu/jquery.mmenu.js';
}

if (false) {
    $css_link_array[] = 'assets/slick/slick.css';
    $css_link_array[] = 'assets/slick/slick-theme.css';
    $js_link_array[] = 'assets/slick/slick.min.js';
}

if (false) {
    $js_link_array[] = 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js';
    $js_link_array[] = 'js/jquery.counterup.min.js';
}

if ($source == 'product' || $template == 'index' || $com == 'tim-kiem') {
    //$js_link_array[] = 'js/jquery-ui.min.js';
    $js_link_array[] = 'js/bootstrap-notify.min.js';
}

if (false && $template == 'index') {
    $css_link_array[] = 'css/jquery.simplyscroll.css';
    $js_link_array[] = 'js/jquery.simplyscroll.js';
}
if ($com=='thanh-toan') {
    $css_link_array[] = 'css/giohang.css';
}
if ($com == 'gio-hang') {
    $js_link_array[] = 'js/temp/js_giohang.js';
}
if ($template=='product_detail') {
    $css_link_array[] = 'css/magiczoomplus.css';
    $js_link_array[] = 'js/magiczoomplus.js';
    $js_link_array[] = 'js/temp/js_tab.js';
}

/**
 * thay thế link bên dưới để loại bỏ block render css khi test googlepagespeed
 * <link rel="stylesheet" href="<?= $item_css ?>" media="none" onload="if(media!='all')media='all'">
 * <noscript><link rel="stylesheet" href="<?= $item_css ?>"></noscript>
 * Không sài cách này cho file css chính như file style.css
 */


?>
<link rel="dns-prefetch" href="https://www.gstatic.com">
<link rel="dns-prefetch" href="https://www.google.com">

<?php foreach ( $css_link_array as $item_css ): ?>
    <link rel="stylesheet" href="<?= $item_css ?>">
<?php endforeach; ?>

<link rel="stylesheet" href="css/style.css?v=<?= filemtime('css/style.css') ?>">
<link rel="stylesheet" href="css/style_media.css">
