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

        if($data['DateStart'] <= $datenow && $datenow <= $data['DateEnd'])
        {
            echo "ภายในเวลากิจกรรม";
        }else{
            echo "นอกเวลากิจกรรม";
        }
        
    }
}

/* End of file MyDoc.php */     