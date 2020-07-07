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
class GetActivity_api extends \Restserver\Libraries\REST_Controller {

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
		
		$already = 0;

		// check user in Namelist
		$datenow = "2020-07-10";


		$gt = $this->db->query("SELECT * FROM Users Where ID_User = $idUser");
		$type = $gt->row_array();


		$query3 = $this->db->query("SELECT * FROM NameList WHERE ID_Activities = $idActivities AND ID_List = $idUser AND Date = '$datenow'");
		$qq = $query3->row_array();

		$query4 = $this->db->query("SELECT * FROM NameList WHERE ID_List = $idUser AND Date = '$datenow' ");
		
		foreach($query4->result_array() as $dd)
		{
			if($dd['TimeIn'] == null && $dd['TimeOut'] == null)
			{

			}else
			{
				$already = $already+1;
			}
		}

		$canjoin = 0;
		if($already == 0)
		{
			if($data['DateStart'] <= $datenow && $datenow <= $data['DateEnd'])
			{
				if($query3->num_rows() == 1 && $qq['TimeIn'] == null && $qq['TimeOut'] == null)
				{
					if($type['ID_Type'] == '1' && $data['ID_TypeUserJoinAc'] == '1' || $data['ID_TypeUserJoinAc'] == '4' 
						|| $data['ID_TypeUserJoinAc'] == '5' || $data['ID_TypeUserJoinAc'] == '7')
					{

						$canjoin = 1;

					}else if($type['ID_Type'] == '2' && $data['ID_TypeUserJoinAc'] == '2' || $data['ID_TypeUserJoinAc'] == '4' 
							|| $data['ID_TypeUserJoinAc'] == '6' || $data['ID_TypeUserJoinAc'] == '7')
					{

						$canjoin = 1;

					}
					else if($type['ID_Type'] == '3' && $data['ID_TypeUserJoinAc'] == '3' || $data['ID_TypeUserJoinAc'] == '5' 
							|| $data['ID_TypeUserJoinAc'] == '6' || $data['ID_TypeUserJoinAc'] == '7')
					{
						$canjoin = 1;
					}
					
					if($canjoin == 1)
					{
						// check Date User now
						if(($lamin <= $Latitude && $Latitude <= $lamax) && ($longmin <= $Longtitude && $Longtitude <= $longmax))
						{
							
							$this->response(array(
								'status'	=> 	'OK Join Activity',
								'Name'      =>  $data['Name_Activities'],
								
							));
		
						}else{
							$this->response(array(
								'status'	=> 	'NotinArea',
								'Name'      =>  $data['Name_Activities'],
								'user'	=>	$idUser, 
								'Lamax'	=>	$lamax,      
								'La'	=>	$Latitude,  
								'Lamin'	=>	$lamin,
								'LongMax'	=>	$longmax,   
								'Long'	=>	$Longtitude,
								'Longmin'	=>	$longmin
								// 13.777786,100.562767
								// 13.778417,100.556651
							));
						}
					}else
					{
						$this->response(array(
							'status'	=> 	'Cant Join',
							'Name'      =>  $type['ID_Type'],
							
						));
					}

				}else{
					if($type['ID_Type'] == 'Student' && $data['ID_TypeUserJoinAc'] == '1' || $data['ID_TypeUserJoinAc'] == '4' 
						|| $data['ID_TypeUserJoinAc'] == '5' || $data['ID_TypeUserJoinAc'] == '7')
					{

						$canjoin = 1;

					}else if($type['ID_Type'] == 'Teacher' && $data['ID_TypeUserJoinAc'] == '2' || $data['ID_TypeUserJoinAc'] == '4' 
							|| $data['ID_TypeUserJoinAc'] == '6' || $data['ID_TypeUserJoinAc'] == '7')
					{
						$canjoin = 1;
					}
					else if($type['ID_Type'] == 'Employee' && $data['ID_TypeUserJoinAc'] == '3' || $data['ID_TypeUserJoinAc'] == '5' 
							|| $data['ID_TypeUserJoinAc'] == '6' || $data['ID_TypeUserJoinAc'] == '7')
					{
						$canjoin = 1;
					}
					
					if($canjoin == 1)
					{
						// check Date User now
						if(($lamin <= $Latitude && $Latitude <= $lamax) && ($longmin <= $Longtitude && $Longtitude <= $longmax))
						{
							
							$this->response(array(
								'status'	=> 	'OK Join Activity',
								'Name'      =>  $data['Name_Activities']
								
							));
		
						}else{
							$this->response(array(
								'status'	=> 	'NotinArea',
								'Name'      =>  $data['Name_Activities'],
								'user'	=>	$idUser, 
								'Lamax'	=>	$lamax,      
								'La'	=>	$Latitude,  
								'Lamin'	=>	$lamin,
								'LongMax'	=>	$longmax,   
								'Long'	=>	$Longtitude,
								'Longmin'	=>	$longmin
								// 13.777786,100.562767
								// 13.778417,100.556651
							));
						}
					}else
					{
						$this->response(array(
							'status'	=> 	'Cant Join',
							'Name'      =>  $data['Name_Activities']
						));
					}
				}
			}else{
				$this->response(array(
					'status'	=> 	'NotinDate',
					'Name'      =>  $data['Name_Activities']
				));
			}

		}else{
			$this->response(array(
				'status'	=> 	'AlreadyJoin',
				'Name'      =>  $data['Name_Activities']
			));
		}
	}
}