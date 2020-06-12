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
                            'AmountJoin' => $this->input->post('Difday'),
                            'Id_TypeJoin' => $this->input->post('TypeJoin'),
                            'Amount' => $this->input->post('Amount'),
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
