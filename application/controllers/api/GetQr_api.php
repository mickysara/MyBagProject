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
class GetQr_api extends \Restserver\Libraries\REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
       
        
	}
	
	public function index_post()
	{
        $Id_User = $this->input->post("Iduser");

        $this->db->where('Id_Users', $Id_User);
        $query = $this->db->get('Shop', 1);
        $data  = $query->row_array();

        $this->response(array(
            'Url'	=> 	'https://www.harmonicmix.xyz/assets/img/qrcodeShop/'.$data['QR_Code'].'.png'
        ));
        
    }
}