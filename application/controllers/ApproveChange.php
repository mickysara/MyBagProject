<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ApproveChange extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('ApproveChange');
        $this->load->view('Footer');
        
    }

    public function EjectChangePlan()
    {
        $id = $this->input->post('id');
        $Detail = $this->input->post('login');
        $idemp =  $this->session->userdata('Id_Employee');
        $object = array(
          'Status'  =>  1,
          'Note'      =>  $Detail,
          'Id_Employee'   =>  $idemp
        );
        $this->db->where('Id_ChangePlan', $id);
        $this->db->update('ChangePlan', $object);

        
        echo json_encode(['status' => 1, 'msg' => 'Susscess']);
    }

    public function Approve($id)
    {
        $idemp =  $this->session->userdata('Id_Employee');
        $this->db->join('Activities', 'Activities.ID_Activities = ChangePlan.ID_Activities', 'left');
        $this->db->where('Id_ChangePlan', $id);
        $query = $this->db->get('ChangePlan', 1);

        $data = $query->row_array();

        $object = array(
            'DateStart' =>  $data['DateStart'],
            'DateEnd'   =>  $data['DateEnd'],
            'TimeStart' =>  $data['TimeStart'],
            'TimeEnd'   =>  $data['TimeEnd']
        );
        $array = array(
            'Status'    =>  2,
            'Id_Employee'   =>  $idemp,
        );
        $this->db->where('Id_ChangePlan', $id);
        $this->db->update('ChangePlan', $array);

        $this->db->where('Id_Project', $data['Id_Project']);
        $query = $this->db->get('Project', 1);
        $dd = $query->row_array();

        $aa = array(
            'CountEdit' =>  $dd['CountEdit']+1
        );
        

        $this->db->where('Id_Project', $data['Id_Project']);
        $this->db->update('Project', $aa);
        
        
        
        $this->db->where('ID_Activities', $data['ID_Activities']);
        $this->db->update('Activities', $object);
        
        
        redirect('ApproveChange','refresh');
        
        
        
    }
}

/* End of file ApproveChange.php */
