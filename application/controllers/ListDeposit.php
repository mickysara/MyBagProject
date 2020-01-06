<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ListDeposit extends CI_Controller {

    public function index()
    {
        
        $this->load->view('Header');
        $this->load->view('ListDeposit');
        $this->load->view('Footer');
        
    }

}

/* End of file ListDeposit.php */ 