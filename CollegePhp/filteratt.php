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
if($loggedin)
{ 
    if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'){
             
echo <<<_END
    <div class="container">
    <div id="left">
_END;
echo '<br><div id="datepicker" style="font-size:0.7em;"></div>';
echo '<br>Important Guidelines<br>';
echo '<br>'.$checkmark.' It is MANADATORYto mark daily attendence record.<br>'
        .'<br>'.$checkmark.' If you don\'t fill this form daily, your lecture record will be lost.<br>'   
        .'<br>'.$checkmark.' After this page it is MANADATORY to MARK ATTENDENCE of students.<br>'
        .'<br>'.$checkmark.' If you abort process all the student will be marked present<br>';

echo <<<_END
   </div>
    <div id="right">    
            
        <form method="post" action="attendence.php" onsubmit="return confirm('After this page it is MANADATORY to MARK ATTENDENCE of students.You CANNOT Abort Process else no absentee will be marked for this lecture. Are you sure you want to proceed?')">
        <center>
        <table cellspacing="10" cellpadding="4" border="0" bgcolor="#00eeee">
            <th colspan="2" align="center">Attendence Selection</th>
            <tr>
              <td>Select Year</td>
              <td align="right"><input type="text" name="fyear" id="fyear" class="teachyear" size="1" required value="
_END;
                    echo academic_year();
echo <<<_END
" readonly="true"/>
              </td>
            </tr>
            <tr>
                <td>Select Subject</td>
                <td align="right">
                    <select name="fsub" id="fsub" class="teachsub" required>
_END;
                    echo loadTeachesCourse('none',academic_year());
echo <<<_END
                    </select>
                </td>
            </tr>        
            <tr>
                <td>Select Type</td>
                    <td align="right">
                        <select class="attendtype" name="fthpr" id="fthpr" required></select>
                    </td>
            </tr>        
            <tr>
                <td>Select Batch</td>
                <td align="right"><select name="fbatch" id="fbatch"required></select></td>
            <tr>
                <td>Date of Lecture</td>
                <td align="right"><input type="text"  name="fdol" readonly="true" required value="
_END;
echo date('d/m/Y');
echo <<<_END
"/>
                </td>
            </tr>
            <tr>
                <td>Time Slot</td>
                <td align="right">
                    <select name="fslot" id="fslot" size="1" required>
_END;
                    loadTimeSlot();
echo <<<_END
                    </select>
                </td>
            </tr>
            
            <tr>
                <td align="center" colspan="2"><input type="submit" class="button" value="Proceed"></td>
            </tr>
                    
           </table>
_END;
          echo '<input type="hidden" name="ffac_id" id="ffac_id" value="'.$_SESSION['fac_id'].'" />';
          echo '<input type="hidden" name="fnol" id="fnol" value="1" required />';  
          echo '</form>';
          echo '</center>';
          echo '</div>';
          echo '</div>';
    
             
     }
     else {
      echo '<br><br><center><span class="error">Access Denied! You are not authorized to view this section</span></center>';    
    }

}

 else{
     echo'<br><center><span class="error">Please sign up and/or login to use the system</span></center><br>';
 
     header('Location:  login.php');
 }
 
     require_once 'functions/footer.php';
?>

