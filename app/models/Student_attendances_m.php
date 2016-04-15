<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Student_attendances_m extends CI_Model
{
    function all_batch_students($school_id, $batch_id, $attendance_date)
    {
        $sql = "SELECT sa.*, s.photo, s.class_roll_no, s.student_id, concat(s.first_name, ' ', s.middle_name, ', ', s.last_name) As full_name 
                    FROM `batch_student` `bs`
                     LEFT JOIN `student_attendances` `sa` ON `bs`.`student_id` = `sa`.`student_id`
                         and `bs`.`batch_id` = `sa`.`batch_id`
                         and `sa`.`attendance_date` = ?
                     LEFT JOIN `students` s on `s`.`student_id` = `bs`.`student_id`
                     WHERE `bs`.`school_id` = ?
                     AND `bs`.`batch_id` =? ;";

        $query = $this->db->query($sql, array($attendance_date, $school_id, $batch_id));

        $batch_students = $query->result();

        if (is_array($batch_students) && count($batch_students) > 0) {
            return $batch_students;
        }
        return false;
    }

    function all_batch_students_summary($school_id, $batch_id, $attendance_date)
    {
        $sql = "SELECT
                    COUNT(*) total,
                    SUM(CASE WHEN ATTENDANCE_STATUS = 'P' THEN 1 ELSE 0 END) present_count,
                    SUM(CASE WHEN ATTENDANCE_STATUS = 'A' THEN 1 ELSE 0 END) absent_count,
                    SUM(CASE WHEN ATTENDANCE_STATUS = 'L' THEN 1 ELSE 0 END) leave_count
                    FROM student_attendances
                    WHERE ATTENDANCE_DATE = ?
                    AND SCHOOL_ID = ?
                    AND BATCH_ID = ?
                    GROUP BY ATTENDANCE_DATE;";

        $query = $this->db->query($sql, array($attendance_date, $school_id, $batch_id));

        $batch_students_summary = $query->result();

        if (is_array($batch_students_summary) && count($batch_students_summary) > 0) {
            return $batch_students_summary;
        }
        return false;
    }


    function all_batch_students_pivot($school_id, $batch_id, $from_date, $to_date)
    {
        $sql = "Call Student_attendance_pivot(?, ?, ?, ?)";

        $query = $this->db->query($sql, array($school_id, $batch_id, $from_date, $to_date));

        $batch_students_pivot = $query->result();

        if (is_array($batch_students_pivot) && count($batch_students_pivot) > 0) {
            return $batch_students_pivot;
        }
        return null;
    }
    


    function save($school_id, $student_attendance)
    {

        $students_id = $student_attendance['student_id'];
        $batch_id = $student_attendance['batch_id'];
        $attendance_date = $student_attendance['attendance_date'];

        foreach ($students_id as $student_id) {

            $student_attendance_id = $student_attendance['student_attendance_id_'.$student_id];

            //attendance status would be attendance_status_2 (2 is student id)
            $attendance_status = $student_attendance['attendance_status_'.$student_id];

            //attendance reason would be attendance_reason_2 (2 is student id)
            $reason = $student_attendance['reason_'.$student_id];
            

            if ($student_attendance_id > 0) {

                //Update

                //Updated student attendance
                $update_attendance = array('attendance_status' => $attendance_status, 'reason' => $reason);

                //update
                $this->db->where('student_attendance_id', $student_attendance_id);
                $result = $this->db->update('student_attendances', $update_attendance);

                //$result = false;
            } else {
                //Insert

                //Updated student attendance
                $insert_attendance = array('student_id' => $student_id
                , 'batch_id' => $batch_id
                , 'attendance_status' => $attendance_status
                , 'reason' => $reason
                , 'attendance_date' => $attendance_date
                , 'school_id' => $school_id
                );


                //Insert
                $result = $this->db->insert('student_attendances', $insert_attendance);

                //newly inserted id
                //$batch_id = $this->db->insert_id();
            }
        }//end of for each

        //$result=true;

        if($result===TRUE){
            $message ="Student attendance information saved";
        }else{
            $message ="Error for saving Student attendance information";
        }

        $response = array(
            'result' => $result,
            'message' => $message,
            'data' => array('student_attendance' => $student_attendance)
        );

        return $response;
    }
}