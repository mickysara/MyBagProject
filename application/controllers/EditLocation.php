<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class EditLocation extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('EditLocation');
        $this->load->view('Footer');
    }
    public function Edit($id)
      {

              $data = array(
                'NameLocation' => $this->input->post('Name'),
                'Latitude' => $this->input->post('latitude'),
                'Longtitude' => $this->input->post('longtitude')
              );  
              $this->db->where('Id_location',$id);
            $query = $this->db->update('Eventlocation', $data); 
          
          redirect('EditLocation');
          
      }

}

/* End of file AlertLogin.php */
