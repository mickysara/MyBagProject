<div class="container">
	<div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px; margin-left: auto; 
    margin-right: auto; 
    } ">
		<div class="header" style="margin-bottom: 20px;">
			<img src="" alt="">
			<h2 style="">เพิ่มผู้เข้าร่วมกิจกรรม</h2>
			<hr>
		</div>
		<form action="<?php echo base_url("InsertJoin/Insert") ?>" method="post">
		<div class="Login">
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<p>สาขา</p>
						<select name="Branch" id="Branch" onChange="Change_Branch()" required stye="width: 500px;">
							<option selected="true" disabled="disabled" value="">กรุณาเลือกสาขา</option>

							<?php 	$campus = $this->session->userdata('ID_Campus');
									$query = $this->db->query("SELECT * FROM Branch LEFT JOIN Major ON Branch.ID_Major = Major.ID_Major LEFT JOIN Campus ON Campus.ID_Campus = Major.ID_Campus
									WHERE Major.ID_Campus = $campus");

									foreach($query->result_array() as $data)
									{	?>
										<option value="<?php echo $data['ID_Branch'] ?>"><?php echo $data['Name_Branch']; ?></option>
							<?php	} ?>
						</select>
						<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<p>ประเภทบุคคลากร</p>
						<select name="Type" id="Type" onChange="Change_Branch()" required stye="width: 500px;">
							<option selected="true" disabled="disabled" value="">กรุณาเลือกกลุ่มบุคลากร</option>
							<option value="Teacher">อาจารย์</option>
							<option value="student">นักศึกษา</option>
						</select>
					</div>
				</div>
			</div>
			<div class="TeacherRes mt-3" id="ShowTeacherRes">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">

                                        <?php $this->db->query("SELECT * From Teacher,student,InTeam WHERE InTeam.Id_Users = Teacher.Id_Users 
                                                                AND InTeam.Id_Users = student.Id_Users AND InTeam.ID_Activities != $id"); ?>     

									</div>
								</div>
							</div>
						</div>
			<div class="Footer">
			<a class="btn btn-primary btn-round mt-5" href="<?php echo base_url("InActivity/showdata/".$id) ?>">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ
            </a>
				<button type="submit" class="btn btn mt-5"
					style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; display: inline-block; float: right;">ยืนยัน</button>
			</div>
			</form>
		</div>
	</div>
