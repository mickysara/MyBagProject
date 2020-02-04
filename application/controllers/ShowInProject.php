<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ShowInProject extends CI_Controller {

    public function Show($id)
    {
        $this->data['ID'] = $id;
        $this->load->view('Header');
        $this->load->view('ShowInProject', $this->data, FALSE);
        $this->load->view('Footer');
    }

}

/* End of file ShowInProject.php */
