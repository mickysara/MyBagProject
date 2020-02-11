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
    public function Teacher()
    {
        if($this->session->userdata('_success') == ''){
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('Alert/Loginalert');
        }else{
        $this->load->view('Header');
        $this->load->view('ApproveActivityTeacher');
        $this->load->view('Footer');
        }
    }

    public function Approve($id)
    {
        if($this->session->userdata('Type') == 'Employee')
        {
            $dateshow = date("Y/m/d");
            $data = array(
                'Status'    =>  'อนุมัติ',
                'ApproveBy' => $this->session->userdata('Id_Users'),
                'Dateapprove' => $dateshow 
            );
    
            $this->db->where('Id_Project', $id);   
            $this->db->update('Project', $data);
            redirect('ApproveActivity/Teacher','refresh');

        }else{
            $dateshow = date("Y/m/d");
            $data = array(
                'Status'    =>  'อนุมัติ',
                'ApproveBy' => $this->session->userdata('Id_Users'),
                'Dateapprove' => $dateshow 
            );
    
            $this->db->where('Id_Project', $id);   
            $this->db->update('Project', $data);
            redirect('ApproveActivity','refresh');
        }
      
    }

    public function Eject($id)
    {
        if($this->session->userdata('Type') == 'Employee')
        {
            $dateshow = date("Y/m/d");
            $data = array(
                'Status'    =>  'อนุมัติ',
                'ApproveBy' => $this->session->userdata('Id_Users'),
                'Dateapprove' => $dateshow 
            );
    
            $this->db->where('Id_Project', $id);   
            $this->db->update('Project', $data);
            redirect('ApproveActivity/Teacher','refresh');

        }else{
        $data = array(
            'Status'    =>  'ไม่อนุมัติ',
            'ApproveBy' => $this->session->userdata('Id_Users')
        );

        $this->db->where('Id_Project', $id);   
        $this->db->update('Project', $data);
        
        redirect('ApproveActivity','refresh');
        
        ;
        
    }
    }

}

/* End of file ApproveActivity.php */
