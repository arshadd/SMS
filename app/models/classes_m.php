<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class classes_m extends CI_Model
{
    /*$query = $this->db->query("SELECT c.class_id, c.name, c.code, c.section_name, GROUP_CONCAT(b.name) AS batch_names
                FROM CLASSES C
                INNER JOIN BATCHES B ON B.CLASS_ID = C.CLASS_ID
                GROUP BY c.class_id
                ORDER BY c.created_at desc;");
    $classes = $query->result();*/

    function all_classes($school_id)
    {
        $this->db->from('classes');
        $this->db->where('school_id', $school_id);
        $this->db->order_by('created_at', 'desc');

        $classes = $this->db->get()->result();

        if (is_array($classes) && count($classes) > 0) {
            return $classes;
        }

        return false;
    }

    function find_class($school_id, $class_id)
    {
        $this->db->from('classes');
        $this->db->where('class_id', $class_id);

        $class = $this->db->get()->result();

        if (is_array($class) && count($class) > 0) {
            return $class;
        }

        return false;
    }

}