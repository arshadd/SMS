<?php

class school_m extends CI_Model
{
    function update($id, $data)
    {
        $this->db->where('school_id', $id);
        if ($this->db->update('schools', $data)) {
            return $data;
        } else {
            return false;
        }
    }


    function find_school($school_id)
    {
        $this->db->from('schools');
        $this->db->where('school_id', $school_id);
        $school = $this->db->get()->result();

        if (is_array($school) && count($school) > 0) {
            return $school;
        }

        return false;
    }

    function save($school_id, $school)
    {
        if ($school_id > 0) {

            //Update

            //Updated_at date
            $school = array_merge($school, array('updated_at'=> date('Y-m-d H:i:s')));

            //update
            $this->db->where('school_id', $school_id);
            $result = $this->db->update('schools', $school);

            //$result = false;
        } else {
            //Insert

            //Created_at date
            $school = array_merge($school, array('created_at'=> date('Y-m-d H:i:s')));

            //Insert
            $result = $this->db->insert('schools', $school);

            //newly inserted id
            $school_id = $this->db->insert_id();

            //add primary key
            $school = array_merge($school, array('school_id'=> $school_id));
        }

        if($result===TRUE){
            $message ="School information saved";
        }else{
            $message ="Error for saving school information";
        }

        $response = array(
            'result' => $result,
            'message' => $message,
            'data' => $school
        );

        return $response;
    }

}
