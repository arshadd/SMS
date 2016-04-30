<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees_m extends CI_Model {

    function all_employees($school_id)
    {
        $this->db->select('e.*, concat(e.first_name," ", e.middle_name, " ", e.last_name) as full_name, ed.name as department_name, CASE WHEN gender = 0 THEN \'Female\' ELSE \'Male\' END as gender_text ');
        $this->db->from('employees e');
        $this->db->join('employee_departments ed', 'ed.employee_department_id = e.employee_department_id');

        $this->db->where('e.school_id', $school_id);
        $this->db->where('e.is_active', true);
        $this->db->order_by('e.created_at', 'desc');

        $employees = $this->db->get()->result();

        if (is_array($employees) && count($employees) > 0) {
            return $employees;
        }

        return false;
    }

    function find_employee($school_id, $employee_id)
    {
        $this->db->from('employees');
        $this->db->where('employee_id', $employee_id);
        $this->db->where('school_id', $school_id);
        $this->db->where('is_active', true);

        $employee = $this->db->get()->result();

        if (is_array($employee) && count($employee) > 0) {
            return $employee;
        }

        return false;
    }

    function new_employee($school_id)
    {
        $this->db->select('CONCAT("E", IFNULL(max(employee_id) ,0)+1) as new_employee_id');
        $this->db->from('employees');
        $this->db->where('school_id', $school_id);

        $employee = $this->db->get()->result();

        if (is_array($employee) && count($employee) > 0) {
            return $employee;
        }

        return false;
    }

    function save($school_id, $employee_id, $employee)
    {

        $user = array(
            "first_name" =>$employee['first_name'],
            "last_name" =>$employee['last_name'],
            "email" =>"",
            "employee" =>"1",
            "school_id" =>$school_id);

        //-------Begin Transaction----------//
        $this->db->trans_begin();

        //Logic
        if ($employee_id > 0) {

            //-----------Update Employee's Info---------------//
            //Updated_at date
            $employee = array_merge($employee, array('updated_at' => date('Y-m-d H:i:s')));
            //Remove unnecessary elements
            unset($employee['code']);
            unset($employee['employee_id']);
            unset($employee['user_id']);
            //update
            $this->db->where('employee_id', $employee_id);
            $result = $this->db->update('employees', $employee);
            //-----------End Update Employee's Info---------------//

            //$result = false;
        } else {
            //Insert
                if(array_key_exists('photo', $employee)===false)
                {
//                    $employee['photo']=EMPLOYEE_DEFAULT_IMAGE;
                    $employee = array_merge($employee, array('photo' => EMPLOYEE_DEFAULT_IMAGE));
                    //var_dump($employee);
                }

            //-----------Insert User's Info---------------//
            $user = array_merge($user, array('username' => $employee['code']));
            $user = array_merge($user, array('password_hash' => $employee['date_of_birth']));
            $user = array_merge($user, array('created_at' => date('Y-m-d H:i:s')));

            $result = $this->db->insert('users', $user);

            //newly inserted id
            $user_id = $this->db->insert_id();
            //-----------End Insert User's Info---------------//

            //-----------Insert Employee's Info---------------//
            //Created_at date
            $employee = array_merge($employee, array('created_at' => date('Y-m-d H:i:s')));
            //School Id
            $employee = array_merge($employee, array('school_id' => $school_id));
            //Add user id
            $employee['user_id'] = $user_id;

            $result = $this->db->insert('employees', $employee);

            //newly inserted id
            $employee_id = $this->db->insert_id();

            $employee = array_merge($employee, array('employee_id' => $employee_id));
            //-----------End Insert Employee's Info---------------//
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $result = FALSE;
        }
        else
        {
            $this->db->trans_commit();
            $result = TRUE;
        }
        //-------End Transaction----------//

        if ($result === TRUE) {
            $result = "success";
            $message = "Employee information saved";
        } else {
            $result = "failed";
            $message = $this->db->_error_message();//"Error for saving employee information";
        }

        $response = array(
            'result' => $result,
            'message' => $message,
            'data' => $employee
        );

        return $response;

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