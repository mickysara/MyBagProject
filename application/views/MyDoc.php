<div class="container">
	<?php $this->db->where('Id_Employee', $this->session->userdata('ID'));
                                $queryuser2 = $this->db->get('Employee');
                                $showdata2 = $queryuser2->row_array();

                                $this->db->where('Id_Users',$this->session->userdata('Id_Users'));
      $Users = $this->db->get('Position_Emp');
	  $showusers = $Users->row_array();
                                ?>
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">
		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">โครงการที่รับผิดชอบ</h2>
			<hr>
			<div class="table-responsive">
				<!-- <?php if($showusers['Name_Position'] == 'แผนกงบประมาณ'){ ?>
				<a href="<?php echo site_url(); ?>Project" class="btn btn mb-3"
					style="background-color: #00a81f; color: #fff;">ขออนุมัติจัดโครงการ</a>
				<?php }else{ ?>
				<?php }?> -->
				<table class="table align-items-center table-flush" id="Filesearch">
					<thead class="thead-light">
						<tr>
							<th scope="col">
								<h4>ชื่อโครงการ</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ดูกิจกรรมในโครงการ</h4>
							</th>
							<?php if($showusers['Name_Position'] == 'แผนกงบประมาณ'){ ?>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">แก้ไขโครงการ</h4>
							</th>
							<?php }else{ ?>
							<!-- <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ปรับแผน</h4></th> -->
							<?php }?>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">สถานะโครงการ</h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
                                            if(isset($view_data) && is_array($view_data) && count($view_data)): $i=0;
                                            foreach ($view_data as $key => $data) { 
                                              

                                            ?>
						<tr>
							<th scope="row">
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
							</th>
							<td>
								<span class="badge badge-dot mr-4">
									<a href="<?php echo base_url("ShowInProject/Show/").$data['Id_Project']?>"
										class="btn btn"
										style="background-color: #172b4d; color: #fff;">ดูกิจกรรมในโครงการ</a>
								</span>
							</td>

							<?php if($showusers['Name_Position'] == 'แผนกงบประมาณ'){ ?>
							<td>
								<span class="badge badge-dot mr-4">
									<a href="<?php echo base_url("EditProject/Edit/").$data['Id_Project']?>"
										class="btn btn" style="background-color: #edb321; color: #fff;">แก้ไขโครงการ</a>
									<!-- <a href="<?php echo base_url("ChangePlan/showdata/").$data['Id_Project']?>" class="btn btn" style="background-color: #edb321; color: #fff;">ปรับแผน</a> -->
								</span>
							</td>
							<?php }else{ ?>
							<?php }?>
							<?php $this->db->where('ID_StatusProject',$data['ID_StatusProject']);
                                                $ShowSta = $this->db->get('StatusProject');
                                                $showstatus = $ShowSta->row_array();?>
							<td>
								<div class="media-body">
									<span class="badge badge-dot mr-4">
										<p style="margin-bottom: 0px;"><?php echo $showstatus['Name_StatusProject'];?>
										</p>
									</span>
								</div>
							</td>

							<?php   $this->db->where('Id_Project', $data['Id_Project']);
                                                        $query = $this->db->get('Activities',1);
                                                ?>
						</tr>
						<?php } endif; ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
