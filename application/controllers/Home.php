<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Home');
        $this->load->view('Footer');
        
        
        
    }

}

/* End of file Index.php */
