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
        $idRepo = ($arraystate2[5]);

        
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
          
          $this->db->where('Id_Student',$this->session->userdata('ID'));
          $showname = $this->db->get('student');
          $showname2 = $showname->row_array();

        $fill_user = array(
          'Uploadby' =>  $showname2['Id_Users'],
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
    public function upload_slip($inputdata,$filename)
    { 
    
            if($filename!='' ){
            $filename1 = explode(',',$filename);
            foreach($filename1 as $file){

              $DateStart = strtotime($inputdata['Date']);
              $NewDateStart = date('Y-m-d',strtotime("-543 year",$DateStart));

              // $strYear = date("Y",strtotime($Date))-543;
              // $strMonth = date("m",strtotime($Date));
              // $strDay = date("d",strtotime($Date));

              // $Showstr = $strYear."-".$strMonth."-".$strDay;

              $Time = $inputdata['Time'];
              $NewTime = date("H:i:sa", strtotime($Time));

              $ShowDateTime = $NewDateStart." ".$NewTime;
              

            $object = array(
                'DepositBy'  =>  $this->session->userdata('Id_Users'),
                'Money'  =>  $this->input->post('money'),
                'Slip'  =>  $file,
                'Status'  =>  "รออนุมัติ",
                'DateTime'  =>  $ShowDateTime
            );
            $this->db->insert('Depoosit', $object);
      


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
        $idRepo = ($arraystate2[5]);

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


  public function ClearMoney($inputdata,$filename)
    { 
    
      if($filename!='' ){
        $filename1 = explode(',',$filename);
        foreach($filename1 as $file){

          $this->db->where('ID_Loan', $this->input->post('ID_Loan'));
          $query = $this->db->get('Loan');
          $show = $query->row_array();

          $showshow = $this->input->post('Money_Use');
          $cal = $show['Money'] - $showshow;

                    $object = array(
                        'Image'          =>  $file,
                        'Money_Use'      =>  $this->input->post('Money_Use'),
                        'Sum'      =>  $cal
                    );
        
                    
                    $this->db->where('ID_Loan', $this->input->post('ID_Loan'));
                    $query=$this->db->update('Loan',$object);
                    
                }
  }
}
 }
  
