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
class UploadMoney_api extends \Restserver\Libraries\REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
       
        
	}
	
	public function index_post()
	{
        $Money = $this->input->post("Money");
        $Date       = $this->input->post("Date");
        $Time     = $this->input->post("Time");
        $User   =   $this->input->post("User"); 

        
        
        $config['upload_path'] = './img/DepositUser/';
        $config['allowed_types'] = '*';
        $config['max_size']  = '1000000000';
        $config['max_width']  = '1000000000';
        $config['max_height']  = '1000000000';
        
        $this->upload->initialize($config);
        
        if ( ! $this->upload->do_upload('Image')){
            $error = array('error' => $this->upload->display_errors());
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            
        }


                



        
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name'];
        
        $ddate = date("Y-m-d", strtotime($Date) );
        

        $object = array(
            'DepositBy' =>  $User,
            'Money'     =>  $Money,
            'Slip'      =>  $file_name,
            'Status'    =>  "รออนุมัติ",
            'DateTime'  =>  $ddate." ".$Time
        );

        $this->response(array(
            'status'	=> 	'Success',
            'Money'     =>  $Money,
            'Date'      =>  $ddate,
            'Time'      =>  $Time,
            'User'      =>  $User,
        ));
        $this->db->insert('Depoosit', $object);
        
        
	}

}