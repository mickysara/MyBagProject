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
            <a class="btn btn-primary btn-round mt-3" href="<?php echo base_url("InActivity/showdata/".$id) ?>">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ
            </a>
            <a onclick="DeleteTeam()" class="btn btn mt-3 mb-3"
						style="background-color: #c62121; color: #fff; inline-block; float: right;">ลบคณะกรรมการ</a>
			</div>
			</form>
		</div>
	</div>
