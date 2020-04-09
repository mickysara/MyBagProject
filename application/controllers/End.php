<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class End extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('InsertActivity_Model','InsertActivity'); 
    }
    public function ShowAll($id)
    {
        $this->load->view('Header');
        $this->data['InsertActivity']= $this->InsertActivity->InActivity($id); //Upfile คือชื่อของโมเดล
        $this->load->view('End', $this->data, FALSE);      
        $this->load->view('Footer');
    }
}

/* End of file MyDoc.php */     