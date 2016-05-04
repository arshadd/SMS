<?php defined('BASEPATH') OR exit('No direct script allowed');
    
require APPPATH.'/libraries/REST_Controller.php';

class Timetable extends REST_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('date');

        if( !$this->session->userdata('isLoggedIn') ) {
            redirect('/login/show_login');
        }
    }

    function batch_timetable_get($batch_id)
    {
        //Get logged school id
        if (is_null($batch_id)) {
            $this->response(array("status" => "false", "message" => "Invalid class id", "data" => null));
        } else {

          $colors =  array(
                'blue'=> '#4b8df8',
                'red'=> '#e02222',
                'green'=> '#35aa47',
                'purple'=> '#852b99',
                'grey'=> '#555555',
                'light-grey'=> '#fafafa',
                'yellow'=> '#ffb848');

            //Get logged school id
            $school_id = $this->session->userdata('school_id');

            $date = new DateTime(date("Y-m-d"));

            for ($x = 1; $x <=5; $x++) {
                $fromDate = new DateTime(date("Y-m-d"));;
                $fromDate->setTime(9+$x, 0, 0);

                $toDate = new DateTime(date("Y-m-d"));;
                $toDate->setTime(10+$x, 0, 0);

                $event_array[] = array(
                    'id' => $batch_id,
                    'title' => 'Math Class - Ali Murad Khan',
                    'start' => $fromDate->format('Y-m-d H:i'),
                    'end' => $toDate->format('Y-m-d H:i'),
                    //'backgroundColor'=>$colors['blue'],
                    'allDay' => false
                );
            }


            $this->response($event_array);
        }
    }


    
}