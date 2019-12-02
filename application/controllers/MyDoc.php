<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MyDoc extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('MyDoc');
        $this->load->view('Footer');
        
    }

}

/* End of file MyDoc.php */     