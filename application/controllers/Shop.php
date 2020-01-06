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
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                    <a href="#" onClick = "ApproveDeposit(<?php echo $data['ID_Shop'] ?>);"  class="btn btn mb-3" style="background-color: #4dadab; color: #fff;">แก้ไข</a>              
                                                </span>
                                                </td>  
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                <a href="#" onClick = "EjectDeposit(<?php echo $data['ID_Shop'] ?>);"  class="btn btn mb-3" style="background-color: #df634e; color: #fff;">ลบ</a>              
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

}

/* End of file Shop.php */
 
?>