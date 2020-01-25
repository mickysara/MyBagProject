<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AlertLogin extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('AlertLogin');
        $this->load->view('Footer');
    }

}

/* End of file AlertLogin.php */
