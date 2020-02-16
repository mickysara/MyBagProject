<?php  
        $repostrnono = base_url(uri_string());
        $arraystate2 = (explode("/",$repostrnono));
        $idRepo = ($arraystate2[6]);

        $result = $this->db->query("SELECT *
        FROM Slip 
        WHERE ID_Activities = $idRepo");
                                
                if($result->num_rows() == 0)
                {?>
<div class="container">
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">ขออนุมัติการเคลียร์เงิน</h2>
            <button type="button" class="btn btn"
                style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal"
                data-target="#AddSlipdd">
                เพิ่มสลิป
            </button>

			<div class="modal fade" id="AddSlipdd" tabindex="-1" role="dialog"
									aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h2 class="modal-title" id="exampleModalLabel">เพิ่มสลิป</h2>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body">
                                            <form action="<?php echo base_url('Payloan/UploadSlip_Loan/').$idRepo; ?>" name="UpSlip_form"
														id="UpSlip_form" method="post" enctype='multipart/form-data'>
                                             <div class="row">
                                                <div class="col-md-8">
                                                <p>เลือกรูปภาพสลิปของท่าน</p>
                                                    <div class="form-group">
                                                    <input type="file" required id="image_file" name="userfile[]" accept=".png,.jpg,.jpeg" >
                                                <input type="hidden" id="namefile" name="namefile">
                                                </div>
                                                </div>
                                            </div>
												
											</div>
											<div class="modal-footer">
                                            <button type="submit" class="btn btn-success">ยืนยัน</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

											</div>
											</form>

										</div>
									</div>
								</div>
			<hr>
			<h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มีสลิปที่อัปโหลดในระบบ</h2>
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
			<h2 class="" style="font-size: 30px;">ขออนุมัติการเคลียร์เงิน</h2>
            <button type="button" class="btn btn"
                style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal"
                data-target="#AddSlip">
                เพิ่มสลิป
            </button>

            <div class="modal fade" id="AddSlip" tabindex="-1" role="dialog"
									aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h2 class="modal-title" id="exampleModalLabel">เพิ่มสลิป</h2>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body">
                                            <form action="<?php echo base_url('Payloan/UploadSlip_Loan/').$idRepo; ?>" name="UpSlip_form"
														id="UpSlip_form" method="post" enctype='multipart/form-data'>
                                             <div class="row">
                                                <div class="col-md-8">
                                                <p>เลือกรูปภาพสลิปของท่าน</p>
                                                    <div class="form-group">
                                                    <input type="file" required id="image_file" name="userfile[]" accept=".png,.jpg,.jpeg" >
                                                <input type="hidden" id="namefile" name="namefile">
                                                </div>
                                                </div>
                                            </div>
												
											</div>
											<div class="modal-footer">
                                            <button type="submit" class="btn btn-success">ยืนยัน</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

											</div>
											</form>

										</div>
									</div>
								</div>

            <a href="<?php echo site_url(); ?>Payloan/ChangeStatus/<?php echo $idRepo;?>" class="btn btn"
				style="margin-bottom: 20px; background-color: #db0f2f; color: #fff;">ขออนุมัติเคลียร์เงิน</a>
			<hr>
			<div class="table-responsive">
				<table class="table align-items-center table-flush" id="Filesearch">
					<thead class="thead-light">
						<tr>
							<th scope="col">
								<h4>สลิป</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ดูข้อมูลสลิป</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ลบสลิป</h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php         
                                       
                                                        foreach($result->result_array() as $data)
                                                        {?>
						<tr>
							<th scope="row">
								<div class="media align-items-center">
									<a href="#" class="avatar rounded-circle mr-3">
										<i class="fa fa-bicycle"></i>
									</a>
									<div class="media-body">
										<span class="mb-0 text-sm">
											<p style="margin-bottom: 0px;"><?php echo $data['Image'];?></p>
										</span>
									</div>
								</div>
			</div>
			</th>
			</td>
			<td>
				<a href="<?php echo base_url('slip/'. $data['Image']) ?>" class="btn btn mb-3 Doc"
					style="background-color: #1778F2; color: #fff;">ดูสลิป</a>
			</td>
			<td>
				<span class="badge badge-dot mr-4">
					<a href="<?php echo base_url('Payloan/Deleteslip/'.$data['ID_Slip']) ?>" class="btn btn-danger mb-3">ลบสลิป</a>
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
<?php
                
                
