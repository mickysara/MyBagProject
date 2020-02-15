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
                        
                    }else{
                        $object = array(
                            'NameProject'   =>  $name,
                            'Result'        =>  $Result,
                            'Type'          =>  $Type,
                            'Status'        =>  1,
                            'Date'          =>  date("Y-m-d"),
                            'File'          =>  $file,
                            'Id_Users'      =>  $this->session->userdata('Id_Users')
                        );
            
            
                        $this->db->insert('Project', $object);
                        
                        $id = $this->db->insert_id();
                        
                    }
      }
     
    }
   
  
 
      
     
    

    
 }
  
}