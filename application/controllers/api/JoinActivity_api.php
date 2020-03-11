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
class JoinActivity_api extends \Restserver\Libraries\REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
       
        
	}
	
	public function index_post()
	{
        $idActivities = $this->input->post("IdAc");
        $idUser       = $this->input->post("IdUser");
        $Latitude     = $this->input->post("Latitude");
        $Longtitude   = $this->input->post("Longtitude");

        $this->db->where('ID_Activities', $idActivities);
        $query1 = $this->db->get('Activities', 1);
        $data  = $query1->row_array();

		$this->db->where('Id_location', $data['Id_location']);
		$query2 = $this->db->get('Eventlocation', 1);
		$datalocation = $query2->row_array();

		$la = $datalocation['Latitude'];
        $lamax = $la+0.002;
        $lamin = $la-0.002;
        $long = $datalocation['Longtitude'];
        $longmax = $long + 0.002; 
        $longmin  = $long - 0.002;

		// check user in Namelist
		$datenow = "2020-03-05";
		$query3 = $this->db->query("SELECT * FROM NameList WHERE ID_List = $idUser AND ID_Activities = $idActivities AND TimeIn is null and TimeOut is null and Date = '$datenow'");



		if($query3->num_rows() == 1)
		{
					// check Date User now
			if($data['DateStart'] <= $datenow && $datenow <= $data['DateEnd'])
			{

				if(($lamin <= $Latitude && $Latitude <= $lamax) && ($longmin <= $Longtitude && $Longtitude <= $longmax))
				{
					$object = array(
						'TimeIn'	=> $data['TimeStart'],
						'TimeOut'	=> $data['TimeEnd']
					);
					$this->db->where('ID_List', $idUser);
					$this->db->where('Date', $datenow);
					$this->db->update('NameList', $object);

					$this->response(array(
						'status'	=> 	'OK Join Activity',
					));
				}else{
					$this->response(array(
						'status'	=> 	'NotinArea',
						'lamin'		=>	$lamin,
						'lause'		=>	$Latitude,
						'lamax'		=>	$lamax,
						'longmin'	=>	$longmin,
						'longuser'	=>	$datalocation['Longtitude'],
						'longmax'	=>	$longmax,

						// 13.777786,100.562767
						// 13.778417,100.556651
					));
				}

			}else{
				$this->response(array(
					'status'	=> 	'NotinDate',
				));
			}

		}else{
            $this->response(array(
				'status'	=> 	'NotinActivities',
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