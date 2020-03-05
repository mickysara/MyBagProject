<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertEventLocation extends CI_Controller {

    public function urllocation()
    {
        $qq =  $this->db->query("SELECT ID_Activities
             FROM Activities
             ORDER BY ID_Activities DESC
             LIMIT 1");
             
             foreach($qq->result_array() as $data2)
    {
              

        echo $data2['ID_Activities'];
        redirect('InsertEventLocation/insert/'.$data2['ID_Activities']);
    }
    }

    public function insert($id)
    {
        $this->load->view('Header');
        $this->data['id']= $id; //Upfile คือชื่อของโมเดล
        $this->load->view('InsertEventLocation', $this->data, FALSE);
        $this->load->view('Footer');
    }

    public function Add()
    {
        $id = $this->input->post("id");
        $location = $this->input->post("where");
        if($location == "cpc")
        {
            $object = array(
                'ID_Activities' =>  $this->input->post("id"),
                'NameLocation'  =>  "มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก วิทยาเขตจักพงษภูวนารถ",
                'Latitude'      =>  "13.778",
                'Longtitude'    =>  "100.556"
            );
            $this->db->insert('Eventlocation', $object);
            redirect('AddLoan/Insert','refresh');
        }else{
            $object = array(
                'ID_Activities' =>  $this->input->post("id"),
                'NameLocation'  =>  $this->input->post("Name"),
                'Latitude'      =>  $this->input->post("latitude"),
                'Longtitude'    =>  $this->input->post("longtitude")
            );
            $this->db->insert('Eventlocation', $object);

            
            redirect('AddLoan/Insert','refresh');
            
        }
    }

}

/* End of file InsertEventLocation.php */
