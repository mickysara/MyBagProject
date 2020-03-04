<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePlan extends CI_Controller {


    public function showdata($id)
    {
        $this->data['ID']= $id;
        $this->load->view('Header');
        $this->load->view('ChangePlan', $this->data, FALSE);
        $this->load->view('Footer');
    }

    public function ChangeActivity($id)
    {
        $this->db->where('ID_Activities', $id);
        $query = $this->db->get('Activities', 1);

        $data = $query->row_array(); 
        $startdate = date("d-m-Y", strtotime($data['DateStart']));
        $enddate = date("d-m-Y", strtotime($data['DateEnd']));

              if($data['CountEdit'] != 2)
              { ?>
                <div class="row">
						<div class="col-md-6">
							<p>วันที่เริ่มจากเดิม</p>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-alternative"  placeholder="<?php echo $startdate ?>" disabled>
                            </div>
						</div>
						<div class="col-md-6">
							<p>เวลาเริ่มจากเดิม</p>
                            <div class="form-group">
                                <input type="email" style="max-width:166px;" class="form-control form-control-alternative"  placeholder="<?php echo $data['TimeStart'] ?>" disabled>
                            </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p>วันที่สิ้นสุดจากเดิม</p>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-alternative"  placeholder="<?php echo $enddate ?>" disabled>
                            </div>
						</div>
						<div class="col-md-6">
							<p>เวลาสิ้นสุดจากเดิม</p>
                            <div class="form-group">
                                <input type="email" style="max-width:166px;" class="form-control form-control-alternative"  placeholder="<?php echo $data['TimeEnd'] ?>" disabled>
                            </div>
						</div>
					</div>
				</div>
        <?php }else{
            echo 0;
              } 
      
               
     
    }

    public function Create()
    {   
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf|pptx|docx|xlsx';
            $config['max_size']  = '1000000000';
            $config['max_width']  = '1000000000';
            $config['max_height']  = '1000000000';
            $this->upload->initialize($config);
            // $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('File')){
                echo $this->upload->display_errors();
            }
            else{
                $data = $this->upload->data();
    
                $filename = $data['file_name'];
                //$imgtype_name = $data['imgtype_name'];
                $Date1 = $this->input->post("DateStart");
                $dat1 = date("Y-m-d", strtotime($Date1));
    
                $Date2 = $this->input->post("DateEnd");
                $dat2 = date("Y-m-d", strtotime($Date2));
    
                $arr=array(
                    'ID_Activities'=> $this->input->post("id"),
                    'DateStart'=> $dat1,
                    'DateEnd'=> $dat2,
                    'TimeStart'=> $this->input->post("TimeStart"),
                    'TimeEnd'=> $this->input->post("TimeEnd"),
                    'File'=> $filename,
                    'Status'    => 0
                );
    
                $this->db->insert('ChangePlan', $arr);
               
                
            }
        
    
    }
    
    public function Test()
    {

    }
}

/* End of file ChangePlan.php */
