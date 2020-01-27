  
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
 
  <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo base_url('/assets/js/ajax.js'); ?>"></script>
  <!-- DashBoard -->
  <script src="<?php echo base_url('/assets/js/argon-dashboard.js?v=1.0.0'); ?>"></script>
  <!-- Pusher -->

  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>

  <script src="<?php echo base_url('/assets/js/EZView.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/draggable.js'); ?>"></script>




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
              swal({
                  icon: "success",
                  text: "เข้าสู่ระบบสำเร็จ ยินดีต้อนรับ",
                  
                  
                  
              })
              setTimeout(function () {location.href = '<?=base_url("Information")?>'}, 3000);
              //document.getElementById("demo").innerHTML = d[0].msg;
              //alert("asd")
          }else if(d.status == 2)
          {
            swal({
                  icon: "success",
                  text: "เข้าสู่ระบบสำเร็จ ยินดีต้อนรับ",
                  
                  
                  
              })
              setTimeout(function () {location.href = d.data}, 2000);
          }
          else
          {
              
              swal({
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
          $(document).ready(function(e) {
                            $("#progress").hide();
                        });
                        function testtest(){
                    var formData = new FormData($('#insertAc')[0]);
      
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
                      url : "<?=base_url('InsertActivity/InsertAc')?>",
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
                          setTimeout(function () {location.href = '<?=base_url("MyDoc")?>'}, 3000);
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
                  console.log(id);
                  $.post("<?=base_url('ApproveActivity/Eject/')?>"+id,
                    function (data) {
                      var val = "hello";
                      ShowMydoc();
                    }
                  );
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

<script>
                   $(document).on('submit', '#insertAc', function () {
                    $.post("<?=base_url('Event/Check')?>", $("#insertAc").serialize(),
                        function (data) {
                            
                            d = JSON.parse(data)
                            var test = JSON.parse(data)
                            if(d.status == 1)
                            {
                                swal({
                                    icon: "error",
                                    text: "ชื่อกิจกรรมซ้ำกรุณากรอกชื่อกิจกรรมใหม่", 
                                })
                                //document.getElementById("demo").innerHTML = d[0].msg;
                                //alert("asd")
                            }else if(d.status == 2)
                            {
                                swal({
                                    icon: "error",
                                    text: "อาจารย์ผู้รับผิดชอบไม่สามารถรับผิดชอบกิจกรรมนี้ได้เนื่องจากรับผิดชอบกิจกรรมอื่นอยู่",
                                })             
                            }
                            else if(d.status == 4)
                            {
                              swal({
                                    icon: "error",
                                    text: "ข้อมูลอาจารย์ไม่ถูกต้องกรุณากรอกใหม่aaa",
                                })
                            }else if(d.status == 5){
                              swal({
                                    icon: "error",
                                    text: "ข้อมูลอาจารย์ไม่ถูกต้องกรุณากรอกใหม่",
                                })
                            }else {
                              testtest();
                            }

                        }
                    );

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
              swal({
                  icon: "success",
                  text: "การถอนเสร็จสมบูรณ์",
                  
                  
                  
              })
              location.reload();
              //document.getElementById("demo").innerHTML = d[0].msg;
              //alert("asd")
          }else if(d.status == 2)
          {
            swal({
                  icon: "error",
                  text: "เงินในบัญชีน้อยกว่าจำนวนเงินที่ต้องการถอน"+ "\n" +"จำนวนเงินถอนต้องไม่มากกว่า:"+d.data,
              })
          }
          else
          {
              
              swal({
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
              swal({
                  icon: "success",
                  text: "อัปโหลดเสร็จสมบูรณ ์",
                  
                  
                  
              })
              location.reload();
          }
          else
          {
              
              swal({
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>jQueryold = jQuery.noConflict( true );</script>
<script src="<?php echo base_url('/assets/js/jquery.table2excel.js'); ?>"></script>

<script>
$("button").click(function(){
  $("#table2excel").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "ผลการลงทะเบียนกิจกรรม", //do not include extension
    fileext: ".xls" // file extension
  }); 
});
</script>




<!-- Syntax Highlighter -->
<script src="<?php echo base_url('/assets/js/shCore.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/shBrushXml.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/shBrushJScript.js'); ?>"></script>



<!-- Optional FlexSlider Additions -->
<script src="<?php echo base_url('/assets/js/jquery.easing.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/jquery.mousewheel.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/demo.js'); ?>"></script>
<script>
$("#testdate3").datetimepicker({
    timepicker:false,
    lang:'th',  // แสดงภาษาไทย
    yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    inline:true
});
</script>
<script>
$('#testdate3').datepicker({language:'th-th',format:'dd/mm/yyyy'});</script>
</body>

</html>
