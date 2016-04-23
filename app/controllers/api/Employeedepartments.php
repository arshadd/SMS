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

    function find_department_get($employee_department_id = null)
    {
        //Validation
        if (is_null($employee_department_id)) {
            $this->response(array("status" => "false", "message" => "Invalid employee id", "data" => null));
        } else {
            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $departments = $this->employeedepartments_m->find_employeedepartment($school_id, $employee_department_id);
            $this->response(array("status" => "success", "message" => "", "data" => $departments));
        }
    }

        function save_post()
    {

        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        //Get primary key
        $employee_department_id = $this->post('employee_department_id');

        //Make array
        $employeedepartments = array(
            'code' => $this->post('code'),
            'name' => $this->post('name'),
            'status' => $this->post('status'),
            'school_id' => $school_id
        );

        //Save
        $response = $this->employeedepartments_m->save($school_id, $employee_department_id, $employeedepartments);

        if ($response['result'] === FALSE) {
            $this->response(array("status" => "failed", "message" => $response['message'], "data" => null));
        } else {
            $this->response(array("status" => "success",  "message" => $response['message'], "data" => $response['data']));
        }
    }

//    function save_post()
//    {
//        $this->load->library('curl');
//        // Configuration variables
//        $type = "xml";
//        $id = "92test5";
//        $pass = "lahore22";
//        $lang = "English";
//        $mask = "Outreach";
//        // Data for text message
//        $to = "923122213163";
//        //$to = "923165445181";
//        //$to = "923315550040";
//        $message = "Test send mask MAMOOOOOOO with an ampersand (&) and a 5 note";
//        $message = urlencode($message);
//// Prepare data for POST request
//        $data = "id=".$id."&pass=".$pass."&msg=".$message."&to=".$to."&lang=".$lang."&mask=".$mask."&type=".$type;
//// Send the POST request with cURL
//       /* $ch = $this->curl_init('http://www.sms4connect.com/api/sendsms.php/sendsms/url');
//        $this->curl_setopt($ch, CURLOPT_POST, true);
//        $this->curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//        $this->curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $result = $this->curl_exec($ch); //This is the result from SMS4CONNECT
//        $this->curl_close($ch);
//        $this->response(array("status" => "success", "message" => "", "data" => $type));*/
//        //  Setting URL To Fetch Data From
//        $this->curl->create('http://www.sms4connect.com/api/sendsms.php/sendsms/url');
//
//
////  To Receive Data Returned From Server
//        $this->curl->option('returntransfer', 1);
//
////  To follow The URL Provided For Website
//        $this->curl->option('followlocation', 1);
//        $this->curl->post($data);
//
////  To Set Time For Process Timeout
//        $this->curl->option('connecttimeout', 600);
//
////  To Execute 'option' Array Into cURL Library & Store Returned Data Into $data
//        $result = $this->curl->execute();
//
//
//        $this->response(array("status" => "success", "message" => "", "data" => $result));
//    }

}