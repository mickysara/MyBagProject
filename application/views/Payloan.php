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
                                            if(isset($view_payloan) && is_array($view_payloan) && count($view_payloan)): $i=0;
                                            foreach ($view_payloan as $key => $data) { 

                                            
                                            ?>
						<tr>
							
							<td>
								<span class="badge badge-dot mr-4">
									<p style="margin-bottom: 0px;"><?php echo $data['Name_Activities'];?></p>
								</span>
							</td>
							<?php if($data['Status'] == "อนุมัติ")
                                                { ?>

							<td>
								<span class="badge badge-dot mr-4">
									<p style="margin-bottom: 0px;"><i
											class="bg-success"></i><?php echo $data['Status'];?></p>
								</span>
							</td>

							<?php }else if ($data['Status'] == "ไม่อนุมัติ")
                                                {?>
							<td>
								<span class="badge badge-dot mr-4">
									<p style="margin-bottom: 0px;"><i
											class="bg-danger"></i><?php echo $data['Status'];?></p>
								</span>
							</td>
							<?php } else { ?>
							<td>
								<span class="badge badge-dot mr-4">
									<p style="margin-bottom: 0px;"><i class="bg-info"></i><?php echo $data['Status'];?>
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
							<td>
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
							</td>
						</tr>
						<?php } endif; ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
