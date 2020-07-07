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
class GetJoinAc_api extends \Restserver\Libraries\REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
       
        
	}
	
	public function index_post()
	{
        $id = $this->input->post("Id_Users");

        $query = $this->db->query("SELECT Activities.Name_Activities,Activities.DateStart,Activities.DateEnd,Activities.TimeStart,Activities.TimeEnd,Activities.Compel,BookActivity.Id_BookActivity,Eventlocation.NameLocation FROM Activities 
        LEFT JOIN NameList ON NameList.ID_Activities = Activities.ID_Activities 
        LEFT JOIN BookActivity ON BookActivity.ID_Activities = Activities.ID_Activities 
        LEFT JOIN Eventlocation ON Activities.Id_location = Eventlocation.Id_location
        WHERE NameList.ID_List = $id GROUP BY Activities.ID_Activities");

            $this->response(array(
                'status'    =>  'true',
                'data'      =>  $query->result()
            ));
    }
}