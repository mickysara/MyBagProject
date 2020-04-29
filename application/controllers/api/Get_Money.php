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
class Get_Money extends \Restserver\Libraries\REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
       
        
	}
	
	public function index_post()
	{
		$Id_Users = $this->input->post("Id_Users");
        
        $this->db->where('ID_User', $Id_Users);
        $query = $this->db->get('Users', 1);

        $data = $query->row_array();

        if($data['ID_Type'] == 1)
        {
            $this->db->where('Id_Users', $Id_Users);
            $query = $this->db->get('student', 1);

            $data = $query->row_array();

            $this->response(array(
				'Money'	=> $data['Money']
			));
        }else if($data['ID_Type'] == 2)
        {
            $this->db->where('Id_Users', $Id_Users);
            $query = $this->db->get('Teacher', 1);

            $data = $query->row_array();

            $this->response(array(
				'Money'	=> $data['Money']
			));
        }else if($data['ID_Type'] == 3)
        {
            $this->db->where('Id_Users', $Id_Users);
            $query = $this->db->get('Employee', 1);

            $data = $query->row_array();

            $this->response(array(
				'Money'	=> $data['Money']
			));
        }else
        {
            $this->db->where('Id_Users', $Id_Users);
            $query = $this->db->get('Shop', 1);

            $data = $query->row_array();

            $this->response(array(
				'Money'	=> $data['Money']
			));
        }
    }
}
