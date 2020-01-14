<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TestCode extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }
    public function index()
    {
      $this->db->where('Id_Student',$this->session->userdata('ID'));  
      $result2 = $this->db->get('student');
      $showdata = $result2->row_array();

      if($this->session->userdata('ID') == $showdata['Id_Student']){
         echo('นักศึกษา');
      }else{
         echo('อาจารย์');
      }

    }
}

/* End of file MyDoc.php */     