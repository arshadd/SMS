<?php

class SMS extends CI_Controller{

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

    $this->load->view('administration/settings/sms/Index');
  }

  function settings() {

    $this->load->view('administration/settings/sms/settings/Settings');
  }
  function send() {

    $this->load->view('administration/settings/sms/send/Send');
  }

  function log() {

    $this->load->view('administration/settings/sms/log/Log');
  }
}
