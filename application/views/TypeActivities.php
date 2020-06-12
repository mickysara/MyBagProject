<div class="container" style="margin-bottom: 40px;">
	<div class="nav-wrapper">
		<ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
			<li class="nav-item">
				<a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
					href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
						class="ni ni-cloud-upload-96 mr-2"></i>เพิ่มประเภทกิจกรรมในเล่มโครงการ</a>
			</li>
            <li class="nav-item">
				<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
					href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
						class="ni ni-calendar-grid-58 mr-2"></i>เพิ่มประเภทกิจกรรมในสมุดกิจกรรม</a>
			</li>
			<li class="nav-item">
				<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
					href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i
						class="ni ni-bell-55 mr-2"></i>ผูกประเภทกิจกรรม</a>
			</li>
		</ul>
	</div>
	<div class="card shadow">
		<div class="card-body">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
					aria-labelledby="tabs-icons-text-1-tab">
					<form name="TypeFile" id="TypeFile" method="post"
                    action="<?php echo base_url('TypeActivities/InsertFile')?>">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<p>ชื่อประเภทกิจกรรมในเล่มโครงการ</p>
									<input type="text" class="form-control" id="exampleFormControlInput1"
										name="TypeFile" placeholder="...." required>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn " onclick="return confirm('โปรดตรวจสอบข้อมูลที่กรอกก่อนกดปุ่มยืนยัน');"
							style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">ยืนยัน</button>
					</form>
				</div>


				<div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
					aria-labelledby="tabs-icons-text-2-tab">
					<form name="Relation" id="Relation" method="post"
                    action="<?php echo base_url('TypeActivities/Relation')?>">
                    <p>ประเภทกิจกรรมในเล่มโครงการ</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="TypeFile" id="TypeFile" style="height: 35px;" required>
                                    <option value="" disabled selected>กรุณาเลือกประเภทกิจกรรมในสมุดกิจกรรม</option>
                                        <?php
                                            $type1 = $this->db->get('TypeActivitiesFile');
                                            foreach($type1->result_array() as $dataT1)
                                            { ?>
                                        <option value="<?php echo $dataT1['ID_TypeActivitiesFile']?>">
                                            <?php echo $dataT1['Name_TypeActivitiesFile']?></option>
                                        <?php } ?>
                                    </select>


                                </div>
                            </div>
                        </div>
                        <p>ประเภทกิจกรรมในสมุดกิจกรรม</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="TypeBook" id="TypeBook" style="height: 35px;" required>
                                    <option value="" disabled selected>กรุณาเลือกประเภทกิจกรรมในสมุดกิจกรรม</option>
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

						<button type="submit" class="btn btn "
							style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">ยืนยัน</button>
					</form>
				</div>

				<div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
					aria-labelledby="tabs-icons-text-3-tab">
					<form name="TypeBook" id="TypeBook" method="post"
                    action="<?php echo base_url('TypeActivities/InsertBook')?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <p>ชื่อประเภทกิจกรรมในเล่มสมุดกิจกรรม</p>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    name="TypeBook" placeholder="...." required>
                            </div>
                        </div>
					</div>

						<button type="submit" class="btn btn " onclick="return confirm('โปรดตรวจสอบข้อมูลที่กรอกก่อนกดปุ่มยืนยัน');"
							style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">ยืนยัน</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>
</div>
