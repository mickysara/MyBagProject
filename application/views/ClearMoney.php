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

						$moneyget1 = $this->db->query("SELECT sum(Money)
						as money
						FROM Loan
						WHERE ID_Activities = '$idRepo'
						AND Type != 3");
						$sumget1 =  $moneyget1->row_array();
						
						$moneyget2 = $this->db->query("SELECT sum(Money_Use)
						as money
						FROM Loan
						WHERE ID_Activities = '$idRepo'
						AND Type != 3");
			            $sumget2 =  $moneyget2->row_array();

						$sumallget12 = $sumget1['money'] - $sumget2['money']; 
						



                        $intget = (int)$sumget['money'];;

                        $this->db->where('ID_Activities', $idRepo);
                        $showbudget = $this->db->get('Activities');
						$showshowbg = $showbudget->row_array();
						
						$this->db->where('ID_User', $showshowbg['Borrow']);
                        $showuse = $this->db->get('Users');
						$showshowuse = $showuse->row_array();
						
						$this->db->where('ID_Teacher', $showshowuse['Username']);
                        $showtea = $this->db->get('Teacher');
						$showshowtea = $showtea->row_array();
                        
						$showshowbgstring = (string)$showshowbg['Budget'];
						
						$calpayloan = $showshowbg['Budget'] - $intget;
						$showpayloan = (string)$calpayloan;

						$this->db->where('Id_Users',$this->session->userdata('Id_Users'));
						$Users = $this->db->get('Position_Emp');
						$showusers = $Users->row_array();
						
						$Cash = $this->db->query("SELECT * FROM CashActivities WHERE CashActivities.ID_Activities = $idRepo");
							if($Cash->num_rows() == 0){
                               $ShowCash = 0;

							}else{
							   $GetCash = $Cash->row_array();
							   $ShowCash = $GetCash['Cash'];
 
							}
						$SumCashAll = $sumallget12 - $ShowCash;

        ?>

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">ค่าใช้จ่ายภายในกิจกรรม
				<?php echo '"'.$showshowbg['Name_Activities'].'"'?></h2>
			<h2 style="font-size: 20px;"> งบประมาณกิจกรรม :
				<?php echo number_format($showshowbgstring, 2);?> บาท</h2>
			<h4 class="" style="font-size: 20px;">งบประมาณที่ยังไม่ได้ระบุค่าใช้จ่าย :
				<?php echo number_format($showpayloan, 2);?> บาท</h4>
			<h4 class="" style="font-size: 20px;">ค่าใช้จ่ายที่ระบุรวมทั้งหมด :
				<?php echo number_format($sumget['money'], 2);?> บาท</h4>
			<hr>
			<h2 style="font-size: 20px;"> อาจารย์ :
				<?php echo '"'.$showshowtea['Fname'].' '.$showshowtea['Lname'].'"'.' '.'ยืมเงินทั้งหมด'?>
				<?php echo number_format($sumget1['money'], 2);?> บาท</h2>
			<h4 class="" style="font-size: 20px;">เงินยืมที่ใช้ :
				<?php echo number_format($sumget2['money'], 2);?> บาท</h4>
			<h4 class="" style="font-size: 20px;">เงินยืมคงเหลือ :
				<?php echo number_format($SumCashAll, 2);?> บาท  (จำนวนเงินสดที่คืน <?php echo number_format($ShowCash, 2);?> บาท )</h4>
			<hr>
			<?php if($showusers['Name_Position'] == 'นักวิชาการเงินและบัญชี'){ ?>
			<?php if($SumCashAll != 0){?>
				<button type="button" class="btn btn-success" data-toggle="modal"
						data-target="#AlertApprove" style="margin-bottom: 20px;">อนุมัติ</button>

				<div class="modal fade" id="AlertApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title" id="exampleModalLabel">
									คำเตือน</h1>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								<h1 style="text-align: center;">ไม่สามารถอนุมัติการเคลียร์เงินได้</h1>
								<h2 style="text-align: center;">เนื่องจากยังเหลือเงินยืมคงเหลืออยู่</h2>
								<h2 style="text-align: center;"><?php echo number_format($SumCashAll, 2);?> บาท</h2>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
							</div>
						</div>
					</div>
				</div>

			<?php }else{?>
				<a href="<?php echo site_url(); ?>Payloan/Approve/<?php echo $idRepo;?>" class="btn btn-success"
				style="margin-bottom: 20px;">อนุมัติ</a>
			<?php }?>
 

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
			onclick="return confirm('โปรดตรวจสอบจำนวนเงินที่ระบุ และเอกสารที่แนบให้แน่ใจก่อนกดปุ่มขออนุมัติเคลียร์เงิน?')"
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
						<th style="text-align:center;" scope="col">
							<h2 style="text-align: center; font-weight:bold">ดูข้อมูลสลีป</h2>

						</th>
						<?php if($showusers['Name_Position'] == 'นักวิชาการเงินและบัญชี'){ ?>

                        <?php }else{ ?>
						<th style="text-align:center;" scope="col">
							<h2 style="text-align: center; font-weight:bold">ระบุค่าใช้จ่าย</h2>
							<?php }?>


						</th>
						<!-- <th style="text-align:center;" scope="col">
							<h2 style="text-align: center; font-weight:bold">ตรวจสอบเอกสาร</h2>

						</th> -->
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
						<?php if($datadetail['Type'] == 3){ ?>
						<td>
							<p style="text-align: center;">
								<?php echo number_format($datadetail['Money'], 2) ?></p>
						</td>
						<?php }else{ ?>
						<td>
							<p style="text-align: center;">
								<?php echo number_format($datadetail['Money_Use'], 2) ?></p>
						</td>
						<?php }?>
						<td>
							<p style="text-align: center;">
								<?php echo number_format($datadetail['Sum'], 2) ?></p>
						</td>

						<?php if($datadetail['Type'] != 3){ ?>
						<td>
							<span class="badge badge-dot mr-4">
								<a href="<?php echo site_url(); ?>AddLoan/DetailLoan/<?php echo $datadetail['ID_Loan'];?>"
									class="btn btn-primary mb-3">ดูข้อมูลสลีป</a>

							</span>
						</td>
						<?php }else{?>

						<?php }?>


						<?php if($showusers['Name_Position'] == 'นักวิชาการเงินและบัญชี'){
													}else{?>
						<td class="">

							<div>
								<?php if($datadetail['Type'] == 1 && $this->session->userdata('Id_Users') != '485'){ ?>
								<?php if($datadetail['Image'] == Null){ ?>
								<button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal"
									data-target="#<?php echo $datadetail['Name_Loan'];?>">ระบุค่าใช้จ่าย</button>
								<?php }else{ ?>
								<button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal"
									data-target="#<?php echo $datadetail['Name_Loan'];?>">ระบุค่าใช้จ่าย</button>
								<?php }?>
								<?php }else if($datadetail['Type'] == 2 && $this->session->userdata('Id_Users') != '485'){
										?>
								<?php if($datadetail['Image'] == Null){ ?>
								<button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal"
									data-target="#<?php echo $datadetail['Name_Loan'];?>">ระบุค่าใช้จ่าย</button>
								<?php }else{ ?>
								<button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal"
									data-target="#<?php echo $datadetail['Name_Loan'];?>">ระบุค่าใช้จ่าย</button>
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

										<!--------------------------------------- ทดสอบการเคลียร์เงิน --------------------------------------------------------------------------->

										<?php }?>
										<!-- <?php if($datadetail['Image'] == Null){ ?>
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
						<?php }?> -->


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
						$sumget3 =  $moneyget3->row_array();
						
						$moneyget4 = $this->db->query("SELECT sum(Money)
						as sumsum
						FROM Loan
						WHERE ID_Activities = '$idRepo'
						AND Type = 3");
						$sumget4 =  $moneyget4->row_array();
						$testsum = $sumget2['moneyuse'] + $sumget4['sumsum']?>


						<td>
							<h2 style="text-align: center; font-weight:bold">ยอดรวม</h2>
						</td>
						<td>
							<h2 style="text-align: center; font-weight:bold"><?php echo number_format($i, 2);?></h2>
						</td>
						<td>
							<h2 style="text-align: center; font-weight:bold">
								<?php echo number_format($testsum, 2);?></h2>
						</td>
						<td>
							<h2 style="text-align: center; font-weight:bold">
								<?php echo number_format($sumget3['sumsum'], 2);?></h2>
						</td>
						<?php if($showusers['Name_Position'] != 'นักวิชาการเงินและบัญชี'){
													}else{?>
						<td>
							<button type="button" class="btn btn-success" data-toggle="modal"
							data-target="#AddCash" style="margin-bottom: 20px;">ระบุเงินสด</button>
						</td>
													<?php }?>
						<div class="modal fade" id="AddCash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title" id="exampleModalLabel">
											จำนวนเงินสด</h1>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<div class="modal-body">
									<form action="<?php echo base_url('AddLoan/AddCash/').$idRepo?>"
										name="AddLoan_form" id="AddLoan_form" method="post" enctype='multipart/form-data'>
										<div class="row">
												<input type="number" class="form-control" id="Cash" name="Cash">
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
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
