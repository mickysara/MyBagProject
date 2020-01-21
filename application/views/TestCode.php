<!---------------------------------------------- คณะกรรมการในกิจกรรม ---------------------------------------->
<div class="tab-pane fade" id="tabs-icons-text-6" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                    <div class="table-responsive" id="ShowTeam">

                    <?php
                     $idAc = $InAc['ID_Activities'];
                          $result = $this->db->query("SELECT *
                          FROM Team
                          WHERE ID_Activities = $idAc ");
                    
                if($result->num_rows() == 0)
                {?>
                    <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">จัดการคณะกรรมการในกิจกรรม</h2>
                            
                            <button type="button" class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal" data-target="#AddBranchInActivity">
                            เพิ่มคณะกรรมการในกิจกรรม
                            </button>
                            <div class="modal fade" id="AddBranchInActivity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">เพิ่มคณะกรรมการในกิจกรรม</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                              <form action="<?php echo base_url('InActivity/InsertBranchInActivity/').$idAc; ?>" name="AddBranch_form" id="AddBranch_form" method="post">
                              กรุณาเลือกชื่อกลุ่มกรรมการ :
                              <select name="Team" id="Team" >
                                <option value="" disabled selected>กรุณาเลือกฝ่าย</option>
                                <option value="ฝ่ายสถานที่">ฝ่ายสถานที่</option>
                                <option value="ฝ่ายพยาบาล">ฝ่ายพยาบาล</option>
                                <option value="ฝ่ายงบประมาณ">ฝ่ายงบประมาณ</option>
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
                <?php 
                }else{
                ?>
                
                <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">จัดการคณะกรรมการในกิจกรรม</h2>
                            
                            <button type="button" class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal" data-target="#AddBranchInActivityshow">
                            เพิ่มคณะกรรมการในกิจกรรม
                            </button>

                            <!--------------------------------------- Modal ---------------------------------------------------------------------->
                    <div class="modal fade" id="AddBranchInActivityshow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">เพิ่มคณะกรรมการในกิจกรรม</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                              <form action="<?php echo base_url('InActivity/InsertBranchInActivity/').$idAc; ?>" name="AddBranch_form" id="AddBranch_form" method="post">
                              กรุณาเลือกสาขา :
                              <select name="Branch" id="Branch" >
                              <option value="" disabled selected>กรุณาเลือกฝ่าย</option>
                                <option value="ฝ่ายสถานที่">ฝ่ายสถานที่</option>
                                <option value="ฝ่ายพยาบาล">ฝ่ายพยาบาล</option>
                                <option value="ฝ่ายงบประมาณ">ฝ่ายงบประมาณ</option>
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
                                                        <th scope="col"><h4>คณะกรรมการในกิจกรรม</h4></th>
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
                <div class="table-responsive" id="ShowTeam">

                    </div>
                