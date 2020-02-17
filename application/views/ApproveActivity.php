<?php  
		$campus = $this->session->userdata('ID_Campus');
        $result = $this->db->query("SELECT * FROM `Project` 
		LEFT JOIN StatusProject
		ON Project.Status = StatusProject.ID_StatusProject
		LEFT JOIN Users
		ON Project.Id_Users = Users.ID_User
		LEFT JOIN student
		ON Users.ID_User = student.Id_Users
		WHERE Users.ID_Type = 1 AND Project.Status = 2 AND student.ID_Campus = $campus");
                                
                if($result->num_rows() == 0)
                {?>
<div class="container">
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">โครงการที่รอการอนุมัติ</h2>
			<hr>
			<h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มีโครงการที่รอการอนุมัติ</h2>
		</div>
	</div>
</div>
<?php 
                }else{
                ?>
<div class="container">
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">โครงการที่รอการอนุมัติ</h2>
			<hr>
			<div class="table-responsive">
				<table class="table align-items-center table-flush" id="Filesearch">
					<thead class="thead-light">
						<tr>
							<th scope="col">
								<h4>ชื่อกิจกรรม</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">วันที่แจ้ง</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">แจ้งโดย</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">งบประมาณกิจกรรม</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">รายละเอียด</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">เอกสารยืนยัน</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">อนุมัติ</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ไม่อนุมัติ</h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php         
                                foreach($result->result_array() as $data)
                                {?>
						<tr>
							<th scope="row" style="    padding: 8px 10px;
								padding-top: 0px;
								padding-right: 10px;
								padding-bottom: 13px;
								padding-left: 10px;">
								<div class="media align-items-center">
									<a href="#" class="avatar rounded-circle mr-3">
										<i class="fa fa-bicycle"></i>
									</a>
									<div class="media-body">
										<span class="mb-0 text-sm">
											<p style="margin-bottom: 0px;"><?php echo $data['NameProject'];?></p>
										</span>
									</div>
								</div>
			</div>
			</th>
			<td>
				<span class="badge badge-dot mr-4">
					<p><?php 
                                                                                            $var_date = $data['Date'];
                                                                                            $strDate = $var_date;
                                                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                                                            $strMonth= date("n",strtotime($strDate));
                                                                                            $strDay= date("j",strtotime($strDate));
                                                                                            $strH = date("H",strtotime($strDate));
                                                                                            $stri = date("i",strtotime($strDate));
                                                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                                            "พฤศจิกายน","ธันวาคม");
                                                                                            $strMonthThai=$strMonthCut[$strMonth];
                                                
                                                                                            echo $strDay." ".$strMonthThai." ".$strYear;
                                                                                        ?></p>
				</span>
			</td>
			<td>
				<span class="badge badge-dot mr-4">
					<p><?php echo $data['Fname'];?></p>
				</span>
			</td>
			<td>
				<span class="badge badge-dot mr-4">
					<p>
						<i class="bg-defalut"></i>
						<?php 
						$id= $data['Id_Project'];
						$query = $this->db->query("SELECT SUM(Budget)
												FROM Activities
												WHERE Activities.Id_Project = $id  ;");
						$qq = $query->row_array();
						 echo $qq['SUM(Budget)'];?>
					</p>
				</span>
			</td>
			<td>
					<button type="button" class="btn btn mb-3"
										style="background-color: #172b4d; color: #fff;"
										data-toggle="modal" data-target="#<?php echo $data['NameProject'];?>">
										รายละเอียด
									</button>
									<div class="modal fade"
									id="<?php echo $data['NameProject'];?>"
									tabindex="-1" role="dialog"
									aria-labelledby="<?php echo $data['NameProject'];?>"
									aria-hidden="true">

										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h2 class="modal-title" id="exampleModalLabel">รายละเอียดกิจกรรม
													<?php echo $data['NameProject'];?>
													</h2>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<div class="modal-body">
												 <?php $this->db->where('Id_Result',$data['Result']);
														$res = $this->db->get('Result');
														$resshow = $res->row_array();
														
														$this->db->where('Id_TypeProject',$data['Type']);
														$type = $this->db->get('TypeProject');
														$typeshow = $type->row_array();
														
														$this->db->where('ID_Campus',$data['Campus']);
														$cam = $this->db->get('Campus');
														$showcam = $cam->row_array();
														?>
												<p> ผลผลิต : <?php echo $resshow['Name_Result'];?> </p>
												<p> ประเภท : <?php echo $typeshow['Name_TypeProject'];?> </p>
												<p> วิทยาเขต : <?php echo $showcam['Name_Campus'];?> </p>
												<p> วันที่ : <?php echo $strDay." ".$strMonthThai." ".$strYear;?> </p>

                                                <div class="container">

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">
		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">กิจกรรมในโครงการ</h2>
			<hr>
			<div class="table-responsive">
				<table class="table align-items-center table-flush" id="Filesearch">
					<thead class="thead-light">
						<tr>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ชื่อกิจกรรม</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ดูข้อมูล</h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $this->db->where('Id_Project',$data['Id_Project']);
							  $showdata = $this->db->get('Activities');

                                            foreach ($showdata->result_array() as $r) { 
                          
                                            ?>
						<tr>
							
							<td>
								<span class="badge badge-dot mr-4">
									<p style="margin-bottom: 0px;"><?php echo $r['Name_Activities'];?></p>
								</span>
							</td>

                            <td>
								<span class="badge badge-dot mr-4">
									<a href="<?php echo site_url(); ?>inActivity/showdata/<?php echo $r['ID_Activities'];?>"
										class="btn btn-primary mb-3" >ตรวจสอบ</a>
								</span>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">ปิด</button>

												</div>
												</form>

											</div>
										</div>
									</div>
			</td>
			<td>
				<a href="<?php echo base_url('uploads/'. $data['File']) ?>" class="btn btn mb-3 Doc"
					style="background-color: #1778F2; color: #fff;">เอกสารยืนยัน</a>
			</td>
			<td>
				<span class="badge badge-dot mr-4">
					<a href="<?php echo base_url('ApproveActivity/Approve/'.$data['Id_Project']) ?>" class="btn btn mb-3"
						style="background-color: #00a81f; color: #fff;">อนุมัติ</a>
				</span>
			</td>
			<td>
				<span class="badge badge-dot mr-4">
					<a onclick="EjectProject(<?php echo $data['Id_Project'] ?>)" class="btn btn mb-3"
						style="background-color: #db0f2f; color: #fff;">ไม่อนุมัติ</a>
				</span>
			</td>
			</tr>
			<?php }
                                                    } ?>
			</tbody>
			</table>
		</div>
	</div>
</div>

                
                
