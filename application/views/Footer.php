  
  <script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
  <!-- Core -->
  <script src="<?php echo base_url('/assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/popper/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/bootstrap/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/headroom/headroom.min.js'); ?>"></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url('/assets/vendor/onscreen/onscreen.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/nouislider/js/nouislider.min.js'); ?>"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- DatePicker -->
    <script src="<?php echo base_url('/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url('/assets/js/argon.js?v=1.0.1'); ?>"></script>
  <!-- sweetalert -->
 
  <!-- <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <script src="<?php echo base_url('/assets/js/ajax.js'); ?>"></script>
  <!-- DashBoard -->
  <script src="<?php echo base_url('/assets/js/argon-dashboard.js?v=1.0.0'); ?>"></script>
  <!-- Pusher -->

  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>

  <script src="<?php echo base_url('/assets/js/EZView.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/draggable.js'); ?>"></script>

<!-- sweet alert Version 2 -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<style>
.swal2-container {
  z-index: 10000;
}</style>

<script>
$(document).ready( function () {
    $('#Filetable').DataTable();
} );
$(document).ready( function () {
    $('#member').DataTable();
} );
$(document).ready( function () {
    $('#Filesearch').DataTable({
      "aaSorting": []
    });
    
} );
$(document).ready( function () {
    $('#table2excel').DataTable({
      "aaSorting": []
    });
    
} );
$(document).ready( function () {
    $('#Log').DataTable({
      "pageLength": 30
    });
    
} );
$(document).ready( function(){
    $('#slip').EZView();
});
</script>

<script>
 
 $(document).on('submit', '#login_form', function () {
  
  $.post("<?=base_url('Home/Login')?>", $("#login_form").serialize(),
      function (data) {
          
          d = JSON.parse(data)
          var test = JSON.parse(data)
          if(d.status == 1)
          {
              Swal.fire({
                  icon: "success",
                  text: "เข้าสู่ระบบสำเร็จ ยินดีต้อนรับ",
              })
              setTimeout(function () {location.href = '<?=base_url("Information")?>'}, 3000);
              //document.getElementById("demo").innerHTML = d[0].msg;
              //alert("asd")
          }else if(d.status == 2)
          {
            Swal.fire({
                  icon: "success",
                  text: "เข้าสู่ระบบสำเร็จ ยินดีต้อนรับ",
                  
                  
                  
              })
              setTimeout(function () {location.href = d.data}, 2000);
          }
          else
          {
              
              Swal.fire({
                  icon: "error",
                  text: "username หรือ Password นี้ไม่มีในระบบ",
                  
              });
          }

      }
  );

event.preventDefault();
});
</script>
          <script>
            <?php $repostrnono = base_url(uri_string());
             $arraystate2 = (explode("/",$repostrnono));
             $idRepo = ($arraystate2[6]);?>  
          // $(document).ready(function(e) {
          //                   $("#progress").hide();
          //               });
                        function testtest(id){
                    var formData = new FormData($('#insertAc')[0]);
                          console.log("hi :" +"<?=base_url('InsertActivity/InsertAc/')?>"+id)
                    $.ajax({
                      type : 'POST',
                      url : "<?=base_url('InsertActivity/InsertAc/')?>"+id,
                      data : formData,
                      processData : false,
                      contentType : false,
                      success : function() {
                        //  alert("Upload Success");
                        Swal.fire({
                            title: "อัปโหลดเสร็จสมบูรณ์",
                            text: "กรุณากดปุ่มตกลงเพื่อไปยังหน้าถัดไป",
                            icon: "success", 
                          });
                          
                          setTimeout(function () {location.href = '<?=base_url("AddLoan/Insert")?>'}, 3000);
                      }
                    });
                  }
     
          </script>

<script>
            <?php $repostrnono = base_url(uri_string());
             $arraystate2 = (explode("/",$repostrnono));
             $idRepo = ($arraystate2[6]);
             
             
             $this->db->where('ID_Activities',$idRepo);
             $eieiei = $this->db->get('Activities');
             $showw = $eieiei->row_array();

             ?>  
                        function testtest1(id){
                    var formData = new FormData($('#editAc')[0]);
      console.log("hi"+id);
                    $.ajax({
                   
                      type : 'POST',
                      url : "<?=base_url('InsertActivity/EditAc/')?>"+id,
                      data : formData,
                      processData : false,
                      contentType : false,
                      success : function() {
                        //  alert("Upload Success");
                        Swal.fire({
                            title: "อัปโหลดเสร็จสมบูรณ์",
                            text: "กรุณากดปุ่มตกลงเพื่อไปยังหน้าถัดไป",
                            icon: "success", 
                          });
                          
                          setTimeout(function () {location.href = '<?=base_url("ShowInProject/Show/").$showw['ID_Project']?>'}, 3000);
                          //  location.href = '<?=base_url('EmailController/insertlog')?>'
                       
                      }
                    });
                  }
     
          </script>
<script>
$(document).ready(function(e) {
	ShowMydoc();
});
        function ShowMydoc()   
        {
            $.post("<?=base_url('ApproveActivity/ShowAc')?>",
              function (data) {
                  
                 $("#containerr").html(data);
                 $('#Filesearch').DataTable();
                 $('.Doc').EZView();
              }
          );
        }
        function Approve(id)
      {
                  console.log(id);
                  $.post("<?=base_url('ApproveActivity/Approve/')?>"+id,
                    function (data) {
                      var val = "hello";
                      ShowMydoc();
                    }
                  );
      }
      function Eject(id)
      {
        Swal.fire({
            title: 'กรุณาตรวจสอบลายเซ็นต์ที่ปรากฎในเอกสารยืนยันของโครงการ',
            html: `
            <div class="custom-control custom-checkbox mb-3">
              <input class="custom-control-input" id="checkbox1" type="checkbox">
              <label class="custom-control-label" for="checkbox1">ลายเซ็นต์ รองผู้อำนวยการฝ่ายวางแผนและพัฒนา</label>
            </div>
            <div class="custom-control custom-checkbox mb-3">
              <input class="custom-control-input" id="checkbox2" type="checkbox">
              <label class="custom-control-label" for="checkbox2">ลายเซ็นต์ ผู้อำนวยการสำนักวิทยบริการและเทคโนโลยีสารสนเทศ</label>
            </div>
            <div class="custom-control custom-checkbox mb-3">
              <input class="custom-control-input" id="customCheck1" type="checkbox">
              <label class="custom-control-label" for="customCheck1">ลายเซ็นต์ ผู้อำนวยการกองคลัง/หัวหน้างานคลัง</label>
            </div>
            <div class="custom-control custom-checkbox mb-3">
              <input class="custom-control-input" id="customCheck1" type="checkbox">
              <label class="custom-control-label" for="customCheck1">ลายเซ็นต์ ผู้อำนวยการกองแผนฯ/หัวหน้างานนโยบายและแผน</label>
            </div>
            `,
            focusConfirm: false,
            preConfirm: () => {
                console.log('Is checkbox1 checked:' + document.getElementById('checkbox1').checked);
                console.log('Is checkbox2 checked:' + document.getElementById('checkbox2').checked);
            }
        });
      }
</script>

<script>
// $(document).ready(function(e) {
// 	ShowDeposit();
  
// });
//         function ShowDeposit()   
//         {
//             $.post("<?=base_url('ListDeposit/ShowDeposit')?>",
//               function (data) {
                  
//                  $("#ShowDeposit").html(data);
//                  $('#Filesearch').DataTable();
//                  $('.Doc').EZView();
//               }
//           );
//         }
        function ApproveDeposit(id)
      {
                  console.log(id);
                  $.post("<?=base_url('ListDeposit/Approve/')?>"+id,
                    function (data) {
                      var val = "hello";
                      ShowDeposit();
                    }
                  );
      }
</script>

<script>
$(document).ready(function(e) {
	ShowShop();
});
        function ShowShop()   
        {
            $.post("<?=base_url('Shop/Showshop')?>",
              function (data) {
                  
                 $("#ShowShop").html(data);
                 $('#Filesearch').DataTable();
                 $('.Doc').EZView();
              }
          );
        }
        function ApproveDeposit(id)
      {
                  console.log(id);
                  $.post("<?=base_url('ListDeposit/Approve/')?>"+id,
                    function (data) {
                      var val = "hello";
                      ShowDeposit();
                    }
                  );
      }
      function EjectDeposit(id)
      {
                  console.log(id);
                  $.post("<?=base_url('ListDeposit/Eject/')?>"+id,
                    function (data) {
                      var val = "hello";
                      ShowDeposit();
                    }
                  );
      }
</script>
<!-- <script>
$(document).ready(function(e) {
	ShowLoan();
  var val = document.getElementById('repository_id').value
  console.log(val)
});
        function ShowLoan()   
        {
          var val = document.getElementById('repository_id').value
            $.post("<?=base_url('InActivity/showloan/')?>"+val,
              function (data) {
                  
                 $("#Showloan").html(data);
                 $('#Filesearch').DataTable();
                 $('.Doc').EZView();
              }
          );
        }
</script> -->
<script>
$(document).ready(function(e) {
	ShowTransaction();
});
        function ShowTransaction()   
        {
            $.post("<?=base_url('Transaction/ShowTransaction')?>",
              function (data) {
                  
                 $("#ShowTransaction").html(data);
                 $('#Filesearch').DataTable();
                 $('.Doc').EZView();
              }
          );
        }
</script>
<script>
$(document).ready(function(e) {
	increaseNotify();
     setInterval(increaseNotify, 3000);
});
function increaseNotify(){ // โหลดตัวเลขทั้งหมดที่ถูกส่งมาแสดง
          $.get("<?=base_url('Home/IncreaseNoti')?>", 
              function (data) {
                if(data > 0)
                {
                  console.log("data = " + data);
                  $("#Noti").html(data)
                }else{

                }
            
              }
          );
          $.get("<?=base_url('Home/IncreaseDetailNoti')?>",
            function (data)
            {
                $("#DetailNoti").html(data)
            }
          );
}
</script>
<script>
var myEl = document.getElementById('Hi');
        myEl.addEventListener('click', function() {
          $.get("<?=base_url('Home/DecreaseNoti')?>",
                    function(data){
                      $("#Noti").html(data)
                    }
                  )
        }, true);
</script>



  <script type="text/javascript">

function Change_List()
{
    var val = $("#List").val()
    
    $.get("<?=base_url('InActivity/change/')?>"+val, 
        function (data) {
            
          $("#Major").html(data)

        }
    );
}
</script>

<script type="text/javascript">

function Change_Major()
{
    var val = $("#Major").val()
    
    $.get("<?=base_url('InActivity/changetwo/')?>"+val, 
        function (data) {
            
          $("#Branch").html(data)

        }
    );
}
</script>

<script type="text/javascript">

function Change_MajorTeacher()
{
    var val = $("#MajorTeacher").val()
    
    $.get("<?=base_url('InActivity/changetwo/')?>"+val, 
        function (data) {
            
          $("#BranchTeacher").html(data)

        }
    );
}
</script>



<script type="text/javascript">

function Change_teamlist()
{
    var val = $("#Type").val()
    
    $.get("<?=base_url('InActivity/changethree/')?>"+val, 
        function (data) {
            
          $("#teamlist").html(data)

        }
    );
}
</script>

<script type="text/javascript">

function List_Student()
{
    var val = $("#Year").val()
    var maj = $("#Major").val()
    var br = $("#Branch").val()

    $vk = val+"."+maj+"."+br;

    $.get("<?=base_url('InActivity/changefour/')?>"+$vk, 
        function (data) {
            
          $("#Student_res").html(data)

        }
    );
}
</script>

<script type="text/javascript">

function List_Teacher()
{
    var maj = $("#MajorTeacher").val()
    var br = $("#BranchTeacher").val()

    $vk = maj+"."+br;

    $.get("<?=base_url('InActivity/changefive/')?>"+$vk, 
        function (data) {
            
          $("#Teacher_res").html(data)

        }
    );
}
</script>

<script>
                   $(document).on('submit', '#insertAc', function () {
                    var startDate = $('#DateStart').val(); 
                    var endDate=  $('#DateEnd').val();

                    var fullDate = new Date()

                    console.log(fullDate);
                    //Thu May 19 2011 17:25:38 GMT+1000 {}
                    
                    //convert month to 2 digits
                    var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
                    var Year = fullDate.getFullYear();
                    var currentDate = twoDigitMonth + "/" + "0"+fullDate.getDate() + "/" + Year;
                    

                    if(startDate < currentDate)
                    {
                      Swal.fire({
                        icon: 'error',
                        title: 'มีบางอย่างผิดพลาด',
                        text: 'ไม่สามารถเลือกวันที่เริ่มต้นย้อนหลังจากปัจจุบันได้',
                       
                      })
                      console.log("current is: " + currentDate)
                      console.log("Start is: " + startDate)
                    }else if(endDate < startDate )
                    {
                      Swal.fire({
                        icon: 'error',
                        title: 'มีบางอย่างผิดพลาด',
                        text: 'วันที่สิ้นสุดกิจกรรมต้องไม่น้อยกว่าวันที่เริ่มกิจกรรม',
                       
                      })
                    }else{
                      
                    
                    $.post("<?=base_url('Event/Check')?>", $("#insertAc").serialize(),
                        function (data) {
                            
                            d = JSON.parse(data)
                            var test = JSON.parse(data)
                            if(d.status == 1)
                            {
                                Swal.fire({
                                    icon: "error",
                                    text: "ชื่อกิจกรรมซ้ำกรุณากรอกชื่อกิจกรรมใหม่", 
                                })
                                //document.getElementById("demo").innerHTML = d[0].msg;
                                //alert("asd")
                            }else if(d.status == 2)
                            {
                                Swal.fire({
                                    icon: "error",
                                    text: "อาจารย์ผู้รับผิดชอบไม่สามารถรับผิดชอบกิจกรรมนี้ได้เนื่องจากรับผิดชอบกิจกรรมอื่นอยู่",
                                })             
                            }
                            else if(d.status == 4)
                            {
                              Swal.fire({
                                    icon: "error",
                                    text: "ข้อมูลอาจารย์ไม่ถูกต้องกรุณากรอกใหม่aaa",
                                })
                            }else if(d.status == 5){
                              Swal.fire({
                                    icon: "error",
                                    text: "ข้อมูลอาจารย์ไม่ถูกต้องกรุณากรอกใหม่",
                                })
                              }else if(d.status == 6){
                              Swal.fire({
                                    icon: "error",
                                    text: "เวลาสิ้นสุดกิจกรรมจะต้องไม่น้อยหรือเท่ากับเวลาเริ่มกิจกรรม",
                                })
                            }else {
                              $.post("<?=base_url('Event/InsertActivity')?>", $("#insertAc").serialize(),
                                function (data) {
                                  d = JSON.parse(data)
                                  var test = JSON.parse(data)
                                  Swal.fire({
                                        icon: "success",
                                        text: "สร้างกิจกรรมเสร็จสิ้น",
                                    })
                                    setTimeout(function () {location.href = '<?=base_url("ShowInProject/Show/")?>'+d.data}, 2000);


                                }
                            );
                            }

                        }
                    );
                  }

                    event.preventDefault();
                    });
                    
                  </script>
 
 <!---------------------------------------------------- ของอาจารย์ ----------------------------------------------------------->
 <script>
                   $(document).on('submit', '#insertAcTeacher', function () {
                    var startDate = $('#DateStart').val(); 
                    var endDate=  $('#DateEnd').val();

                    var fullDate = new Date()

                    console.log(fullDate);
                    //Thu May 19 2011 17:25:38 GMT+1000 {}
                    
                    //convert month to 2 digits
                    var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
                    var Year = fullDate.getFullYear()+543;
                    var currentDate = twoDigitMonth + "/" + "0"+fullDate.getDate() + "/" + Year;

                    if(startDate =< currentDate)
                    {
                      Swal.fire({
                        icon: 'error',
                        title: 'มีบางอย่างผิดพลาด',
                        text: 'ไม่สามารถเลือกวันที่เริ่มต้นย้อนหลังจากปัจจุบันได้',
                       
                      })
                      console.log("current is: " + currentDate)
                      console.log("Start is: " + startDate)
                    }else if(endDate < startDate )
                    {
                      Swal.fire({
                        icon: 'error',
                        title: 'มีบางอย่างผิดพลาด',
                        text: 'วันที่สิ้นสุดกิจกรรมต้องไม่น้อยกว่าวันที่เริ่มกิจกรรม',
                       
                      })
                    }else{
                      
                    
                    $.post("<?=base_url('Event/CheckTeacher')?>", $("#insertAcTeacher").serialize(),
                        function (data) {
                            
                            d = JSON.parse(data)
                            var test = JSON.parse(data)
                            if(d.status == 1)
                            {
                                Swal.fire({
                                    icon: "error",
                                    text: "ชื่อกิจกรรมซ้ำกรุณากรอกชื่อกิจกรรมใหม่", 
                                })
                                //document.getElementById("demo").innerHTML = d[0].msg;
                                //alert("asd")
                            }else if(d.status == 2)
                            {
                                Swal.fire({
                                    icon: "error",
                                    text: "อาจารย์ผู้รับผิดชอบไม่สามารถรับผิดชอบกิจกรรมนี้ได้เนื่องจากรับผิดชอบกิจกรรมอื่นอยู่",
                                })             
                            }
                            else if(d.status == 4)
                            {
                              Swal.fire({
                                    icon: "error",
                                    text: "ข้อมูลอาจารย์ไม่ถูกต้องกรุณากรอกใหม่aaa",
                                })
                            }else if(d.status == 5){
                              Swal.fire({
                                    icon: "error",
                                    text: "ข้อมูลอาจารย์ไม่ถูกต้องกรุณากรอกใหม่",
                                })
                            }else {
                              $.post("<?=base_url('Event/InsertActivityTeacher')?>", $("#insertAcTeacher").serialize(),
                                function (data) {
                                  d = JSON.parse(data)
                                  var test = JSON.parse(data)
                                  Swal.fire({
                                        icon: "success",
                                        text: "สร้างกิจกรรมเสร็จสิ้น",
                                    })
                                    setTimeout(function () {location.href = '<?=base_url("AddLoan/Insert")?>'}, 2000);


                                }
                            );
                            }

                        }
                    );
                  }

                    event.preventDefault();
                    });
                    
                  </script>
<script>
 
 $(document).on('submit', '#withdraw_form', function () {
  
  $.post("<?=base_url('Withdraw/InsertWithdraw')?>", $("#withdraw_form").serialize(),
      function (data) {
          
          d = JSON.parse(data)
          var test = JSON.parse(data)
          if(d.status == 1)
          {
              Swal.fire({
                  icon: "success",
                  text: "การถอนเสร็จสมบูรณ์",
                  
                  
                  
              })
              location.reload();
              //document.getElementById("demo").innerHTML = d[0].msg;
              //alert("asd")
          }else if(d.status == 2)
          {
            Swal.fire({
                  icon: "error",
                  text: "เงินในบัญชีน้อยกว่าจำนวนเงินที่ต้องการถอน"+ "\n" +"จำนวนเงินถอนต้องไม่มากกว่า:"+d.data,
              })
          }
          else
          {
              
              Swal.fire({
                  icon: "error",
                  text: "ข้อมูลของผู้ใช้ที่กรอกผิดกรุณากรอกให้ถูกต้อง",
                  
              });
          }

      }
  );

event.preventDefault();
});
</script>
                 
<script>
 
 $(document).on('submit', '#InsertLoan_Form', function () {
  
  $.post("<?=base_url('InActivity/InsertLoan')?>", $("#InsertLoan_Form").serialize(),
      function (data) {
          
          d = JSON.parse(data)
          var test = JSON.parse(data)
          if(d.status == 1)
          {
              Swal.fire({
                  icon: "success",
                  text: "อัปโหลดเสร็จสมบูรณ ์",
                  
                  
                  
              })
              location.reload();
          }
          else
          {
              
              Swal.fire({
                  icon: "error",
                  text: "จำนวนเงินเบิกของคุณมากกว่าเงินบประมาณของกิจกรรม",
                  
              });
          }

      }
  );

event.preventDefault();
});
</script>

<script>

$('input[type=radio][name=Teacherr]').change(function() {
    if (this.value == 'In') {

            $.post("<?=base_url('Event/ShowTeacherIn')?>",
              function (data) {
                  
                 $("#ShowTeacherRes").html(data);
              }
          );
    }
    else if (this.value == 'Out') {
      $.post("<?=base_url('Event/ShowTeacherOut')?>",
              function (data) {
                  
                 $("#ShowTeacherRes").html(data);
              }
          );
    }
});
</script>

<script>
$('input[type=radio][name=Teacherr]').change(function() {
    if (this.value == 'In') {

            $.post("<?=base_url('Event/ShowTeacherIn')?>",
              function (data) {
                  
                 $("#ShowTeacherRes").html(data);
              }
          );
    }
    else if (this.value == 'Out') {
      $.post("<?=base_url('Event/ShowTeacherOut')?>",
              function (data) {
                  
                 $("#ShowTeacherRes").html(data);
              }
          );
    }
});
</script>

<script>
$('input[type=radio][name=Teacherra]').change(function() {

  var id = $('#id').val();

    if (this.value == 'In') {

            $.post("<?=base_url('InsertTeam/ShowTeacherInAc/')?>"+id,
              function (data) {
                  
                 $("#ShowTeacherRes").html(data);
                 $('#Filesearch').DataTable({"aaSorting": []});
              }
          );
    }
    else if (this.value == 'Out') {
      $.post("<?=base_url('InsertTeam/ShowTeacherOut/')?>"+id,
              function (data) {
                  
                 $("#ShowTeacherRes").html(data);
                 $('#Filesearch').DataTable({"aaSorting": []});
              }
          );
    }    
    else if (this.value == 'student') {
      $.post("<?=base_url('InsertTeam/ShowStudent/')?>"+id,
              function (data) {
                  
                 $("#ShowTeacherRes").html(data);
                 $('#Filesearch').DataTable({"aaSorting": []});
                 
              }
          );
    }
});
</script>

<script type="text/javascript">

function Change_Campus()
{
    var val = $("#Campus").val()
    $.get("<?=base_url('InsertUsers/ShowMajor/')?>"+val, 
        function (data) {
          $("#Major").html(data)

        }
    );
}
</script>

<script type="text/javascript">

function Change_CampusTeacher()
{
    var val = $("#CampusTeacher").val()
    $.get("<?=base_url('InsertUsers/ShowMajor/')?>"+val, 
        function (data) {
          $("#MajorTeacher").html(data)

        }
    );
}
</script>

<script type="text/javascript">

function Change_Major()
{
    var val = $("#Major").val()
    console.log("helloฟ");
    $.get("<?=base_url('InsertUsers/ShowBranch/')?>"+val, 
        function (data) {
            
          $("#Branch").html(data)

        }
    );
}
</script>

<script type="text/javascript">

function Change_MajorTeacher()
{
    var val = $("#MajorTeacher").val()
    console.log("helloฟ");
    $.get("<?=base_url('InsertUsers/ShowBranch/')?>"+val, 
        function (data) {
            
          $("#BranchTeacher").html(data)

        }
    );
}
</script>

<script>
 
 $(document).on('submit', '#Student_form', function () {
  
  $.post("<?=base_url('InsertUsers/InsertStudent')?>", $("#Student_form").serialize(),
      function (data) {
          
          d = JSON.parse(data)
          var test = JSON.parse(data)
          if(d.status == 1)
          {
              Swal.fire({
                  icon: "success",
                  text: "เพิ่มนักศึกษาลงฐานข้อมูลเรียบร้อย",
                  
                  
                  
              })
              setTimeout(function () {location.href = '<?=base_url("InsertUsers")?>'}, 2000);
              //document.getElementById("demo").innerHTML = d[0].msg;
              //alert("asd")
          }
          else
          {
              
              Swal.fire({
                  icon: "error",
                  text: "รหัสนักศึกษา หรือ ชื่อ-นามสกุล ของนักศึกษามีแล้ว",
                  
              });
          }

      }
  );

event.preventDefault();
});
</script>

<script>
 
 $(document).on('submit', '#Teacher_form', function () {
  
  $.post("<?=base_url('InsertUsers/InsertTeacher')?>", $("#Teacher_form").serialize(),
      function (data) {
          
          d = JSON.parse(data)
          var test = JSON.parse(data)
          if(d.status == 1)
          {
              Swal.fire({
                  icon: "success",
                  text: "เพิ่มอาจารย์ลงฐานข้อมูลเรียบร้อย",
                  
                  
                  
              })
              setTimeout(function () {location.href = '<?=base_url("InsertUsers")?>'}, 2000);
              //document.getElementById("demo").innerHTML = d[0].msg;
              //alert("asd")
          }
          else
          {
              
              Swal.fire({
                  icon: "error",
                  text: "รหัสอาจารย์หรือ ชื่อ-นามสกุล ของอาจารย์มีแล้ว",
                  
              });
          }

      }
  );

event.preventDefault();
});
</script>

<script>
 
 $(document).on('submit', '#Employee_form', function () {
  
  $.post("<?=base_url('InsertUsers/InsertEmployee')?>", $("#Employee_form").serialize(),
      function (data) {
          
          d = JSON.parse(data)
          var test = JSON.parse(data)
          if(d.status == 1)
          {
              Swal.fire({
                  icon: "success",
                  text: "เพิ่มพนักงานลงฐานข้อมูลเรียบร้อย",
                  
                  
                  
              })
              setTimeout(function () {location.href = '<?=base_url("InsertUsers")?>'}, 2000);
              //document.getElementById("demo").innerHTML = d[0].msg;
              //alert("asd")
          }
          else
          {
              
              Swal.fire({
                  icon: "error",
                  text: "รหัสพนักงานหรือ ชื่อ-นามสกุล ของพนักงานมีแล้ว",
                  
              });
          }

      }
  );

event.preventDefault();
});
</script>

<script>
 
 $(document).on('submit', '#Project_form', function () {
  
  $.post("<?=base_url('Project/InsertProject')?>", $("#Project_form").serialize(),
      function (data) {
          
          d = JSON.parse(data)
          var test = JSON.parse(data)
          if(d.status == 1)
          {
              Swal.fire({
                  icon: "success",
                  text: "บันทึกโครงเรียบร้อย",
              })
              setTimeout(function () {location.href = '<?=base_url("ShowInProject/Show/")?>' + d.data}, 2000);
              //document.getElementById("demo").innerHTML = d[0].msg;
              //alert("asd")
          }
          else
          {
              
              Swal.fire({
                  icon: "error",
                  text: "ชื่อโครงการนี้มีคนใช้แล้ว",
                  
              });
          }

      }
  );

event.preventDefault();
});
</script>

<script>

function Request(id)
      {
        Swal.fire({
        title: 'กรุณายืนยัน',
        text: "คุณต้องการจะยื่นขอรับการอนุมัติหรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ไม่'
      }).then((result) => {

        if (result.value) {
          $.post("<?=base_url('Project/Request/')?>"+id,
                    function (data) {
                    setTimeout(function () {location.href = '<?=base_url("MyDoc")?>'}, 1500);

                    }
                  );
          Swal.fire(
            'ระบบได้ทำการยื่นการตรวจสอบและ',
            'ขออนุมัติโครงการแล้ว',
            'success'
          )

        }
      })
      }

</script>

<script>
function EjectDeposit(id)
{
  Swal.fire({
  title: 'กรุณากรอกหมายเหตุที่ยกเลิก',
  input: 'text',
  inputAttributes: {
    autocapitalize: 'off'
  },
  showCancelButton: true,
  confirmButtonText: 'ยืนยัน',
  cancelButtonText: 'ยกเลิก',
  showLoaderOnConfirm: true,
  preConfirm: (login) => {

    $.post("<?=base_url('Home/EjectDeposit')?>", {
      id:id,
      login:login
  },
      function (data) {
          console.log(data)
          d = JSON.parse(data)
          var test = JSON.parse(data)
          if(d.status == 1)
          {
              Swal.fire({
                  icon: "success",
                  text: "บันทึกการยกเลิกเรียบร้อย",
              })
              setTimeout(function () {location.href = '<?=base_url("ListDeposit")?>'}, 1000);
              //document.getElementById("demo").innerHTML = d[0].msg;
              //alert("asd")
          }
          else
          {
              
              Swal.fire({
                  icon: "error",
                  text: "ชื่อโครงการนี้มีคนใช้แล้ว",
                  
              });
          }

      }
  );

  },
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {
  if (result.value) {

  }
})
}
</script>

<script>
  function ShowDetailProject(id)
  {
    $.get("<?=base_url('ApproveActivity/ShowDetail/')?>"+id, 
        function (data) {
          d = JSON.parse(data)
            Swal.fire({
            icon: 'error',
            title: 'รายละเอียด',
            text: d.Detail,
          })
        }
    );
  }
</script>

<script>
  function ShowDetail(id)
  {
    $.get("<?=base_url('ListDeposit/ShowDetailEject/')?>"+id, 
        function (data) {
          d = JSON.parse(data)
            Swal.fire({
            icon: 'error',
            title: 'รายละเอียด',
            text: d.Detail,
          })
        }
    );
  }
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>jQueryold = jQuery.noConflict( true );</script>
<script src="<?php echo base_url('/assets/js/jquery.table2excel.js'); ?>"></script>

<script>
$("button").click(function(){
  $("#table2excel").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "ผลการลงทะเบียนกิจกรรมทดสอบ", //do not include extension
    fileext: ".xls" // file extension
  }); 
});
</script>


<script>
$('#DateEnd').change(function(){
	// JavaScript program to illustrate 
	// calculation of no. of days between two date 

	// To set two dates to two variables 
  var ds = $('#DateStart').val()
  var dn = $('#DateEnd').val()
	var date1 = new Date(ds);
  var date2 = new Date(dn);

  // To calculate the time difference of two dates 
  var Difference_In_Time = date2.getTime() - date1.getTime(); 

  // To calculate the no. of days between two dates 
  var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 

  //To display the final no. of days (result) 
  $("#Day").val(Difference_In_Days+1);
  $("#Difday").val(Difference_In_Days+1);
});

$(document).ready(function(){
  $("#Difday").val(1);
  $("#Day").change(function(){
    
    if($("#Day").val() > $("#Difday").val())
    {
        Swal.fire({
        icon: 'error',
        title: 'มีบางอย่างผิดพลาด',
        text: 'ไม่สามารถเลือกเวลาการเข้าร่วมขั้นต่ำมากกว่าจำนวนวันที่จัดได้'
      })

      $("#submit").attr("disabled", true);
      $("#submit").css("background-color", "Gray");
      $("#Day").css("border-color","#c62121");

    }else{

      $("#submit").attr("disabled", false);
      $("#submit").css("background-color", "#00a81f");
      $("#Day").css("border-color","rgba(0, 168, 31, 1)");

    }
    
  });
});
</script>

<script>
$('#Name').change(function(){
	var val = $("#Name").val()
  $.post("<?= base_url('Event/CheckProject')?>",{
    Name:val
  },
    function (data) {
      d = JSON.parse(data)

      if(d.status == 1)
      {
        $("#submit").attr("disabled", false);
        $("#submit").css("background-color", "#00a81f");
       
      }
      else
      {
        Swal.fire({
        icon: 'error',
        title: 'มีบางอย่างผิดพลาด',
        text: 'ชื่อของโครงการซ้ำกับที่มีอยู่กรุณาใช้ชื่ออื่น'
      })

      $("#submit").attr("disabled", true);
      $("#submit").css("background-color", "Gray");
   

      }
      
    },
  );
});
</script>


<script type="text/javascript">

function EditTeam()
{
    var val = $("#Campus").val()
    $.get("<?=base_url('InsertUsers/ShowMajor/')?>"+val, 
        function (data) {
          $("#Major").html(data)

        }
    );
}
</script>

<script>
function EjectProject(id)
{
  Swal.fire({
  title: 'กรุณากรอกหมายเหตุที่ยกเลิก',
  input: 'text',
  inputAttributes: {
    autocapitalize: 'off'
  },
  showCancelButton: true,
  confirmButtonText: 'ยืนยัน',
  cancelButtonText: 'ยกเลิก',
  showLoaderOnConfirm: true,
  preConfirm: (login) => {

    $.post("<?=base_url('ApproveActivity/Eject')?>", {
      id:id,
      login:login
  },
      function (data) {
          console.log(data)
          d = JSON.parse(data)
          var test = JSON.parse(data)
          if(d.status == 1)
          {
              Swal.fire({
                  icon: "success",
                  text: "บันทึกการยกเลิกเรียบร้อย",
              })
              setTimeout(function () {location.href = '<?=base_url("ApproveActivity")?>'}, 1000);
              //document.getElementById("demo").innerHTML = d[0].msg;
              //alert("asd")
          }
      }
  );

  },
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {
  if (result.value) {

  }
})
}
</script>

<script>
                    $(document).ready(function(e) {
                      $("#progress").hide();
                  });
      
                    function testtest(){
                    var formData = new FormData($('#upload_form')[0]);
      
                    $.ajax({
                      xhr : function() {
                          $("#progress").show();
                        var xhr = new window.XMLHttpRequest();
      
                        xhr.upload.addEventListener('progress', function(e) {
      
                          if (e.lengthComputable) {
      
                            console.log('Bytes Loaded: ' + e.loaded);
                            console.log('Total Size: ' + e.total);
                            console.log('Percentage Uploaded: ' + (e.loaded / e.total))
      
                            var percent = Math.round((e.loaded / e.total) * 100);
      
                            $('#progress-bar-fill').attr('aria-valuenow', percent).css('width', percent + '%');
      
                            $('#tt').text('กำลังทำการอัปโหลด ' + percent + '%');
                          }
      
                        });
      
                        return xhr;
                      },
                      type : 'POST',
                      url : "<?=base_url('Uploadfile/file_upload').$idRepo?>?>",
                      data : formData,
                      processData : false,
                      contentType : false,
                      success : function() {
                        //  alert("Upload Success");
                        swal({
                            title: "อัปโหลดเสร็จสมบูรณ์",
                            text: "กรุณากดปุ่มตกลงเพื่อไปยังหน้าถัดไป",
                            icon: "success", 
                          });
                        

                      }
                    });
                  }
                  // });
      // redirect('EmailController/insertlog/');
                  // });
                  </script>

<script type="text/javascript">

function Change_Type()
{   var id = $('#id').val();
    var val = $("#Type").val()
    console.log(val);
    if(val == "Inbranch")
    {
        $.get("<?=base_url('InsertTeam/ShowTeacherInAc/')?>"+id, 
          function (data) {
              
            $("#ShowTeacherRes").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});

          }
      );
    }else if(val == "Incampus")
    {
      $.get("<?=base_url('InsertTeam/ShowTeacherOut/')?>"+id, 
          function (data) {
              
            $("#ShowTeacherRes").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});
            console.log('Hello');
          }
      );
    }else if(val == "InEmp")
    {
      $.get("<?=base_url('InsertTeam/ShowEmployee/')?>"+id, 
          function (data) {
              
            $("#ShowTeacherRes").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});
            console.log('Hello');
          }
      );
    }else if(val == "student")
    {
      $.get("<?=base_url('InsertTeam/ShowStudent/')?>"+id, 
          function (data) {
              
            $("#ShowTeacherRes").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});

          }
      );
    }
}
</script>

<script type="text/javascript">

function Change_Where()
{   var id = $('#id').val();
    var val = $("#where").val()
    console.log(val);
    if(val == "other")
    {   
            $("#Login").html(`
            <p class="mt-3">ชื่อสถานที่</p>
          <div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<input type="text" class="form-control" name="Name" id="Name"
								placeholder="สถานที่จัดกิจกรรม"
								style="max-width: 400px ;background: #fcfcfc; color: #000 ; margin-bottom: 20px">
						</div>
					</div>
				</div>
				<p>ละติจูด</p>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<input type="text" class="form-control" name="latitude" id="latitude" placeholder="ละติจูด"
								style="max-width: 400px ;background: #fcfcfc; color: #000 ; margin-bottom: 20px">
						</div>
					</div>
				</div>
				<p>ลองติจูด</p>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<input type="text" class="form-control" name="longtitude" id="longtitude"
								placeholder="ลองติจูด"
								style="max-width: 400px ;background: #fcfcfc; color: #000 ; margin-bottom: 20px">
						</div>
					</div>
				</div>`);
    }else 
    {
            $("#Login").html("");
    }
}
</script>

<script>

function DeleteTeam()
      {
        Swal.fire({
        title: 'กรุณายืนยัน',
        text: "คุณต้องการลบบุคคลเหล่านี้ออกจากคณะกรรมการหรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ไม่'
      }).then((result) => {

        if (result.value) {
          $.post("<?=base_url('EditTeam/Delete/')?>",$("#EditTeam").serialize(),
                    function (data) {
                      d = JSON.parse(data)

                      

                    }
                  );
          Swal.fire(
            'ระบบได้ทำการลบบุคคลดังกล่าว',
            'ออกจากคณะกรรมการเรียบร้อยแล้ว',
            'success'
          )
          setTimeout(function () {location.reload()}, 1000);
        }
      })
      }

</script>

<script>

function DeleteJoin()
      {
        Swal.fire({
        title: 'กรุณายืนยัน',
        text: "คุณต้องการลบบุคคลเหล่านี้ออกจากผู้เข้าร่วมหรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ไม่'
      }).then((result) => {

        if (result.value) {
          $.post("<?=base_url('InsertJoin/Delete/')?>",$("#DeleteJoin").serialize(),
                    function (data) {
                      d = JSON.parse(data)

                      

                    }
                  );
          Swal.fire(
            'ระบบได้ทำการลบบุคคลดังกล่าว',
            'ออกจากผู้เข้าร่วมเรียบร้อยแล้ว',
            'success'
          )
          setTimeout(function () {location.reload()}, 1000);
        }
      })
      }

</script>

<script type="text/javascript">

function Change_Branch()
{   var type = $('#Type').val();
    var val = $("#Branch").val()
    var id = $("#id").val()
    console.log(val);
    if(type == "Teacher")
    {   
            $.post("<?php echo base_url('InsertJoin/ShowTeacher/') ?>"+id, {Branch:val},
              function (data) {

                $("#ShowTeacherRes").html(data);
                $('#Filesearch').DataTable({"aaSorting": []});

              },
            );
    }else if(type == "student")
    {
      $.post("<?php echo base_url('InsertJoin/ShowStudent/') ?>"+id, {Branch:val},
              function (data) {

                $("#ShowTeacherRes").html(data);
                $('#Filesearch').DataTable({"aaSorting": []});

              },
            );
    }else if(type == "Employee")
    {
      $.post("<?php echo base_url('InsertJoin/ShowEmployee/') ?>"+id, {Branch:val},
              function (data) {

                $("#ShowTeacherRes").html(data);
                $('#Filesearch').DataTable({"aaSorting": []});

              },
            );
    }
}
</script>
<script type="text/javascript">

function Change_TypeJoin()
{   var id = $('#id').val();
    var val = $("#TypeJoin").val()
    console.log(val);
    if(val == "Teacher")
    {
        $.get("<?=base_url('test/Teacher/')?>"+id, 
          function (data) {
              
            $("#TypeJoinn").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});

          }
      );
    }else if(val == "Student")
    {
      $.get("<?=base_url('test/Student/')?>"+id, 
          function (data) {
              
            $("#TypeJoinn").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});
            console.log('Hello');
          }
      );
    }else if(val == "Employee")
    {
      $.get("<?=base_url('test/Employee/')?>"+id, 
          function (data) {
              
            $("#TypeJoinn").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});
            console.log('Hello');
          }
      );
    }
}
</script>

<script type="text/javascript">

function Change_TypeDelete()
{   var id = $('#id').val();
    var val = $("#TypeDelete").val()
    console.log(val);
    if(val == "Teacher")
    {
        $.get("<?=base_url('DeleteJoin/ShowTeacher/')?>"+id, 
          function (data) {
              
            $("#ShowDelete").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});

          }
      );
    }else if(val == "Student")
    {
      $.get("<?=base_url('DeleteJoin/ShowStudent/')?>"+id, 
          function (data) {
              
            $("#ShowDelete").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});
            console.log('Hello');
          }
      );
    }else if(val == "Employee")
    {
      $.get("<?=base_url('DeleteJoin/ShowEmployee/')?>"+id, 
          function (data) {
              
            $("#ShowDelete").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});
            console.log('Hello');
          }
      );
    }
}
</script>

<script type="text/javascript">

function Change_TypeNewShow2()
{   var id = $('#id').val();
    var val = $("#TypeShow").val()
    console.log(val);
    if(val == "Teacher")
    {
        $.get("<?=base_url('ShowNew/ShowTeacher/')?>"+id, 
          function (data) {
              
            $("#ShowNew").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});

          }
      );
    }else if(val == "Student")
    {
      $.get("<?=base_url('ShowNew/ShowStudent/')?>"+id, 
          function (data) {
              
            $("#ShowNew").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});
            console.log('Hello');
          }
      );
    }else if(val == "Employee")
    {
      $.get("<?=base_url('ShowNew/ShowEmployee/')?>"+id, 
          function (data) {
              
            $("#ShowNew").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});
            console.log('Hello');
          }
      );
    }
}
</script>

<script type="text/javascript">

function Change_TeamDelete2()
{   var id = $('#id').val();
    var val = $("#TypeDelete").val()
    console.log(val);
    if(val == "Teacher")
    {
        $.get("<?=base_url('EditTeam/ShowTeacher/')?>"+id, 
          function (data) {
              
            $("#DeleteTeam").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});

          }
      );
    }else if(val == "Student")
    {
      $.get("<?=base_url('EditTeam/ShowStudent/')?>"+id, 
          function (data) {
              
            $("#DeleteTeam").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});
            console.log('Hello');
          }
      );
    }else if(val == "Employee")
    {
      $.get("<?=base_url('EditTeam/ShowEmployee/')?>"+id, 
          function (data) {
              
            $("#DeleteTeam").html(data);
             $('#Filesearch').DataTable({"aaSorting": []});
            console.log('Hello');
          }
      );
    }
}
</script>

<script>
 $(document).on('submit', '#InsertTeam', function () {
  $.post("<?=base_url('InsertTeam/Insert')?>", $("#InsertTeam").serialize(),
      function (data) {
          
          d = JSON.parse(data)
          var test = JSON.parse(data)
          if(d.status == 1)
          {
              Swal.fire({
                  icon: "success",
                  text: "เพิ่มคณะกรรมการเรียบร้อยแล้ว",
                  
                  
                  
              })
              location.reload();
          }

      }
  );

event.preventDefault();
});
</script>

<script>
 $(document).on('submit', '#InsertJoin_Form', function () {
  $.post("<?=base_url('InsertJoin/Insert')?>", $("#InsertJoin_Form").serialize(),
      function (data) {
          
          d = JSON.parse(data)
          var test = JSON.parse(data)
          console.log("hello"+data)
          if(d.status == 1)
          {
              Swal.fire({
                  icon: "success",
                  text: "เพิ่มผู้เข้าร่วมเรียบร้อยเรียบร้อยแล้ว",
                  
                  
                  
              })
              location.reload();
          }
          else
          {
              
              Swal.fire({
                  icon: "error",
                  text: "จำนวนผู้เข้าร่วมเกินผู้เข้าร่วมกิจกรรมทั้งหมด",
                  
              });
          }

      }
  );

event.preventDefault();
});
</script>



<!-- <script>
                   $(document).on('submit', '#ProjectForm', function () {
           
                    $.post("<?=base_url('Project/CheckProject')?>", $("#ProjectForm").serialize(),
                        function (data) {
                            
                            d = JSON.parse(data)
                            var test = JSON.parse(data)
                            if(d.status == 0)
                            {
                                Swal.fire({
                                    icon: "error",
                                    text: "ไม่สามารถสร้างโครงการได้เนื่องจากรหัสของผู้รับผิดชอบนี้ไม่มีในฐานข้อมูล", 
                                }))
                            }else {
                              $.post("<?=base_url('Project/InsertProject')?>", $("#ProjectForm").serialize(),
                                function (data) {
                                  d = JSON.parse(data)
                                  var test = JSON.parse(data)
                                  Swal.fire({
                                        icon: "success",
                                        text: "สร้างโครงการเสร็จสิ้น",
                                    })
                                    setTimeout(function () {location.href = '<?=base_url("Mydoc")?>'}, 2000);


                                }
                            );
                            }

                        }
                    );
                  

                    event.preventDefault();
                    });
                    
                  </script> -->



<script type="text/javascript">

function CheckUsername()
{
    var val = $("#Res").val()
    
    $.post("<?=base_url('Project/CheckProject/')?>",{Res:val}, 
        function (data) {
            d = JSON.parse(data)

            if(d.status == 0)
            {
              Swal.fire({
              icon: 'error',
              title: 'มีบางอย่างผิดพลาด',
              text: 'ไม่มีชื่อนี้อยู่ในฐานข้อมูลของนักศึกษา กรุณาแก้ไข'
            })
              $("#submit").attr("disabled", true);
            }else{
              $("#submit").attr("disabled", false);
            }
        }
    );
}
</script>

<script type="text/javascript">

function CheckUsernameTeacher()
{
    var val = $("#Res").val()
    
    $.post("<?=base_url('Project/CheckProjectTeacher/')?>",{Res:val}, 
        function (data) {
            d = JSON.parse(data)

            if(d.status == 0)
            {
              Swal.fire({
              icon: 'error',
              title: 'มีบางอย่างผิดพลาด',
              text: 'ไม่มีชื่อนี้อยู่ในฐานข้อมูลของอาจารย์ กรุณาแก้ไข'
            })
              $("#submit").attr("disabled", true);
            }else{
              $("#submit").attr("disabled", false);
            }
        }
    );
}
</script>

<!-- <script type="text/javascript">

function CheckTime()
{
                    var startTime = $('#TimeStart').val(); 
                    var endTime=  $('#TimeEnd').val();
    
                    if(endTime <= startTime){
                      Swal.fire({
                        icon: 'error',
                        title: 'มีบางอย่างผิดพลาด',
                        text: 'เวลาสิ้นสุดกิจกรรมต้องไม่น้อยกว่าเวลาเข้าร่วมกิจกรรม',
                       
                      })
                      $("#submit").attr("disabled", true);
                      console.log("Start is: " + startTime)
                      console.log("End is: " + endTime)
                    }else if(endTime == startTime){
                      Swal.fire({
                        icon: 'error',
                        title: 'มีบางอย่างผิดพลาด',
                        text: 'เวลาเริ่มกิจกรรมและเวลาสิ้นสุดกิจกรรมต้องไม่เท่ากัน',
                       
                      })
                      $("#submit").attr("disabled", true);
                      console.log("End is: " + startTime)
                      console.log("Start is: " + endTime)
                      }else{
                  $("#submit").attr("disabled", false);
                      }
}
</script> -->

<script type="text/javascript">

function CheckMoneyProject()
{
    var val = $("#Budget").val()
    var id = $("#ID").val()
    $.post("<?=base_url('Event/CheckMoneyProject/')?>" +id,{Budget:val}, 
        function (data) {
            d = JSON.parse(data)

            if(d.status == 0)
            {
              Swal.fire({
              icon: 'error',
              title: 'มีบางอย่างผิดพลาด',
              text: 'งบประมาณกิจกรรมของคุณมีมากกว่างบประมาณโครงการ'
            })
              $("#submit").attr("disabled", true);
            }else if(d.status == 2)
            {
              Swal.fire({
              icon: 'error',
              title: 'มีบางอย่างผิดพลาด',
              text: 'เงินรวมงบประมาณกิจกรรมมีมากกว่างบประมาณโครงการ'
            })
              $("#submit").attr("disabled", true);
            
            }else{
              $("#submit").attr("disabled", false);
            }
        }
    );
}
</script>
<!-- <script type="text/javascript">

function NoClick()
{
    var val = $("#Res").val()
    
    $.get("<?=base_url('InActivity/CheckButton/')?>"+val, 
        function (data) {
            
          $("#submit").html(data)
        }
    );
}
</script> -->

<script type="text/javascript">

function CheckDateStart()
{
                    var startDate = $('#DateStart').val(); 
                    var endDate=  $('#DateEnd').val();
                    var fullDate = new Date()
                    fullDate.setDate(fullDate.getDate()+3);
                    console.log(fullDate);
                    //Thu May 19 2011 17:25:38 GMT+1000 {}
                    
                    //convert month to 2 digits
                    var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
                    var Year = fullDate.getFullYear();
                    var currentDate = twoDigitMonth + "/" +fullDate.getDate() + "/" + Year;
                    // var currentDate = twoDigitMonth + "/" + "0"+fullDate.getDate() + "/" + Year;
                    if(startDate < currentDate)
                    {
                      Swal.fire({
                        icon: 'error',
                        title: 'มีบางอย่างผิดพลาด',
                        text: 'วันที่จัดและสิ้นสุดกิจกรรมต้องมากกว่าวันที่ปัจจุบันอย่างน้อย 3 วัน',
                       
                      })
                      $("#submit").attr("disabled", true);
                      console.log("current is: " + currentDate)
                      console.log("Start is: " + startDate)
                    // }else if(startDate == currentDate){
                    //   Swal.fire({
                    //     icon: 'error',
                    //     title: 'มีบางอย่างผิดพลาด',
                    //     text: 'วันที่จัดและสิ้นสุดกิจกรรมต้องมากกว่าวันที่ปัจจุบัน 1 วัน',
                       
                    //   })
                    //   $("#submit").attr("disabled", true);
                    //   console.log("current is: " + currentDate)
                    //   console.log("Start is: " + startDate)
                      }else{
                  $("#submit").attr("disabled", false);
                      }
}
</script>

<script type="text/javascript">

function CheckDateEnd(){
                    var startDate = $('#DateStart').val(); 
                    var endDate=  $('#DateEnd').val();

                      if(endDate < startDate){
                      Swal.fire({
                        icon: 'error',
                        title: 'มีบางอย่างผิดพลาด',
                        text: 'ไม่สามารถเลือกวันที่สิ้นสุดกิจกรรมย้อนหลังวันที่เริ่มจัดกิจกรรมได้',
                       
                      })
                      $("#submit").attr("disabled", true);
                      console.log("Start is: " + startDate)
                      console.log("End is: " + endDate)
                      }else{
                  $("#submit").attr("disabled", false);
                      }
}
</script>

<script type="text/javascript">

function Activity_Change()
{   var id = $('#Activities').val();

        $.get("<?=base_url('ChangePlan/ChangeActivity/')?>"+id, 
          function (data) {
            
            if(data == 0)
            {
              $("#ShowData").html(`
              <div class='alert alert-danger' role='alert'>
            <strong>คำเตือน!</strong> กิจกรรมนี้มีการปรับแผนเป็นจำนวน 2 ครั้งแล้วไม่สามารถปรับแผนได้อีก!
            </div>`)
              $("#DateStart").attr("disabled", true);
              $("#TimeStart").attr("disabled", true);
              $("#DateEnd").attr("disabled", true);
              $("#TimeEnd").attr("disabled", true);
              $("#File").attr("disabled", true);
              $("#submit").attr("disabled", true);
            }else{
              $("#ShowData").html(data)
              $("#DateStart").attr("disabled", false);
              $("#TimeStart").attr("disabled", false);
              $("#DateEnd").attr("disabled", false);
              $("#TimeEnd").attr("disabled", false);
              $("#File").attr("disabled", false);
              $("#submit").attr("disabled", false);
            }
          }
      );
}
</script>


<script type="text/javascript">

function Change_Depart()
{
    var val = $("#DepartMent2").val()
    
    $.get("<?=base_url('InsertUsers/changedepart/')?>"+val, 
        function (data) {
            
          $("#Position2").html(data)

        }
    );
}
</script>

<!-- Syntax Highlighter -->
<script src="<?php echo base_url('/assets/js/shCore.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/shBrushXml.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/shBrushJScript.js'); ?>"></script>



<!-- Optional FlexSlider Additions -->
<script src="<?php echo base_url('/assets/js/jquery.easing.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/jquery.mousewheel.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/demo.js'); ?>"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script>
$('.timepickers').timepicker({
    timeFormat: 'H:mm p',
    interval: 60,
     minTime: '8',
    startTime: '08:00',
     maxTime: '18:00pm',
    defaultTime: '<?=substr($showw2['TimeStart'], 0, 5)?>',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
</script>

<script>
$('.timepickerse').timepicker({
    timeFormat: 'H:mm p',
    interval: 60,
     minTime: '8',
    startTime: '08:00',
     maxTime: '18:00pm',
    defaultTime: '<?=substr($showw2['TimeEnd'], 0, 5)?>',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
</script>

<script>
$('.timepicker').timepicker({
    timeFormat: 'H:mm p',
    interval: 60,
     minTime: '8',
    startTime: '08:00',
     maxTime: '18:00pm',
    defaultTime: '8',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
</script>


<script>
function EjectChangePlan(id)
{
  Swal.fire({
  title: 'กรุณากรอกหมายเหตุที่ยกเลิก',
  input: 'text',
  inputAttributes: {
    autocapitalize: 'off'
  },
  showCancelButton: true,
  confirmButtonText: 'ยืนยัน',
  cancelButtonText: 'ยกเลิก',
  showLoaderOnConfirm: true,
  preConfirm: (login) => {

    $.post("<?=base_url('ApproveChange/EjectChangePlan')?>", {
      id:id,
      login:login
  },
      function (data) {
          console.log(data)
          d = JSON.parse(data)
          var test = JSON.parse(data)
          if(d.status == 1)
          {
              Swal.fire({
                  icon: "success",
                  text: "บันทึกการยกเลิกเรียบร้อย",
              })
              setTimeout(function () {location.href = '<?=base_url("ApproveChange")?>'}, 1000);
              //document.getElementById("demo").innerHTML = d[0].msg;
              //alert("asd")
          }

      }
  );

  },
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {
  if (result.value) {

  }
})
}
</script>

<script>
$('#Name').change(function(){
	var val = $("#Name").val()
  $.post("<?= base_url('Event/CheckProject')?>",{
    Name:val
  },
    function (data) {
      d = JSON.parse(data)

      if(d.status == 1)
      {
        $("#submit").attr("disabled", false);
        $("#submit").css("background-color", "#00a81f");
       
      }
      else
      {
        Swal.fire({
        icon: 'error',
        title: 'มีบางอย่างผิดพลาด',
        text: 'ชื่อของโครงการซ้ำกับที่มีอยู่กรุณาใช้ชื่ออื่น'
      })

      $("#submit").attr("disabled", true);
      $("#submit").css("background-color", "Gray");
   

      }
      
    },
  );
});
</script>

<script type="text/javascript">

function CheckBorrow()
{
    var val = $("#Borrow").val()
    
    $.post("<?=base_url('Event/CheckBorrow/')?>",{Borrow:val}, 
        function (data) {
            d = JSON.parse(data)

            if(d.status == 0)
            {
              Swal.fire({
              icon: 'error',
              title: 'มีบางอย่างผิดพลาด',
              text: 'รหัสผู้ยืมเงินไม่มีในระบบกรุณาแก้ไข'
            })
              $("#submit").attr("disabled", true);
            }else if(d.status == 2){

              Swal.fire({
              icon: 'error',
              title: 'มีบางอย่างผิดพลาด',
              text: 'รหัสนี้ไม่สามารถยืมเงินได้'
            })
              $("#submit").attr("disabled", true);
            }else{
              $("#submit").attr("disabled", false);
            }
        }
    );
}
</script>

<script type="text/javascript">
function Change_Relation()
{
    var val = $("#TypeFile").val()
    
    $.get("<?=base_url('Event/Change/')?>"+val, 
        function (data) {
            
          $("#Type").html(data)

        }
    );
}
</script>

<script type="text/javascript">
function Change_TypeResStudent()
{
    var val = $("#BranchRes").val()
    
    $.get("<?=base_url('Project/Change1/')?>"+val, 
        function (data) {
            
          $("#Res").html(data)

        }
    );
}
</script>
<script type="text/javascript">
function Change_TypeResTeacher()
{
    var val = $("#BranchRes").val()
    
    $.get("<?=base_url('Project/Change2/')?>"+val, 
        function (data) {
            
          $("#Res").html(data)

        }
    );
}
</script>

<script type="text/javascript">
function Change_Compel()
{
    
  var checkBox = document.getElementById("Compel");

  var Typejoinshow2 = document.getElementById("Typejoinshow2");
  var Amountshow = document.getElementById("Amountshow");

  // var a1 = document.getElementById("ad");
  // var a2 = document.getElementById("ac");

  if (checkBox.checked == true){

    // Amount.style.display = "none";
    // Amountshow.style.display = "none";
    Amountshow.style.display = "none";
    Typejoinshow2.style.display = "none";
    // a1.style.display = "block";
    // a2.style.display = "block";

  } else {

    // Amount.style.display = "block";
    // Amountshow.style.display = "block";
    Amountshow.style.display = "block";
    Typejoinshow2.style.display = "block";
    // a1.style.display = "none";
    // a2.style.display = "none";

  }

    
}
</script>
</body>

</html>
