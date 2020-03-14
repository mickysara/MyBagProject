<div class="container">
	<?php

   
                    if(isset($InsertActivity) && is_array($InsertActivity) && count($InsertActivity)): $i=0;
                    foreach ($InsertActivity as $key => $InAc) {  
					} endif; 
   
$repostrnono = base_url(uri_string());
$arraystate2 = (explode("/",$repostrnono));
$idRepo = ($arraystate2[6]);

$result = $this->db->query("SELECT * FROM Activities WHERE ID_Activities = $idRepo"); ?>

<?php   foreach($result->result_array() as $data)
                                                    { ?>

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
            <h1 style="font-size: 30px;">สรุปผลกิจกรรม</h1>
            <hr>
            <h2 style="font-size: 20px; font-weight:bold">ชื่อกิจกรรม : <?php echo $data['Name_Activities'];?> </h2>
               <?php
               $this->db->where('Id_TypeActivity', $data['Type']);
                $querytype = $this->db->get('TypeActivities');
                $showtype = $querytype->row_array();
               ?>
						<p style="font-weight: 500;">ประเภทกิจกรรม : <?php echo $showtype['Name_TypeActivity'];?></p>
						<p style="font-weight: 500;">วันที่จัดกิจกรรม : <?php 
                                                                                            $var_date = $data['DateStart'];
                                                                                            $strDate = $var_date;
                                                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                                                            $strMonth= date("n",strtotime($strDate));
                                                                                            $strDay= date("j",strtotime($strDate));
                                                                                            $strH = date("H",strtotime($data['TimeStart']));
                                                                                            $stri = date("i",strtotime($data['TimeStart']));
                                                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                                            "พฤศจิกายน","ธันวาคม");
                                                                                            $strMonthThai=$strMonthCut[$strMonth];
                                                
                                                                                            echo $strDay." ".$strMonthThai." ".$strYear." เวลา ".$strH.":".$stri;
                                                                                        ?></p>
						<p style="font-weight: 500;">วันที่สิ้นสุดกิจกรรม : <?php 
                                                                                            $var_date = $data['DateEnd'];
                                                                                            $strDate = $var_date;
                                                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                                                            $strMonth= date("n",strtotime($strDate));
                                                                                            $strDay= date("j",strtotime($strDate));
                                                                                            $strH = date("H",strtotime($data['TimeEnd']));
                                                                                            $stri = date("i",strtotime($data['TimeEnd']));
                                                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                                            "พฤศจิกายน","ธันวาคม");
                                                                                            $strMonthThai=$strMonthCut[$strMonth];
                                                
                                                                                            echo $strDay." ".$strMonthThai." ".$strYear." เวลา ".$strH.":".$stri;
                                                                                        ?></p>



                        <p class="description">จำนวนเข้าร่วมขั้นต่ำ: <?php echo $data['AmountJoin'];?> วัน</p>
                        <?php 
                            $this->db->where('Id_location', $data['Id_location']);
                            $querylo = $this->db->get('Eventlocation');
                            $showlo = $querylo->row_array();
                        ?>
                        <p class="description">สถานที่จัดกิจกรรม: <?php echo $showlo['NameLocation'];?></p>
						<p class="description">รายละเอียด: <?php echo $data['Detail'];?></p>

		</div>
	</div>

<!-------------------------------------------------- ข้อมูลกิจกรรม ---------------------------------------------------------->

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 32px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">สรุปผู้เข้าร่วมกิจกรรม</h2>
            <hr>
            
			<div class="table-responsive">
				<table class="table align-items-center table-flush" id="Filesearch">
					<thead class="thead-light">
						<tr>
							<th scope="col">
								<h4>สาขาที่เข้าร่วม</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">จำนวนที่ลงทะเบียน</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">จำนวนที่เข้าร่วม</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">เปอร์เซนต์</h4>
							</th>
						</tr>
					</thead>
					<tbody>


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
				<p>
					<?php echo $data['Type'];?>
				</p>
			</td>
			<td>

			</tr>
			<?php }
                                                     ?>
			</tbody>
			</table>
		</div>
	</div>
</div>













<?php
		 $repostrnono = base_url(uri_string());
		$arraystate2 = (explode("/",$repostrnono));
		$idRepo = ($arraystate2[6]);

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

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 32px; margin-bottom: 32px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
            <h3 style="font-size: 30px;">ค่าใช้จ่ายภายในกิจกรรม</h3>
            <hr>
			<h3 style="font-size: 20px;"> งบประมาณกิจกรรม : <?php echo number_format($showshowbgstring, 2);?> บาท</h3>

			

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
								<h2 style="text-align: center; font-weight:bold"><?php echo number_format($sumget2['moneyuse'], 2);?></h2>
							</td>
                            <td>
								<h2 style="text-align: center; font-weight:bold"><?php echo number_format($sumget3['sumsum'], 2);?></h2>
							</td>
                            
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-------------------------------------------------- ข้อมูลกิจกรรม ---------------------------------------------------------->
