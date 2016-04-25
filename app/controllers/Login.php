<?php

class Login extends CI_Controller {

	public function __construct(){
	  parent::__construct();
	  $this->load->library('session');
	}

    function index() {
        if( $this->session->userdata('isLoggedIn') ) {
            redirect('/dashboard/index');
        } else {
            $this->show_login(false);
        }
    }

    function login_user() {
        // Create an instance of the user model
        $this->load->model('user_m');

        // Grab the email and password from the form POST
        $email = $this->input->post('username');
        $pass  = $this->input->post('password');

        //Ensure values exist for email and pass, and validate the user's credentials
        if( $email && $pass && $this->user_m->validate_user($email,$pass)) {
            // If the user is valid, redirect to the main view
            redirect('/dashboard/index');
        } else {
            // Otherwise show the login screen with an error message.
            $this->show_login(true);
        }
    }

    function show_login( $show_error = false ) {
        $data['error'] = $show_error;

        $this->load->helper('form');
        $this->load->view('login',$data);
    }

    function logout_user() {
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		$this->index();
    }

    function showphpinfo() {
        echo phpinfo();
    }


}
