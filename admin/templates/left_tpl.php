<div class="logo"> <a href="#" target="_blank" onclick="return false;"> <img src="images/logo.png" alt="" /> </a></div>

<div class="sidebarSep mt0"></div>

<!-- Left navigation -->

<ul id="menu" class="nav">

    <li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>



    <li class="categories_li <?php if($_GET['com']=='product' || $_GET['com']=='order' || $_GET['com']=='excel') echo ' activemenu' ?>" id="menu2"><a href="" title="" class="exp"><span>Sản phẩm</span><strong></strong></a>

        <ul class="sub">
            <?php getMenuPermission('Quản lý danh mục 1', 'product', 'man_list', 'product') ?>
            <?php getMenuPermission('Quản lý danh mục 2', 'product', 'man_cat', 'product') ?>
            <?php //getMenuPermission('Quản lý danh mục 3', 'product', 'man_item', 'product') ?>
            <?php //getMenuPermission('Quản lý danh mục 4', 'product', 'man_sub', 'product') ?>
            <?php getMenuPermission('Quản lý sản phẩm', 'product', 'man', 'product') ?>
            <?php getMenuPermission('Quản lý đơn hàng', 'order', 'man', '') ?>

        </ul>
    </li>

    <li class="categories_li <?php if($_GET['com']=='coupon') echo ' activemenu' ?>" id="menu_mgg"><a href="" title="" class="exp"><span>Mã giảm giá</span><strong></strong></a>

        <ul class="sub">
            <?php getMenuPermission('Quản lý mã giảm giá', 'coupon', 'man', '') ?>
        </ul>

    </li>

    <li class="categories_li <?php if($_GET['com']=='httt') echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Hình thức thanh toán</span><strong></strong></a>

        <ul class="sub">
            <?php getMenuPermission('Hình thức thanh toán', 'httt', 'man', '') ?>

        </ul>

    </li>

    <li class="categories_li <?php if($_GET['com']=='tags' && $_GET['type']!='tags' && $_GET['type']!='tailieu') echo ' activemenu' ?>" id="menu_tags"><a href="" title="" class="exp"><span>Quản lý thuộc tính</span><strong></strong></a>

        <ul class="sub">
            <?php getMenuPermission('Màu', 'tags', 'man', 'color') ?>
            <?php getMenuPermission('Size', 'tags', 'man', 'size') ?>
        </ul>

    </li>

    <li class="categories_li <?php if($_GET['com']=='tags' && $_GET['type']=='tags') echo ' activemenu' ?>" id="menu_tags"><a href="" title="" class="exp"><span>Quản lý Tags</span><strong></strong></a>

        <ul class="sub">

            <?php getMenuPermission('Tags seo', 'tags', 'man', 'tags') ?>

        </ul>

    </li>

    <li class="categories_li <?php if($_GET['com']=='baiviet' && $_GET['type']!='chinhsach') echo ' activemenu' ?>" id="menu_bv"><a href="" title="" class="exp"><span>Bài viết</span><strong></strong></a>

        <ul class="sub">
            <?php getMenuPermission('Quản lý tin tức ', 'baiviet', 'man', 'tintuc') ?>
            <?php getMenuPermission('Quản lý dịch vụ ', 'baiviet', 'man', 'dichvu') ?>
            <?php getMenuPermission('Quản lý tư vấn mua hàng ', 'baiviet', 'man', 'tuvan') ?>
        </ul>

    </li>

    <li class="marketing_li<?php if($_GET['com']=='download' || ($_GET['com']=='tags' && $_GET['type']=='tailieu')) echo ' activemenu' ?>" id="menu6s"><a href="#" title="" class="exp"><span>Tài liệu</span><strong></strong></a>
        <ul class="sub">
            <?php getMenuPermission('Danh mục cấp 1', 'tags', 'man', 'tailieu') ?>
            <?php getMenuPermission('Tài liệu', 'download', 'man', 'tailieu') ?>
        </ul>
    </li>

    <li class="categories_li <?php if($_GET['com']=='alt') echo ' activemenu' ?>" id="menu_alt"><a href="" title="" class="exp"><span>Quản lý địa điểm</span><strong></strong></a>

        <ul class="sub">
            <?php getMenuPermission('Quản lý tỉnh thành', 'alt', 'man_list', 'alt') ?>
            <?php getMenuPermission('Quản lý quận huyện', 'alt', 'man_cat', 'alt') ?>
            <?php getMenuPermission('Quản lý phường xã', 'alt', 'man_item', 'alt') ?>
            <?php getMenuPermission('Quản lý đường', 'alt', 'man', 'alt') ?>
        </ul>



    </li>

    <li class="categories_li <?php if($_GET['com']=='info') echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>

        <ul class="sub">
            <?php getMenuPermission('Giới thiệu', 'info', 'capnhat', 'gioithieu') ?>
        </ul>

    </li>

    <li class="categories_li <?php if(($_GET['com']=='baiviet' && $_GET['type']=='chinhsach') || ($_GET['com']=='bannerqc' && $_GET['type']=='bocongthuong')) echo ' activemenu' ?>" id="menu_bct"><a href="" title="" class="exp"><span>ĐK bộ công thương</span><strong></strong></a>

        <ul class="sub">
            <?php getMenuPermission('Quản lý bài viết chính sách', 'baiviet', 'man', 'chinhsach') ?>
            <?php getMenuPermission('Logo bộ công thương', 'bannerqc', 'capnhat', 'bocongthuong') ?>
            <?php getMenuPermission('Hướng dẫn đăng ký bộ công thương', 'bocongthuong', 'man', 'bocongthuong') ?>

        </ul>

    </li>

    <li class="template_li<?php if(($_GET['com']=='setting' || $_GET['com']=='newsletter' || $_GET['com']=='bannerqc' || $_GET['com']=='background'  || $_GET['com']=='company') && $_GET['type']!='bocongthuong') echo ' activemenu' ?>" id="menu5"><a href="#" title="" class="exp"><span>Thông tin công ty</span><strong></strong></a>

        <ul class="sub">
            <?php getMenuPermission('Logo', 'bannerqc', 'capnhat', 'logo') ?>
            <?php getMenuPermission('Banner', 'bannerqc', 'capnhat', 'banner') ?>
            <?php getMenuPermission('Background footer', 'bannerqc', 'capnhat', 'bgfooter') ?>
            <?php getMenuPermission('Background Banner', 'bannerqc', 'capnhat', 'bgbanner') ?>
            <?php getMenuPermission('Background đăng ký nhận tin', 'bannerqc', 'capnhat', 'bgemail') ?>
            <?php getMenuPermission('Favicon', 'bannerqc', 'capnhat', 'favicon') ?>
            <?php getMenuPermission('Liên hệ', 'company', 'capnhat', 'lienhe') ?>
            <?php getMenuPermission('Footer', 'company', 'capnhat', 'footer') ?>
            <?php getMenuPermission('Cấu hình chung', 'setting', 'capnhat', '') ?>
            <?php getMenuPermission('Gửi Mail', 'newsletter', 'man', '') ?>
            <?php getMenuPermission('Define ngôn ngữ', 'lang', 'man', 'lang') ?>

        </ul>

    </li>



    <li class="marketing_li<?php if($_GET['com']=='yahoo' || $_GET['com']=='lkweb') echo ' activemenu' ?>" id="menu6_mxh"><a href="#" title="" class="exp"><span>Hổ Trợ Online</span><strong></strong></a>

        <ul class="sub">
            <?php getMenuPermission('Mạng xã hội', 'lkweb', 'man', 'mxh') ?>
        </ul>

    </li>

    <li class="gallery_li<?php if($_GET['com']=='album') echo ' activemenu' ?>" id="menualbum"><a href="#" title="" class="exp"><span>Thư viện ảnh</span><strong></strong></a>

        <ul class="sub">
            <?php getMenuPermission('Thư viện ảnh', 'album', 'man', 'album') ?>
        </ul>

    </li>

    <li class="gallery_li<?php if($_GET['com']=='photo') echo ' activemenu' ?>" id="menu7"><a href="#" title="" class="exp"><span>Hình Ảnh - Slider</span><strong></strong></a>
        <ul class="sub">
            <?php getMenuPermission('Hình ảnh slider', 'photo', 'man_photo', 'slider') ?>
        </ul>
    </li>

    <li class="marketing_li<?php if($_GET['com']=='video') echo ' activemenu' ?>" id="menu_video"><a href="#" title="" class="exp"><span>Quản lý video</span><strong></strong></a>

        <ul class="sub">
            <?php getMenuPermission('Video', 'video', 'man', 'video') ?>
        </ul>
    </li>

    <li class="marketing_li<?php if($_GET['com']=='title') echo ' activemenu' ?>" id="menu6"><a href="#" title="" class="exp"><span>Hổ Trợ SEO</span><strong></strong></a>

        <ul class="sub">
            <?php getMenuPermission('Sản phẩm', 'title', 'capnhat', 'product') ?>
            <?php getMenuPermission('Tin tức', 'title', 'capnhat', 'tintuc') ?>
            <?php getMenuPermission('Dịch vụ', 'title', 'capnhat', 'dichvu') ?>
            <?php getMenuPermission('Tư vấn mua hàng', 'title', 'capnhat', 'tuvan') ?>
        </ul>

    </li>

</ul>
