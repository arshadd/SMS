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

    $this->load->view('administration/human_resources/Index');
  }

  function employee_search() {

    $this->load->view('administration/human_resources/employee_search/Employee_list');
  }
  function employee_attendance() {

    $this->load->view('administration/human_resources/employee_attendance/Employee_list');
  }

  function admission() {

    $this->load->view('administration/human_resources/employee_admission/Create_edit_employee');
  }
}
