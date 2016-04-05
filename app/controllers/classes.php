<?php

class classes extends CI_Controller{

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
	$this->load->model('classes_m');

    // Load all of the logged-in user's posts
    $classes = $this->classes_m->all_classes( 10 );

    // If employee were fetched from the database, assign them to $data
    // so they can be passed into the view.
    if ($classes) {
      $data['classes'] = $classes;
    }
    $this->load->view('class/list', $data);
  }

  function edit($id) {
	$this->load->model('classes_m');

    // Load all of the logged-in user's posts
    $class = $this->classes_m->class_info($id);

    $data['class'] =null;
    // If employee were fetched from the database, assign them to $data
    // so they can be passed into the view.
    if ($class) {
      $data['class'] = $class[0];
    }

    $this->load->view('class/edit', $data);
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
