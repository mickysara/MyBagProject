<div class="container">
	<form id="ChangePlanForm" name="ChangePlanForm" method="post" action="<?php echo base_url("ChangePlan/Create") ?>" enctype='multipart/form-data'>
		<div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px;margin-left: auto; margin-bottom: 50px;
    margin-right: auto; border: 1px solid #D8D9DC;">
			<div class="header" style="margin-bottom: 20px;">
				<img src="" alt="">
				<h2 style="">ปรับแผน</h2>
				<hr>
			</div>

			<div class="Login">
				<div class="row">
					<div class="col-md-8">
						<p>เลือกกิจกรรมที่ต้องการปรับแผน</p>
						<div class="form-group">
							<select id="Activities" onChange="Activity_Change()" name="Activities">
                            <option selected="true" disabled="disabled">กรุณาเลือกกิจกรรม</option>
								<?php $this->db->where('Id_Project', $ID);
                                      $query = $this->db->get('Activities');

                                      foreach ($query->result_array() as $data)
                                      { ?>
								<option value="<?php echo $data['ID_Activities'] ?>">
									<?php echo $data['Name_Activities'] ?></option>
								<?php }
                                      
                                 ?>
							</select>
						</div>
					</div>
				</div>
                <div id="ShowData">
                <div class="row">
						<div class="col-md-6">
							<p>วันที่เริ่มจากเดิม</p>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-alternative"  placeholder="" disabled>
                            </div>
						</div>
						<div class="col-md-6">
							<p>เวลาเริ่มจากเดิม</p>
                            <div class="form-group">
                                <input type="email" style="max-width:166px;" class="form-control form-control-alternative"  placeholder="" disabled>
                            </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p>วันที่สิ้นสุดจากเดิม</p>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-alternative"  placeholder="" disabled>
                            </div>
						</div>
						<div class="col-md-6">
							<p>เวลาสิ้นสุดจากเดิม</p>
                            <div class="form-group">
                                <input type="email" style="max-width:166px;" class="form-control form-control-alternative"  placeholder="" disabled>
                            </div>
						</div>
					</div>
				</div>
                </div>
                <hr>
                <div>
                <input type="hidden" name="id" id="id" value="">
					<div class="row">
						<div class="col-md-6">
							<p>วันที่เริ่มเปลี่ยนแปลง</p>
							<div class="form-group focused">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
									</div>
									<input class="form-control datepicker" id="DateStart" name="DateStart" required=""
										placeholder="Select date" type="text" value="กรุณาเลืิอกวันที่เริ่มกิจกรรมใหม่" >
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<p>เวลาเริ่มเปลี่ยนแปลง</p>
							<div class="form-group">
								<input class="timepicker text-center" jt-timepicker="" time="model.time"
									time-string="model.timeString" default-time="model.options.defaultTime"
									time-format="model.options.timeFormat" start-time="model.options.startTime"
									min-time="model.options.minTime" max-time="model.options.maxTime"
									interval="model.options.interval" dynamic="model.options.dynamic"
									scrollbar="model.options.scrollbar" dropdown="model.options.dropdown"
									name="TimeStart" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p>วันที่สิ้นสุดเปลี่ยนแปลง</p>
							<div class="form-group focused">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
									</div>
									<input class="form-control datepicker" id="DateStart" name="DateEnd" required=""
										placeholder="Select date" type="text" value="กรุณาเลืิอกวันที่สิ้นสุดกิจกรรมใหม่" >
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<p>เวลาสิ้นสุดเปลี่ยนแปลง</p>
							<div class="form-group">
								<input class="timepicker text-center" jt-timepicker="" time="model.time"
									time-string="model.timeString" default-time="model.options.defaultTime"
									time-format="model.options.timeFormat" start-time="model.options.startTime"
									min-time="model.options.minTime" max-time="model.options.maxTime"
									interval="model.options.interval" dynamic="model.options.dynamic"
									scrollbar="model.options.scrollbar" dropdown="model.options.dropdown"
									name="TimeEnd">
							</div>
						</div>
                        <div class="col-md-8">
							<p>ใบขออนุญาติปรับแผน</p>
							<div class="form-group">
                                <input type="file" name="File" id="File">
							</div>
						</div>
					</div>
                    
				</div>
                
				<div class="Footer">
					<button type="submit" id="submit" name="submit" class="btn btn "
						style="margin-top: 20px; margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">ยืนยัน</button>
				</div>
			</div>
	</form>
</div>
