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

    public function edit($id)
    {
        $this->load->view('Header');
        $this->load->view('EditEventLocation');
        $this->load->view('Footer');
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
            $object2 = array(
                'Id_location'  =>  1
            );
            $this->db->where('ID_Activities',$id);
            $this->db->update('Activities', $object2);

            redirect('AddLoan/Insert/'.$id,'refresh');
        }else{
            $object = array(
                // 'ID_Activities' =>  $this->input->post("id"),
                'NameLocation'  =>  $this->input->post("Name"),
                'Latitude'      =>  $this->input->post("latitude"),
                'Longtitude'    =>  $this->input->post("longtitude")
            );
            $this->db->insert('Eventlocation', $object);

            $this->db->order_by('Id_location', 'DESC');
            $queryuser = $this->db->get('Eventlocation');
            $showdata = $queryuser->row_array();

            $object2 = array(
                'Id_location'  =>  $showdata['Id_location']
            );
            $this->db->where('ID_Activities',$id);
            $this->db->update('Activities', $object2);
            
            redirect('AddLoan/Insert/'.$id,'refresh');
            
        }
    }


    public function EditLocation()
    {
        $id = $this->input->post("id");
        $location = $this->input->post("where");

        $this->db->where('ID_Activities', $id);
        $queryuser = $this->db->get('Activities');
        $showdata = $queryuser->row_array();

        if($location == "cpc")
        {
            $object = array(
                // 'ID_Activities' =>  $this->input->post("id"),
                'NameLocation'  =>  "มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก วิทยาเขตจักพงษภูวนารถ",
                'Latitude'      =>  "13.778",
                'Longtitude'    =>  "100.556"
            );
            $this->db->where('Id_Location',$showdata['Id_location']);
            $this->db->update('Eventlocation', $object);

            redirect('ShowInProject/Show/'.$showdata['Id_Project'],'refresh');
        }else{
            $object = array(
                // 'ID_Activities' =>  $this->input->post("id"),
                'NameLocation'  =>  $this->input->post("Name"),
                'Latitude'      =>  $this->input->post("latitude"),
                'Longtitude'    =>  $this->input->post("longtitude")
            );
            $this->db->where('Id_Location',$showdata['Id_location']);
            $this->db->update('Eventlocation', $object);
            
            redirect('ShowInProject/Show/'.$showdata['Id_Project'],'refresh');
            
        }
    }
}

/* End of file InsertEventLocation.php */
