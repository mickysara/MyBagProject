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
			<h2 class="" style="font-size: 30px;">อนุมัติการเคลียร์เงิน</h2>
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

            <a href="<?php echo site_url(); ?>Payloan/Approve/<?php echo $idRepo;?>" class="btn btn-success"
				style="margin-bottom: 20px;">อนุมัติ</a>


				<button type="button" class="btn btn-danger" style="margin-bottom: 20px;" data-toggle="modal"
										data-target="#EjectLoan">
										ไม่อนุมัติ
				</button>

				<div class="modal fade" id="EjectLoan" tabindex="-1" role="dialog"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h2 class="modal-title" id="exampleModalLabel">ระบุหมายเหตุไม่อนุมัติการเคลียร์เงิน</h2>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<div class="modal-body">
													<form action="<?php echo base_url('Payloan/Eject/').$idRepo; ?>" name="InsertLoan_form"
														id="InsertLoan_form" method="post">

														<textarea class="form-control form-control-alternative" rows="4" id="Detail" name="Detail"  placeholder="Write a large text here ..." required></textarea>

														<input type="hidden" id="ID_Activities" name="ID_Activities" value="<?php echo $idRepo ?>">

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
													<button type="submit" class="btn btn-success">ยืนยัน</button>
												</div>
												</form>

											</div>
										</div>
									</div>
								</div>
								

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
			</tr>
			<?php }
                                                    } ?>
			</tbody>
			</table>
		</div>
	</div>
</div>
<?php
                
                
