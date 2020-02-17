<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('_success') == null)
        {
            $this->load->view('Header');
            $this->load->view('Home');
            $this->load->view('Footer');
        }
        else
        {
            
            redirect('MyDoc','refresh');
            
        }

    }

    public function Login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->where('Id_Student',  $username);
        $this->db->where('Password', $password);
        $query = $this->db->get('student', 1);
        

        if($query->num_rows() == 1)
        {
           $data = $query->row_array();
           $data['_success'] = 1;
           $data['ID'] = $data['Id_Student'];
           $data['Type']  = "Student";
           $this->session->set_userdata($data);

           if($this->session->userdata('login_referrer')!=""){
            $tmp_referrer = $this->session->userdata('login_referrer');
            $this->session->unset_userdata('login_referrer');

            echo json_encode(['status' => 2, 'msg' => 'Success', 'data' => $tmp_referrer]);
            }
            else
            {
              echo json_encode(['status' => 1, 'msg' => 'Success']);
            }
        }
        else
        {
            $this->db->where('ID_Teacher', $username);
            $this->db->where('Password', $password);
            $query = $this->db->get('Teacher', 1);

            if($query->num_rows() == 1)
            {
            $data = $query->row_array();
            $data['_success'] = 1;
            $data['ID'] = $data['ID_Teacher'];
            $data['Type']  = "Teacher";
            $this->session->set_userdata($data);

                if($this->session->userdata('login_referrer')!=""){
                    $tmp_referrer = $this->session->userdata('login_referrer');
                    $this->session->unset_userdata('login_referrer');

                    echo json_encode(['status' => 2, 'msg' => 'Success', 'data' => $tmp_referrer]);
                }
                else
                {
                    echo json_encode(['status' => 1, 'msg' => 'Success']);
                }
            }else{

                $this->db->where('Id_Employee', $username);
                $this->db->where('Password', $password);
                $query = $this->db->get('Employee', 1);

                if($query->num_rows() == 1)
                {
                  $data = $query->row_array();
                  $data['_success'] = 1;
                  $data['ID'] = $data['Id_Employee'];
                  $data['Type']  = "Employee";
                  $this->session->set_userdata($data);
       
                  if($this->session->userdata('login_referrer')!=""){
                   $tmp_referrer = $this->session->userdata('login_referrer');
                   $this->session->unset_userdata('login_referrer');
       
                   echo json_encode(['status' => 2, 'msg' => 'Success', 'data' => $tmp_referrer]);
                   }else
                   {
                     echo json_encode(['status' => 1, 'msg' => 'Success']);
                   }
                }else{
                 echo json_encode(['status' => 0, 'msg' => 'fail']);
             
                 
                }
            }
        } 
    }

    public function Logout()
    {
        session_destroy();
        
      redirect('/Home','refresh');
    }

    public function IncreaseNoti()
    {

      $this->db->where('Notifi', '1');
      $this->db->where('ID_User', $this->session->userdata('Id_Users'));
      $user = $this->db->get('Notification');


      echo json_decode($user->num_rows());

    }

    public function IncreaseDetailNoti()
    {

      $this->db->where('ID_User', $this->session->userdata('Id_Users'));
      $this->db->order_by('Date', 'desc');
      $query = $this->db->get('Notification');

        if($query->num_rows() == 0) 
        {?>
        <div>
            <a class="dropdown-item" href="#">
              <p> ไม่มีการแจ้งเตือนของคุณ </p> 
            </a>
              <div class="dropdown-divider"></div>
        </div>
      <?php 
        }else{ 
          foreach($query->result_array() as $d)
          {?>
        
            <div>
              <a class="dropdown-item" href="<?php echo base_url("MyDoc");?>">
                <div style="overflow-wrap: break-word;">
                  <p style="    word-break: break-all;
    white-space: normal;"> <?php echo $d['Detail']; ?></p> 
                </div>
                <p> <i class="fa fa-comment" aria-hidden="true" style="color: #00a81f;"></i> เมื่อ <?php 
                                            $var_date = $d['Date'];
                                            $strDate = $var_date;
                                            $strYear = date("Y",strtotime($strDate))+543;
                                            $strMonth= date("n",strtotime($strDate));
                                            $strDay= date("j",strtotime($strDate));
                                            $strH = date("H",strtotime($strDate));
                                            $stri = date("i",strtotime($strDate));
                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                            "พฤศจิกายน","ธันวาคม");
                                            $strMonthThai=$strMonthCut[$strMonth];

                                            echo $strDay." ".$strMonthThai." ".$strYear." เวลา ".$strH.":".$stri;?></p>
              </a>
            <div class="dropdown-divider"></div>
           
        </div>
      <?php  } 
      }
    
  
    }

    public function DecreaseNoti()
    {

      $accname = $this->session->userdata('Id_Users');

      $this->db->set('Notifi', '0');
      $this->db->where('ID_User', $accname);
      $this->db->update('Notification');
    }

    public function Test()
    {
        $this->load->view('Header');
        $this->load->view('Test');
        $this->load->view('Footer');
      
    }

    public function EjectDeposit()
    {
        $id = $this->input->post('id');
        $Detail = $this->input->post('login');
        $idemp =  $this->session->userdata('Id_Employee');
        $object = array(
          'ID_Deposit'  =>  $id,
          'Detail'      =>  $Detail,
          'ApproveBy'   =>  $idemp
        );
        $this->db->insert('EjectDeposit', $object);

        $object = array(
          'Status'  =>  'ไม่อนุมัติ'
        );
        $this->db->where('ID_Deposit', $id);
        $this->db->update('Depoosit', $object);
        
        echo json_encode(['status' => 1, 'msg' => 'Susscess']);
    }
}

/* End of file Index.php */
