<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailDoc extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
    }  
    public function index()
    {


    }

    public function view($view_id)

        {
            $this->data['view_data']= $this->Upload->view_data($view_id);
            $this->load->view('Header');
            $this->load->view('DetailDoc', $this->data, FALSE);
            $this->load->view('Footer');
        }
        public function download($url)
        {
            
                $this->load->helper('download');
                $this->db->where('Url', $url);
                $data = $this->db->get('Document', 1);
                $fileInfo = $data->result_array();
                foreach($fileInfo as $d)
                {
        
                $this->db->where('ID_Document', $d['ID_Document']);
        
                    echo $d['File'];
        
                    //Path File
                    $file = 'uploads/'.$d['Name_Document'];
                    force_download($file, NULL);
                }
    
            }
            public function downloadqrcode($url)
            {
                $this->load->helper('download');
                $this->db->where('Url', $url);
                $data = $this->db->get('Document', 1);
                $fileInfo = $data->result_array();
                foreach($fileInfo as $d)
                {
        
                $this->db->where('Id_Upload', $d['ID_Document']);
                    echo $d['Qr_Codename'];
        
                    //Path File
                    $file = './assets/img/qrcode/'.$d['QR_Code'].'.png';
                    force_download($file, NULL);
                }
            }
}

/* End of file DetailDocController.php */
