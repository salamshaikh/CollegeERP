-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2015 at 10:04 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `College`
--
CREATE DATABASE IF NOT EXISTS `College` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `College`;

-- --------------------------------------------------------

--
-- Table structure for table `Absentee`
--

CREATE TABLE IF NOT EXISTS `Absentee` (
  `rollno` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `dol` date NOT NULL,
  `year` varchar(25) NOT NULL,
  `THorPR` tinyint(1) NOT NULL,
  `timeslot_id` decimal(2,0) NOT NULL,
  PRIMARY KEY (`rollno`,`course_id`,`year`,`THorPR`,`dol`,`timeslot_id`),
  KEY `fk_Absentee_th_pr_idx` (`course_id`,`dol`,`year`),
  KEY `fk_Absentee_th_pr_idx1` (`course_id`,`dol`,`year`,`THorPR`),
  KEY `fk_Absentee_thorpr_idx` (`course_id`,`dol`,`year`,`THorPR`,`timeslot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Access`
--

CREATE TABLE IF NOT EXISTS `Access` (
  `userid` varchar(45) NOT NULL,
  `pass` text NOT NULL,
  `fac_id` varchar(10) NOT NULL,
  `date_of_creation` datetime NOT NULL,
  `grid` int(11) NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `fk_Access_1_idx` (`fac_id`),
  KEY `fk_Access_Group_idx` (`grid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AccessInfo`
--

CREATE TABLE IF NOT EXISTS `AccessInfo` (
  `userid` varchar(45) NOT NULL,
  `remaddr` varchar(70) NOT NULL,
  `httpfrwd` varchar(70) NOT NULL,
  `lanmac` varchar(100) NOT NULL,
  `acctime` datetime NOT NULL,
  KEY `fk_AccessInfo_Access_idx` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CA`
--

CREATE TABLE IF NOT EXISTS `CA` (
  `rollno` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `year` varchar(25) NOT NULL,
  `compo_id` int(11) NOT NULL,
  `compo_no` decimal(2,0) NOT NULL,
  `marks` decimal(3,0) DEFAULT NULL,
  PRIMARY KEY (`rollno`,`course_id`,`year`,`compo_id`,`compo_no`),
  KEY `fk_CA_TwComponents_idx` (`compo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ClassRoom`
--

CREATE TABLE IF NOT EXISTS `ClassRoom` (
  `class_id` int(11) NOT NULL,
  `classroom` varchar(20) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ClassSem`
--

CREATE TABLE IF NOT EXISTS `ClassSem` (
  `sem` varchar(10) NOT NULL,
  `class` varchar(4) NOT NULL,
  `semno` tinyint(1) NOT NULL,
  PRIMARY KEY (`sem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE IF NOT EXISTS `Course` (
  `course_id` varchar(10) NOT NULL,
  `title` varchar(45) NOT NULL,
  `abbrv` varchar(8) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `objectives` text NOT NULL,
  `outcomes` text NOT NULL,
  `PR` decimal(2,0) NOT NULL,
  `OR` decimal(2,0) NOT NULL,
  `TH` decimal(3,0) NOT NULL,
  `TW` decimal(2,0) NOT NULL,
  `IA` decimal(2,0) NOT NULL,
  `totalM` decimal(3,0) NOT NULL,
  `THCr` decimal(2,0) NOT NULL,
  `PRCr` decimal(2,0) NOT NULL,
  `TutCr` decimal(2,0) NOT NULL,
  `totalC` decimal(3,0) NOT NULL,
  `THHrs` decimal(2,0) NOT NULL,
  `PRHrs` decimal(2,0) NOT NULL,
  `TutHrs` decimal(2,0) NOT NULL,
  `totalHrs` decimal(3,0) NOT NULL,
  `dept` varchar(6) NOT NULL,
  `re` varchar(10) NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `fk_Course_dept_idx` (`dept`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE IF NOT EXISTS `Department` (
  `dept_id` varchar(6) NOT NULL,
  `name` varchar(45) NOT NULL,
  `hod` varchar(10) DEFAULT NULL,
  `intake` int(4) NOT NULL,
  `estd` varchar(15) NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`dept_id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  KEY `fk_Department_1_idx` (`hod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Faculty`
--

CREATE TABLE IF NOT EXISTS `Faculty` (
  `fac_id` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `job_type` varchar(45) NOT NULL,
  `per_address` text NOT NULL,
  `res_address` text NOT NULL,
  `phonenop` decimal(12,0) NOT NULL,
  `phonenos` decimal(12,0) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `qualification` varchar(45) NOT NULL,
  `experience` decimal(2,0) NOT NULL,
  `doj` date NOT NULL,
  `dob` date NOT NULL,
  `salary` decimal(10,0) DEFAULT NULL,
  `dept` varchar(10) NOT NULL,
  `areas` text NOT NULL,
  PRIMARY KEY (`fac_id`),
  UNIQUE KEY `phoneno_UNIQUE` (`phonenop`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_Faculty_department_idx` (`dept`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `FacultyProfile`
--

CREATE TABLE IF NOT EXISTS `FacultyProfile` (
  `fac_id` varchar(10) NOT NULL,
  `ug` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pg` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phd` varchar(100) CHARACTER SET latin1 NOT NULL,
  `exp_teach` decimal(2,0) NOT NULL,
  `exp_ind` decimal(2,0) NOT NULL,
  `paper_national_pub` decimal(3,0) NOT NULL,
  `paper_international_pub` decimal(3,0) NOT NULL,
  `paper_national_presen` decimal(3,0) NOT NULL,
  `paper_international_presen` decimal(3,0) NOT NULL,
  `proj_guide_phd` decimal(3,0) NOT NULL,
  `proj_guide_master` decimal(3,0) NOT NULL,
  `book_ipr_patent` text CHARACTER SET latin1 NOT NULL,
  `prof_member` text CHARACTER SET latin1 NOT NULL,
  `consultancy` text NOT NULL,
  `awards` text CHARACTER SET latin1 NOT NULL,
  `grants` text CHARACTER SET latin1 NOT NULL,
  `prof_interaction` text CHARACTER SET latin1 NOT NULL,
  `image_id` tinyint(3) NOT NULL,
  PRIMARY KEY (`fac_id`),
  KEY `fk_Faculty_Profile_Image_idx` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Grade`
--

CREATE TABLE IF NOT EXISTS `Grade` (
  `rollno` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `seatno` varchar(12) NOT NULL,
  `TH` decimal(3,0) DEFAULT NULL,
  `OR` decimal(2,0) DEFAULT NULL,
  `TW` decimal(2,0) DEFAULT NULL,
  `PR` decimal(2,0) DEFAULT NULL,
  `IA` decimal(2,0) DEFAULT NULL,
  `total` decimal(3,0) DEFAULT NULL,
  PRIMARY KEY (`rollno`,`course_id`,`seatno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Group`
--

CREATE TABLE IF NOT EXISTS `Group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(15) NOT NULL,
  PRIMARY KEY (`group_id`),
  UNIQUE KEY `gname_UNIQUE` (`gname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `Images`
--

CREATE TABLE IF NOT EXISTS `Images` (
  `image_id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `image` longblob NOT NULL,
  `image_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fac_id` varchar(10) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `fk_Images_Faculty_idx` (`fac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `PracPlan`
--

CREATE TABLE IF NOT EXISTS `PracPlan` (
  `course_id` varchar(10) NOT NULL,
  `year` varchar(25) NOT NULL,
  `expno` decimal(2,0) NOT NULL,
  `batch` decimal(1,0) NOT NULL,
  `title` varchar(180) DEFAULT NULL,
  `pd` date DEFAULT NULL,
  `dop` date DEFAULT NULL,
  PRIMARY KEY (`course_id`,`year`,`expno`,`batch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `rollno` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` text NOT NULL,
  `res_add` text NOT NULL,
  `sem` varchar(10) NOT NULL,
  `doa` date NOT NULL,
  `dob` date NOT NULL,
  `phoneno` decimal(12,0) NOT NULL,
  `dept` varchar(6) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pphoneno` decimal(12,0) NOT NULL,
  `year` varchar(45) CHARACTER SET big5 COLLATE big5_bin NOT NULL,
  `batch` decimal(1,0) DEFAULT NULL,
  PRIMARY KEY (`rollno`),
  UNIQUE KEY `phoneno_UNIQUE` (`phoneno`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `pphoneno_UNIQUE` (`pphoneno`),
  KEY `fk_Student_1_idx` (`dept`),
  KEY `fk_Student_classsem_idx` (`sem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Syllabus`
--

CREATE TABLE IF NOT EXISTS `Syllabus` (
  `course_id` varchar(10) NOT NULL,
  `ch_no` decimal(2,0) NOT NULL,
  `ch_title` varchar(45) DEFAULT NULL,
  `topics` text,
  `hrs` decimal(2,0) DEFAULT NULL,
  PRIMARY KEY (`course_id`,`ch_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Takes`
--

CREATE TABLE IF NOT EXISTS `Takes` (
  `rollno` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `year` varchar(25) NOT NULL,
  PRIMARY KEY (`course_id`,`rollno`,`year`),
  KEY `fk_Takes_1_idx` (`rollno`),
  KEY `fk_Takes_2_idx` (`course_id`),
  KEY `fk_Takes_3_idx` (`year`),
  KEY `fk_Takes_4_idx` (`course_id`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Teaches`
--

CREATE TABLE IF NOT EXISTS `Teaches` (
  `fac_id` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `year` varchar(45) NOT NULL,
  `THorPR` tinyint(1) NOT NULL,
  `batch` decimal(1,0) NOT NULL,
  `hours` decimal(2,0) NOT NULL,
  PRIMARY KEY (`course_id`,`year`,`THorPR`,`batch`),
  KEY `fk_Teaches_1_idx` (`course_id`),
  KEY `fk_Teaches_2_idx` (`fac_id`),
  KEY `fk_Teaches_3_idx` (`course_id`,`THorPR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Test`
--

CREATE TABLE IF NOT EXISTS `Test` (
  `rollno` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `year` varchar(25) NOT NULL,
  `t1` decimal(2,0) DEFAULT NULL,
  `t2` decimal(2,0) DEFAULT NULL,
  `agg` decimal(2,0) DEFAULT NULL,
  PRIMARY KEY (`rollno`,`course_id`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Th_Pr-Record`
--

CREATE TABLE IF NOT EXISTS `Th_Pr-Record` (
  `course_id` varchar(10) NOT NULL,
  `dop` date NOT NULL,
  `year` varchar(25) NOT NULL,
  `THorPR` tinyint(1) NOT NULL,
  `timeslot_id` decimal(2,0) NOT NULL,
  `no_of_lecture` decimal(1,0) NOT NULL DEFAULT '1',
  PRIMARY KEY (`course_id`,`dop`,`year`,`THorPR`,`timeslot_id`),
  KEY `fk_Th_Pr-Record_Takes_idx` (`course_id`),
  KEY `dop_index` (`dop`),
  KEY `fk_Th_Pr-Record_Takes2_idx` (`year`),
  KEY `fk_Th_Pr-Record_Takes_idx1` (`course_id`,`year`),
  KEY `thorpr_index` (`THorPR`),
  KEY `fk_Th_Pr-Record_TimeSlot_idx` (`timeslot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TimeSlot`
--

CREATE TABLE IF NOT EXISTS `TimeSlot` (
  `timeslot_id` decimal(2,0) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`timeslot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TimeTable`
--

CREATE TABLE IF NOT EXISTS `TimeTable` (
  `timeslot_id` decimal(2,0) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `dept` varchar(6) NOT NULL,
  `class_id` int(11) NOT NULL,
  `year` varchar(25) NOT NULL,
  `day` varchar(15) NOT NULL,
  `THorPR` tinyint(1) NOT NULL,
  PRIMARY KEY (`timeslot_id`,`class_id`,`year`,`day`),
  KEY `fk_TimeTable_dept_idx` (`dept`),
  KEY `fk_TimeTable_ClassRoom_idx` (`class_id`),
  KEY `fk_TimeTable_Sem_idx` (`sem`),
  KEY `fk_TimeTable_Teaches_idx` (`course_id`,`THorPR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TLO`
--

CREATE TABLE IF NOT EXISTS `TLO` (
  `course_id` varchar(10) NOT NULL,
  `ch_no` decimal(2,0) NOT NULL,
  `year` varchar(25) NOT NULL,
  `subtopics` text,
  `subhrs` text,
  `topics_outcomes` text,
  `pcd` text,
  `acd` text,
  `remarks` text,
  PRIMARY KEY (`course_id`,`ch_no`,`year`),
  KEY `fk_TLO_teaches_idx` (`course_id`,`year`),
  KEY `fk_TLO_Syllabus_idx` (`course_id`,`ch_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TwComponents`
--

CREATE TABLE IF NOT EXISTS `TwComponents` (
  `compo_id` int(11) NOT NULL AUTO_INCREMENT,
  `components` varchar(100) NOT NULL,
  PRIMARY KEY (`compo_id`),
  UNIQUE KEY `components_UNIQUE` (`components`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Table structure for table `TwCompoWeight`
--

CREATE TABLE IF NOT EXISTS `TwCompoWeight` (
  `compo_id` int(11) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `year` varchar(25) NOT NULL,
  `weightage` decimal(2,0) NOT NULL,
  `compo_nos` decimal(2,0) NOT NULL,
  PRIMARY KEY (`compo_id`,`course_id`,`year`),
  KEY `fk_TwCompoWeight_TWCourseCompo_idx` (`course_id`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Absentee`
--
ALTER TABLE `Absentee`
  ADD CONSTRAINT `fk_Absentee_takes` FOREIGN KEY (`rollno`) REFERENCES `Takes` (`rollno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Absentee_thorpr` FOREIGN KEY (`course_id`, `dol`, `year`, `THorPR`, `timeslot_id`) REFERENCES `Th_Pr-Record` (`course_id`, `dop`, `year`, `THorPR`, `timeslot_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Access`
--
ALTER TABLE `Access`
  ADD CONSTRAINT `fk_Access_Faculty` FOREIGN KEY (`fac_id`) REFERENCES `Faculty` (`fac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Access_Group` FOREIGN KEY (`grid`) REFERENCES `Group` (`group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `AccessInfo`
--
ALTER TABLE `AccessInfo`
  ADD CONSTRAINT `fk_AccessInfo_Access` FOREIGN KEY (`userid`) REFERENCES `Access` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `CA`
--
ALTER TABLE `CA`
  ADD CONSTRAINT `fk_CA_roll_course-take` FOREIGN KEY (`rollno`, `course_id`, `year`) REFERENCES `Takes` (`rollno`, `course_id`, `year`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CA_TwComponents` FOREIGN KEY (`compo_id`) REFERENCES `TwComponents` (`compo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Course`
--
ALTER TABLE `Course`
  ADD CONSTRAINT `fk_Course_dept` FOREIGN KEY (`dept`) REFERENCES `Department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Department`
--
ALTER TABLE `Department`
  ADD CONSTRAINT `fk_Department_Faculty` FOREIGN KEY (`hod`) REFERENCES `Faculty` (`fac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Faculty`
--
ALTER TABLE `Faculty`
  ADD CONSTRAINT `fk_Faculty_department` FOREIGN KEY (`dept`) REFERENCES `Department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `FacultyProfile`
--
ALTER TABLE `FacultyProfile`
  ADD CONSTRAINT `fk_FacultyProfile_Faculty` FOREIGN KEY (`fac_id`) REFERENCES `Faculty` (`fac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FacultyProfile_Image` FOREIGN KEY (`image_id`) REFERENCES `Images` (`image_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Grade`
--
ALTER TABLE `Grade`
  ADD CONSTRAINT `fk_Grade_takes` FOREIGN KEY (`rollno`, `course_id`) REFERENCES `Takes` (`rollno`, `course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Images`
--
ALTER TABLE `Images`
  ADD CONSTRAINT `fk_Images_Faculty` FOREIGN KEY (`fac_id`) REFERENCES `Faculty` (`fac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PracPlan`
--
ALTER TABLE `PracPlan`
  ADD CONSTRAINT `fk_PracPlan_Course` FOREIGN KEY (`course_id`) REFERENCES `Course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `fk_Student_1` FOREIGN KEY (`dept`) REFERENCES `Department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_classsem` FOREIGN KEY (`sem`) REFERENCES `ClassSem` (`sem`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Syllabus`
--
ALTER TABLE `Syllabus`
  ADD CONSTRAINT `fk_Syllabus_course` FOREIGN KEY (`course_id`) REFERENCES `Course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Takes`
--
ALTER TABLE `Takes`
  ADD CONSTRAINT `fk_Takes_1` FOREIGN KEY (`rollno`) REFERENCES `Student` (`rollno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Takes_2` FOREIGN KEY (`course_id`) REFERENCES `Course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Teaches`
--
ALTER TABLE `Teaches`
  ADD CONSTRAINT `fk_Teaches_1` FOREIGN KEY (`course_id`) REFERENCES `Course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Teaches_2` FOREIGN KEY (`fac_id`) REFERENCES `Faculty` (`fac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Test`
--
ALTER TABLE `Test`
  ADD CONSTRAINT `fk_Test_roll_course-take` FOREIGN KEY (`rollno`, `course_id`, `year`) REFERENCES `Takes` (`rollno`, `course_id`, `year`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Th_Pr-Record`
--
ALTER TABLE `Th_Pr-Record`
  ADD CONSTRAINT `fk_Th_Pr-Record_takes` FOREIGN KEY (`course_id`, `year`) REFERENCES `Takes` (`course_id`, `year`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Th_Pr-Record_TimeSlot` FOREIGN KEY (`timeslot_id`) REFERENCES `TimeSlot` (`timeslot_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TimeTable`
--
ALTER TABLE `TimeTable`
  ADD CONSTRAINT `fk_TimeTable_ClassRoom` FOREIGN KEY (`class_id`) REFERENCES `ClassRoom` (`class_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TimeTable_dept` FOREIGN KEY (`dept`) REFERENCES `Department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TimeTable_Sem` FOREIGN KEY (`sem`) REFERENCES `ClassSem` (`sem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TimeTable_Teaches` FOREIGN KEY (`course_id`, `THorPR`) REFERENCES `Teaches` (`course_id`, `THorPR`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TimeTable_TimeSlot` FOREIGN KEY (`timeslot_id`) REFERENCES `TimeSlot` (`timeslot_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TLO`
--
ALTER TABLE `TLO`
  ADD CONSTRAINT `fk_TLO_Syllabus` FOREIGN KEY (`course_id`, `ch_no`) REFERENCES `Syllabus` (`course_id`, `ch_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TLO_teaches` FOREIGN KEY (`course_id`, `year`) REFERENCES `Teaches` (`course_id`, `year`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TwCompoWeight`
--
ALTER TABLE `TwCompoWeight`
  ADD CONSTRAINT `fk_TwCompoWeight_Takes` FOREIGN KEY (`course_id`, `year`) REFERENCES `Takes` (`course_id`, `year`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TwCompoWeight_TwCompo` FOREIGN KEY (`compo_id`) REFERENCES `TwComponents` (`compo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
