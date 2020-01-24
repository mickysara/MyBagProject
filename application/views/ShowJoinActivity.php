<div class="container mb-5">
<?php
$id = $this->session->userdata('ID');
$result = $this->db->query("SELECT NameList.*,Activities.Name_Activities,Activities.Type 
                            FROM Activities,NameList 
                            WHERE Activities.ID_Activities = NameList.ID_Activities AND NameList.TimeIn != '00:00:00' AND NameList.TimeOut != '00:00:00' 
                            AND NameList.ID_List = '$id'");
                                
                if($result->num_rows() == 0)
                {?>
                    <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">กิจกรรมที่เคยเข้าร่วม</h2>
                            <hr>       
                            <h2 style=" text-align: center; margin-left: auto; margin-right: auto;"></h2>
                            <p>คุณไม่ได้เข้าร่วมกิจกรรมอะไรเลย</p>
                        </div>
                    </div>
                <?php 
                }else{
                ?>
                
                <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">กิจกรรมที่เคยเข้าร่วม</h2>
                            <hr>
                            <div class="table-responsive">   
                                                <table class="table align-items-center table-flush noExl" id="table2excel">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col"><h4>ชื่อกิจกรรม</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ประเภท</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เข้าร่วมเมื่อวันที่</h4></th>
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
                                                                    <span class="mb-0 text-sm"> <p style="margin-bottom: 0px;"><?php echo $data['Name_Activities']?></p> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </th>
                                                        <td>
                                                            <p>
                                                                    <?php   
                                                                            echo $data['Type'];
                                                                    ?>
                                                            </p>
                                                        </td> 
                                                        <td>
                                                            <p>
                                                                    <?php $var_date = $data['Date'];
                                                                    $strDate = $var_date;
                                                                    $strYear = date("Y",strtotime($strDate))+543;
                                                                    $strMonth= date("n",strtotime($strDate));
                                                                    $strDay= date("j",strtotime($strDate));
                                                                    $strH = date("H",strtotime($strDate));
                                                                    $stri = date("i",strtotime($strDate));
                                                                    $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                    "พฤศจิกายน","ธันวาคม");
                                                                    $strMonthThai=$strMonthCut[$strMonth];

                                                                    echo $strDay." ".$strMonthThai." ".$strYear; ?>
                                                            </p>
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