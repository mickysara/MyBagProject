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

        <?php $query  =  $this->db->query("SELECT *
                            FROM Loan
                            WHERE Loan.ID_Activities = $idRepo 
                            GROUP BY Loan.Type");

                $query2  =  $this->db->query("SELECT *
                FROM Loan
                WHERE Loan.ID_Activities = $idRepo");
                            
                            $this->db->where('ID_Activities', $idRepo);
                            $data = $this->db->get('Activities');
                            $showdata = $data->row_array();
                            
                            

                            $moneyget = $this->db->query("SELECT sum(Money)
                            as money
                            FROM Loan
                            WHERE Loan.ID_Activities = '$idRepo'");
                            $sumget =  $moneyget->row_array(); ?>

                              <h2><?php echo $showdata['Name_Activities']." "."เงินรวม"." ".$sumget['money']?></h2> 
                            <?php
                           foreach ($query->result_array() as $Show)
                                { 
                                  ?>
					            <h2><?php echo $Show['Type']?></h2>
                                <?php
                                foreach ($query2->result_array() as $Show2)
                                    { 
                                        if($Show['Type'] == $Show2['Type']){
                                        ?>
                                      
                                        <h2><?php echo "- ".$Show2['Name_Loan']." ".$Show2['Money']?></h2>
                                <?php } 
                                }?>

                                <?php }?>

	</div>
</div>



