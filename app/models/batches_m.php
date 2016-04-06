<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class batches_m extends CI_Model
{
    function all_batches($school_id)
    {
        $this->db->from('batches');
        $this->db->where('school_id', $school_id);
        $this->db->where('is_active', true);
        $this->db->order_by('created_at', 'desc');

        $batches = $this->db->get()->result();

        if (is_array($batches) && count($batches) > 0) {
            return $batches;
        }

        return false;
    }

    function all_class_batches($school_id, $class_id)
    {
        $this->db->from('batches');
        $this->db->where('school_id', $school_id);
        $this->db->where('class_id', $class_id);
        $this->db->where('is_active', true);
        $this->db->order_by('created_at', 'desc');

        $batches = $this->db->get()->result();

        if (is_array($batches) && count($batches) > 0) {
            return $batches;
        }

        return false;
    }

    function find_batch($school_id, $batch_id)
    {
        $this->db->from('batches');
        $this->db->where('batch_id', $batch_id);
        $this->db->where('is_active', true);

        $batch = $this->db->get()->result();

        if (is_array($batch) && count($batch) > 0) {
            return $batch;
        }

        return false;
    }

}