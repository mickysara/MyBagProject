<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertActivity extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('InsertActivity_Model','InsertActivity'); 
        
    }

    public function index()
    {
      if($this->session->userdata('_success') == ''){
        $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
        $this->session->set_userdata('login_referrer', $referrer_value);
        redirect('Alert/Loginalert');
    }else{
        redirect('InsertActivity');
      }

    }
   
    public function InsertAc(){
              // $files = $_FILES;
              // $count = count($_FILES['userfile']['name']);
              // for($i=0; $i<$count; $i++)
              //   {
              //   $_FILES['userfile']['name']= $files['userfile']['name'][$i];
              //   $_FILES['userfile']['type']= $files['userfile']['type'][$i];
              //   $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
              //   $_FILES['userfile']['error']= $files['userfile']['error'][$i];
              //   $_FILES['userfile']['size']= $files['userfile']['size'][$i];
              //   $config['upload_path'] = './uploads/';
              //   $config['allowed_types'] = 'pdf';
              //   $config['max_size'] = '10000000'; //หน่วยเป็น byte กำหนดใน config xammps php.ini search post และ up
              //   $config['remove_spaces'] = false; //ลบค่าว่างออกไป ชื่อไฟล์ค่าว่าง
              //   $config['overwrite'] = true; //falseไฟล์ซ้ำมีหลายไฟล์ true ลงทับไฟล์เดิม
              //   $config['max_width'] = '';
              //   $config['max_height'] = '';
              //   $this->load->library('upload', $config);
              //   $this->upload->initialize($config);
              //   $this->upload->do_upload();
              //   $fileName = $_FILES['userfile']['name'];
              //   $images[] = $fileName;
              //   }
              //     $fileName = implode(',',$images); //อัพเดทได้หลายๆไฟล์

                //   print_r($_POST);
                    $this->InsertActivity->InsertActivity($this->input->post());
                    //  redirect('MyDoc');
              
                }

                public function InsertAcTeacher(){
                  $repostrnono = base_url(uri_string());
                  $arraystate2 = (explode("/",$repostrnono));
                  $idRepo = ($arraystate2[6]);

                  $this->db->where('ID_Project', $idRepo);
                  $datata = $this->db->get('Activities');
                  $asasas = $datata->row_array();
                  // $files = $_FILES;
                  // $count = count($_FILES['userfile']['name']);
                  // for($i=0; $i<$count; $i++)
                  //   {
                  //   $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                  //   $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                  //   $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                  //   $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                  //   $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                  //   $config['upload_path'] = './uploads/';
                  //   $config['allowed_types'] = 'pdf';
                  //   $config['max_size'] = '10000000'; //หน่วยเป็น byte กำหนดใน config xammps php.ini search post และ up
                  //   $config['remove_spaces'] = false; //ลบค่าว่างออกไป ชื่อไฟล์ค่าว่าง
                  //   $config['overwrite'] = true; //falseไฟล์ซ้ำมีหลายไฟล์ true ลงทับไฟล์เดิม
                  //   $config['max_width'] = '';
                  //   $config['max_height'] = '';
                  //   $this->load->library('upload', $config);
                  //   $this->upload->initialize($config);
                  //   $this->upload->do_upload();
                  //   $fileName = $_FILES['userfile']['name'];
                  //   $images[] = $fileName;
                  //   }
                  //     $fileName = implode(',',$images); //อัพเดทได้หลายๆไฟล์
    
                    //   print_r($_POST);
                        $this->InsertActivity->InsertActivityTeacher($this->input->post());
                         redirect('AddLoan/Insert/'.$asasas['ID_Activities']);
                  
                    }

        public function CheckEvent()
        {
          $event = $this->input->post("Name");
          $this->db->where('Name_Activities', $event);
          $query = $this->db->get('Activities', 1);
          if($query->num_rows() == 0)
          {
           
              echo json_encode(['status' => 1, 'msg' => 'Success']);
              redirect('MyDoc');
            }else{
              echo json_encode(['status' => 0, 'msg' => 'fail']);
            }
         }
         public function CheckFile()
         {
             $filename = $this->input->post("namefile");
             $this->db->where('Contirm_Doc', $filename);
             $query = $this->db->get('Activities', 1);
             if($query->num_rows() == 0)
             {           
                 echo json_encode(['status' => 1, 'msg' => 'Success']);
                 redirect('MyDoc'); 
               }else{
                 echo json_encode(['status' => 0, 'msg' => 'fail']);
               }
         }
    }
