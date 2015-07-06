<!DOCTYPE html>
<!--
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
-->
<?php 
        require_once 'functions/header.php';
if($loggedin){        
    if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'||
                     $_SESSION['grid']==='7'||$_SESSION['grid']==='1'||$_SESSION['grid']==='9'){
                     
?>
    <div class="container">
    <div id="left">
<?php
echo '<br><div id="datepicker" style="font-size:0.7em;"></div>';
?>
   </div>
    <div id="right">    
   
        <form method="post" action="studentinfo.php">
          <center>
            <table cellspacing="10" cellpadding="4" border="0" bgcolor="#00eeee">
                <th colspan="2" align="center">Get Students Information</th>
                <tr>
                    <td>Select Department</td>
                    <td align="right"><select name="fsidept" id="fsidept" required size="1">
                        <?php
                        loadDept(1);
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Select Semester</td>
                    <td align="right"><select name="fsisem" id="fsisem" size=1  required >
                        <?php loadSem()?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Semester Type</td>
                    <td align="right"><select name="fsihalf" required>
                            <option value="">------</option>
                            <option value="First Half">First Half(Even Semester)</option>
                            <option value="Second Half">Second Half(Odd Semester)</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Sem Start Year</td>
                    <td align="right">
                        <select name="fsiyear" required>
                            <?php loadYear(2014);?>
                        </select>   
                    </td>
                </tr>
                <tr><td>Select the information required</td> </tr>
                <tr>
                    
                    <td><input type="checkbox" name="fsirollno" style="vertical-align: middle; margin: 0px; padding: 0;  height:13px; width:10%;" checked="checked">Roll no</td>
                    <td><input type="checkbox" name="fsiname" style="vertical-align: middle; margin: 0px; padding: 0;  height:13px; width:10%;" checked="checked">Name</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="fsiaddress" style="vertical-align: middle; margin: 0px;  padding: 0;  height:13px; width:10%;" checked="checked">Address</td>
                    <td><input type="checkbox" name="fsidoa" style="vertical-align: middle; margin: 0px; padding: 0;  height:13px; width:10%;" checked="checked">DOA</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="fsidob" style="vertical-align: middle; margin: 0px; padding: 0;  height:13px; width:10%;" checked="checked">DOB</td>
                    <td><input type="checkbox" name="fsiphoneno" style="vertical-align: middle; margin: 0px;  padding: 0;  height:13px; width:10%;" checked="checked">Phone no</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="fsiemail" style="vertical-align: middle; margin: 0px; padding: 0;  height:13px; width:10%;" checked="checked">Email</td>
                    <td><input type="checkbox" name="fsipphoneno" style="vertical-align: middle; margin: 0px;  padding: 0;  height:13px; width:10%;" checked="checked">Parents Phone</td>
                </tr>

                <tr>
                    <td colspan=2 align="center"><input type="submit" class="button" value="Get Info"></td>
                </tr>
            </table>
          </center>
        </form>
    </div>
    </div>
<?php
 }
 else {
      echo '<br><br><center><span class="error">Access Denied! You are not authorized to view this section</span></center>';    
 }

}

 else echo'<br><br><center><span class="error">Please sign up and/or login to use the system</span></center>';
require_once 'functions/footer.php';?>