<div class="container">
<?php
$campus = $this->session->userdata('ID_Campus');
$result = $this->db->query("SELECT Activities.*,Campus.Name_Campus 
                            FROM Activities,Campus 
                            WHERE Activities.ID_Campus = Campus.ID_Campus AND Campus.ID_Campus = $campus 
                            ORDER BY Campus.ID_Campus");
                                
                if($result->num_rows() == 0)
                {?>
                    <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">กิจกรรมภายในวิทยาเขต</h2>
                            <hr>       
                            <h2 style=" text-align: center; margin-left: auto; margin-right: auto;"></h2>
                        </div>
                    </div>
                <?php 
                }else{
                ?>
                
                <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">กิจกรรมภายในวิทยาเขต</h2>
                            <hr>
                            <div class="table-responsive">   
                                                <table class="table align-items-center table-flush" id="Filesearch">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col"><h4>ชื่อกิจกรรม</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ประเภทกิจกรรม</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">วันที่เริ่ม</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">วันที่สิ้นสุด</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ดูผลสรุป</h4></th>
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
                                                        <?php $this->db->where('Id_TypeActivity',$data['Type']);
                                                              $TP = $this->db->get('TypeActivities');
                                                              $ttt = $TP->row_array();?>
                                                        <td>
                                                            <p>
                                                                    <?php echo $ttt['Name_TypeActivity'];?>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p>
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
                                                            <p>
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
                                                            <span class="badge badge-dot mr-4">
                                                            <a href="<?php echo site_url(); ?>inActivity/showdata/<?php echo $data['ID_Activities'];?>"class="btn btn" style="background-color: #00a81f; color: #fff;">ดูรายละเอียดกิจกรรม</a>
                                                            </span>
                                                        </td>  

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