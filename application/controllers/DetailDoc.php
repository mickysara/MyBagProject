<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailDoc extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
    }  
    public function index()
    {


    }

    public function view($view_id)

        {
                $this->data['view_data']= $this->Upload->view_data($view_id);
                $this->load->view('Header');
                $this->load->view('DetailDoc', $this->data, FALSE);
                $this->load->view('Footer');
        }
    
}

/* End of file DetailDocController.php */
