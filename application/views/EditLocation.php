<div class="container">

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">
		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">แก้ไขสถานที่จัดกิจกรรม</h2>
			<hr>
			<div class="table-responsive">
				<table class="table align-items-center table-flush" id="Filesearch">
					<thead class="thead-light">
						<tr>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ชื่อสถานที่</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ละติจูด</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ลองติจูด</h4>
							</th>
                            <th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">แก้ไข</h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
									$Eventlocation = $this->db->get('Eventlocation');
									foreach($Eventlocation->result_array() as $data)
									 { ?>
						<tr>
							
							<td>
								<span class="badge badge-dot mr-4">
									<p style="margin-bottom: 0px;"><?php echo $data['NameLocation'];?></p>
								</span>
							</td>
                            <td>
								<span class="badge badge-dot mr-4">
									<p style="margin-bottom: 0px;"><?php echo $data['Latitude'];?></p>
								</span>
							</td>
                            <td>
								<span class="badge badge-dot mr-4">
									<p style="margin-bottom: 0px;"><?php echo $data['Longtitude'];?></p>
								</span>
							</td>
                            <td>
                                <button type="button" class="btn btn"
                                style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;"
                                data-toggle="modal" data-target="#<?php echo $data['NameLocation'];?>">แก้ไข</button>
							</td>

                            <div class="modal fade" id="<?php echo $data['NameLocation'];?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $data['NameLocation'];?>"
							aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title" id="exampleModalLabel">แก้ไขสถานที่จัดกิจกรรม</h1>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>

									<div class="modal-body">
									<form action="<?php echo base_url('EditLocation/Edit/'.$data['Id_location'])?>"
										name="AddLoan_form" id="AddLoan_form" method="post" enctype='multipart/form-data'>
										<div class="row">
                                        <p>ชื่อสถานที่ :</p>
												<input type="text" class="form-control mt-3 mb-3 ml-2" id="Name" name="Name" value="<?php echo $data['NameLocation']?>">
                                        <p>ละติจูด :</p>
                                                <input type="text" class="form-control mt-3 mb-3 ml-2" id="latitude" name="latitude" value="<?php echo $data['Latitude']?>">
                                        <p>ลองติจูด :</p>
                                                <input type="text" class="form-control mt-3 mb-3 ml-2" id="longtitude" name="longtitude" value="<?php echo $data['Longtitude']?>">
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

						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
