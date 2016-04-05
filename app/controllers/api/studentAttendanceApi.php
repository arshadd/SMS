<?php defined('BASEPATH') OR exit('No direct script allowed');
    
require APPPATH.'/libraries/REST_Controller.php';

class studentAttendanceApi extends REST_Controller {
 
   
    function listAll_get()
    {
        
        // respond with information about a user
        $this->load->model('studentattendance_m');
        $studentAttendances = $this->studentattendance_m->get_listAll();
        $this->response(array('status'=>'success','message'=>"",'data'=> $studentAttendances));
    }
    
}
