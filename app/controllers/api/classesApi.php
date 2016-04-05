<?php defined('BASEPATH') OR exit('No direct script allowed');
    
require APPPATH.'/libraries/REST_Controller.php';

class classesApi extends REST_Controller {
 
   
    function listAll_get()
    {
        
        // respond with information about a user
        $this->load->model('classes_m');
        $classes = $this->classes_m->get_All();
        $this->response(array('status'=>'success','message'=>"",'data'=> $classes));
    }
    
}