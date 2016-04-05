<?php

class studentattendance extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

   /* if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');*/
    }
    
    
    function listall() {
    $this->load->view('listall');
  }
    
  }