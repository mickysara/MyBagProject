<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TestCode extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }
    public function index()
    {
         
        $this->load->view('Header');
        $this->load->view('TestCode');
        $this->load->view('Footer');

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


                // $this->db->where('Id_Student',$this->session->userdata('ID'));
                // $cbashow = $this->db->get('student');
                // $showdata = $cbashow->row_array();

                // $this->db->where('Branch',$showdata['Branch']);
                // $cbashow2 = $this->db->get('student');

                // foreach($cbashow2->result_array() as $data3){
                //     echo $data3['Fname'];
                // }

        //  echo $data3['Branch'];
        
        // $aaaa = $this->db->get('Activities');
        // $bbb = $aaa->row_array();

        // $this->db->where('Name_Branch','สาขาวิทยาการคอมพิวเตอร์');
        // $ashow = $this->db->get('Branch');

        // foreach($ashow->result_array() as $data){
        //   echo $data['ID_Branch'];

        //     $this->db->where('ID_Branch',$data['ID_Branch']);
        //     $this->db->where('ID_Activities','32');
        //     $bashow = $this->db->get('NameList');

        //     foreach($bashow->result_array() as $data2){
        //         //  echo $data2['ID_List'];

        //         $this->db->where('Id_Student',$data2['ID_List']);
        //         $cbashow = $this->db->get('student');

        //         foreach($cbashow->result_array() as $data3){
        //             // echo $data3['Fname']." ".$data3['Lname'];
        //         }
        //     }
        // }

        // $query  =  $this->db->query("SELECT NameList.ID_Branch FROM NameList  GROUP BY NameList.ID_Branch");


        // $dada = '1';
        // $query  =  $this->db->query("SELECT Year FROM student WHERE student.Major = $dada GROUP BY student.Year");

        // $this->db->where('ID_Activities','32');
        // $this->db->where('ID_Branch','1');
        // $datashow = $this->db->get('NameList');

        // foreach($datashow->result_array() as $data)
        // {
        //     $eiei = $data['ID_List'];
        //      echo $eiei;
        //     // $this->db->where('Id_Student',$eiei);
        //     // $datashow2 = $this->db->get('student');
        //     $query = $this->db->query("SELECT DISTINCT Year FROM student WHERE Id_Student = $eiei");

        //     foreach($query->result_array() as $data2)
        //     {
        //        echo $data2['Year'];
        //     }
             
        // }
        

        // $this->db->where('Id_Student', $this->session->userdata('ID'));
        
        // $branch = $this->db->get('student');
        // $branchshow = $branch->row_array();
 
        // $this->db->where('Branch',$branchshow['Branch']);                                     
        // $Team = $this->db->get('student');

        // $this->db->where('Branch',$branchshow['Branch']);                                     
        // $Team = $this->db->get('Teacher');
        // foreach($Team->result_array() as $data){
        //     echo $data['Fname'];
        // }
        // foreach($Team->result_array() as $data2){
            
        //     echo $data2['Fname'];
        // }
    
        $idTeacher = 'ดวงใจ หนูเล็ก';

        $Teacher = explode(" ", $idTeacher);
        echo $Teacher[0];
        // $query = $this->db->query('SELECT DISTINCT Year FROM student');
       
        // foreach($query->result_array() as $data)
        // {
        //     echo $data['Year'];
        // }

    }
    // public function calltest(){
    //     // echo ('555');
    //     // var_dump($_REQUEST);
    //     $id=$_REQUEST['id'];
    //     $fname=$_REQUEST['Fname'];
    //     echo $id;
    //     echo $fname;
    // }
}

/* End of file MyDoc.php */     