<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('EventView');
        $this->load->view('Footer');
        
        
        
    }

}

/* End of file Event.php */
