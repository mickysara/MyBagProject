<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Project');
        $this->load->view('Footer');
    }

}

/* End of file Project.php */
