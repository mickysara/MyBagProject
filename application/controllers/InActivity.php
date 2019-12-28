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
                                                                    <i class="fa fa-bicycle"></i>
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
    public function showTeam($idAc)
    {
        $result = $this->db->query("SELECT *
        FROM Team
        WHERE Id_Activities = $idAc ");
                    
                if($result->num_rows() == 0)
                {?>
                    <div class="ct-example tab-content tab-example-result" style="
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
        
                        <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
  
                            <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ยังไม่มีคณะกรรมการในกิจกรรม</h2>
                            <button type="button" class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal" data-target="#AddTeam">
                            เพิ่มคณะกรรมการในกิจกรรม
                            </button>




                              <!-- Modal -->
                    <div class="modal fade" id="AddTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">เพิ่มคณะกรรมการ</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                              <form name="login" id="AddTeam_form" method="post">
                              กรุณากรอกรหัสนักศึกษาหรืออาจารย์ :
                              <input type="text" class="form-control mt-3 mb-3 ml-2" id="id_emp" name="id_emp" placeholder="025930461031-6">
                              กรุณาเลือกตำแหน่ง :
                              <select name="Level" id="Level" >
                                <option value="" disabled selected>กรุณาเลือกตำแหน่ง</option>
                                <option value="Viewer">จัดสถานที่</option>
                                <option value="Editor">จัดการงบประมาณ</option>
                                <option value="Manager">พยาบาล</option>
                              </select>
                              <input type="hidden" id="repository_id" name="repository_id" value="<?php ?>">
                              
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-success">ยืนยัน</button>

                            </form>
                          </div>
                        </div>
                      </div>
                    </div>




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
                            <hr>
                            <div class="table-responsive">   
                            <button type="button" class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal" data-target="#AddTeam">
                            เพิ่มคณะกรรมการในกิจกรรม
                            </button>
                           
                                                <table class="table align-items-center table-flush" id="Filesearch">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col"><h4>รายชื่อคณะกรรมการในกิจกรรม</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ชื่อ</h4></th>
                                                        <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ตำแหน่ง</h4></th>
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
                                                                    <span class="mb-0 text-sm"> <p style="margin-bottom: 0px;"><?php echo $data['Name_Loan'];?></p> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </th>
                                                        <td>
                                                            <p><?php echo $data['Type'];?></p>
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
  


