<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertTeam extends CI_Controller {

    public function Showdata($id)
    {
        $this->data['id'] = $id;
        $this->load->view('Header');
        $this->load->view('InsertTeam',$this->data,FALSE);
        $this->load->view('Footer');
    }

    public function ShowTeacherInAc($id)
    { ?>
                   <?php /*$this->db->where('Branch', $this->session->userdata('Branch'));
                         $query = $this->db->get('Teacher');*/
                         $branch = $this->session->userdata('Branch');

                         $result = $this->db->query("SELECT *,t.Id_Users as id from Teacher as t
                         left join InTeam as it 
                         on t.Id_Users = it.Id_Users
                         LEFT JOIN Branch 
                         ON t.Branch = Branch.ID_Branch
                         LEFT JOIN Major
                         ON t.Major = Major.ID_Major
                         LEFT JOIN Title
		                 ON Title.Id_Title = t.Id_Title
                         where t.Branch='$branch' ORDER BY t.branch DESC ");
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
                                            if($data['ID_Activities'] != $id && in_array($data['ID_Teacher'], $data_user) == false)
                                            { ?>
                                <tr>
                                    <th scope="row">
                                    <input type="checkbox" name="Teacher[]" value="<?php echo $data['id'] ?>"> <?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>
                               
                    </div>
                    </th>
                    <td>
                        <span class="badge badge-dot mr-4">
                            <p><?php echo $data['Name_Branch'];?></p>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-dot mr-4">
                            <p><?php  echo $data['Name_Major'] ?>
                            </p>
                        </span>
                    </td>
                    <?php array_push($data_user, $data['ID_Teacher']);
                         } else
                             {
                             array_push($data_user, $data['ID_Teacher']);
                             }
                            }?>
                    </tbody>
                    </table>
                </div>
            </div>
<?php }

    public function ShowTeacherOut($id)
    { 
        $branch = $this->session->userdata('Branch');
        $campus = $this->session->userdata('ID_Campus');

        $result = $this->db->query("SELECT *,t.Id_Users as id from Teacher as t
        left join InTeam as it 
        on t.Id_Users = it.Id_Users
        LEFT JOIN Branch 
        ON t.Branch = Branch.ID_Branch
        LEFT JOIN Major
        ON t.Major = Major.ID_Major
        LEFT JOIN Title
		ON Title.Id_Title = t.Id_Title
        where t.ID_Campus = $campus ORDER BY t.branch DESC")
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
                                            if($data['ID_Activities'] != $id && in_array($data['ID_Teacher'], $data_user) == false)
                                            {?>
                                <tr>
                                    <th scope="row">
                                    <input type="checkbox" name="Teacher[]" value="<?php echo $data['id'] ?>"> <?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>
                               
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
                    <?php array_push($data_user, $data['ID_Teacher']);
                        } else
                             {
                             array_push($data_user, $data['ID_Teacher']);
                             }
                            }?>
                    </tbody>
                    </table>
                </div>
            </div>
    <?php 
    }

    public function ShowStudent($id)
    { 
        $branch = $this->session->userdata('Branch');
        $campus = $this->session->userdata('ID_Campus');

        $result = $this->db->query("SELECT *,t.Id_Users as id from student as t
        left join InTeam as it 
        on t.Id_Users = it.Id_Users
        LEFT JOIN Branch 
        ON t.Branch = Branch.ID_Branch
        LEFT JOIN Major
        ON t.Major = Major.ID_Major
        LEFT JOIN Title
		ON Title.Id_Title = t.Id_Title
        where t.ID_Campus = $campus ORDER BY t.Branch")
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
                                            if($data['ID_Activities'] != $id  && in_array($data['id'], $data_user) == false)
                                            {?>
                                <tr>
                                    <th scope="row">
                                    <input type="checkbox" name="Teacher[]" value="<?php echo $data['id'] ?>"> <?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>
                               
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
                    <?php array_push($data_user, $data['id']);
                        } else
                             {
                             array_push($data_user, $data['id']);
                             }
                            }?>
                    </tbody>
                    </table>
                </div>
            </div>
    <?php 
    }

    public function Insert()
    {
        $userinsert = $this->input->post('Teacher');
        $id         = $this->input->post('id');
        $team       = $this->input->post('Team');
        $row1 = array();
        $row2 = array();
        $remaining  = $this->input->post('Remaining');

        if(count($userinsert) <= $remaining)
        {
            foreach($userinsert as $index => $userinsert )
            {   
                $this->db->where('ID_Activities', $id);
                $this->db->where('Id_Users', $userinsert);
                $this->db->where('ID_Team', $team);
                $query = $this->db->get('InTeam', 1);
                
                
                
                
                if($query->num_rows() == 1)
                {
    
                }else{
                    $row1[] = array(
                        'ID_Activities' =>  $id,
                        'Id_Users'      =>  $userinsert,
                        'ID_Team'       =>  $team 
                    );
                    $row2[] = array(
                        'ID_Activities' =>  $id,
                        'ID_List'      =>  $userinsert,
                    );
                }
            }
            $this->db->insert_batch('InTeam', $row1);
            $this->db->insert_batch('NameList', $row2);

            echo json_encode(['status' => 1, 'msg' => 'Success']);
        }else
        {
            echo json_encode(['status' => 0, 'msg' => 'Fail']);
        }
    }
}

/* End of file InsertTeam.php */
