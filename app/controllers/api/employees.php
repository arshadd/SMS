<?php defined('BASEPATH') OR exit('No direct script allowed');

require APPPATH.'/libraries/REST_Controller.php';

class employees extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('employees_m');

        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/login/show_login');
        }
    }

    function all_employees_get()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        $employees = $this->employees_m->all_employees($school_id);
        $this->response(array("status" => "success", "message" => "", "data" => $employees));
    }

    function find_employee_get($employee_id)
    {
        //Validation
        if (is_null($employee_id)) {
            $this->response(array("status" => "false", "message" => "Invalid employee id", "data" => null));
        } else {
            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $employee = $this->employees_m->find_employee($school_id, $employee_id);
            $this->response(array("status" => "success", "message" => "", "data" => $employee));
        }
    }

    function save_post()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        //Get primary key
        $employee_id = $this->post('employee_id');

        //Make array
        $employee = array(
            'code' => $this->post('code'),
            'name' => $this->post('name'),
            'first_name' => $this->post('first_name'),
            'middle_name' => $this->post('middle_name'),
            'last_name' => $this->post('last_name'),
            'joining_date' => $this->post('joining_date'),
            'job_title' => $this->post('job_title'),
            'gender' => $this->post('gender'),
            'user_id' => $this->post('user_id'),
            'is_active' => $this->post('is_active'),
            'school_id' => $school_id
        );

        //Save
        $return = $this->employees_m->save($school_id, $employee_id, $employee);

        if ($return['result'] === FALSE) {
            $this->response(array("status" => "failed", "message" => "Failed to save.", "data" => $return['data']));
        } else {
            $this->response(array("status" => "success", "message" => "employee information saved successfully", "data" => $return['data']));
        }
    }

    function delete_post()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        //Get primary key
        $employee_id = $this->post('employee_id');

        //Delete
        $result = $this->employees_m->delete($school_id, $employee_id);

        if ($result === FALSE) {
            $this->response(array("status" => "failed", "message" => "Failed to delete.", "data" => $employee_id));
        } else {
            $this->response(array("status" => "success", "message" => "employee information deleted successfully", "data" => $employee_id));
        }
    }

}