<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('Department') == 'เจ้าหน้าที่การเงิน')
        {
            $this->load->view('Header');
            $this->load->view('Withdraw');
            $this->load->view('Footer');
        }else{
            
            redirect('AlertPermission','refresh');
            
        }
    }
    
    public function InsertWithdraw()
    {
        $User = $this->input->post('User');
        $Fname = $this->input->post('Fname');
        $Lname = $this->input->post('Lname');
        $Money = $this->input->post('Money');

        $this->db->where('Id_Student', $User);
        $this->db->where('Fname', $Fname);
        $this->db->where('Lname', $Lname);
        $query = $this->db->get('student', 1);

        if($query->num_rows() == 1)
        {
            $data = $query->row_array();

            if($Money > $data['Money'])
            {
                echo json_encode(['status' => 2, 'msg' => 'Fail', 'data' => $data['Money']]);
            }else{

                $balance = $data['Money'] - $Money;

                $object = array(
                    'Money' =>  $balance
                );

                $this->db->where('Id_Users', $data['Id_Users']);
                $this->db->update('student', $object);

                $object = array(
                    'WithdrawBy' => $data['Id_Users'],
                    'Money'      => $Money,
                    'Emp'        => $this->session->userdata('Id_Users')
                );

                $this->db->insert('Withdraw', $object);

                $object = array(
                    'Transaction_Of'    =>  $data['Id_Users'],
                    'Method'            =>  'ถอนเงิน',
                    'Recived_Transaction'   =>  '101',
                    'Money'             =>  $Money,
                    'Status'            =>  'Success'
                );

                $this->db->insert('Transaction', $object);
                
                
                echo json_encode(['status' => 1, 'msg' => 'Success']);
            }
           
        }else{

            $this->db->where('ID_Teacher', $User);
            $this->db->where('Fname', $Fname);
            $this->db->where('Lname', $Lname);
            $query = $this->db->get('Teacher', 1);

            if($query->num_rows() == 1)
            {
                $data = $query->row_array();

                if($Money > $data['Money'])
                {
                    echo json_encode(['status' => 2, 'msg' => 'Fail', 'data' => $data['Money']]);
                }else{
    
                    $balance = $data['Money'] - $Money;
    
                    $object = array(
                        'Money' =>  $balance
                    );
                    $this->db->where('Id_Users', $data['Id_Users']);
                    $this->db->update('Teacher', $object);
    
                    $object = array(
                        'WithdrawBy' => $data['Id_Users'],
                        'Money'      => $Money,
                        'Emp'        => $this->session->userdata('Id_Users')
                    );
    
                    $this->db->insert('Withdraw', $object);
                    $object = array(
                        'Transaction_Of'    =>  $data['Id_Users'],
                        'Method'            =>  'ถอนเงิน',
                        'Recived_Transaction'   =>  '101',
                        'Money'             =>  $Money,
                        'Status'            =>  'Success'
                    );
    
                    $this->db->insert('Transaction', $object);
                    
                    echo json_encode(['status' => 1, 'msg' => 'Success']);
                }
            }else{

                $this->db->where('Id_Employee', $User);
                $this->db->where('Fname', $Fname);
                $this->db->where('Lname', $Lname);
                $query = $this->db->get('Employee', 1);
    
                if($query->num_rows() == 1)
                {
                    $data = $query->row_array();
    
                    if($Money > $data['Money'])
                    {
                        echo json_encode(['status' => 2, 'msg' => 'Fail', 'data' => $data['Money']]);
                    }else{
        
                        $balance = $data['Money'] - $Money;
        
                        $object = array(
                            'Money' =>  $balance
                        );
                        $this->db->where('Id_Users', $data['Id_Users']);
                        $this->db->update('Employee', $object);
        
                        $object = array(
                            'WithdrawBy' => $data['Id_Users'],
                            'Money'      => $Money,
                            'Emp'        => $this->session->userdata('Id_Users')
                        );
        
                        $this->db->insert('Withdraw', $object);
                        $object = array(
                            'Transaction_Of'    =>  $data['Id_Users'],
                            'Method'            =>  'ถอนเงิน',
                            'Recived_Transaction'   =>  '101',
                            'Money'             =>  $Money,
                            'Status'            =>  'Success'
                        );
        
                        $this->db->insert('Transaction', $object);
                        
                        echo json_encode(['status' => 1, 'msg' => 'Success']);
                    }
                }else{

                    
                $this->db->where('ID_Shop', $User);
                $this->db->where('Fname', $Fname);
                $this->db->where('Lname', $Lname);
                $query = $this->db->get('Shop', 1);
    
                if($query->num_rows() == 1)
                {
                    $data = $query->row_array();
    
                    if($Money > $data['Money'])
                    {
                        echo json_encode(['status' => 2, 'msg' => 'Fail', 'data' => $data['Money']]);
                    }else{
        
                        $balance = $data['Money'] - $Money;
        
                        $object = array(
                            'Money' =>  $balance
                        );
                        $this->db->where('Id_Users', $data['Id_Users']);
                        $this->db->update('Shop', $object);
        
                        $object = array(
                            'WithdrawBy' => $data['Id_Users'],
                            'Money'      => $Money,
                            'Emp'        => $this->session->userdata('Id_Users')
                        );
        
                        $this->db->insert('Withdraw', $object);
                        $object = array(
                            'Transaction_Of'    =>  $data['Id_Users'],
                            'Method'            =>  'ถอนเงิน',
                            'Recived_Transaction'   =>  '101',
                            'Money'             =>  $Money,
                            'Status'            =>  'Success'
                        );
        
                        $this->db->insert('Transaction', $object);
                        
                        echo json_encode(['status' => 1, 'msg' => 'Success']);
                    }
                }else{
                        echo json_encode(['status' => 3, 'msg' => 'Fail']);
                }

                }

            }
        }
        
        

        
        
        
    }

}

/* End of file Withdraw.php */
