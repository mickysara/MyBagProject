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
      $this->load->view('Header');
      $this->load->view('EventViewTeacher');
      $this->load->view('Footer');
      }

    }

    public function Check()
    {
        $nameAcc = $this->input->post('Name');
            $idTeacher = $this->input->post('Teacher_res');

        $Teacher = explode(" ", $idTeacher);

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
    // }

    
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
        $NewDateStart = date('Y-m-d',strtotime("-543 year",$DateStart));
        
        $DateEnd = strtotime($this->input->post('DateEnd'));
        $NewDateEnd = date("Y-m-d", strtotime("-543 year",$DateEnd));

        $TimeStart = $this->input->post('TimeStart');
        $NewTimeStart = date("H:i:sa", strtotime($TimeStart));

        $TimeEnd = $this->input->post('TimeEnd');
        $NewTimeEnd = date("H:i:sa", strtotime($TimeEnd));

        $DateSent = date("Y/m/d");

                          $fill_user = array(
                            'Name_Activities' => $this->input->post('Name'),
                            'Detail' => $this->input->post('Detail'),
                            'Type' => $this->input->post('Type'),
                            'DateStart' => $NewDateStart,
                            'DateEnd' => $NewDateEnd,
                            'TimeStart' => $NewTimeStart,
                            'TimeEnd' => $NewTimeEnd,
                            'Student_res' => $this->session->userdata('ID'),
                            'Teacher_res' => $this->input->post('Teacher_res'),
                            'Budget' => $this->input->post('Budget'),
                            'CreateBy'  =>  $this->session->userdata('Id_Users'),
                            'ID_Campus' => $this->input->post('Campus'),
                            'ID_Project' => $this->input->post('ID'),
                            'Status' => 'ดำเนินการ',
                            'AmountJoin' => $this->input->post('Difday')
                          );
                        
        
                        $this->db->insert('Activities', $fill_user); 
                        $id = $this->db->insert_id();
                        echo json_encode(['status' => 1, 'data' => $id]);
                        
    }

}

/* End of file Event.php */
