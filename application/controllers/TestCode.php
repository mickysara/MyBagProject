<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TestCode extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }
    public function index()
    {
         
        $la = 13.918895;
        $lamax = $la+0.001;
        $lamin = $la-0.001;
        $long = 100.376435;
        $longmax = $long + 0.001; 
        $longmin  = $long - 0.001;

        $userla = 13.9189949;
        $userlong = 100.3764003;

        
        if(($lamin <= $userla && $userla <= $lamax) && ($longmin <= $userlong && $userlong <= $longmax))
        {
            echo "อยู่ในพื้นที่";
        }else{
            echo "ไม่ได้อยู่ในพื้นที่";
        }
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