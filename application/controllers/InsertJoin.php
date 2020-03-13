<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertJoin extends CI_Controller {

    public function Showdata($id)
    {
        $this->data['id'] = $id;
        $this->load->view('Header');
        $this->load->view('InsertJoin',$this->data,FALSE);
        $this->load->view('Footer');
    }

    public function ShowTeacher($id)
    { ?>
                   <?php /*$this->db->where('Branch', $this->session->userdata('Branch'));
                         $query = $this->db->get('Teacher');*/
                         $branch = $this->input->post('Branch');

                         $result = $this->db->query("SELECT *,t.Id_Users as id from Teacher as t
                         left join NameList as it 
                         on t.Id_Users = it.ID_List
                         LEFT JOIN Branch 
                         ON t.Branch = Branch.ID_Branch
                         LEFT JOIN Major
                         ON t.Major = Major.ID_Major
                         LEFT JOIN Title
		                 ON Title.Id_Title = t.Id_Title
                         where t.Branch='$branch'");
                           ?>
          <div class="ct-example tab-content tab-example-result" style="margin: auto; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
                    aria-labelledby="inputs-alternative-component-tab">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="Filesearch">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">
                                        <h4>ชื่ออาจารย์</h4>
                                    </th>
                                    <th style="text-align:center;" scope="col">
                                        <h4 style="text-align: left;">สาขา</h4>
                                    </th>
                                    <th style="text-align:center;" scope="col">
                                        <h4 style="text-align: left;">คณะ</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php   $data_user = [];
                                        foreach($result->result_array() as $data)
                                            {
                                            if($data['ID_Activities'] == "" && in_array($data['Id_Users'], $data_user) == false)
                                            {?>
                                <tr>
                                    <th scope="row">
                                    <input type="checkbox" name="user[]" value="<?php echo $data['id'] ?>"> <?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>
                               
                    </div>
                    </th>
                    <td>

                        <span class="badge badge-dot mr-4">
                            <p><?php echo $data['Name_Branch'];?></p>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-dot mr-4">
                            <p><?php  echo $data['Name_Major'] ?></p>
                        </span>
                    </td>
                    <?php } else
                             {
                             array_push($data_user, $data['Id_Users']);
                             }
                            }?>
                    </tbody>
                    </table>
                </div>
            </div>
<?php }

    public function ShowStudent($id)
    { 
        $branch = $this->input->post('Branch');
        

        $result = $this->db->query("SELECT *,t.Id_Users as id from student as t
        left join NameList as it 
        on t.Id_Users = it.ID_List
        LEFT JOIN Branch 
        ON t.Branch = Branch.ID_Branch
        LEFT JOIN Major
        ON t.Major = Major.ID_Major
        LEFT JOIN Title
		ON Title.Id_Title = t.Id_Title
        where t.Branch='$branch' ORDER BY t.Year")
        ?>
            <div class="ct-example tab-content tab-example-result" style="margin: auto; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
                    aria-labelledby="inputs-alternative-component-tab">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="Filesearch">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">
                                        <h4>ชื่อ</h4>
                                    </th>
                                    <th style="text-align:center;" scope="col">
                                        <h4 style="text-align: left;">ชั้นปี</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php   $data_user = [];
                                        foreach($result->result_array() as $data)
                                            {
                                            if($data['ID_Activities'] == "" && in_array($data['Id_Users'], $data_user) == false)
                                            {?>
                                <tr>
                               
                                    <th scope="row">
                                    <input type="checkbox" name="user[]" value="<?php echo $data['id'] ?>"> <?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>
                               
                    </div>
                    </th>
                    <td>
                        <span class="badge badge-dot mr-4">
                            <p>ปี <?php echo $data['Year'];?></p>
                        </span>
                    </td>
                    <?php } else
                             {
                             array_push($data_user, $data['Id_Users']);
                             }
                            }?>
                    </tbody>
                    </table>
                </div>
            </div>
    <?php 
    }

    public function ShowEmployee($id)
    { ?>
                   <?php /*$this->db->where('Branch', $this->session->userdata('Branch'));
                         $query = $this->db->get('Teacher');*/

                         $result = $this->db->query("SELECT *,t.Id_Users as id from Employee as t
                         left join NameList as it 
                         on t.Id_Users = it.ID_List
                         LEFT JOIN Title
		                 ON Title.Id_Title = t.Id_Title");
                           ?>
          <div class="ct-example tab-content tab-example-result" style="margin: auto; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
                    aria-labelledby="inputs-alternative-component-tab">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="Filesearch">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">
                                        <h4>ชื่อพนักงาน</h4>
                                    </th>
                                    <th style="text-align:center;" scope="col">
                                        <h4 style="text-align: left;">แผนก</h4>
                                    </th>
                                    <th style="text-align:center;" scope="col">
                                        <h4 style="text-align: left;">ตำแหน่ง</h4>
                                    </th>
                                    <th style="text-align:center;" scope="col">
							<h4 style="text-align: left;">สังกัด</h4>
						</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php   $data_user = [];
                                        foreach($result->result_array() as $data)
                                            {
                                            if($data['ID_Activities'] == "" && in_array($data['Id_Users'], $data_user) == false)
                                            {?>
                                <tr>
                                    <th scope="row">
                                    <input type="checkbox" name="user[]" value="<?php echo $data['id'] ?>"> <?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>
                               
                    </div>
                    </th>
                    <?php 
                       $this->db->where('Id_Users', $data['Id_Users']);
                       $query2 = $this->db->get('Position_Emp');
                       $data2 = $query2->row_array(); 
                       
                       $this->db->where('ID_Department', $data2['ID_Department']);
                       $query3 = $this->db->get('Department');
                       $data3 = $query3->row_array();
                       
                       $this->db->where('ID_Major', $data3['ID_Major']);
                       $query4 = $this->db->get('Major');
                       $data4 = $query4->row_array();?>
                    <td>
                        <span class="badge badge-dot mr-4">
                            <p><?php echo $data3['Name_Department'];?></p>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-dot mr-4">
                            <p><?php  echo $data2['Name_Position'] ?></p>
                        </span>
                    </td>
					<td>
                        <span class="badge badge-dot mr-4">
						<?php if($data3['ID_Major'] == NULL){ ?>
							<p><?php echo("วิทยาเขตจักรพงษภูวนารถ") ?></p>
						<?php	}else{ ?>
							<p><?php  echo $data4['Name_Major'] ?></p>
							<?php }?>
                          
                        </span>
                    </td>
                    <?php } else
                             {
                             array_push($data_user, $data['Id_Users']);
                             }
                            }?>
                    </tbody>
                    </table>
                </div>
            </div>
<?php }

    public function Insert()
    {
        
        $userinsert = $this->input->post('user');
        $id         = $this->input->post('id');
        $team       = $this->input->post('Team');
        $row1 = array();
        $remaining  = $this->input->post('Remaining');

        $this->db->where('ID_Activities', $id);
        $query = $this->db->get('Activities');
        $data = $query->row_array();
        $DateStart = $data['DateStart'];
        $DateEnd = $data['DateEnd'];


        $Dateshow = strtotime($DateStart);

        $numdate = round(abs(strtotime($DateStart) - strtotime($DateEnd))/60/60/24);
        $plusdate = "+".$numdate." "."Day";


            foreach($userinsert as $index => $userinsert )
            {   
                for ($x = 0; $x <= $numdate; $x++) {
                    $plusdate = "+".$x." "."Day";
                
                    $d=strtotime($plusdate);
                    $DateInput = date("Y-m-d", strtotime($plusdate,$Dateshow));

                    $row1[] = array(
                        'ID_Activities' =>  $id,
                        'ID_List'      =>  $userinsert,
                        'Date'      =>  $DateInput,
                    );
            }
        }
            $this->db->insert_batch('NameList', $row1);

            echo json_encode(['status' => 1, 'msg' => 'Success']); 
    }

    public function Delete()
    {
        $userinsert = $this->input->post('user');
        $id         = $this->input->post('id');
        $row = array();

        

        foreach($userinsert as $index => $userinsert )
        {
            $row[] = $userinsert;
        }
     
        $this->db->where_in('ID_NameList', $row);
        $this->db->delete('NameList');
    }

    
}

/* End of file InsertTeam.php */
