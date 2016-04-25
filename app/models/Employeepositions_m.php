<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employeepositions_m extends CI_Model
{
    function all_employeepositions($school_id)
    {
        $this->db->from('employee_positions');
        $this->db->where('school_id', $school_id);
        $this->db->where('status', true);

        $positions = $this->db->get()->result();

        if (is_array($positions) && count($positions) > 0) {
            return $positions;
        }

        return false;
    }


}