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
            'Id_Activities'   =>  $idAc
        );
        $this->db->insert('Loan', $object);

        redirect('InActivity/showdata/'.$idAc,'refresh');
    
    
    }

    public function InsertTeamInActivity($idAc)
    {
        // $this->db->where('Name_Branch', $this->input->post('Branch'));
        // $queryuser = $this->db->get('Branch');
        // $showdata = $queryuser->row_array();

        $object = array(
            'Name_Team'  =>  $this->input->post('Team'),
            'ID_Activities'   =>  $idAc
        );
        $this->db->insert('Team', $object);

        redirect('InActivity/showdata/'.$idAc,'refresh');
    
    
    }

    public function InsertListInActivity($idAc)
    {
        $this->db->where('ID_Branch', $this->input->post('Branch'));
        $queryuser = $this->db->get('Branch');
        $showdata = $queryuser->row_array();

        $this->db->where('Year', $this->input->post('Year'));
        $this->db->where('Branch', $showdata['ID_Branch']);
        $queryuser2 = $this->db->get('student');
        foreach($queryuser2->result_array() as $data){

            // echo $data['Id_Student'];
        
        // print_r($_POST);

        $object = array(
            'ID_List'  =>  $data['Id_Users'],
            'ID_Activities'   =>  $idAc
        );
        $this->db->insert('NameList', $object);
        
        }
        redirect('InActivity/showdata/'.$idAc,'refresh'); 
    }
    // public function EditBranchInActivity($idAc)
    // {
    //     $object = array(
    //         'Name_Team'  =>  $this->input->post('Branch'),
    //         'ID_Activities'   =>  $idAc
    //     );
    //     $this->db->where('ID_Team', $this->input->post('ID_Team'));
    //     $query=$this->db->update('Team',$object);

    //     redirect('InActivity/showdata/'.$idAc,'refresh');
    
    
    // }
    public function EditLoan($idAc)
    {
        $dateshow = date("Y/m/d");
        $object = array(
            'Name_Loan'  =>  $this->input->post('Name_Loan'),
            'Type'   =>  $this->input->post('Type'),
            'Money_Get'  =>  $this->input->post('Money_Get'),
            'Money_Use'  =>  $this->input->post('Money_Use'),
            'Id_Activities'   =>  $idAc
        );
        $this->db->where('ID_Loan', $this->input->post('ID_Loan'));
        $query=$this->db->update('Loan',$object);

        redirect('InActivity/showdata/'.$idAc,'refresh');
    
    
    }
    public function deleteListInActivity($idList)
    {

        $this->db->where('ID_NameList', $idList);
        $queryuser = $this->db->get('NameList');
        $showdata = $queryuser->row_array();

        $this->db->where('ID_NameList', $idList);
        $this->db->delete('NameList');
        
        redirect('InActivity/showdata/'.$showdata['ID_Activities'],'refresh');
    
    
    }
    public function DeleteAllListInActivity($idList)
    {

        $this->db->where('ID_NameList', $idList);
        $queryuser = $this->db->get('NameList');
        $showdata = $queryuser->row_array();
        
            $this->db->where('ID_Branch', $this->input->post('List'));
            $this->db->delete('NameList');
            
        redirect('InActivity/showdata/'.$this->input->post('ID_Activities'),'refresh'); 
    
    }
   
    public function  DeleteselectListInActivity()
    {
        $idAc=$_REQUEST['idAc'];
                $idUser=$_REQUEST['idUser'];
                // echo $idAc;
                // echo $idUser;

            $this->db->where('ID_List',$idUser);
            $this->db->where('ID_Activities',$idAc);
            $this->db->delete('NameList');
            
        redirect('InActivity/showdata/'.$idAc,'refresh'); 
            
    
    }
    public function deleteTeamInActivity($idTeam)
    {

        $this->db->where('ID_Team', $idTeam);
        $queryuser = $this->db->get('Team');
        $showdata = $queryuser->row_array();

        $this->db->where('ID_Team', $idTeam);
        $this->db->delete('Team');
        
        redirect('InActivity/showdata/'.$showdata['ID_Activities'],'refresh');
    
    
    }
    public function del($idloan)
    {

        $this->db->where('ID_Loan', $idloan);
        $queryuser = $this->db->get('Loan');
        $showdata = $queryuser->row_array();

        $this->db->where('ID_Loan', $idloan);
        $this->db->delete('Loan');
        
        redirect('InActivity/showdata/'.$showdata['Id_Activities'],'refresh');
    
    
    }
    public function InsertPost($idAc)
    { 
        $this->db->where('Id_Student',$this->session->userdata('ID'));
        $showname = $this->db->get('student');
        if($showname->num_rows() == 1)
        {
            $showname2 = $showname->row_array();
        }else{
            
            $this->db->where('ID_Teacher',$this->session->userdata('ID'));
            $showname = $this->db->get('Teacher');

            if($showname->num_rows() == 1)
            {
                $showname2 = $showname->row_array();
            }else{
                $this->db->where('Id_Employee',$this->session->userdata('ID'));
                $showname = $this->db->get('Employee');
                $showname2 = $showname->row_array();
            }
        }

        date_default_timezone_set('Asia/Bangkok');
        $object = array(
            'Det_Question'  =>  $this->input->post('Post'),
            'Question_By'   =>  $showname2['Id_Users'],
            'Id_Activity'   =>  $idAc
        );
        $this->db->insert('Question', $object);

        $ID = $showname2['Id_Users'];

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

    public function showloan()
    {
        
    }
    
    public function ShowChat($idAc)
    {
        $this->db->where('Id_Activity', $idAc);
        $this->db->order_by('Datetime', 'DESC');
        $query = $this->db->get('Question');
        foreach($query->result_array() as $data)
          { 
            $this->db->where('Id_Users', $data['Question_By']);
            $query = $this->db->get('student');
            $shownameinchat = $query->row_array();
            
            ?>

                 
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
                                        <p style="margin-bottom: 0px; font-weight: 600; font-size: 18px; width: max-content;">โดย <?php echo $shownameinchat['Fname']." ".$shownameinchat['Lname'] ?> </p>
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
                            <a id="like" class="btn btn-outline-primary" value="<?php echo $data['Question_By'] ?>" onClick = "reply('<?=trim($data['Question_By'])?>');" href="#text" style="">
                                                <span class="btn-inner--text">ตอบกลับ</span>  
                                        </a>
                            </div>
                    </div>

    <?php } 
    }
    
    

    public function change($g)
    { ?>
        <option value="">กรุณาเลือกคณะ</option>
   <?php 
   $this->db->select('*');
   $this->db->where('ID_Campus',$g);
   $eiei = $this->db->get('Major');
   $show = $eiei->result_array();
   foreach($show as $show2)
   { ?>
       <option value="<?php echo $show2['ID_Major']?>"><?php echo $show2['Name_Major'] ?></option>
   <?php }
    }

    
    public function changetwo($g)
    { ?>
        <option value="">กรุณาเลือกสาขา</option>
   <?php 
   $this->db->select('*');
   $this->db->where('ID_Major',$g);
   $eieiei = $this->db->get('Branch');
   $showw = $eieiei->result_array();
   foreach($showw as $showw2)
   { ?>
       <option value="<?php echo $showw2['ID_Branch']?>"><?php echo $showw2['Name_Branch'] ?></option>
   <?php }
    }

    public function addlist(){
        
        $id=$_REQUEST['id'];
        $fname=$_REQUEST['Fname'];
         
            $this->db->where('ID_Team', $id);
            $queryuser = $this->db->get('Team');
            $showdata = $queryuser->row_array();

            $this->db->where('Fname', $fname);
            $queryuser2 = $this->db->get('student');
            $showdata2 = $queryuser2->row_array();

            $object = array(
                'ID_Activities'  =>  $showdata['ID_Activities'],
                'Id_Student'  =>  $showdata2['Id_Student'],
                'ID_Team'   =>  $id
            );
            $this->db->insert('InTeam', $object);
    
            redirect('InActivity/showdata/'.$showdata['ID_Activities'],'refresh');

        // echo $id;
        // echo $fname;
    }
    }
   ?>
  

  


