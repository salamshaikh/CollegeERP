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
*   Created On: 6 Jul, 2015, 9:00:55 AM
*   Author: Muhammed Salman Shamsi
*/
require_once 'functions/header.php';
if($loggedin)
{ 
    if($_SESSION['grid']==='3'||$_SESSION['grid']==='6'){
          insertGrade ();
echo <<<_END
    <div class="container">
    <div id="left">
_END;
echo '<br><div id="datepicker" style="font-size:0.7em;"></div>';
echo '<br>Important Guidelines<br>';
echo '<br>'.$checkmark.' Please fill this form very carefully.<br>'
        .'<br>'.$checkmark.' Marks Fields which are not applicable should be assigned value -1.<br>'   
        .'<br>'.$checkmark.' Check the form before submitting for correctness.<br>'
        .'<br>'.$checkmark.' Modification will not be allowed further.<br>';

echo <<<_END
   </div>
    <div id="right">    
     <center>    
        <form method="post" action="grade.php" onsubmit="return validateGrade(this)">
                <table cellspacing=10 cellpadding=4>
                <tr>
                    <th colspan=2 align="center">Semester Examination Entry</th>
                </tr>
                <tr>
                    <td>Previous Year</td>
                    <td>
                        <input type="text" name="gyear" id="gyear" readonly="true" required="true" value="
_END;
                            echo prev_academic_year();
echo <<<_END
">   
                    </td>
                </tr>
                <tr>
                    <td>Select Department</td>
                    <td><select name="gdept" id="gdept" required>
_END;
                        loadDept(1);
echo <<<_END
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Select Semester</td>
                    <td><select name="gsem" id="gsem"  required>
_END;
                         loadSem();
echo <<<_END
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Select Roll No</td>
                    <td>
                        <select name="groll" id="groll" required>
                        </select>   
                    </td>
                </tr>
                <tr>
                    <td>Seat Number</td>
                    <td align="right">
                        <input type="text" placeholder="Exam Seat No." name="gseat" id="gseat" value="" required/>
                    </td>    
                </tr>         
                <tr>
                    <td>Select Course</td>
                    <td align="right">
                        <select name="gcourse" id="gcourse" required>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Practical Marks</td>
                    <td align="right">
                        <input type="number" placeholder="PR" min="-1" max="50" name="gpr" required>
                    </td>
                </tr>
                <tr>
                    <td>Oral Marks</td>
                    <td align="right">
                        <input type="number" placeholder="OR" min="-1" max="50" name="gor" value="" required>
                    </td>
                </tr>
                <tr>
                    <td>Theory Marks</td>
                    <td align="right">
                        <input type="number" placeholder="TH" min="-1" max="100" name="gth" value="" required>
                    </td>
                </tr>
                <tr>
                    <td>Term Work Marks</td>
                    <td align="right">
                        <input type="number" placeholder="TW" min="-1" max="50" name="gtw" value="" required>
                    </td>
                </tr>
                <tr>
                    <td>Internal Assessment Marks</td>
                    <td align="right">
                        <input type="number" placeholder="IA" min="-1" max="20" name="gia" value="" required>
                    </td>
                </tr>
                                    
                <tr>
                    <td colspan=2 align="center"><input type="submit" class="button" value="Submit"></td>
                </tr>
            </table>
        </form>
      </center>
    </div>
   </div>     
_END;
}
else {
      echo '<br><center><span class="error">Access Denied! You are not authorized to view this section</span></center><br>';    
      header("Refresh: 1 ;url=index.php");
      
}

}

 else{
     echo'<br><center><span class="error">Please sign up and/or login to use the system</span></center><br>';
     header("location: login.php");
 }
 
        require_once 'functions/footer.php';
?>                            