<div class="container">
    <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;max-width: 800px;
                            border-radius: .25rem;
                            background-color: #f7f8f9;">
            
                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">ข้อมูลผู้ใช้                        
                        <div href="#" class="avatar rounded-circle">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </div>
                    </h2>
                    <hr>
                    <?php if($this->session->userdata('Type') == 'Student')
                    {   ?>
                        <p>รหัสนักศึกษา: <?php echo $this->session->userdata('ID') ?> </p>
                        <p>ชื่อผู้ใช้: <?php echo $this->session->userdata('Fname')." ".$this->session->userdata('Lname')?></p>
                        <?php $id = $this->session->userdata('ID');
                            $query = $this->db->query("SELECT student.Fname,student.Lname,Branch.Name_Branch,Major.Name_Major,Campus.Name_Campus 
                                                FROM student,Branch,Major,Campus 
                                                WHERE student.Branch = Branch.ID_Branch AND Branch.ID_Major = Major.ID_Major AND Major.ID_Campus = Campus.ID_Campus 
                                                AND student.Id_Student = '$id'");
                            $data = $query->row_array();
                        ?>
                        <p><?php echo $data['Name_Branch'] ?></p>
                        <p><?php echo $data['Name_Major'] ?></p>
                        <p><?php echo $data['Name_Campus'] ?></p>
                        <p>ปีการศึกษาที่: <?php echo $this->session->userdata('Year')?> </p>
                        <p>สถานะภาพ: <?php echo $this->session->userdata('Status')?> </p>
               <?php }else if($this->session->userdata('Type') == 'Teacher')
                    { ?>
                        <p>รหัสอาจารย์: <?php echo $this->session->userdata('ID') ?> </p>
                        <p>ชื่อผู้ใช้: <?php echo $this->session->userdata('Fname')." ".$this->session->userdata('Lname')?></p>
                        <?php $id = $this->session->userdata('ID');
                            $query = $this->db->query("SELECT Teacher.Fname,Teacher.Lname,Branch.Name_Branch,Major.Name_Major,Campus.Name_Campus 
                                                FROM Teacher,Branch,Major,Campus 
                                                WHERE Teacher.Branch = Branch.ID_Branch AND Branch.ID_Major = Major.ID_Major AND Major.ID_Campus = Campus.ID_Campus 
                                                AND Teacher.ID_Teacher = '$id'");
                            $data = $query->row_array();
                        ?>
                        <p><?php echo $data['Name_Branch'] ?></p>
                        <p><?php echo $data['Name_Major'] ?></p>
                        <p><?php echo $data['Name_Campus'] ?></p>
              <?php }else
                    { ?>
                        <p>รหัสพนักงาน: <?php echo $this->session->userdata('ID') ?> </p>
                        <p>ชื่อ-นามสกุล: <?php echo $this->session->userdata('Fname')." ".$this->session->userdata('Lname'); ?> </p>
                        <p>แผนก: <?php echo $this->session->userdata('Department'); ?> </p>
              <?php } ?>
                </div>
    </div>
</div>