<div class="container" style="margin-bottom: 30px;" >
<?php
$id = $this->session->userdata("Id_Users");
echo $id;
        $result =  $this->db->query("SELECT * FROM Depoosit WHERE Depoosit.DepositBy = $id");            
        if($result->num_rows() == 0)
        {?>
            <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">ผลการแจ้งการฝากเงิน</h2>
                    <hr>       
                    <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">คุณไม่มีการฝากเงิน</h2>
                </div>
            </div>
        <?php 
        }else{
        ?>
        
        <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">ผลการแจ้งการฝากเงิน</h2>
                    <hr>
                    <div class="table-responsive">   
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>วันที่ทำรายการฝาก</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">จำนวนเงิน</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">หลักฐานการโอนเงิน</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">สถานะ</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">หมายเหตุ</h4></th>
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
                                                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <span class="mb-0 text-sm"> <p style="margin-bottom: 0px;"><?php 
                                                            $var_date = $data['DateTime'];
                                                            $strDate = $var_date;
                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                            $strMonth= date("n",strtotime($strDate));
                                                            $strDay= date("j",strtotime($strDate));
                                                            $strH = date("H",strtotime($strDate));
                                                            $stri = date("i",strtotime($strDate));
                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                            "พฤศจิกายน","ธันวาคม");
                                                            $strMonthThai=$strMonthCut[$strMonth];

                                                            echo $strDay." ".$strMonthThai." ".$strYear." เวลา ".$strH.":".$stri;
                                                                                ?></p> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                </th>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                    <p><?php echo $data['Money'];?></p>
                                                </span>
                                                </td> 
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                    <a href="<?php echo base_url("Slip/". $data['Slip']) ?>"  class="btn btn mb-3 Doc" style="background-color: #1778F2; color: #fff;">หลักฐานการโอนเงิน</a>              
                                                </span>
                                                </td>
                                                <td>
                                                    <?php if($data['Status'] == 'รออนุมัติ') 
                                                    { ?>
                                                        <span class="badge badge-dot mr-4">
                                                            <p style="margin-bottom: 0px;"><i class="bg-default"></i><?php echo $data['Status'];?></p>
                                                        </span>
                                              <?php } else if($data['Status'] == 'อนุมัติ')
                                                    { ?>
                                                        <span class="badge badge-dot mr-4">
                                                            <p style="margin-bottom: 0px;"><i class="bg-success"></i><?php echo $data['Status'];?></p>
                                                        </span>
                                              <?php }else{ ?>
                                                        <span class="badge badge-dot mr-4">
                                                            <p style="margin-bottom: 0px;"><i class="bg-Danger"></i><?php echo $data['Status'];?></p>
                                                        </span>
                                            <?php   } ?>
                                                </td>  
                                                <td>
                                                    <?php $this->db->where('ID_Deposit', $data['ID_Deposit']);
                                                        $query = $this->db->get('Note', 1);
                                                        if($query->num_rows() == 1)
                                                        { ?>
                                                            <p><?php echo $data['Detail'] ?></p>
                                                  <?php }else{ ?>
                                                            <p>-</p>
                                                <?php  } ?>
                                                    
                                                </td>  
                                            </tr>
                                            <?php } 
                                        } ?>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
</div>