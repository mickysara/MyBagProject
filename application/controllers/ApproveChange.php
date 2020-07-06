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
        redirect('ApproveChange','refresh');
    }

    public function Approve($id)
    {
        $idemp =  $this->session->userdata('Id_Employee');

        $query = $this->db->query("SELECT *,ChangePlan.DateStart as DateNew,ChangePlan.DateEnd as DateEndnew,ChangePlan.TimeStart as Timenew,ChangePlan.TimeEnd as Timeendnew 
        FROM ChangePlan LEFT JOIN Activities ON Activities.ID_Activities = ChangePlan.ID_Activities WHERE Id_ChangePlan = $id");

        $data = $query->row_array();

        $object = array(
            'DateStart' =>  $data['DateNew'],
            'DateEnd'   =>  $data['DateEndnew'],
            'TimeStart' =>  $data['Timenew'],
            'TimeEnd'   =>  $data['Timeendnew'],
            'CountEdit' =>  $data['CountEdit']+1
        );
        $array = array(
            'Status'    =>  2,
            'Id_Employee'   =>  $idemp,
        );
        $this->db->where('Id_ChangePlan', $id);
        $this->db->update('ChangePlan', $array);
        
    
        $this->db->where('ID_Activities', $data['ID_Activities']);
        $this->db->update('Activities', $object);
        redirect('ApproveChange','refresh');
    }
}

/* End of file ApproveChange.php */
