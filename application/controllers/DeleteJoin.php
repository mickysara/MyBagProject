<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteJoin extends CI_Controller {

    public function Showdata($id)
    {
        $this->data['id'] = $id;
        $this->load->view('Header');
        $this->load->view('DeleteJoin',$this->data,FALSE);
        $this->load->view('Footer');
    }

}

/* End of file DeleteJoin.php */
