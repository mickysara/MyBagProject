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
                    $this->db->where('Name_Result', $Result);
                    $RS = $this->db->get('Result');
                    $ShowRS = $RS->row_array();

                    $Type = $this->input->post('Type');
                    $this->db->where('Name_TypeProject', $Type);
                    $T = $this->db->get('TypeProject');
                    $ShowT = $T->row_array();
            
                    $this->db->where('NameProject', $name);
                    $query = $this->db->get('Project', 1);
                    
                    if($query->num_rows() == 1)
                    {
                        
                    }else{
                        $object = array(
                            'NameProject'   =>  $name,
                            'Result'        =>  $ShowRS['Id_Result'],
                            'Type'          =>  $ShowT['Id_TypeProject'],
                            'Status'        =>  1,
                            'Campus'        =>  1,
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

 public function EditProject($inputdata,$filename)
 { 
    $repostrnono = base_url(uri_string());
    $arraystate2 = (explode("/",$repostrnono));
    $idRepo = ($arraystate2[6]);

         if($filename!='' ){
         $filename1 = explode(',',$filename);
         foreach($filename1 as $file){

            $name = $this->input->post('Name');

            $Result = $this->input->post('Result');
            $this->db->where('Name_Result', $Result);
            $RS = $this->db->get('Result');
            $ShowRS = $RS->row_array();

            $Type = $this->input->post('Type');
            $this->db->where('Name_TypeProject', $Type);
            $T = $this->db->get('TypeProject');
            $ShowT = $T->row_array();
    
            $this->db->where('NameProject', $name);
            $query = $this->db->get('Project', 1);
            
            if($query->num_rows() == 1)
            {
                echo json_encode(['status' => 0, 'msg' => 'Fail']);
            }else{
                $object = array(
                    'NameProject'   =>  $name,
                    'Result'        =>  $ShowRS['Id_Result'],
                    'Type'          =>  $ShowT['Id_TypeProject'],
                    'Status'        =>  1,
                    'Campus'          =>  1,
                    'Date'          =>  date("Y-m-d"),
                    'File'          =>  $file,
                    'Id_Users'      =>  $this->session->userdata('Id_Users')
                );
         
                     $this->db->where('Id_Project', $idRepo);
                     $this->db->update('Project', $object);
                     
                     $id = $this->db->insert_id();
                     
                     echo json_encode(['status' => 1, 'msg' => 'Success','data'  =>  $id]);
                 }
   }
  
 }



   
  
 

 
}

  
}