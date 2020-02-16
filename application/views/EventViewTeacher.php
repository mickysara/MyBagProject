<div class="container">
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; margin-bottom: 20px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #fff;     
                border: 1px solid #D8D9DC;
                box-shadow: 0px 10px 30px -10px #aaa;">

		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<?php $repostrnono = base_url(uri_string());
             $arraystate2 = (explode("/",$repostrnono));
             $idRepo = ($arraystate2[6]);?>
		<!-- <form method="post" action="<?php echo site_url('InsertActivity/InsertAcTeacher/'.$idRepo)?>" id = "idsertAcTeacher" enctype='multipart/form-data'> -->
		<form method="post" id="insertAcTeacher"  enctype='multipart/form-data'>
			<h2 style="font-weight: 0px;">ขออนุมัติการจัดกิจกรรม</h2>
			<hr>
			<p>ชื่อกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Name" name="Name"
							placeholder="กิจกรรมกระชับความสัมพันธ์ในสาขา">
					</div>
				</div>
			</div>
			<p>รายละเอียดกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<textarea class="form-control" id="Detail" name="Detail" rows="3"
							placeholder="กิจกรรมนี้เกียวข้องกับ....."></textarea>
					</div>
				</div>
			</div>
			<p>ประเภทกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					<select name="Type" id="Type" style="height: 35px;" required>
						<?php
								$type = $this->db->get('TypeActivities');
								foreach($type->result_array() as $dataT)
								{ ?>
								<option value="<?php echo $dataT['Id_TypeActivity']?>">
									<?php echo $dataT['Name_TypeActivity']?></option>
								<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<p>วิทยาเขต</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<select name="Campus" id="Campus" style="height: 35px;" required>
						<?php
								$type = $this->db->get('Campus');
								foreach($type->result_array() as $dataT)
								{ ?>
								<option value="<?php echo $dataT['ID_Campus']?>">
									<?php echo $dataT['Name_Campus']?></option>
								<?php } ?>
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
							<input class="form-control datepicker" id="DateStart" name="DateStart"
								placeholder="Select date" type="text" value="<?php echo $end ?>">
						</div>
					</div>
				</div>
				<div class="col-md-6">
				<p>เวลา</p>
					<div class="form-group">
						<input type="text" class="form-control" id="TimeStart" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"
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
								<input class="form-control datepicker" id="DateEnd" name="DateEnd"
									placeholder="Select date" type="text" value="<?php echo $end ?>">
							</div>
						</div>
					</div>
					<div class="col-md-6">
					<p>เวลา</p>
						<div class="form-group">
							<input type="text" class="form-control" id="TimeEnd"
								pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" name="TimeEnd" placeholder="18:00">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
					<div class="col-md-6">
					<p>กำหนดเข้าร่วมขั้นต่ำกี่วัน</p>
						<div class="form-group">
						<input type="number" class="form-control" id="Day"
								 name="Day" placeholder="1" required>
						<input type="hidden" name="Difday" id="Difday">
						</div>
					</div>
				</div>
				
			<p>งบประมาณกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Budget" name="Budget" placeholder="10000">
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
			</div>

			<div id="progress" class="progress mb-4" style="height: 20px">
				<div id="progress-bar-fill" class="progress-bar-fill bg-primary " role="progressbar" style="width: 0%;"
					aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
			<p id="tt"></p> -->

			<button type="submit" class="btn btn "
				style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">ยืนยัน</button>

		</form>

	</div>
</div>


<script>
	function testtest() {
		var formData = new FormData($('#insertAcTeacher')[0]);

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

</script>
