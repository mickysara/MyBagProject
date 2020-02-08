<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertTeam extends CI_Controller {

    public function Showdata($id)
    {
        $this->data['id'] = $id;
        $this->load->view('Header');
        $this->load->view('InsertTeam',$this->data,FALSE);
        $this->load->view('Footer');
    }

    public function ShowTeacherInAc()
    { ?>
   <div class="row">
       <div class="col-md-6">
           <div class="form-group">

               <select name="Teacher_res" id="Teacher_res" style="height: 35px;" required>
                   <?php /*$this->db->where('Branch', $this->session->userdata('Branch'));
                         $query = $this->db->get('Teacher');*/
                         $branch = $this->session->userdata('Branch');
                         $query = $this->db->query("select * from Teacher as t
                         left join InTeam as it 
                         on t.Id_Users = it.Id_Users
                         where t.Branch='$branch'");

                         $data_user = [];

                       foreach($query->result_array() as $data)
                       { 
                           if($data['ID_Activities'] != 11 && in_array($data['Id_Users'], $data_user) == false)
                           {
                           ?>
                           <option value="<?php echo $data['ID_Teacher'] ?>">อาจารย์
                       <?php echo $data['Fname']." ".$data['Lname'] ?></option>
                   <?php   }
                           else
                           {
                               array_push($data_user, $data['Id_Users']);
                           }
                       } ?>
               </select>

           </div>
       </div>
   </div>
<?php }

    public function ShowTeacherOut()
    { 
        $branch = $this->session->userdata('Branch');
        $campus = $this->session->userdata('Campus');

        $result = $this->db->query("SELECT * from Teacher as t
        left join InTeam as it 
        on t.Id_Users = it.Id_Users
        where t.Branch !='$branch' AND t.ID_Campus = $campus")
        ?>
            <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                        border-radius: .25rem;
                        background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel"
                    aria-labelledby="inputs-alternative-component-tab">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="Filesearch">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">
                                        <h4>ชื่ออาจารย์</h4>
                                    </th>
                                    <th style="text-align:center;" scope="col">
                                        <h4 style="text-align: left;">จำนวนเงิน</h4>
                                    </th>
                                    <th style="text-align:center;" scope="col">
                                        <h4 style="text-align: left;">วันที่และเวลาทำการโอน</h4>
                                    </th>
                                    <th style="text-align:center;" scope="col">
                                        <h4 style="text-align: left;">หลักฐานการโอนเงิน</h4>
                                    </th>
                                    <th style="text-align:center;" scope="col">
                                        <h4 style="text-align: left;">ยืนยันการฝาก</h4>
                                    </th>
                                    <th style="text-align:center;" scope="col">
                                        <h4 style="text-align: left;">ยกเลิกการฝาก</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                 
                                                        foreach($result->result_array() as $data)
                                                        {?>
                                <tr>
                                    <th scope="row">
                                                                
                    </div>
                    </th>
                    <td>
                        <span class="badge badge-dot mr-4">
                            <p><?php echo $data['Money'];?></p>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-dot mr-4">
                            <p><?php 
                                                                    $var_date = $data['DateTime'];
                                                                    $strDate = $var_date;
                                                                    $strYear = date("Y",strtotime($strDate))+543;
                                                                    $strMonth= date("n",strtotime($strDate));
                                                                    $strDay= date("j",strtotime($strDate));
                                                                    $strH = date("H",strtotime($strDate));
                                                                    $stri = date("i",strtotime($strDate));
                                                                    $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรฎาคม","สิงหาคม","กันยายน","ตุลาคม",
                                                                    "พฤศจิกายน","ธันวาคม");
                                                                    $strMonthThai=$strMonthCut[$strMonth];

                                                                    echo $strDay." ".$strMonthThai." ".$strYear." เวลา ".$strH.":".$stri;
                                                                                        ?></p>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-dot mr-4">
                            <a href="<?php echo base_url("Slip/". $data['Slip']) ?>" class="btn btn mb-3 Doc"
                                style="background-color: #1778F2; color: #fff;">หลักฐานการโอนเงิน</a>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-dot mr-4">
                            <a href="<?php echo base_url("ListDeposit/Approve/".$data['ID_Deposit']) ?>" class="btn btn mb-3"
                                style="background-color: #00a81f; color: #fff;">ยืนยันการฝาก</a>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-dot mr-4">
                            <a onclick="EjectDeposit(<?php echo $data['ID_Deposit'] ?>)" class="btn btn mb-3"
                                style="background-color: #c62121; color: #fff;">ยกเลิกการฝาก</a>
                        </span>
                    </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                </div>
            </div>
    <?php }
}

/* End of file InsertTeam.php */
