<?php

/*                                             License
*   The following license governs the use of CollegeERP in academic and educational environments. Commercial use requires a commercial license from Muhammed Salman Shamsi.
*   ACADEMIC PUBLIC LICENSE
*   Copyright (C) 2014 - 2015  Muhammed Salman Shamsi.
*   FOR DETAILED TERMS AND CONDITION SEE LICENSE.TXT FILE
*   NO WARRANTY
*   BECAUSE THE PROGRAM IS LICENSED FREE OF CHARGE, THERE IS NO WARRANTY FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW. EXCEPT WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES PROVIDE THE PROGRAM "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU. SHOULD THE PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION.
*   IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED ON IN WRITING WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MAY MODIFY AND/OR REDISTRIBUTE THE PROGRAM AS PERMITTED ABOVE, BE LIABLE TO YOU FOR DAMAGES, INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING OUT OF THE USE OR INABILITY TO USE THE PROGRAM INCLUDING BUT NOT LIMITED TO LOSS OF DATA OR DATA BEING RENDERED INACCURATE OR LOSSES SUSTAINED BY YOU OR THIRD PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER PROGRAMS), EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.
*   END OF TERMS AND CONDITIONS
*   [license text: http://www.omnetpp.org/intro/license]   
*   Created On: 25 Jun, 2015, 11:37:42 AM
*   Author: Muhammed Salman Shamsi
*/

function sanitizeString($var)
{
    global $cn;
    $var =  strip_tags($var);
    $var=  htmlentities($var);
    $var= stripcslashes($var);
    return $var;
}

 
if($_POST){
if(isset($_POST[user])&& isset($_POST[pass])&& isset($_POST[instname])&& isset($_POST[add])){    
    
    $user=  sanitizeString($_POST[user]);
    $pass=  sanitizeString($_POST[pass]);
    $instname=  sanitizeString($_POST[instname]);
    $add= strtoupper(sanitizeString($_POST[add]));
    
    $myfile="functions/connect.php";
    $file=  fopen($myfile, 'w') or die("Error in opening File: ".  error_get_last());
    $strdata="<?php \n 
/*                                             License
    *   The following license governs the use of CollegeERP in academic and educational environments. Commercial use requires a commercial license from Muhammed Salman Shamsi.
    *   ACADEMIC PUBLIC LICENSE
    *   Copyright (C) 2014 - 2015 Muhammed Salman Shamsi.
    *   FOR DETAILED TERMS AND CONDITION SEE LICENSE.TXT FILE
    *   NO WARRANTY
    *   BECAUSE THE PROGRAM IS LICENSED FREE OF CHARGE, THERE IS NO WARRANTY FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW. EXCEPT WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES PROVIDE THE PROGRAM \"AS IS\" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU. SHOULD THE PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION.
    *   IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED ON IN WRITING WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MAY MODIFY AND/OR REDISTRIBUTE THE PROGRAM AS PERMITTED ABOVE, BE LIABLE TO YOU FOR DAMAGES, INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING OUT OF THE USE OR INABILITY TO USE THE PROGRAM INCLUDING BUT NOT LIMITED TO LOSS OF DATA OR DATA BEING RENDERED INACCURATE OR LOSSES SUSTAINED BY YOU OR THIRD PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER PROGRAMS), EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.
    *   END OF TERMS AND CONDITIONS
    *   [license text: http://www.omnetpp.org/intro/license]   
    *   Author: Muhammed Salman Shamsi
    */\n
\$db_host=\"localhost\";\n
\$db_user=\"".$user."\";\n
\$db_password=\"".$pass."\";\n
\$db_name=\"College\";\n
\$appname=\"CollegeErp-Beta \";\n
\$colname=\"".$instname."\";\n
\$coladdress=\"".$add."\";\n
\$cn=mysql_connect(\$db_host,\$db_user,\$db_password) or die(mysql_error());\n
mysql_select_db(\$db_name,\$cn) or die(mysql_error());\n
?>";
    fwrite($file, $strdata);
    fclose($file);
$query="-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 06, 2015 at 01:29 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
SET time_zone = \"+00:00\";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `College`
--
CREATE DATABASE IF NOT EXISTS `College2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `College2`;

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
  `batch` decimal(1,0) NOT NULL,
  PRIMARY KEY (`rollno`,`course_id`,`year`,`THorPR`,`dol`,`timeslot_id`,`batch`),
  KEY `fk_Absentee_th_pr_idx` (`course_id`,`dol`,`year`),
  KEY `fk_Absentee_th_pr_idx1` (`course_id`,`dol`,`year`,`THorPR`),
  KEY `fk_Absentee_thorpr_idx` (`course_id`,`dol`,`year`,`THorPR`,`timeslot_id`,`batch`)
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
  `year` varchar(25) NOT NULL,
  `seatno` varchar(12) DEFAULT NULL,
  `TH` decimal(3,0) DEFAULT NULL,
  `OR` decimal(2,0) DEFAULT NULL,
  `TW` decimal(2,0) DEFAULT NULL,
  `PR` decimal(2,0) DEFAULT NULL,
  `IA` decimal(2,0) DEFAULT NULL,
  `total` decimal(3,0) DEFAULT NULL,
  PRIMARY KEY (`course_id`,`year`,`rollno`),
  KEY `fk_Grade_takes_idx` (`rollno`,`course_id`,`year`)
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
  `batch` decimal(1,0) NOT NULL,
  `no_of_lecture` decimal(1,0) NOT NULL DEFAULT '1',
  PRIMARY KEY (`course_id`,`dop`,`year`,`THorPR`,`timeslot_id`,`batch`),
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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Absentee`
--
ALTER TABLE `Absentee`
  ADD CONSTRAINT `fk_Absentee_takes` FOREIGN KEY (`rollno`) REFERENCES `Takes` (`rollno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Absentee_TH_Pr_Record` FOREIGN KEY (`course_id`, `dol`, `year`, `THorPR`, `timeslot_id`, `batch`) REFERENCES `Th_Pr-Record` (`course_id`, `dop`, `year`, `THorPR`, `timeslot_id`, `batch`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_Grade_takes` FOREIGN KEY (`rollno`, `course_id`, `year`) REFERENCES `Takes` (`rollno`, `course_id`, `year`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `TLO`
--
ALTER TABLE `TLO`
  ADD CONSTRAINT `fk_TLO_Syllabus` FOREIGN KEY (`course_id`, `ch_no`) REFERENCES `Syllabus` (`course_id`, `ch_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TLO_teaches` FOREIGN KEY (`course_id`, `year`) REFERENCES `Teaches` (`course_id`, `year`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_Th_Pr-Record_Takes` FOREIGN KEY (`course_id`, `year`) REFERENCES `Takes` (`course_id`, `year`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
-- Constraints for table `TwCompoWeight`
--
ALTER TABLE `TwCompoWeight`
  ADD CONSTRAINT `fk_TwCompoWeight_Takes` FOREIGN KEY (`course_id`, `year`) REFERENCES `Takes` (`course_id`, `year`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TwCompoWeight_TwCompo` FOREIGN KEY (`compo_id`) REFERENCES `TwComponents` (`compo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Database: `companys`
--
CREATE DATABASE IF NOT EXISTS `companys` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `companys`;
--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE IF NOT EXISTS `book_issue` (
  `rollno` varchar(8) NOT NULL DEFAULT '',
  `bookid` varchar(6) NOT NULL DEFAULT '',
  `date_of_issue` date NOT NULL,
  `due_date` date NOT NULL,
  `date_of_recieve` date NOT NULL,
  PRIMARY KEY (`rollno`,`bookid`),
  KEY `bookid` (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `bookid` varchar(6) NOT NULL DEFAULT '',
  `title` varchar(25) NOT NULL,
  `author` varchar(25) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category` varchar(15) DEFAULT NULL,
  `pub_id` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`bookid`),
  KEY `pub_id` (`pub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE IF NOT EXISTS `publishers` (
  `pub_id` varchar(10) NOT NULL DEFAULT '',
  `pubname` varchar(35) NOT NULL,
  `city` varchar(15) DEFAULT NULL,
  `country` varchar(15) NOT NULL,
  PRIMARY KEY (`pub_id`),
  UNIQUE KEY `pubname_UNIQUE` (`pubname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `rollno` varchar(8) NOT NULL DEFAULT '',
  `name` varchar(25) NOT NULL,
  `dept` varchar(10) NOT NULL,
  PRIMARY KEY (`rollno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD CONSTRAINT `book_issue_ibfk_1` FOREIGN KEY (`rollno`) REFERENCES `students` (`rollno`),
  ADD CONSTRAINT `book_issue_ibfk_2` FOREIGN KEY (`bookid`) REFERENCES `books` (`bookid`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`pub_id`) REFERENCES `publishers` (`pub_id`);
--
-- Database: `sailor`
--
CREATE DATABASE IF NOT EXISTS `sailor` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sailor`;

-- --------------------------------------------------------

--
-- Table structure for table `boats`
--

CREATE TABLE IF NOT EXISTS `boats` (
  `bid` int(11) NOT NULL DEFAULT '0',
  `bname` varchar(20) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE IF NOT EXISTS `reserves` (
  `sid` int(11) NOT NULL DEFAULT '0',
  `bid` int(11) NOT NULL DEFAULT '0',
  `day` date DEFAULT NULL,
  PRIMARY KEY (`sid`,`bid`),
  KEY `bid` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sailors`
--

CREATE TABLE IF NOT EXISTS `sailors` (
  `sid` int(11) NOT NULL DEFAULT '0',
  `sname` varchar(25) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `reserves_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `sailors` (`sid`),
  ADD CONSTRAINT `reserves_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `boats` (`bid`);
--
-- Database: `university`
--
CREATE DATABASE IF NOT EXISTS `university` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `university`;

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE IF NOT EXISTS `advisor` (
  `s_ID` varchar(5) NOT NULL DEFAULT '',
  `i_ID` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`s_ID`),
  KEY `i_ID` (`i_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE IF NOT EXISTS `classroom` (
  `building` varchar(15) NOT NULL DEFAULT '',
  `room_number` varchar(7) NOT NULL DEFAULT '',
  `capacity` decimal(4,0) DEFAULT NULL,
  PRIMARY KEY (`building`,`room_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` varchar(8) NOT NULL DEFAULT '',
  `title` varchar(50) DEFAULT NULL,
  `dept_name` varchar(20) DEFAULT NULL,
  `credits` decimal(2,0) DEFAULT NULL,
  PRIMARY KEY (`course_id`),
  KEY `dept_name` (`dept_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dept_name` varchar(20) NOT NULL DEFAULT '',
  `building` varchar(15) DEFAULT NULL,
  `budget` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`dept_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `ID` varchar(5) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL,
  `dept_name` varchar(20) DEFAULT NULL,
  `salary` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `dept_name` (`dept_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prereq`
--

CREATE TABLE IF NOT EXISTS `prereq` (
  `course_id` varchar(8) NOT NULL DEFAULT '',
  `prereq_id` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`course_id`,`prereq_id`),
  KEY `prereq_id` (`prereq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `course_id` varchar(8) NOT NULL DEFAULT '',
  `sec_id` varchar(8) NOT NULL DEFAULT '',
  `semester` varchar(6) NOT NULL DEFAULT '',
  `year` decimal(4,0) NOT NULL DEFAULT '0',
  `building` varchar(15) DEFAULT NULL,
  `room_number` varchar(7) DEFAULT NULL,
  `time_slot_id` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`course_id`,`sec_id`,`semester`,`year`),
  KEY `building` (`building`,`room_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `ID` varchar(5) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL,
  `dept_name` varchar(20) DEFAULT NULL,
  `tot_cred` decimal(3,0) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `dept_name` (`dept_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `takes`
--

CREATE TABLE IF NOT EXISTS `takes` (
  `ID` varchar(5) NOT NULL DEFAULT '',
  `course_id` varchar(8) NOT NULL DEFAULT '',
  `sec_id` varchar(8) NOT NULL DEFAULT '',
  `semester` varchar(6) NOT NULL DEFAULT '',
  `year` decimal(4,0) NOT NULL DEFAULT '0',
  `grade` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`ID`,`course_id`,`sec_id`,`semester`,`year`),
  KEY `course_id` (`course_id`,`sec_id`,`semester`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE IF NOT EXISTS `teaches` (
  `ID` varchar(5) NOT NULL DEFAULT '',
  `course_id` varchar(8) NOT NULL DEFAULT '',
  `sec_id` varchar(8) NOT NULL DEFAULT '',
  `semester` varchar(6) NOT NULL DEFAULT '',
  `year` decimal(4,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`,`course_id`,`sec_id`,`semester`,`year`),
  KEY `course_id` (`course_id`,`sec_id`,`semester`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE IF NOT EXISTS `time_slot` (
  `time_slot_id` varchar(4) NOT NULL DEFAULT '',
  `day` varchar(1) NOT NULL DEFAULT '',
  `start_hr` decimal(2,0) NOT NULL DEFAULT '0',
  `start_min` decimal(2,0) NOT NULL DEFAULT '0',
  `end_hr` decimal(2,0) DEFAULT NULL,
  `end_min` decimal(2,0) DEFAULT NULL,
  PRIMARY KEY (`time_slot_id`,`day`,`start_hr`,`start_min`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisor`
--
ALTER TABLE `advisor`
  ADD CONSTRAINT `advisor_ibfk_1` FOREIGN KEY (`i_ID`) REFERENCES `instructor` (`ID`),
  ADD CONSTRAINT `advisor_ibfk_2` FOREIGN KEY (`s_ID`) REFERENCES `student` (`ID`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`);

--
-- Constraints for table `prereq`
--
ALTER TABLE `prereq`
  ADD CONSTRAINT `prereq_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `prereq_ibfk_2` FOREIGN KEY (`prereq_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`building`, `room_number`) REFERENCES `classroom` (`building`, `room_number`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`);

--
-- Constraints for table `takes`
--
ALTER TABLE `takes`
  ADD CONSTRAINT `takes_ibfk_1` FOREIGN KEY (`course_id`, `sec_id`, `semester`, `year`) REFERENCES `section` (`course_id`, `sec_id`, `semester`, `year`),
  ADD CONSTRAINT `takes_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `student` (`ID`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`course_id`, `sec_id`, `semester`, `year`) REFERENCES `section` (`course_id`, `sec_id`, `semester`, `year`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `instructor` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";

$link = mysqli_connect("localhost","$user","$pass");
if (mysqli_connect_errno()) {
           printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
}
                /* execute multi query */
                
                if (mysqli_multi_query($link, $query)) {
                
                do {
                /* store first result set */
                 if ($result = mysqli_store_result($link)) {
                 }
                    else {
                      // echo 'No Corresponding Records are found!';
                   }              
                /* print divider */
               if (mysqli_more_results($link)) {
                /*intentionally leaved blank*/
                }
                } while (mysqli_next_result($link));
               }
               else {
                    echo 'Unable to Execute the Query:'.
                "\nRecieved following error". mysqli_error($link);
                die();
                
               }
               echo '<br><div class="main"> CollegeERP Successfully Configured!. Redirecting within 3 seconds.</div>';

               header("Refresh: 3; url=login.php");

 }
}
echo <<<_END

<html>
  <head>
    <title>College ERP Cofiguration</title>
    <link rel='stylesheet' href='style/coresheet.css' type='text/css' />
  </head>
  <body>
  <center>
    <h3>Setting Up...</h3>
    <form method="post" action="setup.php">
        <table class="shadowbox">
            <tr>
                <th align="center" colspan="2"><img src="images/erp_logo.png" width="50px" height="50px"/><br><h2>CollegeErp Beta</h2></td>
            </tr>
            <tr>
                <td>MYSQL User Name </td><td><input type="text" name="user" style="margin:0; width:100%" required="true"/></td>
            </tr>
            <tr>
                <td>MYSQL Password </td><td><input type="password" name="pass" style="margin:0; width:100%" required="true"/></td>
            </tr>
            <tr>
                <td>Institute Name </td><td><input type="text" name="instname" style="margin:0; width:100%" required="true"/></td>
            </tr>
            <tr>
                <td>Institute Address </td><td><textarea placeholder="Address in Short" row=3 name="add" style="margin:0; width:100%" required="true"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Submit"></td> 
            </tr>
        </table>
    </form>
  </center>
  </body>
</html>

_END;
?>