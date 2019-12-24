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

    public function Test()
    {
        $ID = $this->session->userdata('ID');
        $query = $this->db->query("SELECT Activities.*,student.Fname 
        FROM Activities 
        LEFT JOIN student 
        ON Activities.ApproveBy = student.Id_Student
        WHERE CreateBy = '$ID'");
      
      echo $this->db->last_query();
      
    }
}

/* End of file Index.php */
