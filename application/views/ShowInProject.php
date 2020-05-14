<div class="container">

<?php $repostrnono = base_url(uri_string());
             $arraystate2 = (explode("/",$repostrnono));
             $idRepo = ($arraystate2[5]);?>
<?php
        $this->db->where('Id_Project', $ID);
        $result = $this->db->get('Activities');
        
        $this->db->where('Id_Project', $ID);
        $Project = $this->db->get('Project');
        $ShowProject = $Project->row_array();

        $moneyget = $this->db->query("SELECT sum(Budget)
                                    as Money
                                    FROM Activities
                                    WHERE Id_Project = '$idRepo'");
        $sumget =  $moneyget->row_array();
        $getnewsum = $ShowProject['Money'] - $sumget['Money'];
                                
                if($result->num_rows() == 0)
                {?>
                    <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">กิจกรรมภายในโครงการ       <?php echo '"'.$ShowProject['NameProject'].'"'?></h2>
                            <h2 class="" style="font-size: 25px;">งบประมาณโครงการ       <?php echo number_format($ShowProject['Money'], 2)?></h2>
                            <h2 class="" style="font-size: 25px;">งบประมาณที่เหลือที่สามารถเพิ่มในกิจกรรมได้       <?php echo number_format($getnewsum, 2)?></h2>
                            <hr>       
                            <h2 style=" text-align: center; margin-left: auto; margin-right: auto;"></h2>
                            
                            <?php if($this->session->userdata('Type') == 'Teacher'){ ?>
                                <a href="<?php echo base_url("Event/Teacher/").$idRepo;?>" class="btn btn " style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">เพิ่มกิจกรรม</a>
                                <?php }else{ ?>
                                    <a href="<?php echo base_url("Event/Insert/").$idRepo;?>" class="btn btn " style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">เพิ่มกิจกรรม</a>
                                    <?php }?>

                           
                            <p>ขณะนี้ไม่มีกิจกรรมภายในโครงการ</p>
                        </div>
                    </div>
                <?php 
                }else{
                ?>
                <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">กิจกรรมภายในโครงการ      <?php echo '"'.$ShowProject['NameProject'].'"'?></h2>
                            <h2 class="" style="font-size: 25px;">งบประมาณโครงการ       <?php echo number_format($ShowProject['Money'], 2)?></h2>
                            <h2 class="" style="font-size: 25px;">งบประมาณที่เหลือที่สามารถเพิ่มในกิจกรรมได้       <?php echo number_format($getnewsum, 2)?></h2>
                            <hr>
                            <?php if($this->session->userdata('Department') == 'แผนกงบประมาณ'){ ?>
                                       <?php if($getnewsum == 0){ ?>
                                        <button type="button" class="btn btn"
										style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;"
										data-toggle="modal" data-target="#AlertMoney">เพิ่มกิจกรรม</button>
                                       <?php }else{?>
                                        <a href="<?php echo base_url("Event/Insert/").$idRepo;?>" class="btn btn " style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">เพิ่มกิจกรรม</a>
                                       <?php }?>
                                    <?php }?>
                                    <div class="modal fade" id="AlertMoney" tabindex="-1" role="dialog"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title" id="exampleModalLabel">
														คำเตือน</h1>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<div class="modal-body">

													<h1 style="text-align: center;">ไม่สามารถสร้างกิจกรรมได้</h1>
													<h2 style="text-align: center;">
														เนื่องจากจำนวนเงินโครงการที่เหลือมี 0 บาท</h2>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">ปิด</button>
												</div>
											</div>
										</div>
									</div>
                            <div class="table-responsive">   
                                                <table class="table align-items-center table-flush" id="Filesearch">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col"><h4>ชื่อกิจกรรม</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ประเภทกิจกรรม</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">วันที่เริ่ม</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">วันที่สิ้นสุด</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">งบประมาณกิจกรรม</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ดูรายละเอียดกิจกรรม</h4></th>
                                                        <?php if($this->session->userdata("Type") == "Employee")
                                                          { ?>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">แก้ไข</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ลบ</h4></th>
                                                    <?php }else{ ?>
                                                        
                                                   <?php } ?>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                            <?php   foreach($result->result_array() as $data)
                                                    { ?>

                                                    
                                                    <tr>
                                                        <th scope="row">
                                                        <div class="media align-items-center">
                                                                <a href="#" class="avatar rounded-circle mr-3">
                                                                    <i class="fa fa-bicycle"></i>
                                                                </a>
                                                                <div class="media-body">
                                                                    <span class="mb-0 text-sm"> <p style="margin-bottom: 0px;"><?php echo $data['Name_Activities'];?></p> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </th>
                                                        <?php   $this->db->where('Id_TypeActivity',$data['Type']);
                                                                $datashow = $this->db->get('TypeActivities');
                                                                $showshow = $datashow->row_array();?>
                                                                
                                                        <td>
                                                            <p class="badge badge-dot ml-5">
                                                                    <?php echo $showshow['Name_TypeActivity'];?>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="badge badge-dot mr-3">
                                                                    <?php $var_date = $data['DateStart'];
                                                            $strDate = $var_date;
                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                            $strMonth= date("n",strtotime($strDate));
                                                            $strDay= date("j",strtotime($strDate));
                                                            $strH = date("H",strtotime($strDate));
                                                            $stri = date("i",strtotime($strDate));
                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                            "พฤศจิกายน","ธันวาคม");
                                                            $strMonthThai=$strMonthCut[$strMonth];

                                                            echo $strDay." ".$strMonthThai." ".$strYear;?>
                                                            </p>
                                                        </td>  
                                                        <td>
                                                            <p class="badge badge-dot mr-3">
                                                                    <?php $var_date = $data['DateEnd'];
                                                            $strDate = $var_date;
                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                            $strMonth= date("n",strtotime($strDate));
                                                            $strDay= date("j",strtotime($strDate));
                                                            $strH = date("H",strtotime($strDate));
                                                            $stri = date("i",strtotime($strDate));
                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                            "พฤศจิกายน","ธันวาคม");
                                                            $strMonthThai=$strMonthCut[$strMonth];

                                                            echo $strDay." ".$strMonthThai." ".$strYear;?>
                                                            </p>
                                                        </td>   
                                                        <td>
                                                            <p class="badge badge-dot ml-4">
                                                                    <?php echo number_format($data['Budget'],2);?>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-dot mr-4">
                                                                <a href="<?php echo site_url(); ?>inActivity/showdata/<?php echo $data['ID_Activities'];?>"class="btn btn" style="background-color: #00a81f; color: #fff;">ดูรายละเอียดกิจกรรม</a>
                                                            </span>
                                                        </td>  
                                                    <?php if($this->session->userdata("Department") == "แผนกงบประมาณ")
                                                          { ?>
                                                        <td>
                                                            <span class="badge badge-dot mr-4">
                                                                <a href="<?php echo site_url(); ?>InActivity/EditActivities/<?php echo $data['ID_Activities'];?>"class="btn btn" style="background-color: #edb321; color: #fff;">แก้ไข</a>
                                                            </span>
                                                        </td>  
                                                        <td>
                                                            <span class="badge badge-dot mr-4">
                                                                <a href="<?php echo site_url(); ?>InActivity/DeleteActivities/<?php echo $data['ID_Activities'];?>"class="btn btn" style="background-color: #c62121; color: #fff;">ลบ</a>
                                                            </span>
                                                        </td> 
                                                    <?php } ?>
                                                    </tr>
                                                    <?php }
                                                     ?> 
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
        
                <?php
                }
                ?>
</div>