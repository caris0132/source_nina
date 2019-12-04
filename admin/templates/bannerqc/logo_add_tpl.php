<div class="wrapper">

    <div class="control_frm" style="margin-top:25px;">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="index.php?com=bannerqc&act=capnhat<?php if ($_REQUEST['type'] != '') echo '&type=' . $_REQUEST['type']; ?>"><span>Quản lý banner</span></a></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>

    <form name="supplier" id="validate" class="form" action="index.php?com=bannerqc&act=save_banner_giua<?php if ($_REQUEST['type'] != '') echo '&type=' . $_REQUEST['type']; ?>" method="post" enctype="multipart/form-data">
        <div class="widget">

            <div class="title chonngonngu">
                <ul>
                    <li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
                    <li><a href="en" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
                </ul>
            </div>

            <div class="formRow lang_hidden lang_vi active">
                <label>Tải logo :</label>
                <div class="formRight">
                    <input type="file" id="file_vi" name="file_vi" />
                    <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow lang_hidden lang_vi active">
                <label>Logo Hiện Tại :</label>
                <div class="formRight">

                    <div class="mt10">
                        <img style="max-width: 100%" src="<?= _upload_hinhanh . $item['photo_vi'] ?>" alt="<?= $item['ten'] ?>">
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow lang_hidden lang_en">
                <label>Tải logo (Tiếng anh) :</label>
                <div class="formRight">
                    <input type="file" id="file_en" name="file_en" />
                    <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow lang_hidden lang_en">
                <label>Logo Hiện Tại :</label>
                <div class="formRight">

                    <div class="mt10">
                        <img style="max-width: 100%" src="<?= _upload_hinhanh . $item['photo_en'] ?>" alt="<?= $item['ten'] ?>">
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Kích thước : </label>
                <div class="formRight">
                    <b>Rộng : 130px , Cao : 130px;</b>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <div class="formRight">
                    <input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
                </div>
                <div class="clear"></div>
            </div>

        </div>




    </form>
</div>
