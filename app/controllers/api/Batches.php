<?php defined('BASEPATH') OR exit('No direct script allowed');
    
require APPPATH.'/libraries/REST_Controller.php';

class Batches extends REST_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('date');

        $this->load->model('batches_m');

        if( !$this->session->userdata('isLoggedIn') ) {
            redirect('/login/show_login');
        }
    }

    function all_batches_get()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        $batches = $this->batches_m->all_batches($school_id);
        $this->response(array("status" => "success", "message" => "", "data" => $batches));
    }

    function all_class_batches_get($class_id = null)
    {
        //Validation
        if (is_null($class_id)) {
            $this->response(array("status" => "false", "message" => "Invalid class id", "data" => null));
        } else {

            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $batches = $this->batches_m->all_class_batches($school_id, $class_id);
            $this->response(array("status" => "success", "message" => "", "data" => $batches));
        }
    }

    function find_batch_get($batch_id = null)
    {
        //Validation
        if (is_null($batch_id)) {
            $this->response(array("status" => "false", "message" => "Invalid batch id", "data" => null));
        } else {

            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $batch = $this->batches_m->find_batch($school_id, $batch_id);
            $this->response(array("status" => "success", "message" => "", "data" => $batch));
        }
    }

    function save_post()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        //Get primary key
        $batch_id = $this->post('batch_id');

/*
        $this->post('end_date')    */

        //Make array
        /*$batch = array(
            'name' => $this->post('name'),
            'start_date' => date('Y-m-d', strtotime($this->post('start_date'))),
            'end_date' => date('Y-m-d', strtotime($this->post('end_date'))),
            'class_id' => $this->post('class_id'),
            'school_id' => $school_id
        );*/

        $_POST['start_date'] =  date('Y-m-d', strtotime($_POST['start_date']));
        $_POST['end_date'] =  date('Y-m-d', strtotime($_POST['end_date']));

        //$this->response(array("status" => "success", "message" => "testing", "data" => $_POST));


        //Save
        $response = $this->batches_m->save($school_id, $batch_id, $_POST);

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
        $batch_id = $this->post('batch_id');

        //Delete
        $response = $this->batches_m->delete($batch_id);

        if ($response['result']=== FALSE) {
            $this->response(array("status" => "failed", "message" => $response['message'], "data" => null));
        } else {
            $this->response(array("status" => "success", "message" => $response['message'], "data" => $batch_id));
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