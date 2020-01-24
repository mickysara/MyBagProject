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
                                <?php 
                                    $query  =  $this->db->query("SELECT Activities.Type 
                                        FROM Activities,NameList 
                                        WHERE Activities.ID_Activities = NameList.ID_Activities AND NameList.TimeIn != '00:00:00' AND NameList.TimeOut != '00:00:00' 
                                        AND NameList.ID_List = '$id'");

                                        foreach ($query->result_array() as $Type)
                                        {?>
                                            <h2><?php echo $Type['Type'] ?></h2>

                                            <?php foreach($result->result_array() as $data)
                                            { 
                                                if($Type['Type'] == $data['Type'])
                                                {?>
                                                  <p style="margin-left: 30px">- <?php echo $data['Name_Activities'] ?></p>
                                        <?php      } 
                                            }?>
                                            
                            <?php       } ?>

                            </div>
                        </div>
        
                <?php
                }
                ?>
</div>