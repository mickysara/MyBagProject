<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AddLoan extends CI_Controller {

    public function index()
    {

    }

    public function Insert($id)
    {
        $this->load->view('Header');
        $this->load->view('AddLoan');      
        $this->load->view('Footer');
    }
    }



