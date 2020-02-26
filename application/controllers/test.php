<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

    public function Hi()
    {
        $query = $this->db->get('student');

        foreach($query->result_array() as $data)
        {
                    $this->db->where('Id_Student', $data['Id_Student']);
                    $object = array(
                        'Id_Title'  =>  rand(1,2),
                        'Branch'    =>  rand(1,11),
                        'Major'     =>  rand(1,2),
                        'ID_Campus' =>  1
                    );
                    $this->db->update('student', $object);
                    
                
        }
        
        

        echo "success";

        
    }

    public function Home()
    {
        $this->load->view('Header');
        $this->load->view('Test');
        $this->load->view('Footer');
        
        
        
    }

}

/* End of file test.php */
