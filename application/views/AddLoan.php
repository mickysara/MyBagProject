<div class="container">
<?php          
                    if(isset($InsertActivity) && is_array($InsertActivity) && count($InsertActivity)): $i=0;
                    foreach ($InsertActivity as $key => $InAc) {  
					} endif; 
                ?>

				

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; margin-bottom: 20px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #fff;     
                border: 1px solid #D8D9DC;
                box-shadow: 0px 10px 30px -10px #aaa;">

		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<?php $repostrnono = base_url(uri_string());
             $arraystate2 = (explode("/",$repostrnono));
             $idRepo = ($arraystate2[5]);?>


			 <?php $this->db->select('Type');
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
		
		$this->db->where('Id_Project', $InAc['Id_Project']);
						$cvcv = $this->db->get('Project');
						$ccvv = $cvcv->row_array();?>


		<form method="post" action="<?php echo site_url('AddLoan/AddData/'.$idRepo)?>" enctype='multipart/form-data'>
			<h2 style="font-weight: 0px;">เพิ่มข้อมูลค่าใช้จ่ายในกิจกรรม   <?php echo '"'.$InAc['Name_Activities'].'"'?></h2>
			<hr>
			<p>ประเภทรายการ</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<select name="Type" id="Type" style="height: 35px;" required>
							<option value="">เลือกประเภทรายการ</option>
							<?php
								$type = $this->db->get('TypeLoan');
								foreach($type->result_array() as $dataT)
								{ ?>
							<option value="<?php echo $dataT['Id_TypeLoan']?>">
								<?php echo $dataT['Name_TypeLoan']?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<p>ชื่อรายการ</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Name" name="Name" placeholder="อาหารกลางวัน 17x15 "
							required>
					</div>
				</div>
			</div>

			<p>จำนวนเงิน</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="number" class="form-control" min = "0" max = "<?php echo $showpayloan;?>" id="Money" name="Money" placeholder="10000" required>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" style="max-width: 300px; min-width: 200px;">ยืนยัน</button>
            <?php if($showpayloan == 0){ ?>
				<a href="<?php echo site_url(); ?>InActivity/Showdata/<?php echo $idRepo;?>"
				class="btn btn-primary">ไปหน้ากิจกรรม</a>
			  <?php	}else{ ?>
				<button type="button" class="btn btn-primary"data-toggle="modal" data-target="#AlertMoney">ไปหน้ากิจกรรม</button>
				<?php }?>
		</form>
		<div class="modal fade" id="AlertMoney" tabindex="-1" role="dialog"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title" id="exampleModalLabel">
														คำเตือน</h1>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<div class="modal-body">

													<h1 style="text-align: center;">ไม่สามารถไปหน้ากิจกรรมได้</h1>
													<h2 style="text-align: center;">เนื่องจากจำนวนเงินโครงการที่ยังไม่ระบุค่าใช้จ่ายเหลืออยู่</h2>
													<h2 style="text-align: center;"><?php echo number_format($showpayloan, 2);?> บาท</h2>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">ปิด</button>
												</div>
											</div>
										</div>
									</div>
		<?php
            
			if($result->num_rows() == 0)
			{?>
								<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
					border-radius: .25rem;
					background-color: #f7f8f9;">
	
									<div id="inputs-alternative-component"
										class="tab-pane tab-example-result fade active show" role="tabpanel"
										aria-labelledby="inputs-alternative-component-tab">
										<h2 class="" style="font-size: 30px;">ค่าใช้จ่ายในกิจกรรม <?php echo '"'.$InAc['Name_Activities'].'"'?></h2>
										<hr>
										<h2 style=" text-align: center; margin-left: auto; margin-right: auto;">
											ไม่มีค่าใช้จ่ายภายในโครงการ</h2>	
									</div>
								</div>
								<?php 
			}else{

				$moneyget = $this->db->query("SELECT sum(Money)
                                    as money
                                    FROM Loan
                                    WHERE ID_Activities = '$idRepo'");
                        $sumget =  $moneyget->row_array();
			?>
	
								<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
					border-radius: .25rem;
					background-color: #f7f8f9;">
	
									<div id="inputs-alternative-component"
										class="tab-pane tab-example-result fade active show" role="tabpanel"
										aria-labelledby="inputs-alternative-component-tab">
										<h2 class="" style="font-size: 30px;">ค่าใช้จ่ายในกิจกรรม <?php echo '"'.$InAc['Name_Activities'].'"'?></h2>
										<h2 style="font-size: 25px;"> งบประมาณที่ยังไม่ได้ระบุค่าใช้จ่าย : : <?php echo number_format($showshowbgstring, 2);?> บาท</h2>
										<h3 class="" style="font-size: 25px;">จำนวนที่สามารถเบิกได้ : <?php echo number_format($showpayloan, 2);?> บาท</h3>
										<h3 class="" style="font-size: 25px;">ค่าใช้จ่ายที่ระบุรวมทั้งหมด :<?php echo number_format($sumget['money'], 2);?> บาท</h3>
										
										
	
										
	
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
														<?php if($this->session->userdata('Id_Users') == $ccvv['Id_Users'])
													 {?>
														<th style="text-align:center;" scope="col">
															<h2 style="text-align: center; font-weight:bold">แก้ไข</h2>
	
														</th>
														<?php }?>
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
	
														<td class="">
	
															<div>
																<?php if($this->session->userdata('Id_Users') == $ccvv['Id_Users'])
													 {?>
																<button type="button" class="btn btn-block btn-success mb-3"
																	data-toggle="modal"
																	data-target="#<?php echo $datadetail['Name_Loan'];?>">Edit</button>
																<?php }?>
																<div class="modal fade"
																	id="<?php echo $datadetail['Name_Loan'];?>"
																	tabindex="-1" role="dialog"
																	aria-labelledby="<?php echo $datadetail['Name_Loan'];?>"
																	aria-hidden="true">
																	<div class="modal-dialog modal- modal-dialog-centered modal-"
																		role="document">
																		<div class="modal-content" style="color: #2d3436;">
	
																			<div class="modal-header">
																				<h2 class="modal-title"
																					id="modal-title-default">
																					แก้ไขข้อมูลค่าใช้จ่าย :
																					<?php echo $datadetail['Name_Loan'];?>
																				</h2>
																				<button type="button" class="close"
																					data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">×</span>
																				</button>
																			</div>
																			<?php $showpayloanshow = (int)$showpayloan;
																				  $showMoney = (int)$datadetail['Money'];
																				  $calshowloan = $showpayloanshow + $showMoney;
																				  $showcal = (string)$calshowloan; ?>
																			<div class="modal-body">
																				<form
																					action="<?php echo base_url('InActivity/EditLoan/').$idRepo; ?>"
																					name="AddLoan_form" id="AddLoan_form"
																					method="post">
																					รายการ :
																					<input type="text"
																						class="form-control mt-3 mb-3 ml-2"
																						id="Name_Loan" name="Name_Loan"
																						value="<?php echo $datadetail['Name_Loan'];?>">
																					จำนวนเงิน :
																					<input type="number"
																						class="form-control mt-3 mb-3 ml-2"
																						id="Money" name="Money" min = "0" max = "<?php echo $showcal;?>"
																						value="<?php echo $datadetail['Money'];?>">
																					<?php $this->db->where('Id_TypeLoan', $datadetail['Type']);
																								$queryuser = $this->db->get('TypeLoan');
																								$showdata = $queryuser->row_array();?>
																					ประเภทค่าใช้จ่าย :
																					<select required name="Type" id="Type">
																						<option
																							value="<?php echo $showdata['Name_TypeLoan'];?>">
																							<?php echo $showdata['Name_TypeLoan'];?>
																						</option>
																						<option value="ค่าตอบแทน">ค่าตอบแทน
																						</option>
																						<option value="ค่าใช้สอย">ค่าใช้สอย
																						</option>
																						<option value="ค่าวัสดุ">ค่าวัสดุ
																						</option>
																					</select>
																					<input type="hidden"
																						id="<?php echo $datadetail['ID_Loan'];?>"
																						name="ID_Loan"
																						value="<?php echo $datadetail['ID_Loan'];?>">
	
																			</div>
																			<div class="modal-footer">
																				<button type="button"
																					class="btn btn-secondary"
																					data-dismiss="modal">ปิด</button>
																				<button type="submit"
																					class="btn btn-success">ยืนยัน</button>
																			</div>
																			</form>
																		</div>
														</td>
													</tr>
													<?php }
					  } ?>
													<?php } 
											} ?>
											<tr>
												<td>
													<h2 style="text-align: center; font-weight:bold">ยอดรวม</h2>
												</td>
												<td>
													<h2 style="text-align: center; font-weight:bold"><?php echo number_format($i, 2);?></h2>
												</td>
											</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
