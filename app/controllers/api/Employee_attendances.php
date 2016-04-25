<?php defined('BASEPATH') OR exit('No direct script allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Employee_attendances extends REST_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('employee_attendances_m');
        $this->load->helper('url');
        $this->load->helper('date');


        if( !$this->session->userdata('isLoggedIn') ) {
            redirect('/login/show_login');
        }
    }


    function all_employees_get()
    {

        $attendance_date =  date('Y-m-d', strtotime($this->get('attendance_date')));
        //$this->response(array("status" => "false", "message" => "Invalid attendance date", "data" => $attendance_date));


        if (is_null($attendance_date) || $attendance_date == '') {
            $this->response(array("status" => "false", "message" => "Invalid attendance date", "data" => null));
        }
        else {
            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $department_employees = $this->employee_attendances_m->all_department_employees($school_id, $attendance_date);
         if($department_employees)
             $employees_summary = $this->employee_attendances_m->all_employees_summary($school_id, $attendance_date, count($department_employees));

            $this->response(array(
                "status" => "success"
            , "message" => ""
            , "summary" => $employees_summary
            , "data" => $department_employees));
        }
    }

    function save_post()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        $_POST['attendance_date'] =  date('Y-m-d', strtotime($_POST['attendance_date']));

        $response = $this->employee_attendances_m->save($school_id, $_POST);

        if ($response['result'] === FALSE) {
            $this->response(array("status" => "failed", "message" => $response['message'], "data" => null));
        } else {
            $this->response(array("status" => "success",  "message" => $response['message'], "data" => $response['data']));
        }

//        $this->response(array("status" => "success", "message" => "", "data" => $response));
    }

}
