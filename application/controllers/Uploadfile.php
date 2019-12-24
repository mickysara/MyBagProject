<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadfile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 

        
    }

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Uploadfile');       //เรียกใช้หน้าฟอร์ม
        $this->load->view('Footer');
      
        
    }

    public function uploadfileActivities($repo_id)
    {

      if($this->session->userdata('_success') == ''){    
        $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
        $this->session->set_userdata('login_referrer', $referrer_value);
        redirect('AlertController/loginalert');
         
      }else{
        $this->data['Activities_view']= $this->Upload->Activities_view($repo_id);
        $this->load->view('Header');
        $this->load->view('Uploadfile', $this->data, FALSE);
        $this->load->view('Footer');
      }
    }

    public function file_upload($repo_id){

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

                  $this->Upload->upload_image($this->input->post(),$fileName);

                  $this->db->select('*');
                  $this->db->order_by('ID_Activities', 'desc');
                  $result = $this->db->get('Activities',1);
                  $data = $result->row_array();

                  redirect('InActivity/showdata/'.$data['ID_Activities'],'refresh');

              
                }

                public function Checkname()
                {
                    $filename = $this->input->post("namefile");
                    $this->db->where('Name_Document', $filename);
                    $query = $this->db->get('Document', 1);
                    if($query->num_rows() == 0)
                    {
                        echo json_encode(['status' => 1, 'msg' => 'Success']);

                      }else{
                        echo json_encode(['status' => 0, 'msg' => 'fail']);
                      }
                    
                    
                }
                public function CheckTopic()
                {
                  $topic = $this->input->post("topic");
                  $this->db->where('Topic', $topic);
                  $query = $this->db->get('Document', 1);
                  if($query->num_rows() == 0)
                  {
                    echo json_encode(['status' => 1, 'msg' => 'Success']);

                    }else{
                      echo json_encode(['status' => 0, 'msg' => 'fail']);
                    }
                }
    }
