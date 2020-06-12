<?php $query20  =  $this->db->query("SELECT * FROM NameList WHERE ID_Activities = $id GROUP BY ID_List");
		$query21  =  $this->db->query("SELECT * FROM NameList,InTeam 
		WHERE NameList.ID_Activities = $id 
		AND NameList.ID_List = InTeam.Id_Users 
		GROUP BY ID_List");
		
		$this->db->where('ID_Activities', $id);
		$query2 = $this->db->get('Activities');
		$data2 = $query2->row_array();

		$sumquery = $query20->num_rows() - $query21->num_rows();
		$sumamount = $data2['Amount'] - $sumquery;?>
<div class="container">
	<div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px; margin-left: auto; 
    margin-right: auto; 
    } ">
		<div class="header" style="margin-bottom: 20px;">
			<img src="" alt="">
			<h2 style="">ลบผู้เข้าร่วมกิจกรรม</h2>
			<hr>
		</div>
		<form id="DeleteJoin" action="<?php echo base_url("InsertTeam/Insert") ?>" method="post">
		<div class="Login">
			<div class="TeacherRes mt-3" id="">
                    <div class="ct-example tab-content tab-example-result" style="margin: auto; padding: 1.25rem;
                            border-radius: .25rem;
                            background-color: #f7f8f9;">

                    <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
                        aria-labelledby="inputs-alternative-component-tab">
                        <p>กรุณาเลือกประเภทคนเข้าร่วม</p>
                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                        <select id="TypeDelete" name="TypeDelete" onChange="Change_TypeDelete()" required style="">
														<option selected="true" disabled="disabled" value="">กรุณาเลือกประเภทคนเข้าร่วม</option>
														<option value="Teacher">อาจารย์</option>
														<option value="Student">นักศึกษา</option>
														<option value="Employee">พนักงาน</option>
													</select>
                        <div class="table-responsive mt-4" id="ShowDelete">
                            
                    </div>
                </div>                            
			</div>
			<div class="Footer">
			<?php if($sumquery < $data2['Amount']){ ?>
								<button type="button" class="btn btn-primary btn-round mt-5"data-toggle="modal" data-target="#AlertJoin">
								<i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ</button>
							<?php }else{ ?>
								<a class="btn btn-primary btn-round mt-5" href="<?php echo base_url("InActivity/showdata/".$id) ?>">
								<i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ
							</a>
								<?php }?>
            <a onclick="DeleteJoin()" class="btn btn mt-3 mb-3"
						style="background-color: #c62121; color: #fff; display: inline-block; float: right;">ลบผู้เข้าร่วมกิจกรรม</a>
			</div>
			<div class="modal fade" id="AlertJoin" tabindex="-1" role="dialog"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title" id="exampleModalLabel">
											คำเตือน</h1>
									</div>

									<div class="modal-body">

										<h1 style="text-align: center;">ไม่สามารถไปยังหน้าถัดไปได้</h1>
										<h2 style="text-align: center;">จำนวนผู้เข้าร่วมไม่เท่ากับจำนวนที่ระบุตอนจัดกิจกรรม
										</h2>
										<h2 style="text-align: center;">เหลืออีก <?php echo $sumamount." "."คน"?></h2>
									</div>
									<div class="modal-footer">
									<a href="<?php echo base_url("InsertJoin/Showdata/".$id); ?>" class="btn btn"
									style="margin-bottom: 20px; background-color: #00a81f; color: #fff;">เพิ่มรายชื่อผู้เข้าร่วมกิจกรรมอีกครั้ง</a>
									</div>
								</div>
							</div>
						</div>
			</form>
		</div>
	</div>
