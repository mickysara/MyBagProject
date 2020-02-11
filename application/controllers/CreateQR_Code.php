<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CreateQR_Code extends CI_Controller{

    function  __construct(){
        parent::__construct();
        $this->load->helper('url'); //Loading url helper  
        
    }
    
    function send(){
 
   
        $this->load->library('ciqrcode');
        $this->load->library('image_lib');
        
        $this->db->select('*');
        $this->db->order_by('ID_Document', 'desc');
        $data = $this->db->get('Document',1);
        $r = $data->row_array();

        $params['data'] = base_url().'/DetailDoc/download/'.$r['Url'];
        $params['level'] = 'H';
        $params['size'] = 50;
        $params['savename'] = FCPATH.'./assets/img/qrcode/'. $r['QR_Code'].'.png';
        $this->ciqrcode->generate($params);
        
        
        $this->db->select('*');
        $this->db->order_by('ID_Document', 'desc');
        $result = $this->db->get('Document',1);
        $data = $result->row_array();

        redirect('DetailDoc/view/'.$data['ID_Document'],'refresh');

    }
    
}
