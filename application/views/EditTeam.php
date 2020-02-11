<div class="container">
	<div class="Loginform" style=" padding: 30px 40px; background-color: #FFFFFF; margin-top: 100px; margin-left: auto; 
    margin-right: auto; 
    } ">
		<div class="header" style="margin-bottom: 20px;">
			<img src="" alt="">
			<h2 style="">แก้ไขคณะกรรมการ</h2>
			<hr>
		</div>
		<form action="<?php echo base_url("InsertTeam/Insert") ?>" method="post">
		<div class="Login">
			<div class="TeacherRes mt-3" id="">
                                        <?php 
                                            $query = $this->db->query("SELECT * FROM Teacher 
                                            LEFT JOIN InTeam 
                                            ON InTeam.Id_Users = Teacher.Id_Users 
                                            LEFT JOIN Major
                                            ON Major.ID_Major = Teacher.Major
                                            LEFT JOIN Branch
                                            ON Branch.ID_Branch = Teacher.Branch
                                            WHERE ID_Activities = $id"); 

                                            $query2 =  $this->db->query("SELECT * FROM student 
                                            LEFT JOIN InTeam 
                                            ON InTeam.Id_Users = student.Id_Users 
                                            LEFT JOIN Major
                                            ON Major.ID_Major = student.Major
                                            LEFT JOIN Branch
                                            ON Branch.ID_Branch = student.Branch
                                            WHERE ID_Activities = $id")
                                        ?>    
                    <div class="ct-example tab-content tab-example-result" style="margin: auto; padding: 1.25rem;
                            border-radius: .25rem;
                            background-color: #f7f8f9;">

                    <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
                        aria-labelledby="inputs-alternative-component-tab">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="Filesearch">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">
                                            <h4>ชื่อคณะกรรมการ</h4>
                                        </th>
                                        <th style="text-align:center;" scope="col">
                                            <h4 style="text-align: left;">สาขา</h4>
                                        </th>
                                        <th style="text-align:center;" scope="col">
                                            <h4 style="text-align: left;">คณะ</h4>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   
                                            foreach($query->result_array() as $data)
                                                { ?>
                                    <tr>
                                        <th scope="row">
                                        <input type="checkbox" name="Teacher[]" value="<?php echo $data['Id_JoinAc'] ?>"> อาจารย์ <?php echo $data['Fname']." ".$data['Lname'] ?></input>
                                
                        </div>
                        </th>
                        <td>
                            <span class="badge badge-dot mr-4">
                                <p><?php echo $data['Name_Branch'];?></p>
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-dot mr-4">
                                <p><?php  echo $data['Name_Major'] ?></p>
                            </span>
                        </td>
                        <?php } ?>
                        <?php   
                                            foreach($query2->result_array() as $data)
                                                { ?>
                                    <tr>
                                        <th scope="row">
                                        <input type="checkbox" name="Teacher[]" value="<?php echo $data['Id_JoinAc'] ?>"><?php echo $data['Fname']." ".$data['Lname'] ?></input>
                                
                        </div>
                        </th>
                        <td>
                            <span class="badge badge-dot mr-4">
                                <p><?php echo $data['Name_Branch'];?></p>
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-dot mr-4">
                                <p><?php  echo $data['Name_Major'] ?></p>
                            </span>
                        </td>
                        <?php } ?>
                        </tbody>
                        </table>
                    </div>
                </div>                            
			</div>
			<div class="Footer">
            <a onclick="EditTeam()" class="btn btn mt-3 mb-3"
						style="background-color: #c62121; color: #fff;">แก้ไขคณะกรรมการ</a>
			</div>
			</form>
		</div>
	</div>
