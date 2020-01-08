<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Deposit');
        $this->load->view('Footer');        
    }

}

/* End of file Deposit.php */
