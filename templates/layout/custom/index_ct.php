<div class="sub_main">
    <div class="inner clearfix">
        <div class="about-img">
            <a href="gioi-thieu">
                <img src="<?= _upload_hinhanh_l . $gioithieu['photo'] ?>" alt="<?= $gioithieu['ten'] ?>">
            </a>
        </div>

        <div class="about-content">
            <div class="about-title">
                Chào mừng quý khách tới
                <span><?= $gioithieu['ten'] ?></span>
            </div>
            <div>
                <?= nl2br($gioithieu['mota']) ?>
            </div>
            <a href="gioi-thieu" class="about-seemore">Xem thêm</a>
        </div>
    </div>
</div>


<div class="index-box news-box">
    <div class="inner clearfix">
        <div class="title_main">
            <span>Tin tức nổi bật</span>
        </div>
        <div class="owl-carousel news-owl">
            <?php foreach ($tintuc_index as $item) : ?>
                <div class="news-item">
                    <a href="<?= $item['tenkhongdau'] ?>" class="news-item-img hover-img">
                        <img onerror="noImg(this, 380, 240)" src="thumb/380x240/1/<?= _upload_baiviet_l . $item['photo'] ?>" alt="<?= $item['ten'] ?>">
                        <p class="news-item-date">
                            <span><?= date('d', $item['ngaytao']) ?></span>
                            <?= date('m/Y', $item['ngaytao']) ?>
                        </p>
                    </a>
                    <a href="<?= $item['tenkhongdau'] ?>" class="news-item-ten"><?= $item['ten'] ?></a>
                    <div class="news-item-des">
                        <?= catchuoi($item['mota'], 150) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="index-box index-flex">
    <div class="nhantin-box clearfix">
        <div class="nhantin-content">
            <div class="nhantin-title">
                Liên hệ với chúng tôi
            </div>
            <div class="nhantin-slogan">
                Nếu có bất kỳ thắc mắc gì, hãy liên hệ ngay với chúng tôi. Nhân viên tư vấn sẽ liên hệ với Quý khách trong thời gian sớm nhất
            </div>

            <form id="frmDK" method="POST" class="clearfix" onsubmit="return false;">
                <input type="text" class="form-control" name="hoten" placeholder="Họ và tên" required>
                <input type="text" class="form-control" pattern="^0[0-9]{9}$" name="dienthoai" placeholder="Số điện thoại" required>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
                <input type="hidden" id="recaptchaResponseContact" name="recaptcha_response_contact">
                <textarea name="noidung" id="" rows="4" class="form-control" placeholder="Nội dung"></textarea>
                <input type="submit" class="btnGui" value="GỬI THÔNG TIN">
            </form>
        </div>
    </div>
    <div class="video-box">
        <?php include _template . "layout/module/video.php" ?>
    </div>
</div>


<div class="index-box doitac-box">
    <div class="inner clearfix">
        <div class="doitac-owl owl-carousel">
            <?php foreach ( $doitac as $item ): ?>
            <a href="<?= $item['tenkhongdau'] ?>" class="doitac-item">
                <img src="<?= _upload_hinhanh_l . $item['thumb'] ?>" alt="<?= $item['ten'] ?>">
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<div class="index-box album-box">
    <div class="clearfix">
        <div class="title_main">
            <span>Thư viện ảnh</span>
            <p><?= $row_setting['slogan_' . $lang] ?></p>
        </div>
        <div class="thuvien-grid">
            <?php foreach ($thuvienanh as $item) : ?>
                <a data-fancybox="gallery" href="<?= _upload_hinhanh_l . $item['photo'] ?>" class="thuvien-item hover-img"><img onerror="noImg(this, 400, 250)" src="thumb/400x250/1/<?= _upload_hinhanh_l . $item['photo'] ?>" alt="<?= $item['ten'] ?>"></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="index-box">
    <div class="inner clearfix">
        <div class="khachhang-box">
            <div class="khachhang-title">
                Ý kiến khách hàng
            </div>
            <div class="slider-nav">
                <?php foreach ($khachhang as $item) : ?>
                    <div class="khachhang-img-o">
                        <div class="khachhang-img">
                            <img onerror="noImg(this, 290, 290)" src="thumb/290x290/1/<?= _upload_baiviet_l . $item['photo'] ?>" alt="<?= $item['ten'] ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="slider-for">
                <?php foreach ($khachhang as $item) : ?>
                    <div class="khachhang-info">
                        <div class="khachhang-info-ten"><?= $item['ten'] ?></div>
                        <div class="khachhang-info-des">
                            <?= $item['mota'] ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="video-box">
            <div class="khachhang-title">
                Video clip
            </div>
            <?php include _template . "layout/module/video.php" ?>
        </div>
    </div>
</div>

<div class="quangcao-box">
    <div class="quangcao-owl owl-carousel">
        <?php foreach ($quangcao_bottom as $item) : ?>
            <a href="<?= $item['link'] ?>"><img src="<?= _upload_hinhanh_l . $item['thumb'] ?>" alt="<?= $item['ten'] ?>"></a>
        <?php endforeach; ?>
    </div>
</div>

<div class="product-grid">
    <?php foreach ($product as $item) : ?>
        <div class="product-item">
            <a href="<?= $item['tenkhongdau'] ?>" class="hover-img product-item-img">
                <img onerror="noImg(this, 265, 265)" src="<?= _upload_product_l . $item['thumb'] ?>" alt="<?= $item['ten_' . $lang] ?>">
            </a>
            <a href="<?= $item['tenkhongdau'] ?>" class="product-item-ten"><?= $item['ten_' . $lang] ?></a>
            <div class="product-item-price">
                <span class="price-now"><?= $item['giaban'] == 0 ? "Liên hệ" : number_format($item['giaban'], 0, ',', '.') . 'đ' ?></span>
                <?php if ($item['giacu'] > 0) { ?><span class="price-old"><?= number_format($item['giacu'], 0, ',', '.') . 'đ' ?></span><?php } ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>



<style>


.about-img {
    float: left;
    width: 49%
}

.about-content {
    float: right;
    width: 49%
}

.about-title {
    font-family: 'RobotoBold';
    font-size: 14px;
    color: #0b397e;
    text-transform: uppercase;
    padding-bottom: 5px;
    margin-bottom: 15px;
    background: url(../images/bg_about_title.png) left bottom no-repeat
}

.about-title span {
    font-family: 'Montserrat';
    font-weight: bold;
    font-size: 26px;
    color: #333333;
    display: block
}

.about-seemore {
    font-family: 'RobotoBold';
    font-size: 15px;
    color: #fff;
    text-transform: uppercase;
    padding: 5px 20px;
    display: inline-block;
    margin-top: 20px;
    background-color: #0b397e;
}

.news-item {
    font-family: 'RobotoRegular';
    font-size: 13px;
    color: #606060
}

.news-item-img {
    display: block;
    position: relative;
}

.news-item-date {
    position: absolute;
    right: 0;
    bottom: 0;
    padding: 10px;
    background-color: #0b397e;
    font-family: 'RobotoRegular';
    font-size: 13px;
    color: #fff;
    text-align: center;
    margin: auto
}

.news-item-date span {
    display: block;
    font-family: 'RobotoBold';
    font-size: 15px;
}

.news-item-ten {
    margin: 10px 0;
    font-family: 'RobotoBold';
    font-size: 15px;
    color: #0b397e;
    display: block
}

.index-flex {
    display: flex;
    padding: 0;
    flex-wrap: wrap
}

.nhantin-box {
    width: 50%;
    background-color: #0b397e;
}

.nhantin-content {
    padding: 30px 50px;
    padding-left: 0;
    max-width: 600px;
    float: right;
}

.nhantin-title {
    font-family: 'Montserrat';
    font-weight: bold;
    font-size: 26px;
    color: #fff;
    text-transform: uppercase;
}

.nhantin-slogan {
    margin: 10px 0;
    font-family: 'RobotoRegular';
    font-size: 14px;
    color: #fff;
}

.video-box {
    width: 50%
}

.video-box iframe {
    display: block
}


.thuvien-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
}

.thuvien-item {
    display: block;
}

.khachhang-box {
    float: left;
    width: 65%;
}

.khachhang-title {
    font-family: 'SVNVeneer';
    font-size: 35px;
    color: #c70003;
    text-transform: uppercase;
    padding-bottom: 5px;
    margin-bottom: 20px;
    border-bottom: 1px solid #f2f2f2;
    position: relative;
}

.khachhang-title::before {
    content: '';
    position: absolute;
    width: 50px;
    left: 0;
    bottom: 0;
    border: 1px solid ;
}

.khachhang-box .slick-center .khachhang-img {
    transform: scale(1);
}

.khachhang-img-o {
    padding: 10px 20px;
}

.khachhang-img {
    border-radius: 999px;
    background-color: #ef4c4c;
    padding-bottom: 3px;
    padding-right: 3px;
    transform: scale(0.7);
    transition: ease 0.5s;
}

.khachhang-img img {
    border-radius: 999px;
}

.khachhang-info {
    color: #333333;
    text-align: center;
}

.khachhang-info-ten {
    display: block;
    margin: 10px 0;
    font-size: 15px;
    color: #d52222;
    text-transform: uppercase;
}

.khachhang-info-des {
    text-align: left;
    background: url(../images/bg_khachhang_des.png) left 5px no-repeat;
    padding-left: 45px;
    min-height: 50px;
}
</style>
