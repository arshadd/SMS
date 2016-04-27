<?php

class Settings extends CI_Controller{

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

    $this->load->view('administration/human_resources/settings/Index');
  }

  function department() {

    $this->load->view('administration/human_resources/settings/department/Department_list');
  }
  function designation() {

    $this->load->view('administration/human_resources/settings/designation/Designation_List');
  }
}
