<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AllActivity extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('Type') == "Student" && $this->session->userdata('Level') == 2 || $this->session->userdata('Type') == 'Teacher')
        {
            $this->load->view('Header');
            $this->load->view('AllActivity');
            $this->load->view('Footer');
        }else
        {
            
            redirect('AlertPermission','refresh');
            
        }
    }

}

/* End of file AllActivity.php */
