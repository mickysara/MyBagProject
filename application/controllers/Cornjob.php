<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cornjob extends CI_Controller {

    public function StartActivity()
    {
        $Datenow = date('Y-m-d');
        $Timenow = "17:00:00";//date('H:i:s');

        $query = $this->db->query("SELECT * FROM Activities WHERE DateStart <= '$Datenow' AND DateEnd >= '$Datenow'");

        foreach ($query->result_array() as $data)
        {
            if($data['TimeStart'] == $Timenow)
            {
                $object = array(
                    'Status'    => '2'
                );
                $this->db->where('ID_Activities', $data['ID_Activities']);
                $this->db->update('Activities', $object);
                
            }else if($data['TimeEnd'] == $Timenow)
            {
                $object = array(
                    'Status'    => '3'
                );
                $this->db->where('ID_Activities', $data['ID_Activities']);
                $this->db->update('Activities', $object);
            }
        }
        
        echo "sucess";
    }

}

/* End of file Cornjob.php */
