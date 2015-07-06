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
assignCourseSlot();
if($loggedin)
{
    if($_SESSION['grid']==='3'||$_SESSION['grid']==='7'){
echo <<<_END
<div class="container">
    <div id="left">
_END;
echo '<br><div id="datepicker" style="font-size:0.7em;"></div>';
echo '<br><br>Important Guidelines<br>';
echo '<br>'.$checkmark.' If you select Practical option then the next sequential time slot is automatically assigned.'
        . ' Hence no need of seprate assignment for two slots in case of practicals';
echo <<<_END
   </div>
    <div id="right">    
        
    
        <form method="post" action="createtimetable.php" onsubmit="return confirm('Are you sure to proceed with assignment?. You CANNOT UNDO this operation.')">
          <center>
            <table cellspacing="10" cellpadding="4" border="0" bgcolor="#00eeee">
                <th colspan="2" align="center">ASSIGN SLOTS</th>
                
                <tr>
                    <td>Year</td>
                    <td align="right"><input type="text" name="cyear" id="cyear" value="
_END;
echo academic_year(); 
echo <<<_END
" required readonly="true"/>
                    </td>
                </tr>
                
                <tr>
                    <td>Select Department</td>
                    <td align="right"><select name="cdept" id="cdept" required size="1">
_END;
                        loadDept(1);
echo <<<_END
                        
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Select Semester</td>
                    <td align="right"><select name="csem" id="csem" size=1  required >
_END;
                        loadSem();
echo <<<_END
                        
                    </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Select Course</td>
                    <td align="right">
                        <select   name="ccourse" id="ccourse" required size="1" >
                        </select>
                    </td>
                </tr>
         
                <tr>
                    <td>Theory<input type="radio" class="attendtype" name="cthpr" style="width:50%; vertical-align: middle; margin: 0px;" value=1 required></td>
                    <td align="right">Practical<input type="radio" class="attendtype" name="cthpr" style="vertical-align: middle; width:30%; margin: 0px;" value=0 required></td>
                </tr>
                                
                <tr>
                    <td>Select Day</td>
                    <td align="right">
                        <select   name="cday" id="cday" required size="1" >
                            <option value="">------</option> 
                            <option value="MON">MONDAY</option>
                            <option value="TUE">TUESDAY</option>
                            <option value="WED">WEDNESDAY</option>
                            <option value="THU">THURSDAY</option>
                            <option value="FRI">FRIDAY</option>
                        </select>
                    </td>   
                </tr>
                
                <tr>
                    <td>Select Slot ID</td>
                    <td align="right">
                        <select   name="cslot" id="cslot" required size="1" >
_END;
                        loadTimeSlot();
echo <<<_END
                        </select>
                    </td>   
                </tr>
            
                <tr>
                    <td>Select Class Room</td>
                    <td align="right"><select name="croom" id="croom" required>
_END;
                        loadClassRoom(); 
echo <<<_END
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td colspan=2 align="center"><input type="submit" class="button" value="Assign Slot"></td>
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