<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Project');
        $this->load->view('Footer');
    }

    public function InsertProject()
    {
        $name = $this->input->post('Name');
        $Result = $this->input->post('Result');
        $Type = $this->input->post('Type');

        $this->db->where('NameProject', $name);
        $query = $this->db->get('Project', 1);

        if($query->num_rows() == 1)
        {
            echo json_encode(['status' => 0, 'msg' => 'Fail']);
        }else{
            $object = array(
                'NameProject'   =>  $name,
                'Result'        =>  $Result,
                'Type'          =>  $Type,
                'Status'        =>  'รออนุมัติ',
                'Date'          =>  date("Y-m-d"),
                'Id_Users'      =>  $this->session->userdata('Id_Users')
            );


            $this->db->insert('Project', $object);
            
            $id = $this->db->insert_id();
            
            echo json_encode(['status' => 1, 'msg' => 'Success','data'  =>  $id]);
        }
        
        
    }

}

/* End of file Project.php */
