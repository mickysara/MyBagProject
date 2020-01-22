<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {


    public function index()
    {
        if($this->session->userdata('_success') == ''){
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('Alert/Loginalert');
        }else{
        $this->load->view('Header');
        $this->load->view('EventView');       //เรียกใช้หน้าฟอร์ม
        $this->load->view('Footer');
        }
    }

    public function Check()
    {
        $nameAcc = $this->input->post('Name');
        $idTeacher = $this->input->post('Teacher_res');

        $this->db->where('Name_Activities', $nameAcc);
        $query = $this->db->get('Activities', 1);
        if($query->num_rows() == 1)
        {
            echo json_encode(['status' => 1, 'msg' => 'Success']);
        }else
        {
            $this->db->where('Status !=', 'เคลียร์เงินเสร็จสิ้น');
            $this->db->where('Teacher_res', $idTeacher);
            $query = $this->db->get('Activities', 1);

            if($query->num_rows() == 1)
            {
                echo json_encode(['status' => 2, 'msg' => 'Success']);
            }else
            {
                echo json_encode(['status' => 3, 'msg' => 'Success']);
            }
            
        }
        
        
    }

}

/* End of file Event.php */
