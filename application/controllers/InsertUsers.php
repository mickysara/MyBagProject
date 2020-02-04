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

        $query = $this->db->query("SELECT * FROM student WHERE `Id_Student` = '$id' OR `Fname` = '$Fname' AND Lname = '$Lname'");

        if($query->num_rows() == 1)
        {
            echo json_encode(['status' => 0, 'msg' => 'Fail']);
        }else{

            $object = array(
                'ID_Type'   =>  '1'
            );
    
            $this->db->insert('Users', $object);
    
            $lastid = $this->db->insert_id();
    
            $object = array(
                'Id_Student'    =>  $id,
                'Password'      =>  $pass,
                'Id_Users'      =>  $lastid,
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

}

/* End of file InsertUsers.php */
