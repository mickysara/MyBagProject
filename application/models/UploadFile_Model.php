<?php
class UploadFile_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function upload_image($inputdata,$filename)
    { 
        function randtext($range){
        $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIGKLMNOPQRSTUVWXYZ';
        $start = rand(1,(strlen($char)-$range));
        $shuffled = str_shuffle($char);
        return substr($shuffled,$start,$range);
        } 
        //echo randtext(1);  
        $firststring = randtext(1);
        $addurl = ''.random_string('alnum',30);
        $addbaseurl = $firststring.$addurl;

        $dateshow = date("Y/m/d");
        $randomqrcode = random_string('alpha', 10);

        $repostrnono = base_url(uri_string());
        $arraystate2 = (explode("/",$repostrnono));
        $idRepo = ($arraystate2[6]);

        
            if($filename!='' ){
            $filename1 = explode(',',$filename);
            foreach($filename1 as $file){
            
              $str = $file;
              $arraystate = (explode(".",$str));
              // echo ($arraystate[1]);

         if($arraystate[1]=="pdf"){
          $showtype = "PDF File";
         }else if($arraystate[1]=="docx"){
          $showtype = "Microsoftword";
         }else if($arraystate[1]=="pptx"){
          $showtype = "Microsoftpowerpoint";
         }else if($arraystate[1]=="xlsx"){
          $showtype = "Microsoftexcel";
         }else if($arraystate[1]=="jpeg"){
          $showtype = "JPEG";
         }else if($arraystate[1]=="png"){
          $showtype = "PNG";
         }else if($arraystate[1]=="jpg"){
          $showtype = "JPG";
         }
          $showtypeall = $showtype;

        $fill_user = array(
          'Uploadby' => $this->session->userdata('Id_Student'),
          'Topic' => $inputdata['topic'],
          'Detail' => $inputdata['detail'],
          'Name_Document' => $file,
          'Date'=> $dateshow,
          'Type'=> $showtypeall,
          'QR_Code'=> $randomqrcode,
          'Url'=> $addbaseurl,
          'ID_Activities'=> $idRepo,
        );
        
      $this->db->insert('Document', $fill_user); 
      


        } 
      }
     
    }

    public function Activities_view($id){
        $query=$this->db->query("SELECT *
                                 FROM Activities acid
                                 WHERE acid.ID_Activities = $id");
        return $query->result_array();
    }

    public function edit_data($id){
      $query=$this->db->query("SELECT *
                               FROM Document upid
                               WHERE upid.ID_Document = $id");
      return $query->result_array();
  }
  
  public function editdataupload($inputdata,$filename)
    { 
        $dateshow = date("Y/m/d");
        $randomqrcode = random_string('alpha', 10);

        $repostrnono = base_url(uri_string());
        $arraystate2 = (explode("/",$repostrnono));
        $idRepo = ($arraystate2[6]);

            if($filename!='' ){
            $filename1 = explode(',',$filename);
            foreach($filename1 as $file){
            
              $str = $file;
              $arraystate = (explode(".",$str));
              // echo ($arraystate[1]);

         if($arraystate[1]=="pdf"){
          $showtype = "PDF File";
         }else if($arraystate[1]=="docx"){
          $showtype = "Microsoftword";
         }else if($arraystate[1]=="pptx"){
          $showtype = "Microsoftpowerpoint";
         }else if($arraystate[1]=="xlsx"){
          $showtype = "Microsoftexcel";
         }else if($arraystate[1]=="jpeg"){
          $showtype = "JPEG";
         }else if($arraystate[1]=="png"){
          $showtype = "PNG";
         }else if($arraystate[1]=="jpg"){
          $showtype = "JPG";
         }
          $showtypeall = $showtype;

        $fill_user = array(
          'Topic' => $inputdata['topic'],
          'Detail' => $inputdata['detail'],
          'Name_Document' => $file
        );
        
        $this->db->where('ID_Document', $this->input->post('ID_Document'));
        $query=$this->db->update('Document',$fill_user);
      


        } 
      }
     
    }

    public function delete_data($id){
      $this->db->query("DELETE FROM Document WHERE ID_Document= $id");
    }

    public function view_data($id){
      $query=$this->db->query("SELECT *
                               FROM Document upid
                               WHERE upid.ID_Document = $id");
      return $query->result_array();
  }
 }
  
