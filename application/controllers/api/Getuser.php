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
class Getuser extends \Restserver\Libraries\REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
       
        
	}
	
	public function index_post()
	{
        $query  =  $this->db->query("SELECT *, 'x' as chk From Transaction as a 
                                            Where a.Transaction_Of = '1' 
                                            Union 
                                            Select *, 'y' as chk 
                                            From Transaction as b Where b.Recived_Transaction = '1' Order by TimeStamp DESC");
		
		if($query->num_rows() == 0 )
		{
			$this->response(array(
				'status'	=> 'Fail'
			));
		}else{
			$this->response(array(
				'status'	=> 	'true',
				'Test'		=>	'Hello',
				'data'		=> 	$query->result()
			));
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