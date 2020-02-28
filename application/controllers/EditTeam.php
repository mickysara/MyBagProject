<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class EditTeam extends CI_Controller {

    public function Showdata($id)
    {
        $this->data['id'] = $id;
        $this->load->view('Header');
        $this->load->view('EditTeam',$this->data,FALSE);
        $this->load->view('Footer');
    }

    public function ShowTeacher($id)
    {
        $query = $this->db->query("SELECT * FROM Teacher 
        LEFT JOIN InTeam 
        ON InTeam.Id_Users = Teacher.Id_Users 
        LEFT JOIN Major
        ON Major.ID_Major = Teacher.Major
        LEFT JOIN Branch
        ON Branch.ID_Branch = Teacher.Branch
        LEFT JOIN Team
        ON Team.ID_Team = InTeam.ID_Team
        LEFT JOIN Title
        ON Title.Id_Title = Teacher.Id_Title
        WHERE ID_Activities = $id ORDER BY Teacher.Branch"); 

				$query2 =  $this->db->query("SELECT * FROM student 
				LEFT JOIN NameList 
				ON NameList.ID_List = student.Id_Users 
				LEFT JOIN Major
				ON Major.ID_Major = student.Major
				LEFT JOIN Branch
				ON Branch.ID_Branch = student.Branch
				WHERE ID_Activities = $id"); ?>

		<table class="table align-items-center table-flush" id="Filesearch">
			<thead class="thead-light">
				<tr>
					<th scope="col">
						<h4>ชื่อผู้เข้าร่วมกิจกรรม</h4>
					</th>
					<th style="text-align:center;" scope="col">
						<h4 style="text-align: left;">สาขา</h4>
					</th>
					<th style="text-align:center;" scope="col">
						<h4 style="text-align: left;">คณะ</h4>
					</th>
                    <th style="text-align:center;" scope="col">
						<h4 style="text-align: left;">ประเภทคณะกรรมการ</h4>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($query->result_array() as $data) 
							{?>
				<tr>
					<th scope="row">
					<input type="checkbox" name="user[]" value="<?php echo $data['Id_JoinAc'] ?>"> <?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>

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
                    <td>
						<span class="badge badge-dot mr-4">
							<p><?php  echo $data['Name_Team'] ?></p>
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
      
				$query =  $this->db->query("SELECT * FROM student 
                LEFT JOIN InTeam 
                ON InTeam.Id_Users = student.Id_Users 
                LEFT JOIN Major
                ON Major.ID_Major = student.Major
                LEFT JOIN Branch
                ON Branch.ID_Branch = student.Branch
                LEFT JOIN Team
                ON Team.ID_Team = InTeam.ID_Team
                LEFT JOIN Title
                ON Title.Id_Title = student.Id_Title
                WHERE ID_Activities = $id ORDER BY student.Branch"); ?>

<table class="table align-items-center table-flush" id="Filesearch">
			<thead class="thead-light">
				<tr>
					<th scope="col">
						<h4>ชื่อ</h4>
					</th>
					<th style="text-align:center;" scope="col">
						<h4 style="text-align: left;">ชั้นปีการศึกษา</h4>
					</th>
					<th style="text-align:center;" scope="col">
						<h4 style="text-align: left;">สาขา</h4>
					</th>
					<th style="text-align:center;" scope="col">
						<h4 style="text-align: left;">คณะ</h4>
					</th>
                    <th style="text-align:center;" scope="col">
						<h4 style="text-align: left;">ประเภทคณะกรรมการ</h4>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($query->result_array() as $data) 
							{?>
				<tr>
					<th scope="row">
					<input type="checkbox" name="user[]" value="<?php echo $data['Id_JoinAc'] ?>"> <?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>

						</div>
					</th>
					<td>
						<span class="badge badge-dot mr-4">
							<p>ปี<?php echo $data['Year'];?></p>
						</span>
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
                    <td>
						<span class="badge badge-dot mr-4">
							<p><?php  echo $data['Name_Team'] ?></p>
						</span>
					</td>

					<?php } ?>
			</tbody>
		</table>
		</div>
		</div>
        <?php
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
     
        $this->db->where_in('Id_JoinAc', $row);
        $this->db->delete('InTeam');
    }

}

/* End of file EditTeam.php */
 ?>