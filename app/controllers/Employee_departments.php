<?php

class Employee_departments extends CI_Controller{

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
        $this->load->view('school/employee_departments_list');
    }

    function edit($id) {
        $this->load->view('employee/edit');
    }

    function view($id) {
        $this->load->view('employee/view');
    }



}
