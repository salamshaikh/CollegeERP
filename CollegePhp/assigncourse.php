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
    if($_SESSION['grid']==='3'||$_SESSION['grid']==='7'||$_SESSION['grid']==='2'){
        assignCourse();
echo <<<_END
<div class="container">
    <div id="left">
_END;
echo '<br><div id="datepicker" style="font-size:0.7em;"></div>';
echo <<<_END
   </div>
    <div id="right">    
    
<form method="post" action="assigncourse.php"onsubmit="return validateAssignCourse(this)">
          <center>
            <table cellspacing="8" cellpadding="4" border="0" bgcolor="#00eeee">
                <th colspan="2" align="center">Assign Course</th>
<!-- comment start               <tr>
                    <td>Select Department</td>
                    <td align="right"><select name="adept" id="adept" required size="1">
_END;
                        loadDept(1);
                                                
echo <<<_END
                        </select>
                    </td>
                </tr>
comment end --!>                        
                <tr>
                    <td>Select Faculty</td>
                    <td align="right">
                        <select   name="afaculty" id="afaculty" required size="1" >
_END;
                        loadFaculty(1);
                                                
echo <<<_END
                        </select>
                    </td>   
                </tr>
                <tr>
                    <td>Course Semester</td>
                    <td align="right"><select name="asem" id="asem" size=1  required >
_END;
                        loadSem();
echo <<<_END
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Course Department</td>
                    <td align="right"><select name="acdept" id="acdept" required size="1">
_END;
                           loadDept(1);
echo <<<_END
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Select Course</td>
                    <td align="right">
                        <select   name="acourse" id="acourse" required size="1" >
                            </select>
                    </td>
                </tr>
                <tr>
                    <td>Year</td>
                    <td align="right">
                        <input type="text" name="ayear" required value="
_END;
                        echo academic_year();
echo <<<_END
" readonly="true"/>   
                    </td>
                </tr>
                <tr>
                    <td>Theory<input type="radio" name="abit" id="ath" class="aThorPr" style="vertical-align: middle; margin: 0px;" value=1 required><br></td>
                    <td style="text-align: right;">Practical<input type="radio" id="apr"  name="abit" class="aThorPr" style="width:35%; vertical-align: middle; margin: 0px;" value=0 required></td>
                </tr>
                <tr>
                    <td>Number of Hours </td>
                    <td align="right"><input type="number" name="ahours" id="ahours" min="1" required readonly="true"></td>
                </tr>    
                <tr>
                    <td>B1<input type="checkbox" class="acheck" disabled="disabled" id="ab1" name="ab1" style="vertical-align: middle; margin: 0px;" value="1"/></td>
                    <td align="right">B2<input type="checkbox" class="acheck" disabled="disabled" id="ab2" name="ab2" style="vertical-align: middle; margin: 0px;" value="1"/></td>
                </tr>
                <tr>
                    <td>B3<input type="checkbox" class="acheck" disabled="disabled" id="ab3" name="ab3" style="vertical-align: middle; margin: 0px;" value="1"/></td>
                    <td align="right">B4<input type="checkbox" class="acheck" disabled="disabled" id="ab4" name="ab4"style="vertical-align: middle; margin: 0px;" value="1"/></td>
                </tr>
                <tr>
                    <td colspan=2 align="center"><input type="submit" class="button" value="Assign Course"></td>
                </tr>
            </table>
              <input type="hidden" name="ab0" id="ab0" value="0" />
          </center>
        </form>
     </div>
    </div>
                        
_END;
}
else {
      echo '<br><br><font color="red">Access Denied! You are not authorized to view this section</font>';    
}

}

else echo'<br><br>Please sign up and/or login to use the system';   

require_once 'functions/footer.php';
?>