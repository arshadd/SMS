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

    $this->load->view('academics/student/report/index');
  }

  function all_student() {

    $this->load->view('academics/student/report/Student_list');
  }

  function student_detail() {

    $this->load->view('academics/student/report/Student_detail');
  }

  function batch_students() {

    $this->load->view('academics/student/report/Batch_students');
  }

  function attendance() {

    $this->load->view('academics/student/report/Attendance');
  }
}
