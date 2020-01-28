<?php  
        $result = $this->db->query("SELECT *
        FROM Activities_Teacher 
        WHERE Status = 'รออนุมัติ'");
                                
                if($result->num_rows() == 0)
                {?>
<div class="container">
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">กิจกรรมที่รอการอนุมัติ</h2>
			<hr>
			<h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มีกิจกรรมที่รอการอนุมัติ</h2>
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
			<h2 class="" style="font-size: 30px;">กิจกรรมที่รอการอนุมัติ</h2>
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
								<h4 style="text-align: left;">สถานะ</h4>
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
							<th scope="row">
								<div class="media align-items-center">
									<a href="#" class="avatar rounded-circle mr-3">
										<i class="fa fa-bicycle"></i>
									</a>
									<div class="media-body">
										<span class="mb-0 text-sm">
											<p style="margin-bottom: 0px;"><?php echo $data['Name_Activities'];?></p>
										</span>
									</div>
								</div>
			</div>
			</th>
			<td>
				<span class="badge badge-dot mr-4">
					<p><?php 
                                                                                            $var_date = $data['DateSent'];
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
					<?php

                                                        // $this->db->where('Id_Student',$data['CreateBy']);
                                                        // $result3 = $this->db->get('student');
                                                        // $showdata = $result3->row_array();?>

					<p><?php echo $data['CreateBy'];?></p>
				</span>
			</td>
			<td>
				<span class="badge badge-dot mr-4">
					<p>
						<i class="bg-danger"></i>
						<?php echo $data['Status'];?>
					</p>
				</span>
			</td>
			<td>
				<span class="badge badge-dot mr-4">
					<button type="button" class="btn btn-dark" style="margin-bottom: 20px;" data-toggle="modal"
						data-target="#CheckData">
						ดูรายละเอียดเพิ่มเติม
					</button>
					<div class="modal fade" id="CheckData" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h2 class="modal-title" id="exampleModalLabel">รายละเอียดกิจกรรม</h2>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
                           
                                    <p>รายละเอียด : <?php echo $data['Detail'];?> </p>
                                    <p>ประเภทกิจกรรม : <?php echo $data['Type'];?></p>
                                    <p>วันเริ่มกิจกรรม : <?php echo date('d/m/Y', strtotime($data['DateStart']));?></p>
                                    <p>วันสิ้นสุดกิจกรรม : <?php echo date('d/m/Y', strtotime($data['DateEnd']));?></p>
                                    <p>เวลาเริ่มกิจกรรม : <?php echo $data['TimeStart'];?></p>
                                    <p>เวลาสิ้นสุดกิจกรรม :  <?php echo $data['TimeEnd'];?></p>

                                    <p>สถานะกิจกรรม :  <?php echo $data['Status'];?></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

								</div>
								</form>

							</div>
						</div>
					</div>
				</span>
			</td>
			</td>
			<td>
				<a href="<?php echo base_url('uploads/'. $data['Confirm_Doc']) ?>" class="btn btn mb-3 Doc"
					style="background-color: #1778F2; color: #fff;">เอกสารยืนยัน</a>
			</td>
			<td>
				<span class="badge badge-dot mr-4">
					<a href="<?php echo base_url('ApproveActivity/Approve/'.$data['ID_Activities_Teacher']) ?>" class="btn btn mb-3"
						style="background-color: #00a81f; color: #fff;">อนุมัติ</a>
				</span>
			</td>
			<td>
				<span class="badge badge-dot mr-4">
					<a href="<?php echo base_url('ApproveActivity/Eject/'.$data['ID_Activities_Teacher']) ?>" class="btn btn mb-3"
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
<?php
                
                
