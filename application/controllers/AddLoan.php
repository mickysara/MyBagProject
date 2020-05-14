<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AddLoan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('InsertActivity_Model'); 
        $this->load->model('UploadFile_Model','Upload'); 
    }  
    
    public function index()
    {

    }

    public function Insert($id)
    {
          
             $qq =  $this->db->query("SELECT ID_Activities
             FROM Activities
             ORDER BY ID_Activities DESC
             LIMIT 1");
             
             foreach($qq->result_array() as $data2)
    {
              

        // echo $data2['ID_Activities'];
        redirect('AddLoan/InsertLL/'.$id);
    }
    }

    public function InsertLL($id)
    {
        $this->load->view('Header');
        $this->data['InsertActivity']= $this->InsertActivity_Model->InActivity($id); //Upfile คือชื่อของโมเดล
        $this->load->view('AddLoan', $this->data, FALSE);      
        $this->load->view('Footer');
    }

    public function AddData($id)
    {
        // print_r($_POST);

        $Name = $this->input->post('Name');
        $Type = $this->input->post('Type');
        $Money =  $this->input->post('Money');
        
        // echo $Name.$Type;
        $data = array(
            'Name_Loan' => $Name,
            'Type' => $Type,
            'Money' => $Money,
            'ID_Activities' => $id
          );  
        $this->db->insert('Loan', $data); 
        
        redirect('AddLoan/InsertLL/'.$id);
        
    }


    public function InsertMoneyUse($id){

        $this->db->where('ID_Loan', $id);
        $query = $this->db->get('Loan');
        $show = $query->row_array();

        $files = $_FILES;
        $count = count($_FILES['userfile']['name']);
        for($i=0; $i<$count; $i++)
          {
          $_FILES['userfile']['name']= $files['userfile']['name'][$i];
          $_FILES['userfile']['type']= $files['userfile']['type'][$i];
          $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
          $_FILES['userfile']['error']= $files['userfile']['error'][$i];
          $_FILES['userfile']['size']= $files['userfile']['size'][$i];
          $config['upload_path'] = './slipclear/';
          $config['allowed_types'] = 'png|jpeg|jpg';
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
              $this->Upload->ClearMoney($this->input->post(),$fileName);
            //   print_r($_POST);
              redirect('Payloan/ClearMoney/'.$show['ID_Activities'],'refresh');
      }
        
        
        
       
            
        
    
    }



