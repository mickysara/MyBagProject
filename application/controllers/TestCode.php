<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TestCode extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }
    public function index()
    {
      // $this->db->where('Id_Student',$this->session->userdata('ID'));  
      // $result2 = $this->db->get('student');
      // $showdata = $result2->row_array();

      // if($this->session->userdata('ID') == $showdata['Id_Student']){
      //    echo('นักศึกษา');
      //    echo $this->session->userdata('ID');
      // }else{
      //    echo('อาจารย์');
      // }
        
      
        $queryuser = $this->db->get('student');
        foreach($queryuser->result_array() as $data){

          $this->db->where('CreateBy',$data['Id_Student']);
          $queryuser2 = $this->db->get('Activities');
          foreach($queryuser2->result_array() as $r)
          {
            echo $r['ID_Activities'];
          }
        }
    }
}

/* End of file MyDoc.php */     