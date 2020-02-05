<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

    public function Hi()
    {
        $id = $this->input->post('login');
        echo json_encode(['status' => 1, 'msg' => $id]);

        
    }

}

/* End of file test.php */
