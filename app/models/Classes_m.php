<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classes_m extends CI_Model
{
    /*$query = $this->db->query("SELECT c.class_id, c.name, c.code, c.section_name, GROUP_CONCAT(b.name) AS batch_names
                FROM CLASSES C
                INNER JOIN BATCHES B ON B.CLASS_ID = C.CLASS_ID
                GROUP BY c.class_id
                ORDER BY c.created_at desc;");
    $classes = $query->result();*/

    function all_classes($school_id)
    {
       /* $this->db->select('c.*,GROUP_CONCAT(b.batch_id) AS batch_ids, GROUP_CONCAT(b.name) AS batch_names');
        $this->db->from('classes c');
        $this->db->join('batches b', 'b.class_id = c.class_id');
        $this->db->where('c.school_id', $school_id);
        $this->db->where('c.is_active', true);
        $this->db->group_by('c.class_id');

        $this->db->order_by('c.created_at', 'desc');*/

        $this->db->from('classes');
        $this->db->where('school_id', $school_id);
        $this->db->where('is_active', true);

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

            //$result = false;
        } else {
            //Insert

            //Created_at date
            $class = array_merge($class, array('created_at'=> date('Y-m-d H:i:s')));

            //Insert
            $result = $this->db->insert('classes', $class);

            //newly inserted id
            //$class_id = $this->db->insert_id();
        }

        if($result===TRUE){
            $message ="Class information saved";
        }else{
            $message ="Error for saving class information";
        }

        $response = array(
            'result' => $result,
            'message' => $message,
            'data' => array('batch_id' => $class_id)
        );

        return $response;
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

            //return $result;
        }

        if($result===TRUE){
            $message ="Class deleted";
        }else{
            $message ="Error for deleting class information";
        }

        $response = array(
            'result' => $result,
            'message' => $message,
            'data' => array('batch_id' => $class_id)
        );

        return $response;
    }

}