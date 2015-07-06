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
*   Created On: 21 Jun, 2015, 12:02:04 PM
*   Author: Muhammed Salman Shamsi
*/
require_once 'functions/header.php';
if($loggedin){
    
    if($_SESSION['grid']!=='8'){
        changePass();
        $result=  queryMysql("select userid from Access where fac_id='".$_SESSION['fac_id']."'");
        while ($row = mysql_fetch_array($result)) {
            $userid=$row['userid'];
        }
echo <<<_END
            
<div class="container">
<div id="left">
_END;
echo '<br><div id="datepicker" style="font-size:0.7em;"></div>';
echo <<<_END
   </div>
    <div id="right">
        <form method="post" action="changepass.php" onsubmit="return validateUser(this)">
        <center>
        <table cellspacing="10" cellpadding="4" border="0" bgcolor="#00eeee">
            <th colspan="2" align="center">Change Password</th>
            <tr>
                <td>Username</td>
                <td align="right"><input type="text" id="user" name="user" readonly="true" required value="
_END;
echo $userid;
echo <<<_END
"></td>
            </tr>
            <tr>
                <td>Enter Old Password</td>
                <td align="right"><input type="password" id="oldpass" name="oldpass" required><br><span id="passerr"></span></td>
            </tr>
            <tr>
                <td>Enter New Password</td>
                <td align="right"><input type="password" placeholder="Min 8 characters" id="pass" name="pass" disabled="required" required></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td align="right"><input type="password" id="cpass" placeholder="Repeat Password" name="cpass" disabled="required" required><br><span id="cpasserr"></span></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit" class="button" style="width:100%; margin:0;" value="Change Password"></td> 
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

 else echo'<br><br>Please sign up and/or login to use the system';
require_once 'functions/footer.php';
?>
        
