<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Information');
        $this->load->view('Footer');
    }

}

/* End of file Information.php */
