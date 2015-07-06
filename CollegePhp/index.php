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
*   Author: Muhammed Salman Shamsi
*/

require_once 'functions/header.php';

if($loggedin){
    $brCount=0;
    echo '<div class="container">'
            .'<div id="left"><br><div id="datepicker" style="font-size:0.7em;"></div>'
            . '<br><h4><center>Important Guidelines</h4><br></center>'
            .$checkmark.' Please Verify the data before submitting the form<br><br>'
            .$checkmark.' In most of the cases modification is not possible. So be cautious.<br><br>'        
            .$checkmark.' All the Faculty are advised to fill Attendence daily without fail<br><br>'
            .$checkmark.' Routine change of password is advised.<br><br>'
            .$checkmark.' Password must contain atleast one combination of each lower & upper case alphabets'
                    . ',digits and special characters<br><br>'        
                    . '</div>';
            echo '<div id="right">';
           echo '<div class="link_container">';
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='7'||$_SESSION['grid']==='8'){ 
                echo '<a href="/CollegePhp/studentregister.php" ><img src="icons/student.png" ><br>Register Student</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='2'||$_SESSION['grid']==='9'){                 
                 echo '<a href="/CollegePhp/createfacultystaff.php"><img src="icons/professor.png" ><br>Register Faculty <br>/ Staff</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='1'||$_SESSION['grid']==='9'){
                echo '<a href="/CollegePhp/deptcreate.php"><img src="icons/department.png" ><br>Create Department</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='9'){
                echo '<a href="/CollegePhp/createuser.php"><img src="icons/user.png" ><br>Create User Account</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='7'){
                echo '<a href="/CollegePhp/createcourse.php"><img src="icons/course.png" ><br>Make Course Entry</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='7'){
                echo '<a href="/CollegePhp/createtimetable.php"><img src="icons/timetable.png" ><br>Create Time Table</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='7'||$_SESSION['grid']==='5'||
                     $_SESSION['grid']==='4'||$_SESSION['grid']==='2'||$_SESSION['grid']==='1'){
                echo '<a href="/CollegePhp/loadtimetable.php"><img src="icons/viewtime.png" ><br>View Classwise Time Table</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='7'||$_SESSION['grid']==='2'){
                echo '<a href="/CollegePhp/assigncourse.php"><img src="icons/load.png" ><br>Faculty Load Assignment</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='7'||$_SESSION['grid']==='2'||$_SESSION['grid']==='6'){
                echo '<a href="/CollegePhp/filterpromote.php"><img src="icons/promote.png" ><br>Promote / Detain Student</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'){
                echo '<a href="/CollegePhp/test.php"><img src="icons/testmarks.png" ><br>Manage Test Marks</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='6'){
                echo '<a href="/CollegePhp/grade.php"><img src="icons/grade.png" ><br>Semester Marks Entry</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'){
                echo '<a href="/CollegePhp/filteratt.php"><img src="icons/attendence.png" ><br>Daily Attendence Record</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'){
                echo '<a href="/CollegePhp/createpp.php"><img src="icons/planning.png" ><br>Create Practical Plan</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'){
                echo '<a href="/CollegePhp/filterpp.php"><img src="icons/updateplan.png" ><br>Manage Practical Plan</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'){
                echo '<a href="/CollegePhp/tlo.php"><img src="icons/tlo.png" ><br>Manage TLO Plan</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'){
                echo '<a href="/CollegePhp/CA.php"><img src="icons/ca.png" ><br>Continous Assesment</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='7'){
                echo '<a href="/CollegePhp/createsy.php"><img src="icons/syllabus.png" ><br>Create Syllabus</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='7'||$_SESSION['grid']==='2'){
                echo '<a href="/CollegePhp/filtersyllabus.php"><img src="icons/viewsyllabus.png" ><br>Manage Syllabus</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'||
                     $_SESSION['grid']==='7'||$_SESSION['grid']==='1'||$_SESSION['grid']==='9'){
                echo '<a href="/CollegePhp/filterstudinfo.php"><img src="icons/info.png" ><br>View Students Info</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'||
                     $_SESSION['grid']==='7'||$_SESSION['grid']==='1'){
                echo '<a href="/CollegePhp/filterdefaulter.php"><img src="icons/defaulter.png" ><br>View Defaulter List</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='2'){
                echo '<a href="/CollegePhp/view.php"><img src="icons/viewcaplan.png" ><br>View CA / Prac Plan / TLO</a><br>';
             }
            if($_SESSION['grid']==='3'||$_SESSION['grid']==='7'||$_SESSION['grid']==='2'){
                echo '<a href="/CollegePhp/viewtest.php"><img src="icons/viewtest.png" ><br>Test Marks Sem-wise</a><br>';
             }
            if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'){
                echo '<a href="/CollegePhp/studentrecord.php"><img src="icons/record.png" ><br>View Student History</a><br>';
             }

             if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'){
                echo '<a href="/CollegePhp/attendencesheet.php"><img src="icons/sheet.png" ><br>Print Attendence Sheet</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'){
                echo '<a href="/CollegePhp/facultyprofile.php"><img src="icons/profile.png" ><br>Manage Your Profile</a><br>';
             }
             if($_SESSION['grid']==='3'||$_SESSION['grid']==='2'||$_SESSION['grid']==='1'||$_SESSION['grid']==='9'){
                echo '<a href="/CollegePhp/facultyrecord.php"><img src="icons/viewprofile.png" ><br>View Faculty Profile</a><br>';
             }
             if($_SESSION['grid']!=='8'){
                echo '<a href="/CollegePhp/changepass.php"><img src="icons/password.png" ><br>Change Password</a><br>';
             }
             
             echo '</div></div></div>';
             
     }
     else {echo'<br><center><span class="error">Please sign up and/or login to use the system</span><br><center>';
     header('Refresh:0 ,url=/CollegePhp/login.php');}

     require_once 'functions/footer.php';
?>