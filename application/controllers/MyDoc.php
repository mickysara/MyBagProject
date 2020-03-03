<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MyDoc extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('InsertActivity_Model','InsertActivity'); 
        
    }
    public function index()
    {
        // $this->db->where('Id_Student', $this->session->userdata('ID'));
        // $queryuser = $this->db->get('student');
        // $showdata = $queryuser->row_array();

        // $this->db->where('Id_Employee', $this->session->userdata('ID'));
        // $queryuser2 = $this->db->get('Employee');
        // $showdata2 = $queryuser2->row_array();

        // if($this->session->userdata('_success') == ''){
        //     redirect('Alert/Loginalert');
        // }else if($showdata['Level'] == '2'){
        //     $this->load->view('Header');
        //     $this->load->view('ApproveActivity');
        //     $this->load->view('Footer');
        // }else if($showdata2['Department'] == 'แผนกงบประมาณ'){
        //     $this->load->view('Header');
        //     $this->load->view('ApproveActivity');
        //     $this->load->view('Footer');
        // }else{ 
            if($this->session->userdata('Type') == 'Student'){
                $this->load->view('Header');
                $this->data['view_data']= $this->InsertActivity->view_data2(); //Upfile คือชื่อของโมเดล
                $this->load->view('MyDoc', $this->data, FALSE);
                $this->load->view('Footer');
                
        }else if($this->session->userdata('Type') == 'Teacher'){
            $this->load->view('Header');
            $this->data['view_data']= $this->InsertActivity->view_data3(); //Upfile คือชื่อของโมเดล
            $this->load->view('MyDoc', $this->data, FALSE);
            $this->load->view('Footer');
            
        }else{
            $this->load->view('Header');
            $this->data['view_data']= $this->InsertActivity->view_data(); //Upfile คือชื่อของโมเดล
            $this->load->view('MyDoc', $this->data, FALSE);
            $this->load->view('Footer');
            
        }
    }
    
}

/* End of file MyDoc.php */     