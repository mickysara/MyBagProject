<div class="container">
	<div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px; margin-left: auto; 
    margin-right: auto; 
    } ">
		<div class="header" style="margin-bottom: 20px;">
			<img src="" alt="">
			<h2 style="">เพิ่มคณะกรรมการ</h2>
			<hr>
		</div>
		<div class="Login">
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<p class="mr-3">เลือกประเภทคณะกรรมการ:</p>
						<select name="Team" stye="width: 500px;">
							<option value="">กรุณาเลือกประเภทของคณะกรรมการ</option>
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
						<p>อาจารย์ผู้รับผิดชอบกิจกรรม</p>
						<input type="radio" checked="checked" name="Teacherra" value="In"> อาจารย์ภายในสาขา<br>
						<input type="radio" name="Teacherra" value="Out"> อาจารย์ท่านอื่น<br>

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
					</div>
				</div>
			</div>
			<div class="Footer">
				<button type="submit" class="btn btn "
					style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">เข้าสู่ระบบ</button>
			</div>
		</div>
	</div>
