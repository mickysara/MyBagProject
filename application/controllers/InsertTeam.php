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
                            LEFT JOIN Position ON t.Id_Users = Position.ID_User 
                            LEFT JOIN Branch ON t.Branch = Branch.ID_Branch 
                            LEFT JOIN Major ON t.Major = Major.ID_Major 
                            LEFT JOIN Title ON Title.Id_Title = t.Id_Title 
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
						<th style="text-align:center;" scope="col">
							<h4 style="text-align: left;">ตำแหน่ง</h4>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php   $data_user = [];
                                        foreach($result->result_array() as $data)
                                            {?>
					<tr>
						<th scope="row">
							<input type="checkbox" name="Teacher[]" value="<?php echo $data['id'] ?>">
							<?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>

		</div>
		</th>
        <td>
			<?php if($data['Name_Position'] != null)
                    { ?>
			<span class="badge badge-dot mr-4">
				<p><?php  echo $data['Name_Position'] ?></p>
			</span>
			<?php }else{ ?>
			<span class="badge badge-dot mr-4">
				<p><?php  echo "อาจารย์" ?></p>
			</span>
			<?php } ?>
		</td>
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
		<?php } ?>
		</tbody>
		</table>
	</div>
</div>
<?php }

    public function ShowTeacherOut($id)
    { 
        $major = $this->session->userdata('Major');
        $campus = $this->session->userdata('ID_Campus');

        $result = $this->db->query("SELECT *,t.Id_Users as id from Teacher as t 
        LEFT JOIN Position ON t.Id_Users = Position.ID_User 
        LEFT JOIN Branch ON t.Branch = Branch.ID_Branch 
        LEFT JOIN Major ON t.Major = Major.ID_Major 
        LEFT JOIN Title ON Title.Id_Title = t.Id_Title 
        where t.ID_Campus = $campus and  t.Major = $major  ORDER BY t.branch DESC")
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
						<th style="text-align:center;" scope="col">
							<h4 style="text-align: left;">ตำแหน่ง</h4>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php   $data_user = [];
                                        foreach($result->result_array() as $data)
                                            {?>
					<tr>
						<th scope="row">
							<input type="checkbox" name="Teacher[]" value="<?php echo $data['id'] ?>">
							<?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>

		</div>
		</th>
        <td>
			<?php if($data['Name_Position'] != null)
                    { ?>
			<span class="badge badge-dot mr-4">
				<p><?php  echo $data['Name_Position'] ?></p>
			</span>
			<?php }else{ ?>
			<span class="badge badge-dot mr-4">
				<p><?php  echo "อาจารย์" ?></p>
			</span>
			<?php } ?>
		</td>
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
		<?php } ?>
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
                                            { ?>

					<tr>
						<th scope="row">
							<input type="checkbox" name="Teacher[]" value="<?php echo $data['id'] ?>">
							<?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>

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
           <?php }?>
		</tbody>
		</table>
	</div>
</div>
<?php 
	}
	
	public function ShowEmployee($id)
    { 
        $branch = $this->session->userdata('Branch');
        $campus = $this->session->userdata('ID_Campus');

        $result = $this->db->query("SELECT *,t.Id_Users as id from Employee as t
        left join InTeam as it 
        on t.Id_Users = it.Id_Users
        LEFT JOIN Title
		ON Title.Id_Title = t.Id_Title")
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
							<h4 style="text-align: left;">แผนก</h4>
						</th>
						<th style="text-align:center;" scope="col">
							<h4 style="text-align: left;">ตำแหน่ง</h4>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php   $data_user = [];
                                        foreach($result->result_array() as $data)
                                            { ?>

					<tr>
						<th scope="row">
							<input type="checkbox" name="Teacher[]" value="<?php echo $data['id'] ?>">
							<?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>

		</div>
		</th>
		<?php 
                        $this->db->where('ID_Position_Emp', $data['ID_Position_Emp']);
                        $query2 = $this->db->get('Position_Emp');
                        $data2 = $query2->row_array(); 
                        
                        $this->db->where('ID_Department', $data2['ID_Department']);
                        $query3 = $this->db->get('Department');
                        $data3 = $query3->row_array();?>
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
           <?php }?>
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


            foreach($userinsert as $index => $userinsert )
            {   
                $this->db->where('ID_Activities', $id);
                $this->db->where('Id_Users', $userinsert);
                $this->db->where('ID_Team', $team);
                $query = $this->db->get('InTeam', 1);

                if($query->num_rows() == 1)
                {

                }else
                {
                    $row1[] = array(
                        'ID_Activities' =>  $id,
                        'Id_Users'      =>  $userinsert,
                        'ID_Team'       =>  $team 
                    );
                }
                $this->db->where('ID_Activities', $id);
                $this->db->where('ID_List', $userinsert);
                $query = $this->db->get('NameList', 1);

                    if($query->num_rows() == 1)
                    {

                    }else{
                        $row2[] = array(
                            'ID_Activities' =>  $id,
                            'ID_List'      =>  $userinsert,
                        );
                    }
                
                }
            if($row1 != null && $row2 != null)
            {
                $this->db->insert_batch('InTeam', $row1);
                $this->db->insert_batch('NameList', $row2);
            }

            echo json_encode(['status' => 1, 'msg' => 'Success']);

    }
}

/* End of file InsertTeam.php */
