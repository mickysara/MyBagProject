<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class EmailController extends CI_Controller{

    function  __construct(){
        parent::__construct();
        $this->load->helper('url'); //Loading url helper  
        
    }
    
    function send(){
 
   
        $this->load->library('ciqrcode');
        $this->load->library('image_lib');
        
        $this->db->select('*');
        $this->db->order_by('Id_Upload', 'desc');
        $data = $this->db->get('Upload',1);
        $r = $data->row_array();

        $params['data'] = base_url().'/DetailDocController/download/'.$r['Url'];
        $params['level'] = 'H';
        $params['size'] = 50;
        $params['savename'] = FCPATH.'./assets/img/qrcode/'. $r['Qr_Codename'].'.png';
        $this->ciqrcode->generate($params);
        
       // echo '<img src="'.base_url().'asd.png" style="width: 250px; height: 250px;" />';

        $config['source_image'] = FCPATH.'./assets/img/qrcode/'.$r['Qr_Codename'].'.png';
        $config['image_library'] = 'gd2';
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = './AOT.jpg';//the overlay image
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
        $this->db->order_by('Id_Upload', 'desc');
        $result = $this->db->get('Upload',1);
        $data = $result->row_array();

        redirect('DetailDocController/edit/'.$data['Id_Upload'],'refresh');

    }
    function genQrChat(){
 
   
        $this->load->library('ciqrcode');
        $this->load->library('image_lib');
        
        $this->db->select('*');
        $this->db->order_by('Id_Chatroom', 'desc');
        $data = $this->db->get('Chatroom',1);
        $r = $data->row_array();

        $params['data'] = base_url().'/InchatroomController/showchat/'.$r['Id_Chatroom'];
        $params['level'] = 'H';
        $params['size'] = 50;
        $params['savename'] = FCPATH.'./assets/img/qrcode/chatroom/'. $r['Code_Chatroom'].'.png';
        $this->ciqrcode->generate($params);


        $config['source_image'] = FCPATH.'./assets/img/qrcode/chatroom/'. $r['Code_Chatroom'].'.png';
        $config['image_library'] = 'gd2';
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = './AOT.jpg';//the overlay image
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
        $this->db->order_by('Id_Chatroom', 'desc');
        $data = $this->db->get('Chatroom',1);
        $r = $data->row_array();

        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
     
        $ip = explode(',',$ipaddress);
        
        $object = array(
          'Id_Emp' =>  $this->session->userdata('employeeId'),
          'Ip'     =>  $ip[0],
          'Action' =>  'สร้างแชทหัวข้อ : '.$r['Topic']
        );
        $this->db->insert('Logs', $object);

        
        
        redirect('AdminChatroomController/showchat/'.$r['Id_Chatroom'],'refresh');
  

    }


    function senddoc(){
 
   
        $this->load->library('ciqrcode');
        $this->load->library('image_lib');
        
        $this->db->select('*');
        $this->db->order_by('Id_Upload', 'desc');
        $data = $this->db->get('Upload',1);
        $r = $data->row_array();

        $params['data'] = base_url().'/DetailDocController/download/'.$r['Url'];
        $params['level'] = 'H';
        $params['size'] = 50;
        $params['savename'] = FCPATH.'./assets/img/qrcode/'. $r['Qr_Codename'].'.png';
        $this->ciqrcode->generate($params);
        
       // echo '<img src="'.base_url().'asd.png" style="width: 250px; height: 250px;" />';

        $config['source_image'] = FCPATH.'./assets/img/qrcode/'.$r['Qr_Codename'].'.png';
        $config['image_library'] = 'gd2';
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = './AOT.jpg';//the overlay image
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
        $this->db->order_by('Id_Upload', 'desc');
        $result = $this->db->get('Upload',1);
        $data = $result->row_array();

        
        redirect('DetailDocController/edit/'.$data['Id_Upload'],'refresh');
        // redirect('MyDocumentController');

    }

    function sendrepo(){
 
   
        $this->load->library('ciqrcode');
        $this->load->library('image_lib');
        
        $this->db->select('*');
        $this->db->order_by('Id_UploadInRepository', 'desc');
        $data = $this->db->get('UploadInRepository',1);
        $r = $data->row_array();

        $params['data'] = base_url().'/DetailDocController/downloadrepo/'.$r['Url'];
        $params['level'] = 'H';
        $params['size'] = 50;
        $params['savename'] = FCPATH.'./assets/img/qrcode/'. $r['Qr_Codename'].'.png';
        $this->ciqrcode->generate($params);
        
       // echo '<img src="'.base_url().'asd.png" style="width: 250px; height: 250px;" />';

        $config['source_image'] = FCPATH.'./assets/img/qrcode/'.$r['Qr_Codename'].'.png';
        $config['image_library'] = 'gd2';
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = './AOT.jpg';//the overlay image
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
        $this->db->order_by('Id_UploadInRepository', 'desc');
        $result = $this->db->get('UploadInRepository',1);
        $data = $result->row_array();

        $this->db->where('Id_Repository', $data['Id_Repository']);
        $qq = $this->db->get('Repository', 1);
        $rr = $qq->row_array();
        
        redirect('repositoryController/showdata/'.$data['Id_Repository'],'refresh');
        // redirect('MyDocumentController');
}


        function insertlog()
        {
            $this->db->select('*');
        $this->db->order_by('Id_Upload', 'desc');
        $result = $this->db->get('Upload',1);
        $data = $result->row_array();

        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
     
        $ip = explode(',',$ipaddress);
        
        $object = array(
          'Id_Emp' =>  $this->session->userdata('employeeId'),
          'Ip'     =>  $ip[0],
          'Action' =>  'สร้างหัวข้อชื่อ : '.$data['Topic'] . ',ไฟล์ชื่อ : ' . $data['File']
        );
        $this->db->insert('Logs', $object);
        redirect('DetailDocController/edit/'.$data['Id_Upload'],'refresh');
        }



        function insertlogrepo()
        {
            $this->db->select('*');
            $this->db->order_by('Id_UploadInRepository', 'desc');
            $resultlog = $this->db->get('UploadInRepository',1);
            $datalog = $resultlog->row_array();
    
            $this->db->where('Id_Repository', $datalog['Id_Repository']);
            $qq = $this->db->get('Repository', 1);
            $rr = $qq->row_array();
            
            $ipaddress = '';
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if(getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if(getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if(getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if(getenv('HTTP_FORWARDED'))
                $ipaddress = getenv('HTTP_FORWARDED');
            else if(getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'UNKNOWN';
         
            $ip = explode(',',$ipaddress);
            
            $object = array(
              'Id_Emp' =>  $this->session->userdata('employeeId'),
              'Ip'     =>  $ip[0],
              'Action' =>  'อัพโหลดไฟล์หัวข้อ : '.$datalog['Topic'] . ', ไฟล์ชื่อ : ' . $datalog['File'] . ', ในทีม : '
            );
            $this->db->insert('Logs', $object);
            
            redirect('repositoryController/showdata/'.$datalog['Id_Repository'],'refresh');
            // redirect('MyDocumentController');
        }
}
