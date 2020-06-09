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
class GetJoinActivity extends \Restserver\Libraries\REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
       
        
	}
	
	public function index_post()
	{
        $Id_Users = $this->input->post("Id_Users");
        
        $query = $this->db->query("SELECT Activities.Name_Activities,TypeActivities.Name_TypeActivity,Eventlocation.NameLocation,BookActivity.TimeStamp FROM BookActivity 
        LEFT JOIN Activities ON BookActivity.ID_Activities = Activities.ID_Activities 
        LEFT JOIN TypeActivities ON Activities.Type = TypeActivities.Id_TypeActivity
        LEFT JOIN Eventlocation ON Eventlocation.Id_location = Activities.Id_location
        WHERE BookActivity.Id_User = '$Id_Users' ");

        $this->response(array(
            'status'    =>  'true',
            'data'      =>  $query->result()
        ));
        
	}

}