<div class="container">
	<div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px; margin-left: auto; 
    margin-right: auto; 
    } ">
		<div class="header" style="margin-bottom: 20px;">
			<img src="" alt="">
			<h2 style="">เพิ่มคณะกรรมการ</h2>
			<hr>
		</div>
		<form action="<?php echo base_url("InsertTeam/Insert") ?>" method="post">
		<div class="Login">
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<p class="mr-3">เลือกประเภทคณะกรรมการ:</p>
						<select name="Team" required stye="width: 500px;">
							<option selected="true" disabled="disabled" value="">กรุณาเลือกประเภทของคณะกรรมการ</option>
							<?php 
                                    $query = $this->db->get('Team');
                                    foreach($query->result_array() as $data)
                                    {   ?>
							<option value="<?php echo $data['ID_Team'] ?>"><?php echo $data['Name_Team'] ?></option>
							<?php   } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<p>ค้นหารายชื่อ</p>
						<select name="Type" id="Type" onChange="Change_Type()" required stye="width: 500px;">
							<option selected="true" disabled="disabled" value="">กรุณาเลือกกลุ่มบุคลากร</option>
							<option value="Inbranch">บุคลากรภายในสาขา</option>
							<option value="Incampus">บุคลากรภายในวิทยาเขต</option>
							<option value="student">นักศึกษา</option>
						</select>
						<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
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
