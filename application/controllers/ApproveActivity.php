<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ApproveActivity extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('_success') == ''){
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('Alert/Loginalert');
        }else{
        $this->load->view('Header');
        $this->load->view('ApproveActivity');
        $this->load->view('Footer');
        }
    }

    public function Approve($id)
    {
        $data = array(
            'Status'    =>  'อนุมัติ',
            'ApproveBy' => $this->session->userdata('ID')
        );

        $this->db->where('ID_Activities', $id);   
        $this->db->update('Activities', $data);
        
    }

    public function Eject($id)
    {
        $data = array(
            'Status'    =>  'ไม่อนุมัติ',
            'ApproveBy' => $this->session->userdata('ID')
        );

        $this->db->where('ID_Activities', $id);   
        $this->db->update('Activities', $data);
        
    }


    public function ShowAc()
    {
         
        $result = $this->db->query("SELECT *
        FROM Activities 
        WHERE Status = 'รออนุมัติ'");
                                
                if($result->num_rows() == 0)
                {?>
                    <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">กิจกรรมที่รอการอนุมัติ</h2>
                            <hr>       
                            <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มีกิจกรรมที่รอการอนุมัติ</h2>
                        </div>
                    </div>
                <?php 
                }else{
                ?>
                
                <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">กิจกรรมที่รอการอนุมัติ</h2>
                            <hr>
                            <div class="table-responsive">   
                                                <table class="table align-items-center table-flush" id="Filesearch">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col"><h4>ชื่อกิจกรรม</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">วันที่แจ้ง</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">แจ้งโดย</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">สถานะ</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">รายละเอียด</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เอกสารยืนยัน</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">อนุมัติ</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ไม่อนุมัติ</h4></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php         
                                                    
                                                    $result55 = $this->db->get('student');
                                                    $showdata55 = $result55->row_array();

                                                    $result66 = $this->db->get('Teacher');
                                                    $showdata66 = $result66->row_array();

                                                    $this->db->where('Id_Student',$this->session->userdata('ID'));  
                                                    $result5 = $this->db->get('student');
                                                    $showdata5 = $result5->row_array();

                                                    $this->db->where('ID_Teacher',$this->session->userdata('ID'));  
                                                    $result6 = $this->db->get('Teacher');
                                                    $showdata6 = $result6->row_array();
                                              
                                                    if($this->session->userdata('ID') == $showdata5['Id_Student']){
                                                        $this->db->where('CreateBy', $showdata55['Id_Student']);
                                                        $this->db->where('Status', 'รออนุมัติ');
                                                        $result2 = $this->db->get('Activities');    
                                                    }else{
                                                        $this->db->where('CreateBy', $showdata66['ID_Teacher']);
                                                        $this->db->where('Status', 'รออนุมัติ');
                                                        $result2 = $this->db->get('Activities');    
                                                    }
                                                
                                                        foreach($result2->result_array() as $data)
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
                                                        <?php

                                                        $this->db->where('Id_Student',$data['CreateBy']);
                                                        $result3 = $this->db->get('student');
                                                        $showdata = $result3->row_array();?>

                                                            <p><?php echo $showdata['Fname'];?></p>
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

/* End of file ApproveActivity.php */
