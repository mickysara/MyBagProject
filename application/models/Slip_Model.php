<?php
class Slip_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function upload_slip($filename)
    { 
        $repostrnono = base_url(uri_string());
        $arraystate2 = (explode("/",$repostrnono));
        $idRepo = ($arraystate2[6]);

            if($filename!='' ){
            $filename1 = explode(',',$filename);
            foreach($filename1 as $file){

            $object = array(
                'Image'  =>  $file,
                'ID_Activities'  => $idRepo
            );
            $this->db->insert('Slip',$object);
      


        } 
      }
     
    }
   
 }
  
