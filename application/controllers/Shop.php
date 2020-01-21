<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Shop');
        $this->load->view('Footer');
    }

    public function Showshop()
    {

        
        $result = $this->db->query("SELECT Shop.ID_Shop,Shop.Fname,Shop.Lname,Campus.Name_Campus,Shop.Money  
                                    FROM `Shop`,Campus 
                                    WHERE Shop.ID_Campus = Campus.ID_Campus");
        
        
        
            
        if($result->num_rows() == 0)
        {?>
            <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">ร้านค้า</h2>
                    <hr>       
                    <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มีร้านค้าภายในระบบ</h2>
                </div>
            </div>
        <?php 
        }else{
        ?>
        
        <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">ร้านค้า</h2>
                    <hr>
                    <div class="table-responsive">   
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>รหัสร้านค้า</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ชื่อผู้ประกอบการ</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">วิทยาเขต</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">แก้ไข</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ลบ</h4></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php                 
                                                foreach($result->result_array() as $data)
                                                {?>
                                            <tr>
                                                <th scope="row">
                                                <div class="media align-items-center">
                                                        <a href="#" class="avatar rounded-circle mr-3">
                                                            <i class="fa fa-bicycle"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <span class="mb-0 text-sm"> <p style="margin-bottom: 0px;"><?php echo $data['ID_Shop'];?></p> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                </th>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                    <p><?php echo $data['Fname']." ".$data['Lname'];?></p>
                                                </span>
                                                </td> 
                                                <td>
                                                    <p><?php echo $data['Name_Campus'];?></p>
                                                </td>
                                                <td class="">
                          
                          <div>
                          <button type="button" class="btn btn" style="margin-bottom: 20px; background-color: #00a81f; color: #fff;" data-toggle="modal"  data-target="#<?php echo $data['Fname'];?>">Edit</button>                 
                          
                            <div class="modal fade" id="<?php echo $data['Fname'];?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $data['Fname'];?>" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content" style="color: #2d3436;">
                               
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="modal-title-default">แก้ไขข้อมูลผู้จัดการ : <?php echo $data['Fname'];?></h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body">
                                    <form action="<?php echo base_url('Shop/editshop/').$data['ID_Shop']; ?>" name="AddLoan_form" id="AddLoan_form" method="post">
                                    ชื่อผู้ประกอบการ :
                              <input type="text" class="form-control mt-3 mb-3 ml-2" id="Fname" name="Fname" value="<?php echo $data['Fname'];?>">
                              นามสกุลผู้ประกอบการ :
                              <input type="text" class="form-control mt-3 mb-3 ml-2" id="Lname" name="Lname" value="<?php echo $data['Lname'];?>">
                              วิทยาเขต :
                              <select name="Campus" id="Campus" >
                                <option value="<?php echo $data['Name_Campus'];?>"><?php echo $data['Name_Campus'];?></option>
                                <option value="วิทยาเขตจักพงษภูวนารถ">วิทยาเขตจักพงษภูวนารถ</option>
                                <option value="วิทยาเขตบางพระ">วิทยาเขตบางพระ</option>
                                <option value="วิทยาเขตอุเทนถวาย">วิทยาเขตอุเทนถวาย</option>
                                <option value="วิทยาเขตจันทบุรี">วิทยาเขตจันทบุรี</option>
                              </select>
                              <input type="hidden" id="<?php echo $data['ID_Shop'];?>" name="ID_Shop" value="<?php echo $data['ID_Shop'];?>">
                              
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-success">ยืนยัน</button>
                            </div>
                              </form>
                        </div>
                        </td>                                             
                                                <td> 
                                                <span class="badge badge-dot mr-4">
                                                <a href="<?php echo site_url(); ?>Shop/deleteshop/<?php echo $data['ID_Shop'];?>" class="btn btn mb-3" style="background-color: #df634e; color: #fff;">ลบ</a>              
                                                </span>
                                                </td>  
                                            </tr>
                                            <?php } 
                                        } ?>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <?php
    }

  public function editshop($idshop){

    $this->db->where('Name_Campus', $this->input->post('Campus'));
    $queryuser = $this->db->get('Campus');
    $showdata = $queryuser->row_array();
    // echo($showdata['ID_Campus']);
    $object = array(
        'Fname'  =>  $this->input->post('Fname'),
        'Lname'   =>  $this->input->post('Lname'),
        'ID_Campus'  =>  $showdata['ID_Campus']
    );
    $this->db->where('ID_Shop', $this->input->post('ID_Shop'));
    $query=$this->db->update('Shop',$object);

    redirect('Shop','refresh');
  }

  public function deleteshop($idshop){

    $this->db->where('ID_Shop', $idshop);
    $this->db->delete('Shop');
    
    redirect('Shop','refresh');
  }
 
}

/* End of file Shop.php */
 
?>