<div class="container">

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">
		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">ขออนุมัติเคลียร์เงิน</h2>
			<hr>
			<div class="table-responsive">
				<table class="table align-items-center table-flush" id="Filesearch">
					<thead class="thead-light">
						<tr>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ชื่อกิจกรรม</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">สถานะ</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ตรวจสอบข้อมูล</h4>
							</th>
							<!-- <th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">อนุมัติ</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ไม่อนุมัติ</h4>
							</th> -->
						</tr>
					</thead>
					<tbody>
						<?php
									$this->db->where('Status', '5');
									$showloan = $this->db->get('Activities');
									foreach($showloan->result_array() as $data)
									 { 
										$this->db->where('Id_StatusActivities', $data['Status']);
										$showloan = $this->db->get('StatusActivities');
										$showshow = $showloan->row_array();
                                            
                                            ?>
						<tr>
							
							<td>
								<span class="badge badge-dot mr-4">
									<p style="margin-bottom: 0px;"><?php echo $data['Name_Activities'];?></p>
								</span>
							</td>
							<?php if($data['Status'] == "7")
                                                { ?>

							<td>
							<?php 
							        ?>

								<span class="badge badge-dot mr-4">
									<p style="margin-bottom: 0px;"><i
											class="bg-success"></i><?php echo $showshow['Name_StatusActivities'];?></p>
								</span>
							</td>

							<?php }else if ($data['Status'] == "6")
                                                {?>
							<td>
								<span class="badge badge-dot mr-4">
									<p style="margin-bottom: 0px;"><i
											class="bg-danger"></i><?php echo $showshow['Name_StatusActivities'];?></p>
								</span>
							</td>
							<?php } else { ?>
							<td>
								<span class="badge badge-dot mr-4">
									<p style="margin-bottom: 0px;"><i class="bg-info"></i><?php echo $showshow['Name_StatusActivities'];?>
									</p>
								</span>
							</td>
							<?php }?>
                            <td>
								<span class="badge badge-dot mr-4">
									<a href="<?php echo site_url(); ?>Payloan/Showpayloan/<?php echo $data['ID_Activities'];?>"
										class="btn btn-primary mb-3" >ตรวจสอบ</a>
								</span>
							</td>
							<!-- <td>
								<span class="badge badge-dot mr-4">
									<a href="<?php echo site_url(); ?>Payloan/Approve/<?php echo $data['ID_Activities'];?>"
										class="btn btn mb-3" style="background-color: #00a81f; color: #fff;">อนุมัติ</a>
								</span>
							</td>
							<td>
								<span class="badge badge-dot mr-4">
									<a href="<?php echo site_url(); ?>Payloan/Eject/<?php echo $data['ID_Activities'];?>"
										class="btn btn mb-3"
										style="background-color: #db0f2f; color: #fff;">ไม่อนุมัติ</a>
								</span>
							</td> -->
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
