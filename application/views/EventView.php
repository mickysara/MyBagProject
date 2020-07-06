<div class="container">
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; margin-bottom: 20px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #fff;     
                border: 1px solid #D8D9DC;
                ">

		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!-- <form method="post" action="<?php echo site_url('Event/InsertActivity')?>"  enctype='multipart/form-data'> -->
		<form method="post" id="insertAc" enctype='multipart/form-data'>
			<?php 		$this->db->where('Id_Project', $ID);
				$query = 	$this->db->get('Project', 1);

				$qq = $query->row_array();
		
		 ?>
			<input type="hidden" name="ID" id="ID" value="<?php echo $ID ?>">
			<h2 style="font-weight: 0px;">ขออนุมัติการจัดกิจกรรม</h2>
			<hr>
			<p>ชื่อกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Name" name="Name" required
							placeholder="กิจกรรมกระชับความสัมพันธ์ในสาขา"> 
					</div>
				</div>
			</div>
			<p>รายละเอียดกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<textarea class="form-control" id="Detail" name="Detail" rows="3" required
							placeholder="กิจกรรมนี้เกียวข้องกับ....."></textarea>
					</div>
				</div>
			</div>
			<p>ประเภทกิจกรรมในเอกสาร</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<select name="TypeFile" id="TypeFile" style="height: 35px;" required onChange="Change_Relation()">
						  <option value="" disabled selected>กรุณาเลือกประเภทกิจกรรมในเอกสาร</option>
							<?php
								$type = $this->db->get('TypeActivitiesFile');
								foreach($type->result_array() as $dataF)
								{ ?>
							<option value="<?php echo $dataF['ID_TypeActivitiesFile']?>">
								<?php echo $dataF['Name_TypeActivitiesFile']?></option>
							<?php } ?>
						</select>


					</div>
				</div>
			</div>
			<p>ประเภทกิจกรรมในสมุดกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<select name="Type" id="Type" style="height: 35px;" required>
						<option value="" disabled selected>กรุณาเลือกประเภทกิจกรรมในสมุดกิจกรรม</option>
							<!-- <?php
								$type = $this->db->get('TypeActivities');
								foreach($type->result_array() as $dataT)
								{ ?>
							<option value="<?php echo $dataT['Id_TypeActivity']?>">
								<?php echo $dataT['Name_TypeActivity']?></option>
							<?php } ?> -->
						</select>


					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p>วันที่เริ่ม</p><p style="color:red">** กรุณาเลือกวันที่เริ่มและสิ้นสุดกิจกรรมมากกว่าวันที่ปัจจุบันอย่างน้อย 3 วัน **</p>
					<div class="form-group">
						<div class="input-group input-group-alternative">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							</div>
							<?php 
                                        $end = date('m/d/Y'); ?>
							<input class="form-control datepicker" id="DateStart" name="DateStart" required
								placeholder="Select date" type="text" value="<?php echo $end ?>" onChange="CheckDateStart()">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<p>เวลาเริ่ม</p>
					<div class="form-group">
						<input class="timepicker text-center" jt-timepicker="" time="model.time"
							time-string="model.timeString" default-time="model.options.defaultTime"
							time-format="model.options.timeFormat" start-time="model.options.startTime"
							min-time="model.options.minTime" max-time="model.options.maxTime"
							interval="model.options.interval" dynamic="model.options.dynamic"
							scrollbar="model.options.scrollbar" dropdown="model.options.dropdown" id="TimeStart" name="TimeStart" onChange="CheckTime()">
					</div>
				</div>
			</div>

			<div id="ShowTime">
				<div class="row">
					<div class="col-md-6">
						<p>วันที่สิ้นสุด</p><p style="color:red">** กรุณาเลือกวันที่สิ้นสุดกิจกรรมให้มากกว่าหรือเท่ากับวันที่เริ่มต้นกิจกรรม **</p>
						<div class="form-group">
							<div class="input-group input-group-alternative">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
								</div>
								<?php 
                                        $end = date('m/d/Y'); ?>
								<input class="form-control datepicker" id="DateEnd" name="DateEnd" required
									placeholder="Select date" type="text" value="<?php echo $end ?>" onChange="CheckDateEnd()">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<p>เวลาสิ้นสุด</p>
						<div class="form-group">
						<input class="timepicker text-center" jt-timepicker="" time="model.time"
							time-string="model.timeString" default-time="model.options.defaultTime"
							time-format="model.options.timeFormat" start-time="model.options.startTime"
							min-time="model.options.minTime" max-time="model.options.maxTime"
							interval="model.options.interval" dynamic="model.options.dynamic"
							scrollbar="model.options.scrollbar" dropdown="model.options.dropdown" id="TimeEnd" name="TimeEnd" onChange="CheckTime()">
						</div>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-md-6">
					<p>กำหนดเข้าร่วมขั้นต่ำกี่วัน</p>
					<div class="form-group">
						<input type="text" class="form-control" id="Day" name="Day" placeholder="กรุณากรอกจำนวนเข้าร่วมขั้นต่ำ" required
							pattern="0|[1-9]\d{0,2}">
						<input type="hidden" name="Difday" id="Difday">
					</div>
				</div>
			</div>
			<!-- <p>อาจารย์ผู้รับผิดชอบกิจกรรม</p>
			<input type="radio" checked="checked" name="Teacherr" value="In"> อาจารย์ภายในสาขา<br>
			<input type="radio" name="Teacherr" value="Out"> อาจารย์ท่านอื่น<br>

			<div class="TeacherRes mt-3" id="ShowTeacherRes">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">

							<select name="Teacher_res" id="Teacher_res" style="height: 35px;" required>
								<?php $this->db->where('Branch', $this->session->userdata('Branch'));
                                                                        $query = $this->db->get('Teacher');
                                                                        foreach($query->result_array() as $data)
                                                                        { ?>
								<option value="<?php echo $data['ID_Teacher']?>">อาจารย์
									<?php echo $data['Fname']." ".$data['Lname'] ?></option>
								<?php } ?>
							</select>

						</div>
					</div>
				</div>
			</div> -->

			<!-- <p>อาจารย์ที่ยืมเงิน</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					<input type="text" class="form-control" onChange="CheckBorrow()" id="Borrow" name="Borrow" placeholder="กรอกรหัสผู้ยืมเงิน" required>
					</div>
				</div>
			</div> -->

			<?php $this->db->where('Id_Users',$qq['Id_Users']);
				  $student = $this->db->get('student');
				  $showstudent = $student->row_array();
				  
				  $this->db->where('Id_Users',$qq['Id_Users']);
				  $teacher = $this->db->get('Teacher');
				  $showteacher = $teacher->row_array();
				   
				  $getTeacher = $qq['Id_Users'];

				 if($student->num_rows() == 0){
					$Branch = $showteacher['Branch'];
				 }else{
					$Branch = $showstudent['Branch'];
				 }  ?>
			<p>อาจารย์ที่ยืมเงิน</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="Borrow" id="Borrow" style="height: 35px;" required>
                                    <option value="" disabled selected>กรุณาเลือกรายชื่ออาจารย์ที่จะยืมเงิน</option>
                                        <?php
											// $type1 = $this->db->query("SELECT * FROM Teacher WHERE Teacher.Branch = $Branch AND Teacher.Loan = 0 AND Teacher.Id_Users != $getTeacher");
											$type1 = $this->db->query("SELECT * FROM Teacher WHERE Teacher.Branch = $Branch AND Teacher.Loan = 0");
                                            foreach($type1->result_array() as $dataT1)
                                            { ?>
                                        <option value="<?php echo $dataT1['Fname']." ".$dataT1['Lname'];?>">
                                            <?php echo "อาจารย์ ".$dataT1['Fname']." ".$dataT1['Lname'];?></option>
                                        <?php } ?>
                                    </select>


                                </div>
                            </div>
                        </div>

            <?php $this->db->where('Id_Project', $ID);
					$query4 = $this->db->get('Project');
					$data2 = $query4->row_array();

					$Show2 = (int)$data2['Money'];
					
					$query = $this->db->query("SELECT SUM(Budget) as Total FROM Activities WHERE Activities.Id_Project = $ID");
					$showdata = $query->row_array();

					$sum = (int)$showdata['Total'];
					$totalsum = $Show2 - $sum;?>

			<p>งบประมาณกิจกรรม</p> <p style="color:red"><?php echo ""."** "." จำนวนเงินที่ระบุได้จะต้องไม่เกิน ".number_format($totalsum, 2)." บาท"." **"?></p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" onChange="CheckMoneyProject()" id="Budget" name="Budget" placeholder="10000" required>
					</div>
				</div>
			</div>
			<p>รูปแบบการเข้าร่วมกิจกรรม
			</p>
			<?php
				$query = $this->db->get('TypeJoin');
				foreach($query->result_array() as $data)
				{ 
					if($data['Name_TypeJoin'] == 'เข้าร่วมแบบปิด'){
						$type = 'เข้าร่วมแบบกำหนดรายชื่อผู้เข้าร่วม';
					}else{
						$type = 'เข้าร่วมแบบไม่กำหนดรายชื่อผู้เข้าร่วม';
						}	?>

			<input type="radio" checked="checked" id="TypeJoin" name="TypeJoin"
				value="<?php echo $data['Id_TypeJoin'] ?>"><?php echo $type ?><br>
			<?php }
				?>
			<div class="mt-3">
				<p>จำนวนผู้เข้าร่วมกิจกรรม</p>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input type="number" class="form-control" id="Amount" name="Amount"
								placeholder="กรุณากรอกจำนวนผู้เข้าร่วม" required>
						</div>
					</div>
				</div>
			</div>
			<p>ประเภทคนที่สามารถเข้าร่วมได้</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="TypeUserJoinAc" id="TypeUserJoinAc" style="height: 35px;" required>
                                    <option value="" disabled selected>กรุณาเลือกประเภทคนที่สามารถเข้าร่วมได้</option>
                                        <?php
                                            $type2 = $this->db->query("SELECT * FROM TypeUserJoinAc");
                                            foreach($type2->result_array() as $dataT2)
                                            { ?>
                                        <option value="<?php echo $dataT2['ID_TypeUserJoinAc'];?>">
                                            <?php echo $dataT2['Name_TypeUserJoinAc'];?></option>
                                        <?php } ?>
                                    </select>


                                </div>
                            </div>
                        </div>
			<!-- <p>เอกสารกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="file" class="form-control" required id="image_file" name="userfile[]"
							accept=".pdf,.docx,.xlsx,.pptx">
					</div>
				</div>
				<input type="hidden" id="namefile" name="namefile">
			</div> -->

			<!-- <div id="progress" class="progress mb-4" style="height: 20px">
				<div id="progress-bar-fill" class="progress-bar-fill bg-primary " role="progressbar" style="width: 0%;"
					aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
			<p id="tt"></p> -->

			<button type="submit" id="submit" class="btn btn mt-5" onclick="return confirm('โปรดตรวจสอบข้อมูลที่กรอกก่อนกดปุ่มยืนยัน');"
				style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">ยืนยัน</button>

		</form>

	</div>
</div>


<!-- <script>
	function testtest() {
		var formData = new FormData($('#insertAc')[0]);

		$.ajax({
			xhr: function () {
				$("#progress").show();
				var xhr = new window.XMLHttpRequest();

				xhr.upload.addEventListener('progress', function (e) {

					if (e.lengthComputable) {

						console.log('Bytes Loaded: ' + e.loaded);
						console.log('Total Size: ' + e.total);
						console.log('Percentage Uploaded: ' + (e.loaded / e.total))

						var percent = Math.round((e.loaded / e.total) * 100);

						$('#progress-bar-fill').attr('aria-valuenow', percent).css('width', percent +
							'%');

						$('#tt').text('กำลังทำการอัปโหลด ' + percent + '%');
					}

				});

				return xhr;
			},

		});
	}

</script> -->
