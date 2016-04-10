<?php

class Dashboard extends CI_Controller{

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
    $this->load->model('post_m');

    // Get some data from the user's session
    $user_id = $this->session->userdata('id');
    $admin = $this->session->userdata('admin');


    $data['admin'] = $admin;

    $this->load->view('dashboard',$data);
  }


  function create_new_user() {
    $userInfo = $this->input->post(null,true);

    if( count($userInfo) ) {
      $this->load->model('user_m');
      $saved = $this->user_m->create_new_user($userInfo);
    }

    if ( isset($saved) && $saved ) {
       echo "success";
    }
  }

  function update_tagline() {
    $new_tagline = $this->input->post('message');
    $user_id = $this->session->userdata('id');

    if( isset($new_tagline) && $new_tagline != "" ) {
      $this->load->model('user_m');
      $saved = $this->user_m->update_tagline($user_id, $new_tagline);
    }

    if ( isset($saved) && $saved ) {
      $this->session->set_userdata(array('tagline'=>$new_tagline));
      echo "success";
    }
  }

}
