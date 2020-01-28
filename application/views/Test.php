<div class="Hello">
<form  action="<?php echo base_url('test/InsertDateTime');?>" method="post">
<p>วันที่เริ่มและวันที่สิ้นสุด</p>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<div class="input-group input-group-alternative">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							</div>
							<?php 
                                        $end = date('m/d/Y', strtotime('+543 years')); ?>
							<input class="form-control datepicker" id="DateStart" name="DateStart"
								placeholder="Select date" type="text" value="<?php echo $end ?>">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="input-group input-group-alternative">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							</div>
							<?php $date = date('m/d/Y', strtotime('+543 years')) ;
                                        $date1 = str_replace('-', '/', $date);
                                        $tomorrow = date('m/d/Y',strtotime($date1 . "+1 days"));
                                    ?>
							<input class="form-control datepicker" id="DateEnd" name="DateEnd" placeholder="Select date"
								type="text" value="<?php echo $tomorrow; ?>">
						</div>
					</div>
				</div>
			</div>
            <div  style="width: 500px; height: 400px;">
				<div class="Loginform" id="ShowDate" style=" padding: 30px 40px; background-color: #FFFFFF; height: 400px;max-width: 500px;margin-left: auto; 
					margin-right: auto; border: 1px solid #D8D9DC; box-shadow: 0px 10px 30px -10px #aaa;
					} ">
				</div>
				<div class="Loginform" id="Showinput" style=" padding: 30px 40px; background-color: #FFFFFF; height: 400px;max-width: 500px;margin-left: auto; 
					margin-right: auto; border: 1px solid #D8D9DC; box-shadow: 0px 10px 30px -10px #aaa;
					} ">
				</div>
            </div>
			<button type="submit" class="btn btn " style="margin-bottom: 20px; background-color: #00a81f; color: #fff; max-width: 300px; min-width: 200px;">เข้าสู่ระบบ</button>
</form>
</div>