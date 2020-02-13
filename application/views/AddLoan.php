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
			

			<button type="submit" class="btn btn-success "
				style="max-width: 300px; min-width: 200px;">ยืนยัน</button>
                <a href="<?php echo site_url(); ?>InActivity/Showdata/<?php echo $idRepo;?>"
													class="btn btn-primary">ไปหน้ากิจกรรม</a>
		</form>
	<?php
		
		$this->db->select('Type');
		$this->db->where('ID_Activities', $idRepo);
		$this->db->group_by('Type');
		
        $result = $this->db->get('Loan');
        
        
            
        if($result->num_rows() == 0)
        {?>
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">ค่าใช้จ่ายภายในโครงการ</h2>
			<hr>
			<h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มีค่าใช้จ่ายภายในโครงการ</h2>
		</div>
	</div>
	<?php 
        }else{
        ?>

	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">ค่าใช้จ่ายภายในโครงการ</h2>
			<hr>
			<div class="table-responsive">
				<table class="table align-items-center table-flush" >
					<thead class="thead-light">
						<tr>
							<th scope="col">
								<h2 style="text-align: center; font-weight:bold">รายการ</h2>
							</th>
							<th style="text-align:center;" scope="col">
								<h2 style="text-align: center; font-weight:bold">จำนวนเงิน (บาท)</h2>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php                 	$this->db->where('ID_Activities', $idRepo);
												$query = $this->db->get('Loan');
												
                                                foreach($result->result_array() as $data)
                                                {?>
						<tr>
							<th scope="row">
										<span class="mb-0 text-sm">
											<h2 style="margin-bottom: 0px; font-weight:bold "><?php echo $data['Type'];?></h2>
										</span>
			
			</th>
			<td>
				
				 <?php 	$type = $data['Type'];
						 $moneyT = $this->db->query("SELECT SUM(Money) FROM Loan WHERE Type = '$type' and ID_Activities = $idRepo") ;
						 $moneyType = $moneyT->row_array();?>
						 <h2 style="text-align: center; font-weight:bold"><?php echo $moneyType['SUM(Money)'] ?></h2>
			</td>
			</tr>
			<?php foreach($query->result_array() as $datadetail)
						{ 
						if($data['Type'] == $datadetail['Type'])
						{?>
						<tr>
							<th scope="row">
										<span class="mb-0 text-sm">
											<p style="margin-left: 35px;"> -  <?php echo $datadetail['Name_Loan'];?></p>
										</span>
		
							</th>
			<td>
						 <p style="text-align: center;"><?php echo $datadetail['Money'] ?></p>
			</td>
			</tr>
				  <?php }
				  } ?>
			<?php } 
                                        } ?>
			</tbody>
			</table>
		</div>
	</div>
</div>
	</div>
</div>



