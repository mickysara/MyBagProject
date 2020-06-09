<?php 
		$this->db->where('ID_Activities', $id);
		$query = $this->db->get('NameList');
		$data = $query->num_rows();

		$this->db->where('ID_Activities', $id);
		$query2 = $this->db->get('Activities');
		$data2 = $query2->row_array();

		$query20  =  $this->db->query("SELECT Team.ID_Team,Team.Name_Team,InTeam.Id_Users 
		FROM Team LEFT JOIN InTeam ON Team.ID_Team = InTeam.ID_Team 
		WHERE InTeam.ID_Activities = $id 
		AND Team.ID_Team != 4
        AND Team.ID_Team != 5
        AND Team.ID_Team != 6
        AND Team.ID_Team != 7
		GROUP BY Team.ID_Team");
		?>
<div class="container">
	<div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px; margin-left: auto; 
			margin-right: auto; 
			} ">
		<div class="header" style="margin-bottom: 20px;">
			<img src="" alt="">
			<h2 style="">เพิ่มคณะกรรมการในกิจกรรม <?php echo '"'.$data2['Name_Activities'].'"'?> </h2>
			<hr>
		</div>
		<form action="" id="InsertTeam" method="post">
			<div class="Login">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<p class="mr-3">เลือกประเภทคณะกรรมการ:</p>
							<select name="Team" required stye="width: 500px;">
								<option selected="true" disabled="disabled" value="">กรุณาเลือกประเภทของคณะกรรมการ
								</option>
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
								<option value="Inbranch">อาจารย์ภายในสาขา</option>
								<option value="Incampus">อาจารย์ภายในวิทยาเขต</option>
								<option value="InEmp">เจ้าหน้าที่ภายในวิทยาเขต</option>
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
					<?php if($query20->num_rows() < 3){ ?>
					<button type="button" class="btn btn-primary btn-round mt-5" data-toggle="modal"
						data-target="#AlertInTeam">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ</button>
					<?php }else{ ?>
					<a class="btn btn-primary btn-round mt-5" href="<?php echo base_url("InActivity/showdata/".$id) ?>">
						<i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ
					</a>
					<?php }?>

					<div class="modal fade" id="AlertInTeam" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title" id="exampleModalLabel">
										คำเตือน</h1>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<div class="modal-body">

									<h1 style="text-align: center;">ไม่สามารถไปยังหน้าถัดไปได้</h1>
									<h2 style="text-align: center;">
										เนื่องจากคณะกรรมการในกิจกรรมนี้มีไม่ครบ 3 ตำแหน่ง</h2>
									<h3 style="text-align: center;"></h3>
									<h3 style="text-align: center; color:red;">
										** ต้องมีอย่างน้อยคือตำแหน่ง อำนวยการ ดำเนินการ ฝ่ายการเงินและบัญชี **</h3>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
								</div>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn mt-5"
						style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; display: inline-block; float: right;">ยืนยัน</button>
				</div>

		</form>
	</div>
</div>
