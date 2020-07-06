<div class="container">
	<?php
	$repostrnono = base_url(uri_string());
	$arraystate2 = (explode("/",$repostrnono));
	$idRepo = ($arraystate2[5]);

	$this->db->where('Id_Users',$this->session->userdata('Id_Users'));
      $Users = $this->db->get('Position_Emp');
	  $showusers = $Users->row_array();
	  
 $this->db->where('ID_Loan', $idRepo);
                $showbudget = $this->db->get('Loan');
                $showshowbg = $showbudget->row_array();
                
 $result = $this->db->query("SELECT * FROM LoanDetail WHERE ID_Loan = $idRepo") ;           
                if($result->num_rows() == 0)
                {?>
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">ยังไม่มีรายละเอียดค่าใช้จ่ายของ:
				<?php echo '"'.$showshowbg['Name_Loan'].'"'?></h2>
			<hr>
			<?php if($showusers['Name_Position'] == 'นักวิชาการเงินและบัญชี'){ ?>

            <?php }else{ ?>
			<button type="button" class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;"
				data-toggle="modal" data-target="#AddLoanDetail2">
				เพิ่มสลิปในรายการ
			</button>
			<?php }?>
			<h2 style=" text-align: center; margin-left: auto; margin-right: auto;"></h2>
		</div>
		<a class="btn btn-primary btn-round mt-5"
			href="<?php echo base_url("Payloan/ClearMoney/".$showshowbg['ID_Activities']) ?>">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ
		</a>
	</div>
	<!---------------------------------------------------------- ก้อนสอง ------------------------------------------------------------------>
	<div class="modal fade" id="AddLoanDetail2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
				<?php if($showusers['Name_Position'] == 'นักวิชาการเงินและบัญชี'){ ?>

                <?php }else{ ?>
					<h1 class="modal-title" id="exampleModalLabel">
						เพิ่มสลีป</h1>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				<?php }?>
				</div>

				<div class="modal-body">

					<form action="<?php echo base_url('AddLoan/InsertDetailLoan/').$idRepo; ?>" name="AddLoan_form"
						id="AddLoan_form" method="post" enctype='multipart/form-data'>
						กรุณากรอกรายเอียดเพิ่มเติม :
						<input type="text" class="form-control mt-3 mb-3 ml-2" id="Detail" name="Detail"
							placeholder="....">
						<p>รูปภาพหลักฐาน :</p>
						<div class="form-group">
							<input type="file" required id="image_file" name="userfile[]" accept=".png,.jpg,.jpeg">
							<input type="hidden" id="namefile" name="namefile">
						</div>

						<input type="hidden" id="ID_Loan" name="ID_Loan" value="<?php echo $idRepo ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
					<button type="submit" class="btn btn-success">ยืนยัน</button>
				</div>
				</form>
			</div>
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
			<h2 class="" style="font-size: 30px;">รายละเอียดค่าใช้จ่าย: <?php echo '"'.$showshowbg['Name_Loan'].'"'?>
			</h2>
			<hr>
			<?php if($showusers['Name_Position'] == 'นักวิชาการเงินและบัญชี'){ ?>

            <?php }else{ ?>
			<button type="button" class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;"
				data-toggle="modal" data-target="#AddLoanDetail">
				เพิ่มสลิปในรายการ
			</button>
			<?php }?>

			<div class="table-responsive">
				<table class="table align-items-center table-flush" id="Filesearch">
					<thead class="thead-light">
						<tr>
							<th scope="col">
								<h4>หมายเหตุ</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ตรวจสอบสลิป</h4>
							</th>
							<?php if($showusers['Name_Position'] == 'นักวิชาการเงินและบัญชี'){ ?>

                            <?php }else{ ?>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">แก้ไข</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ลบ</h4>
							</th>
							<?php }?>
						</tr>
					</thead>
					<tbody>
						<?php   foreach($result->result_array() as $data)
                                                    { ?>


						<tr>
							<th scope="row">
								<div class="media align-items-center">
									<a href="#" class="avatar rounded-circle mr-3">
										<i class="fa fa-bicycle"></i>
									</a>
									<div class="media-body">
										<span class="mb-0 text-sm">
											<p style="margin-bottom: 0px;"><?php echo $data['Detail'];?></p>
										</span>
									</div>
								</div>

							</th>
                            
							<td>
								<span class="badge badge-dot mr-4">
									<a href="<?php echo base_url("slipclear/". $data['Image']) ?>"
										class="btn btn mb-3 Doc"
										style="background-color: #1778F2; color: #fff;">หลักฐานการโอนเงิน</a>
								</span>
							</td>
							<?php if($showusers['Name_Position'] == 'นักวิชาการเงินและบัญชี'){ ?>

                            <?php }else{ ?>
							<td>
								<span class="badge badge-dot mr-4">
									<button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal"
										data-target="#<?php echo $data['Detail'];?>">แก้ไข</button>
								</span>
							</td>
							<td>
								<span class="badge badge-dot mr-4">
									<a href="<?php echo site_url(); ?>AddLoan/DeleteDetail/<?php echo  $data['ID_LoanDetail'];?>"
										onclick="return confirm('คุณต้องการลบรายการนี้ใช่หรือไม่ ?')"
										class="btn btn-danger mb-3">ลบ</a>
								</span>
							</td>
							<?php }?>
							<div class="modal fade" id="<?php echo $data['Detail'];?>" tabindex="-1" role="dialog"
		aria-labelledby="<?php echo $data['Detail'];?>" aria-hidden="true">
		<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
			<div class="modal-content" style="color: #2d3436;">

				<div class="modal-header">
					<h2 class="modal-title" id="modal-title-default">
						แก้ไขรายละเอียด :
						<?php echo $data['Detail'];?>
					</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url('AddLoan/EditDetailLoan/').$data['ID_LoanDetail']; ?>"
						name="AddLoan_form" id="AddLoan_form" method="post" enctype='multipart/form-data'>
						กรุณากรอกรายเอียดเพิ่มเติม :
						<input type="text" class="form-control mt-3 mb-3 ml-2" id="Detail" name="Detail"
							value="<?php echo $data['Detail'];?>" required>
						<p>รูปภาพหลักฐาน :</p>
						<div class="form-group">
							<input type="file" required id="image_file" name="userfile[]" accept=".png,.jpg,.jpeg">
							<input type="hidden" id="namefile" name="namefile">
						</div>


						<input type="hidden" id="<?php echo $data['ID_LoanDetail'];?>" name="ID_LoanDetail"
							value="<?php echo $data['ID_LoanDetail'];?>">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
					<button type="submit" class="btn btn-success">ยืนยัน</button>
				</div>
				</form>
			</div>
			
		</div>
	</div>
							<?php
                }
                ?>
							
						</tr>


					</tbody>
					
				</table>
				<a class="btn btn-primary btn-round mt-5"
								href="<?php echo base_url("Payloan/ClearMoney/".$showshowbg['ID_Activities']) ?>">
								<i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ
							</a>
			</div>
		</div>
	</div>




	<!---------------------------------------------------------- ก้อนแรก ------------------------------------------------------------------>
	<div class="modal fade" id="AddLoanDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title" id="exampleModalLabel">
						เพิ่มสลีป</h1>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">

					<form action="<?php echo base_url('AddLoan/InsertDetailLoan/').$idRepo; ?>" name="AddLoan_form"
						id="AddLoan_form" method="post" enctype='multipart/form-data'>
						กรุณากรอกรายเอียดเพิ่มเติม :
						<input type="text" class="form-control mt-3 mb-3 ml-2" id="Detail" name="Detail"
							placeholder="....">
						<p>รูปภาพหลักฐาน :</p>
						<div class="form-group">
							<input type="file" required id="image_file" name="userfile[]" accept=".png,.jpg,.jpeg">
							<input type="hidden" id="namefile" name="namefile">
						</div>

						<input type="hidden" id="ID_Loan" name="ID_Loan" value="<?php echo $idRepo ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
					<button type="submit" class="btn btn-success">ยืนยัน</button>
				</div>
				</form>
			</div>
		</div>
	</div>
			<?php } ?>
		
