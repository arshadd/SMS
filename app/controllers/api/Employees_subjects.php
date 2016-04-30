<?php defined('BASEPATH') OR exit('No direct script allowed');
    
require APPPATH.'/libraries/REST_Controller.php';

class Employees_subjects extends REST_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('employees_subjects_m');

        if( !$this->session->userdata('isLoggedIn') ) {
            redirect('/login/show_login');
        }
    }

    function all_employees_subjects_get($employee_id = null)
    {
        //Get logged school id
        if (is_null($employee_id)) {
            $this->response(array("status" => "false", "message" => "Invalid employee id", "data" => null));
        } else {

            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $employee_subjects = $this->employees_subjects_m->all_employees_subjects($school_id, $employee_id);
            $this->response(array("status" => "success", "message" => "", "data" => $employee_subjects));
        }

    }

    function all_batch_employees_subjects_get($batch_id = null)
    {
        //Validation
        if (is_null($batch_id)) {
            $this->response(array("status" => "false", "message" => "Invalid batch id", "data" => null));
        } else {

            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $batch_subjects = $this->employees_subjects_m->all_batch_employees_subjects($school_id, $batch_id);
            $this->response(array("status" => "success", "message" => "", "data" => $batch_subjects));
        }
    }


    function find_employee_subject_get($employee_subject_id = null)
    {
        //Validation
        if (is_null($employee_subject_id)) {
            $this->response(array("status" => "false", "message" => "Invalid employee subject id", "data" => null));
        } else {
    
            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $employee_subject = $this->employees_subjects_m->find_employee_subject($school_id, $employee_subject_id);
            $this->response(array("status" => "success", "message" => "", "data" => $employee_subject));
        }
    }

    function save_post()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        //Get primary key
        $employees_subjects_id = $this->post('employees_subjects_id');
        
        //Make array
        /*$employees_subjects = array(
            'employees_subjects_id' => $employees_subjects_id,
            'employee_id' => $this->post('employee_id'),
            'subject_id' => $this->post('subject_id'),
            'school_id' => $school_id
        );*/

        //$this->response(array("status" => "success",  "message" => "", "data" => $employees_subjects));


        //Save
        $response = $this->employees_subjects_m->save($school_id, $employees_subjects_id, $_POST);

        if ($response['result'] === FALSE) {
            $this->response(array("status" => "failed", "message" => $response['message'], "data" => null));
        } else {
            $this->response(array("status" => "success",  "message" => $response['message'], "data" => $response['data']));
        }
    }

    function delete_post()
    {
        //Get logged school id
        //$school_id = $this->session->userdata('school_id');

        //Get primary key
        $employees_subjects_id = $this->post('employees_subjects_id');

        //Delete
        $response = $this->employees_subjects_m->delete($employees_subjects_id);

        if ($response['result']=== FALSE) {
            $this->response(array("status" => "failed", "message" => $response['message'], "data" => null));
        } else {
            $this->response(array("status" => "success", "message" => $response['message'], "data" => $employees_subjects_id));
        }
    }

}