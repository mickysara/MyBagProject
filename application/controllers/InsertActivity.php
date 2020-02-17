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

                  print_r($_POST);
                    // $this->InsertActivity->InsertActivity($this->input->post());
                    //  redirect('MyDoc');
              
              }

                public function InsertAcTeacher(){
                  // $files = $_FILES;
                  // $count = count($_FILES['userfile']['name']);
                  // for($i=0; $i<$count; $i++)
                  //   {
                    // $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                    // $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                    // $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                    // $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                    // $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                    // $config['upload_path'] = './uploads/';
                    // $config['allowed_types'] = 'pdf';
                    // $config['max_size'] = '10000000'; //หน่วยเป็น byte กำหนดใน config xammps php.ini search post และ up
                    // $config['remove_spaces'] = false; //ลบค่าว่างออกไป ชื่อไฟล์ค่าว่าง
                    // $config['overwrite'] = true; //falseไฟล์ซ้ำมีหลายไฟล์ true ลงทับไฟล์เดิม
                    // $config['max_width'] = '';
                    // $config['max_height'] = '';
                    // $this->load->library('upload', $config);
                    // $this->upload->initialize($config);
                    // $this->upload->do_upload();
                    // $fileName = $_FILES['userfile']['name'];
                    // $images[] = $fileName;
                    
                      // $fileName = implode(',',$images); //อัพเดทได้หลายๆไฟล์
    
                    //   print_r($_POST);
                        $this->InsertActivity->InsertActivityTeacher($this->input->post());
                         redirect('AddLoan/Insert');
                  
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

         public function EditAc($id)
         {
          $DateStart = strtotime($this->input->post('DateStart'));
        $NewDateStart = date('Y-m-d',strtotime($this->input->post('DateStart')));
        
        $DateEnd = strtotime($this->input->post('DateEnd'));
        $NewDateEnd = date("Y-m-d", strtotime($this->input->post('DateEnd')));

        $TimeStart = $this->input->post('TimeStart');
        $NewTimeStart = date("H:i:sa", strtotime($TimeStart));

        $TimeEnd = $this->input->post('TimeEnd');
        $NewTimeEnd = date("H:i:sa", strtotime($TimeEnd));

        $DateSent = date("Y/m/d");
   

              $repostrnono = base_url(uri_string());
        $arraystate2 = (explode("/",$repostrnono));
        $idRepo = ($arraystate2[6]);


        $this->db->where('ID_Activities',$idRepo);
             $eieiei = $this->db->get('Activities');
             $showw = $eieiei->row_array();
             
        $idTeacher =$this->input->post('Teacher_res');
        $Teacher = explode(" ", $idTeacher);

        $this->db->where('Id_Student',$this->session->userdata('ID'));
            $AA =  $this->db->get('student');
            $BB = $AA->row_array();

                          $qq =  $this->db->query("SELECT * FROM Teacher WHERE Fname = '$Teacher[0]' AND Lname = '$Teacher[1]'");
                          $teach = $qq->row_array();
                          
                          $fill_user = array(
                            'Name_Activities' => $this->input->post('Name'),
                            'Detail' => $this->input->post('Detail'),
                            'Type' => $this->input->post('Type'),
                            'DateStart' => $NewDateStart,
                            'DateEnd' => $NewDateEnd,
                            'TimeStart' => $NewTimeStart,
                            'TimeEnd' => $NewTimeEnd,
                            'Student_res' => $this->session->userdata('ID'),
                            'Teacher_res' => $teach['ID_Teacher'],
                            'Budget' => $this->input->post('Budget'),
                            'CreateBy'  =>  $this->session->userdata('Id_Users'),
                            'ID_Campus' => $BB['ID_Campus'],
                            'ID_Project' => $showw['Id_Project'],
                            'Status' => $this->input->post('Status'),
                            'AmountJoin' => $this->input->post('Difday')
                          );
                        
                        $this->db->where('ID_Activities', $id);
                        $query=$this->db->update('Activities', $fill_user); 

                            $fill_loan = array(
                            'Loan' => $this->input->post('Budget')
                                              );
                            $this->db->where('ID_Teacher', $teach['ID_Teacher']);
                            $this->db->Update('Teacher', $fill_loan); 

                            redirect('ShowInProject/Show/'.$showw['Id_Project']);
        }
    }
