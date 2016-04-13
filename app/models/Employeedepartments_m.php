<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employeedepartments_m extends CI_Model
{
    function all_employeedepartments($school_id)
    {
        $this->db->from('employee_departments');
        $this->db->where('school_id', $school_id);
        $this->db->where('status', true);


        $departments = $this->db->get()->result();

        if (is_array($departments) && count($departments) > 0) {
            return $departments;
        }

        return false;
    }

}