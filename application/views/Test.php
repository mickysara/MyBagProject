<div class="Hello">
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
            <div id="ShowDate">
            </div>
</div>