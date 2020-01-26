<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ShowActivity extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('ShowActivity');
        $this->load->view('Footer');
        
    }

}

/* End of file ShowActivity.php */
