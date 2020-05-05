<div class="container" style="margin-bottom: 30px;" id="ShowDeposit">

	<?php          
                    if(isset($InsertActivity) && is_array($InsertActivity) && count($InsertActivity)): $i=0;
                    foreach ($InsertActivity as $key => $InAc) {  
					} endif; 
                ?>
	<?php
		 $repostrnono = base_url(uri_string());
		$arraystate2 = (explode("/",$repostrnono));
		$idRepo = ($arraystate2[5]);

		$this->db->select('Type');
		$this->db->where('ID_Activities', $idRepo);
		$this->db->group_by('Type');
		
        $result = $this->db->get('Loan');
        
                        $moneyget = $this->db->query("SELECT sum(Money)
                                    as money
                                    FROM Loan
                                    WHERE ID_Activities = '$idRepo'");
                        $sumget =  $moneyget->row_array();

                        $intget = (int)$sumget['money'];;

                        $this->db->where('ID_Activities', $idRepo);
                        $showbudget = $this->db->get('Activities');
                        $showshowbg = $showbudget->row_array();
                        
						$showshowbgstring = (string)$showshowbg['Budget'];
						
						$calpayloan = $showshowbg['Budget'] - $intget;
						$showpayloan = (string)$calpayloan;
        ?>

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">ค่าใช้จ่ายภายในโครงการ </h2>
			<h2 style="font-size: 25px;"> งบประมาณกิจกรรม :
				<?php echo number_format($showshowbgstring, 2);?> บาท</h2>
			<h3 class="" style="font-size: 25px;">งบประมาณที่ยังไม่ได้ระบุค่าใช้จ่าย :
				<?php echo number_format($showpayloan, 2);?> บาท</h3>
			<h3 class="" style="font-size: 25px;">ค่าใช้จ่ายที่ระบุรวมทั้งหมด :
				<?php echo number_format($sumget['money'], 2);?> บาท</h3>

			<?php if($this->session->userdata('Department') == 'เจ้าหน้าที่การเงิน'){ ?>
			<a href="<?php echo site_url(); ?>Payloan/Approve/<?php echo $idRepo;?>" class="btn btn-success"
				style="margin-bottom: 20px;">อนุมัติ</a>


			<button type="button" class="btn btn-danger" style="margin-bottom: 20px;" data-toggle="modal"
				data-target="#EjectLoan">
				ไม่อนุมัติ
			</button>

			<div class="modal fade" id="EjectLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
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

								<textarea class="form-control form-control-alternative" rows="4" id="Detail"
									name="Detail" placeholder="Write a large text here ..." required></textarea>

								<input type="hidden" id="ID_Activities" name="ID_Activities"
									value="<?php echo $idRepo ?>">

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
		<?php }else{ ?>
		<a href="<?php echo site_url(); ?>Payloan/ChangeStatus/<?php echo $idRepo;?>"
			onclick="return confirm('ยังเหลืองบประมาณที่ยังไม่ได้ระบุค่าใช้จ่ายอยู่อีก <?php echo number_format($showpayloan, 2);?> บาท ต้องการดำเนินการต่อหรือไม่ ?');"
			class="btn btn" style="background-color: #db0f2f; color: #fff;">ขออนุมัติเคลียร์เงิน</a>
		<!-- <a href="<?php echo site_url(); ?>End/ShowAll/<?php echo $idRepo;?>" class="btn btn-primary">สรุปกิจกรรม</a> -->
		<?php }?>


		<div class="table-responsive">
			<table class="table align-items-center table-flush" id="Filetable">
				<thead class="thead-light">
					<tr>
						<th scope="col">
							<h2 style="text-align: center; font-weight:bold">รายการ</h2>
						</th>
						<th style="text-align:center;" scope="col">
							<h2 style="text-align: center; font-weight:bold">จำนวนเงิน (บาท)
							</h2>

						</th>
						<th style="text-align:center;" scope="col">
							<h2 style="text-align: center; font-weight:bold">จำนวนเงินที่ใช้</h2>

						</th>
						<th style="text-align:center;" scope="col">
							<h2 style="text-align: center; font-weight:bold">คงเหลือ</h2>

						</th>
						<?php if($this->session->userdata('Department') == 'เจ้าหน้าที่การเงิน'){ ?>

						<?php }else{ ?>
						<th style="text-align:center;" scope="col">
							<h2 style="text-align: center; font-weight:bold">แนบเอกสาร</h2>
							<?php }?>


						</th>
						<th style="text-align:center;" scope="col">
							<h2 style="text-align: center; font-weight:bold">ตรวจสอบเอกสาร</h2>

						</th>
					</tr>
				</thead>
				<tbody>
					<?php                 	$this->db->where('ID_Activities', $idRepo);
												$query = $this->db->get('Loan');
												
                                                foreach($result->result_array() as $data)
                                                {?>
					<tr>
						<th scope="row">
							<span class="mb-0 text-sm">
								<h2 style="margin-bottom: 0px; font-weight:bold ">
									<?php   $this->db->where('Id_TypeLoan',$data['Type']);
																		 $datashow = $this->db->get('TypeLoan');
																		$showshow = $datashow->row_array()?>
									<?php echo $showshow['Name_TypeLoan'];?></h2>
							</span>

						</th>
						<td>

							<?php 	$type = $data['Type'];
						 $moneyT = $this->db->query("SELECT SUM(Money) FROM Loan WHERE Type = '$type' and ID_Activities = $idRepo") ;
						 $moneyType = $moneyT->row_array();?>
							<h2 style="text-align: center; font-weight:bold">
								<?php echo number_format($moneyType['SUM(Money)'], 2);
															$i= $i+$moneyType['SUM(Money)'] ?></h2>
						</td>
						<td>
							<h2 style="text-align: center; font-weight:bold"></h2>
						</td>
						<td>
							<h2 style="text-align: center; font-weight:bold"></h2>
						</td>
						<td>
							<h2 style="text-align: center; font-weight:bold"></h2>
						</td>
						<td>
							<h2 style="text-align: center; font-weight:bold"></h2>
						</td>
					</tr>
					<?php foreach($query->result_array() as $datadetail)
						{ 
						if($data['Type'] == $datadetail['Type'])
						{?>
					<tr>
						<th scope="row">
							<span class="mb-0 text-sm">
								<p style="margin-left: 35px;"> -
									<?php echo $datadetail['Name_Loan'];?></p>
							</span>

						</th>
						<td>
							<p style="text-align: center;">
								<?php echo number_format($datadetail['Money'], 2) ?></p>
						</td>
						<td>
							<p style="text-align: center;">
								<?php echo number_format($datadetail['Money_Use'], 2) ?></p>
						</td>
						<td>
							<p style="text-align: center;">
								<?php echo number_format($datadetail['Sum'], 2) ?></p>
						</td>

						<?php if($this->session->userdata('Department') == 'เจ้าหน้าที่การเงิน'){
													}else{?>
						<td class="">

							<div>
								<?php if($datadetail['Type'] == 1 && $this->session->userdata('Id_Users') != '485'){ ?>
								<?php if($datadetail['Image'] == Null){ ?>
								<button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal"
									data-target="#<?php echo $datadetail['Name_Loan'];?>">แนบเอกสาร</button>
								<?php }else{ ?>
								<button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal"
									data-target="#<?php echo $datadetail['Name_Loan'];?>">แก้ไขเอกสาร</button>
								<?php }?>
								<?php }else if($datadetail['Type'] == 2 && $this->session->userdata('Id_Users') == '485'){
										?>
								<?php if($datadetail['Image'] == Null){ ?>
								<button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal"
									data-target="#<?php echo $datadetail['Name_Loan'];?>">แนบเอกสาร</button>
								<?php }else{ ?>
								<button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal"
									data-target="#<?php echo $datadetail['Name_Loan'];?>">แก้ไขเอกสาร</button>
								<?php }?>

								<?php }?>
								<div class="modal fade" id="<?php echo $datadetail['Name_Loan'];?>" tabindex="-1"
									role="dialog" aria-labelledby="<?php echo $datadetail['Name_Loan'];?>"
									aria-hidden="true">
									<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
										<div class="modal-content" style="color: #2d3436;">

											<div class="modal-header">
												<h2 class="modal-title" id="modal-title-default">
													แก้ไขข้อมูลค่าใช้จ่าย :
													<?php echo $datadetail['Name_Loan'];?>
												</h2>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<?php $showpayloanshow = (int)$showpayloan;
																			  $showMoney = (int)$datadetail['Money'];
																			  $calshowloan = $showpayloanshow + $showMoney;
																			  $showcal = (string)$calshowloan; ?>
											<div class="modal-body">
												<form
													action="<?php echo base_url('AddLoan/InsertMoneyUse/').$datadetail['ID_Loan']; ?>"
													name="AddLoan_form" id="AddLoan_form" method="post"
													enctype='multipart/form-data'>
													<p>รูปภาพหลักฐาน :</p>
													<div class="form-group">
														<input type="file" required id="image_file" name="userfile[]"
															accept=".png,.jpg,.jpeg">
														<input type="hidden" id="namefile" name="namefile">
													</div>
													<p>จำนวนเงิน :</p>
													<input type="text" class="form-control mt-3 mb-3 ml-2"
														id="Money_Use" name="Money_Use" placeholder="1000">


													<input type="hidden" id="<?php echo $datadetail['ID_Loan'];?>"
														name="ID_Loan" value="<?php echo $datadetail['ID_Loan'];?>">

											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary"
													data-dismiss="modal">ปิด</button>
												<button type="submit" class="btn btn-success">ยืนยัน</button>
											</div>
											</form>
										</div>
						</td>
						<?php }?>
						<?php if($datadetail['Image'] == Null){ ?>
						<td>
							<h2 style="text-align: center; font-weight:bold"></h2>
						</td>
						<?php }else{ ?>
						<td>
							<span class="badge badge-dot mr-4">
								<a href="<?php echo base_url("slipclear/". $datadetail['Image']) ?>"
									class="btn btn mb-3 Doc"
									style="background-color: #1778F2; color: #fff;">หลักฐานการโอนเงิน</a>
							</span>
						</td>
						<?php }?>


					</tr>
					<?php }
				  } ?>
					<?php } 
                                         ?>

					<tr>
						<?php $moneyget2 = $this->db->query("SELECT sum(Money_Use)
                                    as moneyuse
                                    FROM Loan
                                    WHERE ID_Activities = '$idRepo'");
                        $sumget2 =  $moneyget2->row_array();
                        
                        $moneyget3 = $this->db->query("SELECT sum(Sum)
                                    as sumsum
                                    FROM Loan
                                    WHERE ID_Activities = '$idRepo'");
                        $sumget3 =  $moneyget3->row_array();?>


						<td>
							<h2 style="text-align: center; font-weight:bold">ยอดรวม</h2>
						</td>
						<td>
							<h2 style="text-align: center; font-weight:bold"><?php echo number_format($i, 2);?></h2>
						</td>
						<td>
							<h2 style="text-align: center; font-weight:bold">
								<?php echo number_format($sumget2['moneyuse'], 2);?></h2>
						</td>
						<td>
							<h2 style="text-align: center; font-weight:bold">
								<?php echo number_format($sumget3['sumsum'], 2);?></h2>
						</td>

					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
