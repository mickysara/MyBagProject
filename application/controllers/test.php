<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

    public function Hi()
    {
        $query = $this->db->get('Shop');

        foreach($query->result_array() as $data)
        {
            $object = array(
                'Username'  =>  $data['ID_Shop'],
                'Password'  =>  $data['Password']
            );
            $this->db->where('ID_User', $data['Id_Users']);
            $this->db->where('ID_Type', 4);
            $this->db->update('Users', $object);
        }

        echo "success";

        
    }

}

/* End of file test.php */
