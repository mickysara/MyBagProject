<div class="container">
	<!-- <form method="post" action="<?php echo site_url('Project/InsertProject')?>"  enctype='multipart/form-data'> -->
	<form id="ProjectForm" action="<?php echo site_url('Project/InsertProject')?>" name="ProjectForm" method="post"
		enctype='multipart/form-data'>
		<div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px;margin-left: auto; margin-bottom: 50px;
    margin-right: auto; border: 1px solid #D8D9DC;">
			<div class="header" style="margin-bottom: 20px;">
				<img src="" alt="">
				<h2 style="">สร้างโครงการของนักศึกษา</h2>
				<hr>
			</div>

			<div class="Login">
				<div class="row">
					<div class="col-md-8">
						<p>ชื่อโครงการใหญ่</p>
						<div class="form-group">
							<input type="text" class="form-control" name="Name" id="Name" placeholder="ชื่อโครงการ"
								style="max-width: 400px ;background: #fcfcfc; color: #000 ; margin-bottom: 20px"
								required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<p>ผลผลิต</p>
						<div class="form-group">
							<?php 
								$query = $this->db->get('Result');
								$i = 0;
								foreach($query->result_array() as $data)
								{ ?>
							<div class="custom-control custom-radio mb-3">
								<input name="Result" class="custom-control-input" id="customRadio<?php echo $i ?>"
									value="<?php echo $data['Id_Result'] ?>" type="radio" required>
								<label class="custom-control-label"
									for="customRadio<?php echo $i ?>"><?php echo $data['Name_Result'] ?></label>
							</div>
							<?php $i++ ?>
							<?php }	 ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<p>ประเภทโครงการ</p>
						<div class="form-group">
							<?php 
								$query = $this->db->get('TypeProject');
								
								foreach($query->result_array() as $data)
								{ ?>

							<div class="custom-control custom-radio mb-3">
								<input name="Type" class="custom-control-input" id="customRadio<?php echo $i ?>"
									value="<?php echo $data['Id_TypeProject'] ?>" type="radio" required>
								<label class="custom-control-label"
									for="customRadio<?php echo $i ?>"><?php echo $data['Name_TypeProject'] ?></label>
							</div>
							<?php $i++; ?>
							<?php  }
							
						 ?>
						</div>
					</div>
				</div>
				<!-- <div class="row"> -->
					<!-- <div class="col-md-8">
						<p>ชื่อผู้รับผิดชอบ</p>
						<div class="form-group">
							<input onChange="CheckUsername()" type="text" class="form-control" name="Res" id="Res" placeholder="ชื่อ - นามสกุล"
								style="max-width: 400px ;background: #fcfcfc; color: #000 ; margin-bottom: 20px" required>
						</div>
						<p id = "showcheck" name = "showcheck"  value = "yes"></p>
					</div> -->
					<!-- <p>ประเภทผู้รับผิดชอบโครงการ</p>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<select name="TypeRes" id="TypeRes" style="height: 35px;" required
									onChange="Change_TypeRes()">
									<option value="" disabled selected>กรุณาเลือกประเภท</option>
									<option value="1">นักเรียน</option>
									<option value="2">อาจารย์</option>
								</select>
							</div>
						</div>
					</div> -->

					<p>สาขาของผู้รับผิดชอบโครงการ</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<select name="BranchRes" id="BranchRes" style="height: 35px;" required onChange="Change_TypeResStudent()">
						  <option value="" disabled selected>กรุณาเลือกสาขา</option>
						  <?php
								$type = $this->db->get('Branch');
								foreach($type->result_array() as $dataF)
								{ ?>
							<option value="<?php echo $dataF['ID_Branch']?>">
								<?php echo $dataF['Name_Branch']?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
				<!-- </div> -->
				<!-- <div class="row"> -->
					<p>รายชื่อผู้รับผิดชอบโครงการ</p>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<select name="Res" id="Res" style="height: 35px;" required>
									<option value="" disabled selected>กรุณาเลือกรายชื่อ</option>
								</select>
							</div>
						</div>
					</div>
				<!-- </div> -->


				<div class="row">
					<div class="col-md-8">
						<p>งบประมาณโครงการ</p>
						<div class="form-group">
							<input type="text" class="form-control" name="Money" id="Money"
								placeholder="ระบุงบประมาณโครงการ"
								style="max-width: 400px ;background: #fcfcfc; color: #000 ; margin-bottom: 20px"
								required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<p>จำนวนกิจกรรมที่จะเพิ่มในโครงการ</p>
						<div class="form-group">
							<input type="text" class="form-control" name="Amount" id="Amount"
								placeholder="ระบุจำนวนกิจกรรมที่จะเพิ่มในโครงการ"
								style="max-width: 400px ;background: #fcfcfc; color: #000 ; margin-bottom: 20px"
								required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<td>เอกสาร</td>
					<input type="file" required id="image_file" name="userfile[]"
						accept=".pdf,.pptx,.docx,.xlsx,.png,.jpg,.jpeg">
					<input type="hidden" id="namefile" name="namefile">
				</div>
				<div class="Footer">
					<button type="submit" id="submit" name="submit" class="btn btn "
						style="margin-top: 20px; margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">สร้างโครงการ</button>
				</div>
			</div>
	</form>
</div>
