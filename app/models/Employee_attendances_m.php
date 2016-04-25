<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Employee_attendances_m extends CI_Model
{
    function all_department_employees($school_id, $attendance_date)
    {
        
        $sql = "SELECT  IFNULL(ea.employee_attendance_id, 0) as employee_attendance_id, ea.attendance_date,ea.reason, ea.attendance_status, e.employee_id, e.photo, e.job_title, concat(e.first_name, ' ', e.middle_name, ', ', e.last_name) As full_name 
                FROM employees e
                LEFT JOIN employee_attendances ea ON e.employee_id = ea.employee_id and date(ea.attendance_date) = ?
                LEFT JOIN `employee_departments` d on d.employee_department_id = e.employee_department_id
                WHERE `e`.`school_id` = ?;";

        $query = $this->db->query($sql, array($attendance_date, $school_id));
        $employees = $query->result();
        if (is_array($employees) && count($employees) > 0) {
            return $employees;
        }
        return false;
    }

    function all_employees_summary($school_id, $attendance_date, $employeecount)
    {

        $this->db->select('count(*) as total, SUM(CASE WHEN attendance_status = \'P\' THEN 1 ELSE 0 END) present_count, SUM(CASE WHEN attendance_status = \'A\' THEN 1 ELSE 0 END) absent_count, SUM(CASE WHEN attendance_status = \'L\' THEN 1 ELSE 0 END) leave_count');
        $this->db->from('employee_attendances');
        $this->db->where('school_id', $school_id);
        $this->db->where('date(attendance_date)', $attendance_date);
        $this->db->group_by('attendance_date');
        $this->db->order_by('attendance_date');
        $employees_summary = $this->db->get()->result();

        if (is_array($employees_summary) && count($employees_summary) > 0) {
            return $employees_summary;
        }
        return false;
    }




    function save($school_id, $employee_attendance)
    {

        $employees_id = $employee_attendance['employee_id'];
        $attendance_date = $employee_attendance['attendance_date'];


        foreach ($employees_id as $employee_id) {

            $employee_attendance_id = $employee_attendance['employee_attendance_id_'.$employee_id];

            //attendance status would be attendance_status_2 (2 is employee id)
            $attendance_status = $employee_attendance['attendance_status_'.$employee_id];

            //attendance reason would be attendance_reason_2 (2 is employee id)
            $reason = $employee_attendance['reason_'.$employee_id];


            if ($employee_attendance_id > 0) {

                //Update

                //Updated employee attendance
                $update_attendance = array('attendance_status' => $attendance_status, 'reason' => $reason);

                //update
                $this->db->where('employee_attendance_id', $employee_attendance_id);
                $result = $this->db->update('employee_attendances', $update_attendance);

                //$result = false;
            } else {
                //Insert

                //Updated employee attendance
                $insert_attendance = array('employee_id' => $employee_id
                , 'attendance_status' => $attendance_status
                , 'reason' => $reason
                , 'attendance_date' => $attendance_date
                , 'school_id' => $school_id
                );


                //Insert
                $result = $this->db->insert('employee_attendances', $insert_attendance);

                //newly inserted id
                //$batch_id = $this->db->insert_id();
            }
        }//end of for each

        //$result=true;

        if($result===TRUE){
            $message ="employee attendance information saved";
        }else{
            $message ="Error for saving employee attendance information";
        }

        $response = array(
            'result' => $result,
            'message' => $message,
            'data' => array('employee_attendance' => $employee_attendance)
        );

        return $response;
    }
}