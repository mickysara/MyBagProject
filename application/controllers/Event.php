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
    public function Teacher()
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

        if($Teacher[0] == $idTeacher)
        {
            echo json_encode(['status' => 5, 'msg' => 'FailRegex']);

        }else{

            $this->db->where('Name_Activities', $nameAcc);
            $query = $this->db->get('Activities', 1);
            if($query->num_rows() == 1)
            {
                echo json_encode(['status' => 1, 'msg' => 'Success']);
            }else
            {
                $qq =  $this->db->query("SELECT * FROM Teacher WHERE Fname = '$Teacher[0]' AND Lname = '$Teacher[1]'");
                $qa = $qq->row_array();
                // $this->db->where('Fname', "'$Teacher[0]'");
                // $this->db->where('Lname', "'$Teacher[1]'");
                // $qq = $this->db->get('Teacher', 1);
    
                if($qq->num_rows() == 1)
                {
                    $this->db->where('Status !=', 'เคลียร์เงินเสร็จสิ้น');
                    $this->db->where('Teacher_res', $qa['Id_Users']);
                    $query = $this->db->get('Activities', 1);
        
                    if($query->num_rows() == 1)
                    {
                        echo json_encode(['status' => 2, 'msg' => 'Success']);
                    }else
                    {
                        echo json_encode(['status' => 3, 'msg' => 'Success']);
                    }
                }else{
                    echo json_encode(['status' => 4, 'msg' => 'FailDonthaveTeacher']);
                }
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
            <input type="text" class="form-control" id="Teacher_res" name="Teacher_res" placeholder="กรุณากรอกชื่อ นามสกุล อาจารย์">
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
    public function ShowTeacherInAc()
         { ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">

                    <select name="Teacher_res" id="Teacher_res" style="height: 35px;" required>
                        <?php /*$this->db->where('Branch', $this->session->userdata('Branch'));
                              $query = $this->db->get('Teacher');*/
                              $query = $this->db->query("select * from Teacher as t
                              left join InTeam as it 
                              on t.Id_Users = it.Id_Users
                              where t.Branch='1'");
                              $data_user = [];
                            foreach($query->result_array() as $data)
                            { 
                                if($data['ID_Activities'] != 11 && in_array($data['Id_Users'], $data_user) == false)
                                {
                                ?>
                                <option value="<?php echo $data['ID_Teacher'] ?>">อาจารย์
                            <?php echo $data['Fname']." ".$data['Lname'] ?></option>
                        <?php   }
                                else
                                {
                                    array_push($data_user, $data['Id_Users']);
                                }
                            } ?>
                    </select>

                </div>
            </div>
        </div>
<?php }
}

/* End of file Event.php */
