<div class="container">
	<?php

   
                    if(isset($InsertActivity) && is_array($InsertActivity) && count($InsertActivity)): $i=0;
                    foreach ($InsertActivity as $key => $InAc) {  
					} endif; 
   
$repostrnono = base_url(uri_string());
$arraystate2 = (explode("/",$repostrnono));
$idRepo = ($arraystate2[5]);
							
$this->db->where('ID_Activities', $idRepo);
$showbudget = $this->db->get('Activities');
$showshowbg = $showbudget->row_array();

$result = $this->db->query("SELECT * FROM Activities WHERE ID_Activities = $idRepo"); 

$result55 = $this->db->query("SELECT NameList.*,student.Fname,student.Lname 
                            FROM NameList,student 
                            WHERE NameList.ID_List = student.Id_Users AND NameList.TimeIn != '00:00:00' AND NameList.TimeOut != '00:00:00' 
                            AND NameList.ID_Activities = $idRepo");?>


	<?php   foreach($result->result_array() as $data)
                                                    { ?>

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h1 style="font-size: 30px;">สรุปผลกิจกรรม <?php echo '"'.$showshowbg['Name_Activities'].'"'?></h1>
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
			<?php $this->db->where('Id_Project',$data['Id_Project']);
				  $project = $this->db->get('Project');
				  $datapro = $project->row_array();?>
			<a href="<?php echo site_url(); ?>End/download/<?php echo $data['Id_Project'];?>" target="_blank"
				class="btn btn-success" style="margin-top: 10px; margin-bottom: 15px;"><i class="fa fa-download"></i>
				ดาวน์โหลดเอกสาร</a>
		</div>
	</div>

	<?php $TestAmount = $data['AmountJoin'];?>
	<!-------------------------------------------------- ข้อมูลกิจกรรม ---------------------------------------------------------->

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 32px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">สรุปผู้เข้าร่วมกิจกรรม <?php echo '"'.$showshowbg['Name_Activities'].'"'?></h2>
			<hr>
			<?php $query10 = $this->db->query("SELECT student.Id_Student 
							FROM NameList,student 
							WHERE NameList.ID_List = student.Id_Users
							AND NameList.ID_Activities = $idRepo
							GROUP BY NameList.ID_List");

							$query11 = $this->db->query("SELECT Teacher.ID_Teacher 
							FROM NameList,Teacher 
							WHERE NameList.ID_List = Teacher.Id_Users
							AND NameList.ID_Activities = $idRepo
							GROUP BY NameList.ID_List");

							$query12 = $this->db->query("SELECT Employee.Id_Employee 
							FROM NameList,Employee 
							WHERE NameList.ID_List = Employee.Id_Users
							AND NameList.ID_Activities = $idRepo
							GROUP BY NameList.ID_List"); 

							$Sum = $query10->num_rows() + $query11->num_rows() + $query12->num_rows();
			?>
			<h2 class="" style="font-size: 20px;">จำนวนผู้เข้าร่วมทั้งหมด: <?php echo $Sum." "."คน";?></h2>
			<h2 class="" style="font-size: 20px;">นักศึกษา: <?php echo $query10->num_rows()." "."คน"?></h2>
			<h2 class="" style="font-size: 20px;">อาจารย์: <?php echo $query11->num_rows()." "."คน"?></h2>
			<h2 class="" style="font-size: 20px;">พนักงาน: <?php echo $query12->num_rows()." "."คน"?></h2>
			<!-- <button class='btn btn' style="background-color: #00a81f; color: #fff;">ดาวน์โหลดผลการลงทะเบียน</button> -->
			<hr>
			<?php   
					$this->db->where('ID_Activities', $idRepo);
					$this->db->group_by('ID_List');
					$getid = $this->db->get('NameList');
					
					?>




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
						<?php  
							$query4 = $this->db->query("SELECT student.Branch 
							FROM NameList,student 
							WHERE NameList.ID_List = student.Id_Users
							AND NameList.ID_Activities = $idRepo
							GROUP BY NameList.ID_List");

					        $query = $this->db->query("SELECT student.Branch 
							 FROM NameList,student 
							 WHERE NameList.ID_List = student.Id_Users
							 AND NameList.ID_Activities = $idRepo 
							 GROUP BY Branch");
							 
							foreach ($query->result_array() as $Show)
							{
							$this->db->where('ID_Branch',$Show['Branch']);
							$showbranch = $this->db->get('Branch');
							$showbranch2 = $showbranch->row_array();
							
                            $eiei = $Show['Branch'];

							$result = $this->db->query("SELECT student.Id_Users 
							FROM NameList,student 
							WHERE NameList.ID_List = student.Id_Users
							AND NameList.ID_Activities = $idRepo
							AND student.Branch = $eiei
							GROUP BY NameList.ID_List");
							 
							 $result3 = $this->db->query("SELECT NameList.ID_NameList 
							FROM NameList,student,Activities 
							WHERE NameList.ID_List = student.Id_Users
							AND NameList.ID_Activities = $idRepo
							AND student.Branch = $eiei
							AND NameList.TimeIn IS NOT NULL
							GROUP BY NameList.ID_NameList");

							// $result2 = $this->db->query("SELECT NameList.ID_NameList 
							// FROM NameList,student,Activities 
							// WHERE NameList.ID_List = student.Id_Users
							// AND NameList.ID_Activities = $idRepo
							// AND student.Branch = $eiei
							// AND NameList.TimeIn IS NOT NULL
							// GROUP BY NameList.ID_List");
							

							$result20 = $this->db->query("SELECT NameList.ID_NameList,COUNT(*)
							 FROM NameList,student 
							 WHERE NameList.TimeIn IS NOT NULL 
							 AND NameList.ID_Activities = $idRepo
							 AND student.Branch = $eiei
							 AND NameList.ID_List = student.Id_Users 
							 GROUP BY NameList.ID_List
							 HAVING COUNT(*) >= $TestAmount");
														  ?>

						<tr>
							<th scope="row">
								<div class="media align-items-center">
									<a href="#" class="avatar rounded-circle mr-3">
										<i class="fa fa-bicycle"></i>
									</a>
									<div class="media-body">
										<span class="mb-0 text-sm">
											<p style="margin-bottom: 0px;"><?php echo $showbranch2['Name_Branch'] ?></p>
										</span>
									</div>
								</div>
			</div>
			</th>
			<td>
				<p>
					<?php echo $result->num_rows()?>
				</p>
			</td>
			<td>
				<p>
					<?php echo $result20->num_rows()?>
				</p>
			</td>
			<?php $data1 = $result->num_rows();
				  $data2 = $result20->num_rows();
				  $cal = $data2 / $data1;
				  $cal2 = $cal * 100;?>
			<td>
				<p>
					<?php echo $cal2.('%')?>
				</p>
			</td>
			<td>
				</tr>

				<?php 
				} 
				$this->db->where('ID_Activities',$idRepo);
				$this->db->group_by('ID_List');
				$namelist = $this->db->get('NameList');
							?>
			<td>
				<h2 style="text-align: center; font-weight:bold">รวม</h2>
			</td>
			<td>
				<h2 style="font-weight:bold"><?php echo $query4->num_rows()?></h2>
			</td>
			<?php					}
                                                     ?>
			</tbody>
			</table>
		</div>
        <hr>
		
	</div>
</div>



<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 32px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show"
						role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
						<h2 class="" style="font-size: 30px;">ผลการลงทะเบียนเข้าร่วมกิจกรรม <?php echo '"'.$showshowbg['Name_Activities'].'"'?></h2>
						<button class='btn btn' style="background-color: #00a81f; color: #fff;">ดาวน์โหลดผลการลงทะเบียน</button>
						<hr>
						<div class="table-responsive">
							<table class="table align-items-center table-flush noExl" id="table2excel">
								<thead class="thead-light">
									<tr>
										<th scope="col">
											<h4>ชื่อ - นามสกุล</h4>
										</th>
										<th style="text-align:center;" scope="col">
											<h4 style="text-align: left;">วันที่เข้าร่วม</h4>
										</th>
										<th style="text-align:center;" scope="col">
											<h4 style="text-align: left;">เวลาเข้าร่วม</h4>
										</th>
										<th style="text-align:center;" scope="col">
											<h4 style="text-align: left;">เวลาออก</h4>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php   foreach($result55->result_array() as $dataaa)
                                                    { ?>


									<tr>
										<th scope="row">
											<div class="media align-items-center">
												<a href="#" class="avatar rounded-circle mr-3">
													<i class="fa fa-bicycle"></i>
												</a>
												<div class="media-body">
													<span class="mb-0 text-sm">
														<p style="margin-bottom: 0px;">
															<?php echo $dataaa['Fname']." ".$dataaa['Lname'];?></p>
													</span>
												</div>
											</div>
						</div>
						</th>
						<td>
							<p>
								<?php $var_date = $dataaa['Date'];
                                                                    $strDate = $var_date;
                                                                    $strYear = date("Y",strtotime($strDate))+543;
                                                                    $strMonth= date("n",strtotime($strDate));
                                                                    $strDay= date("j",strtotime($strDate));
                                                                    $strH = date("H",strtotime($strDate));
                                                                    $stri = date("i",strtotime($strDate));
                                                                    $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                    "พฤศจิกายน","ธันวาคม");
                                                                    $strMonthThai=$strMonthCut[$strMonth];

                                                                    echo $strDay." ".$strMonthThai." ".$strYear; ?>
							</p>
						</td>
						<td>
							<p>
								<?php   $var_date = $dataaa['TimeIn'];
                                                                            $strDate = $var_date;
                                                                            $strH = date("H",strtotime($strDate));
                                                                            $stri = date("i",strtotime($strDate));
                                                                            echo $strH.":".$stri
                                                                    ?>
							</p>
						</td>
						<td>
							<p>
								<?php   $var_date = $dataaa['TimeOut'];
                                                                            $strDate = $var_date;
                                                                            $strH = date("H",strtotime($strDate));
                                                                            $stri = date("i",strtotime($strDate));
                                                                            echo $strH.":".$stri
                                                                    ?>
							</p>
						</td>

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

// $this->db->where('ID_Activities', $idRepo);
// $showbudget = $this->db->get('Activities');
// $showshowbg = $showbudget->row_array();

$this->db->where('ID_User', $showshowbg['Borrow']);
$showuse = $this->db->get('Users');
$showshowuse = $showuse->row_array();

$this->db->where('ID_Teacher', $showshowuse['Username']);
$showtea = $this->db->get('Teacher');
$showshowtea = $showtea->row_array();

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
		<h2 class="" style="font-size: 30px;">ค่าใช้จ่ายภายในกิจกรรม
			<?php echo '"'.$showshowbg['Name_Activities'].'"'?></h2>
		<h2 style="font-size: 20px;"> งบประมาณกิจกรรม :
			<?php echo number_format($showshowbgstring, 2);?> บาท</h2>
		<h4 class="" style="font-size: 20px;">งบประมาณที่ยังไม่ได้ระบุค่าใช้จ่าย :
			<?php echo number_format($showpayloan, 2);?> บาท</h4>
		<h4 class="" style="font-size: 20px;">ค่าใช้จ่ายที่ระบุรวมทั้งหมด :
			<?php echo number_format($sumget['money'], 2);?> บาท</h4>
		<hr>
		<hr>
		<h2 style="font-size: 20px;"> อาจารย์ :
			<?php echo '"'.$showshowtea['Fname'].' '.$showshowtea['Lname'].'"'.' '.'ยืมเงินทั้งหมด'?>
			<?php echo number_format($sumget1['money'], 2);?> บาท</h2>
		<h4 class="" style="font-size: 20px;">เงินยืมที่ใช้ :
			<?php echo number_format($sumget2['money'], 2);?> บาท</h4>
		<h4 class="" style="font-size: 20px;">เงินยืมคงเหลือ :
			<?php echo number_format($sumallget12, 2);?> บาท</h4>
		<hr>
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


					</tr>
					<?php }
				  } ?>
					<?php } 
					 $moneyget2 = $this->db->query("SELECT sum(Money_Use)
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


					<tr>
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

					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

<!-------------------------------------------------- ข้อมูลกิจกรรม ---------------------------------------------------------->
<div class="modal fade" id="StudentActivities" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">
					ตรวจสอบรายชื่อผู้เข้าร่วมในกิจกรรม</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			

				<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

					<!-- <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show"
						role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
						<h2 class="" style="font-size: 30px;">สรุปผลการลงทะเบียนกิจกรรม</h2>
						<hr>
						<div class="table-responsive">
							<table class="table align-items-center table-flush noExl" id="table2excel">
								<thead class="thead-light">
									<tr>
										<th scope="col">
											<h4>ชื่อ - นามสกุล</h4>
										</th>
										<th style="text-align:center;" scope="col">
											<h4 style="text-align: left;">วันที่เข้าร่วม</h4>
										</th>
										<th style="text-align:center;" scope="col">
											<h4 style="text-align: left;">เวลาเข้าร่วม</h4>
										</th>
										<th style="text-align:center;" scope="col">
											<h4 style="text-align: left;">เวลาออก</h4>
										</th>
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
														<p style="margin-bottom: 0px;">
															<?php echo $data['Fname']." ".$data['Lname'];?></p>
													</span>
												</div>
											</div>
						</div>
						</th>
						<td>
							<p>
								<?php $var_date = $data['Date'];
                                                                    $strDate = $var_date;
                                                                    $strYear = date("Y",strtotime($strDate))+543;
                                                                    $strMonth= date("n",strtotime($strDate));
                                                                    $strDay= date("j",strtotime($strDate));
                                                                    $strH = date("H",strtotime($strDate));
                                                                    $stri = date("i",strtotime($strDate));
                                                                    $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                    "พฤศจิกายน","ธันวาคม");
                                                                    $strMonthThai=$strMonthCut[$strMonth];

                                                                    echo $strDay." ".$strMonthThai." ".$strYear; ?>
							</p>
						</td>
						<td>
							<p>
								<?php   $var_date = $data['TimeIn'];
                                                                            $strDate = $var_date;
                                                                            $strH = date("H",strtotime($strDate));
                                                                            $stri = date("i",strtotime($strDate));
                                                                            echo $strH.":".$stri
                                                                    ?>
							</p>
						</td>
						<td>
							<p>
								<?php   $var_date = $data['TimeOut'];
                                                                            $strDate = $var_date;
                                                                            $strH = date("H",strtotime($strDate));
                                                                            $stri = date("i",strtotime($strDate));
                                                                            echo $strH.":".$stri
                                                                    ?>
							</p>
						</td>

						</tr>
						<?php }
                                                     ?>
						</tbody>
						</table>
					</div> -->
				</div>
		</div>
	</div>
</div>
</div>
