<?php 
require_once 'functions/functions.php';
require_once 'functions/header.php';
insertCourse();
              
if($loggedin)
{
    if($_SESSION['grid']==='3'||$_SESSION['grid']==='7'){
echo <<<_END
<div class="container">
    <div id="left">
_END;
echo '<br><div id="datepicker" style="font-size:0.7em;"></div>';
echo '<br><br>Important Guidelines<br><br>'
     .$checkmark.' See University Syllabus copy for course id.<br><br>'
     .$checkmark.' For departments with <y>Two Shifts</y> a course has to be created <y>Two times</y> one for each shift.<br><br>'
        . 'Example: for CIVIL department Cousre- ID: CE-C301 Title: Applied Mathematics-III should be entered as <br>'
        . '<br>For <y>SHIFT-I</y>:-<br><br>Course ID: <y>CE-C301-S1</y> <br>Title: <y>Applied Mathematics-III-S1</y>'
        . '<br><br>For <y>SHIFT-II</y>:-<br><br>Course ID: <y>CE-C301-S2</y> <br>Title: <y>Applied Mathematics-III-S2</y>'
        . 'Abbreviation could be same<br><br>'
        .$checkmark.'Revision indicates the year in which the syllabus is revised.<br><br>';
echo <<<_END
   </div>
    <div id="right">    
        
        <form method="post" action="createcourse.php" onsubmit="return validateCourse(this)">
         <center>
            <table  cellspacing="10" cellpadding="4" border="0" bgcolor="#00eeee">
                <th colspan="2" align="center">Create Course</th>
                <tr>
                    <td>Course ID</td>
                    <td align="right"><input type="text" placeholder="Unique Course ID" maxlength=10 name="cid" required></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td align="right"><input type="text" placeholder="Name of Subject" name="ctitle" required></td>
                </tr>
                <tr>
                    <td>Abbreviation</td>
                    <td align="right"><input type="text" name="cabbrv" placeholder="Acronym of Title" maxlength="8" required></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td align="right"><select name="csem" size=1 required>
_END;
                         loadSem(); 
echo <<<_END
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Objectives</td>
                    <td align="right"><textarea name="cobj" rows="2" placeholder="Semicolon (;) seprated list of Course Objectives" style="width:100%; height: auto;" required="required"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Outcomes</td>
                    <td align="right"><textarea name="cout" rows="2" placeholder="Semicolon (;) seprated list of Course Outcomes" style="width:100%; height: auto;" required="required"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Department</td>
                    <td align="right"><select name="cdept" size=1  required>
_END;
                        loadDept(1); 
echo <<<_END
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Practical Marks</td>
                    <td align="right"><input type="number" placeholder="PR" min="0" max="50" name="cpr" value="0" required></td>
                </tr>
                <tr>
                    <td>Oral Marks</td>
                    <td align="right"><input type="number" placeholder="OR" min="0" max="50" name="cor" value="0" required></td>
                </tr>
                <tr>
                    <td>Theory Marks</td>
                    <td align="right"><input type="number" placeholder="TH" min="0" max="100" name="cth" value="0" required></td>
                </tr>
                <tr>
                    <td>Term Work Marks</td>
                    <td align="right"><input type="number" placeholder="TW" min="0" max="50" name="ctw" value="0" required></td>
                </tr>
                <tr>
                    <td>Internal Assessment Marks</td>
                    <td align="right"><input type="number" placeholder="IA" min="0" max="20" name="cia" value="0" required></td>
                </tr>
                <tr>
                    <td>Theory Credit</td>
                    <td align="right"><input type="number" placeholder="Range 0 - 10" min="0" max="10" name="cthcr" value="0" required></td>
                </tr>
                <tr>
                    <td>Practical Credit</td>
                    <td align="right"><input type="number" placeholder="Range 0 - 10" min="0" max="10" name="cprcr" value="0" required></td>
                </tr>
                <tr>
                    <td>Tutorials Credit</td>
                    <td align="right"><input type="number" placeholder="Range 0 - 10" min="0" max="10" name="ctutcr" value="0" required></td>
                </tr>
                <tr>
                    <td>Theory Hours</td>
                    <td align="right"><input type="number" placeholder="Range 0 - 10" min="0" max="10" name="cthhrs" value="0" required></td>
                </tr>
                <tr>
                    <td>Practical Hours</td>
                    <td align="right"><input type="number" placeholder="Range 0 - 10" min="0" max="10" name="cprhrs" value="0" required></td>
                </tr>
                <tr>
                    <td>Tutorials Hours</td>
                    <td align="right"><input type="number" placeholder="Range 0 - 10" min="0" max="10" name="ctuthrs" value="0" required></td>
                </tr>
                <tr>
                    <td>Revision</td>
                    <td align="right">
                        <select name="crev" id="crev" size=1 required>
_END;
                        loadYear(2009);
echo <<<_END
                        </select>
                    </td>
                </tr>                    
                <tr>
                    <td colspan=2 align="center"><input type="submit" class="button" value="Create Course"></td>
                </tr>
            </table>
          </center>
        </form>
      </div>
    </div>                    
_END;
}
else {
      echo '<br><br><span class="error">Access Denied! You are not authorized to view this section</span>';    
}

}

 else echo'<br><br><span class="error">Please sign up and/or login to use the system</span>';
 
        require_once 'functions/footer.php';
?>