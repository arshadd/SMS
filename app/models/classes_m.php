<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class classes_m extends CI_Model
{
    function all_classes($num_posts = 10)
    {
        $query = $this->db->query("SELECT c.class_id, c.name, c.code, c.section_name, GROUP_CONCAT(b.name) AS batch_names
                                    FROM CLASSES C
                                    INNER JOIN BATCHES B ON B.CLASS_ID = C.CLASS_ID
                                    GROUP BY c.class_id
                                    ORDER BY c.created_at desc;");

        //$this->db->from('classes');
        //$this->db->limit($num_posts);
        //$this->db->order_by('created_at', 'desc');

        $classes = $query->result();

        if (is_array($classes) && count($classes) > 0) {
            return $classes;
        }

        return false;
    }

    function class_info($id)
    {
        $this->db->from('classes');
        $this->db->where('class_id', $id);

        $class = $this->db->get()->result();

        if (is_array($class) && count($class) > 0) {
            return $class;
        }

        return false;
    }

}