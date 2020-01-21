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
        
       // echo '<img src="'.base_url().'asd.png" style="width: 250px; height: 250px;" />';

        $config['source_image'] = FCPATH.'./assets/img/qrcode/'.$r['QR_Code'].'.png';
        $config['image_library'] = 'gd2';
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = '';//the overlay image
        $config['wm_x_transp'] = 115;
        $config['wm_y_transp'] = 83.25;
        $config['width'] = 50;
        $config['height'] = 50;
        $config['padding'] = 50;
        $config['wm_opacity'] = 100;
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'center';
        
        $this->image_lib->initialize($config);
        if (!$this->image_lib->watermark()) {
            $response['wm_errors'] = $this->image_lib->display_errors();
            $response['wm_status'] = 'error';
        } else {
            $response['wm_status'] = 'success';
        }
        
        $this->db->select('*');
        $this->db->order_by('ID_Document', 'desc');
        $result = $this->db->get('Document',1);
        $data = $result->row_array();

        redirect('DetailDoc/view/'.$data['ID_Document'],'refresh');

    }
    
}
