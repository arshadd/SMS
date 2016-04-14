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
  function classes() {
    $this->load->view('report/class/class');
  }

  function edit($id) {

    $this->load->view('class/edit');
  }

  function view($id) {
	$this->load->model('employee_m');

    // Load all of the logged-in user's posts
    $employees = $this->employee_m->all_employee( 5 );

    // If employee were fetched from the database, assign them to $data
    // so they can be passed into the view.
    if ($employees) {
      $data['employees'] = $employees;
    }
    $this->load->view('class/view', $data);
  }

}
