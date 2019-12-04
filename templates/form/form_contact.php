
<form method="post" name="frm" id="frm" action="lien-he" enctype="multipart/form-data">
        <div class=" tablelienhe" style="width:100%">
        
            <div class="form-group">
                <input name="ten" type="text" class="form-control" id="ten" size="50" required="required" placeholder="<?=_hovaten?>"/>
            </div><!--box input contact-->

            <div class="form-group">
               <input name="diachi" type="text"  class="form-control" size="50" id="diachi" required="required" placeholder="<?=_diachi?>"/>
            </div><!--box input contact-->
         
            <div class="form-group">
               <input name="dienthoai" type="text" class="form-control" pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" id="dienthoai" size="50" required="required" placeholder="<?=_dienthoai?>"/>
            </div><!--box input contact-->
              
            <div class="form-group">
                <input name="email" type="email" class="form-control" size="50" id="email" required="required" placeholder="Email"/>
            </div><!--box input contact-->
            
            <div class="form-group">
                <input name="tieude" type="text" class="form-control" id="tieude" size="50" placeholder="<?=_tieude?>"/>
           </div><!--box input contact-->
                
            <div class="form-group">
                <textarea name="noidung" cols="50" rows="7"  class="form-control" style="height:150px;" placeholder="<?=_noidung?>"></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" id="recaptchaResponseContact" name="recaptcha_response_contact">
                <input type="submit" value="<?=_gui?>" class="btn btn-success">
                <input type="reset" value="<?=_lamlai?>" class="btn btn-default">
            </div><!--box input contact-->
    </div><!--end table lien he-->
</form>