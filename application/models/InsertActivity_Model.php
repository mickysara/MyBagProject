<?php
class InsertActivity_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function InsertActivity($inputdata)
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
   

              $repostrnono = base_url(uri_string());
        $arraystate2 = (explode("/",$repostrnono));
        $idRepo = ($arraystate2[6]);

        $idTeacher = $inputdata['Teacher_res'];
        $Teacher = explode(" ", $idTeacher);

        $this->db->where('Id_Student',$this->session->userdata('ID'));
            $AA =  $this->db->get('student');
            $BB = $AA->row_array();

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
                            'Student_res' => $inputdata['Student_res'],
                            'Teacher_res' => $teach['ID_Teacher'],
                            'Budget' => $inputdata['Budget'],
                            'CreateBy'  =>  $this->session->userdata('ID'),
                            'ID_Campus' => $BB['ID_Campus'],
                            'ID_Project' => $idRepo,
                            'Status' => 1,
                            'AmountJoin' => $inputdata['Difday']
                          );
                        
        
                        $this->db->insert('Activities', $fill_user); 

                            $fill_loan = array(
                            'Loan' => $inputdata['Budget']
                                              );
                            $this->db->where('ID_Teacher', $teach['ID_Teacher']);
                            $this->db->Update('Teacher', $fill_loan); 
        
      }
      public function InsertActivityTeacher($inputdata)
    { 

      $repostrnono = base_url(uri_string());
      $arraystate2 = (explode("/",$repostrnono));
      $idRepo = ($arraystate2[6]);

        $DateStart = strtotime($inputdata['DateStart']);
        $NewDateStart = date('Y-m-d',strtotime("-543 year",$DateStart));
        
        $DateEnd = strtotime($inputdata['DateEnd']);
        $NewDateEnd = date("Y-m-d", strtotime("-543 year",$DateEnd));

        $TimeStart = $inputdata['TimeStart'];
        $NewTimeStart = date("H:i:sa", strtotime($TimeStart));

        $TimeEnd = $inputdata['TimeEnd'];
        $NewTimeEnd = date("H:i:sa", strtotime($TimeEnd));

        $DateSent = date("Y/m/d");
    
        
            $this->db->where('ID_Teacher',$this->session->userdata('ID'));
            $AA =  $this->db->get('Teacher');
            $BB = $AA->row_array();
            
            

        $fill_user = array(
          'Name_Activities' => $inputdata['Name'],
          'Detail' => $inputdata['Detail'],
          'Type' => $inputdata['Type'],
          'DateStart' => $NewDateStart,
          'DateEnd' => $NewDateEnd,
          'TimeStart' => $NewTimeStart,
          'TimeEnd' => $NewTimeEnd,
          'Teacher_res' => $this->session->userdata('ID'),
          'Budget' => $inputdata['Budget'],
          'CreateBy'  =>  $this->session->userdata('Id_Users'),
          'ID_Campus' => $BB['ID_Campus'],
          'ID_Project' => $idRepo,
          'Status' => 1,
          'AmountJoin' => $inputdata['Difday']
        );
      
        
      $this->db->insert('Activities', $fill_user); 

          $fill_loan = array(
          'Loan' => $inputdata['Budget']
                            );
          $this->db->where('Id_Users', $this->session->userdata('ID'));
          $this->db->Update('Teacher', $fill_loan); 
      

        
      }
    
    public function view_data(){

     
      $ID = $this->session->userdata('Id_Users');
      $query = $this->db->query("SELECT * 
      FROM Project  WHERE Project.ApproveBy = $ID
      ");

      
      return $query->result_array();
    
  }
  public function view_data2(){

     
    $ID = $this->session->userdata('Id_Users');

    $query = $this->db->query("SELECT * 
    FROM Project
    WHERE Project.Id_Users = $ID");

    
    return $query->result_array();
  
}

public function view_data3(){

     
  $ID = $this->session->userdata('Id_Users');

  $query = $this->db->query("SELECT * 
  FROM Project
  WHERE Project.Id_Users = $ID");

  
  return $query->result_array();

}

  public function InActivity($ID){

    $query = $this->db->query("SELECT * FROM Activities LEFT JOIN TypeActivities ON TypeActivities.Id_TypeActivity = Activities.Type WHERE ID_Activities = $ID ");
    
    
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
  

                            // เพิ่มเวลาและวันที่กิจกรรม //

                            // $ds = date("Y-m-d", strtotime($NewDateStart));
                            // $dn   = date("Y-m-d", strtotime($NewDateEnd));

                            // $dayStart = strtotime($ds);
                            // $dayEnd = strtotime($dn);
                            // $datediff = $dayEnd - $dayStart;
                    
                            // $dif = round($datediff / (60 * 60 * 24));
                    
                            // for($i = 0; $i <= $dif; $i++)
                            // {
                                
                            //     $strNewDate = date ("Y-m-d", strtotime("+$i day", strtotime($ds)));
                    
                            //     $data = array(
                            //         'ID_Activities' =>  '11',
                            //         'Date'          =>  $strNewDate,
                            //         'TimeIn'        =>  $inputdata['TimeStart'.$i],
                            //         'TimeOut'        =>  $inputdata['TimeEnd'.$i],
                            //     );
                            //     $this->db->insert('DateOfActivity', $data); 
                    
                            // }