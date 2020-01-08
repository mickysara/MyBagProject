<div class="container" style="margin-bottom: 50px;">
<form method="post" action="<?php echo site_url('Deposit/InsertDeposit')?>" id="upload_form" enctype='multipart/form-data'>
    <div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 80px; max-width: 500px;margin-left: auto; 
    margin-right: auto; border: 1px solid #D8D9DC;
    ">
        <div class="header" style="margin-bottom: 20px;">
            <img src="" alt="">
            <h2 style="">แจ้งการฝากเงิน</h2>
           <hr>
        </div>
        <div class="Login">
            <div class="row">
                    <div class="col-md-8">
                    <p>จำนวนเงิน</p>
                        <div class="form-group">
                            <input type="Text" class="form-control" name="money" id="money" placeholder="เช่น 500.00" style="max-width: 400px ;background: #fcfcfc; color: #000 ; margin-bottom: 20px">
                        </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-md-8">
                    <p>วันที่ทำการโอน</p>
                        <div class="form-group">
                            <input type="Text" class="form-control" name="Date" id="Date" placeholder="วัน/เดือน/ปี พ.ศ." style="max-width: 400px ;background: #fcfcfc; color: #000 ; margin-bottom: 20px">
                        </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-md-8">
                    <p>เวลาที่ทำการโอน</p>
                        <div class="form-group">
                            <input type="Text" class="form-control" name="Time" id="Time" placeholder="เช่น 18:00" style="max-width: 400px ;background: #fcfcfc; color: #000 ; margin-bottom: 20px">
                        </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-md-8">
                    <p>หลักฐานการโอนเงิน</p>
                        <div class="form-group">
                        <input type="file" required id="image_file" name="userfile[]" accept=".png,.jpg,.jpeg">
                      <input type="hidden" id="namefile" name="namefile">
                    </div>
                    </div>
            </div>
            <div class="Footer">
                <button type="submit" class="btn btn " style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">ยืนยันการแจ้งฝากเงิน</button>
            </div>

        </div>
        </form>
</div>