<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Project_Model','Project'); 

        
    }
    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Project');
        $this->load->view('Footer');
    }

    // public function InsertProject()
    // {
    //     $name = $this->input->post('Name');
    //     $Result = $this->input->post('Result');
    //     $Type = $this->input->post('Type');

    //     $this->db->where('NameProject', $name);
    //     $query = $this->db->get('Project', 1);

    //     if($query->num_rows() == 1)
    //     {
    //         echo json_encode(['status' => 0, 'msg' => 'Fail']);
    //     }else{
    //         $object = array(
    //             'NameProject'   =>  $name,
    //             'Result'        =>  $Result,
    //             'Type'          =>  $Type,
    //             'Status'        =>  'รออนุมัติ',
    //             'Date'          =>  date("Y-m-d"),
    //             'Id_Users'      =>  $this->session->userdata('Id_Users')
    //         );


    //         $this->db->insert('Project', $object);
            
    //         $id = $this->db->insert_id();
            
    //         echo json_encode(['status' => 1, 'msg' => 'Success','data'  =>  $id]);
    //     }
        
        
    // }
    public function InsertProject(){

        $files = $_FILES;
        $count = count($_FILES['userfile']['name']);
        for($i=0; $i<$count; $i++)
          {
          $_FILES['userfile']['name']= $files['userfile']['name'][$i];
          $_FILES['userfile']['type']= $files['userfile']['type'][$i];
          $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
          $_FILES['userfile']['error']= $files['userfile']['error'][$i];
          $_FILES['userfile']['size']= $files['userfile']['size'][$i];
          $config['upload_path'] = './uploads/';
          $config['allowed_types'] = 'pdf|pptx|docx|xlsx|png|jpeg|jpg';
          $config['max_size'] = '10000000'; //หน่วยเป็น byte กำหนดใน config xammps php.ini search post และ up
          $config['remove_spaces'] = false; //ลบค่าว่างออกไป ชื่อไฟล์ค่าว่าง
          $config['overwrite'] = true;
          $config['max_width'] = '';
          $config['max_height'] = '';
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          $this->upload->do_upload();
          $fileName = $_FILES['userfile']['name'];
          $images[] = $fileName;
          }
            $fileName = implode(',',$images); //อัพเดทได้หลายๆไฟล์

            $this->Project->InsertProject($this->input->post(),$fileName);
            // print_r($_POST);
            redirect('Mydoc','refresh');
            
        
          }

          public function Request($id)
          {
            $object = array(
              'Status'  =>  2
            );
            $this->db->where('Id_Project', $id);
            $this->db->update('Project', $object);

            $this->db->where('Id_Project', $id);
            $query = $this->db->get('EjectProject', 1);

            if($query->num_rows() == 1)
            {
                $this->db->where('Id_Project', $id);
                $this->db->delete('EjectProject');
                
                
            }else{

            }
            
            
          }
}

/* End of file Project.php */
