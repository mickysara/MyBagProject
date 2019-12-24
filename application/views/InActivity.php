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
        <h1>ชื่อกิจกรรม : <?php echo $InAc['Name_Activities'];?> </h1>  
        <p style="font-weight: 500;">สร้างโดย :  <?=$this->session->userdata('Fname')?></p>
        <p style="font-weight: 500;">เมื่อวันที่ : <?php echo date('d/m/Y', strtotime($InAc['DateSent']));?></p>
    
        <a href="<?php echo site_url(); ?>Uploadfile/uploadfileActivities/<?php echo  $InAc['ID_Activities'];?>"  class="btn btn-success" >เพิ่มเอกสารลงในกิจกรรมนี้</a>
        
              
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
              <table class="table align-items-center table-flush" id="Filetable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><h4>ชื่อเอกสาร</h4></th>
                    <th style="text-align:center;" scope="col"><h4>สร้างโดย</h4></th>
                    <th style="text-align:center;" scope="col"><h4>เมื่อวันที่</h4></th>
                    <th style="text-align:center;" scope="col"><h4>View</h4></th>
                    
                  </tr>
                </thead>
                <tbody>
          
                <?php 
                    
                    $this->db->where('ID_Activities',  $InAc['ID_Activities']);
                    $data = $this->db->get('Document');
                    foreach($data->result_array() as $r)
                    {?>

                

                  <tr>
                  
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
                    <?php echo $r['UploadBy'];?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i> <?php echo date('d/m/Y', strtotime($r['Date']));?>
                      </span>
                    </td>   
                    <td class="">
                        <div>
                        <a href="<?php echo site_url(); ?>DetailDocController/editrepo/<?php echo  $r['ID_Activities'];?>"  class="btn btn-primary mb-3">View</a>                 
                        </div>
                       
                    <!-- </td>
                   
                        <td class="">
                          
                          <div>
                            <a href="<?php echo site_url(); ?>EditController/editrepo/<?php echo  $r['ID_Activities'];?>"  class="btn btn-success mb-3" >Edit</a>                
                            </div>
                          
                        </td>
                        <td>
                        <a href="<?php echo site_url(); ?>/ViewController/delfilerepository/<?php echo  $r['ID_Activities'];?>" onclick="return confirm('คุณต้องการลบไฟล์นี้ใช่หรือไม่ ?')" class="btn btn-danger mb-3">Delete</a>
                        </td>    -->
                    
                  </tr>
                  <?php }?>
                  <?php } endif; ?>
                </tbody>
                </table>
                </div>
            </div>    
                </tbody>          
                    </table>
                </div>
            </div>
       

