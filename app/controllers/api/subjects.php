<?php defined('BASEPATH') OR exit('No direct script allowed');
    
require APPPATH.'/libraries/REST_Controller.php';

class subjects extends REST_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('subjects_m');

        if( !$this->session->userdata('isLoggedIn') ) {
            redirect('/login/show_login');
        }
    }

    function all_subjects_get()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        $subjects = $this->subjects_m->all_subjects($school_id);
        $this->response(array("status" => "success", "message" => "", "data" => $subjects));
    }

    function all_batch_subjects_get($subject_id = null)
    {
        //Validation
        if (is_null($subject_id)) {
            $this->response(array("status" => "false", "message" => "Invalid batch id", "data" => null));
        } else {

            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $subjects = $this->subjects_m->all_batch_subjects($school_id, $subject_id);
            $this->response(array("status" => "success", "message" => "", "data" => $subjects));
        }
    }

    function find_subject_get($subject_id = null)
    {
        //Validation
        if (is_null($subject_id)) {
            $this->response(array("status" => "false", "message" => "Invalid subject id", "data" => null));
        } else {

            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $subject = $this->subjects_m->find_subject($school_id, $subject_id);
            $this->response(array("status" => "success", "message" => "", "data" => $subject));
        }
    }

    function save_post()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        //Get primary key
        $subject_id = $this->post('subject_id');

/*
        $this->post('end_date')    */

        //Make array
        $subject = array(
            'code' => $this->post('code'),
            'name' => $this->post('name'),
            'max_weekly_classes' => $this->post('max_weekly_classes'),
            'credit_hours' => $this->post('credit_hours'),
            'batch_id' => $this->post('batch_id'),
            'school_id' => $school_id
        );

        //Save
        $response = $this->subjects_m->save($subject_id, $subject);

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
        $subject_id = $this->post('subject_id');

        //Delete
        $response = $this->subjects_m->delete($subject_id);

        if ($response['result']=== FALSE) {
            $this->response(array("status" => "failed", "message" => $response['message'], "data" => null));
        } else {
            $this->response(array("status" => "success", "message" => $response['message'], "data" => $subject_id));
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