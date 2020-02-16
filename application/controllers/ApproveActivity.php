<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ApproveActivity extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('_success') == ''){
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('Alert/Loginalert');
        }else{
        $this->load->view('Header');
        $this->load->view('ApproveActivity');
        $this->load->view('Footer');
        }
    }
    public function Teacher()
    {
        if($this->session->userdata('_success') == ''){
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('Alert/Loginalert');
        }else{
        $this->load->view('Header');
        $this->load->view('ApproveActivityTeacher');
        $this->load->view('Footer');
        }
    }

    public function Approve($id)
    {
        if($this->session->userdata('Type') == 'Employee')
        {
            $dateshow = date("Y/m/d");
            $data = array(
                'Status'    =>  'อนุมัติ',
                'ApproveBy' => $this->session->userdata('Id_Users'),
                'Dateapprove' => $dateshow 
            );
    
            $this->db->where('Id_Project', $id);   
            $this->db->update('Project', $data);

            
            redirect('ApproveActivity','refresh');
            

        }else{
            $dateshow = date("Y/m/d");
            $data = array(
                'Status'    =>  'อนุมัติ',
                'ApproveBy' => $this->session->userdata('Id_Users'),
                'Dateapprove' => $dateshow 
            );
    
            $this->db->where('Id_Project', $id);   
            $this->db->update('Project', $data);
            
            redirect('ApproveActivity','refresh');
        }
      
    }

    public function Eject()
    {
        $id =  $this->input->post('id');

                if($this->session->userdata('Type') == 'Employee')
        {
            $dateshow = date("Y/m/d");
            $data = array(
                'Status'    =>  'ไม่อนุมัติ',
                'ApproveBy' => $this->session->userdata('Id_Users'),
                'Dateapprove' => $dateshow 
            );
    
            $this->db->where('Id_Project', $id);   
            $this->db->update('Project', $data);

            $data = array(
                'Id_Project'    =>  $this->input->post('id'),
                'Detail'        => $this->input->post('login')
            );

            $this->db->insert('EjectProject', $data);
            

            echo json_encode(['status' => 1, 'msg' => 'Susscess']);

        }else{
            $dateshow = date("Y/m/d");
            $data = array(
                'Status'    =>  'ไม่อนุมัติ',
                'ApproveBy' => $this->session->userdata('Id_Users'),
                'Dateapprove' => $dateshow 
            );

        $this->db->where('Id_Project', $id);   
        $this->db->update('Project', $data);

        $data = array(
            'Id_Project'    =>  $this->input->post('id'),
            'Detail'        => $this->input->post('login')
        );

        $this->db->insert('EjectProject', $data);
        
        echo json_encode(['status' => 1, 'msg' => 'Susscess']);
        
        ;
        
        }
    }

    public function ShowDetail($id)
    {
                 $this->db->where('Id_Project', $id);
        $query = $this->db->get('EjectProject', 1);

        $data = $query->row_array();
        
        echo json_encode(['status' => 1, 'Detail' => $data['Detail']]);
        
        
    }

}

/* End of file ApproveActivity.php */
