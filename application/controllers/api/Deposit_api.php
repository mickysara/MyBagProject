<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Deposit_api extends \Restserver\Libraries\REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
       
        
	}
	
	public function index_post()
	{
        $owner = $this->input->post("Owner");
        $id = $this->input->post("Id");
        $money = $this->input->post("Money");
        
        if($money == null)
        {
            $this->response(array(
                'status'	=> 	'null',
            ));
        }else
        {
                    
        $this->db->where('Username', $id);
        $query1 = $this->db->get('Users', 1);

        if($query1->num_rows() == 1)
        {
            $this->db->where('Username', $owner);
            $query2 = $this->db->get('Users', 1);
            $dataOwner1 = $query2->row_array();

            if($dataOwner1['ID_Type'] == 1)
            {
                $this->db->where('Id_Student', $dataOwner1['Username']);
                $query3 = $this->db->get('student', 1);
                $dataOwner = $query3->row_array();
                $Type = "Student";

            }else if($dataOwner1['ID_Type'] == 2)
            {
                $this->db->where('ID_Teacher', $dataOwner1['Username']);
                $query3 = $this->db->get('Teacher', 1);
                $dataOwner = $query3->row_array();
                $Type = "Teacher";

            }else if($dataOwner1['ID_Type'] == 3)
            {
                $this->db->where('Id_Employee', $dataOwner1['Username']);
                $query3 = $this->db->get('Employee', 1);
                $dataOwner = $query3->row_array();
                $Type = "Employee";

            }else 
            {
                $this->db->where('ID_Shop', $dataOwner1['Username']);
                $query3 = $this->db->get('Shop', 1);
                $dataOwner = $query3->row_array();
                $Type = "Shop";
            }
            
            if($dataOwner['Money'] > $money)
            {
                $dataOwner['Money'] = $dataOwner['Money'] - $money;

                if($Type == "Student")
                {
                    $aa = array(
                        'Money' =>  $dataOwner['Money']
                    );
                    $this->db->where('Id_Student', $dataOwner1['Username']);
                    $this->db->update('student', $aa);

                }else if($Type == "Teacher")
                {
                    $aa = array(
                        'Money' =>  $dataOwner['Money']
                    );
                    $this->db->where('ID_Teacher', $dataOwner1['Username']);
                    $this->db->update('Teacher', $aa);

                }else if($Type == "Employee")
                {
                    $aa = array(
                        'Money' =>  $dataOwner['Money']
                    );
                    $this->db->where('Id_Employee', $dataOwner1['Username']);
                    $this->db->update('Employee', $aa);
                    
                }else
                {
                    $aa = array(
                        'Money' =>  $dataOwner['Money']
                    );
                    $this->db->where('ID_Shop', $dataOwner1['Username']);
                    $this->db->update('Shop', $aa);
                }

                $dataPlus = $query1->row_array();
                
                if($dataPlus['ID_Type'] == "1")
                {
                    $this->db->where('Id_Student', $dataPlus['Username']);
                    $qq = $this->db->get('student', 1);
                    $data = $qq->row_array();
                    $money = $data['Money'] + $money;

                    $aa = array(
                        'Money' =>  $money
                    );
        
                    $this->db->where('Id_Student', $dataPlus['Username']);
                    $this->db->update('student', $aa);

                    $this->response(array(
                        'status'	=> 	'OK',
                        'Test'      => $money
                    ));

                }else if($dataPlus['ID_Type'] == "2")
                {
                    $this->db->where('ID_Teacher', $dataPlus['Username']);
                    $qq = $this->db->get('Teacher', 1);
                    $data = $qq->row_array();
                    $money = $data['Money'] + $money;

                    $aa = array(
                        'Money' =>  $money
                    );
                    $this->db->where('ID_Teacher', $dataPlus['Username']);
                    $this->db->update('Teacher', $aa);

                    $this->response(array(
                        'status'	=> 	'OK',
                    ));

                }else if($dataPlus['ID_Type'] == "3")
                {
                    $this->db->where('Id_Employee', $dataPlus['Username']);
                    $qq = $this->db->get('Employee', 1);
                    $data = $qq->row_array();
                    $money = $data['Money'] + $money;


                    $aa = array(
                        'Money' =>  $money
                    );
                    $this->db->where('Id_Employee', $dataPlus['Username']);
                    $this->db->update('Employee', $aa);

                    $this->response(array(
                        'status'	=> 	'OK',
                    ));
                    
                }else
                {
                    $this->db->where('ID_Shop', $dataPlus['Username']);
                    $qq = $this->db->get('Shop', 1);
                    $data = $qq->row_array();
                    $money = $data['Money'] + $money;
                    $aa = array(
                        'Money' =>  $money
                    );
                    $this->db->where('ID_Shop', $dataPlus['Username']);
                    $this->db->update('Shop', $aa);

                    $this->response(array(
                        'status'	=> 	'OK',
                    ));
                }
                
            }else{
                $this->response(array(
                    'status'	=> 	'NotMoney',
                ));
            }

        }else{
            $this->response(array(
				'status'	=> 	'DontHave',
			));
        }
        }
        
        
        
	}
}