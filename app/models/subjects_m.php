<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subjects_m extends CI_Model
{
    function all_subjects($school_id)
    {
        $this->db->from('subjects');
        $this->db->where('school_id', $school_id);
        $this->db->where('is_active', true);
        $this->db->order_by('created_at', 'desc');

        $subjects = $this->db->get()->result();

        if (is_array($subjects) && count($subjects) > 0) {
            return $subjects;
        }

        return false;
    }

    function all_batch_subjects($school_id, $subject_id)
    {
        $this->db->from('subjects');
        $this->db->where('school_id', $school_id);
        $this->db->where('batch_id', $subject_id);
        $this->db->where('is_active', true);
        $this->db->order_by('created_at', 'desc');

        $subjects = $this->db->get()->result();

        if (is_array($subjects) && count($subjects) > 0) {
            return $subjects;
        }

        return false;
    }

    function find_subject($school_id, $subject_id)
    {
        $this->db->from('subjects');
        $this->db->where('subject_id', $subject_id);
        $this->db->where('is_active', true);

        $subject = $this->db->get()->result();

        if (is_array($subject) && count($subject) > 0) {
            return $subject;
        }

        return false;
    }

    function save($subject_id, $subject)
    {
        if ($subject_id > 0) {

            //Update

            //Updated_at date
            $subject = array_merge($subject, array('updated_at'=> date('Y-m-d H:i:s')));

            //update
            $this->db->where('subject_id', $subject_id);
            $result = $this->db->update('subjects', $subject);

            //$result = false;
        } else {
            //Insert

            //Created_at date
            $subject = array_merge($subject, array('created_at'=> date('Y-m-d H:i:s')));

            //Insert
            $result = $this->db->insert('subjects', $subject);

            //newly inserted id
            $subject_id = $this->db->insert_id();
        }

        if($result===TRUE){
            $message ="Subject information saved";
        }else{
            $message ="Error for saving subject information";
        }

        $response = array(
            'result' => $result,
            'message' => $message,
            'data' => array('subject_id' => $subject_id)
        );

        return $response;
    }

    function delete($subject_id)
    {
        if ($subject_id > 0) {

            //Delete

            //Is_active set to false
            $subject = array('is_active'=> false);

            //update
            $this->db->where('subject_id', $subject_id);
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