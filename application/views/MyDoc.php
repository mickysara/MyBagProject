
<div class="container">

<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">
                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">การขออนุมัติกิจกรรม</h2>
                    <hr>
                    <div class="table-responsive">
                    <a href="<?php echo site_url(); ?>Event"  class="btn btn mb-3" style="background-color: #00a81f; color: #fff;">ขออนุมัติจัดกิจกรรม</a>     
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>ชื่อโครงการ</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ผลผลิต</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ประเภทโครงการ</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">สถานะ</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ดูกิจกรรมในโครงการ</h4></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if(isset($view_data) && is_array($view_data) && count($view_data)): $i=0;
                                            foreach ($view_data as $key => $data) { 

                                            
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3">
                                                    <i class="fa fa-bicycle"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <span class="mb-0 text-sm">
                                                            <p style="margin-bottom: 0px;"><?php echo $data['NameProject'];?></p>
                                                        </span>
                                                    </div>
                                                </div>
                                                </th>
                                                <td>
                                                    <span class="badge badge-dot mr-4">
                                                        <p style="margin-bottom: 0px;"><?php echo $data['Result'] ?></p>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot mr-4">
                                                        <p style="margin-bottom: 0px;"><?php echo $data['Type'] ?></p>
                                                    </span>
                                                </td>
                                                <?php if($data['Status'] == "อนุมัติ")
                                                { ?>

                                                <td>
                                                    <span class="badge badge-dot mr-4">
                                                        <p style="margin-bottom: 0px;"><i class="bg-success"></i><?php echo $data['Status'];?></p>
                                                    </span>
                                                </td>   

                                                <?php }else if ($data['Status'] == "ไม่อนุมัติ")
                                                {?>
                                                    <td>
                                                        <span class="badge badge-dot mr-4">
                                                            <p style="margin-bottom: 0px;"><i class="bg-danger"></i><?php echo $data['Status'];?></p>
                                                        </span>
                                                    </td>   
                                                <?php }else{ ?>
                                                    <td>
                                                        <span class="badge badge-dot mr-4">
                                                            <p style="margin-bottom: 0px;"><i class="bg-primary"></i><?php echo $data['Status'];?></p>
                                                        </span>
                                                    </td>   
                                                <?php   } ?>
                                                <td>
                                                    <span class="badge badge-dot mr-4">
                                                        <a href="<?php echo base_url("ShowInProject/Show/").$data['Id_Project']?>" class="btn btn" style="background-color: #172b4d; color: #fff;">ดูกิจกรรมในโครงการ</a>
                                                    </span>
                                                </td>
                                            </tr>
                                            <?php } endif; ?> 
                                            </tbody>
                                        </table>
                                        </div>
    </div>

</div>