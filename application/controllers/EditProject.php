<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class EditProject extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Project_Model','Project'); 

        
    }

    public function Edit($id)
    {
        $this->load->view('Header');
        $this->load->view('EditProject');
        $this->load->view('Footer');
    }
    public function EditPro($id){

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

            $this->Project->EditProject($this->input->post(),$fileName);
            // print_r($_POST);
            redirect('Mydoc','refresh');
            
        
          }
}

/* End of file EditTeam.php */
 ?>