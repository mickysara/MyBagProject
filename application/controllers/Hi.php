<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Hi extends CI_Controller {


  /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function index()
   {
	$this->load->view('mypdf');
   }


   /**
    * Get Download PDF File
    *
    * @return Response
   */
   function mypdf(){


	$this->load->library('pdf');


  	$this->pdf->load_view('mypdf');
  	$this->pdf->render();


  	$this->pdf->stream("welcome.pdf");
   }
}