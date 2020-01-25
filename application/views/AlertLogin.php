<div class="container">
<form name="login" id="login_form" method="post">
    <div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px; height: 350px;max-width: 500px;margin-left: auto; 
    margin-right: auto; border: 1px solid #D8D9DC;">
        <div class="header" style="margin-bottom: 20px;">
            <img src="" alt="">
            <h1 style="">คำเตือน</h1>
            <hr>
        </div>
        <h2 style="text-align: center;">ขออภัยคุณไม่สามารถเข้าหน้านี้ได้กรุณาLogin</h2>
        <?php if($this->session->userdata('_success') == '')
        { ?>
        <div align="center">
            <a href="<?php echo base_url('Home') ?>" align="center" class="btn btn-warning mt-5">คลิกไปหน้า Login</a>
        </div>
    <?php }else { ?>
        <div align="center">
            <a href="<?php echo base_url('Information') ?>" align="center" class="btn btn-warning mt-5">คลิกเพื่อไปยังหน้าแรก</a>
        </div>
  <?php  } ?>
</div>

