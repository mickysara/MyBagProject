<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>My BAG</title>
<?php
    header('Access-Control-Allow-Origin: http://localhost/Aot-Document/');
    ?>
  <!-- Favicon -->
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  <!-- Fonts -->
  <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>./assets/img/logo/logo.png" />
  <link href="https://fonts.googleapis.com/css?family=Athiti:300,400,700&amp;subset=thai" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  <!-- Icons -->
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/vendor/nucleo/css/nucleo.css">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/js/plugins/nucleo/css/nucleo.css">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css">
  <!-- Argon CSS -->
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/css/argon.css?v=1.0.1">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/css/argon.min.css">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/css/argon-dashboard.css?v=1.0.0">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/css/argon-dashboard.min.css">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/Flex/flexslider.css">

  
  <!-- Custom styles for this template -->
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/css/simple-sidebar.css">

  <!-- Syntax Highlighter -->
  <!-- Demo CSS -->

  <script src="<?php echo base_url('/assets/js/modernizr.js'); ?>"></script>
  <style>
        body,h1,h2,h3,h4,h5,.tooltip,h6,a,p,button{
          color: #333;
          font-family: 'Kanit', 'sans-serif !important';
    }
        .swal-footer {
        background-color: rgb(245, 248, 250);
        margin-top: 32px;
        border-top: 1px solid #E9EEF1;
        overflow: hidden;
        
    }
    body {
    font-family: "Lato", sans-serif;
  }

  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
  }

  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }

  .sidenav a:hover {
    color: #f1f1f1;
  }

  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }

  #main {
    transition: margin-left .5s;
    padding: 16px;
  }

  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>
</head>
<body style="background-color: #f2f2f2;">

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#2d3436; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center; position: sticky; position: sticky; z-index: 1071; top: 0; height: 100px;">
          <div class="container">
          <a class="navbar-brand" href="<?php echo site_url("/Home");?>" style="font-size: 20px; "><img src="https://www.img.in.th/images/018392f5e08d9f33f55f90fb18a0c0f4.png" style="height: 80px;" alt="">My Bag</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-primary">
              <div class="navbar-collapse-header">
                <div class="row">

                  <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                      <span></span>
                      <span></span>
                    </button>
                  </div>     
                </div>
              </div>
              <ul class="navbar-nav ml-lg-auto" style="">

                <?php if($this->session->userdata('_success') == 1)
                { ?>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="<?php echo site_url('/LineNotifyController');?>"  >
                        แจ้งปัญหา
                    </a>
                </li> 
                <?php  } ?>
                <?php if($this->session->userdata('_success') == '')
                { ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url("/Home");?>"  > <h4 style="color: #fff">เข้าสู่ระบบ</h4> </a>
                </li>
                <?php } ?>
                
                <?php if($this->session->userdata('_success') == 1 )
                {?>
                    <!---------------------- Notification----------------------------------------- -->
                    <li class="nav-item dropdown " id="Hi" style=>
                        <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width 50px;">
                        <i class="ni ni-planet"></i>
                        <span class="badge badge-danger" id="Noti" style="font-size: 14px; color: #fff; border-color: #f5365c; background-color: #f5365c;"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" id="DetailNoti" aria-labelledby="navbar-default_dropdown_1" style="max-height: 500px; overflow-x: hidden; width: 350px;">
                           
                        
                        </div>
                    </li> 
                    <!--------------------------------------------------------------- -->


                    <!---------------------- Property ----------------------------------------- -->
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <?=$this->session->userdata('Fname')?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                            <a class="dropdown-item" href="<?php echo site_url('MyDoc');?>">กิจกรรม</a>
                            <a class="dropdown-item" href="<?php echo site_url('ChatroomController');?>">Chatroom</a>
                            <?php 
                            if($this->session->userdata('Status') == "admin" || $this->session->userdata('Status') == "superadmin" )
                            {?>
                              <a class="dropdown-item" href="<?php echo site_url('FileController');?>">ระบบหลังบ้าน</a>
                      <?php } ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('/LoginController/Logout');?>">ออกจากระบบ</a>
                        </div>
                    </li> 
                    <!--------------------------------------------------------------- -->
                <?php } ?>
 
            </ul>
            </div>
          </div>
          </div>
        </nav>
  