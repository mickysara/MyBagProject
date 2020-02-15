<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

    public function Hi()
    {
        $query = $this->db->get('Loan');
        $query1 = $this->db->get('TypeLoan');

        foreach($query->result_array() as $data)
        {
            foreach($query1->result_array() as $data1)
            {
                if($data['Type'] == $data1['Name_TypeLoan'])
                {
                    $this->db->where('ID_Loan', $data['ID_Loan']);
                    $object = array(
                        'Type'  =>  $data1['Id_TypeLoan']
                    );
                    $this->db->update('Loan', $object);
                    
                }
            }
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
