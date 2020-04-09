<div class="container mb-5">
<?php
$id = $this->session->userdata('ID');
$result = $this->db->query("SELECT NameList.*,Activities.Name_Activities,Activities.Type 
                            FROM Activities,NameList 
                            WHERE Activities.ID_Activities = NameList.ID_Activities AND NameList.TimeIn IS NOT NULL AND NameList.TimeOut IS NOT NULL 
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
                                <?php 
                                    $query  =  $this->db->query("SELECT Activities.Type 
                                        FROM Activities,NameList 
                                        WHERE Activities.ID_Activities = NameList.ID_Activities AND NameList.TimeIn IS NOT NULL AND NameList.TimeOut IS NOT NULL 
                                        AND NameList.ID_List = '$id'");

                                        foreach ($query->result_array() as $Type)
                                        {?>
                                            <h2><?php echo $Type['Type'] ?></h2>

                                            <?php foreach($result->result_array() as $data)
                                            { 
                                                if($Type['Type'] == $data['Type'])
                                                {
                                                    $var_date = $data['Date'];
                                                    $strDate = $var_date;
                                                    $strYear = date("Y",strtotime($strDate))+543;
                                                    $strMonth= date("n",strtotime($strDate));
                                                    $strDay= date("j",strtotime($strDate));
                                                    $strH = date("H",strtotime($strDate));
                                                    $stri = date("i",strtotime($strDate));
                                                    $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                    "พฤศจิกายน","ธันวาคม");
                                                    $strMonthThai=$strMonthCut[$strMonth]; ?>
                                                  <p style="margin-left: 30px"> <?php echo "- ".$data['Name_Activities']." เมื่อวันที่ ".$strDay." ".$strMonthThai." ".$strYear?></p>
                                        <?php   } 
                                            }?>
                                            
                            <?php       } ?>

                            </div>
                        </div>
        
                <?php
                }
                ?>
</div>