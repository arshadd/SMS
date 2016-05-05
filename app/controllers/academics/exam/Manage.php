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


  function system_exam() {

    $this->load->view('academics/exam/system_exam/Exam_list');
  }
  function system_grade() {

    $this->load->view('academics/exam/system_grade/Grade_list');
  }


  function class_exam() {

    $this->load->view('academics/exam/class_exam/Exam_list');
  }
  function class_grade() {

    $this->load->view('academics/exam/class_grade/Grade_list');
  }

  function class_marks() {

    $this->load->view('academics/exam/class_marks/Marks_list');
  }


}
