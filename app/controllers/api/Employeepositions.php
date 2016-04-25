<?php defined('BASEPATH') OR exit('No direct script allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Employeepositions extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('employeepositions_m');

        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/login/show_login');
        }
    }
    function all_employeepositions_get()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        $employeepositions = $this->employeepositions_m->all_employeepositions($school_id);
        $this->response(array("status" => "success", "message" => "", "data" => $employeepositions));
    }



}