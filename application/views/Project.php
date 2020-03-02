<div class="container">
	<form id="ProjectForm" name="ProjectForm" method="post" enctype='multipart/form-data'>
		<div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px;margin-left: auto; margin-bottom: 50px;
    margin-right: auto; border: 1px solid #D8D9DC;">
			<div class="header" style="margin-bottom: 20px;">
				<img src="" alt="">
				<h2 style="">สร้างโครงการ</h2>
				<hr>
			</div>
		
			<div class="Login">
				<div class="row">
					<div class="col-md-8">
						<p>ชื่อโครงการใหญ่</p>
						<div class="form-group">
							<input type="text" class="form-control" name="Name" id="Name" placeholder="ชื่อโครงการ"
								style="max-width: 400px ;background: #fcfcfc; color: #000 ; margin-bottom: 20px">
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
											value="<?php echo $data['Id_Result'] ?>" type="radio">
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
										value="<?php echo $data['Id_TypeProject'] ?>" type="radio">
									<label class="custom-control-label" for="customRadio<?php echo $i ?>"><?php echo $data['Name_TypeProject'] ?></label>
								</div>
								<?php $i++; ?>
						<?php  }
							
						 ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<p>รหัสผู้รับผิดชอบ</p>
						<div class="form-group">
							<input type="text" class="form-control" name="Res" id="Res" placeholder="รหัสผู้รับผิดชอบ"
								style="max-width: 400px ;background: #fcfcfc; color: #000 ; margin-bottom: 20px">
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
					<button type="submit" id="submit" class="btn btn "
						style="margin-top: 20px; margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">สร้างโครงการ</button>
				</div>
			</div>
	</form>
</div>
