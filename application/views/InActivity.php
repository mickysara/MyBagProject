<div class="container mb-5">
        
<div class="container">
<?php          
                    if(isset($InsertActivity) && is_array($InsertActivity) && count($InsertActivity)): $i=1;
                    foreach ($InsertActivity as $key => $InAc) {   
                ?>
  <div class="row">
    <div class="col mt-5 mr-5" style="width: 500px; height: 500px; background-color: #fff;"><span></span>
        <div id="slider" class="flexslider">
                <ul class="slides" style="margin-top: 50px;">
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/repository.png');?>" />
                    </li>
                    <!-- items mirrored twice, total of 12 -->
                </ul>
                </div>
                <div id="carousel" class="flexslider">
                <ul class="slides">
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/repository.png');?>" />
                    </li>
                    <!-- items mirrored twice, total of 12 -->
                </ul>
        </div>
    </div>
 
    

    <div class="col mt-5" style="background-color: #fff; padding: 36px;">
    <input type="hidden" id="repository_id" name="repository_id" value="<?php echo $InAc['ID_Activities'];?> ">
        <h1>ชื่อกิจกรรม : <?php echo $InAc['Name_Activities'];?> </h1>  
        <p style="font-weight: 500;">ประเภทกิจกรรม : <?php echo $InAc['Type'];?></p>
        <p style="font-weight: 500;">วันที่จัดกิจกรรม : <?php 
                                                                                            $var_date = $InAc['DateStart'];
                                                                                            $strDate = $var_date;
                                                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                                                            $strMonth= date("n",strtotime($strDate));
                                                                                            $strDay= date("j",strtotime($strDate));
                                                                                            $strH = date("H",strtotime($InAc['TimeStart']));
                                                                                            $stri = date("i",strtotime($InAc['TimeStart']));
                                                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                                            "พฤศจิกายน","ธันวาคม");
                                                                                            $strMonthThai=$strMonthCut[$strMonth];
                                                
                                                                                            echo $strDay." ".$strMonthThai." ".$strYear." เวลา ".$strH.":".$stri;
                                                                                        ?></p>
        <p style="font-weight: 500;">วันที่สิ้นสุดกิจกรรม : <?php 
                                                                                            $var_date = $InAc['DateEnd'];
                                                                                            $strDate = $var_date;
                                                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                                                            $strMonth= date("n",strtotime($strDate));
                                                                                            $strDay= date("j",strtotime($strDate));
                                                                                            $strH = date("H",strtotime($InAc['TimeEnd']));
                                                                                            $stri = date("i",strtotime($InAc['TimeEnd']));
                                                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                                            "พฤศจิกายน","ธันวาคม");
                                                                                            $strMonthThai=$strMonthCut[$strMonth];
                                                
                                                                                            echo $strDay." ".$strMonthThai." ".$strYear." เวลา ".$strH.":".$stri;
                                                                                        ?></p>                                                                                  
    
       
        
              
    </div>
  
    <div class="w-100"></div>
    <div class="nav-wrapper">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>รายละเอียด</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>เอกสารในกิจกรรมนี้</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fa fa-money mr-2" aria-hidden="true"></i>จัดการงบประมาณในกิจกรรม</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fa fa-question mr-2" aria-hidden="true"></i>คำถาม</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-5-tab" data-toggle="tab" href="#tabs-icons-text-5" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fa fa-user mr-2" aria-hidden="true"></i>สาขาที่เข้าร่วม</a>
        </li>
    </ul>
</div>
<div class="card shadow w-100">
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab" style="width: max;">
                <p class="description"><?php echo $InAc['Detail'];?></p>
                <p class="description" style=></p>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
            <div class="table-responsive">
            <a href="<?php echo site_url(); ?>Uploadfile/uploadfileActivities/<?php echo  $InAc['ID_Activities'];?>"  class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" >เพิ่มเอกสารลงในกิจกรรมนี้</a>
              <table class="table align-items-center table-flush" id="Filetable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><h4>ชื่อเอกสาร</h4></th>
                    <th style="text-align:center;" scope="col"><h4>สร้างโดย</h4></th>
                    <th style="text-align:center;" scope="col"><h4>เมื่อวันที่</h4></th>
                    <th style="text-align:center;" scope="col"><h4>ดูข้อมูลเอกสาร</h4></th>
                    <th style="text-align:center;" scope="col"><h4>แก้ไขข้อมูลเอกสาร</h4></th>
                    <th style="text-align:center;" scope="col"><h4>ลบข้อมูลเอกสาร</h4></th>
                  </tr>
                </thead>
                <tbody>
          
                <?php 
                    
                    $this->db->where('ID_Activities',  $InAc['ID_Activities']);
                    $data = $this->db->get('Document');
                    foreach($data->result_array() as $r)
                    {?>

                

                  <tr>
                  <?php  $this->db->where('Id_Student', $r['UploadBy']);
                          $query = $this->db->get('student');
                          $showdata = $query->row_array(); 
                  ?>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                        <img src="<?php echo base_url().'assets/img/logofile/'. $r['Type']?>.png" alt="">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo  $r['Name_Document'];?></span>
                        </div>
                      </div>
                    </th> 
                    <td>
                    <?php echo $showdata['Fname'];?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i> <?php echo date('d/m/Y', strtotime($r['Date']));?>
                      </span>
                    </td>   
                    <td class="">
                        <div>
                        <a href="<?php echo site_url(); ?>DetailDoc/view/<?php echo  $r['ID_Document'];?>"  class="btn btn-primary mb-3">View</a>                 
                        </div>
                       
                    </td>
                   
                        <td class="">
                          
                          <div>
                            <a href="<?php echo site_url(); ?>EditUploadfile/edit/<?php echo  $r['ID_Document'];?>"  class="btn btn-success mb-3" >Edit</a>                
                            </div>
                          
                        </td>
                        <td>
                        <a href="<?php echo site_url(); ?>EditUploadfile/delete/<?php echo  $r['ID_Document'];?>" onclick="return confirm('คุณต้องการลบไฟล์นี้ใช่หรือไม่ ?')" class="btn btn-danger mb-3">Delete</a>
                        </td>   
                    
                  </tr>
                  <?php }?>
                  <?php } endif; ?>
                </tbody>
                </table>
                </div>
            </div>    
                </tbody>          
                    </table>
                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                    <div class="table-responsive" id="Showloan">

                    <?php
                     $idAc = $InAc['ID_Activities'];
                          $result = $this->db->query("SELECT *
                          FROM Loan
                          WHERE Id_Activities = $idAc ");
                    
                if($result->num_rows() == 0)
                {?>
                    <div class="ct-example tab-content tab-example-result" style="
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
  
                            <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ยังไม่มีการจัดการค่าใช้จ่ายภายในกิจกรรม</h2>
                            <button type="button" class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal" data-target="#AddLoan">
                            เพิ่มค่าใช้จ่ายในกิจกรรม
                            </button>
                        </div>
                    </div>
                <?php 
                }else{
                ?>
                
                <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">จัดการค่าใช้จ่ายภายในกิจกรรม</h2>
                            
                            <button type="button" class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal" data-target="#AddLoan">
                            เพิ่มค่าใช้จ่ายในกิจกรรม
                            </button>

                            <button type="button" class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal" data-target="#CheckAllLoan">
                            ตรวจสอบยอดเงินคงเหลือ
                            </button>

                            <!--------------------------------------- Modal ---------------------------------------------------------------------->
                    <div class="modal fade" id="AddLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">เพิ่มค่าใช่จ่ายในกิจกรรม</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                              <form action="<?php echo base_url('InActivity/InsertLoan/').$idAc; ?>" name="AddLoan_form" id="AddLoan_form" method="post">
                              กรุณากรอกรายการ :
                              <input type="text" class="form-control mt-3 mb-3 ml-2" id="Name_Loan" name="Name_Loan" placeholder="ค่าอาหาร">
                              จำนวนเงินที่เบิก :
                              <input type="text" class="form-control mt-3 mb-3 ml-2" id="Money_Get" name="Money_Get" placeholder="1000">
                              จำนวนเงินที่ใช้ :
                              <input type="text" class="form-control mt-3 mb-3 ml-2" id="Money_Use" name="Money_Use" placeholder="500">
                              กรุณาเลือกตำแหน่ง :
                              <select name="Type" id="Type" >
                                <option value="" disabled selected>กรุณาเลือกประเภท</option>
                                <option value="ค่าใช้สอย">ค่าใช้สอย</option>
                              </select>
                              <input type="hidden" id="ID_Activities" name="ID_Activities" value="<?php echo $idAc ?>">
                              
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-success">ยืนยัน</button>
                            </div>
                            </form>
                         
                        </div>
                      </div>
                    </div>
                    </div>

          <!-------------------------------------------------- end modal ---------------------------------------------------------->
          <?php         $repostrnono = base_url(uri_string());
                        $arraystate2 = (explode("/",$repostrnono));
                        $idRepo = ($arraystate2[6]);

                        $moneyget = $this->db->query("SELECT sum(Money_Get)
                                    as moneyget
                                    FROM Loan
                                    WHERE ID_Activities = '$idRepo'");
                        $sumget =  $moneyget->row_array();

                        $moneyuse = $this->db->query("SELECT sum(Money_Use)
                                    as moneyuse
                                    FROM Loan
                                    WHERE ID_Activities = '$idRepo'");
                        $sumuse =  $moneyuse->row_array();

                        $intget = (int)$sumget['moneyget'];;
                        $intuse = (int)$sumuse['moneyuse'];;
                        $sumall = $intget - $intuse;
                        $showsum = (string)$sumall;

                        
                  ?>  
                     
                                                             <!-- Modal -->
                    <div class="modal fade" id="CheckAllLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">ตรวจสอบยอดเงินคงเหลือ</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                          <p>จำนวนเงินที่เบิกทั้งหมด : <?php echo $sumget['moneyget'];?> บาท</p>
                          <p>จำนวนเงินที่ใช้ทั้งหมด : <?php echo $sumuse['moneyuse'];?> บาท</p>
                          <p>คงเหลือ :  <?php echo $showsum;?> บาท</p>
                          </div>
                          <div class="modal-footer">
                          <a href="<?php echo site_url(); ?>Payloan/ChangeStatus/<?php echo $idRepo;?>"  class="btn btn" style="background-color: #db0f2f; color: #fff;">ขออนุมัติเคลียร์เงิน</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            
                            </div>
                            </form>
                         
                        </div>
                      </div>
                    </div>
                                                            <!--End Modal -->
                            <hr>
                            <div class="table-responsive">   
                                                <table class="table align-items-center table-flush" id="Filesearch">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col"><h4>ชื่อรายการ</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ประเภท</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">จำนวนเงินที่เบิก</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">จำนวนเงินที่ใช้</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เมื่อวันที่</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">แก้ไข</h4></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php                 
                                                        foreach($result->result_array() as $data)
                                                        {?>
                                                    <tr>
                                                        <th scope="row">
                                                        <div class="media align-items-center">
                                                                <a href="#" class="avatar rounded-circle mr-3">
                                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                                </a>
                                                                <div class="media-body">
                                                                    <span class="mb-0 text-sm"> <p style="margin-bottom: 0px;"><?php echo $data['Name_Loan'];?></p> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </th>
                                                        <td>
                                                            <p><?php echo $data['Type'];?></p>
                                                        </td> 
                                                        <td>
                                                            <p><?php echo $data['Money_Get'];?></p>
                                                        </td> 
                                                        <td>
                                                            <p><?php echo $data['Money_Use'];?></p>
                                                        </td> 
                                                        <td>
                                                        <span class="badge badge-dot mr-4">
                                                            <p><?php 
                                                                                            $var_date = $data['Date'];
                                                                                            $strDate = $var_date;
                                                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                                                            $strMonth= date("n",strtotime($strDate));
                                                                                            $strDay= date("j",strtotime($strDate));
                                                                                            $strH = date("H",strtotime($strDate));
                                                                                            $stri = date("i",strtotime($strDate));
                                                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                                            "พฤศจิกายน","ธันวาคม");
                                                                                            $strMonthThai=$strMonthCut[$strMonth];
                                                
                                                                                            echo $strDay." ".$strMonthThai." ".$strYear;
                                                                                        ?></p>
                                                        </span>
                                                        </td> 
                                                        <td class="">
                          
                          <div>
                          <button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal"  data-target="#<?php echo $data['Name_Loan'];?>">Edit</button>                 
                          
                            <div class="modal fade" id="<?php echo $data['Name_Loan'];?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $data['Name_Loan'];?>" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content" style="color: #2d3436;">
                               
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="modal-title-default">แก้ไขข้อมูลค่าใช้จ่าย : <?php echo $data['Name_Loan'];?></h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body">
                                    <form action="<?php echo base_url('InActivity/EditLoan/').$idAc; ?>" name="AddLoan_form" id="AddLoan_form" method="post">
                              กรุณากรอกรายการ :
                              <input type="text" class="form-control mt-3 mb-3 ml-2" id="Name_Loan" name="Name_Loan" value="<?php echo $data['Name_Loan'];?>">
                              จำนวนเงินที่เบิก :
                              <input type="text" class="form-control mt-3 mb-3 ml-2" id="Money_Get" name="Money_Get" value="<?php echo $data['Money_Get'];?>">
                              จำนวนเงินที่ใช้ :
                              <input type="text" class="form-control mt-3 mb-3 ml-2" id="Money_Use" name="Money_Use" value="<?php echo $data['Money_Use'];?>">
                              กรุณาเลือกประเภทค่าใช้จ่าย :
                              <select name="Type" id="Type" >
                                <option value="<?php echo $data['Type'];?>"><?php echo $data['Type'];?></option>
                                <option value="ค่าใช้สอย">ค่าใช้สอย</option>
                              </select>
                              <input type="hidden" id="<?php echo $data['ID_Loan'];?>" name="ID_Loan" value="<?php echo $data['ID_Loan'];?>">
                              
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-success">ยืนยัน</button>
                            <a href="<?php echo site_url(); ?>/InActivity/del/<?php echo $data['ID_Loan'];?>" onclick="return confirm('คุณต้องการรายการ <?php echo $data['Name_Loan']?> ใช่หรือไม่ ?')" class="btn btn-danger">ลบข้อมูลรายการนี้</a>
                            </div>
                              </form>
                        </div>
                        </td>
                                                    </tr>
                                                    <?php } ?> 
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
        
                <?php
                    } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
                  <div class="ct-example tab-content tab-example-result" style="padding: 1.25rem;
                  border-radius: .25rem;
                  background-color: #f7f8f9;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                              <h3 style="text-align: center; color:#2d3436;">โพสต์คำถาม</h3>
                              <form name="sendchat" id="sendchat_form" method="post">
                                  <textarea class="form-control form-control-alternative" name="text" id="text" rows="3" required placeholder="เขียนคำถามที่คุณต้องการคำถามลงไปที่นี่"></textarea>
                                  <button type="submit" class="btn btn btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px; background-color: #00a81f; color: #fff;" >ยืนยันโพสต์</button>
                              </form>
                  </div>
                    <div class="table-responsive" id="ShowChat">

                    </div>
                </div>




<!--------------------------------------------------------- สาขาที่เข้าร่วม ------------------------------------------------------>

                <div class="tab-pane fade" id="tabs-icons-text-5" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                    <div class="table-responsive" id="ShowBranch">

                    <?php
                     $idAc = $InAc['ID_Activities'];
                          $result = $this->db->query("SELECT *
                          FROM Team
                          WHERE ID_Activities = $idAc ");
                    
                if($result->num_rows() == 0)
                {?>
                    <div class="ct-example tab-content tab-example-result" style="
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
  
                            <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ยังไม่มีสาขาใดเข้าร่วมในกิจกรรมนี้</h2>
                            <button type="button" class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal" data-target="#AddBranchInActivity">
                            เพิ่มสาขาที่เข้าร่วมในกิจกรรม
                            </button>
                            
                        </div>
                    </div>
                <?php 
                }else{
                ?>
                
                <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">จัดการสาขาที่เข้าร่วมในกิจกรรม</h2>
                            
                            <button type="button" class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal" data-target="#AddBranchInActivity">
                            เพิ่มสาขาที่เข้าร่วมในกิจกรรม
                            </button>

                            <!--------------------------------------- Modal ---------------------------------------------------------------------->
                    <div class="modal fade" id="AddBranchInActivity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">เพิ่มสาขาที่เข้าร่วมในกิจกรรม</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                              <form action="<?php echo base_url('InActivity/InsertBranchInActivity/').$idAc; ?>" name="AddBranch_form" id="AddBranch_form" method="post">
                              กรุณาเลือกสาขา :
                              <select name="Branch" id="Branch" >
                                <option value="" disabled selected>กรุณาเลือกสาขา</option>
                                <option value="สาขาวิทยาการคอมพิวเตอร์">สาขาวิทยาการคอมพิวเตอร์</option>
                                <option value="สาขาการตลาด">สาขาการตลาด</option>
                                <option value="สาขาบัญชี">สาขาบัญชี</option>
                                <option value="สาขาการจัดการ">สาขาการจัดการ</option>
                                <option value="สาขาเทคโนโลยีโลจิสติกส์และการจัดการ">สาขาเทคโนโลยีโลจิสติกส์และการจัดการ</option>
                                <option value="สาขาการโฆษณาฯ">สาขาการโฆษณาฯ</option>
                                <option value="สาขาเศรษฐศาสตร์">สาขาเศรษฐศาสตร์</option>
                                <option value="สาขามัลติมีเดีย">สาขามัลติมีเดีย</option>
                                <option value="สาขาระบบสารสนเทศฯ">สาขาระบบสารสนเทศฯ</option>
                                <option value="สาขาเทคโนโลยีคอมพิวเตอร์">สาขาเทคโนโลยีคอมพิวเตอร์</option>
                                <option value="สาขาการท่องเที่ยว">สาขาการท่องเที่ยว</option>
                              </select>
                              <input type="hidden" id="ID_Activities" name="ID_Activities" value="<?php echo $idAc ?>">
                              
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-success">ยืนยัน</button>
                            </div>
                            </form>
                         
                        </div>
                      </div>
                    </div>
                    </div>

          <!-------------------------------------------------- end modal ---------------------------------------------------------->
                  
                            <hr>
                            <div class="table-responsive">   
                                                <table class="table align-items-center table-flush" id="Filesearch">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col"><h4>สาขาที่เข้าร่วมกิจกรรม</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ลบ</h4></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php                 
                                                        foreach($result->result_array() as $data)
                                                        {?>
                                                    <tr>
                                                        <th scope="row">
                                                        <div class="media align-items-center">
                                                                <a href="#" class="avatar rounded-circle mr-3">
                                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                                </a>

                                                                <?php  $this->db->where('ID_Branch', $data['Name_Team']);
                                                                        $queryuser = $this->db->get('Branch');
                                                                        $showdata = $queryuser->row_array();
                                                                ?>

                                                                <div class="media-body">
                                                                    <span class="mb-0 text-sm"> <p style="margin-bottom: 0px;"><?php echo $showdata['Name_Branch'];?></p> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </th>
                                                        <td class="">
                          
                          <div>
                           
                          <td>
                        <a href="<?php echo site_url(); ?>InActivity/deleteBranchInActivity/<?php echo $data['ID_Team'];?>" onclick="return confirm('คุณต้องการลบ สาขา<?php echo $data['Name_Team'];?> ออกจากกิจกรรมนี้ใช่หรือไม่ ?')" class="btn btn-danger mb-3">Delete</a>
                        </td>

                            <div class="modal fade" id="<?php echo $data['Name_Team'];?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $data['Name_Team'];?>" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content" style="color: #2d3436;">
                               
                                  
                        </div>
                        </td>
                                                    </tr>
                                                    <?php } ?> 
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
        
                <?php
                    } ?>
                    </div>
                </div>
                <div class="table-responsive" id="ShowBranch">

                    </div>
                </div>
                
                






                </div>
            </div>
            
            <script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
<script>
$(document).ready(function(e) {
	ShowChat();
  setInterval(ShowChat, 3000);
});
        function ShowChat()   
        {
          var val = document.getElementById('repository_id').value
            $.post("<?=base_url('InActivity/ShowChat/')?>"+val,
              function (data) {
                  
                 $("#ShowChat").html(data);
              }
          );
        }
        function reply($idUser)
        {
          console.log($idUser)
          var Id = String($idUser);
          $("#text").val("ตอบกลับคุณ : "+Id+ ",");
        }
</script>

<script>
      $(document).on('submit', '#sendchat_form', function () {
        var val = document.getElementById('repository_id').value
          $.post("<?=base_url('InActivity/InsertPost/')?>"+val, $("#sendchat_form").serialize(),
              function (data) {
                ShowChat();
                $("#text").val("");
              }
          );

        event.preventDefault();
    });
</script>
