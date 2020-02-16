<div class="container">
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; margin-bottom: 20px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #fff;     
                border: 1px solid #D8D9DC;
                ">

		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!-- <form method="post" action="<?php echo site_url('InsertActivity/InsertAc')?>"  enctype='multipart/form-data'> -->
		<form method="post" id="insertAc"  enctype='multipart/form-data'>
		<?php 		$this->db->where('Id_Project', $ID);
				$query = 	$this->db->get('Project', 1);

				$qq = $query->row_array();
		
		 ?>
		<input type="hidden" name="ID" id="ID" value="<?php echo $ID ?>">
		<input type="hidden" name="Campus" id="Campus" value="<?php echo $qq['Campus'] ?>">
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
			<p>ประเภทกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<select name="Type" id="Type" style="height: 35px;" required>
							<option value="ด้านกีฬา">ด้านกีฬา</option>
							<option value="ด้านพัฒนาสังคมและบำเพ็ญประโยชน์">ด้านพัฒนาสังคมและบำเพ็ญประโยชน์</option>
							<option value="ด้านวิชาการ">ด้านวิชาการ</option>
							<option value="ด้านนักศึกษาสัมพันธ์">ด้านนักศึกษาสัมพันธ์</option>
							<option value="ด้านศิลปะและวัฒนธรรม">ด้านศิลปะและวัฒนธรรม</option>
							<option value="กิจกรรมเสริมสร้างจิตสำนึก">กิจกรรมเสริมสร้างจิตสำนึก</option>
							<option value="กิจกรรมเสริมสร้างทักษะ">กิจกรรมเสริมสร้างทักษะ</option>
							<option value="กิจกรรมเสริมสร้างความภาคภูมิใจ">กิจกรรมเสริมสร้างความภาคภูมิใจ</option>
							<option value="กิจกรรมเสริมสร้างความเข้าใจ">กิจกรรมเสริมสร้างความเข้าใจ</option>
							<option value="กิจกรรมเสริมสร้างและพัฒนาสุขภาพ">กิจกรรมเสริมสร้างและพัฒนาสุขภาพ</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
				<p>วันที่เริ่ม</p>
					<div class="form-group">
						<div class="input-group input-group-alternative">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							</div>
							<?php 
                                        $end = date('m/d/Y', strtotime('+543 years')); ?>
							<input class="form-control datepicker" id="DateStart" name="DateStart" required
								placeholder="Select date" type="text" value="<?php echo $end ?>">
						</div>
					</div>
				</div>
				<div class="col-md-6">
				<p>เวลา</p>
					<div class="form-group">
						<input type="text" class="form-control" id="TimeStart" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" required
							name="TimeStart" placeholder="07:00">
					</div>
				</div>
			</div>

			<div id="ShowTime">
				<div class="row">
					<div class="col-md-6">
					<p>วันที่สิ้นสุด</p>
						<div class="form-group">
							<div class="input-group input-group-alternative">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
								</div>
								<?php 
                                        $end = date('m/d/Y', strtotime('+543 years')); ?>
								<input class="form-control datepicker" id="DateEnd" name="DateEnd" required
									placeholder="Select date" type="text" value="<?php echo $end ?>">
							</div>
						</div>
					</div>
					<div class="col-md-6">
					<p>เวลา</p>
						<div class="form-group">
							<input type="text" class="form-control" id="TimeEnd" required
								pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" name="TimeEnd" placeholder="18:00">
						</div>
					</div>
				</div>
			</div>

	
				<div class="row">
					<div class="col-md-6">
					<p>กำหนดเข้าร่วมขั้นต่ำกี่วัน</p>
						<div class="form-group">
						<input type="text" class="form-control" id="Day"
								 name="Day" placeholder="1" required pattern="0|[1-9]\d{0,2}">
						<input type="hidden" name="Difday" id="Difday">
						</div>
					</div>
				</div>

			<p>ผู้รับผิดชอบกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Student_res" name="Student_res"
							placeholder="<?php echo $this->session->userdata('Fname')." ".$this->session->userdata('Lname') ?>"
							readonly>
					</div>
				</div>
			</div>


			<p>อาจารย์ผู้รับผิดชอบกิจกรรม</p>
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
			</div>


			<p>งบประมาณกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Budget" name="Budget" placeholder="10000" required>
					</div>
				</div>
			</div>



			<!-- <p>เอกสารยืนยันการอนุมัติกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="file" class="form-control" required id="image_file" name="userfile[]"
							accept=".pdf">
					</div>
				</div>
				<input type="hidden" id="namefile" name="namefile">
			</div> -->

			<!-- <div id="progress" class="progress mb-4" style="height: 20px">
				<div id="progress-bar-fill" class="progress-bar-fill bg-primary " role="progressbar" style="width: 0%;"
					aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
			<p id="tt"></p> -->

			<button type="submit" id="submit" class="btn btn "
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
