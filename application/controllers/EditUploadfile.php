<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EditUploadfile extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
    }
    public function edit($edit_id)
    {
        if($this->session->userdata('_success') == '')
        {
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('AlertController/loginalert');
        }else{
            $this->data['edit_data']= $this->Upload->edit_data($edit_id);
            $this->load->view('Header');
            $this->load->view('EditUploadfile', $this->data, FALSE);
            $this->load->view('Footer');
        }
    }
   
    public function editdata(){     
        print_r($_POST);   
        // $this->Upload->editdataupload($this->input->post());
        
        // redirect('Mydoc','refresh');
    }
   

    
    public function editFile(){
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
          $this->Upload->editdataupload($this->input->post(),$fileName);

          $repostrnono = base_url(uri_string());
             $arraystate2 = (explode("/",$repostrnono));
             $idRepo = ($arraystate2[6]);

             $this->db->where('ID_Document',$idRepo);
             $query = $this->db->get('Document');
             $gorepo = $query->row_array();   

        redirect('InActivity/showdata/'.$gorepo['ID_Activities'],'refresh');
        print_r($_POST);  
    }

    
}

/* End of file IndexController.php */

?>