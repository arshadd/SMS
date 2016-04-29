<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employeedepartments_m extends CI_Model
{
    function all_employeedepartments($school_id)
    {
        $this->db->select("employee_department_id, code, name, CASE WHEN status = 1 THEN 'True' ELSE 'False' END as status");
        $this->db->from('employee_departments');
        $this->db->where('school_id', $school_id);
        $this->db->where('status', true);
        $this->db->where('is_deleted',false);

        $departments = $this->db->get()->result();

        if (is_array($departments) && count($departments) > 0) {
            return $departments;
        }

        return false;
    }

    function all_employeedepartmentall($school_id)
    {
        $this->db->select("employee_department_id, code, name, CASE WHEN status = 1 THEN 'True' ELSE 'False' END as status");
        $this->db->from('employee_departments');
        $this->db->where('school_id', $school_id);
        $this->db->where('is_deleted',false);
//        $this->db->where('status', true);


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


    function delete_check($employee_department_id)
    {
        $response = array('result' => TRUE, 'message'=>'');

        //------------------ for check employees ----------------------//
        $this->db->from('employees');
        $this->db->where('employee_department_id', $employee_department_id);
        $this->db->where('is_deleted', false);

        $result = $this->db->get()->result();

        if (is_array($result) && count($result) > 0) {
            $response['result'] = FALSE;
            $response['message'] = "Unable to delete department. Please remove associated employees.";
        }
        //----------------------------------------------------------//

        return $response;
    }
    function delete($school_id, $employee_department_id)
    {
        if ($employee_department_id > 0) {

            $response = $this->delete_check($employee_department_id);

            if($response['result']===FALSE){
                $result = FALSE;
                $message = $response['message'];
            }else {

                //Delete
                //Is_delete set to false
                $employeedpeartment = array('is_deleted' => true);

                //update
                $this->db->where('employee_department_id', $employee_department_id);
                $this->db->where('school_id', $school_id);
                $result = $this->db->update('employee_departments', $employeedpeartment);

                if($result===TRUE){
                    $message ="Department deleted";
                }else{
                    $message ="Error for deleting department information";
                }
            }
            //return $result;
        }

        $response = array(
            'result' => $result,
            'message' => $message,
            'data' => array('employee_department_id' => $employee_department_id)
        );

        return $response;
    }

}