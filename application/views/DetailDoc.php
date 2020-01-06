
<div class="container">
<?php          
                    if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
                    foreach ($view_data as $key => $data) {   
                ?>
  <div class="row">
    <div class="col mt-5 mr-5" style="width: 500px; height: 500px; background-color: #fff;"><span></span>
        <div id="slider" class="flexslider">

                    <img style="width:475px; height:475px; margin-left: auto; margin-right: auto;" src="<?php echo base_url('/assets/img/qrcode/'.$data['QR_Code'].'.png');?>"/>

                <!-- <div id="carousel" class="flexslider"> -->
                <!-- <ul class="slides">
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/beforeqrcode.png');?>" />
                    </li>
                    <li>
                    <img style="width:100px; height:100px; margin-left: auto; margin-right: auto;" src="<?php echo base_url('/assets/img/qrcode/'.$data['Qr_Codename'].'.png');?>"/>
                    </li>
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/'.$data['Type'].'.png');?>" />
                    </li> -->
                    <!-- items mirrored twice, total of 12 -->
                <!-- </ul> -->
        <!-- </div> -->
    </div>
    </div>

    <?php  $this->db->where('Id_Student', $data['UploadBy']);
           $query = $this->db->get('student');
           $showdata = $query->row_array(); 
    ?>

    <div class="col mt-5" style="background-color: #fff; padding: 36px;">
        <h1>ชื่อหัวข้อ : <?php echo $data['Topic'];?> </h1>
        <p></p>  
        <p style="font-weight: 500;">ชื่อไฟล์ : <?php echo $data['Name_Document'];?> </p>  
        <p style="font-weight: 500;">ประเภท : <?php echo $data['Type'];?></p>
        <p style="font-weight: 500;">เพิ่มโดย : <?php echo $showdata['Fname'];?></p>
        <p style="font-weight: 500;">เมื่อวันที่ : <?php echo date('d/m/Y', strtotime($data['Date']));?></p>
        <!-- <p style="font-weight: 500;">จำนวนครั้งที่ดาวโหลดไฟล์ : <?php echo $data['Download'];?></p> -->
         
         <a href="<?php echo site_url(); ?>DetailDoc/download/<?php echo $data['Url'];?>" target="_blank" class="btn btn-success"style="margin-top: 10px; margin-bottom: 15px;"><i class="fa fa-download"></i>    ดาวน์โหลดไฟล์</a>
         <a href="<?php echo site_url(); ?>DetailDoc/downloadqrcode/<?php echo $data['Url'];?>" target="_blank" class="btn btn-default"style="margin-top: 10px; margin-bottom: 15px;"><i class="fa fa-download"></i>    ดาวน์โหลด QR CODE</a>
    </div>
  
    <div class="w-100"></div>
    <div class="nav-wrapper">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
            <!-- <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>รายละเอียด</a> -->
        </li>
<!--         <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>ความคิดเห็น</a>
        </li> -->
    </ul>
</div>
<div class="card shadow w-100 mb-5">
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab" style="width: max;">
                <p class="description"><?php echo $data['Detail'];?></p>
                <p class="description" style=></p>
            </div>
            <!-- <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                <h2 class="description">แสดงความคิดเห็นกับเอกสารนี้</h2>
                <form>
                    <textarea class="form-control form-control-alternative" rows="3" placeholder="เขียนอะไรสักอย่างเพื่อแสดงความคิดเห็นแก่ผู้โพสต์ไฟล์ ..."></textarea>
                </form>
                <button type="button" class="btn btn" style="background-color: #2d3436; color: #fff; margin-top: 20px;">ยืนยันแสดงความคิดเห็น</button>
            </div> -->
        </div>
    </div>
</div>
  </div>
  <?php } endif; ?>
</div>
