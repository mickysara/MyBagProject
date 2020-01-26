<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('Department') == 'เจ้าหน้าที่การเงิน')
        {
            $this->load->view('Header');
            $this->load->view('Withdraw');
            $this->load->view('Footer');
        }else{
            
            redirect('AlertPermission','refresh');
            
        }
    }
    
    public function InsertWithdraw()
    {
        $User = $this->input->post('User');
        $Fname = $this->input->post('Fname');
        $Lname = $this->input->post('Lname');
        $Money = $this->input->post('Money');

        $this->db->where('Id_Student', $User);
        $this->db->where('Fname', $Fname);
        $this->db->where('Lname', $Lname);
        $query = $this->db->get('student', 1);

        if($query->num_rows() == 1)
        {
            $data = $query->row_array();

            if($Money > $data['Money'])
            {
                echo json_encode(['status' => 3, 'msg' => 'Success', 'data' => $data['Money']]);
            }else{

                $balance = $data['Money'] - $Money;

                $object = array(
                    'Money' =>  $balance
                );
                $this->db->update('student', $object);

                $object = array(
                    
                );

                $this->db->insert('Table', $object);
                
                
            }

        }
        
        

        
        
        
    }

}

/* End of file Withdraw.php */
