<?php defined('BASEPATH') OR exit('No direct script allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Employeedepartments extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('employeedepartments_m');

        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/login/show_login');
        }
    }
    function all_employeedepartments_get()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        $employeedepartments = $this->employeedepartments_m->all_employeedepartments($school_id);
        $this->response(array("status" => "success", "message" => "", "data" => $employeedepartments));
    }



}