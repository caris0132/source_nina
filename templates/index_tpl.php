<div class="sub_main clearfix">
    <div class="inner">
        <div class="title_main"><span>Sản phẩm bán chạy</span></div>
        <div id="product_owl" class="owl-carousel">
            <?php foreach ($product_index as $key => $value) { ?>
                <div class="box_product">
                    <div class="img_product hover-img">
                        <a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_vi']?>"><img data-src="thumb/280x260/1/<?=_upload_product_l.$value['photo']?>" alt="<?=$value['ten_'.$lang]?>" class="w100 lazy"></a>
                    </div>
                    <h2 class="name_product"><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_vi']?>"><?=$value['ten_'.$lang]?></a></h2>
                    <div class="price_product">
                        <?php if($value['giacu']>0){?><p class="price_old"><?=number_format($value['giacu'],0,',','.').' VNĐ'?></p><?php }?>
                        <p class="price_now"><?=$value['giaban']==0?_lienhe:number_format($value['giaban'],0,',','.').' VNĐ'?></p>
                        <span onclick="addtocart(<?=$value['id']?>,1,0)">Mua ngay</span>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div id="register_email" class="clearfix lazy" data-bg="url(thumb/1366x260/1/<?=_upload_hinhanh_l.$bgemail['photo']?>)">
    <div class="inner_email">
        <div class="title_mail">Liên hệ</div>
        <p>Chỉ cần nhập email của bạn và nhấn Đăng ký</p>
        <span>Chúng tôi sẽ gởi cập nhật những tin khuyến mãi & báo giá mới nhất đến bạn</span>
        <div class="content_email">
            <form id="frmDK" method="POST" class="row" onsubmit="return false;">
                <div class="left_email">
                    <input type="text" class="form-control" name="hoten" placeholder="Họ và tên" required>
                    <input type="text" class="form-control" pattern="^0[0-9]{9}$" name="dienthoai" placeholder="Số điện thoại" required>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                    <input type="hidden" id="recaptchaResponseContact" name="recaptcha_response_contact">
                </div>
                <input type="submit" class="btnGui" value="Đăng ký">
            </form>
        </div>
    </div>
</div>
<div id="info_consult" class="clearfix">
    <div class="inner">
        <div class="title_main"><span>Thông tin mới</span></div>
        <div id="news_owl" class="owl-carousel">
        <?php foreach ($news_scroll as $key => $value) { ?>
            <div class="box_owl">
                <div class="box_news_owl">
                    <div class="date_news_owl">
                        <span><?=date('d',$value['ngaytao'])?></span>
                        <span>Tháng <?=date('m',$value['ngaytao'])?></span>
                        <span><?=date('Y',$value['ngaytao'])?></span>
                    </div>
                    <a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>"><img data-src="thumb/368x280/1/<?=_upload_baiviet_l.$value['photo']?>" class="lazy" alt="<?=$value['ten']?>"></a>
                    <div class="info_news_owl">
                        <h3><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>"><?=$value['ten']?></a></h3>
                        <p><?=catchuoi($value['mota'],150)?></p>
                        <a class="view_news_owl" href="<?=$value['tenkhongdau']?>">Xem thêm >></a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
