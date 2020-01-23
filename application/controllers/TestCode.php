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
        

        // $queryuser = $this->db->get('student');
        // foreach($queryuser->result_array() as $data){

        //   $this->db->where('CreateBy',$data['Id_Student']);
        //   $queryuser2 = $this->db->get('Activities');
        //   foreach($queryuser2->result_array() as $r)
        //   {
        //     echo $r['ID_Activities'];
        //   }
        // }
        // echo $this->session->userdata('ID');
        // $result = $this->db->query("SELECT DISTINCT ID_Branch
        // FROM NameList
        // WHERE ID_Activities = '32' ");
 
        // foreach($result->result_array() as $data){
        //     echo $data['ID_Branch'];
        // }


                $this->db->where('Id_Student',$this->session->userdata('ID'));
                $cbashow = $this->db->get('student');
                $showdata = $cbashow->row_array();

                $this->db->where('Branch',$showdata['Branch']);
                $cbashow2 = $this->db->get('student');

                foreach($cbashow2->result_array() as $data3){
                    echo $data3['Fname'];
                }
        //  echo $data3['Branch'];
    }
    public function calltest(){
        // echo ('555');
        // var_dump($_REQUEST);
        $id=$_REQUEST['id'];
        $fname=$_REQUEST['Fname'];
        echo $id;
        echo $fname;
    }
}

/* End of file MyDoc.php */     