<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees_subjects_m extends CI_Model
{
    function all_employees_subjects($school_id, $employee_id)
    {
        $this->db->from('employees_subjects');
        $this->db->where('school_id', $school_id);

        $subjects = $this->db->get()->result();

        if (is_array($subjects) && count($subjects) > 0) {
            return $subjects;
        }

        return false;
    }

    function all_batch_employees_subjects($school_id, $batch_id)
    {
        $this->db->select('es.*, s.name as subject_name, concat(e.first_name," ", e.middle_name," ",e.last_name) as employee_name');
        $this->db->from('employees_subjects es');
        $this->db->join('subjects s', 's.subject_id = es.subject_id');
        $this->db->join('employees e', 'e.employee_id = es.employee_id');

        $this->db->where('es.school_id', $school_id);
        $this->db->where('s.batch_id', $batch_id);

        $subjects = $this->db->get()->result();

        if (is_array($subjects) && count($subjects) > 0) {
            return $subjects;
        }

        return false;
    }

    function find_employee_subject($school_id, $employee_subject_id)
    {
        $this->db->from('employees_subjects');
        $this->db->where('employees_subjects_id', $employee_subject_id);

        $employee_subject = $this->db->get()->result();

        if (is_array($employee_subject) && count($employee_subject) > 0) {
            return $employee_subject;
        }

        return false;
    }

    function save($school_id, $employees_subjects_id, $employees_subjects)
    {
        if ($employees_subjects_id > 0) {

            //Update

            //update
            $this->db->where('employees_subjects_id', $employees_subjects_id);
            $result = $this->db->update('employees_subjects', $employees_subjects);

            //$result = false;
        } else {
            //Insert
            $employees_subjects = array_merge($employees_subjects, array('school_id'=> $school_id));

            //Insert
            $result = $this->db->insert('employees_subjects', $employees_subjects);

            //newly inserted id
            $employees_subjects_id = $this->db->insert_id();

            $employees_subjects = array_merge($employees_subjects, array('employees_subjects_id' => $employees_subjects_id));
        }

        if($result===TRUE){
            $message ="Subject information saved";
        }else{
            $message ="Error for saving subject information";
        }

        $response = array(
            'result' => $result,
            'message' => $message,
            'data' => $employees_subjects
        );

        return $response;
    }

    function delete($employees_subjects_id)
    {
        if ($employees_subjects_id > 0) {

            //Delete

            //Is_active set to false
            $subject = array('is_active'=> false);

            //update
            $this->db->where('employees_subjects_id', $employees_subjects_id);
            $result = $this->db->update('subjects', $subject);

            //return $result;
        }

        if($result===TRUE){
            $message ="Subject deleted";
        }else{
            $message ="Error for deleting subject information";
        }

        $response = array(
            'result' => $result,
            'message' => $message
        );

        return $response;
    }

}