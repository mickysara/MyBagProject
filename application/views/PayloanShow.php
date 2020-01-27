                                           


							<?php
                            
                       $repostrnono = base_url(uri_string());
                       $arraystate2 = (explode("/",$repostrnono));
                       $idRepo = ($arraystate2[6]);

                      $this->db->where('ID_Activities',$idRepo);
                      $result = $this->db->get('Loan');   

                      $moneyget = $this->db->query("SELECT sum(Money_Get)
                      as moneyget
                      FROM Loan
                      WHERE ID_Activities = '$idRepo'");
                        $sumget =  $moneyget->row_array();

                        $moneyuse = $this->db->query("SELECT sum(Money_Use)
                                    as moneyuse
                                    FROM Loan
                                    WHERE ID_Activities = '$idRepo'");
                        $sumuse =  $moneyuse->row_array();

                        $intget = (int)$sumget['moneyget'];;
                        $intuse = (int)$sumuse['moneyuse'];;
                        $sumall = $intget - $intuse;
                        $showsum = (string)$sumall;
                        

                        $this->db->where('ID_Activities', $idRepo);
                        $showbudget = $this->db->get('Activities');
                        $showshowbg = $showbudget->row_array();
                        
                        $showshowbgstring = (string)$showshowbg['Budget'];
                ?>

                                <div class="container">

                                <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                                            border-radius: .25rem;
                                            background-color: #f7f8f9;">

								<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show"
									role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
									<h2 class="" style="font-size: 30px;">ตรวจสอบค่าใช้จ่าย</h2>	
                                    <button type="button" class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal"
										data-target="#CheckAllLoan">
										ตรวจสอบยอดเงินคงเหลือ
									</button>	

                                    <a href="<?php echo site_url(); ?>Payloan/Approve/<?php echo $idRepo;?>"
										class="btn btn mb-3" style="background-color: #00a81f; color: #fff;">อนุมัติ</a>	
                                        		
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
												<p>จำนวนเงินที่เบิกทั้งหมด : <?php echo $sumget['moneyget'];?> บาท</p>
												<p>จำนวนเงินที่ใช้ทั้งหมด : <?php echo $sumuse['moneyuse'];?> บาท</p>
												<p>คงเหลือ : <?php echo $showsum;?> บาท</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

											</div>
											

										</div>
									</div>
								</div>

								
	
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
													<h4 style="text-align: left;">จำนวนเงินที่เบิก</h4>
												</th>
												<th style="text-align:center;" scope="col">
													<h4 style="text-align: left;">จำนวนเงินที่ใช้</h4>
												</th>
												<th style="text-align:center;" scope="col">
													<h4 style="text-align: left;">เมื่อวันที่</h4>
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
									<p><?php echo $data['Money_Get'];?></p>
								</td>
								<td>
									<p><?php echo $data['Money_Use'];?></p>
								</td>
								<td>
									<span class="badge badge-dot mr-4">
										<p><?php 
                                                                                            $var_date = $data['Date'];
                                                                                            $strDate = $var_date;
                                                                                            $strYear = date("Y",strtotime($strDate))+543;
                                                                                            $strMonth= date("n",strtotime($strDate));
                                                                                            $strDay= date("j",strtotime($strDate));
                                                                                            $strH = date("H",strtotime($strDate));
                                                                                            $stri = date("i",strtotime($strDate));
                                                                                            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                                            "พฤศจิกายน","ธันวาคม");
                                                                                            $strMonthThai=$strMonthCut[$strMonth];
                                                
                                                                                            echo $strDay." ".$strMonthThai." ".$strYear;
                                                                                        ?></p>
									</span>
								</td>
							
								</tr>
								<?php } ?>
								</tbody>
								</table>
							</div>
						</div>
                        </div>

						
					
				