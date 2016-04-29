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

    $this->load->view('academics/subject/report/Index');
  }

  function all_subject() {

    $this->load->view('academics/subject/report/subject_list');
  }

  function subject_detail() {

    $this->load->view('academics/subject/report/Subject_detail');
  }

  function batch_subjects() {

    $this->load->view('academics/subject/report/Batch_subjects');
  }
}
