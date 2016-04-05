<?php

class school extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
	
	$this->load->library('session');

    $this->load->model('school_m');
	$this->load->helper('form');
    $this->load->helper('url');

    $this->load->library('curl');



    if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
  }

  /**
   * This is the controller method that drives the application.
   * After a user logs in, show_main() is called and the main
   * application screen is set up.
   */
  
  function edit() {

    /*$response = json_decode($this->curl->simple_get('http://localhost/myschool/index.php/api/school/item'));
    $school = $response->data;
    if ($school) {
      $data['school'] = $school[0];
    }*/

    //echo $user->data[0]->Name;
    //die();

    //echo $response->status;
    //die();

    //$school = $response->data;



	//print_r($school[0]->Name);
	//die();

    // If employee were fetched from the database, assign them to $data
    // so they can be passed into the view.

    // Load all of the logged-in user's posts
    //$data['school']

    //Get logged school id
    $school_id = $this->session->userdata('school_id');

    $result = $this->school_m->get_school_info($school_id);
    $data['school'] =$result[0];

    //echo $res[0]->Name;
    //die();

    $this->load->view('school/edit', $data);
  }

  function save()
  {
    $id = $this->input->post('school_id');
    $photo = $this->input->post('Photo');


    //Do upload
    $config['upload_path'] = './assets/resource/school/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '2048000';
    $config['max_width'] = '1024';
    $config['max_height'] = '768';
    $config['overwrite'] = TRUE;
    $config['encrypt_name'] = FALSE;
    $config['remove_spaces'] = TRUE;

    if (!is_dir($config['upload_path'])) die("THE UPLOAD DIRECTORY DOES NOT EXIST");

    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('Photo')) {
      $data['error'] = $this->upload->display_errors();
    } else {
      $data = $this->upload->data();
      $photo = $config['upload_path'] . $data['file_name'];
    }

    $school = array(
        'Name' => $this->input->post('Name'),
        'Description' => $this->input->post('Description'),
        'Address' => $this->input->post('Address'),
        'Phone' => $this->input->post('Address'),
        'Email' => $this->input->post('Email'),
        'Website' => $this->input->post('Website'),
        'Logo' => $photo
    );

    if ($id > 0) {
      //Update
      $result = $this->school_m->update($id, $school);

    } else {
      //Insert
      $result = $this->school_m->insert(array('school_id' => $id, $school));
    }

    if ($result === FALSE) {
      $data['error'] = "Unable to save";
    } else {
      $data['success'] = "School information saved successfully.";
    }

    //Get logged school id
    $school_id = $this->session->userdata('school_id');

    $result = $this->school_m->get_school_info($school_id);

    $data['school'] =$result[0];
    $this->load->view('school/edit', $data);

    /*$result = $this->school_m->get_school_info();
    $data['school'] =$result[0];
    $this->load->view('school/edit', $data);*/
  }
  /*function save() {
    //echo $_POST;
    //die();

    $school = array(
        'SchoolId' => $this->input->post('SchoolId'),
        'Name' => $this->input->post('Name'),
        'Description' => $this->input->post('Description'),
        'Address' => $this->input->post('Address'),
        'Phone' => $this->input->post('Address'),
        'Email' => $this->input->post('Email'),
        'Website' => $this->input->post('Website'),
        'Logo' => $this->input->post('Logo'),
        'Photo' => $this->input->post('Photo')
    );
    //$form_data = $this->input->post();



    $response = json_decode($this->curl->simple_post('http://localhost/myschool/index.php/api/school/save', $school));
    //echo $response->message;
    //die();

    if ($response->status=="failed")
    {
      $data['error'] = $response->message;
    }
    else
    {
      $data['success'] = $response.message;//'School Information Saved successfully.';
    }

    $response = json_decode($this->curl->simple_get('http://localhost/myschool/index.php/api/school/item'));
    $school = $response->data;
    if ($school) {
      $data['school'] = $school[0];
    }
    $this->load->view('school/edit', $data);


    //echo $data['error'];
    //echo $data['success'];
    //die();
/ *
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
    }
    else
    {
        array('upload_data' => $this->upload->data());
		$data['success'] = 'School Information Saved successfully.';
		
    }
* /

	//redirect ('school/edit');

  }*/

}
