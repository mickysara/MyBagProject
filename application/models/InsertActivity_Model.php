<?php
class InsertActivity_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function InsertActivity($inputdata,$filename)
    { 


        $DateStart = strtotime($inputdata['DateStart']);
        $NewDateStart = date('Y-m-d',strtotime("-543 year",$DateStart));
        
        $DateEnd = strtotime($inputdata['DateEnd']);
        $NewDateEnd = date("Y-m-d", strtotime("-543 year",$DateEnd));

        $TimeStart = $inputdata['TimeStart'];
        $NewTimeStart = date("H:i:sa", strtotime($TimeStart));

        $TimeEnd = $inputdata['TimeEnd'];
        $NewTimeEnd = date("H:i:sa", strtotime($TimeEnd));

        $DateSent = date("Y/m/d");

            if($filename!='' ){
            $filename1 = explode(',',$filename);
            foreach($filename1 as $file){       

                         $datateacher = $this->db->get('Teacher');
                         $showteacher = $datateacher->row_array();
                   
                         if($this->session->userdata('ID') == $showteacher['ID_Teacher']){

                          $fill_user = array(
                            'Name_Activities' => $inputdata['Name'],
                            'Detail' => $inputdata['Detail'],
                            'Type' => $inputdata['Type'],
                            'DateStart' => $NewDateStart,
                            'DateEnd' => $NewDateEnd,
                            'TimeStart' => $NewTimeStart,
                            'TimeEnd' => $NewTimeEnd,
                            'Student_res' => $this->session->userdata('Id_Users'),
                            'Budget' => $inputdata['Budget'],
                            'Confirm_Doc' => $file,
                            'CreateBy'  =>  $this->session->userdata('ID'),
                            'Status' => "รออนุมัติ",
                            'ID_Campus' => "1",
                            'DateSent' => $DateSent,
                          );

                          $fill_loan = array(
                            'Loan' => $inputdata['Budget']
                                              );
                            $this->db->where('ID_Teacher', $this->session->userdata('ID'));
                            $this->db->Update('Teacher', $fill_loan);
                            
                       }else{

        $idTeacher = $inputdata['Teacher_res'];
        $Teacher = explode(" ", $idTeacher);

        $qq =  $this->db->query("SELECT * FROM Teacher WHERE Fname = '$Teacher[0]' AND Lname = '$Teacher[1]'");
        $teach = $qq->row_array();
        
        $fill_user = array(
          'Name_Activities' => $inputdata['Name'],
          'Detail' => $inputdata['Detail'],
          'Type' => $inputdata['Type'],
          'DateStart' => $NewDateStart,
          'DateEnd' => $NewDateEnd,
          'TimeStart' => $NewTimeStart,
          'TimeEnd' => $NewTimeEnd,
          'Student_res' => $this->session->userdata('Id_Users'),
          'Teacher_res' => $teach['Id_Users'],
          'Budget' => $inputdata['Budget'],
          'Confirm_Doc' => $file,
          'CreateBy'  =>  $this->session->userdata('ID'),
          'Status' => "รออนุมัติ",
          'ID_Campus' => "1",
          'DateSent' => $DateSent,
        );
      }
        
      $this->db->insert('Activities', $fill_user); 

          $fill_loan = array(
          'Loan' => $inputdata['Budget']
                            );
          $this->db->where('ID_Teacher', $inputdata['Teacher_res']);
          $this->db->Update('Teacher', $fill_loan); 
      

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
  
