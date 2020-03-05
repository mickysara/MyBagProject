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
                    $this->db->where('Borrow', $idTeacher);
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
        $NewDateStart = date('Y-m-d',strtotime("+543 year",$DateStart));
        
        $DateEnd = strtotime($this->input->post('DateEnd'));
        $NewDateEnd = date("Y-m-d", strtotime("+543 year",$DateEnd));

        $TimeStart = $this->input->post('TimeStart');
        $NewTimeStart = date("H:i:sa", strtotime($TimeStart));

        $TimeEnd = $this->input->post('TimeEnd');
        $NewTimeEnd = date("H:i:sa", strtotime($TimeEnd));


        $borrow = $this->input->post('Borrow');
        $this->db->where('Username', $borrow);
        $query = $this->db->get('Users', 1);
        $show = $query->row_array();

        $DateSent = date("Y/m/d");

                          $fill_user = array(
                            'Name_Activities' => $this->input->post('Name'),
                            'Detail' => $this->input->post('Detail'),
                            'Type' => $this->input->post('Type'),
                            'DateStart' => $NewDateStart,
                            'DateEnd' => $NewDateEnd,
                            'TimeStart' => $NewTimeStart,
                            'TimeEnd' => $NewTimeEnd,
                            'Budget' => $this->input->post('Budget'),
                            'CreateBy'  =>  $this->session->userdata('Id_Users'),
                            'Id_Project' => $this->input->post('ID'),
                            'Status' => 1,
                            'AmountJoin' => $this->input->post('Difday'),
                            'Id_TypeJoin' => '1',
                            'Amount' => $this->input->post('Amount'),
                            'Borrow' => $show['ID_User'],
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

                        echo json_encode(['status' => 1, 'data' => $id]);
                        
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

    public function CheckBorrow()
    {
        $name = $this->input->post('Borrow');
        $this->db->where('Username', $name);
        $query = $this->db->get('Users', 1);
        $data = $query->row_array();
        $id = $data['ID_User'];
        if($data['ID_Type'] == 2 || $data['ID_Type'] == 3 )
        {
            $query = $this->db->query("SELECT * FROM Activities WHERE Borrow = $id and Status != 6");
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

}

/* End of file Event.php */
