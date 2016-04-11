<?php defined('BASEPATH') OR exit('No direct script allowed');
    
require APPPATH.'/libraries/REST_Controller.php';

class Students extends REST_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('students_m');
        $this->load->helper('url');
        $this->load->helper('date');


        if( !$this->session->userdata('isLoggedIn') ) {
            redirect('/login/show_login');
        }
    }

    function all_students_get()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        $students = $this->students_m->all_students($school_id);
        $this->response(array("status" => "success", "message" => "", "data" => $students));
    }

    function all_batch_students_get($batch_id = null)
    {
        if (is_null($batch_id)) {
            $this->response(array("status" => "false", "message" => "Invalid batch id", "data" => null));
        } else {
            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $students = $this->students_m->all_batch_students($school_id, $batch_id);
            $this->response(array("status" => "success", "message" => "", "data" => $students));
        }
    }

   function find_student_get($student_id = null)
   {
       if (is_null($student_id)) {
           $this->response(array("status" => "false", "message" => "Invalid student id", "data" => null));
       } else {
           //Get logged school id
           $school_id = $this->session->userdata('school_id');

           $student = $this->students_m->find_student($student_id);
           $this->response(array("status" => "success", "message" => "", "data" => $student));
       }
   }

    function new_student_get()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        $student = $this->students_m->new_student($school_id);
        $this->response(array("status" => "success", "message" => "", "data" => $student));
    }

    function save_post()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        //Get primary key
        $student_id = $this->post('student_id');

        $_POST['photo'] = STUDENT_DEFAULT_IMAGE;
        //-------------File uploading---------------//
        //if (!is_dir($config['upload_path'])) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
        if (empty($_FILES['StudentPhoto'])===FALSE) {

            $config['upload_path'] = './assets/resource/student/';
            $config['allowed_types'] = 'png|jpg|jpeg|gif|bmp';
            $config['max_size'] = '2048000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $config['overwrite'] = TRUE;
            $config['encrypt_name'] = FALSE;
            $config['remove_spaces'] = TRUE;

            // if(isset($_FILES['Photo'])) {
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('StudentPhoto')) {
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
        $_POST['admission_date'] = date('Y-m-d', strtotime($this->post('admission_date')));
        $_POST['date_of_birth'] = date('Y-m-d', strtotime($this->post('date_of_birth')));

        //Remove unnecessary elements
        unset($_POST['class_id']);

        //Save
        $response = $this->students_m->save($school_id, $student_id, $_POST);

        if ($response['result'] === FALSE) {
            $this->response(array("status" => "failed", "message" => $response['message'], "data" => null));
        } else {
            $this->response(array("status" => "success",  "message" => $response['message'], "data" => $response['data']));
        }
    }
    
    /*function save_post()
    {


        //$data = array('returned: '. $this->put('id'));
        //$this->response($data);
        $this->load->model('school_m');

        $id = $this->post('SchoolId');
        $photo = $this->post('Photo');

       / * echo 'Id:'.$id;
        die();* /

        //echo $school['Logo'];
        //die();


        //Do upload
        $config['upload_path'] = './assets/resource/school/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = FALSE;
        $config['remove_spaces'] = TRUE;

        if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('Photo'))
        {
            $data['error'] = $this->upload->display_errors();

            $this->response(array("status"=>"failed","message"=>$data['error'],"data"=> null));

        }
        else
        {
            $data = $this->upload->data();
            //$file_array = $this->upload->data('Photo');
            $photo = $config['upload_path']. $data['file_name'];


//            echo 'name is:'.$photo;

            //$data['success'] = 'School Information Saved successfully.';
        }

        $school = array(
            'Name' => $this->post('Name'),
            'Description' => $this->post('Description'),
            'Address' => $this->post('Address'),
            'Phone' => $this->post('Address'),
            'Email' => $this->post('Email'),
            'Website' => $this->post('Website'),
            'Logo' => $photo
        );

        if($id >0){
            //Update
            $result = $this->school_m->update($id, $school);

        }else {
            //Insert
            $result = $this->school_m->insert(array('SchoolId' => $id,$school));
        }

        if($result === FALSE)
        {
            $this->response(array("status"=>"failed","message"=>"Unable to save.","data"=> $result));
        }
        else
        {
            $this->response(array("status"=>"success","message"=>"School Information Saved successfully","data"=> $result));
        }


        // respond with information about a user
        //$this->load->model('school_m');
        //$school = $this->school_m->get_school_info();
        //$this->response(array("status"=>'success',"message"=>"","data"=> $school));
    }*/
    
}