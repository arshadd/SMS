<?php defined('BASEPATH') OR exit('No direct script allowed');
    
require APPPATH.'/libraries/REST_Controller.php';

class Schools extends REST_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('schools_m');
        $this->load->helper('url');

        if( !$this->session->userdata('isLoggedIn') ) {
            redirect('/login/show_login');
        }
    }

   function find_school_get()
   {
       //Get logged school id
       $school_id = $this->session->userdata('school_id');

       $school = $this->schools_m->find_school($school_id);
       $this->response(array("status" => "success", "message" => "", "data" => $school));
   }


    function save_post()
    {
        //Get logged school id
        $school_id = $this->session->userdata('school_id');

        //Make array
        /*$school = array(
            'code' => $this->post('code'),
            'name' => $this->post('name'),
            'description' => $this->post('description'),
            'address' => $this->post('address'),
            'phone' => $this->post('phone'),
            'email' => $this->post('email'),
            'website' => $this->post('website'),
            'logo' => $this->post('logo')
        );*/

        //$_POST['description']= 'Updated value';
        //$school =    $_POST;

        //$file = $_FILES[0];

        $config['upload_path'] = './assets/resource/school/';
        $config['allowed_types'] = 'png|jpg|jpeg|gif|bmp';
        $config['max_size'] = '2048000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = FALSE;
        $config['remove_spaces'] = TRUE;

       // $photo = $_POST['Photo'];

        //if (!is_dir($config['upload_path'])) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
        //$this->response(array("status" => "success", "message" => '', "data" => empty($_FILES['Photo'])));

        if (empty($_FILES['Photo'])===FALSE) {
           // if(isset($_FILES['Photo'])) {
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('Photo')) {
                $error = array('error' => $this->upload->display_errors());
                //$this->load->view('upload_form', $error);

                $this->response(array("status" => "failed", "message" => $error['error'], "data" => null));

            } else {
                $data = $this->upload->data();

                //Build logo Path
                $logo = $config['upload_path'] . $data['file_name'];

                $_POST['logo'] = $logo;
            }
        }
       /* if (!$this->upload->do_upload('file')) {
            $data['error'] = $this->upload->display_errors();
        } else {
            $data = $this->upload->data();
            $logo = $config['upload_path'] . $data['file_name'];
            $data['error']=$logo;

            $_POST['logo'] =$logo;
        }*/


        //Save
        $response = $this->schools_m->save($school_id, $_POST);

        //$file = $this->post('file');

        //$this->response(array("status" => "success", "message" => "", "data" => $error['error']));

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