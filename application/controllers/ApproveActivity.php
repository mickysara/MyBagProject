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
        $dateshow = date("Y/m/d");
        $data = array(
            'Status'    =>  'อนุมัติ',
            'ApproveBy' => $this->session->userdata('ID'),
            'Dateapprove' => $dateshow 
        );

        $this->db->where('ID_Activities', $id);   
        $this->db->update('Activities', $data);
        redirect('ApproveActivity','refresh');
    }

    public function Eject($id)
    {
        $data = array(
            'Status'    =>  'ไม่อนุมัติ',
            'ApproveBy' => $this->session->userdata('ID')
        );

        $this->db->where('ID_Activities', $id);   
        $this->db->update('Activities', $data);
        
        redirect('ApproveActivity','refresh');
        
        ;
        
    }


}

/* End of file ApproveActivity.php */
