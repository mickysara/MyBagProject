<div class="container" style="margin-bottom: 40px;">
	<div class="nav-wrapper">
		<ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
			<li class="nav-item">
				<a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
					href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
						class="ni ni-cloud-upload-96 mr-2"></i>เพิ่มนักศึกษา</a>
			</li>
			<li class="nav-item">
				<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
					href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i
						class="ni ni-bell-55 mr-2"></i>เพิ่มอาจารย์</a>
			</li>
			<li class="nav-item">
				<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
					href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
						class="ni ni-calendar-grid-58 mr-2"></i>เพิ่มพนักงาน</a>
			</li>
			<li class="nav-item">
				<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab"
					href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i
						class="ni ni-calendar-grid-58 mr-2"></i>เพิ่มผู้ประกอบการร้านค้า</a>
			</li>
		</ul>
	</div>
	<div class="card shadow">
		<div class="card-body">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
					aria-labelledby="tabs-icons-text-1-tab">
					<form name="Student" id="Student_form" method="post">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>รหัสนักศึกษา</p>
									<input type="text" class="form-control" id="exampleFormControlInput1" name="Id_Student"
										placeholder="เลขรหัสนักศึกษา">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p>รหัสผ่าน</p>
									<input type="password" class="form-control" id="exampleFormControlInput1" name="Password"
										placeholder="กรุณากรอกรหัสผ่าน">
								</div>
							</div>
						</div>
						<div class="col-md-2">
								<div class="form-group">
									<p>คำนำหน้าชื่อ</p>
									<select name="Title" id="Title">
									<?php 
										  $query = $this->db->query("SELECT * FROM Title where Name_Title = 'นาย' or Name_Title = 'นางสาว'");
										  foreach($query->result_array() as $data)
										  { ?>
											<option value="<?php echo $data['Id_Title'] ?>"><?php echo $data['Name_Title'] ?></option>
									<?php
										  }
									 ?>
									 </select>
								</div>
							</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>ชื่อ</p>
									<input type="text" class="form-control" id="exampleFormControlInput1" name="Fname"
										placeholder="กรุณากรอกชื่อนักศึกษา">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p>นามสกุล</p>
									<input type="Text" class="form-control" id="exampleFormControlInput1" name="Lname"
										placeholder="กรุณากรอกชื่อนามสกุลนักศึกษา">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>วิทยาเขต</p>
									<select id="Campus" name="Campus" onChange="Change_Campus()" required style="width: 300px; height: 40px;">
										<option selected="true" disabled="disabled" value="">กรุณาเลือกวิทยาเขต</option>

										<?php $query = $this->db->get('Campus');
                                              foreach($query->result_array() as $data)
                                              { ?>

										<option value="<?php echo $data['ID_Campus'] ?>">
											<?php echo $data['Name_Campus'] ?> </option>

										<?php }
                                        
                                         ?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p>คณะ</p>
									<select id="Major" name="Major" onChange="Change_Major()"  required style="width: 350px; height: 40px;">
										<option selected="true" disabled="disabled" value="">กรุณาเลือกคณะ</option>
									</select>
								</div>
							</div>
						</div>
                        <div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>สาขา</p>
									<select id="Branch" name="Branch" required style="width: 300px; height: 40px;">
										<option selected="true" disabled="disabled" value="">กรุณาเลือกสาขา</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p>ชั้นปี</p>
									<select id="Year" name="Year" required style="width: 350px; height: 40px;">
										<option selected="true" disabled="disabled" value="">กรุณาเลือกชั้นปี</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
									</select>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn " style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">ยืนยัน</button>
					</form>
				</div>
				<div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
					aria-labelledby="tabs-icons-text-2-tab">
					<form name="Teacher" id="Teacher_form" method="post">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>รหัสอาจารย์</p>
									<input type="text" class="form-control" id="exampleFormControlInput1" name="Id_Teacher"
										placeholder="เลขอาจารย์3หลัก">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p>รหัสผ่าน</p>
									<input type="password" class="form-control" id="exampleFormControlInput1" name="Password"
										placeholder="กรุณากรอกรหัสผ่าน">
								</div>
							</div>
						</div>
						<div class="row">
						<div class="col-md-4">
								<div class="form-group">
									<p>คำนำหน้าชื่อ</p>
									<select name="Title" id="Title">
									<?php 
										  $query = $this->db->query("SELECT * FROM Title where Name_Title != 'นาย' or Name_Title != 'นางสาว' OR Name_Title != 'นาง'");
										  foreach($query->result_array() as $data)
										  { ?>
											<option value="<?php echo $data['Id_Title'] ?>"><?php echo $data['Name_Title'] ?></option>
									<?php
										  }
									 ?>
									 </select>
								</div>
								
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p>ตำแหน่ง</p>
									<select name="Position" id="Position">
									<?php 
										  $query = $this->db->query("SELECT Position.Id_Position,Position.Name_Position,Major.Name_Major,Branch.Name_Branch FROM `Position` LEFT JOIN Major ON Major.ID_Major = Position.Major LEFT JOIN Branch ON Branch.ID_Branch = Position.Branch WHERE Position.ID_User IS NULL");
										  foreach($query->result_array() as $data)
										  { 
											  if($data['Name_Branch'] == null)
											  { ?>
												<option value="<?php echo $data['Id_Position'] ?>"><?php echo $data['Name_Position'].$data['Name_Major'] ?></option>
										<?php }else 
												{ ?>
												<option value="<?php echo $data['Id_Position'] ?>"><?php echo $data['Name_Position'].$data['Name_Branch'] ?></option>
										<?php	}?>
										
									<?php
										  }
									 ?>
									 <option value="Teacher">อาจารย์</option>
									 </select>
								</div>
								
							</div>
						</div>	
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>ชื่อ</p>
									<input type="text" class="form-control" id="exampleFormControlInput1" name="Fname"
										placeholder="กรุณากรอกชื่ออาจารย์">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p>นามสกุล</p>
									<input type="Text" class="form-control" id="exampleFormControlInput1" name="Lname"
										placeholder="กรุณากรอกชื่อนามสกุลอาจารย์">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>วิทยาเขต</p>
									<select id="CampusTeacher" name="CampusTeacher" onChange="Change_CampusTeacher()" required style="width: 300px; height: 40px;">
										<option selected="true" disabled="disabled" value="">กรุณาเลือกวิทยาเขต</option>

										<?php $query = $this->db->get('Campus');
                                              foreach($query->result_array() as $data)
                                              { ?>

										<option value="<?php echo $data['ID_Campus'] ?>">
											<?php echo $data['Name_Campus'] ?> </option>

										<?php }
                                        
                                         ?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p>คณะ</p>
									<select id="MajorTeacher" name="MajorTeacher" onChange="Change_MajorTeacher()"  required style="width: 350px; height: 40px;">
										<option selected="true" disabled="disabled" value="">กรุณาเลือกคณะ</option>
									</select>
								</div>
							</div>
						</div>
                        <div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>สาขา</p>
									<select id="BranchTeacher" name="BranchTeacher" required style="width: 300px; height: 40px;">
										<option selected="true" disabled="disabled" value="">กรุณาเลือกสาขา</option>
									</select>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn " style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">ยืนยัน</button>
					</form>
				</div>
				<div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
					aria-labelledby="tabs-icons-text-3-tab">

					<form name="Employee" id="Employee_form" method="post">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>รหัสพนักงาน</p>
									<input type="text" class="form-control" id="exampleFormControlInput1" name="Id_Employee"
										placeholder="เลขรหัสพนักงาน">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p>รหัสผ่าน</p>
									<input type="password" class="form-control" id="exampleFormControlInput1" name="Password"
										placeholder="กรุณากรอกรหัสผ่าน">
								</div>
							</div>
						</div>
						<div class="col-md-2">
								<div class="form-group">
									<p>คำนำหน้าชื่อ</p>
									<select name="Title" id="Title">
									<?php 
										  $query = $this->db->query("SELECT * FROM Title where Name_Title != 'นาย' or Name_Title != 'นางสาว' OR Name_Title != 'นาง'");
										  foreach($query->result_array() as $data)
										  { ?>
											<option value="<?php echo $data['Id_Title'] ?>"><?php echo $data['Name_Title'] ?></option>
									<?php
										  }
									 ?>
									 </select>
								</div>
							</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>ชื่อ</p>
									<input type="text" class="form-control" id="exampleFormControlInput1" name="Fname"
										placeholder="กรุณากรอกชื่อพนักงาน">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p>นามสกุล</p>
									<input type="Text" class="form-control" id="exampleFormControlInput1" name="Lname"
										placeholder="กรุณากรอกชื่อนามสกุลพนักงาน">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>คณะ</p>
									<select id="Campus" name="Campus" onChange="Change_Campus()" required style="width: 300px; height: 40px;">
										<option selected="true" disabled="disabled" value="">กรุณาเลือกคณะ</option>

										<?php $query = $this->db->get('Campus');
                                              foreach($query->result_array() as $data)
                                              { ?>

										<option value="<?php echo $data['ID_Campus'] ?>">
											<?php echo $data['Name_Campus'] ?> </option>

										<?php }
                                        
                                         ?>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>แผนก</p>
									<select id="DepartMent2" name="DepartMent2" onChange="Change_Depart()" required style="width: 300px; height: 40px;">
										<option value="" disabled selected>กรุณาเลือกแผนก</option>
										<?php $query3 = $this->db->get('Department');
                                              foreach($query3->result_array() as $data3)
                                              { ?>

										<option value="<?php echo $data3['ID_Department'] ?>">
											<?php echo $data3['Name_Department'] ?> </option>

										<?php } ?>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>ตำแหน่ง</p>
									<select id="Position2" name="Position2" required style="width: 300px; height: 40px;">
										<option  value="">กรุณาเลือกตำแหน่ง</option>									
									</select>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn " style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">ยืนยัน</button>
					</form>

				</div>
				<div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
					aria-labelledby="tabs-icons-text-4-tab">
					<form name="Emp" id="Emp_form" method="post">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>รหัสผู้ประกอบการร้านค้า</p>
									<input type="text" class="form-control" id="exampleFormControlInput1" name="Id_Student"
										placeholder="เลขรหัสผู้ประกอบการร้านค้า">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p>รหัสผ่าน</p>
									<input type="password" class="form-control" id="exampleFormControlInput1" name="Password"
										placeholder="กรุณากรอกรหัสผ่าน">
								</div>
							</div>
						</div>
						<div class="col-md-2">
								<div class="form-group">
									<p>คำนำหน้าชื่อ</p>
									<select name="Title" id="Title">
									<?php 
										  $query = $this->db->query("SELECT * FROM Title where Name_Title = 'นาย' or Name_Title = 'นางสาว'");
										  foreach($query->result_array() as $data)
										  { ?>
											<option value="<?php echo $data['Id_Title'] ?>"><?php echo $data['Name_Title'] ?></option>
									<?php
										  }
									 ?>
									 </select>
								</div>
							</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>ชื่อ</p>
									<input type="text" class="form-control" id="exampleFormControlInput1" name="Fname"
										placeholder="กรุณากรอกชื่อผู้ประกอบการ">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p>นามสกุล</p>
									<input type="Text" class="form-control" id="exampleFormControlInput1" name="Lname"
										placeholder="กรุณากรอกชื่อนามสกุลผู้ประกอบการ">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>วิทยาเขต</p>
									<select id="Campus" name="Campus" onChange="Change_Campus()" required style="width: 300px; height: 40px;">
										<option selected="true" disabled="disabled" value="">กรุณาเลือกวิทยาเขต</option>

										<?php $query = $this->db->get('Campus');
                                              foreach($query->result_array() as $data)
                                              { ?>

										<option value="<?php echo $data['ID_Campus'] ?>">
											<?php echo $data['Name_Campus'] ?> </option>

										<?php }
                                        
                                         ?>
									</select>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn " style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">ยืนยัน</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
