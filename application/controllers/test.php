<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

    public function index()
    {
        $data = '06/07/2563';
        $date = strtotime($data);
        $newdate = date('Y-m-d',strtotime("-543 year",$date));
        echo $newdate;
    }

}

/* End of file test.php */
