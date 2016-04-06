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
        $this->db->where('is_active', true);
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
        $this->db->where('is_active', true);

        $class = $this->db->get()->result();

        if (is_array($class) && count($class) > 0) {
            return $class;
        }

        return false;
    }

    function save($school_id, $class_id, $class)
    {
        if ($class_id > 0) {

            //Update

            //Updated_at date
            $class = array_merge($class, array('updated_at'=> date('Y-m-d H:i:s')));

            //update
            $this->db->where('class_id', $class_id);
            $result = $this->db->update('classes', $class);
        } else {
            //Insert

            //Created_at date
            $class = array_merge($class, array('created_at'=> date('Y-m-d H:i:s')));

            //Insert
            $result = $this->db->insert('classes', $class);
        }

        return $result;
    }

    function delete($school_id, $class_id)
    {
        if ($class_id > 0) {

            //Delete

            //Is_active set to false
            $class = array('is_active'=> false);

            //update
            $this->db->where('class_id', $class_id);
            $result = $this->db->update('classes', $class);

            return $result;
        }
        return false;
    }

}