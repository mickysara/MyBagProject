<div class="container">
<?php $repostrnono = base_url(uri_string());
             $arraystate2 = (explode("/",$repostrnono));
             $idRepo = ($arraystate2[5]);?>
	<form name="InsertLocation" id="InsertLocation_form" action="<?php echo base_url("InsertEventLocation/EditLocation"); ?>" method="post">
		<div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px;;margin-left: auto; 
    margin-right: auto; border: 1px solid #D8D9DC;
    } ">
			<div class="header" style="margin-bottom: 20px;">
				<img src="" alt="">
				<h2 style="">เพิ่มสถานที่จัดกิจกรรม</h2>
			</div>
			<div id="Select">
				<p>กรุณาเลือกสถานที่</p><p style="color:red">
				<select onChange="Change_Where()" name="where" id="where">
					<option value="cpc">มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก วิทยาเขตจักพงษภูวนารถ</option>
					<option value="other">อื่นๆ</option>
				</select>
			</div>
			<div class="Login" id="Login">
			

			</div>
			<input type="hidden" name="id" name="id" value="<?php echo $idRepo; ?>">
			<div class="Footer">
				<button type="submit" class="btn btn " onclick="return confirm('สถานที่ที่คุณระบุถูกต้องแล้วใช่หรือไม่ ?')"
					style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">ยืนยัน</button>
			</div>
	</form>
</div>
