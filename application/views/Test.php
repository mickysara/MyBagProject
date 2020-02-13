<div class="container" style="margin-bottom: 30px;" id="ShowDeposit">
	<?php
		
		$this->db->select('Type');
		$this->db->where('ID_Activities', 90);
		$this->db->group_by('Type');
		
        $result = $this->db->get('Loan');
        
        
            
        if($result->num_rows() == 0)
        {?>
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">ค่าใช้จ่ายภายในโครงการ</h2>
			<hr>
			<h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มีค่าใช้จ่ายภายในโครงการ</h2>
		</div>
	</div>
	<?php 
        }else{
        ?>

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">ค่าใช้จ่ายภายในโครงการ</h2>
			<hr>
			<div class="table-responsive">
				<table class="table align-items-center table-flush" >
					<thead class="thead-light">
						<tr>
							<th scope="col">
								<h2>รายการ</h2>
							</th>
							<th style="text-align:center;" scope="col">
								<h2 style="text-align: left;">จำนวนเงิน (บาท)</h2>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php                 	$this->db->where('ID_Activities', 90);
												$query = $this->db->get('Loan');
												
                                                foreach($result->result_array() as $data)
                                                {?>
						<tr>
							<th scope="row">
										<span class="mb-0 text-sm">
											<p style="margin-bottom: 0px;"><?php echo $data['Type'];?></p>
										</span>
			
			</th>
			<td>
				
				 <?php 	$type = $data['Type'];
						 $moneyT = $this->db->query("SELECT SUM(Money) FROM Loan WHERE Type = '$type' and ID_Activities = 90") ;
						 $moneyType = $moneyT->row_array();?>
						 <p><?php echo $moneyType['SUM(Money)'] ?></p>
			</td>
			</tr>
			<?php foreach($query->result_array() as $datadetail)
						{ 
						if($data['Type'] == $datadetail['Type'])
						{?>
						<tr>
							<th scope="row">
										<span class="mb-0 text-sm">
											<p style="margin-bottom: 0px;"> -  <?php echo $datadetail['Name_Loan'];?></p>
										</span>
		
							</th>
			<td>
						 <p><?php echo $datadetail['Money'] ?></p>
			</td>
			</tr>
				  <?php }
				  } ?>
			<?php } 
                                        } ?>
			</tbody>
			</table>
		</div>
	</div>
</div>











<div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
						<div class="table-responsive" id="Showloan">

							<?php
                     $idAc = $InAc['ID_Activities'];
                          $result = $this->db->query("SELECT *
                          FROM Loan
                          WHERE Id_Activities = $idAc ");
                    
                if($result->num_rows() == 0)
                {?>
							<div class="ct-example tab-content tab-example-result" style="
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

								<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show"
									role="tabpanel" aria-labelledby="inputs-alternative-component-tab">

									<h2 style=" text-align: center; margin-left: auto; margin-right: auto;">
										ยังไม่มีการจัดการค่าใช้จ่ายภายในกิจกรรม</h2>
									<button type="button" class="btn btn"
										style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal"
										data-target="#AddLoan">
										เพิ่มค่าใช้จ่ายในกิจกรรม
									</button>

									<div class="modal fade" id="AddLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
										aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h2 class="modal-title" id="exampleModalLabel">เพิ่มค่าใช่จ่ายในกิจกรรม</h2>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<div class="modal-body">
													<form action="<?php echo base_url('InActivity/InsertLoan/').$idAc; ?>" name="AddLoan_form"
														id="AddLoan_form" method="post">
														กรุณากรอกรายการ :
														<input type="text" class="form-control mt-3 mb-3 ml-2" id="Name_Loan" name="Name_Loan"
															placeholder="ค่าอาหาร">
														จำนวนเงินที่เบิก :
														<input type="text" class="form-control mt-3 mb-3 ml-2" id="Money" name="Money"
															placeholder="1000">
														กรุณาเลือกหมวด :
														<select required name="Type" id="Type">
															<option value="" disabled selected>กรุณาเลือกหมวด</option>
															<option value="ค่าตอบแทน">ค่าตอบแทน</option>
																<option value="ค่าใช้สอย">ค่าใช้สอย</option>
																<option value="ค่าวัสดุ">ค่าวัสดุ</option>
														</select>
														<input type="hidden" id="ID_Activities" name="ID_Activities" value="<?php echo $idAc ?>">

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
							</div>
							<?php 
                }else{
                ?>

							<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

								<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show"
									role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
									<h2 class="" style="font-size: 30px;">จัดการค่าใช้จ่ายภายในกิจกรรม</h2>

									<button type="button" class="btn btn"
										style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal"
										data-target="#AddLoanshow">
										เพิ่มค่าใช้จ่ายในกิจกรรม
									</button>

									<button type="button" class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal"
										data-target="#CheckAllLoan">
										ตรวจสอบยอดเงินคงเหลือ
									</button>

									<!--------------------------------------- Modal ---------------------------------------------------------------------->
									<div class="modal fade" id="AddLoanshow" tabindex="-1" role="dialog"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h2 class="modal-title" id="exampleModalLabel">เพิ่มค่าใช่จ่ายในกิจกรรม</h2>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<div class="modal-body">
													<form action="<?php echo base_url('InActivity/InsertLoan/').$idAc; ?>" name="InsertLoan_form"
														id="InsertLoan_form" method="post">

														กรุณากรอกรายการ :
														<input type="text" class="form-control mt-3 mb-3 ml-2" id="Name_Loan" name="Name_Loan"
															placeholder="ค่าอาหาร">
														จำนวนเงิน:
														<input type="text" class="form-control mt-3 mb-3 ml-2" id="Money" name="Money"
															placeholder="1000">
														กรุณาเลือกตำแหน่ง :
														<select required name="Type" id="Type">
															<option value="" disabled selected>กรุณาเลือกประเภท</option>
															<option value="ค่าตอบแทน">ค่าตอบแทน</option>
																<option value="ค่าใช้สอย">ค่าใช้สอย</option>
																<option value="ค่าวัสดุ">ค่าวัสดุ</option>
														</select>
														<input type="hidden" id="ID_Activities" name="ID_Activities" value="<?php echo $idAc ?>">

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



								<!-------------------------------------------------- end modal ---------------------------------------------------------->
								<?php         $repostrnono = base_url(uri_string());
                        $arraystate2 = (explode("/",$repostrnono));
                        $idRepo = ($arraystate2[6]);

                        $moneyget = $this->db->query("SELECT sum(Money)
                                    as money
                                    FROM Loan
                                    WHERE ID_Activities = '$idRepo'");
                        $sumget =  $moneyget->row_array();

                        $intget = (int)$sumget['money'];;

                        $this->db->where('ID_Activities', $idAc);
                        $showbudget = $this->db->get('Activities');
                        $showshowbg = $showbudget->row_array();
                        
                        $showshowbgstring = (string)$showshowbg['Budget'];
                        
                  ?>

								<!-- Modal -->
								<div class="modal fade" id="CheckAllLoan" tabindex="-1" role="dialog"
									aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h2 class="modal-title" id="exampleModalLabel">ตรวจสอบยอดเงินคงเหลือ</h2>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body">
												<p>งบประมาณกิจกรรม : <?php echo $showshowbgstring;?> บาท</p>
												<p>จำนวนเงินที่เบิกทั้งหมด : <?php echo $sumget['money'];?> บาท</p>
												
											</div>
											<div class="modal-footer">
												<a href="<?php echo site_url(); ?>Payloan/ShowSlip/<?php echo $idRepo;?>" class="btn btn"
													style="background-color: #db0f2f; color: #fff;">ขออนุมัติเคลียร์เงิน</a>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

											</div>
											</form>

										</div>
									</div>
								</div>

								<!--End Modal -->
								<hr>
								<div class="table-responsive">
									<table class="table align-items-center table-flush" id="Filesearch">
										<thead class="thead-light">
											<tr>
												<th scope="col">
													<h4>ชื่อรายการ</h4>
												</th>
												<th style="text-align:center;" scope="col">
													<h4 style="text-align: left;">ประเภท</h4>
												</th>
												<th style="text-align:center;" scope="col">
													<h4 style="text-align: left;">จำนวนเงิน</h4>
												</th>
												<th style="text-align:center;" scope="col">
													<h4 style="text-align: left;">แก้ไข</h4>
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
															<i class="fa fa-money" aria-hidden="true"></i>
														</a>
														<div class="media-body">
															<span class="mb-0 text-sm">
																<p style="margin-bottom: 0px;"><?php echo $data['Name_Loan'];?></p>
															</span>
														</div>
													</div>
								</div>
								</th>
								<td>
									<p><?php echo $data['Type'];?></p>
								</td>
								<td>
									<p><?php echo $data['Money'];?></p>
								</td>
				
								<td class="">

									<div>
										<button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal"
											data-target="#<?php echo $data['Name_Loan'];?>">Edit</button>

										<div class="modal fade" id="<?php echo $data['Name_Loan'];?>" tabindex="-1" role="dialog"
											aria-labelledby="<?php echo $data['Name_Loan'];?>" aria-hidden="true">
											<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
												<div class="modal-content" style="color: #2d3436;">

													<div class="modal-header">
														<h2 class="modal-title" id="modal-title-default">แก้ไขข้อมูลค่าใช้จ่าย :
															<?php echo $data['Name_Loan'];?></h2>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													</div>

													<div class="modal-body">
														<form action="<?php echo base_url('InActivity/EditLoan/').$idAc; ?>" name="AddLoan_form"
															id="AddLoan_form" method="post">
															รายการ :
															<input type="text" class="form-control mt-3 mb-3 ml-2" id="Name_Loan" name="Name_Loan"
																value="<?php echo $data['Name_Loan'];?>">
															จำนวนเงิน :
															<input type="text" class="form-control mt-3 mb-3 ml-2" id="Money" name="Money"
																value="<?php echo $data['Money'];?>">
															ประเภทค่าใช้จ่าย :
															<select required name="Type" id="Type">
																<option value="<?php echo $data['Type'];?>"><?php echo $data['Type'];?></option>
																<option value="ค่าตอบแทน">ค่าตอบแทน</option>
																<option value="ค่าใช้สอย">ค่าใช้สอย</option>
																<option value="ค่าวัสดุ">ค่าวัสดุ</option>
															</select>
															<input type="hidden" id="<?php echo $data['ID_Loan'];?>" name="ID_Loan"
																value="<?php echo $data['ID_Loan'];?>">

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
														<button type="submit" class="btn btn-success">ยืนยัน</button>
														<!-- <a href="<?php echo site_url(); ?>/InActivity/del/<?php echo $data['ID_Loan'];?>"
															onclick="return confirm('คุณต้องการรายการ <?php echo $data['Name_Loan']?> ใช่หรือไม่ ?')"
															class="btn btn-danger">ลบข้อมูลรายการนี้</a> -->
													</div>
													</form>
												</div>
								</td>
								</tr>
								<?php } ?>
								</tbody>
								</table>
							</div>
						</div>

						<?php
                    } ?>
					</div>
				</div>