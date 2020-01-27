<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

    public function index()
    {
        $this->db->where('Id_Activity', 1);
        $this->db->where('Question_By', $Owner['CreateBy']);
        $gg = $this->db->get('Question');
        echo $gg->num_rows();
    }

}

/* End of file test.php */
