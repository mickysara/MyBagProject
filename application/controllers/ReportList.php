<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportList extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
       
    }  
    public function ShowReport($id)
    {
        $this->data['id'] = $id ;
        $this->load->view('Header');
        $this->load->view('ShowReport', $this->data, FALSE);
        $this->load->view('Footer');
    }

}

/* End of file ReportList.php */
