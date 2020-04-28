<div class="container mb-5">
	<?php
$id = $this->session->userdata('Id_Users');
$result = $this->db->query("SELECT NameList.*,Activities.Name_Activities,Activities.Type 
                            FROM Activities,NameList 
                            WHERE Activities.ID_Activities = NameList.ID_Activities AND NameList.TimeIn IS NOT NULL AND NameList.TimeOut IS NOT NULL 
                            AND NameList.ID_List = '$id'
                            GROUP BY NameList.ID_Activities");
                                
                if($result->num_rows() == 0)
                {?>
	<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

		<div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
			aria-labelledby="inputs-alternative-component-tab">
			<h2 class="" style="font-size: 30px;">กิจกรรมที่เคยเข้าร่วม</h2>
			<hr>
			<h2 style=" text-align: center; margin-left: auto; margin-right: auto;"></h2>
			<p>คุณไม่ได้เข้าร่วมกิจกรรมอะไรเลย</p>
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
			<h2 class="" style="font-size: 30px;">กิจกรรมที่เคยเข้าร่วม</h2>
            <h3 style= "font-weight:bold">หมายเหตุ: กิจกรรมของนักศึกษาต้องมีอย่างน้อย 5 กิจกรรม เพื่อไว้สำหรับลงทะเบียนบัณฑิต</h3>
			<hr>
			<!-- <div class="table-responsive">
				<?php 
                                    $query  =  $this->db->query("SELECT Activities.Type 
                                        FROM Activities,NameList 
                                        WHERE Activities.ID_Activities = NameList.ID_Activities AND NameList.TimeIn IS NOT NULL AND NameList.TimeOut IS NOT NULL 
                                        AND NameList.ID_List = '$id'
                                        GROUP BY Activities.Type");

                                        foreach ($query->result_array() as $Type)
                                        {?>

				<?php $this->db->where('Id_TypeActivity',$Type['Type']);
                                            $TP = $this->db->get('TypeActivities');
                                            $ttt = $TP->row_array();?>

				<h2><?php echo $ttt['Name_TypeActivity'] ?></h2>

				<?php foreach($result->result_array() as $data)
                                            { 
                                                if($Type['Type'] == $data['Type'])
                                                {
                                                    $var_date = $data['Date'];
                                                    $strDate = $var_date;
                                                    $strYear = date("Y",strtotime($strDate))+543;
                                                    $strMonth= date("n",strtotime($strDate));
                                                    $strDay= date("j",strtotime($strDate));
                                                    $strH = date("H",strtotime($strDate));
                                                    $stri = date("i",strtotime($strDate));
                                                    $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                    "พฤศจิกายน","ธันวาคม");
                                                    $strMonthThai=$strMonthCut[$strMonth]; ?>
				<p style="margin-left: 30px">
					<?php echo "- ".$data['Name_Activities']." เมื่อวันที่ ".$strDay." ".$strMonthThai." ".$strYear?>
				</p>
				<?php   } 
                                            }?>

				<?php       } ?>

			</div>
		</div> -->






			<div class="table-responsive">
				<table class="table align-items-center table-flush" id="Filetable">
					<thead class="thead-light">
						<tr>
							<th scope="col">
								<h2 style="text-align: center; font-weight:bold">กิจกรรม</h2>
							</th>
							<th style="text-align:center;" scope="col">
								<h2 style="text-align: center; font-weight:bold">วันที่
								</h2>

							</th>
						</tr>
					</thead>
					<?php
                    $query  =  $this->db->query("SELECT Activities.Type 
                                        FROM Activities,NameList 
                                        WHERE Activities.ID_Activities = NameList.ID_Activities AND NameList.TimeIn IS NOT NULL AND NameList.TimeOut IS NOT NULL 
                                        AND NameList.ID_List = '$id'
                                        GROUP BY Activities.Type");

                                        foreach ($query->result_array() as $Type)
                                        {?>



					<tbody>
						<tr>
							<th scope="row">
								<span class="mb-0 text-sm">
									<h2 style="margin-bottom: 0px; font-weight:bold ">
										<?php $this->db->where('Id_TypeActivity',$Type['Type']);
                                            $TP = $this->db->get('TypeActivities');
                                            $ttt = $TP->row_array();?>
										<?php echo $ttt['Name_TypeActivity']; ?></h2>
								</span>
							</th>
							<td>
								<h2 style="text-align: center; font-weight:bold"></h2>
							</td>
							<td>
								<h2 style="text-align: center; font-weight:bold"></h2>
							</td>
							<td>
								<h2 style="text-align: center; font-weight:bold"></h2>
							</td>
							<td>
								<h2 style="text-align: center; font-weight:bold"></h2>
							</td>

						</tr>

						<?php foreach($result->result_array() as $data)
                                            { 
                                                if($Type['Type'] == $data['Type'])
                                                {
                                                    $var_date = $data['Date'];
                                                    $strDate = $var_date;
                                                    $strYear = date("Y",strtotime($strDate))+543;
                                                    $strMonth= date("n",strtotime($strDate));
                                                    $strDay= date("j",strtotime($strDate));
                                                    $strH = date("H",strtotime($strDate));
                                                    $stri = date("i",strtotime($strDate));
                                                    $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                    "พฤศจิกายน","ธันวาคม");
                                                    $strMonthThai=$strMonthCut[$strMonth]; ?>
						<tr>
							<th scope="row">
								<span class="mb-0 text-sm">
									<p style="margin-left: 35px;"> -
										<?php echo $data['Name_Activities'];?></p>
								</span>
							</th>

							<td>
								<p style="text-align: center;">
									<?php echo "เมื่อวันที่ ".$strDay." ".$strMonthThai." ".$strYear ?></p>
							</td>
							<td>
								<h2 style="text-align: center; font-weight:bold"></h2>
							</td>
							<td>
								<h2 style="text-align: center; font-weight:bold"></h2>
							</td>
							<td>
								<h2 style="text-align: center; font-weight:bold"></h2>
							</td>
						</tr>
						<?php   } 
                                            }?>




			<?php
                }
                ?>

<tr>
						<td>
							<h2 style="text-align: center; font-weight:bold">กิจกรรมที่เข้าร่วมทั้งหมด</h2>
						</td>
                        <?php $count = $result->num_rows();
                              $five = 5;
                              $total = 5 - $count;?>
						<td>
							<h2 style="text-align: center; font-weight:bold">
                            <?php if($count >= 5){ ?>
                            <?php echo $result->num_rows()." "."(กิจกรรมครบแล้ว)"?>
                            <?php }else{?>
                            <?php echo $result->num_rows()." "."(ขาดกิจกรรมอีก ".$total." "."กิจกรรม)"?>
                                <?php } ?>
                            </h2>
						</td>

					</tr>
			<?php } ?>
			</tbody>
			</table>
            </div>
		</div>
