<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ShowJoinActivity extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('ShowJoinActivity');
        $this->load->view('Footer');
    }

}

/* End of file ShowJoinActivity.php */
