<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TestCode extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }
    public function index()
    {
         
        $this->load->view('Header');
        $this->load->view('Test');
        $this->load->view('Footer');
    }
    
}

/* End of file MyDoc.php */     