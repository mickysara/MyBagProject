<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Transaction');
        $this->load->view('Footer');
    }

    public function ShowTransaction()
    {   
        $id = $this->session->userdata('ID');
              $result  =  $this->db->query("SELECT *, 'x' as chk From Transaction as a 
                                            Where a.Transaction_Of = '$id' 
                                            Union 
                                            Select *, 'y' as chk 
                                            From Transaction as b Where b.Recived_Transaction = '$id' Order by TimeStamp DESC");
        
                    
                if($result->num_rows() == 0)
                {?>
                    <h1>ธุรกรรมภายในบัญชี</h1>
                    <div class="question-item_like" align="right" style="align:right;">
                        <h2 style="">เงินในบัญชีของคุณ: 200.00 บาท</h2>
                    </div>
                <?php 
                }else{
                ?>

                <h1>ธุรกรรมภายในบัญชี</h1>
                <div class="question-item_like" align="right" style="align:right;">
                <?php    $this->db->where('Id_Student', $this->session->userdata('ID'));
                        $qq = $this->db->get('student', 1);
                        if($qq->num_rows() == 0)
                        {
                            $this->db->where('ID_Teacher', $this->session->userdata('ID'));
                            $qq =  $this->db->get('Teacher', 1);
                            $datamoney  =   $qq->row_array();
                            
                            
                        }else{
                            $datamoney = $qq->row_array();
                        }
                        
                 ?>
                    <h2 style="">เงินในบัญชีของคุณ: <?php echo $datamoney['Money']; ?> บาท</h2>
                </div>
                <hr>
                <?php foreach($result->result_array() as $data)
                    {
                        if($data['Method'] == 'ฝากเงิน')
                        {?>
                             <div class="message" style="padding: 30px; border-bottom: 1px solid #adb5bd;">
                                    <div class="message-Hader mb-1" style="display: -webkit-flex;">
                                        <div class="avatar" style="margin-right: 15px; width:">
                                            <i class="fa fa-circle-08">
                                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                                            </i>
                                        </div>
                                        <div class="question-item__header-center" style="-webkit-flex: 1;
                                                                                        -ms-flex: 1;
                                                                                        /* flex: 1; */
                                                                                        /* width: 50%; */
                                                                                        /* overflow: hidden; */margin-right: 20px;">
                                            <div class="question-item__author truncate">
                                                <p style="margin-bottom: 0px; font-weight: 600; font-size: 18px; width: max-content;">ฝาก</p>
                                            </div>
                                            <div class="question-item__date">
                                                <p style="font-size: 14px; width: max-content;">                                        
                                                <?php                                         
                                            $var_date = $data['TimeStamp'];
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
                                        ?> </p>
                                            </div>
                                    </div>
                                    </div>
                                    <div class="question-item_Body" style="word-wrap: break-word;   overflow-wrap: break-word;  overflow: hidden;">
                                            
                                    </div>
                                    <div class="question-item_like" align="right" style="align:right;">
                                            <p style="color: #00a81f;">+<?php echo $data['Money'] ?> บาท</p>
                                    </div>
                            </div>

                <?php
                    }else if($data['Method'] == 'โอนเงิน' && $data['chk'] == 'x')
                    { ?>
                        <div class="message" style="padding: 30px; border-bottom: 1px solid #adb5bd;">
                                            <div class="message-Hader mb-1" style="display: -webkit-flex;">
                                                <div class="avatar" style="margin-right: 15px; width:">
                                                    <i class="fa fa-circle-08">
                                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                                    </i>
                                                </div>
                                                <div class="question-item__header-center" style="-webkit-flex: 1;
                                                                                                -ms-flex: 1;
                                                                                                /* flex: 1; */
                                                                                                /* width: 50%; */
                                                                                                /* overflow: hidden; */margin-right: 20px;">
                                                    <div class="question-item__author truncate">
                                                        <p style="margin-bottom: 0px; font-weight: 600; font-size: 18px; width: max-content;">โอนเงิน</p>
                                                    </div>
                                                    <div class="question-item__date">
                                                    <p style="font-size: 14px; width: max-content;">                                        
                                                <?php                                         
                                            $var_date = $data['TimeStamp'];
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
                                        ?> </p>
                                                    </div>
                                            </div>
                                            </div>
                                            <div class="question-item_Body" style="word-wrap: break-word;   overflow-wrap: break-word;  overflow: hidden;">
                                                <p>เลขที่บัญชีที่ปลายทาง: <?php echo $data['Recived_Transaction'] ?></p>
                                            </div>
                                            <div class="question-item_like" align="right" style="align:right;">
                                                <p style="color: #db0f2f;">- <?php echo $data['Money'] ?> บาท</p>
                                            </div>
                        </div>
                <?php }else if($data['Method'] == 'โอนเงิน' && $data['chk'] == 'y')
                      { ?>
                            <div class="message" style="padding: 30px; border-bottom: 1px solid #adb5bd;">
                                            <div class="message-Hader mb-1" style="display: -webkit-flex;">
                                                <div class="avatar" style="margin-right: 15px; width:">
                                                    <i class="fa fa-circle-08">
                                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                                    </i>
                                                </div>
                                                <div class="question-item__header-center" style="-webkit-flex: 1;
                                                                                                -ms-flex: 1;
                                                                                                /* flex: 1; */
                                                                                                /* width: 50%; */
                                                                                                /* overflow: hidden; */margin-right: 20px;">
                                                    <div class="question-item__author truncate">
                                                        <p style="margin-bottom: 0px; font-weight: 600; font-size: 18px; width: max-content;">รับเงินโอน</p>
                                                    </div>
                                                    <div class="question-item__date">
                                                    <p style="font-size: 14px; width: max-content;">                                        
                                                            <?php                                         
                                                        $var_date = $data['TimeStamp'];
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
                                                    ?> </p>
                                                    </div>
                                            </div>
                                            </div>
                                            <div class="question-item_Body" style="word-wrap: break-word;   overflow-wrap: break-word;  overflow: hidden;">
                                                <p>จากบัญชี: <?php echo $data['Transaction_Of'] ?></p>
                                            </div>
                                            <div class="question-item_like" align="right" style="align:right;">
                                                <p style="color: #00a81f;">+<?php echo $data['Money'] ?> บาท</p>
                                            </div>
                            </div>
                <?php }else{ ?>
                    <div class="message" style="padding: 30px; border-bottom: 1px solid #adb5bd;">
                                            <div class="message-Hader mb-1" style="display: -webkit-flex;">
                                                <div class="avatar" style="margin-right: 15px; width:">
                                                    <i class="fa fa-circle-08">
                                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                                    </i>
                                                </div>
                                                <div class="question-item__header-center" style="-webkit-flex: 1;
                                                                                                -ms-flex: 1;
                                                                                                /* flex: 1; */
                                                                                                /* width: 50%; */
                                                                                                /* overflow: hidden; */margin-right: 20px;">
                                                    <div class="question-item__author truncate">
                                                        <p style="margin-bottom: 0px; font-weight: 600; font-size: 18px; width: max-content;">ถอนเงิน</p>
                                                    </div>
                                                    <div class="question-item__date">
                                                    <p style="font-size: 14px; width: max-content;">                                        
                                                            <?php                                         
                                                        $var_date = $data['TimeStamp'];
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
                                                    ?> </p>
                                                    </div>
                                            </div>
                                            </div>
                                            <div class="question-item_Body" style="word-wrap: break-word;   overflow-wrap: break-word;  overflow: hidden;">
                                                
                                            </div>
                                            <div class="question-item_like" align="right" style="align:right;">
                                                <p style="color: #db0f2f;">- <?php echo $data['Money'] ?> บาท</p>
                                            </div>
                            </div>
             <?php   }  
                    
                }
            }
    }

}

/* End of file Transaction.php */
