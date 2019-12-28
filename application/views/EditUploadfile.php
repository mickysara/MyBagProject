<!DOCTYPE html>
<html lang="en">
 <head>
 <!-- <script src = "/assets/js/upload.js"></script> -->
  </head>
  <body>

  <?php          
                    if(isset($edit_data) && is_array($edit_data) && count($edit_data)): $i=1;
                    foreach ($edit_data as $key => $data) {   
                ?>
  <div class="container" style="margin-top: 60px;">
    <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">
            <?php $repostrnono = base_url(uri_string());
             $arraystate2 = (explode("/",$repostrnono));
             $idRepo = ($arraystate2[6]);?>

            <?php     
             $this->db->where('ID_Document',$idRepo);
             $query = $this->db->get('Document');
             $gorepo = $query->row_array();            
             ?>

          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <div class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form method="post" action="<?php echo site_url('EditUploadfile/editfile/').$idRepo;?>" id="upload_form" enctype='multipart/form-data'>
                <h1 class="display-2" style="color:#2d3436;">อัปโหลดไฟล์</h1>
                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>หัวข้อ</div>
                    <input type="text" class="form-control form-control-alternative" id="topic" name="topic"  value="<?php echo $data['Topic'];?>" required>
                    </div>

                    
                    <div class="form-group">
                    <td>เอกสาร</td>
                      <input type="file" required id="image_file" name="userfile[]"  accept=".pdf,.pptx,.docx,.xlsx">
                      <input type="hidden" id="namefile" name="namefile">
                    </div>

                    <div class="form-group">
                    <div>รายละเอียด</div>
                    <textarea class="form-control form-control-alternative" rows="4" id="detail" name="detail"  required><?php echo $data['Detail'];?></textarea>
                    </div>


                    <div id="progress" class="progress mb-4"style="height: 20px">
                    <div id="progress-bar-fill" class="progress-bar-fill bg-primary " role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    
                   </div>
                   <p id="tt"></p>
                   <input type="hidden" name="ID_Document" value= <?php echo $data['ID_Document'];?>>
                   <button onclick="testtest()"  type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" value="Submit">ยืนยัน</button>
            </form>
            <?php } endif; ?>
</div>

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
                      url : "<?=base_url('Uploadfile/editFile').$idRepo?>?>",
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

      </body>
            </div>
</div>
