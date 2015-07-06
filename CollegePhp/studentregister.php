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
    if($_SESSION['grid']==='3'||$_SESSION['grid']==='7'||$_SESSION['grid']==='8'){

        insertStudent();
?>   
<div class="container">
    <div id="left">
        <?php
        echo '<br><div id="datepicker" style="font-size:0.7em;"></div>';
        echo '<br><br><h4><center>Important Guidelines</h4><br></center>'
        .$checkmark.' Please Verify the data before submitting the form<br><br>'
        .$checkmark.' Name should be written in following sequence<br>Surname FirstName MiddleName<br><br>'
        .$checkmark.' Please provide correct Phone / Mobile Number<br>It will be verified<br><br>'
        .$checkmark.' Please provide correct and working E-mail ID<br>It is very important for online communication.<br><br>'
         .$checkmark.'Disciplinary action will be taken if information is found to be Incorrect.<br><br>';?>
    </div>
    <div id="right">   
     <form method="post" action="studentregister.php" onsubmit="return validateStudent(this)">
        <center>
         <table cellspacing="10" cellpadding="2" border="0" bgcolor="#00eeee">
           <th colspan="2" align="center">Student Registration</th>
            
           <tr> 
                <td>Roll no</td>
                <td align="right"><input type="text" tabindex="1" maxlength="10" placeholder="Your Roll No, Ex: 14CO00" name="srollno" required></td>
           </tr>
           <tr>
                <td>Name</td>
                <td align="right"><input type="text" tabindex="2" maxlength="45" name="sname" placeholder="Your full Name [Surname First]" required></td>
           </tr>    
           <tr>
                <td>Permanent Address</td>
                <td align="right">
                    <textarea tabindex="3" rows="3" cols="23" class="peradd" maxlength="150" style=" height: auto;" name="saddress" placeholder="Your Permanent Address" wrap="soft" required></textarea></td>  
           </tr>
            <tr>
                <td align="right" colspan="2">Same as above
                <input type="checkbox" name="cfaddcheck" class="addcheck" style="width:15%; vertical-align: middle; margin: 0px; padding: 0;  height:13px"></td>
           </tr>
           <tr>
                <td>Residential Address</td>
                <td align="right">
                    <textarea tabindex="3" rows="3" cols="23" class="resiadd" maxlength="150" style=" height: auto;" name="sraddress" placeholder="Your Residential Address" wrap="soft" required></textarea></td>  
           </tr>
           <tr> 
                <td>Semester</td>
                <td align="right"><select tabindex="4" name="ssem" size=1  required>
                        <?php                        loadSem()?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Date of Admission</td>
                <td align="right"><input type="text" tabindex="5" class="datepicker" placeholder="dd/mm/yyyy" name="sdoa" required ></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td align="right"><input type="text" tabindex="6" class="datepicker" placeholder="dd/mm/yyyy" name="sdob" required ></td>
            </tr>
            <tr>
                <td>Your Mobile Number</td>
                <td align="right"><input type="tel" tabindex="7" maxlength="12" placeholder="10/12 Digits Phone/Mobile No." name="sphoneno" id="sphoneno" required>
                    <br><span id="sphoneerr"></span>
                </td>
            </tr> 
            <tr>
                <td>Parents Mobile Number</td>
                <td align="right"><input type="tel" tabindex="8" maxlength="12" placeholder="10/12 Digits Phone/Mobile No." name="spphoneno" id="spphoneno" required>
                    <br><span id="spphoneerr"></span>
                </td>
            </tr> 
            <tr>
                <td>Department</td>
                <td align="right"><select name="sdept"  tabindex="9" size="1" required>
                        <?php loadDept(1)?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td align="right"><input type="email" tabindex="10" maxlength="45" name="semail" Placeholder="example@example.com" required></td>
                
            </tr>
            <tr>
                    <td>Current Year</td>
                    <td align="right">
                        <input type="text" name="syear" required readonly="true" value="<?php echo academic_year(); ?>"/>
                       
                    </td>
            </tr>
            <tr>
                    <td>Select Batch</td>
                    <td align="right">
                        <select name="sbatch" tabindex="11" required>
                            <option value="">------</option>
                            <option value="1">B1</option>
                            <option value="2">B2</option>
                            <option value="3">B3</option>
                            <option value="4">B4</option>
                        </select>   
                    </td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit" tabindex="12" class="button" value="Register"></td>
            </tr>
           </table>
            
        </center>
     </form>
    </div></div>
<?php }
 else {echo '<br><br><center><span class="error">Access Denied! You are not authorized to view this section</span></center>';}
}
else {
      echo'<br><br><center><span class="error">Please sign up and/or login to use the system</span></center>';
}
     require_once 'functions/footer.php'; 
?>