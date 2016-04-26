<?php defined('BASEPATH') OR exit('No direct script allowed');
    
require APPPATH.'/libraries/REST_Controller.php';

class Student_attendances extends REST_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('student_attendances_m');
        $this->load->helper('url');
        $this->load->helper('date');


        if( !$this->session->userdata('isLoggedIn') ) {
            redirect('/login/show_login');
        }
    }

    /*function all_students_get()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        $students = $this->students_m->all_students($school_id);
        $this->response(array("status" => "success", "message" => "", "data" => $students));
    }*/

    function all_batch_students_get($batch_id = null, $attendance_date = null)
    {
        $attendance_date =  date('Y-m-d', strtotime($this->get('attendance_date')));
        //$this->response(array("status" => "false", "message" => "Invalid attendance date", "data" => $attendance_date));

        if (is_null($batch_id) || $batch_id == 0) {
            $this->response(array("status" => "false", "message" => "Invalid batch id", "data" => false));
        }
        else if (is_null($attendance_date) || $attendance_date == '') {
            $this->response(array("status" => "false", "message" => "Invalid attendance date", "data" => false));
        }
        else {
            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $batch_students = $this->student_attendances_m->all_batch_students($school_id, $batch_id, $attendance_date);

            $batch_students_summary = $this->student_attendances_m->all_batch_students_summary($school_id, $batch_id, $attendance_date);

            $this->response(array(
                        "status" => "success"
                        , "message" => ""
                        , "summary" =>$batch_students_summary
                        , "data" => $batch_students));
        }
    }


    function all_batch_students_pivot_get($batch_id = null, $from_date = null, $to_date = null)
    {
        $from_date =  date('Y-m-d', strtotime($this->get('from_date')));
        $to_date =  date('Y-m-d', strtotime($this->get('to_date')));

        //$this->response(array("status" => "false", "message" => "Invalid attendance date", "data" => $attendance_date));

        if (is_null($batch_id) || $batch_id == 0) {
            $this->response(array("status" => "false", "message" => "Invalid batch id", "data" => false));
        }
        else if (is_null($from_date) || is_null($to_date)) {
            $this->response(array("status" => "false", "message" => "Invalid from-date or to-date", "data" => false));
        }
        else {
            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $batch_students_pivot = $this->student_attendances_m->all_batch_students_pivot($school_id, $batch_id, $from_date, $to_date);

            //$batch_students_summary = $this->student_attendances_m->all_batch_students_summary($school_id, $batch_id, $attendance_date);

            $this->response(array(
                "status" => "success"
                , "message" => ""
                , "data" => $batch_students_pivot));
        }
    }

    function all_students_pivot_get($student_id = null, $from_date = null, $to_date = null)
    {
        $from_date =  date('Y-m-d', strtotime($this->get('from_date')));
        $to_date =  date('Y-m-d', strtotime($this->get('to_date')));

        //$this->response(array("status" => "false", "message" => "Invalid attendance date", "data" => $attendance_date));

        if (is_null($student_id) || $student_id == 0) {
            $this->response(array("status" => "false", "message" => "Invalid student id", "data" => false));
        }
        else if (is_null($from_date) || is_null($to_date)) {
            $this->response(array("status" => "false", "message" => "Invalid from-date or to-date", "data" => false));
        }
        else {
            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $students_pivot = $this->student_attendances_m->all_students_pivot($school_id, $student_id, $from_date, $to_date);

            $this->response(array(
                "status" => "success"
                , "message" => ""
                , "data" => $students_pivot));
        }
    }

    function save_post()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        $_POST['attendance_date'] =  date('Y-m-d', strtotime($_POST['attendance_date']));

        $response = $this->student_attendances_m->save($school_id, $_POST);

        if ($response['result'] === FALSE) {
            $this->response(array("status" => "failed", "message" => $response['message'], "data" => null));
        } else {
            $this->response(array("status" => "success",  "message" => $response['message'], "data" => $response['data']));
        }

        //$this->response(array("status" => "success", "message" => "", "data" => $_POST));
    }

}