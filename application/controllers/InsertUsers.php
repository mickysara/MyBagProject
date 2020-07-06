<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertUsers extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('InsertUsers');
        $this->load->view('Footer');
    }

    public function ShowMajor($id)
    {
        $this->db->where('ID_Campus', $id);
        $query = $this->db->get('Major');
        ?> <option selected="true" disabled="disabled" value="">กรุณาเลือกคณะ</option>

        <?php
          foreach($query->result_array() as $data)
          { ?>
                <option value="<?php echo $data['ID_Major'] ?>">
					<?php echo $data['Name_Major'] ?> </option>
    <?php }
    }

    public function ShowBranch($id)
    {
        $this->db->where('ID_Major', $id);
        $query = $this->db->get('Branch');
        ?> 										<option selected="true" disabled="disabled" value="">กรุณาเลือกสาขา</option> <?php
          foreach($query->result_array() as $data)
          { ?>
                <option value="<?php echo $data['ID_Branch'] ?>">
					<?php echo $data['Name_Branch'] ?> </option>
    <?php }
    }

    public function InsertStudent()
    {
        $id = $this->input->post("Id_Student");
        $pass = $this->input->post("Password");
        $Fname  = $this->input->post("Fname");
        $Lname  =   $this->input->post("Lname");
        $Campus =   $this->input->post("Campus");
        $Major  =   $this->input->post("Major");
        $Branch  =   $this->input->post("Branch");
        $Year  =   $this->input->post("Year");
        $Title = $this->input->post("Title");

        $query = $this->db->query("SELECT * FROM student WHERE `Id_Student` = '$id' OR `Fname` = '$Fname' AND Lname = '$Lname'");

        if($query->num_rows() == 1)
        {
            echo json_encode(['status' => 0, 'msg' => 'Fail']);
        }else{

            $object = array(
                'Username'    =>  $id,
                'Password'      =>  $pass,
                'ID_Type'   =>  '1',
            );
    
            $this->db->insert('Users', $object);
    
            $lastid = $this->db->insert_id();
    
            $object = array(
                'Id_Student'    =>  $id,
                'Password'      =>  $pass,
                'Id_Users'      =>  $lastid,
                'Id_Title'      =>  $Title,
                'Fname'         =>  $Fname,
                'Lname'         =>  $Lname,
                'Year'          =>  $Year,
                'Branch'        =>  $Branch,
                'Major'         =>  $Major,
                'ID_Campus'     =>  $Campus,
                'Level'         =>  '1',
                'Status'        =>  'ปกติ',
                'Money'         =>  0
            );  
            $this->db->insert('student', $object);

            echo json_encode(['status' => 1, 'msg' => 'Success']);
        }    
    }

    public function InsertTeacher()
    {
        $id = $this->input->post("Id_Teacher");
        $pass = $this->input->post("Password");
        $Fname  = $this->input->post("Fname");
        $Lname  =   $this->input->post("Lname");
        $Campus =   $this->input->post("CampusTeacher");
        $Major  =   $this->input->post("MajorTeacher");
        $Branch  =   $this->input->post("BranchTeacher");
        $Title = $this->input->post("Title");
        $position = $this->input->post("Position");

        $query = $this->db->query("SELECT * FROM Teacher WHERE `ID_Teacher` = '$id' OR `Fname` = '$Fname' AND Lname = '$Lname'");

        if($query->num_rows() == 1)
        {
            echo json_encode(['status' => 0, 'msg' => 'Fail']);
        }else{

            $object = array(
                'Username'    =>  $id,
                'Password'      =>  $pass,
                'ID_Type'   =>  '2',
            );
    
            $this->db->insert('Users', $object);
    
            $lastid = $this->db->insert_id();
    
            $object = array(
                'ID_Teacher'    =>  $id,
                'Password'      =>  $pass,
                'Id_Users'      =>  $lastid,
                'Id_Title'      =>  $Title,
                'Fname'         =>  $Fname,
                'Lname'         =>  $Lname,
                'Branch'        =>  $Branch,
                'Major'         =>  $Major,
                'ID_Campus'     =>  $Campus,
                'Money'         =>  0,
                'Loan'         =>  0
            );  
            $this->db->insert('Teacher', $object);
           
            
            if($position != "Teacher")
            {
                $object = array(
                    'ID_User' =>    $lastid
                );
                $this->db->where('Id_Position', $position);
                $this->db->update('Position', $object);
                
                
            }else
            {

            }
            echo json_encode(['status' => 1, 'msg' => 'Success']);
        }    
    }

    public function InsertEmployee()
    {
        $id = $this->input->post("Id_Employee");
        $pass = $this->input->post("Password");
        $Fname  = $this->input->post("Fname");
        $Lname  =   $this->input->post("Lname");
        $Campus =   $this->input->post("Campus");
        $DepartMent  =   $this->input->post("DepartMent2");
        $Title = $this->input->post("Title");
        $Position = $this->input->post("Position2");

        $query = $this->db->query("SELECT * FROM Employee WHERE `Id_Employee` = '$id' OR `Fname` = '$Fname' AND Lname = '$Lname'");

        if($query->num_rows() == 1)
        {
            echo json_encode(['status' => 0, 'msg' => 'Fail']);
        }else{

            $object1 = array(
                'Username'    =>  $id,
                'Password'      =>  $pass,
                'ID_Type'   =>  '3',
            );
    
            $this->db->insert('Users', $object1);
    
            $lastid = $this->db->insert_id();
    
            $object = array(
                'Id_Employee'    =>  $id,
                'Password'      =>  $pass,
                'Id_Users'      =>  $lastid,
                'Id_Title'      =>  $Title,
                'Fname'         =>  $Fname,
                'Lname'         =>  $Lname,
                'ID_Campus'     =>  $Campus,
                // 'Department'    =>  $DepartMent,
                // 'ID_Position_Emp'    =>  $Position,
                'Money'         =>  0,
            );  
            $this->db->insert('Employee', $object);

            $object2 = array(
                'Name_Position'    =>  $Position,
                'Id_Users'      =>  $lastid,
                'ID_Department'   =>  $DepartMent,
            );
    
            $this->db->insert('Position_Emp', $object2);
            
            echo json_encode(['status' => 1, 'msg' => 'Success']);
        }    
    }


    public function changedepart($g)
    { ?>
        <option  value="">กรุณาเลือกตำแหน่ง</option>
   <?php 
//    $this->db->select('*');
//    $this->db->where('ID_Department',$g);
//    $eiei = $this->db->get('Position_Emp');

   $eiei = $this->db->query("SELECT * FROM Position_Emp WHERE Position_Emp.ID_Department = $g GROUP BY Position_Emp.Name_Position");
   $show = $eiei->result_array();
   foreach($show as $show2)
   { ?>
       <option value="<?php echo $show2['Name_Position']?>"><?php echo $show2['Name_Position'] ?></option>
   <?php }
    }
}

/* End of file InsertUsers.php */
