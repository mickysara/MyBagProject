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
        
        $this->db->where('ID_Activities', $id);
        $query = $this->db->get('Activities');
        $show = $query->row_array();

        // echo $Name.$Type;
        $data = array(
            'Name_Loan' => $Name,
            'Type' => $Type,
            'Money' => $Money,
            'ID_Activities' => $id
          );  
        $this->db->insert('Loan', $data); 
        

        $moneyget1 = $this->db->query("SELECT sum(Money)
						as money
						FROM Loan
						WHERE ID_Activities = '$id'
						AND Type != 3");
          $sumget1 =  $moneyget1->row_array();

          $data2 = array(
            'Loan' => $sumget1['money']
          );  
        $this->db->where('Id_Users', $show['Borrow']);
        $query=$this->db->update('Teacher', $data2); 

        redirect('AddLoan/InsertLL/'.$id);
        
    }


    public function InsertMoneyUse($id){

        $this->db->where('ID_Loan', $id);
        $query = $this->db->get('Loan');
        $show = $query->row_array();

        // $files = $_FILES;
        // $count = count($_FILES['userfile']['name']);
        // for($i=0; $i<$count; $i++)
        //   {
        //   $_FILES['userfile']['name']= $files['userfile']['name'][$i];
        //   $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        //   $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        //   $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        //   $_FILES['userfile']['size']= $files['userfile']['size'][$i];
        //   $config['upload_path'] = './slipclear/';
        //   $config['allowed_types'] = 'png|jpeg|jpg';
        //   $config['max_size'] = '10000000'; //หน่วยเป็น byte กำหนดใน config xammps php.ini search post และ up
        //   $config['remove_spaces'] = false; //ลบค่าว่างออกไป ชื่อไฟล์ค่าว่าง
        //   $config['overwrite'] = true;
        //   $config['max_width'] = '';
        //   $config['max_height'] = '';
        //   $this->load->library('upload', $config);
        //   $this->upload->initialize($config);
        //   $this->upload->do_upload();
        //   $fileName = $_FILES['userfile']['name'];
        //   $images[] = $fileName;
        //   }
        //     $fileName = implode(',',$images); //อัพเดทได้หลายๆไฟล์
              $this->Upload->ClearMoney($this->input->post());
            //   print_r($_POST);
              redirect('Payloan/ClearMoney/'.$show['ID_Activities'],'refresh');
      }
      public function DetailLoan($id)
      {
          $this->load->view('Header');
          $this->load->view('DetailLoan');      
          $this->load->view('Footer');
      }
        
        
       
      public function InsertDetailLoan($id){

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
              $this->Upload->ClearDetail($this->input->post(),$fileName);
            //   print_r($_POST);
              redirect('AddLoan/DetailLoan/'.$show['ID_Loan'],'refresh');
      }
      public function EditDetailLoan($id){

        $this->db->where('ID_LoanDetail', $id);
        $query = $this->db->get('LoanDetail');
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
              $this->Upload->ClearDetailEdit($this->input->post(),$fileName);
            //   print_r($_POST);
              redirect('AddLoan/DetailLoan/'.$show['ID_Loan'],'refresh');
      }
      public function DeleteDetail($id)
      {
        $this->db->where('ID_LoanDetail', $id);
        $query = $this->db->get('LoanDetail');
        $show = $query->row_array();

        $this->db->where('ID_LoanDetail',$id);
          $this->db->delete('LoanDetail'); 
          
          redirect('AddLoan/DetailLoan/'.$show['ID_Loan']);
          
      }

      public function AddCash($id)
      {
        $Cash = $this->db->query("SELECT * FROM CashActivities WHERE CashActivities.ID_Activities = $id");
          if($Cash->num_rows() == 0){

              $data = array(
                'Cash' => $this->input->post('Cash'),
                'ID_Activities' => $id
              );  
            $this->db->insert('CashActivities', $data); 

          }else{

            $data = array(
              'Cash' => $this->input->post('Cash'),
              'ID_Activities' => $id
            );  
            $this->db->where('ID_Activities',$id);
            $query = $this->db->update('CashActivities', $data); 

          }
          
          redirect('Payloan/ClearMoney/'.$id);
          
      }
    }



