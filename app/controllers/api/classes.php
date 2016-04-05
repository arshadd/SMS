<?php defined('BASEPATH') OR exit('No direct script allowed');
    
require APPPATH.'/libraries/REST_Controller.php';

class classes extends REST_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('classes_m');

        if( !$this->session->userdata('isLoggedIn') ) {
            redirect('/login/show_login');
        }
    }

    function all_classes_get()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        $classes = $this->classes_m->all_classes($school_id);
        $this->response(array("status" => "success", "message" => "", "data" => $classes));
    }

    function find_class_get($class_id)
    {
        //Validation
        if (is_null($class_id)) {
            $this->response(array("status" => "false", "message" => "Invalid class id", "data" => null));
        } else {
            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $class = $this->classes_m->find_class($school_id, $class_id);
            $this->response(array("status" => "success", "message" => "", "data" => $class));
        }
    }
    
    function save_post()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        //Get primary key
        $class_id = $this->post('class_id');

        //Make array
        $class = array(
            'code' => $this->post('code'),
            'name' => $this->post('name'),
            'section_name' => $this->post('section_name'),
            'school_id' => $school_id
        );
        //$this->response(array("status" => "success", "message" => "Class information saved successfully", "data" => $class));

        //return $class;


        //Save
        $result = $this->classes_m->save($school_id, $class_id, $class);

        if ($result === FALSE) {
            $this->response(array("status" => "failed", "message" => "Failed to save.", "data" => $result));
        } else {
            $this->response(array("status" => "success", "message" => "Class information saved successfully", "data" => $result));
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