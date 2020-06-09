<?php $query20  =  $this->db->query("SELECT Team.ID_Team,Team.Name_Team,InTeam.Id_Users 
		FROM Team LEFT JOIN InTeam ON Team.ID_Team = InTeam.ID_Team 
		WHERE InTeam.ID_Activities = $id 
		AND Team.ID_Team != 4
        AND Team.ID_Team != 5
        AND Team.ID_Team != 6
        AND Team.ID_Team != 7
		GROUP BY Team.ID_Team");?>
<div class="container">
	<div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px; margin-left: auto; 
    margin-right: auto; 
    } ">
		<div class="header" style="margin-bottom: 20px;">
			<img src="" alt="">
			<h2 style="">ลบคณะกรรมการ</h2>
			<hr>
		</div>
		<form id="EditTeam" action="<?php echo base_url("InsertTeam/Insert") ?>" method="post">
		<div class="Login">
			<div class="TeacherRes mt-3" id="">
                    <div class="ct-example tab-content tab-example-result" style="margin: auto; padding: 1.25rem;
                            border-radius: .25rem;
                            background-color: #f7f8f9;">

                    <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
                        aria-labelledby="inputs-alternative-component-tab">
                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                        <p>กรุณาเลือกประเภทบุคคล</p>
                        <select id="TypeDelete" name="TypeDelete" onChange="Change_TeamDelete2()" required style="">
														<option selected="true" disabled="disabled" value="">กรุณาเลือกประเภทบุคคล</option>
														<option value="Teacher">อาจารย์</option>
														<option value="Student">นักศึกษา</option>
														<option value="Employee">พนักงาน</option>
													</select>
                        <div class="table-responsive mt-5" id="DeleteTeam">
                    </div>
                </div>                            
			</div>
			<div class="Footer">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
			<?php if($query20->num_rows() < 3){ ?>
								<button type="button" class="btn btn-primary btn-round mt-5"data-toggle="modal" data-target="#AlertInTeam">
								<i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ</button>
							<?php }else{ ?>
								<a class="btn btn-primary btn-round mt-5" href="<?php echo base_url("InActivity/showdata/".$id) ?>">
								<i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ
							</a>
								<?php }?>
            <a onclick="DeleteTeam()" class="btn btn mt-3 mb-3"
						style="background-color: #c62121; color: #fff; inline-block; float: right;">ลบคณะกรรมการ</a>		
			</div>
			<div class="modal fade" id="AlertInTeam" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title" id="exampleModalLabel">
										คำเตือน</h1>
								</div>

								<div class="modal-body">

									<h1 style="text-align: center;">ไม่สามารถไปยังหน้าถัดไปได้</h1>
									<h2 style="text-align: center;">
										เนื่องจากคณะกรรมการในกิจกรรมนี้มีไม่ครบ 3 ตำแหน่ง</h2>
									<h3 style="text-align: center;"></h3>
									<h3 style="text-align: center; color:red;">
										** ต้องมีอย่างน้อยคือตำแหน่ง อำนวยการ ดำเนินการ ฝ่ายการเงินและบัญชี **</h3>
								</div>
								<div class="modal-footer">
								<a href="<?php echo base_url("InsertTeam/Showdata/".$id); ?>" class="btn btn"
									style="margin-bottom: 20px; background-color: #00a81f; color: #fff;">เพิ่งรายชื่อคณะกรรมการใหม่อีกครั้ง</a>
								</div>
							</div>
						</div>
					</div>
			</form>
		</div>
	</div>
