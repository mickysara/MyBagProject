<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class EditTeam extends CI_Controller {

    public function Showdata($id)
    {
        $this->data['id'] = $id;
        $this->load->view('Header');
        $this->load->view('EditTeam',$this->data,FALSE);
        $this->load->view('Footer');
    }

}

/* End of file EditTeam.php */
 ?>