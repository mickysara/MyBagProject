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
        $NewTimeStart = date("h:i:sa", strtotime($TimeStart));

        $TimeEnd = $inputdata['TimeEnd'];
        $NewTimeEnd = date("h:i:sa", strtotime($TimeEnd));

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
          'Student_res' => $inputdata['Student_res'],
          'Teacher_res' => $inputdata['Teacher_res'],
          'Budget' => $inputdata['Budget'],
          'Confirm_Doc' => $file,
          'CreateBy'  =>  $this->session->userdata('ID'),
          'Status' => "รออนุมัติ",
          'CreateBy' => $this->session->userdata('ID'),
          'DateSent' => $DateSent,
        );
        
      $this->db->insert('Activities', $fill_user); 
      


        } 
      }
     
    }
    public function view_data(){

      $this->db->where('CreateBy', $this->session->userdata('ID'));
      $query = $this->db->get('Activities');
      
      return $query->result_array();
  }
    
 }
  
