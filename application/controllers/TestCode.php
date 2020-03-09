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
}

/* End of file MyDoc.php */     