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
                         where t.Branch='$branch' ORDER BY it.ID_Activities DESC ");
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
                                    <input type="checkbox" name="Teacher[]" value="<?php echo $data['id'] ?>"> อาจารย์ <?php echo $data['Fname']." ".$data['Lname'] ?></input>
                               
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
        where t.ID_Campus = $campus ORDER BY it.ID_Activities DESC")
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
                                    <input type="checkbox" name="Teacher[]" value="<?php echo $data['id'] ?>"> อาจารย์ <?php echo $data['Fname']." ".$data['Lname'] ?></input>
                               
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
                                    <input type="checkbox" name="Teacher[]" value="<?php echo $data['id'] ?>"> <?php echo $data['Fname']." ".$data['Lname'] ?></input>
                               
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
        $row = array();

        foreach($userinsert as $index => $userinsert )
        {
            $row[] = array(
                'ID_Activities' =>  $id,
                'Id_Users'      =>  $userinsert,
                'ID_Team'       =>  $team 
            );
        }
        $this->db->insert_batch('InTeam', $row);
        
        
        redirect('InsertTeam/Showdata/'.$id,'refresh');
        
    }
}

/* End of file InsertTeam.php */
