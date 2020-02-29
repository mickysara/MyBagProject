<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AddLoan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('InsertActivity_Model'); 
    }  
    
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
              

        echo $data2['ID_Activities'];
        redirect('AddLoan/InsertLL/'.$data2['ID_Activities']);
    }
    }

    public function InsertLL($id)
    {
        $this->load->view('Header');
        $this->data['InsertActivity']= $this->InsertActivity_Model->InActivity($id); //Upfile คือชื่อของโมเดล
        $this->load->view('AddLoan', $this->data, FALSE);      
        $this->load->view('Footer');
    }

    public function AddData($id)
    {
        // print_r($_POST);

        $Name = $this->input->post('Name');
        $Type = $this->input->post('Type');
        $Money =  $this->input->post('Money');
        
        // echo $Name.$Type;
        $data = array(
            'Name_Loan' => $Name,
            'Type' => $Type,
            'Money' => $Money,
            'ID_Activities' => $id
          );  
        $this->db->insert('Loan', $data); 
        
        redirect('AddLoan/InsertLL/'.$id);
        
    }
    }



