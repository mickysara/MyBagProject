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
class api extends \Restserver\Libraries\REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function index_get()
    {
        $query = $this->db->get('Major');
        $data = $query->result();
        $this->response($data);
        
    }

    public function index_post()
    {
        $query = $this->db->get('upload');
        $data = $query->result();
        $this->response($data);
        
    }
    public function update_put()
	{
		$ID = $this->put('ID');
        $data = array( 
			'id_emp' => '354268',
        ); 	

        $this->db->where('ID', $ID);
        
        $this->db->update('repository_member', $data);

        		$this->response(array(
				'message' => 'success', 
				'status' => 'true'));
        
	}


}
