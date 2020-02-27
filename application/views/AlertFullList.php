<?php $repostrnono = base_url(uri_string());
		$arraystate2 = (explode("/",$repostrnono));
		$idRepo = ($arraystate2[6]); ?>
<div class="container">
	<form name="login" id="login_form" method="post">
		<div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px; height: 350px;max-width: 500px;margin-left: auto; 
		margin-right: auto; border: 1px solid #D8D9DC;">
			<div class="header" style="margin-bottom: 20px;">
				<img src="" alt="">
				<h1 style="">คำเตือน</h1>
				<hr>
			</div>
			<h2 style="text-align: center;">จำนวนคนในสาขามากกว่าจำนวนที่ว่างในกิจกรรมนี้</h2>
			<a class="btn btn-primary btn-round mt-5" align="center" href="<?php echo base_url("InActivity/showdata/".$idRepo) ?>">
								<i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ
							</a>
	</div>