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

    
    public function Delete()
    {
        $userinsert = $this->input->post('Teacher');
        $id         = $this->input->post('id');
        $row = array();

        

        foreach($userinsert as $index => $userinsert )
        {
            $row[] = $userinsert;
        }
     
        $this->db->where_in('Id_JoinAc', $row);
        $this->db->delete('InTeam');
    }

}

/* End of file EditTeam.php */
 ?>