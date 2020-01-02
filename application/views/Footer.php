  
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
    <script src="<?php echo base_url('/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url('/assets/js/argon.js?v=1.0.1'); ?>"></script>
  <!-- sweetalert -->
 
  <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo base_url('/assets/js/ajax.js'); ?>"></script>
  <!-- DashBoard -->
  <script src="<?php echo base_url('/assets/js/argon-dashboard.js?v=1.0.0'); ?>"></script>
  <!-- Pusher -->

  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>




<script>
$(document).ready( function () {
    $('#Filetable').DataTable();
} );
$(document).ready( function () {
    $('#member').DataTable();
} );
$(document).ready( function () {
    $('#Filesearch').DataTable({
    });
    
} );
$(document).ready( function () {
    $('#Log').DataTable({
      "pageLength": 30
    });
    
} );
$(document).ready( function(){
    $('.Doc').EZView();
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
              setTimeout(function () {location.href = '<?=base_url('MyDoc')?>'}, 3000);
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

<!-- --------------------------------------------------------------- TEST --------------------------------------------------- -->
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
                  
                 $("#container").html(data);
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
</script>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>jQueryold = jQuery.noConflict( true );</script>




<!-- Syntax Highlighter -->
<script src="<?php echo base_url('/assets/js/shCore.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/shBrushXml.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/shBrushJScript.js'); ?>"></script>



<!-- Optional FlexSlider Additions -->
<script src="<?php echo base_url('/assets/js/jquery.easing.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/jquery.mousewheel.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/demo.js'); ?>"></script>


<script src="<?php echo base_url('/assets/js/EZView.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/draggable.js'); ?>"></script>
</body>

</html>
