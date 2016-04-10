<?php

class Students_m extends CI_Model
{
    function all_students($school_id)
    {
        $this->db->select('students.*, batches.name as batch_name, classes.name as class_name');
        $this->db->from('students');
        $this->db->join('batches', 'batches.batch_id = students.student_id');
        $this->db->join('classes', 'classes.class_id = batches.class_id');

        $this->db->where('students.school_id', $school_id);
        $this->db->where('students.is_active', true);
        $this->db->order_by('students.created_at', 'desc');

        $students = $this->db->get()->result();

        if (is_array($students) && count($students) > 0) {
            return $students;
        }

        return false;
    }

    function all_batch_students($school_id, $batch_id)
    {
        $this->db->from('students');
        $this->db->where('school_id', $school_id);
        $this->db->where('batch_id', $batch_id);
        $this->db->where('is_active', true);
        $this->db->order_by('created_at', 'desc');

        $students = $this->db->get()->result();

        if (is_array($students) && count($students) > 0) {
            return $students;
        }

        return false;
    }

    function find_student($student_id)
    {
        $this->db->from('students');
        $this->db->where('student_id', $student_id);
        $this->db->where('is_active', true);

        $student = $this->db->get()->result();

        if (is_array($student) && count($student) > 0) {
            return $student;
        }

        return false;
    }

    function save($school_id, $student_id, $student)
    {
        if ($student_id > 0) {

            //Update

            //Updated_at date
            $student = array_merge($student, array('updated_at'=> date('Y-m-d H:i:s')));

            //update
            $this->db->where('student_id', $student_id);
            $result = $this->db->update('students', $student);

            //$result = false;
        } else {
            //Insert

            //Created_at date
            $student = array_merge($student, array('created_at'=> date('Y-m-d H:i:s')));

            //Insert
            $result = $this->db->insert('students', $student);

            //newly inserted id
            $student_id = $this->db->insert_id();
        }

        if($result===TRUE){
            $message ="Student information saved";
        }else{
            $message ="Error for saving student information";
        }

        $response = array(
            'result' => $result,
            'message' => $message,
            'data' => $student
        );

        return $response;
    }

    function delete($student_id, $class_id)
    {
        if ($class_id > 0) {

            //Delete

            //Is_active set to false
            $student = array('is_active'=> false);

            //update
            $this->db->where('student_id', $class_id);
            $result = $this->db->update('students', $student);

            //return $result;
        }

        if($result===TRUE){
            $message ="Student deleted";
        }else{
            $message ="Error for deleting student information";
        }

        $response = array(
            'result' => $result,
            'message' => $message,
            'data' => $student
        );

        return $response;
    }

}