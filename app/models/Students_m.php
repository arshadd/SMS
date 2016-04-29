<?php

class Students_m extends CI_Model
{
    function all_students($school_id)
    {
        $this->db->select('s.*, concat(s.first_name," ", s.middle_name, " ", s.last_name) as full_name, b.name as batch_name, c.class_id, c.name as class_name, c.code');
        $this->db->from('students s');
        $this->db->join('batches b', 'b.batch_id = s.batch_id', 'left');
        $this->db->join('classes c', 'c.class_id = b.class_id', 'left');

        $this->db->where('s.school_id', $school_id);
        $this->db->where('s.is_active', true);
        $this->db->order_by('s.created_at', 'desc');

        $students = $this->db->get()->result();

        if (is_array($students) && count($students) > 0) {
            return $students;
        }

        return false;
    }

    function all_batch_students($school_id, $batch_id)
    {
        $this->db->select('s.*, concat(s.first_name," ", s.middle_name, " ", s.last_name) as full_name, b.name as batch_name, c.class_id, c.name as class_name, c.code');
        $this->db->from('students s');
        $this->db->join('batches b', 'b.batch_id = s.batch_id', 'left');
        $this->db->join('classes c', 'c.class_id = b.class_id', 'left');

        /*
        $this->db->select('students.*, concat(students.first_name," ", students.middle_name, " ", students.last_name) as full_name, batches.name as batch_name, classes.class_id, classes.name as class_name');
        $this->db->from('students');
        $this->db->join('batches', 'batches.batch_id = students.batch_id');
        $this->db->join('classes', 'classes.class_id = batches.class_id');*/

        $this->db->where('s.school_id', $school_id);
        $this->db->where('s.batch_id', $batch_id);
        $this->db->where('s.is_active', true);
        $this->db->order_by('s.created_at', 'desc');


        $students = $this->db->get()->result();

        if (is_array($students) && count($students) > 0) {
            return $students;
        }

        return false;
    }

    function find_student($student_id)
    {
        $this->db->select('s.*, concat(s.first_name," ", s.middle_name, " ", s.last_name) as full_name, b.name as batch_name, c.class_id, c.name as class_name, c.code');
        $this->db->from('students s');
        $this->db->join('batches b', 'b.batch_id = s.batch_id', 'left');
        $this->db->join('classes c', 'c.class_id = b.class_id', 'left');

        /*$this->db->select('students.*, concat(students.first_name," ", students.middle_name, " ", students.last_name) as full_name, batches.name as batch_name, classes.class_id, classes.name as class_name');
        $this->db->from('students');
        $this->db->join('batches', 'batches.batch_id = students.batch_id');
        $this->db->join('classes', 'classes.class_id = batches.class_id');*/

        $this->db->where('s.student_id', $student_id);
        $this->db->where('s.is_active', true);

        $student = $this->db->get()->result();

        if (is_array($student) && count($student) > 0) {
            return $student;
        }

        return false;
    }

    function new_student($school_id)
    {
        $this->db->select('CONCAT("S", IFNULL(max(student_id) ,0)+1) as new_student_id');
        $this->db->from('students');
        $this->db->where('school_id', $school_id);

        $student = $this->db->get()->result();

        if (is_array($student) && count($student) > 0) {
            return $student;
        }

        return false;
    }
    function new_roll_no($school_id, $batch_id){

        $this->db->select('concat(c.code, IFNULL(roll_no_prefix,"")) as prefix, LPAD(IFNULL(max(s.class_roll_no),0)+1,3, "0") as new_roll_no');
        $this->db->from('students s');
        $this->db->join('batches b', 's.batch_id = b.batch_id');
        $this->db->join('classes c', 'c.class_id = b.class_id');
        $this->db->where('s.school_id', $school_id);
        $this->db->where('s.batch_id', $batch_id);

        $new_student_rollno = $this->db->get()->result();

        if (is_array($new_student_rollno) && count($new_student_rollno) > 0) {
            return $new_student_rollno;
        }

        return false;

    }

    function already_exists($student_id, $admission_no)
    {
        $this->db->from('students');
        $this->db->where('student_id !=', $student_id);
        $this->db->where('admission_no', $admission_no);

        $result = $this->db->get()->result();

        if (is_array($result) && count($result) > 0) {
            return true;
        }

        return false;
    }

    function save($school_id, $student_id, $student)
    {
        //Validation
        $result = $this->already_exists($student_id, $student['admission_no']);
        if($result===TRUE){

            $response = array(
                'result' => false,
                'message' => 'This admission no is already taken, try another.',
                'data' => $student
            );

        }else {

            $user = array(
                "first_name" =>$student['first_name'],
                "last_name" =>$student['last_name'],
                "email" =>"",
                "student" =>"1",
                "school_id" =>$school_id
            );

            //-------Begin Transaction----------//
            $this->db->trans_begin();

            //Logic
            if ($student_id > 0) {

                //Update
                //-----------Update User's Info---------------//
                $user_id = $student['user_id'];
                $user = array_merge($user, array('updated_at' => date('Y-m-d H:i:s')));

                $this->db->where('user_id', $user_id);
                $result = $this->db->update('users', $user);
                //-----------End Update User's Info---------------//

                //-----------Update Student's Info---------------//
                //Updated_at date
                $student = array_merge($student, array('updated_at' => date('Y-m-d H:i:s')));

                //update
                $this->db->where('student_id', $student_id);
                $result = $this->db->update('students', $student);
                //-----------End Update Student's Info---------------//

                //$result = false;
            } else {
                //Insert
                if(array_key_exists('photo', $student)===false)
                {
                    $student = array_merge($student, array('photo' => STUDENT_DEFAULT_IMAGE));
                }
                //-----------Insert User's Info---------------//
                $user = array_merge($user, array('username' => $student['admission_no']));
                $user = array_merge($user, array('password_hash' => DEFAULT_PASSWORD));
                $user = array_merge($user, array('created_at' => date('Y-m-d H:i:s')));

                $result = $this->db->insert('users', $user);

                //newly inserted id
                $user_id = $this->db->insert_id();
                //-----------End Insert User's Info---------------//

                //-----------Insert Student's Info---------------//
                //Created_at date
                $student = array_merge($student, array('created_at' => date('Y-m-d H:i:s')));
                //School Id
                $student = array_merge($student, array('school_id' => $school_id));
                //Add user id
                $student['user_id'] = $user_id;

                $result = $this->db->insert('students', $student);

                //newly inserted id
                $student_id = $this->db->insert_id();

                $student = array_merge($student, array('student_id' => $student_id));
                //-----------End Insert Student's Info---------------//

                //-----------Insert Batch Student's Info---------------//
                $batch_student = array(
                    "student_id" =>$student_id,
                    "batch_id" =>$student['batch_id'],
                    "school_id" =>$school_id
                );
                $result = $this->db->insert('batch_student', $batch_student);
                //-----------End Insert Batch Student's Info---------------//
            }

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                $result = FALSE;
            }
            else
            {
                $this->db->trans_commit();
                $result = TRUE;
            }
            //-------End Transaction----------//

            if ($result === TRUE) {
                $result = "success";
                $message = "Student information saved";
            } else {
                $result = "failed";
                $message = $this->db->_error_message();//"Error for saving student information";
            }

            $response = array(
                'result' => $result,
                'message' => $message,
                'data' => $student
            );
        }//



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