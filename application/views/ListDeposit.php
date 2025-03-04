<div class="container" style="margin-bottom: 30px;" id="ShowDeposit">
	<?php
$this->db->where('Status', 'รออนุมัติ');
        $result = $this->db->get('Depoosit');
        
        
            
        if($result->num_rows() == 0)
        {?>
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">การฝากเงินที่รอการอนุมัติ</h2>
			<hr>
			<h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มีการฝากเงินที่รอการอนุมัติ</h2>
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
			<h2 class="" style="font-size: 30px;">การฝากเงินที่รอการอนุมัติ</h2>
			<hr>
			<div class="table-responsive">
				<table class="table align-items-center table-flush" id="Filesearch">
					<thead class="thead-light">
						<tr>
							<th scope="col">
								<h4>รหัสผู้ฝาก</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">จำนวนเงิน</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">วันที่และเวลาทำการโอน</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">หลักฐานการโอนเงิน</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ยืนยันการฝาก</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ยกเลิกการฝาก</h4>
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
											<p style="margin-bottom: 0px;"><?php echo $data['DepositBy'];?></p>
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
                                                            $var_date = $data['DateTime'];
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
					<a href="<?php echo base_url("slip/". $data['Slip']) ?>" class="btn btn mb-3 Doc"
						style="background-color: #1778F2; color: #fff;">หลักฐานการโอนเงิน</a>
				</span>
			</td>
			<td>
				<span class="badge badge-dot mr-4">
					<a href="<?php echo base_url("ListDeposit/Approve/".$data['ID_Deposit']) ?>" class="btn btn mb-3"
						style="background-color: #00a81f; color: #fff;">ยืนยันการฝาก</a>
				</span>
			</td>
			<td>
				<span class="badge badge-dot mr-4">
					<a onclick="EjectDeposit(<?php echo $data['ID_Deposit'] ?>)" class="btn btn mb-3"
						style="background-color: #c62121; color: #fff;">ยกเลิกการฝาก</a>
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
