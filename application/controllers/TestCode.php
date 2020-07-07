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

        // $test3 = date('Y-m-d',strtotime("+30 day",$test));
        // $nowq = date('Y-m-d', strtotime($coc));
        // $nowq2 = date('H:i:sa', strtotime($check));

        // ค้นหากิจกรรมที่จัดในวันและเวลา
        $query = $this->db->query("SELECT * FROM Activities WHERE DateStart <= '$test' 
                                   AND TimeStart <= '$test2' 
                                   AND TimeEnd >= '$test2'
                                   AND DateEnd >= '$test'");

        // ค้นหากิจกรรมที่อยู่ในวันนั้นแต่นอกเวลา

        $query2 = $this->db->query("SELECT * FROM Activities
        WHERE DateEnd >= '$test'
        AND DateStart <= '$test'
        AND (TimeStart >= '$test2' OR TimeEnd <= '$test2')");

    //     // ค้นหากิจกรรมที่อยู่ก่อนวันจัด
        
        $query3 = $this->db->query("SELECT * FROM Activities
        WHERE (DateStart > '$test')");

       // ค้นหากิจกรรมที่อยู่หลังเวลาจัดและหลังวันจัด (สิ้นสุดกิจกรรม)
        $query4 = $this->db->query("SELECT * FROM Activities
        WHERE Activities.DateEnd <= '$test' 
        AND Activities.TimeEnd < '$test2'
        AND Activities.Status != 4
        AND Activities.Status != 5
        AND Activities.Status != 6");


        // 30 วันเปลี่ยนเป็นรอเคลียร์เงิน
        // $query5 = $this->db->query("SELECT * FROM Activities
        // WHERE DateEnd <= '$test'");
        // foreach($query5->result_array() as $data5)
        // {
            
        //     $test3 = strtotime($data5['DateEnd']);
        //     $test4 = date('Y-m-d',strtotime("+1 day",$test3));
        //     if($query5->num_rows() != 0 && $data5['DateEnd'] < $test4){
        //         echo $data5['ID_Activities']." ";
        //         $fill_loan5 = array(
        //             'Status' => '3'
        //                               );
        //         $this->db->where('ID_Activities', $data5['ID_Activities']);
        //         $this->db->Update('Activities', $fill_loan5);

        //     }else{

        //     }
        // }


        foreach($query->result_array() as $data)
        {
            if($query->num_rows() != 0){
                // echo $data['ID_Activities']." ";
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
            // echo $data2['ID_Activities']." ";
            if($query2->num_rows() != 0){
                $fill_loan2 = array(
                    'Status' => '2'
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
            // echo $data4['ID_Activities']." ";
            if($query4->num_rows() != 0){
                $fill_loan4 = array(
                    'Status' => '3'
                                      );
                $this->db->where('ID_Activities', $data4['ID_Activities']);
                $this->db->Update('Activities', $fill_loan4);
        }
        
        }
        // redirect('TestCode/testtesttest');
    }
    public function testtesttest()
    {
    //     $test = date('Y-m-d');
    //     $test2 = date('H:i:s');
        
    //     $query5 = $this->db->query("SELECT * FROM Activities
    //     WHERE DateEnd <= '$test'");
    //     foreach($query5->result_array() as $data5)
    //     {
            
    //         $test3 = strtotime($data5['DateEnd']);
    //         $test4 = date('Y-m-d',strtotime("+1 day",$test3));
    //         if($query5->num_rows() != 0 && $data5['DateEnd'] < $test4){
    //             echo $data5['ID_Activities']." ";
    //             $fill_loan5 = array(
    //                 'Status' => '3'
    //                                   );
    //             $this->db->where('ID_Activities', $data5['ID_Activities']);
    //             $this->db->Update('Activities', $fill_loan5);

    //         }else{

    //         }
    //     }
                             $Date2 = strtotime("+30 Day");
							 $Date3 = date('Y-m-d',$Date2);

							 $Date4 = strtotime("+2 Day");
                             $Date5 = date('Y-m-d',$Date4);

                             echo $Date3;
                             echo $Date5;
    }
    
    public function asd()
    {
        $this->db->where('ID_Activities', '315');
        $query = $this->db->get('Activities');

        print_r($query->row_array());
        
        
    }
}



/* End of file MyDoc.php */     
