<?php  
        $repostrnono = base_url(uri_string());
        $arraystate2 = (explode("/",$repostrnono));
        $idRepo = ($arraystate2[6]);

        $result = $this->db->query("SELECT *
        FROM Slip 
        WHERE ID_Activities = $idRepo");
                                
                if($result->num_rows() == 0)
                {?>
<div class="container">
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">อนุมัติการเคลียร์เงิน</h2>
			<hr>
			<h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มีสลิปที่อัปโหลดในระบบ</h2>
		</div>
	</div>
</div>
<?php 
                }else{
                ?>
<div class="container">
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">ขออนุมัติการเคลียร์เงิน</h2>

            <a href="<?php echo site_url(); ?>Payloan/Approve/<?php echo $idRepo;?>" class="btn btn-success"
				style="margin-bottom: 20px;">อนุมัติ</a>

				<a href="<?php echo site_url(); ?>Payloan/Eject/<?php echo $idRepo;?>" class="btn btn"
				style="margin-bottom: 20px; background-color: #db0f2f; color: #fff;">ไม่อนุมัติ</a>

			<hr>
			<div class="table-responsive">
				<table class="table align-items-center table-flush" id="Filesearch">
					<thead class="thead-light">
						<tr>
							<th scope="col">
								<h4>สลิป</h4>
							</th>
							<th style="text-align:center;" scope="col">
								<h4 style="text-align: left;">ดูข้อมูลสลิป</h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php         
                                       
                                                        foreach($result->result_array() as $data)
                                                        {?>
						<tr>
							<th scope="row">
								<div class="media align-items-center">
									<a href="#" class="avatar rounded-circle mr-3">
										<i class="fa fa-bicycle"></i>
									</a>
									<div class="media-body">
										<span class="mb-0 text-sm">
											<p style="margin-bottom: 0px;"><?php echo $data['Image'];?></p>
										</span>
									</div>
								</div>
			</div>
			</th>
			</td>
			<td>
				<a href="<?php echo base_url('slip/'. $data['Image']) ?>" class="btn btn mb-3 Doc"
					style="background-color: #1778F2; color: #fff;">ดูสลิป</a>
			</td>
			</tr>
			<?php }
                                                    } ?>
			</tbody>
			</table>
		</div>
	</div>
</div>
<?php
                
                
