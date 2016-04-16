<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Batches_m extends CI_Model
{
    function all_batches($school_id)
    {
        $this->db->select('batches.*, classes.name as class_name');
        $this->db->from('batches');
        $this->db->join('classes', 'classes.class_id = batches.class_id');
        $this->db->where('batches.school_id', $school_id);
        $this->db->where('batches.is_active', true);
        $this->db->order_by('batches.created_at', 'desc');

        $batches = $this->db->get()->result();

        if (is_array($batches) && count($batches) > 0) {
            return $batches;
        }

        return false;
    }

    function all_class_batches($school_id, $class_id)
    {
        $this->db->select('batches.*, classes.name as class_name');
        $this->db->from('batches');
        $this->db->join('classes', 'classes.class_id = batches.class_id');
        $this->db->where('batches.school_id', $school_id);
        $this->db->where('batches.class_id', $class_id);

        $batches = $this->db->get()->result();

        if (is_array($batches) && count($batches) > 0) {
            return $batches;
        }

        return false;
    }

    function find_batch($school_id, $batch_id)
    {
        $this->db->select('batches.*, classes.name as class_name');
        $this->db->from('batches');
        $this->db->join('classes', 'classes.class_id = batches.class_id');
        $this->db->where('batches.school_id', $school_id);
        $this->db->where('batches.batch_id', $batch_id);
        
        $batch = $this->db->get()->result();

        if (is_array($batch) && count($batch) > 0) {
            return $batch;
        }

        return false;
    }

    function save($batch_id, $batch)
    {
        if ($batch_id > 0) {

            //Update

            //Updated_at date
            $batch = array_merge($batch, array('updated_at'=> date('Y-m-d H:i:s')));

            //update
            $this->db->where('batch_id', $batch_id);
            $result = $this->db->update('batches', $batch);

            //$result = false;
        } else {
            //Insert

            //Created_at date
            $batch = array_merge($batch, array('created_at'=> date('Y-m-d H:i:s')));

            //Insert
            $result = $this->db->insert('batches', $batch);

            //newly inserted id
            $batch_id = $this->db->insert_id();
        }

        if($result===TRUE){
            $message ="Batch information saved";
        }else{
            $message ="Error for saving batch information";
        }

        $response = array(
            'result' => $result,
            'message' => $message,
            'data' => array('batch_id' => $batch_id)
        );

        return $response;
    }

    function delete($batch_id)
    {
        if ($batch_id > 0) {

            //Delete

            //Is_active set to false
            $batch = array('is_active'=> false);

            //update
            $this->db->where('batch_id', $batch_id);
            $result = $this->db->update('batches', $batch);

            //return $result;
        }

        if($result===TRUE){
            $message ="Class deleted";
        }else{
            $message ="Error for deleting class information";
        }

        $response = array(
            'result' => $result,
            'message' => $message
        );

        return $response;
    }

}