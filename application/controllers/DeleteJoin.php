<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteJoin extends CI_Controller {

    public function Showdata($id)
    {
        $this->data['id'] = $id;
        $this->load->view('Header');
        $this->load->view('DeleteJoin',$this->data,FALSE);
        $this->load->view('Footer');
    }

    public function ShowTeacher($id)
    {
        $query = $this->db->query("SELECT * FROM Teacher 
				LEFT JOIN NameList 
				ON NameList.ID_List = Teacher.Id_Users 
				LEFT JOIN Major
				ON Major.ID_Major = Teacher.Major
				LEFT JOIN Branch
				ON Branch.ID_Branch = Teacher.Branch
				LEFT JOIN Title
				ON Title.Id_Title = Teacher.Id_Title
				WHERE ID_Activities = $id 
				GROUP BY NameList.ID_List
				ORDER BY Teacher.branch"); 

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
				</tr>
			</thead>
			<tbody>
				<?php foreach($query->result_array() as $data) 
							{?>
				<tr>
					<th scope="row">
					<input type="checkbox" name="user[]" value="<?php echo $data['ID_NameList'] ?>"> <?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>

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
				LEFT JOIN NameList 
				ON NameList.ID_List = student.Id_Users 
				LEFT JOIN Major
				ON Major.ID_Major = student.Major
				LEFT JOIN Branch
				ON Branch.ID_Branch = student.Branch
				LEFT JOIN Title
				ON Title.Id_Title = student.Id_Title
				WHERE ID_Activities = $id 
				GROUP BY NameList.ID_List"); ?>

<table class="table align-items-center table-flush" id="Filesearch">
			<thead class="thead-light">
				<tr>
					<th scope="col">
						<h4>ชื่อผู้เข้าร่วม</h4>
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
				</tr>
			</thead>
			<tbody>
				<?php foreach($query->result_array() as $data) 
							{?>
				<tr>
					<th scope="row">
					<input type="checkbox" name="user[]" value="<?php echo $data['ID_NameList'] ?>"> <?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>

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

					<?php } ?>
			</tbody>
		</table>
		</div>
		</div>
        <?php
    }
	public function ShowEmployee($id)
    {
      
				$query =  $this->db->query("SELECT * FROM Employee 
				LEFT JOIN NameList 
				ON NameList.ID_List = Employee.Id_Users 
				LEFT JOIN Title
				ON Title.Id_Title = Employee.Id_Title
				WHERE ID_Activities = $id
				GROUP BY NameList.ID_List"); ?>

<table class="table align-items-center table-flush" id="Filesearch">
			<thead class="thead-light">
				<tr>
				<th scope="col">
						<h4>ชื่อผู้เข้าร่วมกิจกรรม</h4>
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
				<?php foreach($query->result_array() as $data) 
							{?>
				<tr>
					<th scope="row">
					<input type="checkbox" name="user[]" value="<?php echo $data['ID_NameList'] ?>"> <?php echo $data['Name_Title'].$data['Fname']." ".$data['Lname'] ?></input>

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


					<?php } ?>
			</tbody>
		</table>
		</div>
		</div>
        <?php
    }
}

/* End of file DeleteJoin.php */
