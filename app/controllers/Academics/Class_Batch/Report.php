<?php

class Report extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
	$this->load->library('session');

    if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
  }

  /**
   * This is the controller method that drives the application.
   * After a user logs in, show_main() is called and the main
   * application screen is set up.
   */
  function index() {

    $this->load->view('academics/class_batch/report/Index');
  }
  function classes() {

    $this->load->view('academics/class_batch/report/Class_list');
  }

  function batches() {

    $this->load->view('academics/class_batch/report/Batch_list');
  }
}
