<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Payloan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('InsertActivity_Model','InsertActivity'); 
        $this->load->model('Slip_Model','Slip'); 
    }
    public function index()
    {
        $this->load->view('Header');
        $this->data['view_payloan']= $this->InsertActivity->view_payloan(); //Upfile คือชื่อของโมเดล
        $this->load->view('Payloan', $this->data, FALSE);
        $this->load->view('Footer');
        
    }
    public function Showpayloan()
    {
        $this->load->view('Header');
        $this->data['view_payloan']= $this->InsertActivity->view_payloan(); //Upfile คือชื่อของโมเดล
        $this->load->view('PayloanShow', $this->data, FALSE);
        $this->load->view('Footer');
        
    }
    public function Approve($idAc)
    {
        $object = array(
            'Status'   =>  '6'
        );
        $this->db->where('ID_Activities', $idAc);
        $query=$this->db->update('Activities',$object);

            $moneyuse = $this->db->query("SELECT sum(Money)
            as moneyuse
            FROM Loan
            WHERE ID_Activities = '$idAc'");
            $sumuse =  $moneyuse->row_array();

               $intuse = (int)$sumuse['moneyuse'];;

            $this->db->where('ID_Activities', $idAc);
            $queryuser = $this->db->get('Activities');
            $showidac = $queryuser->row_array();

            $this->db->where('ID_Teacher', $showidac['Teacher_res']);
            $queryuser22 = $this->db->get('Teacher');
            $showidac22 = $queryuser22->row_array();

            $intmoneyuser = (int)$showidac22['Money'];
             $sumpayloan = $intmoneyuser - $intuse;
             $showpayloan = (string)$sumpayloan;

            //  $objectloan = array(
            //     'Budget'   =>  $showpayloan
            // );
            // $this->db->where('ID_Activities', $showidac['ID_Activities']);
            // $query=$this->db->update('Activities',$objectloan);

            $objectteacher = array(
                'Loan'   =>  '0',
                'Money'  =>  $showpayloan
            );
            $this->db->where('ID_Teacher', $showidac['Teacher_res']);
            $query=$this->db->update('Teacher',$objectteacher);


        redirect('Payloan','refresh');
    
    }
    public function Eject($idAc)
    {

        $object = array(
            'Detail'  =>  $this->input->post('Detail'),
            'ID_Activities'   =>  $idAc
        );
        $this->db->insert('EjectLoan', $object);

        $object = array(
            'Status'   =>  '5'
        );
        $this->db->where('ID_Activities', $idAc);
        $query=$this->db->update('Activities',$object);

        redirect('Payloan','refresh');
    
    
    }
    public function ChangeStatus($idAc)
    {
        $object = array(
            'Status'   =>  4
        );
        $this->db->where('ID_Activities', $idAc);
        $query=$this->db->update('Activities',$object);

        redirect('MyDoc','refresh');
    
    
    }
    public function ShowSlip($id)
    {
        $this->load->view('Header');
        $this->load->view('ShowSlip');
        $this->load->view('Footer');
        
    }
    public function UploadSlip_Loan($id)
    {
       
            $files = $_FILES;
            $count = count($_FILES['userfile']['name']);
            for($i=0; $i<$count; $i++)
              {
              $_FILES['userfile']['name']= $files['userfile']['name'][$i];
              $_FILES['userfile']['type']= $files['userfile']['type'][$i];
              $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
              $_FILES['userfile']['error']= $files['userfile']['error'][$i];
              $_FILES['userfile']['size']= $files['userfile']['size'][$i];
              $config['upload_path'] = './slip/';
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
    
                $this->Slip->upload_slip($fileName);
                // print_r($_POST);
                redirect('Payloan/ShowSlip/'.$id,'refresh');
                
            
              
        
    }

    public function Deleteslip($id)
    {
        $this->db->where('ID_Slip', $id);
        $showslip = $this->db->get('Slip');
        $showshow = $showslip->row_array();

            $this->db->where('ID_Slip',$id);
            $this->db->delete('Slip');
            
        redirect('Payloan/ShowSlip/'.$showshow['ID_Activities'],'refresh');
        
    }

    public function ClearMoney($id)
    {
        $this->load->view('Header');
        $this->data['InsertActivity']= $this->InsertActivity->InActivity($id); //Upfile คือชื่อของโมเดล
        $this->load->view('ClearMoney', $this->data, FALSE);      
        $this->load->view('Footer');
        
    }
}

/* End of file MyDoc.php */     