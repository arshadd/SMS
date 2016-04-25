<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


 class studentattendance_m extends MY_Model {

    protected $_table = 'studentattendances';
    protected $primary_key = 'StudentAttendanceId';
    protected $return_type = 'array';
    
    public function get_listAll( $num_posts = 10 ) {

    $this->db->select('sa.StudentAttendanceId, CONCAT((s.firstname)," ", (s.lastname)) AS StudentName, sc.StudentClassId, cls.ClassName, sa.AttendanceStatus, sa.WorkDay, s.StudentId, cls.ClassesId');
            $this->db->from('studentattendances sa'); 
            $this->db->join('studentclasses sc', 'sc.studentclassid=sa.studentclassid');
            $this->db->join('students s', 's.studentid=sc.studentid');
            $this->db->join('classes cls', 'cls.classesid=sc.classesid');
            $this->db->order_by('sa.workday','asc');         
            $query = $this->db->get(); 

    $studentattendance = $query->result_array();

    if( is_array($studentattendance) && count($studentattendance) > 0 ) {
      return $studentattendance;
    }

    return false;
  }
  
}
