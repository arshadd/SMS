<?php

class Manage extends CI_Controller{

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
  function Index() {

    $this->load->view('academics/exam/Index');
  }

  function exam() {

    $this->load->view('academics/exam/manage_exam/Exam_list');
  }
  function grade() {

    $this->load->view('academics/exam/manage_grade/Grade_list');
  }
  function marks() {

    $this->load->view('academics/exam/manage_marks/Marks_list');
  }
}
