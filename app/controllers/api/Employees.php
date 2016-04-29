<?php defined('BASEPATH') OR exit('No direct script allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Employees extends REST_Controller
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

    function new_employee_get()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        $employee = $this->employees_m->new_employee($school_id);
        $this->response(array("status" => "success", "message" => "", "data" => $employee));
    }
    function all_employees_get()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        $employees = $this->employees_m->all_employees($school_id);
        $this->response(array("status" => "success", "message" => "", "data" => $employees));
    }

    function find_employee_get($employee_id = null)
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

        $_POST['photo'] = EMPLOYEE_DEFAULT_IMAGE;
        //-------------File uploading---------------//
        //if (!is_dir($config['upload_path'])) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
        if (empty($_FILES['employeePhoto'])===FALSE) {

            $config['upload_path'] = 'assets/resource/employees/';
            $config['allowed_types'] = 'png|jpg|jpeg|gif|bmp';
            $config['max_size'] = '2048000';
            /*$config['max_width'] = '1024';
            $config['max_height'] = '768';*/
            $config['overwrite'] = TRUE;
            $config['encrypt_name'] = FALSE;
            $config['remove_spaces'] = TRUE;

            // if(isset($_FILES['Photo'])) {
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('employeePhoto')) {
                $error = array('error' => $this->upload->display_errors());
                //$this->load->view('upload_form', $error);

                $this->response(array("status" => "failed", "message" => $error['error'], "data" => null));
            } else {
                $data = $this->upload->data();

                //Build logo Path
                $photo = $config['upload_path'] . $data['file_name'];

                $_POST['photo'] = $photo;
            }
        }
        //-------------------------------------------------------//

        //Save date in date format
        $_POST['joining_date'] = date('Y-m-d', strtotime($this->post('joining_date')));
        $_POST['date_of_birth'] = date('Y-m-d', strtotime($this->post('date_of_birth')));
        $_POST['gender'] = (int)$this->post('gender');
        $_POST['employee_department_id'] = (int)$this->post('employee_department_id');
        $_POST['employee_position_id'] = (int)$this->post('employee_position_id');
        $_POST['experience_year'] = (int)$this->post('experience_year');
        $_POST['experience_month'] = (int)$this->post('experience_month');


        //Save
        $response = $this->employees_m->save($school_id, $employee_id, $_POST);

        if ($response['result'] === FALSE) {
            $this->response(array("status" => "failed", "message" => $response['message'], "data" => null));
        } else {
            $this->response(array("status" => "success",  "message" => $response['message'], "data" => $response['data']));
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