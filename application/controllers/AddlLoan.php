<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AddLoan extends CI_Controller {

    public function index()
    {

    }

    public function Insert()
    {
          
             $qq =  $this->db->query("SELECT ID_Activities
             FROM Activities
             ORDER BY ID_Activities DESC
             LIMIT 1");
             
             foreach($qq->result_array() as $data2)
    {
              

        redirect('AddLoan/InsertLL'.$data2['ID_Activities'],'refresh');
    }
    }

    public function InsertLL($id)
    {
        $this->load->view('Header');
        $this->load->view('AddLoan');      
        $this->load->view('Footer');
    }
    }



