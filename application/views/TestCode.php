
                            <div class="table-responsive"> 
                            <?php
                            
                            $query  =  $this->db->query("SELECT Team.ID_Team,Team.Name_Team,InTeam.Id_Users 
                                                         FROM Team,InTeam
                                                         WHERE Team.ID_Team = InTeam.ID_Team
                                                         AND InTeam.ID_Activities = $idAc
                                                         ORDER BY ID_Team ASC");

                            $query2  =  $this->db->query("SELECT student.Fname,student.Lname,student.Id_Users
                            FROM student,InTeam
                            WHERE InTeam.Id_Users  = student.Id_Users
                            AND InTeam.ID_Activities = $idAc 
                            ORDER BY ID_Team ASC");

                                foreach ($query->result_array() as $Show)
                                { ?>
                                    <h2><?php echo $Show['ID_Team']."."." ".$Show['Name_Team'] ?></h2> 
                                                   
                                   <?php  foreach ($query2->result_array() as $Show2)
                                          { 
                                            if($Show['Id_Users'] == $Show2['Id_Users']){

                                            
                                             ?>

                                   <p style="margin-left: 30px"> <?php echo "- ".$Show2['Fname']." ".$Show2['Lname']?>
                                   <?php 
                                 $this->db->where('ID_Activities',$idAc);
                                 $acid = $this->db->get('Activities');
                                 $showacid = $acid->row_array();
                                 if($this->session->userdata('ID') == $showacid['CreateBy']){ ?>
                             <a href="<?php echo site_url(); ?>/InActivity/DeleteselectListTeamInActivity/?idAc=<?=$idAc;?>&idUser=<?=$Show2['Id_Users'];?>"
                                    onclick="return confirm('คุณต้องการรายการ <?php echo $Show2['Fname']?> ใช่หรือไม่ ?')" 
                                    class="btn btn-danger">ลบข้อมูลรายการนี้</a></p> 
                            <?php  }else{ ?>

                            <?php }?>
                                  

                                <?php           } 
                                          }
                                }   ?>          
                                </div>
                                </div> 

                                
                            </div>                      
                    </div>
                    </div>
                  