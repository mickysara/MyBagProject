<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class End extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('InsertActivity_Model','InsertActivity'); 
    }
    public function ShowAll($id)
    {
        $this->load->view('Header');
        $this->data['InsertActivity']= $this->InsertActivity->InActivity($id); //Upfile คือชื่อของโมเดล
        $this->load->view('End', $this->data, FALSE);      
        $this->load->view('Footer');
    }
    public function download($File)
        {
            
                $this->load->helper('download');
                $this->db->where('Id_Project', $File);
                $data = $this->db->get('Project', 1);
                $fileInfo = $data->result_array();
                foreach($fileInfo as $d)
                {
        
                $this->db->where('File', $d['Id_Project']);
        
                    echo $File;
        
                    //Path File
                    $file = './uploads/'.$d['File'];
                    force_download($file, NULL);
                }
    
        }
}

/* End of file MyDoc.php */     