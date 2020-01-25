<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('ID') != null)
        {
            $this->load->view('Header');
            $this->load->view('Information');
            $this->load->view('Footer');
        }else
        {
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('AlertLogin','refresh');
            
        }
    }

}

/* End of file Information.php */
