<style>
    .toolbar2 {background: #fff; display: none; padding: 5px; bottom: 0; right: 0; left: 0; position: fixed; z-index: 500; height: auto; border-top: 1px solid #cbcbcb; }
    .toolbar2 ul{list-style: none;}
    .toolbar2 ul li {text-align: center; float: left; width: 25%; }
    .toolbar2 ul li a {display: inline-block; width: 100%; }
    .toolbar2 ul li a span {color: #333; font-size: 3.5vw;font-weight: 400; }
    .icon-m {background: url(images/icon-m.png) no-repeat; display: inline-block; }
    .icon-t1 {background-position: -315px -30px; width: 25px; height: 20px; background-size: 680px; }
    .icon-t2 {background-position: -348px -30px; width: 25px; height: 20px; background-size: 680px; }
    .icon-t3 {background-position: -382px -30px; width: 50px; height: 20px; background-size: 680px; }
    .icon-t4 {background-position: -440px -29px; width: 25px; height: 21px; background-size: 680px; }
    #nhantin .fa{background: none;color: #616161;font-size: 17px;margin-bottom: 5px;padding-top: 2px}
    @media screen and (min-width: 500px){
        .toolbar2 ul li a span{font-size: 15px;}
    }

    @media screen and (max-width: 960px) {
        .toolbar2 {
            display: block;
        }
    }
</style>

<?php $hotline = preg_replace( '/[^0-9]/', '', $row_setting['hotline'] ); ?>

<div class="toolbar2">
    <ul>
        <li><a id="goidien" href="tel:<?= $hotline ?>" title="title"><i class="icon-m icon-t1"></i><br><span>Gọi điện</span></a>
        </li>
        <li><a id="nhantin" href="<?= $row_setting['chiduong'] ?>" title="title"><i class="fas fa-map-o icon-m icon-t2"></i><br><span>Chỉ đường</span></a>
        </li>
        <li><a id="chatzalo" href="https://zalo.me/<?= $hotline ?>" title="title"><i class="icon-m icon-t3"></i><br><span>Chat zalo</span></a>
        </li>
        <li><a id="chatfb" href="<?= $row_setting['facebook'] ?>" title="title"><i class="icon-m icon-t4"></i><br><span>Chat facebook</span></a>
        </li>
    </ul>
</div>
