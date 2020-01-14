<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Alert extends CI_Controller {

    public function index()
    {
  
    }
    public function Loginalert()
    {
        $this->load->view('Header');
        $this->load->view('Loginalert');      
        $this->load->view('Footer');
    }

    }



