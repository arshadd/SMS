<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class employees_m extends CI_Model {

    function all_employees($school_id)
    {
        $this->db->from('employees');
        $this->db->where('school_id', $school_id);
        $this->db->where('is_active', true);
        $this->db->order_by('created_at', 'desc');

        $employees = $this->db->get()->result();

        if (is_array($employees) && count($employees) > 0) {
            return $employees;
        }

        return false;
    }

    function find_employees($school_id, $employee_id)
    {
        $this->db->from('employees');
        $this->db->where('employee_id', $employee_id);
        $this->db->where('is_active', true);

        $employee = $this->db->get()->result();

        if (is_array($employee) && count($employee) > 0) {
            return $employee;
        }

        return false;
    }

    function save($school_id, $employee_id, $employees)
    {
        if ($employee_id > 0) {

            //Update

            //Updated_at date
            $employees = array_merge($employees, array('updated_at'=> date('Y-m-d H:i:s')));

            //update
            $this->db->where('employee_id', $employee_id);
            $result = $this->db->update('employees', $employees);

            //$result = false;
        } else {
            //Insert

            //Created_at date
            $employees = array_merge($employees, array('created_at'=> date('Y-m-d H:i:s')));
            $employees = array_merge($employees, array('updated_at'=> date('Y-m-d H:i:s')));
            //Insert
            $result = $this->db->insert('employees', $employees);

            //newly inserted id
            $employee_id = $this->db->insert_id();
        }

        //build object
        $employees = array_merge($employees, array('employee_id'=> $employee_id));

        $return = array(
            'result' => $result,
            'data' => $employees
        );

        return $return;
    }

    function delete($school_id, $employee_id)
    {
        if ($employee_id > 0) {

            //Delete

            //Is_active set to false
            $employee = array('is_active'=> false);

            //update
            $this->db->where('employee_id', $employee_id);
            $result = $this->db->update('employees', $employee);

            return $result;
        }
        return false;
    }
    

}