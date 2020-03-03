<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>My BAG</title>
<?php
    
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
    ?>
  <!-- Favicon -->
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  <!-- Fonts -->
  <link rel="icon" type="image/ico" href="https://uppic.cc/d/5dte" />
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
  <style>
  body {
    background: black url(https://lh3.googleusercontent.com/-8yGCBzF9F_s/XCHzZ5t7sJI/AAAAAAAAAlA/fnnU7Cma8UM9oE9ztOtlcqFs_aZiRI-aQCK8BGAs/s0/2018-12-25.jpg) center center no-repeat/cover;
}
/* customizable snowflake styling */
.snowflake {
  color: #fff;
  font-size: 1em;
  font-family: Arial;
  text-shadow: 0 0 1px #000;
}

@-webkit-keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@-webkit-keyframes snowflakes-shake{0%{-webkit-transform:translateX(0px);transform:translateX(0px)}50%{-webkit-transform:translateX(80px);transform:translateX(80px)}100%{-webkit-transform:translateX(0px);transform:translateX(0px)}}@keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@keyframes snowflakes-shake{0%{transform:translateX(0px)}50%{transform:translateX(80px)}100%{transform:translateX(0px)}}.snowflake{position:fixed;top:-10%;z-index:9999;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:default;-webkit-animation-name:snowflakes-fall,snowflakes-shake;-webkit-animation-duration:10s,3s;-webkit-animation-timing-function:linear,ease-in-out;-webkit-animation-iteration-count:infinite,infinite;-webkit-animation-play-state:running,running;animation-name:snowflakes-fall,snowflakes-shake;animation-duration:10s,3s;animation-timing-function:linear,ease-in-out;animation-iteration-count:infinite,infinite;animation-play-state:running,running}.snowflake:nth-of-type(0){left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s}.snowflake:nth-of-type(1){left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s}.snowflake:nth-of-type(2){left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s}.snowflake:nth-of-type(3){left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s}.snowflake:nth-of-type(4){left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s}.snowflake:nth-of-type(5){left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s}.snowflake:nth-of-type(6){left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s}.snowflake:nth-of-type(7){left:70%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s}.snowflake:nth-of-type(8){left:80%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s}.snowflake:nth-of-type(9){left:90%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s}
/* Demo Purpose Only*/
.demo {
  font-family: 'Raleway', sans-serif;
	color:#fff;
    display: block;
    margin: 0 auto;
    padding: 15px 0;
    text-align: center;
}
.demo a{
  font-family: 'Raleway', sans-serif;
color: #000;		
}</style>
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
<body style="background-color: #2d3436;">

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#2d3436; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center; position: sticky; position: sticky; z-index: 1071; top: 0; height: 100px;">
          <div class="container">
          <?php if($this->session->userdata('_success') == 1)
                { ?>
          <a class="navbar-brand" href="<?php echo site_url("/Information");?>" style="font-size: 20px; "><img src="https://uppic.cc/d/5dte" style="height: 80px;" alt="">My Bag</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <?php }else{ ?>
                  <a class="navbar-brand" href="<?php echo site_url("/Home");?>" style="font-size: 20px; "><img src="https://uppic.cc/d/5dte" style="height: 80px;" alt="">My Bag</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
         <?php } ?>
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
    
                <li class="nav-item dropdown">
                <?php if($this->session->userdata('Type') == 'Employee' && $this->session->userdata('Department') == 'แผนกงบประมาณ'){
                    
                  }else{ ?> 
                    <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       กระเป๋าตังค์
                        <span class="nav-link-inner--text d-lg-none"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                    <a class="dropdown-item" href="<?php echo base_url("Transaction"); ?>">กระเป๋าตังค์ของฉัน</a>
                        <a class="dropdown-item" href="<?php echo base_url("Deposit"); ?>">ฝากเงิน</a>
                        <a class="dropdown-item" href="<?php echo base_url("MyDeposit");?>">ผลแจ้งฝากเงิน</a>
                    <?php if($this->session->userdata('Type') == 'Employee' && $this->session->userdata('Department') == 'เจ้าหน้าที่การเงิน' )
                        { ?>
                            <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="<?php echo site_url('ListDeposit');?>">อนุมัติฝากเงิน</a>
                              <a class="dropdown-item" href="<?php echo site_url('Withdraw');?>">รายการถอนเงิน</a>
                              <a class="dropdown-item" href="<?php echo site_url('Shop');?>">จัดการร้านค้า</a>
                  <?php }
                  ?>
                    </div>
                </li>
                <?php }
                  ?>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       กิจกรรม
                        <span class="nav-link-inner--text d-lg-none"></span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                    <?php if($this->session->userdata('Type') == 'Employee' && $this->session->userdata('Department') == 'แผนกงบประมาณ' )
                        { ?>
                    
                            <a class="dropdown-item" href="<?php echo site_url('Project');?>">สร้างโครงการ</a>
                            <a class="dropdown-item" href="<?php echo base_url("MyDoc"); ?>">โครงการทั้งหมด</a>
                              <a class="dropdown-item" href="<?php echo base_url("AllActivity"); ?>">ดูสรุปผลการลงทะเบียน</a>
                              
                        <?php }else if($this->session->userdata('Type') == 'Employee' && $this->session->userdata('Department') == 'เจ้าหน้าที่การเงิน' )
                              {
                                     ?>
                              <a class="dropdown-item" href="<?php echo site_url('Payloan');?>">อนุมัติการเคลียร์เงิน</a>
                        <?php }else{ ?>
                          <a class="dropdown-item" href="<?php echo base_url("MyDoc"); ?>">โครงการที่ตนเองรับผิดชอบ</a>
                        <a class="dropdown-item" href="<?php echo base_url("ShowJoinActivity"); ?>">กิจกรรมที่เคยเข้าร่วม</a>
                        <a class="dropdown-item" href="<?php echo base_url("ShowActivity"); ?>">กิจกรรมภายในวิทยาเขต</a>
                        
                        <div class="dropdown-divider"></div>

                        <?php if($this->session->userdata('Type') == 'Teacher')
                          { ?>
                              <a class="dropdown-item" href="<?php echo base_url("AllActivity"); ?>">ดูสรุปผลการลงทะเบียน</a>
                              
                    <?php } ?>

                    <?php if($this->session->userdata('Level') == '3')
                          { ?>
                              <a class="dropdown-item" href="<?php echo site_url('ApproveActivity');?>">กิจกรรมรออนุมัติ</a>
                              <a class="dropdown-item" href="<?php echo base_url("AllActivity"); ?>">ดูสรุปผลการลงทะเบียน</a>               
                    <?php } ?>
                    
                    </div>
                </li>
                <?php  } 
                }?>
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
                        <i class="fa fa-bell" aria-hidden="true"></i>
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
                        <?php $this->db->where('Id_Student', $this->session->userdata('ID'));
                                $queryuser = $this->db->get('student');
                                $showdata = $queryuser->row_array();

                                $this->db->where('Id_Employee', $this->session->userdata('ID'));
                                $queryuser2 = $this->db->get('Employee');
                                $showdata2 = $queryuser2->row_array();
                            if($showdata['Level'] == '2' || $showdata2['Department'] == 'แผนกงบประมาณ'){ ?>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                            <a class="dropdown-item" href="<?php echo site_url('Shop');?>">จัดการร้านค้า</a>
                            <a class="dropdown-item" href="<?php echo site_url('MyDoc');?>">กิจกรรม</a>
                            <?php 
                            if($this->session->userdata('Status') == "admin" || $this->session->userdata('Status') == "superadmin" )
                            {?>
                              <a class="dropdown-item" href="<?php echo site_url('FileController');?>">ระบบหลังบ้าน</a>
                      <?php } ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('/Home/Logout');?>">ออกจากระบบ</a>
                        </div>
                            <?php }else{ ?>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                              <a class="dropdown-item" href="<?php echo site_url('Information');?>">ข้อมูลส่วนตัว</a>
                            <?php 
                            if($this->session->userdata('Status') == "admin" || $this->session->userdata('Status') == "superadmin" )
                            {?>
                              <a class="dropdown-item" href="<?php echo site_url('FileController');?>">ระบบหลังบ้าน</a>
                      <?php } ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('/Home/Logout');?>">ออกจากระบบ</a>
                        </div>
                            <?php  } ?>        
                    </li> 
                    <!--------------------------------------------------------------- -->
                <?php } ?>
 
            </ul>
            </div>
          </div>
          </div>
        </nav>
  
<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
  <div class="snowflake">
  💖
  </div>
</div>