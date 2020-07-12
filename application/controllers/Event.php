<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {


    public function index()
    {
        if($this->session->userdata('_success') == ''){
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('Alert/Loginalert');
        }else{
        $this->load->view('Header');
        $this->load->view('EventView');       //เรียกใช้หน้าฟอร์ม
        $this->load->view('Footer');
        }
    }

    public function Insert($id)
    {
        if($this->session->userdata('_success') == ''){
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('Alert/Loginalert');
        }else{
        
        $this->data['ID'] = $id;

        $this->load->view('Header');
        $this->load->view('EventView', $this->data, FALSE);       //เรียกใช้หน้าฟอร์ม
        $this->load->view('Footer');
        }
    }
    public function Teacher($id)
    {
      if($this->session->userdata('_success') == ''){
        $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
        $this->session->set_userdata('login_referrer', $referrer_value);
        redirect('Alert/Loginalert');
    }else{
        $this->data['ID'] = $id;
      $this->load->view('Header');
      $this->load->view('EventViewTeacher', $this->data, FALSE);
      $this->load->view('Footer');
      }

    }

    public function Check()
    {
        $nameAcc = $this->input->post('Name');
        $idTeacher = $this->input->post('Borrow');

        $TimeStart = $this->input->post('TimeStart');
        $NewTimeStart = date("H:i:sa", strtotime($TimeStart));

        $TimeEnd = $this->input->post('TimeEnd');
        $NewTimeEnd = date("H:i:sa", strtotime($TimeEnd));
        // $Teacher = explode(" ", $idTeacher);

        // if($Teacher[0] == $idTeacher)
        // {
        //     echo json_encode(['status' => 5, 'msg' => 'FailRegex']);

        // }else{

            $this->db->where('Name_Activities', $nameAcc);
            $query = $this->db->get('Activities', 1);
            if($query->num_rows() == 1)
            {
                echo json_encode(['status' => 1, 'msg' => 'Success']);
            }else
            {
                    // $this->db->where('Borrow', $idTeacher);
                    // $query = $this->db->get('Activities', 1);
        
                    // if($query->num_rows() == 1)
                    // {
                    //     echo json_encode(['status' => 3, 'msg' => 'Success']);
                    // }else
                    // {
                        if($NewTimeStart <= $NewTimeEnd)
                        {
                            echo json_encode(['status' => 6, 'msg' => 'Success']);
                        }else{
                        echo json_encode(['status' => 3, 'msg' => 'Success']);
                        }
                    // }
            }
        }
    // }

    public function CheckTeacher()
    {
        $nameAcc = $this->input->post('Name');
            $idTeacher = $this->session->userdata('ID');
            
        // if($Teacher[0] == $idTeacher)
        // {
        //     echo json_encode(['status' => 5, 'msg' => 'FailRegex']);

        // }else{

            $this->db->where('Name_Activities', $nameAcc);
            $query = $this->db->get('Activities', 1);
            if($query->num_rows() == 1)
            {
                echo json_encode(['status' => 1, 'msg' => 'Success']);
            }else
            {
                    $this->db->where('Teacher_res', $idTeacher);
                    $query = $this->db->get('Activities', 1);
        
                    if($query->num_rows() == 1)
                    {
                        echo json_encode(['status' => 2, 'msg' => 'Success']);
                    }else
                    {
                        echo json_encode(['status' => 3, 'msg' => 'Success']);
                    }
            }
        }
    public function ShowTeacherIn()
         { ?>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">

			<select name="Teacher_res" id="Teacher_res" style="height: 35px;" required>
				<?php $this->db->where('Branch', $this->session->userdata('Branch'));
                                                                        $query = $this->db->get('Teacher');
                                                                        foreach($query->result_array() as $data)
                                                                        { ?>
				<option value="<?php echo $data['ID_Teacher'] ?>">อาจารย์
					<?php echo $data['Fname']." ".$data['Lname'] ?></option>
				<?php } ?>
			</select>

		</div>
	</div>
</div>
<?php }

    public function ShowTeacherOut()
    { ?>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">

			<select name="Teacher_res" id="Teacher_res" style="height: 35px;" required>
				<?php $this->db->where('ID_Campus', $this->session->userdata('ID_Campus'));
                                      $this->db->where('Branch !=', $this->session->userdata('Branch'));
                                      
                                                                        $query = $this->db->get('Teacher');
                                                                        foreach($query->result_array() as $data)
                                                                        { ?>
				<option value="<?php echo $data['ID_Teacher'] ?>">อาจารย์
					<?php echo $data['Fname']." ".$data['Lname'] ?></option>
				<?php } ?>
			</select>

		</div>
	</div>
</div>
<?php }

    public function ShowTime($DiffDay)
    {
        $day = $DiffDay;
        for ($i = 0; $i <= $day; $i++) 
          { ?>
<p>เวลาเริ่มและเวลาที่สิ้นสุดของกิจกรรมวันที่<?php echo $i+1 ?></p>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" required id="TimeStart" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"
				name="TimeStartDay<?php echo $i ?>" placeholder="07:00">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" required id="TimeEnd" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"
				name="TimeEndDay<?php echo $i ?>" placeholder="07:00">
		</div>
	</div>
</div>
<?php }
    }
    
    public function InsertActivity()
    {                
        $DateStart = strtotime($this->input->post('DateStart'));
        $NewDateStart = date('Y-m-d',strtotime("+0 year",$DateStart));
        
        $DateEnd = strtotime($this->input->post('DateEnd'));
        $NewDateEnd = date("Y-m-d", strtotime("+0 year",$DateEnd));

        $TimeStart = $this->input->post('TimeStart');
        $NewTimeStart = date("H:i:sa", strtotime($TimeStart));

        $TimeEnd = $this->input->post('TimeEnd');
        $NewTimeEnd = date("H:i:sa", strtotime($TimeEnd));

        $DateSent = date("Y/m/d");

        $Res = $this->input->post('Borrow');

        $repostrnono = $Res;
        $arraystate2 = (explode(" ",$repostrnono));
        $Fname = ($arraystate2[0]);
        $Lname = ($arraystate2[1]);
        
        $this->db->where('Fname', $Fname);
        $this->db->where('Lname', $Lname);
        $query3 = $this->db->get('Teacher', 1);
        $data = $query3->row_array();

        if($this->input->post('Compel') == "1"){
            $Compel = 1;
        }else{
            $Compel = 0;
        }

        if($this->input->post('Compel') == "1"){
            $Amount = Null;
        }else{
            $Amount = $this->input->post('Amount');
        }

        if($this->input->post('Compel') == "1"){
            $TypeJoin = Null;
        }else{
            $TypeJoin = $this->input->post('TypeJoin');
        }
                          $fill_user = array(
                            'Name_Activities' => $this->input->post('Name'),
                            'Detail' => $this->input->post('Detail'),
                            'Type' => $this->input->post('Type'),
                            'TypeFile' => $this->input->post('TypeFile'),
                            'DateStart' => $NewDateStart,
                            'DateEnd' => $NewDateEnd,
                            'TimeStart' => $TimeStart,
                            'TimeEnd' => $TimeEnd,
                            'Budget' => $this->input->post('Budget'),
                            'CreateBy'  =>  $this->session->userdata('Id_Users'),
                            'Id_Project' => $this->input->post('ID'),
                            'Status' => 1,
                            'AmountJoin' => $this->input->post('Day'),
                            'Id_TypeJoin' => $TypeJoin,
                            'Amount' => $Amount,
                            'ID_TypeUserJoinAc' => $this->input->post('TypeUserJoinAc'),
                            'Compel' => $Compel,
                            'Borrow' => $data['Id_Users']
                          );
                        
                        
                        $this->db->insert('Activities', $fill_user); 
                        $id = $this->db->insert_id();
                        $fill_loan = array(
                            'Loan' => $this->input->post('Budget')
                                              );
                        $this->db->where('ID_Teacher', $this->input->post('Borrow'));
                        $this->db->Update('Teacher', $fill_loan);

                        $this->load->library('ciqrcode');
                        $this->load->library('image_lib');
                
                        $params['data'] = "id=".$id."|"."Type=Activity";
                        $params['level'] = 'H';
                        $params['size'] = 50;
                        $params['savename'] = FCPATH.'./QrCode/Activities/'.$id.'.png';
                        $this->ciqrcode->generate($params);

                        echo json_encode(['status' => 1, 'data' => $this->input->post('ID')]);



                        $Dateshownow = strtotime($NewDateStart);
                        $numdate = round(abs(strtotime($NewDateStart) - strtotime($NewDateEnd))/60/60/24);
                        $plusdate = "+".$numdate." "."Day";

// ----------------------------------------------------------นศ2คณะแบ่งตามปี----------------------------------------------------------------------
                    if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "8"){
                         $student8 = $this->db->query("SELECT * FROM student WHERE student.Year = 1");
                         foreach($student8->result_array() as $student8show)
                         {  
                            for ($x = 0; $x <= $numdate; $x++) {
                                $plusdate = "+".$x." "."Day";
                            
                                $d=strtotime($plusdate);
                                $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                            $row8 = array(
                                'ID_Activities' =>  $id,
                                'ID_List'      =>  $student8show['Id_Users'],
                                'Date'      =>  $DateInput,
                            );
                            $this->db->insert('NameList', $row8);
                         }
                        }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "9"){
                        $student9 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 OR student.Year = 2");
                        foreach($student9->result_array() as $student9show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row9 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student9show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row9);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "10"){
                        $student10 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 OR student.Year = 2 OR student.Year = 3");
                        foreach($student10->result_array() as $student10show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row10 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student10show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row10);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "11"){
                        $student11 = $this->db->query("SELECT * FROM student WHERE student.Year = 2");
                        foreach($student11->result_array() as $student11show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row11 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student11show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row11);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "12"){
                        $student12 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 OR student.Year = 3");
                        foreach($student12->result_array() as $student12show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row12 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student12show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row12);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "13"){
                        $student13 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 OR student.Year = 3 OR student.Year = 4");
                        foreach($student13->result_array() as $student13show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row13 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student13show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row13);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "14"){
                        $student14 = $this->db->query("SELECT * FROM student WHERE student.Year = 3");
                        foreach($student14->result_array() as $student14show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row14 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student14show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row14);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "15"){
                        $student15 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 OR student.Year = 4");
                        foreach($student15->result_array() as $student15show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row15 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student15show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row15);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "16"){
                        $student16 = $this->db->query("SELECT * FROM student WHERE student.Year = 4");
                        foreach($student16->result_array() as $student16show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row16 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student16show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row16);
                        }
                       }
                       // ----------------------------------------------------------ทุกคนในมอ----------------------------------------------------------------------
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "1"){
                        $student17 = $this->db->query("SELECT * FROM student");
                        foreach($student17->result_array() as $student17show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row17 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student17show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row17);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "2"){
                        $student18 = $this->db->query("SELECT * FROM Teacher");
                        foreach($student18->result_array() as $student18show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row18 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student18show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row18);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "3"){
                        $student19 = $this->db->query("SELECT * FROM Employyee");
                        foreach($student19->result_array() as $student19show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row19 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student19show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row19);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "4"){
                        $student300 = $this->db->query("SELECT * FROM Users WHERE Users.ID_Type = 1 OR Users.ID_Type = 2");
                        foreach($student300->result_array() as $student300show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row300 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student300show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row300);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "5"){
                        $student301 = $this->db->query("SELECT * FROM Users WHERE Users.ID_Type = 1 OR Users.ID_Type = 3");
                        foreach($student301->result_array() as $student301show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row301 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student301show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row301);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "6"){
                        $student302 = $this->db->query("SELECT * FROM Users WHERE Users.ID_Type = 2 OR Users.ID_Type = 3");
                        foreach($student302->result_array() as $student302show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row302 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student302show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row302);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "7"){
                        $student303 = $this->db->query("SELECT * FROM Users WHERE Users.ID_Type = 1 OR Users.ID_Type = 2 OR Users.ID_Type = 3");
                        foreach($student303->result_array() as $student303show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row303 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student303show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row303);
                        }
                       }
// ----------------------------------------------------------บริหารทุกคน----------------------------------------------------------------------
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "17"){
                        $student20 = $this->db->query("SELECT * FROM student WHERE student.Major = 1");
                        foreach($student20->result_array() as $student20show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row20 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student20show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row20);
                        }
                       }
// ----------------------------------------------------------ศิลปศาสตร์ทุกคน----------------------------------------------------------------------
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "18"){
                        $student21 = $this->db->query("SELECT * FROM student WHERE student.Major = 2");
                        foreach($student21->result_array() as $student21show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row21 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student21show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row21);
                        }
                       }
// ----------------------------------------------------------บริหารทุกคนแบ่งตามชั้นปี----------------------------------------------------------------------
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "19"){
                        $student22 = $this->db->query("SELECT * FROM student WHERE student.Major = 1 AND student.Year = 1");
                        foreach($student22->result_array() as $student22show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row22 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student22show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row22);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "20"){
                        $student23 = $this->db->query("SELECT * FROM student WHERE student.Major = 1 AND student.Year = 2");
                        foreach($student23->result_array() as $student23show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row23 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student23show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row23);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "22"){
                        $student24 = $this->db->query("SELECT * FROM student WHERE student.Major = 1 AND student.Year = 3");
                        foreach($student24->result_array() as $student24show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row24 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student24show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row24);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "23"){
                        $student25 = $this->db->query("SELECT * FROM student WHERE student.Major = 1 AND student.Year = 4");
                        foreach($student25->result_array() as $student25show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row25 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student25show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row25);
                        }
                       }
// ----------------------------------------------------------ศิลปศาสตร์ทุกคนแบ่งจามชั้นปี----------------------------------------------------------------------
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "24"){
                        $student26 = $this->db->query("SELECT * FROM student WHERE student.Major = 2 AND student.Year = 1");
                        foreach($student26->result_array() as $student26show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row26 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student26show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row26);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "25"){
                        $student27 = $this->db->query("SELECT * FROM student WHERE student.Major = 2 AND student.Year = 2");
                        foreach($student27->result_array() as $student27show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row27 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student27show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row27);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "26"){
                        $student28 = $this->db->query("SELECT * FROM student WHERE student.Major = 2 AND student.Year = 3");
                        foreach($student28->result_array() as $student28show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row28 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student28show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row28);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "27"){
                        $student29 = $this->db->query("SELECT * FROM student WHERE student.Major = 2 AND student.Year = 4");
                        foreach($student29->result_array() as $student29show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row29 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student29show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row29);
                        }
                       }
// ----------------------------------------------------------บริหารคละปี----------------------------------------------------------------------
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "28"){
                        $student30 = $this->db->query("SELECT * FROM student WHERE(student.Year = 1 OR student.Year = 2) AND student.Major = 1");
                        foreach($student30->result_array() as $student30show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row30 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student30show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row30);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "29"){
                        $student31 = $this->db->query("SELECT * FROM student WHERE(student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Major = 1");
                        foreach($student31->result_array() as $student31show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row31 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student31show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row31);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "30"){
                        $student32 = $this->db->query("SELECT * FROM student WHERE(student.Year = 2 OR student.Year = 3) AND student.Major = 1");
                        foreach($student32->result_array() as $student32show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row32 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student32show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row32);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "31"){
                        $student33 = $this->db->query("SELECT * FROM student WHERE(student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Major = 1");
                        foreach($student33->result_array() as $student33show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row33 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student33show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row33);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "32"){
                        $student34 = $this->db->query("SELECT * FROM student WHERE(student.Year = 3 OR student.Year = 4) AND student.Major = 1");
                        foreach($student34->result_array() as $student34show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row34 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student34show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row34);
                        }
                       }
// ----------------------------------------------------------คณะศิลปศาสตร์คละปี----------------------------------------------------------------------
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "33"){
                        $student35 = $this->db->query("SELECT * FROM student WHERE(student.Year = 1 OR student.Year = 2) AND student.Major = 2");
                        foreach($student35->result_array() as $student35show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row35 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student35show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row35);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "34"){
                        $student36 = $this->db->query("SELECT * FROM student WHERE(student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Major = 2");
                        foreach($student36->result_array() as $student36show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row36 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student36show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row36);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "35"){
                        $student37 = $this->db->query("SELECT * FROM student WHERE(student.Year = 2 OR student.Year = 3) AND student.Major = 2");
                        foreach($student37->result_array() as $student37show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row37 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student37show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row37);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "36"){
                        $student38 = $this->db->query("SELECT * FROM student WHERE(student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Major = 2");
                        foreach($student38->result_array() as $student38show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row38 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student38show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row38);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "37"){
                        $student39 = $this->db->query("SELECT * FROM student WHERE(student.Year = 3 OR student.Year = 4) AND student.Major = 2");
                        foreach($student39->result_array() as $student39show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row39 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student39show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row39);
                        }
                       }
// ----------------------------------------------------------วิทคอม----------------------------------------------------------------------
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "38"){
                        $student40 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 AND student.Branch = 1");
                        foreach($student40->result_array() as $student40show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row40 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student40show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row40);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "39"){
                        $student41 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 AND student.Branch = 1");
                        foreach($student41->result_array() as $student41show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row41 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student41show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row41);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "40"){
                        $student42 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 AND student.Branch = 1");
                        foreach($student42->result_array() as $student42show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row42 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student42show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row42);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "41"){
                        $student43 = $this->db->query("SELECT * FROM student WHERE student.Year = 4 AND student.Branch = 1");
                        foreach($student43->result_array() as $student43show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row43 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student43show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row43);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "42"){
                        $student44 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2) AND student.Branch = 1");
                        foreach($student44->result_array() as $student44show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row44 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student44show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row44);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "43"){
                        $student45 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Branch = 1");
                        foreach($student45->result_array() as $student45show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row45 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student45show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row45);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "44"){
                        $student46 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3) AND student.Branch = 1");
                        foreach($student46->result_array() as $student46show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row46 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student46show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row46);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "45"){
                        $student47 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Branch = 1");
                        foreach($student47->result_array() as $student47show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row47 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student47show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row47);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "46"){
                        $student48 = $this->db->query("SELECT * FROM student WHERE (student.Year = 3 OR student.Year = 4) AND student.Branch = 1");
                        foreach($student48->result_array() as $student48show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row48 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student48show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row48);
                        }
                       }
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "47"){
                        $student49 = $this->db->query("SELECT * FROM student WHERE student.Branch = 1");
                        foreach($student49->result_array() as $student49show)
                        {  
                           for ($x = 0; $x <= $numdate; $x++) {
                               $plusdate = "+".$x." "."Day";
                           
                               $d=strtotime($plusdate);
                               $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

                           $row49 = array(
                               'ID_Activities' =>  $id,
                               'ID_List'      =>  $student49show['Id_Users'],
                               'Date'      =>  $DateInput,
                           );
                           $this->db->insert('NameList', $row49);
                        }
                       }
// ----------------------------------------------------------ตลาด----------------------------------------------------------------------
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "48"){
    $student50 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 AND student.Branch = 2");
    foreach($student50->result_array() as $student50show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row50 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student50show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row50);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "49"){
    $student51 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 AND student.Branch = 2");
    foreach($student51->result_array() as $student51show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row51 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student51show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row51);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "50"){
    $student52 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 AND student.Branch = 2");
    foreach($student52->result_array() as $student52show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row52 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student52show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row52);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "51"){
    $student53 = $this->db->query("SELECT * FROM student WHERE student.Year = 4 AND student.Branch = 2");
    foreach($student53->result_array() as $student53show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row53 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student53show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row53);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "52"){
    $student54 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2) AND student.Branch = 2");
    foreach($student54->result_array() as $student54show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row54 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student54show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row54);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "53"){
    $student55 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Branch = 2");
    foreach($student55->result_array() as $student55show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row55 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student55show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row55);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "54"){
    $student56 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3) AND student.Branch = 2");
    foreach($student56->result_array() as $student56show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row56 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student56show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row56);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "55"){
    $student57 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Branch = 2");
    foreach($student57->result_array() as $student57show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row57 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student57show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row57);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "56"){
    $student58 = $this->db->query("SELECT * FROM student WHERE (student.Year = 3 OR student.Year = 4) AND student.Branch = 2");
    foreach($student58->result_array() as $student58show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row58 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student58show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row58);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "57"){
    $student59 = $this->db->query("SELECT * FROM student WHERE student.Branch = 2");
    foreach($student59->result_array() as $student59show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row59 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student59show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row59);
    }
   }
   // ----------------------------------------------------บัญชี----------------------------------------------------------------------------
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "58"){
    $student60 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 AND student.Branch = 3");
    foreach($student60->result_array() as $student60show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row60 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student60show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row60);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "59"){
    $student61 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 AND student.Branch = 3");
    foreach($student61->result_array() as $student61show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row61 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student61show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row61);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "60"){
    $student62 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 AND student.Branch = 3");
    foreach($student62->result_array() as $student62show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row62 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student62show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row62);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "61"){
    $student63 = $this->db->query("SELECT * FROM student WHERE student.Year = 4 AND student.Branch = 3");
    foreach($student63->result_array() as $student63show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row63 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student63show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row63);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "62"){
    $student64 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2) AND student.Branch = 3");
    foreach($student64->result_array() as $student64show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row64 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student64show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row64);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "63"){
    $student65 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Branch = 3");
    foreach($student65->result_array() as $student65show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row65 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student65show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row65);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "64"){
    $student66 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3) AND student.Branch = 3");
    foreach($student66->result_array() as $student66show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row66 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student66show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row66);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "65"){
    $student67 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Branch = 3");
    foreach($student67->result_array() as $student67show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row67 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student67show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row67);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "66"){
    $student68 = $this->db->query("SELECT * FROM student WHERE (student.Year = 3 OR student.Year = 4) AND student.Branch = 3");
    foreach($student68->result_array() as $student68show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row68 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student68show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row68);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "67"){
    $student69 = $this->db->query("SELECT * FROM student WHERE student.Branch = 3");
    foreach($student69->result_array() as $student69show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row69 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student69show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row69);
    }
   }
    // ----------------------------------------------------การจัดการ----------------------------------------------------------------------------
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "68"){
    $student70 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 AND student.Branch = 4");
    foreach($student70->result_array() as $student70show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row70 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student70show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row70);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "69"){
    $student71 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 AND student.Branch = 4");
    foreach($student71->result_array() as $student71show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row71 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student71show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row71);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "70"){
    $student72 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 AND student.Branch = 4");
    foreach($student72->result_array() as $student72show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row72 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student72show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row72);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "71"){
    $student73 = $this->db->query("SELECT * FROM student WHERE student.Year = 4 AND student.Branch = 4");
    foreach($student73->result_array() as $student73show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row73 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student73show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row73);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "72"){
    $student74 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2) AND student.Branch = 4");
    foreach($student74->result_array() as $student74show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row74 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student74show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row74);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "73"){
    $student75 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Branch = 4");
    foreach($student75->result_array() as $student75show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row75 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student75show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row75);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "74"){
    $student76 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3) AND student.Branch = 4");
    foreach($student76->result_array() as $student76show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row76 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student76show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row76);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "75"){
    $student77 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Branch = 4");
    foreach($student77->result_array() as $student77show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row77 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student77show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row77);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "76"){
    $student78 = $this->db->query("SELECT * FROM student WHERE (student.Year = 3 OR student.Year = 4) AND student.Branch = 4");
    foreach($student78->result_array() as $student78show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row78 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student68show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row68);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "77"){
    $student79 = $this->db->query("SELECT * FROM student WHERE student.Branch = 4");
    foreach($student79->result_array() as $student79show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row79 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student79show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row79);
    }
   }
   // ----------------------------------------------------โลจิส----------------------------------------------------------------------------
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "78"){
    $student80 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 AND student.Branch = 5");
    foreach($student80->result_array() as $student80show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row80 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student80show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row80);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "79"){
    $student81 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 AND student.Branch = 5");
    foreach($student81->result_array() as $student81show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row81 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student81show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row81);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "80"){
    $student82 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 AND student.Branch = 5");
    foreach($student82->result_array() as $student82show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row82 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student82show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row82);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "81"){
    $student83 = $this->db->query("SELECT * FROM student WHERE student.Year = 4 AND student.Branch = 5");
    foreach($student83->result_array() as $student83show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row83 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student83show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row83);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "82"){
    $student84 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2) AND student.Branch = 5");
    foreach($student84->result_array() as $student84show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row84 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student84show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row84);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "83"){
    $student85 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Branch = 5");
    foreach($student85->result_array() as $student85show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row85 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student85show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row85);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "84"){
    $student86 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3) AND student.Branch = 5");
    foreach($student86->result_array() as $student86show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row86 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student86show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row86);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "85"){
    $student87 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Branch = 5");
    foreach($student87->result_array() as $student87show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row87 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student87show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row87);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "86"){
    $student88 = $this->db->query("SELECT * FROM student WHERE (student.Year = 3 OR student.Year = 4) AND student.Branch = 5");
    foreach($student88->result_array() as $student88show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row88 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student88show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row88);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "87"){
    $student89 = $this->db->query("SELECT * FROM student WHERE student.Branch = 5");
    foreach($student89->result_array() as $student89show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row89 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student89show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row89);
    }
   }
   // ----------------------------------------------------โฆษณา----------------------------------------------------------------------------
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "88"){
    $student90 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 AND student.Branch = 6");
    foreach($student90->result_array() as $student90show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row90 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student90show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row90);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "89"){
    $student91 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 AND student.Branch = 6");
    foreach($student91->result_array() as $student91show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row91 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student91show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row91);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "90"){
    $student92 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 AND student.Branch = 6");
    foreach($student92->result_array() as $student92show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row92 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student92show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row92);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "91"){
    $student93 = $this->db->query("SELECT * FROM student WHERE student.Year = 4 AND student.Branch = 6");
    foreach($student93->result_array() as $student93show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row93 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student93show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row93);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "92"){
    $student94 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2) AND student.Branch = 6");
    foreach($student94->result_array() as $student94show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row94 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student94show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row94);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "93"){
    $student95 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Branch = 6");
    foreach($student95->result_array() as $student95show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row95 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student95show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row95);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "94"){
    $student96 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3) AND student.Branch = 6");
    foreach($student96->result_array() as $student96show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row96 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student96show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row96);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "95"){
    $student97 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Branch = 6");
    foreach($student97->result_array() as $student97show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row97 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student97show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row97);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "96"){
    $student98 = $this->db->query("SELECT * FROM student WHERE (student.Year = 3 OR student.Year = 4) AND student.Branch = 6");
    foreach($student98->result_array() as $student98show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row98 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student98show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row98);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "97"){
    $student99 = $this->db->query("SELECT * FROM student WHERE student.Branch = 6");
    foreach($student99->result_array() as $student99show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row99 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student99show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row99);
    }
   }

   // ----------------------------------------------------เศรษฐศาสตร์----------------------------------------------------------------------------
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "98"){
    $student100 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 AND student.Branch = 7");
    foreach($student100->result_array() as $student100show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row100 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student100show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row100);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "99"){
    $student101 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 AND student.Branch = 7");
    foreach($student101->result_array() as $student101show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row101 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student101show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row101);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "100"){
    $student102 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 AND student.Branch = 7");
    foreach($student102->result_array() as $student102show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row102 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student102show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row102);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "101"){
    $student103 = $this->db->query("SELECT * FROM student WHERE student.Year = 4 AND student.Branch = 7");
    foreach($student103->result_array() as $student103show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row103 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student103show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row103);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "102"){
    $student104 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2) AND student.Branch = 7");
    foreach($student104->result_array() as $student104show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row104 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student104show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row104);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "103"){
    $student105 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Branch = 7");
    foreach($student105->result_array() as $student105show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row105 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student105show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row105);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "104"){
    $student106 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3) AND student.Branch = 7");
    foreach($student106->result_array() as $student106show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row106 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student106show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row106);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "105"){
    $student107 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Branch = 7");
    foreach($student107->result_array() as $student107show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row107 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student107show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row107);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "106"){
    $student108 = $this->db->query("SELECT * FROM student WHERE (student.Year = 3 OR student.Year = 4) AND student.Branch = 7");
    foreach($student108->result_array() as $student108show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row108 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student108show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row108);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "107"){
    $student109 = $this->db->query("SELECT * FROM student WHERE student.Branch = 7");
    foreach($student109->result_array() as $student109show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row109 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student109show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row109);
    }
   }
      // ----------------------------------------------------มัลติมีเดีย----------------------------------------------------------------------------
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "108"){
    $student110 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 AND student.Branch = 8");
    foreach($student110->result_array() as $student110show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row110 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student110show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row110);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "109"){
    $student111 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 AND student.Branch = 8");
    foreach($student111->result_array() as $student111show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row111 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student111show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row111);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "110"){
    $student112 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 AND student.Branch = 8");
    foreach($student112->result_array() as $student112show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row112 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student112show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row112);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "111"){
    $student113 = $this->db->query("SELECT * FROM student WHERE student.Year = 4 AND student.Branch = 8");
    foreach($student113->result_array() as $student113show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row113 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student113show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row113);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "112"){
    $student114 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2) AND student.Branch = 8");
    foreach($student114->result_array() as $student114show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row114 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student114show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row114);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "113"){
    $student115 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Branch = 8");
    foreach($student115->result_array() as $student115show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row115 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student115show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row115);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "114"){
    $student116 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3) AND student.Branch = 8");
    foreach($student116->result_array() as $student116show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row116 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student116show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row116);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "115"){
    $student117 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Branch = 8");
    foreach($student117->result_array() as $student117show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row117 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student117show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row117);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "116"){
    $student118 = $this->db->query("SELECT * FROM student WHERE (student.Year = 3 OR student.Year = 4) AND student.Branch = 8");
    foreach($student118->result_array() as $student118show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row118 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student118show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row118);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "117"){
    $student119 = $this->db->query("SELECT * FROM student WHERE student.Branch = 8");
    foreach($student119->result_array() as $student119show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row119 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student119show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row119);
    }
   }
   // ----------------------------------------------------IS----------------------------------------------------------------------------
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "118"){
    $student120 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 AND student.Branch = 9");
    foreach($student120->result_array() as $student120show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row120 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student120show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row120);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "119"){
    $student121 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 AND student.Branch = 9");
    foreach($student121->result_array() as $student121show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row121 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student121show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row121);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "120"){
    $student122 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 AND student.Branch = 9");
    foreach($student122->result_array() as $student122show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row122 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student122show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row122);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "121"){
    $student123 = $this->db->query("SELECT * FROM student WHERE student.Year = 4 AND student.Branch = 9");
    foreach($student123->result_array() as $student123show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row123 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student123show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row123);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "122"){
    $student124 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2) AND student.Branch = 9");
    foreach($student124->result_array() as $student124show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row124 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student124show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row124);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "123"){
    $student125 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Branch = 9");
    foreach($student125->result_array() as $student125show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row125 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student125show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row125);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "124"){
    $student126 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3) AND student.Branch = 9");
    foreach($student126->result_array() as $student126show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row126 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student126show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row126);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "125"){
    $student127 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Branch = 9");
    foreach($student127->result_array() as $student127show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row127 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student127show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row127);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "126"){
    $student128 = $this->db->query("SELECT * FROM student WHERE (student.Year = 3 OR student.Year = 4) AND student.Branch = 9");
    foreach($student128->result_array() as $student128show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row128 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student128show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row128);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "127"){
    $student129 = $this->db->query("SELECT * FROM student WHERE student.Branch = 9");
    foreach($student129->result_array() as $student129show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row129 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student129show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row129);
    }
   }

   // ----------------------------------------------------IT----------------------------------------------------------------------------
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "128"){
    $student130 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 AND student.Branch = 10");
    foreach($student130->result_array() as $student130show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row130 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student130show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row130);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "129"){
    $student131 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 AND student.Branch = 10");
    foreach($student131->result_array() as $student131show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row131 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student131show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row131);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "130"){
    $student132 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 AND student.Branch = 10");
    foreach($student132->result_array() as $student132show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row132 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student132show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row132);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "131"){
    $student133 = $this->db->query("SELECT * FROM student WHERE student.Year = 4 AND student.Branch = 10");
    foreach($student133->result_array() as $student133show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row133 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student133show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row133);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "132"){
    $student134 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2) AND student.Branch = 10");
    foreach($student134->result_array() as $student134show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row134 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student134show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row134);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "133"){
    $student135 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Branch = 10");
    foreach($student135->result_array() as $student135show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row135 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student135show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row135);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "134"){
    $student136 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3) AND student.Branch = 10");
    foreach($student136->result_array() as $student136show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row136 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student136show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row136);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "135"){
    $student137 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Branch = 10");
    foreach($student137->result_array() as $student137show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row137 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student137show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row137);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "136"){
    $student138 = $this->db->query("SELECT * FROM student WHERE (student.Year = 3 OR student.Year = 4) AND student.Branch = 10");
    foreach($student138->result_array() as $student138show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row138 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student138show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row138);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "137"){
    $student139 = $this->db->query("SELECT * FROM student WHERE student.Branch = 10");
    foreach($student139->result_array() as $student139show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row139 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student139show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row139);
    }
   }
   // ----------------------------------------------------ท่องเที่ยว----------------------------------------------------------------------------
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "138"){
    $student140 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 AND student.Branch = 11");
    foreach($student140->result_array() as $student140show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row140 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student140show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row140);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "139"){
    $student141 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 AND student.Branch = 11");
    foreach($student141->result_array() as $student141show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row141 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student141show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row141);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "140"){
    $student142 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 AND student.Branch = 11");
    foreach($student142->result_array() as $student142show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row142 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student142show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row142);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "141"){
    $student143 = $this->db->query("SELECT * FROM student WHERE student.Year = 4 AND student.Branch = 11");
    foreach($student143->result_array() as $student143show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row143 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student143show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row143);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "142"){
    $student144 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2) AND student.Branch = 11");
    foreach($student144->result_array() as $student144show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row144 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student144show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row144);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "143"){
    $student145 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Branch = 11");
    foreach($student145->result_array() as $student145show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row145 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student145show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row145);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "144"){
    $student146 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3) AND student.Branch = 11");
    foreach($student146->result_array() as $student146show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row146 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student146show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row146);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "145"){
    $student147 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Branch = 11");
    foreach($student147->result_array() as $student147show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row147 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student147show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row147);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "146"){
    $student148 = $this->db->query("SELECT * FROM student WHERE (student.Year = 3 OR student.Year = 4) AND student.Branch = 11");
    foreach($student148->result_array() as $student148show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row148 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student148show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row148);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "147"){
    $student149 = $this->db->query("SELECT * FROM student WHERE student.Branch = 11");
    foreach($student149->result_array() as $student149show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row149 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student149show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row149);
    }
   }
   // ----------------------------------------------------โรงแรม----------------------------------------------------------------------------
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "148"){
    $student150 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 AND student.Branch = 12");
    foreach($student150->result_array() as $student150show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row150 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student150show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row150);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "149"){
    $student151 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 AND student.Branch = 12");
    foreach($student151->result_array() as $student151show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row151 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student151show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row151);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "150"){
    $student152 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 AND student.Branch = 12");
    foreach($student152->result_array() as $student152show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row152 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student152show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row152);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "151"){
    $student153 = $this->db->query("SELECT * FROM student WHERE student.Year = 4 AND student.Branch = 12");
    foreach($student153->result_array() as $student153show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row153 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student153show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row153);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "152"){
    $student154 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2) AND student.Branch = 12");
    foreach($student154->result_array() as $student154show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row154 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student154show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row154);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "153"){
    $student155 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Branch = 12");
    foreach($student155->result_array() as $student155show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row155 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student155show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row155);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "154"){
    $student156 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3) AND student.Branch = 12");
    foreach($student156->result_array() as $student156show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row156 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student156show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row156);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "155"){
    $student157 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Branch = 12");
    foreach($student157->result_array() as $student157show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row157 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student157show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row157);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "156"){
    $student158 = $this->db->query("SELECT * FROM student WHERE (student.Year = 3 OR student.Year = 4) AND student.Branch = 12");
    foreach($student158->result_array() as $student158show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row158 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student158show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row158);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "157"){
    $student159 = $this->db->query("SELECT * FROM student WHERE student.Branch = 12");
    foreach($student159->result_array() as $student159show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row159 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student159show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row159);
    }
   }
   // ----------------------------------------------------โรงแรม----------------------------------------------------------------------------
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "158"){
    $student160 = $this->db->query("SELECT * FROM student WHERE student.Year = 1 AND student.Branch = 13");
    foreach($student160->result_array() as $student160show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row160 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student160show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row160);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "159"){
    $student161 = $this->db->query("SELECT * FROM student WHERE student.Year = 2 AND student.Branch = 13");
    foreach($student161->result_array() as $student161show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row161 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student161show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row161);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "160"){
    $student162 = $this->db->query("SELECT * FROM student WHERE student.Year = 3 AND student.Branch = 13");
    foreach($student162->result_array() as $student162show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row162 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student162show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row162);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "161"){
    $student163 = $this->db->query("SELECT * FROM student WHERE student.Year = 4 AND student.Branch = 13");
    foreach($student163->result_array() as $student163show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row163 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student163show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row163);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "162"){
    $student164 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2) AND student.Branch = 13");
    foreach($student164->result_array() as $student164show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row164 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student164show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row164);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "163"){
    $student165 = $this->db->query("SELECT * FROM student WHERE (student.Year = 1 OR student.Year = 2 OR student.Year = 3) AND student.Branch = 13");
    foreach($student165->result_array() as $student165show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row165 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student165show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row165);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "164"){
    $student166 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3) AND student.Branch = 13");
    foreach($student166->result_array() as $student166show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row166 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student166show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row166);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "165"){
    $student167 = $this->db->query("SELECT * FROM student WHERE (student.Year = 2 OR student.Year = 3 OR student.Year = 4) AND student.Branch = 13");
    foreach($student167->result_array() as $student167show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row167 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student167show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row167);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "166"){
    $student168 = $this->db->query("SELECT * FROM student WHERE (student.Year = 3 OR student.Year = 4) AND student.Branch = 13");
    foreach($student168->result_array() as $student168show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row168 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student168show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row168);
    }
   }
}else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "167"){
    $student169 = $this->db->query("SELECT * FROM student WHERE student.Branch = 13");
    foreach($student169->result_array() as $student169show)
    {  
       for ($x = 0; $x <= $numdate; $x++) {
           $plusdate = "+".$x." "."Day";
       
           $d=strtotime($plusdate);
           $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshownow));

       $row169 = array(
           'ID_Activities' =>  $id,
           'ID_List'      =>  $student169show['Id_Users'],
           'Date'      =>  $DateInput,
       );
       $this->db->insert('NameList', $row169);
    }
   }
                    }else{

                    }
                                           
    }

     public function InsertFile($id)
    {
        $files = $_FILES;
        $count = count($_FILES['userfile']['name']);
        for($i=0; $i<$count; $i++)
            {
            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf|pptx|docx|xlsx|png|jpeg|jpg';
            $config['max_size'] = '10000000'; //หน่วยเป็น byte กำหนดใน config xammps php.ini search post และ up
            $config['remove_spaces'] = false; //ลบค่าว่างออกไป ชื่อไฟล์ค่าว่าง
            $config['overwrite'] = true;
            $config['max_width'] = '';
            $config['max_height'] = '';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload();
            $fileName = $_FILES['userfile']['name'];
            }//อัพเดทได้หลายๆไฟล์

            if($fileName!='' ){
              $fileName = explode(',',$fileName);
              foreach($fileName as $file){
                          $fill_user = array(
                            'File' => $file,
                          );   
                        $this->db->where('ID_Activities',$id);  
                        $query = $this->db->update('Activities', $fill_user); 
              }
            }
            $this->db->where('ID_Activities',$id);
            $test = $this->db->get('Activities');
            $testtest = $test->row_array();

            redirect('ShowInProject/Show/'.$testtest['Id_Project']);
    }
    // public function InsertActivityTeacher()
    // {

    //     $DateStart = strtotime($this->input->post('DateStart'));
    //     $NewDateStart = date('Y-m-d',strtotime("-543 year",$DateStart));
        
    //     $DateEnd = strtotime($this->input->post('DateEnd'));
    //     $NewDateEnd = date("Y-m-d", strtotime("-543 year",$DateEnd));

    //     $TimeStart = $this->input->post('TimeStart');
    //     $NewTimeStart = date("H:i:sa", strtotime($TimeStart));

    //     $TimeEnd = $this->input->post('TimeEnd');
    //     $NewTimeEnd = date("H:i:sa", strtotime($TimeEnd));

    //     $DateSent = date("Y/m/d");

    //     if($this->input->post('Campus') == 'other'){
    //         $eiei = Null;
    //     }else{
    //         $eiei = $this->input->post('Campus');
    //     }

    //                       $fill_user = array(
    //                         'Name_Activities' => $this->input->post('Name'),
    //                         'Detail' => $this->input->post('Detail'),
    //                         'Type' => $this->input->post('Type'),
    //                         'DateStart' => $NewDateStart,
    //                         'DateEnd' => $NewDateEnd,
    //                         'TimeStart' => $NewTimeStart,
    //                         'TimeEnd' => $NewTimeEnd,
    //                         'Teacher_res' => $this->input->post('Teacher_res'),
    //                         'Budget' => $this->input->post('Budget'),
    //                         'CreateBy'  =>  $this->session->userdata('Id_Users'),
    //                         'ID_Campus' => $eiei,
    //                         'Id_Project' => $this->input->post('ID'),
    //                         'Status' => 1,
    //                         'AmountJoin' => $this->input->post('Difday'),
    //                         'Other' => $this->input->post('Other'),
    //                         'Id_TypeJoin' => $this->input->post('TypeJoin'),
    //                         'Amount' => $this->input->post('Amount'),
    //                       );
                        
        
    //                     $this->db->insert('Activities', $fill_user); 

    //                     $fill_loan = array(
    //                         'Loan' => $this->input->post('Budget')
    //                                           );
    //                     $this->db->where('ID_Teacher', $this->input->post('Borrow'));
    //                     $this->db->Update('Teacher', $fill_loan);

    //                     $id = $this->db->insert_id();
    //                     echo json_encode(['status' => 1, 'data' => $id]);

        
    // }
    

    public function CheckProject()
    {
        $name = $this->input->post('Name');
        $this->db->where('NameProject', $name);
        $query = $this->db->get('Project', 1);

        if($query->num_rows() == 1)
        {
            echo json_encode(['status' => 0, 'msg' => 'Fail']);
        }else{
            echo json_encode(['status' => 1, 'msg' => 'Success']);
        }
    }

    // public function CheckBorrow()
    // {
    //     $name = $this->input->post('Borrow');
    //     $this->db->where('Username', $name);
    //     $query = $this->db->get('Users', 1);
    //     $data = $query->row_array();
    //     $id = $data['ID_User'];
    //     if($data['ID_Type'] == 2 || $data['ID_Type'] == 3 )
    //     {
    //         $query = $this->db->query("SELECT * FROM Activities WHERE Borrow = $id and Status != 6");
    //         if($query->num_rows() >= 1)
    //         {
    //             echo json_encode(['status' => 2, 'msg' => 'Fail']);
    //         }else{
    //             echo json_encode(['status' => 1, 'msg' => 'Success']);
    //         }
    //     }else{
    //         echo json_encode(['status' => 0, 'msg' => 'Fail']);
    //     }
    // }

    public function CheckBorrow()
    {
        $Res = $this->input->post('Borrow');
       
           $repostrnono = $Res;
            $arraystate2 = (explode(" ",$repostrnono));
            $Fname = ($arraystate2[0]);
            $Lname = ($arraystate2[1]);
            
            $this->db->where('Fname', $Fname);
            $this->db->where('Lname', $Lname);
            $query4 = $this->db->get('Teacher', 1);
            $data2 = $query4->row_array();
            

            $this->db->where('ID_User', $data2['Id_Users']);
            $query = $this->db->get('Users', 1);
            $data = $query->row_array();

        $id = $data['ID_User'];
        if($data['ID_Type'] == 2 || $data['ID_Type'] == 3 )
        {
            $query = $this->db->query("SELECT * FROM Activities,Teacher WHERE Activities.Borrow = $id and Activities.Status != 6 AND Teacher.Loan != 0 GROUP BY Activities.ID_Activities");
            if($query->num_rows() >= 1)
            {
                echo json_encode(['status' => 2, 'msg' => 'Fail']);
            }else{
                echo json_encode(['status' => 1, 'msg' => 'Success']);
            }
        }else{
            echo json_encode(['status' => 0, 'msg' => 'Fail']);
        }
    }

    public function CheckMoneyProject($id)
    {
        $Budget = $this->input->post('Budget');
        
        $this->db->where('Id_Project', $id);
        $query4 = $this->db->get('Project');
        $data2 = $query4->row_array();

        $Show = (int)$Budget;
        $Show2 = (int)$data2['Money'];
        
        $query = $this->db->query("SELECT SUM(Budget) as Total FROM Activities WHERE Activities.Id_Project = $id");
        $showdata = $query->row_array();

        $sum = (int)$showdata['Total'];
        $totalsum = $Show2 - $sum; 

        if($Show  > $Show2)
        {
            echo json_encode(['status' => 0, 'msg' => 'Fail']);
        }else if($Show > $totalsum){
            echo json_encode(['status' => 2, 'msg' => 'Fail']);
        }else{
            echo json_encode(['status' => 1, 'msg' => 'Success']);
        }
    }


    // public function CheckDateStart()
    // {
    //     $DateStart = strtotime($this->input->post('DateStart'));
    //     $NewDateStart = date('Y-m-d',strtotime("+0 year",$DateStart));
        
    //     $d=strtotime("+1 Days");
    //     $datetest =  date('Y-m-d', $d);

    //     if($NewDateStart  >= $datetest)
    //     {
    //         echo json_encode(['status' => 0, 'msg' => 'Fail']);
    //     }else{
    //         echo json_encode(['status' => 1, 'msg' => 'Success']);
    //     }
    // }

    public function Change($g)
    { ?>
<option disabled selected value="">กรุณาเลือกประเภทกิจกรรมในสมุดกิจกรรม</option>
<?php 
   $this->db->select('*');
   $this->db->where('ID_TypeActivitiesFile',$g);
   $eiei = $this->db->get('RelationType');
   $show = $eiei->result_array();
   foreach($show as $show2)
   { ?>
<?php $this->db->where('Id_TypeActivity',$show2['Id_TypeActivity']);
            $lala = $this->db->get('TypeActivities');
            $lalala = $lala->row_array();?>
<option value="<?php echo $show2['Id_TypeActivity']?>"><?php echo $lalala['Name_TypeActivity'] ?></option>
<?php }
    }

  
    public function downloadfile($File)
    {
        $this->load->helper('download');
                $this->db->where('ID_Activities', $File);
                $data = $this->db->get('Activities', 1);
                $fileInfo = $data->result_array();
                foreach($fileInfo as $d)
                {
                    $file = './uploads/'.$d['File'];
                    force_download($file, NULL);
                }
    }

}

/* End of file Event.php */
