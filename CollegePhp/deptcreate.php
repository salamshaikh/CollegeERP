<!DOCTYPE html>

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
    insertDept();

if($loggedin){
if($_SESSION['grid']==='3'||$_SESSION['grid']==='1'||$_SESSION['grid']==='9'){    
echo <<<_END
  <div class="container">
    <div id="left">
_END;
echo '<br><div id="datepicker" style="font-size:0.7em;"></div>';
echo '<br><br>Important Guidelines<br><br>'
     .$checkmark.' For Non Teaching departments Intake should be 0.<br><br>';
echo <<<_END
     
   </div>
    <div id="right">    

        <form method="post" action="deptcreate.php" onsubmit="return validateDept(this)">
         <center>
            <table cellspacing="10" cellpadding="4" border="0" bgcolor="#00eeee">
                <th colspan="2" align="center">Create Department</th>
                <tr>
                    <td>Department ID</td>
                    <td align="right"><input type="text" name="dept_id" placeholder="Ex: CO" maxlength="6" style="width:100%; margin:0;" required></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td align="right"><input type="text" name="dname" placeholder="Ex: COMPUTER ENGG" maxlength="45" style="width:100%; margin:0;" required></td>
                </tr>
                <tr>
                    <td>HOD</td>
                    <td align="right"><select required name="dhod" style="width:100%; margin:0;">
                            <option value="NULL">-No HOD-</option>
_END;
                    loadFaculty();        
echo <<<_END
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Intake</td>
                    <td align="right"><input type="number" name="dintake" min="0" placeholder="Ex: 60" style="width:100%; margin:0;" required value="" required></td>
                </tr>
                <tr>
                    <td>Month & Year of<br>Establishment</td>
                    <td align="right"><input type="text" name="destd" placeholder="Ex: MARCH 2015" required value="" style="width:100%; margin:0;" required></td>
                </tr>
                <tr>
                    <td>Teaching<input type="radio" name="type" id="dteach" style="width:35%; vertical-align: middle; margin: 0px;" value="TEACHING" required><br></td>
                    <td style="text-align: right;">Non-Teaching<input type="radio" id="dnteach"  name="type" style="width:35%; vertical-align: middle; margin: 0px;" value="NON TEACHING" required></td>
                </tr>    
                <tr>
                    <td colspan=2 align="center"><input type="submit" class="button" value="Create"></td>
                </tr>
            </table>
         <center>
        </form>
        </div>
       </div>             
_END;
}
 else {
      echo '<br><br><center><span class="error">Access Denied! You are not authorized to view this section</span></center>';    
}

}

 else echo'<br><br><span class="error">Please sign up and/or login to use the system</span>';
require_once 'functions/footer.php';
?>
