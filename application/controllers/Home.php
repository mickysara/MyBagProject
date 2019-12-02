<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Home');
        $this->load->view('Footer');

    }

    public function Test()
    {
        $this->db->where('id', 555);
        $this->db->get('Test');
        
        
    }

}

/* End of file Index.php */
