<div class="container">
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; margin-bottom: 20px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #fff;     
                border: 1px solid #D8D9DC;
                box-shadow: 0px 10px 30px -10px #aaa;">

		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<?php $repostrnono = base_url(uri_string());
             $arraystate2 = (explode("/",$repostrnono));
             $idRepo = ($arraystate2[6]);?>
		<form method="post" action="<?php echo site_url('AddLoan/AddData/'.$idRepo)?>" enctype='multipart/form-data'>
			<h2 style="font-weight: 0px;">เพิ่มข้อมูลค่าใช้จ่ายในกิจกรรม</h2>
			<hr>
            <p>ประเภทรายการ</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<select name="Type" id="Type" style="height: 35px;" required>
                           <option value="">เลือกประเภทรายการ</option>
							<option value="ค่าตอบแทน">ค่าตอบแทน</option>
							<option value="ค่าใช้สอย">ค่าใช้สอย</option>
							<option value="ค่าวัสดุ">ค่าวัสดุ</option>
						</select>
					</div>
				</div>
			</div>
			<p>ชื่อรายการ</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Name" name="Name"
							placeholder="อาหารกลางวัน 17x15 " required>
					</div>
				</div>
			</div>

			<p>จำนวนเงิน</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Money" name="Money" placeholder="10000" required>
					</div>
				</div>
			</div>
			

			<button type="submit" class="btn btn "
				style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">ยืนยัน</button>

		</form>

	</div>
</div>



