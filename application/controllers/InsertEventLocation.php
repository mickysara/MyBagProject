<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertEventLocation extends CI_Controller {

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
            redirect('inActivity/showdata/'.$id,'refresh');
        }else{
            $object = array(
                'ID_Activities' =>  $this->input->post("id"),
                'NameLocation'  =>  $this->input->post("Name"),
                'Latitude'      =>  $this->input->post("latitude"),
                'Longtitude'    =>  $this->input->post("longtitude")
            );
            $this->db->insert('Eventlocation', $object);

            
            redirect('inActivity/showdata/'.$id,'refresh');
            
        }
    }

}

/* End of file InsertEventLocation.php */
