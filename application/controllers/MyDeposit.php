<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MyDeposit extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('MyDeposit');
        $this->load->view('Footer');
    }

}

/* End of file MyDeposit.php */
