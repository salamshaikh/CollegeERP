<?php
/*                                             License
*  The following license governs the use of CollegeERP in academic and educational environments. Commercial use requires a commercial license from Muhammed Salman Shamsi.
*  ACADEMIC PUBLIC LICENSE
*  Copyright (C) 2014 - 2015  Muhammed Salman Shamsi.
*   FOR DETAILED TERMS AND CONDITION SEE LICENSE.TXT FILE
*   NO WARRANTY
*   BECAUSE THE PROGRAM IS LICENSED FREE OF CHARGE, THERE IS NO WARRANTY FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW. EXCEPT WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES PROVIDE THE PROGRAM "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU. SHOULD THE PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION.
*   IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED ON IN WRITING WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MAY MODIFY AND/OR REDISTRIBUTE THE PROGRAM AS PERMITTED ABOVE, BE LIABLE TO YOU FOR DAMAGES, INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING OUT OF THE USE OR INABILITY TO USE THE PROGRAM INCLUDING BUT NOT LIMITED TO LOSS OF DATA OR DATA BEING RENDERED INACCURATE OR LOSSES SUSTAINED BY YOU OR THIRD PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER PROGRAMS), EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.
*   END OF TERMS AND CONDITIONS
*   [license text: http://www.omnetpp.org/intro/license]   
*/
require_once 'functions/header.php';
        
if($loggedin){
    if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='7'||$_SESSION['grid']==='2'){
             
echo <<<_END
   <div class="container">
    <div id="left">
_END;
echo '<br><div id="datepicker" style="font-size:0.7em;"></div>';
echo <<<_END
   </div>
    <div id="right">    
         
        <form method="post" id="form1">
          <center>
            <table cellspacing="10" cellpadding="4" border="0" bgcolor="#00eeee">
                <th colspan="2" align="center">Syllabus Criteria</th>
                <tr>
                    <td>Select Course</td>
                    <td align="right">
                        <select name="fscourse" id="fscourse" required size="1">
_END;
                            loadCourse();
echo <<<_END
                        </select>
                    </td>
                </tr>
                <tr>
                   <td width="50%" align="center"><input type="button" style="width:100%; margin:0;" class="button" name="updatesy" id="updatesy" onclick="submitForm('updatesy.php')" value="Update Syllabus" /></td>
                   <td width="50%" align="center"><input type="button" style="width:100%; margin:0;" class="button" name="viewsy" id="viewsy" onclick="submitForm('viewsy.php')" value="View Syllabus"></td>
                </tr>
            </table>
                            <input type="hidden" name="fstitle" id="fstitle" value=""/>
          </center>
        </form>
       </div>
       </div>    
_END;
}    
else {
      echo '<br><br><center><span class="error">Access Denied! You are not authorized to view this section</span></center>';    
}

}

 else echo'<br><br><center><span class="error">Please sign up and/or login to use the system</span></center>';
    
    require_once 'functions/footer.php';
?>