<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ApproveActivity extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('ApproveActivity');
        $this->load->view('Footer');
    }

    public function Approve($id)
    {
        $data = array(
            'Status'    =>  'อนุมัติ',
            'Dateapprove' => date("Y-m-d"),
            'ApproveBy' =>  $this->session->userdata('Fname')
        );

        $this->db->where('ID_Activities', $id);   
        $this->db->update('Activities', $data);
        
    }

    public function Eject($id)
    {
        $data = array(
            'Status'    =>  'ไม่อนุมัติ'
        );

        $this->db->where('ID_Activities', $id);   
        $this->db->update('Activities', $data);
        
    }

    public function ShowAc()
    {
       
    }

}

/* End of file ApproveActivity.php */
