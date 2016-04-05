<?php

class school_m extends CI_Model {



    function update($id, $data)
    {
        $this->db->where('school_id', $id);
        if ($this->db->update('schools', $data)) {
            return $data;
        } else {
            return false;
        }
    }


 function get_school_info($id) {

     $this->db->from('schools');
     $this->db->where('school_id', $id);
     $school = $this->db->get()->result();

    if( is_array($school) && count($school) > 0 ) {
		return $school;
    }

    return false;
  }


}
