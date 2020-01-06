<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class InActivity extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('InsertActivity_Model'); 
    }  

   

    public function index()
    {

        $this->load->view('Header');
        $this->data['InsertActivity']= $this->InsertActivity_Model->InActivity($idAc); //Upfile คือชื่อของโมเดล
        $this->load->view('InActivity', $this->data, FALSE);
        $this->load->view('Footer');
        
    }
    public function showdata($idAc)
    {

        $this->db->where('ID_Activities',$idAc);
        $queryuser = $this->db->get('Activities');
        $showdata = $queryuser->row_array();

            {              
                $this->load->view('Header');
                $this->data['InsertActivity']= $this->InsertActivity_Model->InActivity($showdata['ID_Activities']); //Upfile คือชื่อของโมเดล
                $this->load->view('InActivity', $this->data, FALSE);
                $this->load->view('Footer');    
      
            }
        }
    public function InsertLoan($idAc)
    {
        $dateshow = date("Y/m/d");
        $object = array(
            'Name_Loan'  =>  $this->input->post('Name_Loan'),
            'Type'   =>  $this->input->post('Type'),
            'Date'  =>  $dateshow,
            'Money_Get'  =>  $this->input->post('Money_Get'),
            'Money_Use'  =>  $this->input->post('Money_Use'),
            'Id_Activity'   =>  $idAc
        );
        $this->db->insert('Loan', $object);

    
    
    }
    public function InsertPost($idAc)
    {
        date_default_timezone_set('Asia/Bangkok');
        $object = array(
            'Det_Question'  =>  $this->input->post('text'),
            'Question_By'   =>  $this->session->userdata('ID'),
            'Id_Activity'   =>  $idAc
        );
        $this->db->insert('Question', $object);

        $ID = $this->session->userdata('ID');

        $query = $this->db->query("SELECT Question_By FROM Question WHERE Id_Activity = $idAc and Question_By != '$ID' GROUP BY Question_By;");
        
        print_r($query->result_array());
        foreach($query->result_array() as $data)
        {
            $object = array(
                'PostBy'        =>  $ID,
                'Detail'  =>  'โพสต์บางอย่างลงในกิจกรรม',
                'ID_Activities' =>  $idAc,
                'ID_User'       =>  $data['Question_By'],
                'Notifi'        =>  1
            );
            $this->db->insert('Notification', $object);
            
        }
        

  
    }

    public function showloan($idAc)
    {
        $result = $this->db->query("SELECT *
        FROM Loan
        WHERE Id_Activities = $idAc ");
                    
                if($result->num_rows() == 0)
                {?>
                    <div class="ct-example tab-content tab-example-result" style="
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
  
                            <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ยังไม่มีการจัดการค่าใช้จ่ายภายในกิจกรรม</h2>
                            <button type="button" class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal" data-target="#AddLoan">
                            เพิ่มค่าใช้จ่ายในกิจกรรม
                            </button>
                        </div>
                    </div>
                <?php 
                }else{
                ?>
                
                <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                            <h2 class="" style="font-size: 30px;">จัดการค่าใช้จ่ายภายในกิจกรรม</h2>
                            
                            <button type="button" class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal" data-target="#AddLoan">
                            เพิ่มค่าใช้จ่ายในกิจกรรม
                            </button>

                            <!-- Modal -->
                    <div class="modal fade" id="AddLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">เพิ่มค่าใช่จ่ายในกิจกรรม</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                              <form name="loan" id="AddLoan_form" method="post">
                              กรุณากรอกรายการ :
                              <input type="text" class="form-control mt-3 mb-3 ml-2" id="Name_Loan" name="Name_Loan" placeholder="ค่าอาหาร">
                              จำนวนเงินที่เบิก :
                              <input type="text" class="form-control mt-3 mb-3 ml-2" id="Money_Get" name="Money_Get" placeholder="1000">
                              จำนวนเงินที่ใช้ :
                              <input type="text" class="form-control mt-3 mb-3 ml-2" id="Money_Use" name="Money_Use" placeholder="500">
                              กรุณาเลือกตำแหน่ง :
                              <select name="Type" id="Type" >
                                <option value="" disabled selected>กรุณาเลือกประเภท</option>
                                <option value="ค่าใช้สอย">ค่าใช้สอย</option>
                              </select>
                              <input type="hidden" id="ID_Activities" name="ID_Activities" value="<?php ?>">
                              
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-success">ยืนยัน</button>

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
                                                        <th scope="col"><h4>ชื่อรายการ</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ประเภท</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">จำนวนเงินที่เบิก</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">จำนวนเงินที่ใช้</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เมื่อวันที่</h4></th>
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
                                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                                </a>
                                                                <div class="media-body">
                                                                    <span class="mb-0 text-sm"> <p style="margin-bottom: 0px;"><?php echo $data['Name_Loan'];?></p> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </th>
                                                        <td>
                                                            <p><?php echo $data['Type'];?></p>
                                                        </td> 
                                                        <td>
                                                            <p><?php echo $data['Money_Get'];?></p>
                                                        </td> 
                                                        <td>
                                                            <p><?php echo $data['Money_Use'];?></p>
                                                        </td> 
                                                        <td>
                                                        <span class="badge badge-dot mr-4">
                                                            <p><?php 
                                                                                            $var_date = $data['Date'];
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
                                                    </tr>
                                                    <?php } ?> 
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
        
                <?php
                    }
    }
    
    public function ShowChat($idAc)
    {
        $this->db->where('Id_Activity', $idAc);
        $this->db->order_by('Datetime', 'DESC');
        $query = $this->db->get('Question');
        foreach($query->result_array() as $data)
          { ?>
                    <div class="message" style="padding: 30px; border-bottom: 1px solid #adb5bd;">
                            <div class="message-Hader mb-1" style="display: -webkit-flex;">
                                <div class="avatar" style="margin-right: 15px; width:">
                                    <i class="fa fa-circle-08">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </i>
                                </div>
                                <div class="question-item__header-center" style="-webkit-flex: 1;
                                                                                -ms-flex: 1;
                                                                                /* flex: 1; */
                                                                                /* width: 50%; */
                                                                                /* overflow: hidden; */margin-right: 20px;">
                                    <div class="question-item__author truncate">
                                        <p style="margin-bottom: 0px; font-weight: 600; font-size: 18px; width: max-content;">โดย <?php echo $data['Question_By'] ?> </p>
                                    </div>
                                    <div class="question-item__date"><p style="font-size: 14px; width: max-content;">
                                        <?php                                         
                                        $var_date = $data['Datetime'];
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
                                        ?> </p></div>
                            </div>
                            </div>
                            <div class="question-item_Body" style="word-wrap: break-word;   overflow-wrap: break-word;  overflow: hidden;">
                                    <span><?php echo $data['Det_Question'] ?></span>
                            </div>
                            <div class="question-item_like" align="right" style="align:right;">
                            <a id="like" class="btn btn-outline-primary" value="<?php echo $data['Question_By'] ?>" onClick = "reply('<?=trim($data['Question_By'])?>');" href="#" style="">
                                                <span class="btn-inner--text">ตอบกลับ</span>  
                                        </a>
                            </div>
                    </div>

    <?php } 
    }
    
}
  


