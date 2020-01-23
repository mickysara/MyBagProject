<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AllActivity extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('AllActivity');
        $this->load->view('Footer');
    }

}

/* End of file AllActivity.php */
