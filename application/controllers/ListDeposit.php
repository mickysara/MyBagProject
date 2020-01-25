<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ListDeposit extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('ID') != null)
        {
            $this->load->view('Header');
            $this->load->view('ListDeposit');
            $this->load->view('Footer');
        }else
        {
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('AlertLogin','refresh');
            
        }
        
    }

    public function ShowDeposit()
    {
     
       
    }
    public function Approve($id)
    {
      $this->db->where('ID_Deposit', $id);
        $object = array(
            'Status'    =>  'อนุมัติ'
        );
        $this->db->update('Depoosit', $object);

        $this->db->where('ID_Deposit', $id);
        $query = $this->db->get('Depoosit', 1);
        $data = $query->row_array();
        
        $this->db->where('Id_Student', $data['DepositBy']);
        $queryUser =  $this->db->get('student', 1);

        if($queryUser->num_rows() == 1)
        {
            $datauser = $queryUser->row_array();
            
            $money = $datauser['Money'] + $data['Money'] ;

            $object = array(
                'Money' =>   $money
            );

            $this->db->where('Id_Student', $datauser['Id_Student']);
            $this->db->update('student', $object);

            $aa = array(
                'Transaction_Of'        =>  $datauser['Id_Student'],
                'Method'                =>  'ฝากเงิน',
                'Recived_Transaction'   =>  'ระบบ',
                'Money'                 =>  $data['Money'],
                'Status'                =>  'Success' 
            );

            $this->db->insert('Transaction', $aa);
        
            
        }else
        {
            $this->db->where('ID_Teacher', $data['DepositBy']);
            $queryUser = $this->db->get('Teacher', 1);
            $datauser = $queryUser->row_array();
            
            $money = $datauser['Money'] + $data['Money'] ;

            $object = array(
                'Money' =>   $money
            );


            $this->db->where('ID_Teacher', $datauser['ID_Teacher']);
            $this->db->update('Teacher', $object);
            
            $aa = array(
                'Transaction_Of'        =>  $datauser['Id_Student'],
                'Method'                =>  'ฝากเงิน',
                'Recived_Transaction'   =>  'ระบบ',
                'Money'                 =>  $money,
                'Status'                =>  'Success' 
            );

            $this->db->insert('Transaction', $aa);
        }

    }


    public function Eject($id)
    {
        $this->db->where('ID_Deposit', $id);
        $object = array(
            'Status'    =>  'ไม่อนุมัติ'
        );
        $this->db->update('Depoosit', $object);

        $repostrnono = base_url(uri_string());
        $arraystate2 = (explode("/",$repostrnono));
        $idDepo = ($arraystate2[6]);

        $datanote = array(
            'ID_Deposit'    =>  $idDepo,
            'Detail'    =>  $this->input->post('detail')
        );
        $this->db->insert('Note', $datanote);
        
        redirect('listdeposit','refresh');
        
    }


}

/* End of file ListDeposit.php */ 