<?php
class Project_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function InsertProject($inputdata,$filename)
    { 
    
            if($filename!='' ){
            $filename1 = explode(',',$filename);
            foreach($filename1 as $file){

                $name = $this->input->post('Name');
                    $Result = $this->input->post('Result');
                    $Type = $this->input->post('Type');
            
                    $this->db->where('NameProject', $name);
                    $query = $this->db->get('Project', 1);
            
                    if($query->num_rows() == 1)
                    {
                        echo json_encode(['status' => 0, 'msg' => 'Fail']);
                    }else{
                        $object = array(
                            'NameProject'   =>  $name,
                            'Result'        =>  $Result,
                            'Type'          =>  $Type,
                            'Status'        =>  'รออนุมัติ',
                            'Date'          =>  date("Y-m-d"),
                            'File'          =>  $file,
                            'Id_Users'      =>  $this->session->userdata('Id_Users')
                        );
            
            
                        $this->db->insert('Project', $object);
                        
                        $id = $this->db->insert_id();
                        
                        echo json_encode(['status' => 1, 'msg' => 'Success','data'  =>  $id]);
                    }
      }
     
    }
   
  
 
      
     
    

    
 }
  
}