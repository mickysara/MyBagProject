<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Transaction');
        $this->load->view('Footer');
    }

    public function ShowTransaction()
    {
        $this->db->where('Transaction_Of',1);
        
        
        $result = $this->db->get('Transaction');
        
                    
                if($result->num_rows() == 0)
                {?>
                    <h1>ธุรกรรมภายในบัญชี</h1>
                        <div class="question-item_like" align="right" style="align:right;">
                            <h2 style="">เงินในบัญชีของคุณ: 200.00 บาท</h2>
                        </div>
                <?php 
                }else{
                ?>
                
                <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">ธุรกรรมบัญชี</h2>
                            <hr>
                            <div class="table-responsive">   
                                                <table class="table align-items-center table-flush" id="Filesearch">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col"><h4>ชื่อรายการ</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">จำนวนเงิน</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">บัญชีที่รับ </h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">สถานะ</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">รายละเอียด</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เอกสารยืนยัน</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">อนุมัติ</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ไม่อนุมัติ</h4></th>
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
                                                                    <i class="fa fa-bicycle"></i>
                                                                </a>
                                                                <div class="media-body">
                                                                    <span class="mb-0 text-sm"> <p style="margin-bottom: 0px;"><?php echo $data['Name_Activities'];?></p> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </th>
                                                        <td>
                                                        <span class="badge badge-dot mr-4">
                                                            <p><?php 
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
                                                                                        ?></p>
                                                        </span>
                                                        </td> 
                                                        <td>
                                                        <span class="badge badge-dot mr-4">
                                                            <p><?php echo $data['Fname'];?></p>
                                                        </span>
                                                        </td> 
                                                        <td>
                                                        <span class="badge badge-dot mr-4">
                                                            <p>
                                                                <i class="bg-danger"></i>
                                                                    <?php echo $data['Status'];?>
                                                            </p>
                                                        </span>
                                                        </td>
                                                        <td>
                                                        <span class="badge badge-dot mr-4">
                                                            <a href="<?php echo site_url(); ?>DetailDocController/edit/"  class="btn btn mb-3" style="background-color: #2d3436; color: #fff;">ดูรายละเอียดเพิ่มเติม</a>              
                                                        </span>
                                                        </td>  
                                                        </td>  
                                                        <td>
                                                            <a href="<?php echo base_url('uploads/'. $data['Confirm_Doc']) ?>"  class="btn btn mb-3 Doc" style="background-color: #1778F2; color: #fff;">เอกสารยืนยัน</a>              
                                                        </td>  
                                                        <td>
                                                            <span class="badge badge-dot mr-4">
                                                                <a href="#" onClick = "Approve(<?php echo $data['ID_Activities'] ?>);"   class="btn btn mb-3" style="background-color: #00a81f; color: #fff;">อนุมัติ</a>              
                                                            </span>
                                                        </td>  
                                                        <td>
                                                            <span class="badge badge-dot mr-4">
                                                                <a href="#" onClick = "Eject(<?php echo $data['ID_Activities'] ?>);"   class="btn btn mb-3" style="background-color: #db0f2f; color: #fff;">ไม่อนุมัติ</a>              
                                                            </span>
                                                        </td>  
                                                    </tr>
                                                    <?php } ?> 
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
        
                <?php
                }
    }

}

/* End of file Transaction.php */
