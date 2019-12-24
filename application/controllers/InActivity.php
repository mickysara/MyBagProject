<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class InActivity extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('InsertActivity_Model'); 
    }  

   

    public function index()
    {

        $this->load->view('Header');
        $this->data['InsertActivity']= $this->InsertActivity_Model->InActivity($idAc); //Upfile คือชื่อของโมเดล
        $this->load->view('InActivity', $this->data, FALSE);
        $this->load->view('Footer');
        
    }
    public function showdata($idAc)
    {

        $this->db->where('ID_Activities',$idAc);
        $queryuser = $this->db->get('Activities');
        $showdata = $queryuser->row_array();

            {              
                $this->load->view('Header');
                $this->data['InsertActivity']= $this->InsertActivity_Model->InActivity($showdata['ID_Activities']); //Upfile คือชื่อของโมเดล
                $this->load->view('InActivity', $this->data, FALSE);
                $this->load->view('Footer');    
      
            }
  
    }
   
}
  


