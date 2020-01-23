<?php
class InsertActivity_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function InsertActivity($inputdata,$filename)
    { 
        $DateStart = $inputdata['DateStart'];
        $NewDateStart = date("Y-m-d", strtotime($DateStart));

        $DateEnd = $inputdata['DateEnd'];
        $NewDateEnd = date("Y-m-d", strtotime($DateEnd));

        $TimeStart = $inputdata['TimeStart'];
        $NewTimeStart = date("H:i:sa", strtotime($TimeStart));

        $TimeEnd = $inputdata['TimeEnd'];
        $NewTimeEnd = date("H:i:sa", strtotime($TimeEnd));

        $DateSent = date("Y/m/d");

            if($filename!='' ){
            $filename1 = explode(',',$filename);
            foreach($filename1 as $file){       

        $fill_user = array(
          'Name_Activities' => $inputdata['Name'],
          'Detail' => $inputdata['Detail'],
          'Type' => $inputdata['Type'],
          'DateStart' => $NewDateStart,
          'DateEnd' => $NewDateEnd,
          'TimeStart' => $NewTimeStart,
          'TimeEnd' => $NewTimeEnd,
          'Student_res' => $this->session->userdata('ID'),
          'Teacher_res' => $inputdata['Teacher_res'],
          'Budget' => $inputdata['Budget'],
          'Confirm_Doc' => $file,
          'CreateBy'  =>  $this->session->userdata('ID'),
          'Status' => "รออนุมัติ",
          'DateSent' => $DateSent,
        );
        
      $this->db->insert('Activities', $fill_user); 
      


        } 
      }
     
    }
    public function view_data(){

      $ID = $this->session->userdata('ID');
      $query = $this->db->query("SELECT * 
      FROM Activities 
    WHERE Activities.CreateBy = '$ID' 
      ORDER BY FIELD(Activities.Status, 'รออนุมัติ', 'อนุมัติ', 'เริ่ม','สิ้นสุด','รอการเคลียร์เงิน','ขออนุมัติเคลียร์เงิน','เคลียร์เงินเสร็จสิ้น')");
      
      return $query->result_array();
  }

  public function InActivity($ID){

    $this->db->where('ID_Activities', $ID);
    $query = $this->db->get('Activities');
    
    return $query->result_array();
}
  public function view_payloan(){
    $status = "ขออนุมัติเคลียร์เงิน";
    $query=$this->db->query("SELECT *
                            FROM Activities upid
                            WHERE upid.Status = '$status'");
    return $query->result_array();
}
 }
  
