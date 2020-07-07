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

        if($this->input->post('Amount') == "0"){
            $Amount = Null;
        }else{
            $Amount = $this->input->post('Amount');
        }

        if($this->input->post('TypeJoin') == ""){
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
                            'Id_TypeJoin' => $this->input->post('TypeJoin'),
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
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "26"){
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
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "27"){
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
                    }else if($Compel == "1" && $this->input->post('TypeUserJoinAc') == "28"){
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
        <option  disabled selected value="">กรุณาเลือกประเภทกิจกรรมในสมุดกิจกรรม</option>
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
