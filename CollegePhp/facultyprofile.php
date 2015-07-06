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
*   Created On: 24 Jun, 2015, 10:05:28 AM
*   Author: Muhammed Salman Shamsi
*/
require_once 'functions/header.php';
if($_POST){
updateFacultyProfile();}
if($loggedin)
{
    if($_SESSION['grid']==='3'||$_SESSION['grid']==='2'||$_SESSION['grid']==='5'){
echo <<<_END
<div class="container">
    <div id="left">        
_END;
echo '<br><div id="datepicker" style="font-size:0.7em;"></div><br>';
echo $checkmark."All Fields are Manadatory.<br><br>";
echo $checkmark."Please Enter 0 or N/A if Fields are not applicable.<br><br>";
$result=  queryMysql("select fp.*,name from FacultyProfile fp natural join Faculty f where fp.fac_id='".$_SESSION['fac_id']."'");       
echo <<<_END

   </div>
    <div id="right">    
      <form id="form1" method="post" enctype="multipart/form-data" action="facultyprofile.php">
        <center>
          <table cellspacing="8" cellpadding="2" border="0" bgcolor="#00eeee">
            <th colspan="2" align="center">Faculty Profile</th>
_END;
while ($row = mysql_fetch_array($result)) {
echo <<<_END
            <tr>
                <td>Faculty/Staff ID</td>
                <td align="right">
                    <input type="text" value="$row[fac_id]"name="fpfacid" readonly="true" required style="width:100%;margin:0;"></td>
            </tr>
            <tr>
                <td>Faculty/Staff Name</td>
                <td align="right">
                    <input type="text" value="$row[name]"name="fpname" readonly="true" required style="width:100%;margin:0;"></td>
            </tr>
            <tr>
                <td>UG Qualification<br>with Grade</td>
                <td align="right"><input type="text"  value="$row[ug]" name="fpug" placeholder="Ex: B.E. with First Class" required style="width:100%;margin:0;"></td>
            </tr>
            <tr>
                <td>PG Qualification<br>with Grade</td>
                <td align="right"><input type="text" value="$row[pg]" name="fppg" placeholder="Ex: M.E. with First Class" required style="width:100%;margin:0;"></td>
            </tr>
            <tr>
                <td>Ph.D Qualification<br>with Topic</td>
                <td align="right"><input type="text" value="$row[phd]" name="fpphd" placeholder="Ex: Ph.D in Computer Automated System" required style="width:100%;margin:0;"></td>
            </tr>
            <tr>
                <td>Teaching Experience<br>(In Years)</td>
                <td align="right"><input type="number" value="$row[exp_teach]" name="fptexp" min="0" step="any" required style="width:100%;margin:0;"></td>
            </tr>
            <tr>
                <td>Industry Experience<br>(In Years)</td>
                <td align="right"><input type="number" value="$row[exp_ind]" name="fpiexp" min="0" step="any" required style="width:100%;margin:0;"></td>
            </tr>
            <tr>
                <td>Paper Published National</td>
                <td align="right"><input type="number" value="$row[paper_national_pub]" name="fppaper_pub_nat" min="0" step="1" required style="width:100%;margin:0;"></td>
            </tr>
            <tr>
                <td>Paper Published International</td>
                <td align="right"><input type="number" value="$row[paper_international_pub]" name="fppaper_pub_int" min="0" step="1" required style="width:100%;margin:0;"></td>
            </tr>
            <tr>
                <td>Paper Presented National</td>
                <td align="right"><input type="number" value="$row[paper_national_presen]"name="fppaper_presen_nat" min="0"  step="1" required style="width:100%;margin:0;"></td>
            </tr>
            <tr>
                <td>Paper Presented International</td>
                <td align="right"><input type="number" value="$row[paper_international_presen]" name="fppaper_presen_int" min="0" step="1" required style="width:100%;margin:0;"></td>
            </tr>
            <tr>
                <td>Phd Project Guided</td>
                <td align="right"><input type="number" value="$row[proj_guide_phd]" name="fpphd_guide_proj" min="0" step="1" required style="width:100%;margin:0;"></td>
            </tr>
            <tr>
                <td>Master Level Project Guided</td>
                <td align="right"><input type="number" value="$row[proj_guide_master]" name="fpmaster_guide_proj" min="0" step="1" required style="width:100%;margin:0;"></td>
            </tr>
            <tr>
            <td>Books / IPRs / Patents</td>
            <td align="right">
                <textarea placeholder="Each Entry Seprated by Semicolon ;" rows=3 cols=23 required name="fpbooks_ipr" wrap="soft" style="width:100%;margin:0;">$row[book_ipr_patent]</textarea>  
            </td>
            </tr>
            <tr>
                <td>Professional Memberships</td>
                <td align="right">
                    <textarea placeholder="Ex: ISTE;IEEE;CSI" rows=3 cols=23 required name="fpprof_member" wrap="soft" style="width:100%;margin:0;">$row[prof_member]</textarea>
                </td>
            </tr>
            <tr>
                <td>Consultancy Activities</td>
                <td align="right">
                    <textarea placeholder="Each Entry Seprated by Semicolon ;" rows=3 cols=23 required name="fpconsultancy" wrap="soft" style="width:100%;margin:0;">$row[consultancy]</textarea>
                </td>
            </tr>
            <tr>
                <td>Awards</td>
                <td align="right">
                    <textarea placeholder="Each Entry Seprated by Semicolon ;" rows=3 cols=23 required name="fpawards" wrap="soft" style="width:100%;margin:0;">$row[awards]</textarea>
                </td>
            </tr>
            <tr>
                <td>Grants Fetched</td>
                <td align="right">
                    <textarea placeholder="Each Entry Seprated by Semicolon ;" rows=3 cols=23 required name="fpgrants" wrap="soft" style="width:100%;margin:0;">$row[grants]</textarea>
                </td>
            </tr>
            <tr>
                <td>Interaction with <br>Professional Institutions</td>
                <td align="right">
                    <textarea placeholder="Each Entry Seprated by Semicolon ;" rows=3 cols=23 required name="fpprof_inter" wrap="soft" style="width:100%;margin:0;">$row[prof_interaction]</textarea>
                </td>
            </tr>
            <tr>
                <td>Your Photo<br><font size="2">(3.5cm x 4.5cm)</font></td>    
                <td align="right">
_END;
                    displayImage($row[image_id]);
echo <<<_END
                </td>
            <tr>
_END;
}
echo <<<_END
            <tr>
                <td>Check to Update Photo</td> 
                <td><input type="checkbox" id="photocheck" name="photocheck" value="1" style="vertical-align: middle; width:15%; margin: 0px; padding: 0;  height:13px"/>
                </td>
            </tr>
            <tr>
                <td>Upload Your Photo<br><font size="2">Max Size 3 MB</font></td>    
                <td align="right">
                    <input id="fpphoto" type="file" name="image" style="width:100%;margin:0;" required="true" disabled="true"/>
                </td>
            <tr>
                <td align="center"><input type="button" class="button" id="fpupdate" name="fpupdate" onclick="submitForm('facultyprofile.php')" style="width:100%; margin:0;" value="Update"></td>
                <td align="center"><input type="button" class="button" id="fpview" name="fpview" value="View in Printable Format" style="width:100%; margin:0;"></td>
            </tr>
          </table>
          <input type="hidden" id="fac_id" name="fac_id" value="$_SESSION[fac_id]" />
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
