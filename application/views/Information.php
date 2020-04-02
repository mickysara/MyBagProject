<div class="container">
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;max-width: 800px;
                            border-radius: .25rem;
                            background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">ข้อมูลผู้ใช้
				<div href="#" class="avatar rounded-circle">
					<i class="fa fa-user-circle" aria-hidden="true"></i>
				</div>
			</h2>
			<hr>
			<?php if($this->session->userdata('Type') == 'Student')
                    {   ?>
			<p>รหัสนักศึกษา: <?php echo $this->session->userdata('ID') ?> </p>
			<p>ชื่อผู้ใช้: <?php echo $this->session->userdata('Fname')." ".$this->session->userdata('Lname')?></p>
			<?php $id = $this->session->userdata('ID');
                            $query = $this->db->query("SELECT student.Fname,student.Lname,Branch.Name_Branch,Major.Name_Major,Campus.Name_Campus 
                                                FROM student,Branch,Major,Campus 
                                                WHERE student.Branch = Branch.ID_Branch AND Branch.ID_Major = Major.ID_Major AND Major.ID_Campus = Campus.ID_Campus 
                                                AND student.Id_Student = '$id'");
                            $data = $query->row_array();
                        ?>
			<p><?php echo $data['Name_Branch'] ?></p>
			<p><?php echo $data['Name_Major'] ?></p>
			<p><?php echo $data['Name_Campus'] ?></p>
			<p>ปีการศึกษาที่: <?php echo $this->session->userdata('Year')?> </p>
			<p>สถานะภาพ: <?php echo $this->session->userdata('Status')?> </p>
			<?php }else if($this->session->userdata('Type') == 'Teacher')
                    { ?>
			<p>รหัสอาจารย์: <?php echo $this->session->userdata('ID') ?> </p>
			<p>ชื่อผู้ใช้: <?php echo $this->session->userdata('Fname')." ".$this->session->userdata('Lname')?></p>
			<?php $id = $this->session->userdata('ID');
                            $query = $this->db->query("SELECT Teacher.Fname,Teacher.Lname,Branch.Name_Branch,Major.Name_Major,Campus.Name_Campus 
                                                FROM Teacher,Branch,Major,Campus 
                                                WHERE Teacher.Branch = Branch.ID_Branch AND Branch.ID_Major = Major.ID_Major AND Major.ID_Campus = Campus.ID_Campus 
                                                AND Teacher.ID_Teacher = '$id'");
                            $data = $query->row_array();
                        ?>
			<p><?php echo $data['Name_Branch'] ?></p>
			<p><?php echo $data['Name_Major'] ?></p>
			<p><?php echo $data['Name_Campus'] ?></p>
			<?php }else
                    { ?>
			<p>รหัสพนักงาน: <?php echo $this->session->userdata('ID') ?> </p>
			<p>ชื่อ-นามสกุล: <?php echo $this->session->userdata('Fname')." ".$this->session->userdata('Lname'); ?> </p>
			<p>แผนก: <?php echo $this->session->userdata('Department'); ?> </p>
			<?php } ?>
		</div>
	</div>


	<!----------------------------------- จำนวนผลผลิต ------------------------------------------------------->

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 32px; margin-bottom: 32px; padding: 1.25rem;max-width: 800px;
                            border-radius: .25rem;
                            background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h1 style="font-size: 30px;">จำนวนผลผลิตที่เคยเข้าร่วม</h1>
			<hr>


			<div class="table-responsive">
				<table class="table align-items-center table-flush" id="Filesearch">
					<thead class="thead-light">
						<tr>
							<th scope="col">
								<h4>ชื่อผลผลิต</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">จำนวนที่เคยเข้าร่วม</h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php

                        $ID = $this->session->userdata('Id_Users');
                        
                        $query  =  $this->db->query("SELECT Result.Name_Result,Result.Id_Result 
                                        FROM Result");

                                        foreach ($query->result_array() as $Result)
                                        {
                                            $GetResult = $Result['Id_Result'];

                                            // $result2 = $this->db->query("SELECT NameList.ID_List,NameList.ID_Activities,Project.Id_Project,Result.Id_Result
                                            // FROM NameList,Activities,Project,Result 
                                            // WHERE NameList.ID_List = $ID
                                            // AND Project.Result = $GetResult
                                            // AND NameList.TimeIn IS NOT NULL
                                            // GROUP BY NameList.ID_Activities
                                            // AND Project.Id_Project");

                                            $result2 = $this->db->query("SELECT * FROM Project,Activities,NameList 
                                            WHERE Project.Result = $GetResult
                                            AND Activities.ID_Project = Project.ID_Project
                                            AND NameList.ID_List = $ID
                                            AND NameList.ID_Activities = Activities.ID_Activities
                                            GROUP BY NameList.ID_Activities");
                            ?>
						<tr>
							<th scope="row">
								<div class="media align-items-center">
									<a href="#" class="avatar rounded-circle mr-3">
										<i class="fa fa-bicycle"></i>
									</a>
									<div class="media-body">
										<span class="mb-0 text-sm">
											<p style="margin-bottom: 0px;"><?php echo $Result['Name_Result'] ?></p>
										</span>
									</div>
								</div>
			</div>
			</th>
			<td>
				<p>
                   <?php echo $result2->num_rows()?>
				</p>
			</td>

			<?php }?>
			</tr>

			</tbody>
			</table>
		</div>
	</div>
</div>


</div>
