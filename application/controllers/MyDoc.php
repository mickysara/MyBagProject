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
        if($this->session->userdata('_success') == ''){
            redirect('Alert/Loginalert');
        }else{
        $this->load->view('Header');
        $this->data['view_data']= $this->InsertActivity->view_data(); //Upfile คือชื่อของโมเดล
        $this->load->view('MyDoc', $this->data, FALSE);
        $this->load->view('Footer');
        }
    }
}

/* End of file MyDoc.php */     