<div class="container">
<?php $repostrnono = base_url(uri_string());
		$arraystate2 = (explode("/",$repostrnono));
		$idRepo = ($arraystate2[5]);?>

	<form action="<?php echo site_url('EditProject/EditPro/').$idRepo?>" method="post" enctype='multipart/form-data'>
		<div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px;margin-left: auto; margin-bottom: 50px;
    margin-right: auto; border: 1px solid #D8D9DC;">
			<div class="header" style="margin-bottom: 20px;">
				<img src="" alt="">
				<h2 style="">สร้างโครงการ</h2>
				<hr>
			</div>
		<?php
        $this->db->where('ID_Project',  $idRepo);
        $data = $this->db->get('Project');
        foreach($data->result_array() as $r)
        {?>
			<div class="Login">
				<div class="row">
					<div class="col-md-8">
						<p>ชื่อโครงการใหญ่</p>
						<div class="form-group">
							<input type="text" class="form-control" name="Name" id="Name" value ="<?php echo $r['NameProject']?>"
								style="max-width: 400px ;background: #fcfcfc; color: #000 ; margin-bottom: 20px">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<p>ผลผลิต</p>
						<div class="form-group">
							<div class="custom-control custom-radio mb-3">
								<input name="Result" class="custom-control-input" id="customRadio1"
									value="ผลผลิตผู้สำเร็จการศึกษาด้านวิทยาศาสตร์และเทคโนโลยี" type="radio" <?php if($r['Result'] == 1){?> checked <?php } ?>>
								<label class="custom-control-label"
									for="customRadio1">ผลผลิตผู้สำเร็จการศึกษาด้านวิทยาศาสตร์และเทคโนโลยี</label>
							</div>
							<div class="custom-control custom-radio mb-3">
								<input name="Result" class="custom-control-input" id="customRadio2"
									value="ผลผลิตผู้สำเร็จการศึกษาด้านสังคมศาสตร์" type="radio" <?php if($r['Result'] == 2){?> checked <?php } ?>>
								<label class="custom-control-label"
									for="customRadio2">ผลผลิตผู้สำเร็จการศึกษาด้านสังคมศาสตร์</label>
							</div>
							<div class="custom-control custom-radio mb-3">
								<input name="Result" class="custom-control-input" id="customRadio3"
									value="ผลผลิตผลงานทำนุบำรุงศิลปวัฒนธรรม" type="radio" <?php if($r['Result'] == 3){?> checked <?php } ?>>
								<label class="custom-control-label"
									for="customRadio3">ผลผลิตผลงานทำนุบำรุงศิลปวัฒนธรรม</label>
							</div>
							<div class="custom-control custom-radio mb-3">
								<input name="Result" class="custom-control-input" id="customRadio4"
									value="ผลผลิตผลงานการให้บริการวิชาการ" type="radio" <?php if($r['Result'] == 4){?> checked <?php } ?>>
								<label class="custom-control-label"
									for="customRadio4">ผลผลิตผลงานการให้บริการวิชาการ</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<p>ประเภทโครงการ</p>
						<div class="form-group">
							<div class="custom-control custom-radio mb-3">
								<input name="Type" class="custom-control-input" id="customRadio10"
									value="โครงการเชิงป้องกัน" type="radio"<?php if($r['Type'] == 1){?> checked <?php } ?>>
								<label class="custom-control-label" for="customRadio10">โครงการเชิงป้องกัน</label>
							</div>
							<div class="custom-control custom-radio mb-3">
								<input name="Type" class="custom-control-input" id="customRadio5"
									value="โครงการเชิงแก้ไข" type="radio" <?php if($r['Type'] == 2){?> checked <?php } ?>>
								<label class="custom-control-label" for="customRadio5">โครงการเชิงแก้ไข</label>
							</div>
							<div class="custom-control custom-radio mb-3">
								<input name="Type" class="custom-control-input" id="customRadio6"
									value="โครงการเชิงพัฒนา" type="radio" <?php if($r['Type'] == 3){?> checked <?php } ?>>
								<label class="custom-control-label" for="customRadio6">โครงการเชิงพัฒนา</label>
							</div>
							<div class="custom-control custom-radio mb-3">
								<input name="Type" class="custom-control-input" id="customRadio7" value="โครงการใหม่"
									type="radio" <?php if($r['Type'] == 4){?> checked <?php } ?>>
								<label class="custom-control-label" for="customRadio7">โครงการใหม่</label>
							</div>
							<div class="custom-control custom-radio mb-3">
								<input name="Type" class="custom-control-input" id="customRadio8"
									value="โครงการต่อเนื่อง" type="radio" <?php if($r['Type'] == 5){?> checked <?php } ?>>
								<label class="custom-control-label" for="customRadio8">โครงการต่อเนื่อง</label>
							</div>
							<div class="custom-control custom-radio mb-3">
								<input name="Type" class="custom-control-input" id="customRadio9" value="โครงการประจำ"
									type="radio" <?php if($r['Type'] == 6){?> checked <?php } ?>>
								<label class="custom-control-label" for="customRadio9">โครงการประจำ</label>
							</div>
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
					<button type="submit" class="btn btn "
						style="margin-top: 20px; margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">สร้างโครงการ</button>
				</div>
        <?php }?>
			</div>
	</form>
</div>
