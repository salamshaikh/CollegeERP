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
*   Author: MUhammed Salman Shamsi
*/

require_once 'functions/header.php';
if($loggedin){
    if($_SESSION['grid']==='3'||$_SESSION['grid']==='9'){
insertUser();  
echo <<<_END
 <div class="container">

    <div id="left">
_END;
echo '<br><div id="datepicker" style="font-size:0.7em;"></div>';
echo '<br><br>Important Guidelines<br><br>'
     .$checkmark.' All username\'s should follow a standard naming scheme.<br><br>'
     .$checkmark.' Please do not assign username randomly.<br><br>'
     .$checkmark.' It is recommended that username is based on First Name and Surname of person seprated by period ( . ).<br><br>'
     .$checkmark.' Password should be minimum of 8 characters and must have atleast one of each of the following'
        . '<br>UPPERCASE alphabet,lowercase alphabet,digits and special characters such as @ # $ & * ! etc .<br><br>';
echo <<<_END
   </div>
    <div id="right">    

        <form method="post" action="createuser.php" onsubmit="return validateUser(this)">
        <center>
        <table cellspacing="10" cellpadding="4" border="0" bgcolor="#00eeee">
            <th colspan="2" align="center">Create Account</th>
            <tr>
              <td>Select Department</td>
              <td align="right"><select name="cudept" class="facstaffdept" size="1" required>
_END;
    loadDept(1);
echo <<<_END
                  </select><br><br>
              </td>
            </tr>
            <tr>
                <td>Select Faculty/Staff</td>
                <td align="right"><select name="cufsname" class="facstaff" size="1" required>
                    <option value="">-----</option>
                    </select><br><span id="cufserr"></span></td>
            </tr>
            <tr>
                <td>Enter Username</td>
                <td align="right"><input type="text" placeholder="Min 5 characters" id="user" name="user" disabled="true" required><br><span id="usererr"></span></td>
            </tr>
            <tr>
                <td>Enter Password</td>
                <td align="right"><input type="password" placeholder="Min 8 characters" id="pass" name="pass" required></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td align="right"><input type="password" id="cpass" placeholder="Repeat Password" name="cpass" required><br><span id="cpasserr"></span></td>
            </tr>
            <tr>
              <td>Select Type</td>
              <td align="right"><select name="cutype" id="cutype" size="1" required>
_END;
loadGroup();
echo <<<_END
                  </select><br><br>
              </td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit" class="button" value="Create Account"></td> 
            </tr>
        </center>
        </table>
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
        
