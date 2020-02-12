<div class="container" style="margin-bottom: 30px;" id="ShowDeposit">
	<?php
		
		$this->db->select('Type');
		$this->db->where('ID_Activities', 90);
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
								<h2>รายการ</h2>
							</th>
							<th style="text-align:center;" scope="col">
								<h2 style="text-align: left;">จำนวนเงิน (บาท)</h2>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php                 	$this->db->where('ID_Activities', 90);
												$query = $this->db->get('Loan');
												
                                                foreach($result->result_array() as $data)
                                                {?>
						<tr>
							<th scope="row">
										<span class="mb-0 text-sm">
											<p style="margin-bottom: 0px;"><?php echo $data['Type'];?></p>
										</span>
			
			</th>
			<td>
				
				 <?php 	$type = $data['Type'];
						 $moneyT = $this->db->query("SELECT SUM(Money) FROM Loan WHERE Type = '$type' and ID_Activities = 90") ;
						 $moneyType = $moneyT->row_array();?>
						 <p><?php echo $moneyType['SUM(Money)'] ?></p>
			</td>
			</tr>
			<?php foreach($query->result_array() as $datadetail)
						{ 
						if($data['Type'] == $datadetail['Type'])
						{?>
						<tr>
							<th scope="row">
										<span class="mb-0 text-sm">
											<p style="margin-bottom: 0px;"> -  <?php echo $datadetail['Name_Loan'];?></p>
										</span>
		
							</th>
			<td>
						 <p><?php echo $datadetail['Money'] ?></p>
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
