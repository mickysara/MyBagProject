<div class="container" style="margin-bottom: 30px;" id="ShowDeposit">
	<?php

        $result = $this->db->get('Withdraw');
        
        
            
        if($result->num_rows() == 0)
        {?>
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">รายการการถอนเงิน</h2>
			<hr>
			<!-- Button trigger modal -->
			<button type="button" class="btn btn mb-5" style="background-color: #00a81f; color: #fff;" data-toggle="modal" data-target="#exampleModal">
				เพิ่มการถอน
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
                <form name="withdraw" id="withdraw_form" method="post">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="modal-title" id="exampleModalLabel">เพิ่มการถอน</h2>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                            <p>กรอกรหัสผู้ใช้</p>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="User" class="form-control" id="exampleFormControlInput1"
										placeholder="2054681325">
								</div>
							</div>
                            <p>กรอกชื่อผู้ใช้</p>
							<div class="col-md-6">
								<div class="form-group">
									<input type="Text" name="Fname" class="form-control" id="exampleFormControlInput1"
										placeholder="นาวิน">
								</div>
							</div>
                            <p>กรอกนามสกุลผู้ใช้</p>
							<div class="col-md-6">
								<div class="form-group">
									<input type="Text" name="Lname" class="form-control" id="exampleFormControlInput1"
										placeholder="มารุ่งเรือง">
								</div>
							</div>
                            <p>กรอกจำนวนเงิน</p>
							<div class="col-md-6">
								<div class="form-group">
									<input type="number" name="Money" class="form-control" id="exampleFormControlInput1"
										placeholder="300">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
							<button type="submit" class="btn btn-primary"  style="background-color: #00a81f; color: #fff;">ยืนยัน</button>
						</div>
                        </form>
					</div>
				</div>
			</div>

			<h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มีรายการถอน</h2>

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
			<h2 class="" style="font-size: 30px;">รายการการถอนเงิน</h2>
			<hr>
            <!-- Button trigger modal -->
			<button type="button" class="btn btn mb-5" style="background-color: #00a81f; color: #fff;" data-toggle="modal" data-target="#exampleModal">
				เพิ่มการถอน
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
                <form name="withdraw" id="withdraw_form" method="post">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="modal-title" id="exampleModalLabel">เพิ่มการถอน</h2>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                            <p>กรอกรหัสผู้ใช้</p>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="User" class="form-control" id="exampleFormControlInput1"
										placeholder="2054681325">
								</div>
							</div>
                            <p>กรอกชื่อผู้ใช้</p>
							<div class="col-md-6">
								<div class="form-group">
									<input type="Text" name="Fname" class="form-control" id="exampleFormControlInput1"
										placeholder="นาวิน">
								</div>
							</div>
                            <p>กรอกนามสกุลผู้ใช้</p>
							<div class="col-md-6">
								<div class="form-group">
									<input type="Text" name="Lname" class="form-control" id="exampleFormControlInput1"
										placeholder="มารุ่งเรือง">
								</div>
							</div>
                            <p>กรอกจำนวนเงิน</p>
							<div class="col-md-6">
								<div class="form-group">
									<input type="number" name="Money" class="form-control" id="exampleFormControlInput1"
										placeholder="300">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
							<button type="submit" class="btn btn" style="background-color: #00a81f; color: #fff;">ยืนยัน</button>
						</div>
                        </form>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table align-items-center table-flush" id="Filesearch">
					<thead class="thead-light">
						<tr>
							<th scope="col">
								<h4>ผู้ถอน</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">จำนวนเงิน</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">วันที่และเวลาแจ้งถอน</h4>
							</th>
                            <th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">เจ้าหน้าที่ทำรายการ</h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php                 
                                                foreach($result->result_array() as $data)
                                                {
                                                    $this->db->where('Id_Users', $data['WithdrawBy']);
                                                    $query = $this->db->get('student', 1);

                                                    if($query->num_rows() == 1)
                                                    {
                                                        $qq = $query->row_array();

                                                    }else{

                                                        $this->db->where('Id_Users', $data['WithdrawBy']);
                                                        $query = $this->db->get('Teacher', 1);

                                                        if($query->num_rows() == 1)
                                                        {
                                                            $qq = $query->row_array();

                                                        }else{
                                                                $this->db->where('Id_Users', $data['WithdrawBy']);
                                                                $query = $this->db->get('Employee', 1);

                                                                if($query->num_rows() == 1)
                                                                {
                                                                    $qq = $query->row_array();
        
                                                                }else{

                                                                    $this->db->where('Id_Users', $data['WithdrawBy']);
                                                                    $query = $this->db->get('Shop', 1);
                                                                    $qq = $query->row_array();
                                                                }
                                                        }
                                                    }
                                                    ?>
						<tr>
							<th scope="row">
								<div class="media align-items-center">
									<a href="#" class="avatar rounded-circle mr-3">
										<i class="fa fa-bicycle"></i>
									</a>
									<div class="media-body">
										<span class="mb-0 text-sm">
											<p style="margin-bottom: 0px;"><?php echo $qq['Fname']." ".$qq['Lname'];?></p>
										</span>
									</div>
								</div>
			</div>
			</th>
			<td>
				<span class="badge badge-dot mr-4">
					<p><?php echo $data['Money'];?></p>
				</span>
			</td>
			<td>
				<span class="badge badge-dot mr-4">
					<p><?php 
                                                            $var_date = $data['TimeStamp'];
                                                            $strDate = $var_date;
                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                            $strMonth= date("n",strtotime($strDate));
                                                            $strDay= date("j",strtotime($strDate));
                                                            $strH = date("H",strtotime($strDate));
                                                            $stri = date("i",strtotime($strDate));
                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                            "พฤศจิกายน","ธันวาคม");
                                                            $strMonthThai=$strMonthCut[$strMonth];

                                                            echo $strDay." ".$strMonthThai." ".$strYear." เวลา ".$strH.":".$stri;
                                                                                ?></p>
				</span>
			</td>
            <td>
				<span class="badge badge-dot mr-4">
                <?php   $this->db->where('Id_Users', $data['Emp']);
                        $query = $this->db->get('Employee', 1);
                        $qq = $query->row_array();
                        
                 ?>
					<p><?php echo $qq['Fname']." ".$qq['Lname']; ?></p>
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
