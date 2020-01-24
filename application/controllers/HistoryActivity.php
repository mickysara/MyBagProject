<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryActivity extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('HistoryActivity');
        $this->load->view('Footer');

    }

}

/* End of file HistoryActivity.php */
