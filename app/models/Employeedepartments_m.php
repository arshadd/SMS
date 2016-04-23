<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employeedepartments_m extends CI_Model
{
    function all_employeedepartments($school_id)
    {
        $this->db->select("employee_department_id, code, name, CASE WHEN status = 1 THEN 'True' ELSE 'False' END as status");
        $this->db->from('employee_departments');
        $this->db->where('school_id', $school_id);
        $this->db->where('status', true);


        $departments = $this->db->get()->result();

        if (is_array($departments) && count($departments) > 0) {
            return $departments;
        }

        return false;
    }

    function find_employeedepartment($school_id, $employee_department_id)
    {
        $this->db->from('employee_departments');
        $this->db->where('employee_department_id', $employee_department_id);
        $this->db->where('school_id', $school_id);
        $this->db->where('status', true);

        $departmenets = $this->db->get()->result();

        if (is_array($departmenets) && count($departmenets) > 0) {
            return $departmenets;
        }

        return false;
    }

    function save($school_id, $employee_department_id, $employeedepartments)
    {

        if ($employee_department_id > 0) {

            //Update

            //Updated_at date
            //$updatedepartments = array_merge($employeedepartments, array('updated_at'=> date('Y-m-d H:i:s')));

            //update
            $this->db->where('employee_department_id', $employee_department_id);
            $result = $this->db->update('employee_departments', $employeedepartments);

            //$result = false;
        } else {
            //Insert

            //Created_at date
            //$adddepartment = array_merge($employeedepartments, array('created_at'=> date('Y-m-d H:i:s')));

            //Insert
            $result = $this->db->insert('employee_departments', $employeedepartments);

            //newly inserted id
            //$class_id = $this->db->insert_id();
        }

        if($result===TRUE){
            $message ="Department information saved";
        }else{
            $message ="Error for saving department information";
        }

        $response = array(
            'result' => $result,
            'message' => $message,
            'data' => array('employee_department_id' => $employee_department_id)
        );

        return $response;
    }

}