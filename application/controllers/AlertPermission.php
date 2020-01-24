<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AlertPermission extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('AlertPermission');
        $this->load->view('Footer');
    }

}

/* End of file AlertPermission.php */
