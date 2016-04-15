CREATE DATABASE  IF NOT EXISTS `myschool1`;
USE `myschool1`;


-- DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools` (
	`school_id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) DEFAULT NULL,
	`code` varchar(10) DEFAULT NULL,
	`description` varchar(500) DEFAULT NULL,
	`address` varchar(500) DEFAULT NULL,
	`phone` varchar(12) DEFAULT NULL,
	`email` varchar(50) DEFAULT NULL,
	`website` varchar(500) DEFAULT NULL,
	`logo` varchar(500) DEFAULT NULL,

	`is_active` bool DEFAULT true,
	`created_at` datetime DEFAULT NULL,
	`updated_at` datetime DEFAULT NULL,
	PRIMARY KEY (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
	`user_id` int(11) NOT NULL AUTO_INCREMENT,
	`username` varchar(50) DEFAULT NULL,
	`password_hash` varchar(100) DEFAULT NULL,
    
	`first_name` varchar(50) DEFAULT NULL,
	`last_name` varchar(50) DEFAULT NULL,
	`email` varchar(50) DEFAULT NULL,

	`admin` bool DEFAULT false,
	`employee` bool DEFAULT false,
	`student` bool DEFAULT false,
	`parent` bool DEFAULT false,

	`is_active` bool DEFAULT true,
	`created_at` datetime DEFAULT NULL,
	`updated_at` datetime DEFAULT NULL,
	`school_id` int(11) NOT NULL,
	 PRIMARY KEY (`user_id`),
    
	 -- KEY `fk_school_id` (`school_id`),
	 CONSTRAINT `fk_school_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
	`class_id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) DEFAULT NULL,
	`code` varchar(10) DEFAULT NULL,
	`section_name` varchar(50) DEFAULT NULL,

	`is_active` bool DEFAULT true,
	`created_at` datetime DEFAULT NULL,
	`updated_at` datetime DEFAULT NULL,
	`school_id` int(11) NOT NULL,
	PRIMARY KEY (`class_id`),
    -- KEY `fk_class_school_id` (`school_id`),
	CONSTRAINT `fk_class_school_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
	`employee_id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) DEFAULT NULL,
	`code` varchar(10) DEFAULT NULL,
	`first_name` varchar(50) DEFAULT NULL,
	`middle_name` varchar(50) DEFAULT NULL,
	`last_name` varchar(50) DEFAULT NULL,

	`joining_date` datetime DEFAULT NULL,
	`job_title` varchar(50) DEFAULT NULL,
	`gender` bit DEFAULT 0,

	`user_id` int(11) NOT NULL,

	`is_active` bool DEFAULT true,
	`created_at` datetime DEFAULT NULL,
	`updated_at` datetime DEFAULT NULL,
	`school_id` int(11) NOT NULL,
	PRIMARY KEY (`employee_id`),
    
    -- KEY `fk_employee_user_id` (`user_id`),
	CONSTRAINT `fk_employee_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
    
    -- KEY `fk_employee_school_id` (`school_id`),
	CONSTRAINT `fk_employee_school_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- DROP TABLE IF EXISTS `batches`;
CREATE TABLE `batches` (
	`batch_id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) DEFAULT NULL,
	`start_date` datetime DEFAULT NULL,
	`end_date` datetime DEFAULT NULL,
	`grading_type` varchar(10) DEFAULT NULL,

   	`class_id` int(11) NOT NULL,
	`employee_id` int(11) DEFAULT NULL ,

	`is_active` bool DEFAULT true,
	`created_at` datetime DEFAULT NULL,
	`updated_at` datetime DEFAULT NULL,
	`school_id` int(11) NOT NULL,
	PRIMARY KEY (`batch_id`),

    -- KEY `fk_batch_class_id` (`class_id`),
	CONSTRAINT `fk_batch_class_id` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`),

    -- KEY `fk_batch_employee_id` (`employee_id`),
	CONSTRAINT `fk_batch_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`),

    -- KEY `fk_batch_school_id` (`school_id`),
	CONSTRAINT `fk_batch_school_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
	`subject_id` int(11) NOT NULL AUTO_INCREMENT,
	`code` varchar(10) DEFAULT NULL,
	`name` varchar(50) DEFAULT NULL,
	`max_weekly_classes` int(2) DEFAULT NULL,
	`credit_hours` DECIMAL(5,2) DEFAULT NULL,

    `batch_id` int(11) NOT NULL,

	`is_active` bool DEFAULT true,
	`created_at` datetime DEFAULT NULL,
	`updated_at` datetime DEFAULT NULL,
	`school_id` int(11) NOT NULL,
	PRIMARY KEY (`subject_id`),

    -- KEY `fk_subject_batch_id` (`batch_id`),
	CONSTRAINT `fk_subject_batch_id` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`batch_id`),

    -- KEY `fk_subject_school_id` (`school_id`),
	CONSTRAINT `fk_subject_school_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Students
-- DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
	`student_id` int(11) NOT NULL AUTO_INCREMENT,
	`admission_no` varchar(10) DEFAULT NULL,
	`class_roll_no` varchar(10) DEFAULT NULL,
	`admission_date` datetime DEFAULT NULL,

	`first_name` varchar(20) DEFAULT NULL,
	`middle_name` varchar(20) DEFAULT NULL,
	`last_name` varchar(20) DEFAULT NULL,

  `batch_id` int(11) NOT NULL,
	`enrollment_date` datetime DEFAULT NULL,

	`date_of_birth` datetime DEFAULT NULL,
	`gender` varchar(20) DEFAULT NULL,
	`blood_group` varchar(20) DEFAULT NULL,
	`birth_place` varchar(20) DEFAULT NULL,
	`nationality` varchar(20) DEFAULT NULL,
	`religion` varchar(20) DEFAULT NULL,

	`address_line1` varchar(50) DEFAULT NULL,
	`address_line2` varchar(50) DEFAULT NULL,

	`phone1` varchar(12) DEFAULT NULL,
	`phone2` varchar(12) DEFAULT NULL,
	`email` varchar(50) DEFAULT NULL,

	`photo` varchar(500) DEFAULT NULL,

  `user_id` int(11) NOT NULL,

	`passport_number` varchar(50) DEFAULT NULL,
	`biometric_id` varchar(100) DEFAULT NULL,

	`is_active` bool DEFAULT true,
	`created_at` datetime DEFAULT NULL,
	`updated_at` datetime DEFAULT NULL,
	`school_id` int(11) NOT NULL,

	PRIMARY KEY (`student_id`),

  -- KEY `fk_student_batch_id` (`batch_id`),
	CONSTRAINT `fk_student_batch_id` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`batch_id`),

  -- KEY `fk_student_user_id` (`user_id`),
	CONSTRAINT `fk_student_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),

    -- KEY `fk_student_school_id` (`school_id`),
	CONSTRAINT `fk_student_school_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- batch_students
-- DROP TABLE IF EXISTS `batch_students`;
CREATE TABLE `batch_students` (
	`batch_student_id` int(11) NOT NULL AUTO_INCREMENT,
	`batch_id` int(11) NOT NULL,
	`student_id` int(11) NOT NULL,
	`school_id` int(11) NOT NULL,

	PRIMARY KEY (`batch_student_id`),

	-- KEY `fk_batch_students_batch_id` (`batch_id`),
	CONSTRAINT `fk_batch_students_batch_id` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`batch_id`),
	-- KEY `fk_batch_students_student_id` (`student_id`),
	CONSTRAINT `fk_batch_students_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  -- KEY `fk_batch_students_school_id` (`school_id`),
	CONSTRAINT `fk_batch_students_school_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `student_attendances` (
  `student_attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,

  `attendance_status` varchar(10) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `attendance_date` datetime DEFAULT NULL,

  `school_id` int(11) NOT NULL,

  PRIMARY KEY (`student_attendance_id`),

  KEY `fk_student_attendances_school_id` (`school_id`),
  CONSTRAINT `fk_student_attendances_school_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`),

  KEY `fk_student_attendances_batch_id` (`batch_id`),
  CONSTRAINT `fk_student_attendances_batch_id` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`batch_id`),

  KEY `fk_student_attendances_student_id` (`student_id`),
  CONSTRAINT `fk_student_attendances_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`)

)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


CREATE TABLE `employee_attendances` (
  `employee_attendance_id` int(11) NOT NULL AUTO_INCREMENT,

  `employee_id` int(11) NOT NULL,
   `attendance_status` varchar(10) DEFAULT NULL,

  `attendance_date` datetime DEFAULT NULL,
  `employee_leave_type_id` int(11) DEFAULT NULL,

  `reason` varchar(100) DEFAULT NULL,

  `is_half_day` tinyint(1) DEFAULT '1',

  `school_id` int(11) NOT NULL,

  PRIMARY KEY (`employee_attendance_id`),

  KEY `fk_employee_attendance_school_id` (`school_id`),
  CONSTRAINT `fk_employee_attendance_school_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`),

  KEY `fk_employee_attendance_employee_id` (`employee_id`),
  CONSTRAINT `fk_employee_attendance_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`)

) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
























---Inserting DATA
LOCK TABLES `schools` WRITE;
INSERT INTO `schools`
VALUES (1,'Testing School','SCH-01','','','','', '', './assets/resource/school/logo.png', true, current_date(), current_date());
UNLOCK TABLES;



LOCK TABLES `users` WRITE;
INSERT INTO `users`
VALUES (1,'admin','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','Admin','Schmadmin','admin@test.com',true, false, false, false, true, current_date(), current_date(), 1);
UNLOCK TABLES;


-- INSERT INTO `classes`
-- VALUES (1, 'Class 1','C1','Green House', true, current_date(), current_date(), 1);

-- INSERT INTO `batches`
-- VALUES (1, '2016 - 2017', '2016-01-01','2017-01-01', 'GPA', 1, NULL, true, current_date(), current_date(), 1);

-- INSERT INTO `batches`
-- VALUES (2, '2017 - 2018', '2017-01-01','2018-01-01', 'GPA', 1, NULL, true, current_date(), current_date(), 1);


