<div class="container">
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; margin-bottom: 20px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #fff;     
                border: 1px solid #D8D9DC;
                ">

		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <?php $repostrnono = base_url(uri_string());
             $arraystate2 = (explode("/",$repostrnono));
             $idRepo = ($arraystate2[6]);?>
			 
		<form method="post" action="<?php echo site_url('InsertActivity/EditAc/'.$idRepo)?>"  enctype='multipart/form-data'>
		<!-- <form method="post" id="editAc" enctype='multipart/form-data'> -->
        <?php 
             
             $this->db->where('ID_Activities',$idRepo);
             $eieiei = $this->db->get('Activities');
             $showw = $eieiei->result_array();
             foreach($showw as $showw2)
            {
             ?>
			<h2 style="font-weight: 0px;">แก้ไขข้อมูลกิจกรรม</h2>
			<hr>
			<p>ชื่อกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Name" name="Name" required
                        value = "<?php echo $showw2['Name_Activities']?>">
					</div>
				</div>
			</div>
			<p>รายละเอียดกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<textarea class="form-control" id="Detail" name="Detail" rows="3" required><?php echo $showw2['Detail']?></textarea>
					</div>
				</div>
			</div>
			<p>ประเภทกิจกรรม</p>
			<?php  
			 	$this->db->where('Id_TypeActivity',$showw2['Type']);
             	$datatypeac = $this->db->get('TypeActivities');
			 	$showtypeac = $datatypeac->row_array();
			 ?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<select name="Type" id="Type" style="height: 35px;" required>
                            <option value="<?php echo $showw2['Type']?>"><?php echo $showtypeac['Name_TypeActivity']?></option>
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

			<?php 
                  $NewDateStart = date('m/d/Y',strtotime($showw2['DateStart']));?>
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
								placeholder="Select date" type="text" value="<?php echo $NewDateStart ?>">
						</div>
					</div>
				</div>
				<div class="col-md-6">
                    <?php 
                $arraystate2 = (explode(":",$showw2['TimeStart']));
                $idtm = ($arraystate2[0]);
                $idtmm = ($arraystate2[2]);?>
				<p>เวลาเริ่ม</p>
					<div class="form-group">
						<input class="timepicker text-center" jt-timepicker="" time="model.time"
							time-string="model.timeString" default-time="model.options.defaultTime"
							time-format="model.options.timeFormat" start-time="model.options.startTime"
							min-time="model.options.minTime" max-time="model.options.maxTime"
							interval="model.options.interval" dynamic="model.options.dynamic"
							scrollbar="model.options.scrollbar" dropdown="model.options.dropdown" name="TimeStart" >
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
								<?php $NewDateEnd = date('m/d/Y',strtotime($showw2['DateEnd']));?>
								<?php 
								
                                        $end = date('m/d/Y', strtotime('+543 years')); ?>
								<input class="form-control datepicker" id="DateEnd" name="DateEnd" required
									placeholder="Select date" type="text" value="<?php echo $NewDateEnd ?>">
							</div>
						</div>
					</div>
					<div class="col-md-6">
					<?php 
						$arraystate20 = (explode(":",$showw2['TimeEnd']));
						$idte = ($arraystate20[0]);
						$idtee = ($arraystate20[2]);?>
					<p>เวลาสิ้นสุด</p>
						<div class="form-group">
						<input class="timepicker text-center" jt-timepicker="" time="model.time"
							time-string="model.timeString" default-time="model.options.defaultTime"
							time-format="model.options.timeFormat" start-time="model.options.startTime"
							min-time="model.options.minTime" max-time="model.options.maxTime"
							interval="model.options.interval" dynamic="model.options.dynamic"
							scrollbar="model.options.scrollbar" dropdown="model.options.dropdown" name="TimeEnd">
						</div>
					</div>
				</div>
			</div>

	
				<div class="row">
					<div class="col-md-6">
					<p>กำหนดเข้าร่วมขั้นต่ำกี่วัน</p>
						<div class="form-group">
						<input type="number" class="form-control" id="Day"
								 name="Day" value = "<?php echo $showw2['AmountJoin']?>" required>
						<input type="hidden" name="Difday" id="Difday">
						</div>
					</div>
				</div>

			<?php $this->db->where('Id_Users',$showw2['Borrow']);
				  $datateacher = $this->db->get('Teacher');
				  $showteacher = $datateacher->row_array();?>
			<p>อาจารย์ที่ยืมเงิน</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					<input type="text" value = "<?php echo $showteacher['Fname']." ".$showteacher['Lname']?>"class="form-control" id="Borrow" name="Borrow" disabled required>
					</div>
				</div>
			</div>

			<p>งบประมาณกิจกรรม</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Budget" name="Budget" value="<?php echo $showw2['Budget'] ?>" required>
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
				value="<?php echo $data['Id_TypeJoin'] ?>"> <?php echo $type ?><br>
			<?php }
				?>
			<div class="mt-3">
				<p>จำนวนผู้เข้าร่วมกิจกรรม</p>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input type="number" class="form-control" id="Amount" name="Amount"
								value="<?php echo $showw2['Amount']?>" required>
						</div>
					</div>
				</div>
			</div>

			<input type="hidden" name="Status" id="Status" value = "<?php echo $showw2['Status']?>">

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
          <?php }?>
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
