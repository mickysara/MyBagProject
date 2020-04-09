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
class Login_api extends \Restserver\Libraries\REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
       
        
	}
	
	public function index_post()
	{
		$username = $this->post('username');
		$password = $this->post('password');
        $this->db->where('Username', $username);
        $this->db->where('Password', $password);
		$query = $this->db->get('Users');
		$data = $query->row_array();
		
		if($query->num_rows() == 0 )
		{
			$this->response(array(
				'status'	=> 'Fail'
			));
		}else{
			if($data['ID_Type']	== 1)
			{
				$this->db->where('Id_Student', $username);
				$this->db->join('Users', 'Users.ID_User = student.Id_Users', 'left');
				$qq = $this->db->get('student', 1);
				$this->response(array(
					'status'	=> 	'true',
					'Test'		=>	'Hello',
					'data'		=> 	$qq->result()
				));
			}else if($data['ID_Type']	== 2)
			{
				$this->db->where('ID_Teacher', $username);
				$this->db->join('Users', 'Users.ID_User = Teacher.Id_Users', 'left');
				$qq = $this->db->get('Teacher', 1);
				$this->response(array(
					'status'	=> 	'true',
					'Test'		=>	'Hello',
					'data'		=> 	$qq->result()
				));
			}else if($data['ID_Type']	== 3)
			{
				$this->db->where('Id_Employee', $username);
				$this->db->join('Users', 'Users.ID_User = Employee.Id_Users', 'left');
				$qq = $this->db->get('Employee', 1);
				$this->response(array(
					'status'	=> 	'true',
					'Test'		=>	'Hello',
					'data'		=> 	$qq->result()
				));
			}else{
				$this->db->where('ID_Shop', $username);
				$this->db->join('Users', 'Users.ID_User = Shop.Id_Users', 'left');
				$qq = $this->db->get('Shop', 1);
				$this->response(array(
					'status'	=> 	'true',
					'Test'		=>	'Hello',
					'data'		=> 	$qq->result()
				));
			}
		}
	}

	// public function index_post()
	// {
	// 	$username = $this->post('username');
	// 	$password = $this->post('password');
        
    //     // $this->db->where('Id_Student', '025930461012-6');
    //     // $this->db->where('Password', $password);
    //     // $query = $this->db->get('student');
        
    //     $this->response("username = ".$username."|password : ".$password);
	// }
  
	public function create_post()
	{
        $data = array( 
			'empID' => $this->post('empID'),
			'username' => $this->post('username'),
			'password' => $this->post('password'), 
			'firstName' => $this->post('firstName'), 
			'lastName' => $this->post('lastName')
		); 		
		if($this->EmployeeModel->insert($data)){
			$this->response(array(
				'message' => 'success', 
				'status' => 'true'));
		}else{
			$this->response(array(
				'message' => 'unsuccess', 
				'status' => 'false'));
		}
	}
	
	public function update_put()
	{
		$empID = $this->put('empID');
        $data = array( 
			'username' => $this->put('username'),
			'password' => $this->put('password'), 
			'firstName' => $this->put('firstName'), 
			'lastName' => $this->put('lastName')
		); 	

		if($this->EmployeeModel->update($data,$empID)){
			$this->response(array(
				'message' => 'success', 
				'status' => 'true'));
		}else{
			$this->response(array(
				'message' => 'unsuccess', 
				'status' => 'false'));
		}
	}

	public function delete_delete($empID)
	{
		if($this->EmployeeModel->delete($empID)){
			$this->response(array(
				'message' => 'success', 
				'status' => 'true'));
		}else{
			$this->response(array(
				'message' => 'unsuccess', 
				'status' => 'false'));
		}
	}
}