<div class="container mb-5">

	<div class="container">
		<?php          
                    if(isset($InsertActivity) && is_array($InsertActivity) && count($InsertActivity)): $i=1;
                    foreach ($InsertActivity as $key => $InAc) {   

						$this->db->where('Id_Project', $InAc['Id_Project']);
						$cvcv = $this->db->get('Project');
						$ccvv = $cvcv->row_array();
                ?>
		<?php $this->db->where('Id_Student', $this->session->userdata('ID'));
						$chat = $this->db->get('student');
						$showchat = $chat->row_array(); ?>

		<?php $datedate = date("Y-m-d");
			$D1 = strtotime($InAc['DateEnd']);
			$D2 = date("Y-m-d", strtotime("+2 Day",$D1));
			
			$D3 = strtotime($InAc['DateEnd']);
			$D4 = date("Y-m-d", strtotime("+30 Day",$D3));

			$this->db->where('Id_Users',$this->session->userdata('Id_Users'));
      $Users = $this->db->get('Position_Emp');
      $showusers = $Users->row_array();
							 ?>

		<div class="w-100"></div>
		<div class="nav-wrapper">
			<ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
				<li class="nav-item">
					<a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
						href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
							class="ni ni-cloud-upload-96 mr-2"></i>รายละเอียด</a>
				</li>
				<?php if($this->session->userdata('Id_Users') == $ccvv['Id_Users'] || $showchat['Level'] == '3' || $showusers['Name_Position'] == 'แผนกงบประมาณ' || $this->session->userdata('Id_Users') == 485)
        {?>
				<li class="nav-item">
					<a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-3-tab" data-toggle="tab"
						href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
							class="fa fa-money mr-2" aria-hidden="true"></i>จัดการงบประมาณในกิจกรรม</a>
				</li>
				<?php } ?>
				<li class="nav-item">
					<a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-6-tab" data-toggle="tab"
						href="#tabs-icons-text-6" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
							class="fa fa-users  mr-2" aria-hidden="true"></i>คณะกรรมการในกิจกรรม</a>
				</li>
				<?php if($InAc['Id_TypeJoin'] == 1){?>
				<?php }else{?>
				<li class="nav-item">
					<a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-5-tab" data-toggle="tab"
						href="#tabs-icons-text-5" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
							class="fa fa-user mr-2" aria-hidden="true"></i>ผู้เข้าร่วมกิจกรรม</a>
				</li>
				<?php }?>
				<li class="nav-item">
					<a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-2-tab" data-toggle="tab"
						href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
							class="ni ni-calendar-grid-58 mr-2"></i>เอกสารในกิจกรรมนี้</a>
				</li>

				<?php 
              $this->db->where('ID_Activities', $InAc['ID_Activities']);
              $chat2 = $this->db->get('NameList');
              $showchat2 = $chat2->row_array();

             if($this->session->userdata('Id_Users') == $ccvv['Id_Users'] || $showchat['Id_Users'] == $showchat2['ID_List'])
               {    
           $this->db->where('Id_Student', $this->session->userdata('ID'));
           $chat = $this->db->get('student');
           $showchat = $chat->row_array();
           
           ?>
				<li class="nav-item">
					<a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-4-tab" data-toggle="tab"
						href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
							class="fa fa-question mr-2" aria-hidden="true"></i>คำถาม</a>
				</li>
				<?php } ?>
			</ul>
		</div>
		<div class="card shadow w-100">
			<div class="card-body">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
						aria-labelledby="tabs-icons-text-1-tab" style="width: max;">
						<input type="hidden" id="repository_id" name="repository_id"
							value="<?php echo $InAc['ID_Activities'];?> ">




						<!-- <h1>ชื่อกิจกรรม : <?php echo $InAc['Name_Activities'];?> </h1>
						<p style="font-weight: 500;">ประเภทกิจกรรม : <?php echo $InAc['Name_TypeActivity'];?></p>
						<p style="font-weight: 500;">วันที่จัดกิจกรรม : <?php 
                                                                                            $var_date = $InAc['DateStart'];
                                                                                            $strDate = $var_date;
                                                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                                                            $strMonth= date("n",strtotime($strDate));
                                                                                            $strDay= date("j",strtotime($strDate));
                                                                                            $strH = date("H",strtotime($InAc['TimeStart']));
                                                                                            $stri = date("i",strtotime($InAc['TimeStart']));
                                                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                                            "พฤศจิกายน","ธันวาคม");
                                                                                            $strMonthThai=$strMonthCut[$strMonth];
                                                
                                                                                            echo $strDay." ".$strMonthThai." ".$strYear." เวลา ".$strH.":".$stri;
                                                                                        ?></p>
						<p style="font-weight: 500;">วันที่สิ้นสุดกิจกรรม : <?php 
                                                                                            $var_date = $InAc['DateEnd'];
                                                                                            $strDate = $var_date;
                                                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                                                            $strMonth= date("n",strtotime($strDate));
                                                                                            $strDay= date("j",strtotime($strDate));
                                                                                            $strH = date("H",strtotime($InAc['TimeEnd']));
                                                                                            $stri = date("i",strtotime($InAc['TimeEnd']));
                                                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                                            "พฤศจิกายน","ธันวาคม");
                                                                                            $strMonthThai=$strMonthCut[$strMonth];
                                                
                                                                                            echo $strDay." ".$strMonthThai." ".$strYear." เวลา ".$strH.":".$stri;
                                                                                        ?></p>
						<p class="description">รายละเอียด: <?php echo $InAc['Detail'];?></p> -->



						<div class="row">
							<div class="col mt-5 mr-5" style="width: 500px; height: 500px; background-color: #fff;">
								<span></span>
								<div id="slider" class="flexslider">

									<img style="width:475px; height:475px; margin-left: auto; margin-right: auto;"
										src="<?php echo base_url('/QrCode/Activities/'.$InAc['ID_Activities'].'.png');?>" />
								</div>
							</div>
							<div class="col mt-5" style="background-color: #fff; padding: 36px;">
								<h1>ชื่อกิจกรรม : <?php echo $InAc['Name_Activities'];?></h1>
								<p></p>
								<p style="font-weight: 500;">ประเภทกิจกรรม : <?php echo $InAc['Name_TypeActivity'];?>
								</p>
								<p style="font-weight: 500;">วันที่จัดกิจกรรม : <?php 
                                                                                            $var_date = $InAc['DateStart'];
                                                                                            $strDate = $var_date;
                                                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                                                            $strMonth= date("n",strtotime($strDate));
                                                                                            $strDay= date("j",strtotime($strDate));
                                                                                            $strH = date("H",strtotime($InAc['TimeStart']));
                                                                                            $stri = date("i",strtotime($InAc['TimeStart']));
                                                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                                            "พฤศจิกายน","ธันวาคม");
                                                                                            $strMonthThai=$strMonthCut[$strMonth];
                                                
                                                                                            echo $strDay." ".$strMonthThai." ".$strYear." เวลา ".$strH.":".$stri;
                                                                                        ?></p>
								<p style="font-weight: 500;">วันที่สิ้นสุดกิจกรรม : <?php 
                                                                                            $var_date = $InAc['DateEnd'];
                                                                                            $strDate = $var_date;
                                                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                                                            $strMonth= date("n",strtotime($strDate));
                                                                                            $strDay= date("j",strtotime($strDate));
                                                                                            $strH = date("H",strtotime($InAc['TimeEnd']));
                                                                                            $stri = date("i",strtotime($InAc['TimeEnd']));
                                                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                                            "พฤศจิกายน","ธันวาคม");
                                                                                            $strMonthThai=$strMonthCut[$strMonth];
                                                
                                                                                            echo $strDay." ".$strMonthThai." ".$strYear." เวลา ".$strH.":".$stri;
                                                                                        ?></p>
								<p class="description">รายละเอียด: <?php echo $InAc['Detail'];?></p>

								<a href="<?php echo site_url(); ?>InActivity/downloadqrcode/<?php echo $InAc['ID_Activities']?>"
									target="_blank" class="btn btn-default"
									style="margin-top: 10px; margin-bottom: 15px;"><i class="fa fa-download"></i>
									ดาวน์โหลด QR CODE</a>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
						aria-labelledby="tabs-icons-text-2-tab">
						<div class="table-responsive">
							<?php 
                                 $this->db->where('ID_Activities',$InAc['ID_Activities']);
                                 $acid = $this->db->get('Activities');
                                 $showacid = $acid->row_array();
                                 if($this->session->userdata('Id_Users') == $ccvv['Id_Users'] && $InAc['DateEnd'] > $datedate){ ?>
							<a href="<?php echo site_url(); ?>Uploadfile/uploadfileActivities/<?php echo  $InAc['ID_Activities'];?>"
								class="btn btn"
								style="margin-bottom: 20px; background-color: #00a81f; color: #fff;">เพิ่มเอกสารลงในกิจกรรมนี้</a>
							<?php  }else{ ?>

							<?php }?>


							<table class="table align-items-center table-flush" id="Filetable">
								<thead class="thead-light">
									<tr>
										<th scope="col">
											<h4>ชื่อเอกสาร</h4>
										</th>
										<th style="text-align:center;" scope="col">
											<h4>เมื่อวันที่</h4>
										</th>
										<th style="text-align:center;" scope="col">
											<h4>ดูข้อมูลเอกสาร</h4>
										</th>
										<?php 
                                 $this->db->where('ID_Activities',$InAc['ID_Activities']);
                                 $acid = $this->db->get('Activities');
                                 $showacid = $acid->row_array();
                                 if($this->session->userdata('Id_Users') == $showacid['CreateBy']){ ?>
										<th style="text-align:center;" scope="col">
											<h4>แก้ไขข้อมูลเอกสาร</h4>
										</th>
										<th style="text-align:center;" scope="col">
											<h4>ลบข้อมูลเอกสาร</h4>
										</th>
										<?php  }else{ ?>

										<?php }?>

									</tr>
								</thead>
								<tbody>

									<?php 
                    
                    $this->db->where('ID_Activities',  $InAc['ID_Activities']);
                    $data = $this->db->get('Document');
                    foreach($data->result_array() as $r)
                    {?>
									<tr>
										<?php  $this->db->where('Id_Student', $r['UploadBy']);
                          $query = $this->db->get('student');
                          $showdata = $query->row_array(); 
                  ?>
										<th scope="row">
											<div class="media align-items-center">
												<a href="#" class="avatar rounded-circle mr-3">
													<img src="<?php echo base_url().'assets/img/logofile/'. $r['Type']?>.png"
														alt="">
												</a>
												<div class="media-body">
													<span class="mb-0 text-sm"><?php echo  $r['Name_Document'];?></span>
												</div>
											</div>
										</th>
										<?php $var_date = $r['Date'];
                                                                                            $strDate = $var_date;
                                                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                                                            $strMonth= date("n",strtotime($strDate));
                                                                                            $strDay= date("j",strtotime($strDate));
                                                                                            $strH = date("H",strtotime($strDate));
                                                                                            $stri = date("i",strtotime($strDate));
                                                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                                            "พฤศจิกายน","ธันวาคม");
                                                                                            $strMonthThai=$strMonthCut[$strMonth];
                                                
                                                                                            ?>
										<td>
											<span class="badge badge-dot mr-4">
												<i class="bg-success"></i>
												<?php echo $strDay." ".$strMonthThai." ".$strYear;?>
											</span>
										</td>
										<td class="">
											<div>
												<a href="<?php echo site_url(); ?>DetailDoc/view/<?php echo  $r['ID_Document'];?>"
													class="btn btn-primary mb-3">View</a>
											</div>

										</td>

										<?php 
                                 $this->db->where('ID_Activities',$InAc['ID_Activities']);
                                 $acid = $this->db->get('Activities');
                                 $showacid = $acid->row_array();
                                 if($this->session->userdata('Id_Users') == $showacid['CreateBy'] && $InAc['DateEnd'] > $datedate){ ?>
										<td class="">

											<div>
												<a href="<?php echo site_url(); ?>EditUploadfile/edit/<?php echo  $r['ID_Document'];?>"
													class="btn btn-success mb-3">Edit</a>
											</div>

										</td>
										<td>
											<a href="<?php echo site_url(); ?>EditUploadfile/delete/<?php echo  $r['ID_Document'];?>"
												onclick="return confirm('คุณต้องการลบไฟล์นี้ใช่หรือไม่ ?')"
												class="btn btn-danger mb-3">Delete</a>
										</td>
										<?php  }else{ ?>

										<?php }?>


									</tr>
									<?php }?>
									<?php } endif; ?>
								</tbody>
							</table>
						</div>
					</div>
					</tbody>
					</table>


					<div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
						aria-labelledby="tabs-icons-text-3-tab">
						<div class="container" style="margin-bottom: 30px;" id="ShowDeposit">
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

        if($result->num_rows() == 0)
        {?>
							<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

								<div id="inputs-alternative-component"
									class="tab-pane tab-example-result fade active show" role="tabpanel"
									aria-labelledby="inputs-alternative-component-tab">
									<h2 class="" style="font-size: 30px;">ค่าใช้จ่ายภายในกิจกรรม
										<?php echo '"'.$InAc['Name_Activities'].'"'?></h2>
									<hr>
									<h2 style=" text-align: center; margin-left: auto; margin-right: auto;">
										ไม่มีค่าใช้จ่ายภายในกิจกรรม <?php echo '"'.$InAc['Name_Activities'].'"'?></h2>
									<button type="button" class="btn btn"
										style="margin-bottom: 20px; background-color: #00a81f; color: #fff;"
										data-toggle="modal" data-target="#AddLoan">
										เพิ่มค่าใช้จ่ายในกิจกรรม
									</button>
									<div class="modal fade" id="AddLoan" tabindex="-1" role="dialog"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h2 class="modal-title" id="exampleModalLabel">
														เพิ่มค่าใช่จ่ายในกิจกรรม <?php echo '"'.$InAc['Name_Activities'].'"'?></h2></h2>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<div class="modal-body">
													<form
														action="<?php echo base_url('InActivity/InsertLoan/').$idRepo; ?>"
														name="AddLoan_form" id="AddLoan_form" method="post">
														กรุณากรอกรายการ :
														<input type="text" class="form-control mt-3 mb-3 ml-2"
															id="Name_Loan" name="Name_Loan" placeholder="ค่าอาหาร">
														จำนวนเงินที่เบิก :
														<input type="text" class="form-control mt-3 mb-3 ml-2"
															id="Money" name="Money" placeholder="1000">
														กรุณาเลือกประเภทค่าใช้จ่าย :
														<select required name="Type" id="Type">
															<option value="" disabled selected>กรุณาเลือกหมวด</option>
															<option value="ค่าตอบแทน">ค่าตอบแทน</option>
															<option value="ค่าใช้สอย">ค่าใช้สอย</option>
															<option value="ค่าวัสดุ">ค่าวัสดุ</option>
														</select>
														<input type="hidden" id="ID_Activities" name="ID_Activities"
															value="<?php echo $idRepo ?>">

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">ปิด</button>
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

			$query20  =  $this->db->query("SELECT Team.ID_Team,Team.Name_Team,InTeam.Id_Users 
                                                         FROM Team LEFT JOIN InTeam ON Team.ID_Team = InTeam.ID_Team 
                                                         WHERE InTeam.ID_Activities = $idRepo 
														 GROUP BY Team.ID_Team");

			// $Date2 = strtotime("+30 Day");
			// $Date3 = date('Y-m-d',$Date2);

			// $Date4 = strtotime("+1 Day");
			// $Date5 = date('Y-m-d',$Date4);

			
        ?>

							<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

								<div id="inputs-alternative-component"
									class="tab-pane tab-example-result fade active show" role="tabpanel"
									aria-labelledby="inputs-alternative-component-tab">
									<h2 class="" style="font-size: 30px;">ค่าใช้จ่ายภายในกิจกรรม
										<?php echo '"'.$InAc['Name_Activities'].'"'?></h2>
									<h2 style="font-size: 25px;"> งบประมาณกิจกรรม :
										<?php echo number_format($showshowbgstring, 2);?> บาท</h2>
									<h3 class="" style="font-size: 25px;">งบประมาณที่ยังไม่ได้ระบุค่าใช้จ่าย :
										<?php echo number_format($showpayloan, 2);?> บาท</h3>
									<h3 class="" style="font-size: 25px;">ค่าใช้จ่ายที่ระบุรวมทั้งหมด :
										<?php echo number_format($sumget['money'], 2);?> บาท</h3>
									<?php if($this->session->userdata('Id_Users') == $ccvv['Id_Users'] && $InAc['DateEnd'] > $datedate && $InAc['Status'] != 6)
									{?>
									<button type="button" class="btn btn"
										style="margin-bottom: 20px; background-color: #00a81f; color: #fff;"
										data-toggle="modal" <?php if($showpayloan == 0){ ?> data-target="#AlertLoan"
										<?php }else{?>data-target="#AddLoanshow" <?php }?>>
										เพิ่มค่าใช้จ่ายในกิจกรรม
									</button>
									<?php }?>
									<?php if($this->session->userdata('Id_Users') == $ccvv['Id_Users'] && $D2 <= $datedate && $D4 > $datedate && $InAc['Status'] != 6)
									{?>
									<a href="<?php echo site_url(); ?>Payloan/ClearMoney/<?php echo $idRepo;?>"
										class="btn btn-warning"
										onclick="return confirm('โปรดตรวจสอบจำนวนเงินที่ระบุให้แน่ใจก่อนกดปุ่มเคลียร์เงิน?')"
										style="color: #fff; margin-bottom: 20px;">เคลียร์เงิน</a>
									<?php }else if($this->session->userdata('Id_Users') == $ccvv['Id_Users'] && $InAc['Status'] == 6){ ?>
									<a href="<?php echo site_url(); ?>End/ShowAll/<?php echo $idRepo;?>"
										class="btn btn-primary"
										style="color: #fff; margin-bottom: 20px;">สรุปกิจกรรม</a>
									<?php }else{  ?>
									<?php }?>

									<div class="modal fade" id="AddLoanshow" tabindex="-1" role="dialog"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h2 class="modal-title" id="exampleModalLabel">
														เพิ่มค่าใช่จ่ายในกิจกรรม <?php echo '"'.$InAc['Name_Activities'].'"'?></h2></h2>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<div class="modal-body">
													<form
														action="<?php echo base_url('InActivity/InsertLoan/').$idRepo; ?>"
														name="InsertLoan_form" id="InsertLoan_form" method="post">

														กรุณากรอกรายการ :
														<input type="text" class="form-control mt-3 mb-3 ml-2"
															id="Name_Loan" name="Name_Loan" placeholder="ค่าอาหาร">
														จำนวนเงิน:
														<input type="number" class="form-control mt-3 mb-3 ml-2"
															id="Money" name="Money" min="0"
															max="<?php echo $showpayloan;?>" placeholder="1000"
															title="Test">
														กรุณาเลือกประเภทค่าใช้จ่าย :
														<select required name="Type" id="Type">
															<option value="" disabled selected>กรุณาเลือกประเภท</option>
															<option value="ค่าตอบแทน">ค่าตอบแทน</option>
															<option value="ค่าใช้สอย">ค่าใช้สอย</option>
															<option value="ค่าวัสดุ">ค่าวัสดุ</option>
														</select>
														<input type="hidden" id="ID_Activities" name="ID_Activities"
															value="<?php echo $idRepo ?>">

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">ปิด</button>
													<button type="submit" class="btn btn-success">ยืนยัน</button>
												</div>
												</form>

											</div>
										</div>
									</div>


									<!-------------------------------------------------- end modal ---------------------------------------------------------->

									<!-- Modal -->
									<!-- <div class="modal fade" id="CheckAllLoan" tabindex="-1" role="dialog"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h2 class="modal-title" id="exampleModalLabel">ตรวจสอบยอดเงินคงเหลือ
													</h2>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<?php $i = 0; ?>
												<div class="modal-body">
													<p>งบประมาณกิจกรรม :
														<?php echo number_format($showshowbgstring, 2);?> บาท</p>
													<p>จำนวนเงินที่เบิกทั้งหมด :
														<?php echo number_format($sumget['money'], 2);?> บาท</p>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">ปิด</button>

												</div>
												</form>

											</div>
										</div>
									</div> -->
									<hr>

									<div class="modal fade" id="AlertLoan" tabindex="-1" role="dialog"
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

													<h1 style="text-align: center;">ไม่สามารถเพิ่มค่าใช้จ่ายได้</h1>
													<h2 style="text-align: center;">
														เนื่องจากค่าใช้จ่ายในกิจกรรมเกินงบประมาณของกิจกรรม</h2>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">ปิด</button>
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade" id="AlertInTeam" tabindex="-1" role="dialog"
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

													<h1 style="text-align: center;">ไม่สามารถเพิ่มค่าใช้จ่ายได้</h1>
													<h2 style="text-align: center;">
														เนื่องจากคณะกรรมการในกิจกรรมนี้มีไม่ครบ 3 ตำแหน่ง</h2>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">ปิด</button>
												</div>
											</div>
										</div>
									</div>

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
															<?php if($this->session->userdata('Id_Users') == $ccvv['Id_Users'] && $InAc['DateEnd'] > $datedate && $InAc['Status'] != 6)
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
																					id="Money" name="Money" min="0"
																					max="<?php echo $showcal;?>"
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
														<h2 style="text-align: center; font-weight:bold">
															<?php echo number_format($i, 2);?></h2>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>


					<!--------------------------------------------------------- คำถาม ------------------------------------------------------>
					<div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
						aria-labelledby="tabs-icons-text-4-tab">
						<div class="table-responsive" id="ShowChat" style="height: 500px;  overflow-y: auto;">

						</div>
						<div class="ct-example tab-content tab-example-result"
							style="padding: 1.25rem;
                  border-radius: .25rem;
                  background-color: #f7f8f9;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
							<h3 style="text-align: center; color:#2d3436;">โพสต์คำถาม</h3>
							<form name="sendchat" id="sendchat_form" method="post">
								<textarea class="form-control form-control-alternative" name="Post" id="text" rows="3"
									required placeholder="เขียนคำถามที่คุณต้องการคำถามลงไปที่นี่"></textarea>
								<button type="submit" id="hll" class="btn btn btn-lg"
									style="margin-top: 44px; margin-bottom: 44px; width:120px; background-color: #00a81f; color: #fff;">ยืนยันโพสต์</button>
							</form>
						</div>
					</div>




					<!--------------------------------------------------------- ผู้เข้าร่วมกิจกรรม ------------------------------------------------------>

					<div class="tab-pane fade" id="tabs-icons-text-5" role="tabpanel"
						aria-labelledby="tabs-icons-text-5-tab">
						<div class="table-responsive" id="ShowList">

							<?php
                     $idAc = $InAc['ID_Activities'];
                          $result = $this->db->query("SELECT *
                          FROM NameList,student
                        --   WHERE NameList.ID_List = student.Id_Users
                          WHERE ID_Activities = $idAc ");
                          
                          // $result3 = $this->db->query("SELECT DISTINCT ID_Branch
                          // FROM NameList
                          // WHERE ID_Activities = $idAc ");

                if($result->num_rows() == 0)
                {?>
							<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

								<div id="inputs-alternative-component"
									class="tab-pane tab-example-result fade active show" role="tabpanel"
									aria-labelledby="inputs-alternative-component-tab">
									<h2 class="" style="font-size: 30px;">จัดการผู้เข้าร่วมกิจกรรม
										<?php echo '"'.$InAc['Name_Activities'].'"'?></h2>

									<?php 
                                 $this->db->where('ID_Activities',$idAc);
                                 $acid = $this->db->get('Activities');
                                 $showacid = $acid->row_array();
                                 if($this->session->userdata('Id_Users') == $ccvv['Id_Users'] && $InAc['DateEnd'] > $datedate){ ?>
									<!-- <button type="button" class="btn btn-primary"
										style="margin-bottom: 20px; color: #fff;" data-toggle="modal"
										data-target="#AddBranchInActivity2">
										กำหนดจำนวนผู้เข้าร่วมตามสาขา
									</button> -->
									<!-- <button type="button" class="btn btn"
										style="margin-bottom: 20px; background-color: #00a81f; color: #fff;"
										data-toggle="modal" data-target="#AddListInActivity">
										ตรวจสอบจำนวนผู้เข้าร่วมในสาขา
									</button> -->
									<a href="<?php echo base_url('InsertJoin/showdata/').$idAc ?>" class="btn btn"
										style="margin-bottom: 20px; background-color: #00a81f; color: #fff;">เพิ่มผู้เข้าร่วมกิจกรรม</a>
									<!-- <button type="button" class="btn btn"
										style="margin-bottom: 20px;     background-color: #c62121; color: #fff;"
										data-toggle="modal" data-target="#DeleteListInActivityshow">
										ลบสาขาที่เข้าร่วม
									</button> -->
									<a href="<?php echo base_url('DeleteJoin/showdata/').$idAc ?>" class="btn btn"
										style="margin-bottom: 20px; background-color: #c62121; color: #fff;">ลบผู้เข้าร่วมกิจกรรม</a>
									<?php  }else{ ?>
									<?php }?>

									<?php $moneyL = $this->db->query("SELECT SUM(Amount) FROM BranchInActivities WHERE ID_Activities = $idRepo") ;
									  $moneyList = $moneyL->row_array(); 
									  
									  $AmountSum = $moneyList['SUM(Amount)'];
									  $AmountList = $showacid['Amount'];
									  $ShowAmount = $AmountList - $AmountSum;
								      ?>

									<div class="modal fade" id="AddBranchInActivity2" tabindex="-1" role="dialog"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title" id="exampleModalLabel">
														กำหนดจำนวนผู้เข้าร่วมตามสาขา</h1>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<div class="modal-body">

													<div class="form-group">
														<form
															action="<?php echo base_url('InActivity/InsertBranchInActivities/').$idAc; ?>"
															name="AddList_form" id="AddList_form" method="post">
															<p>กรุณาเลือกคณะ :</p>
															<select required name="Major" id="Major"
																onChange="Change_Major()">
																<option value="">กรุณาเลือกคณะ</option>
																<option value="1">คณะบริหารธุรกิจและเทคโนโลยีสารสนเทศ
																</option>
																<option value="2">คณะศิลปศาสตร์</option>
															</select>
													</div>

													<div class="form-group">
														<p>กรุณาเลือกสาขา :</p>
														<select required name="Branch" id="Branch">
															<option value="">กรุณาเลือกสาขา</option>
														</select>
													</div>
													<p>จำนวน</p>

													<div class="form-group">
														<input type="number" min='0' max='<?php echo $ShowAmount?>'
															class="form-control" id="Amount" name="Amount"
															placeholder="กรุณากรอกจำนวน" required>
													</div>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">ปิด</button>
													<button type="submit" class="btn btn-success">ยืนยัน</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<!-- ------------------------------------------------------------------------------------------------------------- -->


									<div class="modal fade" id="AddListInActivity" tabindex="-1" role="dialog"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h2 class="modal-title" id="exampleModalLabel">
														ตรวจสอบจำนวนผู้เข้าร่วมในสาขา</h2>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<div class="modal-body">
													<form
														action="<?php echo base_url('InActivity/InsertListInActivity/').$idAc; ?>"
														name="AddList_form" id="AddList_form" method="post">
														<div class="form-group">
															<p>กรุณาเลือกคณะ :</p>
															<select required name="Major" id="Major"
																onChange="Change_Major()">
																<option value="">กรุณาเลือกคณะ</option>
																<option value="1">คณะบริหารธุรกิจและเทคโนโลยีสารสนเทศ
																</option>
																<option value="2">คณะศิลปศาสตร์</option>
															</select>
														</div>

														<div class="form-group">
															<p>กรุณาเลือกสาขา :</p>
															<select required name="Branch" id="Branch">
																<option value="">กรุณาเลือกสาขา</option>
															</select>
														</div>
														<div class="form-group">
															กรุณาเลือกชั้นปี :
															<select required name="Year" id="Year">
																<option value="">กรุณาเลือกชั้นปี</option>
																<option value="1">นักศึกษาชั้นปีที่ 1</option>
																<option value="2">นักศึกษาชั้นปีที่ 2</option>
																<option value="3">นักศึกษาชั้นปีที่ 3</option>
																<option value="4">นักศึกษาชั้นปีที่ 4</option>
															</select>
														</div>
														<input type="hidden" id="ID_Activities" name="ID_Activities"
															value="<?php echo $idAc ?>">

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">ปิด</button>
													<button type="submit" class="btn btn-success">ยืนยัน</button>

												</div>
												</form>
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

									<div id="inputs-alternative-component"
										class="tab-pane tab-example-result fade active show" role="tabpanel"
										aria-labelledby="inputs-alternative-component-tab">
										<h2 class="" style="font-size: 30px;">จัดการสาขาที่เข้าร่วมในกิจกรรม
											<?php echo '"'.$InAc['Name_Activities'].'"'?></h2>

										<?php 
										$this->db->where('ID_Activities', $idAc);
										$query = $this->db->get('NameList');
										$data = $query->num_rows();

										$this->db->where('ID_Activities', $idAc);
										$query2 = $this->db->get('Activities');
										$data2 = $query2->row_array();
												
										$remaining = $data2['Amount'] - $data;
								?>


										<?php 
                                 $this->db->where('ID_Activities',$idAc);
                                 $acid = $this->db->get('Activities');
                                 $showacid = $acid->row_array();
                                 if($this->session->userdata('Id_Users') == $ccvv['Id_Users'] && $InAc['DateEnd'] > $datedate){ ?>
										<!-- <button type="button" class="btn btn-primary"
											style="margin-bottom: 20px; color: #fff;" data-toggle="modal"
											data-target="#AddBranchInActivity">
											กำหนดจำนวนผู้เข้าร่วมตามสาขา
										</button> -->
										<!-- <button type="button" class="btn btn"
											style="margin-bottom: 20px; background-color: #00a81f; color: #fff;"
											data-toggle="modal"
											<?php if($remaining != 0){?>data-target="#AddListInActivityshow"
											<?php }else{?> data-target="#NoAddList" <?php }?>>
											ตรวจสอบจำนวนผู้เข้าร่วมในสาขา
										</button> -->
										<a href="<?php echo base_url('InsertJoin/showdata/').$idAc ?>" class="btn btn"
											style="margin-bottom: 20px; background-color: #00a81f; color: #fff;">เพิ่มผู้เข้าร่วมกิจกรรม</a>
										<!-- <button type="button" class="btn btn"
											style="margin-bottom: 20px;     background-color: #c62121; color: #fff;"
											data-toggle="modal" data-target="#DeleteListInActivityshow">
											ลบสาขาที่เข้าร่วม
										</button> -->
										<a href="<?php echo base_url('DeleteJoin/showdata/').$idAc ?>" class="btn btn"
											style="margin-bottom: 20px; background-color: #c62121; color: #fff;">ลบผู้เข้าร่วมกิจกรรม</a>
										<?php  }else{ ?>

										<?php }?>

										<div class="modal fade" id="AddBranchInActivity" tabindex="-1" role="dialog"
											aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title" id="exampleModalLabel">
															กำหนดจำนวนผู้เข้าร่วมตามสาขา</h1>
														<button type="button" class="close" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>

													<div class="modal-body">

														<div class="form-group">
															<form
																action="<?php echo base_url('InActivity/InsertBranchInActivities/').$idAc; ?>"
																name="AddList_form" id="AddList_form" method="post">
																<p>กรุณาเลือกคณะ :</p>
																<select required name="Major" id="Major"
																	onChange="Change_Major()">
																	<option value="">กรุณาเลือกคณะ</option>
																	<option value="1">
																		คณะบริหารธุรกิจและเทคโนโลยีสารสนเทศ</option>
																	<option value="2">คณะศิลปศาสตร์</option>
																</select>
														</div>

														<div class="form-group">
															<p>กรุณาเลือกสาขา :</p>
															<select required name="Branch" id="Branch">
																<option value="">กรุณาเลือกสาขา</option>
															</select>
														</div>
														<p>จำนวน</p>

														<div class="form-group">
															<input type="number" min='0' max='<?php echo $ShowAmount?>'
																class="form-control" id="Amount" name="Amount"
																placeholder="กรุณากรอกจำนวน" required>
														</div>

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">ปิด</button>
														<button type="submit" class="btn btn-success">ยืนยัน</button>
													</div>
													</form>
												</div>
											</div>
										</div>


										<!--------------------------------------- Modal ---------------------------------------------------------------------->
										<div class="modal fade" id="NoAddList" tabindex="-1" role="dialog"
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

														<h2 style="text-align: center;">รายชื่อเต็มแล้วไม่สามารถเพิ่มได้
														</h2>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">ปิด</button>
													</div>
												</div>
											</div>
										</div>


										<!--------------------------------------- Modal ---------------------------------------------------------------------->
										<div class="modal fade" id="AddListInActivityshow" tabindex="-1" role="dialog"
											aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h2 class="modal-title" id="exampleModalLabel">
															ตรวจสอบจำนวนผู้เข้าร่วมในสาขา</h2>
														<button type="button" class="close" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>

													<div class="modal-body">
														<table class="table align-items-center table-flush"
															id="Filesearch">
															<thead class="thead-light">
																<tr>
																	<th scope="col">
																		<h4>ชื่อสาขา</h4>
																	</th>
																	<th style="text-align:center;" scope="col">
																		<h4 style="text-align: left;">จำนวน</h4>
																	</th>
																	<th style="text-align:center;" scope="col">
																		<h4 style="text-align: left;">เข้าร่วม</h4>
																	</th>
																</tr>
															</thead>
															<tbody>
																<?php $this->db->where('ID_Activities', $idAc);
																		$query10 = $this->db->get('BranchInActivities');
																		
																	  foreach($query10->result_array() as $data) 
																		
							{?>
																<tr>
																	<th scope="row">
																		<p><?php echo $showshow['Name_Branch'];?></p>
													</div>
													</th>
													<td>
														<span class="badge badge-dot mr-4">
															<p><?php echo $data['Amount'];?></p>
														</span>
													</td>
													<td>
														<span class="badge badge-dot mr-4">
															<p><?php echo $data['Branch'];?></p>
														</span>
													</td>

													<?php } ?>
													</tbody>
													</table>


												</div>
												<div class="modal-footer">


													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">ปิด</button>

												</div>
												</form>

											</div>
										</div>
									</div>
								</div>










								<div class="modal fade" id="DeleteListInActivityshow" tabindex="-1" role="dialog"
									aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h2 class="modal-title" id="exampleModalLabel">
													ลบรายชื่อสาขาที่เข้าร่วมในกิจกรรม
													<?php echo '"'.$InAc['Name_Activities'].'"'?></h2>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body">
												<form
													action="<?php echo base_url('InActivity/DeleteAllListInActivity/').$idAc; ?>"
													name="Delete_form" id="Delete_form" method="post">
													<div class="form-group">
														กรุณาเลือกสาขา :
														<select required name="List" id="List">
															<option value="" disabled="disabled">กรุณาเลือกสาขา
															</option>
															<option value="1">สาขาวิทยาการคอมพิวเตอร์</option>
															<option value="2">สาขาการตลาด</option>
															<option value="3">สาขาบัญชี</option>
															<option value="4">สาขาการจัดการ</option>
															<option value="5">สาขาเทคโนโลยีโลจิสติกส์และการจัดการ
															</option>
															<option value="6">สาขาการโฆษณาฯ</option>
															<option value="7">สาขาเศรษฐศาสตร์</option>
															<option value="8">สาขามัลติมีเดีย</option>
															<option value="9">สาขาระบบสารสนเทศฯ</option>
															<option value="10">สาขาเทคโนโลยีคอมพิวเตอร์</option>
															<option value="11">สาขาการท่องเที่ยว</option>
														</select>
													</div>
													<input type="hidden" id="ID_Activities" name="ID_Activities"
														value="<?php echo $idAc ?>">

											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary"
													data-dismiss="modal">ปิด</button>
												<button type="submit" class="btn btn-success">ยืนยันการลบ</button>
											</div>
											</form>

										</div>
									</div>
								</div>
								<!-- id TypeJoin onchange Change_TypeJoin()
								table-responsive TypeJoinn -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<p>กรุณาเลือกประเภทคนเข้าร่วม</p>
											<input type="hidden" name="id" id="id" value="<?php echo $idAc ?>">
											<select id="TypeShow" name="TypeShow" onChange="Change_TypeNewShow2()"
												required style="">
												<option selected="true" disabled="disabled" value="">
													กรุณาเลือกประเภทคนเข้าร่วม</option>
												<option value="Teacher">อาจารย์</option>
												<option value="Student">นักศึกษา</option>
												<option value="Employee">พนักงาน</option>
											</select>
										</div>
									</div>
								</div>
								<!-- ------------------------------------------------ end modal -------------------------------------------------------- -->
								<hr>
								<div id="inputs-alternative-component"
									class="tab-pane tab-example-result fade active show" role="tabpanel"
									aria-labelledby="inputs-alternative-component-tab">
									<h2 class="" style="font-size: 30px;">รายชื่อผู้เข้าร่วมที่เข้าร่วมกิจกรรม
										<?php echo '"'.$InAc['Name_Activities'].'"'?></h2>
									<div class="table-responsive" id="ShowNew">
									</div>
								</div>

								<?php
                    } ?>
							</div>
						</div>
					</div>








					<!---------------------------------------------- คณะกรรมการในกิจกรรม ---------------------------------------->

					<div class="tab-pane fade" id="tabs-icons-text-6" role="tabpanel"
						aria-labelledby="tabs-icons-text-6-tab">
						<div class="table-responsive" id="ShowTeam">

						</div>
						<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">
							<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show"
								role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
								<h2 class="" style="font-size: 30px;">จัดการคณะกรรมการในกิจกรรม
									<?php echo '"'.$InAc['Name_Activities'].'"'?></h2>

								<?php 
                                 $this->db->where('ID_Activities',$idAc);
                                 $acid = $this->db->get('Activities');
                                 $showacid = $acid->row_array();
                                    ?>
								<?php if($this->session->userdata('Id_Users') == $ccvv['Id_Users'] && $InAc['DateEnd'] > $datedate)
								   {?>
								<a href="<?php echo base_url("InsertTeam/Showdata/".$idAc); ?>" class="btn btn"
									style="margin-bottom: 20px; background-color: #00a81f; color: #fff;">เพิ่มรายชื่อในคณะกรรมการ</a>

								<a href="<?php echo base_url("EditTeam/Showdata/".$idAc); ?>" class="btn btn"
									style="margin-bottom: 20px;background-color: #c62121; color: #fff;">ลบรายชื่อในคณะกรรมการ</a>

								<?php }?>





								<!------------------------------------------- ตารางคณะกรรมการ---------------------------------------------- -->

								<div class="table-responsive">
									<?php
                            $query  =  $this->db->query("SELECT Team.ID_Team,Team.Name_Team,InTeam.Id_Users 
                                                         FROM Team LEFT JOIN InTeam ON Team.ID_Team = InTeam.ID_Team 
                                                         WHERE InTeam.ID_Activities = $idAc 
                                                         GROUP BY Team.ID_Team");

                            $query2  =  $this->db->query("SELECT *
                            FROM InTeam
                            WHERE InTeam.ID_Activities = $idAc ");
								$i = 1;
                                foreach ($query->result_array() as $Show)
                                { 
                                  ?>
									<h2><?php echo $i."."." ".$Show['Name_Team'] ?></h2>

									<?php  
											$i++;
										  foreach ($query2->result_array() as $Show2)
                                          { 
                                            if($Show['ID_Team'] == $Show2['ID_Team']){

                                              $this->db->where('Id_Users', $Show2['Id_Users']);
											  $qq = $this->db->get('student', 1);
											  
											  $this->db->where('Id_Users', $Show2['Id_Users']);
											  $tt = $this->db->get('Teacher', 1);

                                              if($qq->num_rows() == 1)
                                              {
                                                $aa = $qq->row_array();
                                              }else if($tt->num_rows() == 1){

                                                $this->db->where('Id_Users', $Show2['Id_Users']);
                                                $qq = $this->db->get('Teacher', 1);
                                                $aa = $qq->row_array();

                                              }else{
												$this->db->where('Id_Users', $Show2['Id_Users']);
                                                $qq = $this->db->get('Employee', 1);
                                                $aa = $qq->row_array();
											  }
                                              
											  $this->db->where('Id_Title', $aa["Id_Title"]);
											  $z = $this->db->get('Title', 1);
											  
											  $zxc = $z->row_array();
											  
                                             ?>

									<p style="margin-left: 30px">
										<?php echo "- ".$zxc["Name_Title"].$aa['Fname']." ".$aa['Lname']?>
										<?php 

                                 $this->db->where('ID_Activities',$idAc);
                                 $acid = $this->db->get('Activities');
                                 $showacid = $acid->row_array();
                                 if($this->session->userdata('Id_Users') == $showacid['CreateBy']){ ?>
									</p>
									<?php  }else{ ?>

									<?php }?>


									<?php           } 
                                          }
                                }   ?>
								</div>
							</div>


						</div>
					</div>
				</div>






				<div class="table-responsive" id="ShowTeam">

				</div>
				<div class="table-responsive" id="ShowList">

				</div>

			</div>
		</div>

		<script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
		<script>
			$(document).ready(function (e) {
				ShowChat();
				setInterval(ShowChat, 3000);
			});

			function ShowChat() {
				var val = document.getElementById('repository_id').value
				$.post("<?=base_url('InActivity/ShowChat/')?>" + val,
					function (data) {

						$("#ShowChat").html(data);
					}
				);
			}

			function reply($idUser) {
				console.log($idUser)
				var Id = String($idUser);
				$("#text").val("ตอบกลับคุณ : " + Id + ",");
			}

		</script>

		<script>
			$(document).on('submit', '#sendchat_form', function () {
				var val = document.getElementById('repository_id').value
				$.post("<?=base_url('InActivity/InsertPost/')?>" + val, $("#sendchat_form").serialize(),
					function (data) {
						ShowChat();
						$("#text").val("");
					}
				);

				event.preventDefault();
			});

		</script>
