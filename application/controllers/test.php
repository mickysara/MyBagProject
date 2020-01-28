<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

    public function InsertDateTime()
    {
        $ds = date("Y-m-d", strtotime($this->input->post('DateStart')));
        $dn   = date("Y-m-d", strtotime($this->input->post('DateEnd')));

        

        $dayStart = strtotime($ds);
        $dayEnd = strtotime($dn);
        $datediff = $dayEnd - $dayStart;

        $dif = round($datediff / (60 * 60 * 24));

        for($i = 0; $i <= $dif; $i++)
        {
            
            $strNewDate = date ("Y-m-d", strtotime("+$i day", strtotime($ds)));

            $data = array(
                'ID_Activities' =>  '11',
                'Date'          =>  $strNewDate,
                'TimeIn'        =>  $this->input->post('TimeStartDay'.$i),
                'TimeOut'        =>  $this->input->post('TimeEndDay'.$i),
            );
            $this->db->insert('DateOfActivity', $data); 

        }
    }

}

/* End of file test.php */
