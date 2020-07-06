<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TypeActivities extends CI_Controller {

    public function index()
    {
        
    }
    public function InsertType()
    {
        $this->load->view('Header');
        $this->load->view('TypeActivities');
        $this->load->view('Footer');
    }
    public function InsertFile()
    {
        $data = array(
            'Name_TypeActivitiesFile' => $this->input->post('TypeFile')
          );  
        $this->db->insert('TypeActivitiesFile', $data); 
        redirect('TypeActivities/InsertType');
    }
    public function InsertBook()
    {
        $data = array(
            'Name_TypeActivity' => $this->input->post('TypeBook')
          );  
        $this->db->insert('TypeActivities', $data); 
        redirect('TypeActivities/InsertType');
    }
    public function Relation()
    {
        $data = array(
            'ID_TypeActivitiesFile' => $this->input->post('TypeFile'),
            'Id_TypeActivity' => $this->input->post('TypeBook')
          );  
        $this->db->insert('RelationType', $data); 

        redirect('TypeActivities/InsertType');
    }

}

/* End of file AllActivity.php */
