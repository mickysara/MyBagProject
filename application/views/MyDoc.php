
<div class="container">

<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">
                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">การขออนุมัติกิจกรรม</h2>
                    <hr>
                    <div class="table-responsive">
                    <a href="<?php echo site_url(); ?>Event"  class="btn btn-success mb-3" style="">ขออนุมัติจัดกิจกรรม</a>     
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>แจ้งเมื่อวันที่</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ชื่อกิจกรรม</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">สถานะ</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> อนุมัติโดย </h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เมื่อวันที่</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ดูรายละเอียด</h4></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if(isset($view_data) && is_array($view_data) && count($view_data)): $i=0;
                                            foreach ($view_data as $key => $data) { 

                                            
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3">
                                                    <i class="fa fa-bicycle"></i>
                                                    </a>
                                                    <div class="media-body">
                                                    <span class="mb-0 text-sm"> <p style="margin-bottom: 0px;"><?php 
                                                                                            $var_date = $data['DateSent'];
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
                                                                                        ?></p> </span>
                                                    </div>
                                                </div>
                                                </th>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                     <p style="margin-bottom: 0px;"><?php echo $data['Name_Activities'];?></p>
                                                </span>
                                                </td>
                                                <?php if($data['Status'] == "อนุมัติ")
                                                { ?>

                                                <td>
                                                    <span class="badge badge-dot mr-4">
                                                        <p style="margin-bottom: 0px;"><i class="bg-success"></i><?php echo $data['Status'];?></p>
                                                    </span>
                                                </td>   

                                                <?php }else if ($data['Status'] == "ไม่อนุมัติ")
                                                {?>
                                                    <td>
                                                        <span class="badge badge-dot mr-4">
                                                            <p style="margin-bottom: 0px;"><i class="bg-danger"></i><?php echo $data['Status'];?></p>
                                                        </span>
                                                    </td>   
                                                <?php } else { ?>
                                                    <td>
                                                        <span class="badge badge-dot mr-4">
                                                            <p style="margin-bottom: 0px;"><i class="bg-info"></i><?php echo $data['Status'];?></p>
                                                        </span>
                                                    </td>   
                                                 <?php }?>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                     <p style="margin-bottom: 0px;"><?php echo $data['Fname'];?></p>
                                                </span>
                                                </td>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                     <p style="margin-bottom: 0px;"><?php echo $data['DateSent'];?></p>
                                                </span>
                                                </td>
                                                <td class="">
                                                    <div>
                                                        <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal"  data-target="#<?php echo $data['Name_Activities'];?>">View</button>                           
                                                        <div class="modal fade" id="<?php echo $data['Name_Activities'];?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $data['Name_Activities'];?>" aria-hidden="true">
                                                        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                                            <div class="modal-content" style="color: #2d3436;">
                                                            
                                                                <div class="modal-header">
                                                                    <h2 class="modal-title" id="modal-title-default">ชื่อกิจกรรม : <?php echo $data['Name_Activities'];?></h2>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                
                                                                <?php 
                                                                    $publicdatestart = date('d/m/Y', strtotime($data['DateStart']));
                                                                    $publicdateend = date('d/m/Y', strtotime($data['DateEnd']));
                                                                    ?>
                                                                <div class="modal-body" >
                                                                    <p>รายละเอียด : <?php echo $data['Detail'];?> </p>
                                                                    <p>ประเภทกิจกรรม : <?php echo $data['Type'];?></p>
                                                                    <p>วันเริ่มกิจกรรม : <?php echo date('d/m/Y', strtotime($data['DateStart']));?></p>
                                                                    <p>วันสิ้นสุดกิจกรรม : <?php echo date('d/m/Y', strtotime($data['DateEnd']));?></p>
                                                                    <p>เวลาเริ่มกิจกรรม : <?php echo $data['TimeStart'];?></p>
                                                                    <p>เวลาสิ้นสุดกิจกรรม :  <?php echo $data['TimeEnd'];?></p>
                                                                    <p>ผู้ดำเนินกิจกรรม :  <?php echo $data['Student_res'];?></p>
                                                                    <p>อาจารย์ที่ปึกษากิจกรรม :  <?php echo $data['Teacher_res'];?></p>
                                                                    <p>สถานะกิจกรรม :  <?php echo $data['Status'];?></p>
                                                                    <p>อนุมัติการจัดกิจกรรมโดย :  <?php echo $data['ApproveBy'];?></p>
                                                                </div>
                                                                <div class="modal-footer">    
                                                                <a href="<?php echo site_url(); ?>InActivity/showdata/<?php echo $data['ID_Activities'];?>"class="btn btn-success">จัดการข้อมูลในกิจกรรม</a>
                                                                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                            
                                                    </div>
                                                    
                                                </td>
                                            </tr>
                                            <?php } endif; ?> 
                                            </tbody>
                                        </table>
                                        </div>
    </div>

</div>