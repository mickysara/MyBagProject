<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TestCode extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }
    public function index()
    {
         

    
        $fileName = base_url("img/DepositUser/20200312_1844488430028548619247060.png");
        $degrees = 90;
        
        $source = imagecreatefrompng($fileName);
         
        $rotate = imagerotate($source, $degrees, 0);
        
        imagepng($rotate, "myUpdateImage.png");
        
        print_r('Image saved successfully.');

    }

    public function testdate()
    {
        $this->db->where('ID_Activities', 105);
        $query = $this->db->get('Activities', 1);
        $data = $query->row_array();

        $datenow = date("Y-m-d");

        $d = strtotime("+1 Days");
        $datetest =  date("Y-m-d", $d);

        if($datenow >= $datetest)
        {
            echo "ภายในเวลากิจกรรม";
        }else{
            echo "นอกเวลากิจกรรม";
        }
        
    }
    public function testtest(){
        $check = ('7:24:22');
        $check2 = ('2020-05-07');

        $test = date('Y-m-d');
        $test2 = date('H:i:s');
        // $nowq = date('Y-m-d', strtotime($coc));
        // $nowq2 = date('H:i:sa', strtotime($check));

        // ค้นหากิจกรรมที่จัดในวันและเวลา
        $query = $this->db->query("SELECT * FROM Activities WHERE DateStart <= '$test' 
                                   AND TimeStart <= '$test2' 
                                   AND TimeEnd >= '$test2'
                                   AND DateEnd >= '$test'");

        // ค้นหากิจกรรมที่อยู่ในวันนั้นแต่นอกเวลา

        $query2 = $this->db->query("SELECT * FROM Activities
        WHERE (DateEnd >= '$test' OR DateStart <= '$test')
        AND (TimeStart >= '$test2' OR TimeEnd <= '$test2')");

        // ค้นหากิจกรรมที่อยู่นอกวัน
        
        $query3 = $this->db->query("SELECT * FROM Activities
        WHERE (DateStart > '$test')");

        $query4 = $this->db->query("SELECT * FROM Activities
        WHERE DateEnd <= '$test' 
        AND TimeEnd < '$test2'");

        foreach($query->result_array() as $data)
        {
            if($query->num_rows() != 0){
               
                $fill_loan = array(
                    'Status' => '7'
                                      );
                $this->db->where('ID_Activities', $data['ID_Activities']);
                $this->db->Update('Activities', $fill_loan);

            }else{

            }
        }
            foreach($query2->result_array() as $data2)
        {
            if($query2->num_rows() != 0){
                $fill_loan2 = array(
                    'Status' => '1'
                                      );
                $this->db->where('ID_Activities', $data2['ID_Activities']);
                $this->db->Update('Activities', $fill_loan2);
            }else{

            }
        }
            foreach($query3->result_array() as $data3)
        {
            if($query3->num_rows() != 0){
                $fill_loan3 = array(
                    'Status' => '1'
                                      );
                $this->db->where('ID_Activities', $data3['ID_Activities']);
                $this->db->Update('Activities', $fill_loan3);
            
            }else{

            }
        }

        foreach($query4->result_array() as $data4)
        {
            if($query4->num_rows() != 0){
                $fill_loan4 = array(
                    'Status' => '2'
                                      );
                $this->db->where('ID_Activities', $data4['ID_Activities']);
                $this->db->Update('Activities', $fill_loan4);
            
            }else{

            }
        }
        
    
        
    }
    public function tt()
    {
        $test = date('Y-m-d');
        $test2 = date('H:i:s');
        echo $test;
        echo $test2;
    }
}

/* End of file MyDoc.php */     
