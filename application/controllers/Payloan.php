<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Payloan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('InsertActivity_Model','InsertActivity'); 
        
    }
    public function index()
    {
        $this->load->view('Header');
        $this->data['view_payloan']= $this->InsertActivity->view_payloan(); //Upfile คือชื่อของโมเดล
        $this->load->view('Payloan', $this->data, FALSE);
        $this->load->view('Footer');
        
    }
    public function Approve($idAc)
    {
        $object = array(
            'Status'   =>  'อนุมัติการเคลียร์เงิน'
        );
        $this->db->where('ID_Activities', $idAc);
        $query=$this->db->update('Activities',$object);

            $moneyget = $this->db->query("SELECT sum(Money_Get)
            as moneyget
            FROM Loan
            WHERE ID_Activities = '$idAc'");
            $sumget =  $moneyget->row_array();

            $moneyuse = $this->db->query("SELECT sum(Money_Use)
            as moneyuse
            FROM Loan
            WHERE ID_Activities = '$idAc'");
            $sumuse =  $moneyuse->row_array();

            $intget = (int)$sumget['moneyget'];;
            $intuse = (int)$sumuse['moneyuse'];;
            $sumall = $intget - $intuse;

            $this->db->where('ID_Activities', $idAc);
            $queryuser = $this->db->get('Activities');
            $showidac = $queryuser->row_array();

            $this->db->where('Id_Student', $showidac['CreateBy']);
            $queryuser2 = $this->db->get('student');
            $showidstudent = $queryuser2->row_array();

            $intmoneyuser = (int)$showidstudent['Money'];
             $sumpayloan = $intmoneyuser - $sumall;
             $showpayloan = (string)$sumpayloan;

             $objectloan = array(
                'Money'   =>  $showpayloan
            );
            $this->db->where('Id_Student', $showidac['CreateBy']);
            $query=$this->db->update('student',$objectloan);


        redirect('InActivity/showdata/'.$idAc,'refresh');
    
    
    }
    public function Eject($idAc)
    {
        $object = array(
            'Status'   =>  'ไม่อนุมัติการเคลียร์เงิน'
        );
        $this->db->where('ID_Activities', $idAc);
        $query=$this->db->update('Activities',$object);

        redirect('Payloan','refresh');
    
    
    }
    public function ChangeStatus($idAc)
    {
        $object = array(
            'Status'   =>  'ขออนุมัติเคลียร์เงิน'
        );
        $this->db->where('ID_Activities', $idAc);
        $query=$this->db->update('Activities',$object);

        redirect('Payloan','refresh');
    
    
    }
}

/* End of file MyDoc.php */     