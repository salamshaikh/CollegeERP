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
*   Created On: 30 May, 2015, 2:44:51 PM
*   Author: Muhammed Salman Shamsi
*/
require_once 'functions/header.php';
        
if($loggedin){
    if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'){
        
    insertCASheets();
echo <<<_END
   
<div class="container">
<div id="left">
_END;
echo 'Date: '.date("d/m/Y");
echo '<br><br>Important Guidelines<br><br>'
     .$checkmark.' Only the components which are checked are included in termwork.<br><br>'
     .$checkmark.' Weightage Should be as per the university strictly.<br><br>'
     .$checkmark.' Total Count means the total number of experiments/assignment/twcomponent you are going to take.<br><br>'
     .$checkmark.' If count is given in the syllabus than that has to be followed strictly.<br><br>'
     .$checkmark.' Before updating / viewing a sheet it has to be created first.<br><br>'
     .$checkmark.' A sheet can be created only once.<br><br>'
     .$checkmark.' On update page marks should be assigned out of weightage of respective component.<br><br>'
     .$checkmark.' The respective weightage is given in the bracket after the component name.<br><br>'
     .$checkmark.' Once you have put up the marks and updated the sheet, the same cannot be modified later.<br><br>';
        
echo <<<_END
   </div>
    <div id="right">
   <form method="post" id="form1">
          <center>
            <table cellspacing="10" cellpadding="4" border="0" bgcolor="#00eeee">
                <th colspan="2" align="center">Continous Assesment Criteria</th>
                <tr>
                    <td>Select Course</td>
                    <td align="right">
                        <select name="cacourse" id="cacourse" class="teachcourse" required size="1">
_END;
                            loadTeachesCourse('0',academic_year());
echo <<<_END
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Current Year</td>
                    <td align="right">
                        <input type="text" name="cayear" id="cayear"  required value="
_END;
                        echo academic_year();
echo <<<_END
" readonly="true" />
                    </td>
                </tr>
                <tr>
                   <td width="50%" align="center"><input type="button" style="width:100%; margin:0;" class="button" name="viewca" id="viewca" onclick="submitForm('viewca.php')" value="View CA"></td>
                   <td width="50%" align="center"><input type="button" style="width:100%; margin:0;" class="button" name="updateca" id="updateca" onclick="submitForm('updateca.php')" value="Update CA" /></td>
                </tr>
        
                <tr>
                    <td colspan="2">Check only if you want to create Continous Assesment Sheets 
                            <input type="checkbox" id="twcreatecheck" name="twcreatecheck" style="vertical-align: middle; width:15%; margin: 0px; padding: 0;  height:13px"/></td></tr>
_END;
                 $result=  queryMysql("select * from TwComponents");
                 while ($row = mysql_fetch_array($result)) {
                     echo '<tr>';
                     echo '<td><label width="25%">'.$row['components'].'</label>'
                             . '<input type="checkbox" class="twcheck" name="'.$row['compo_id'].'" style="vertical-align: middle; float:right; width:25%; margin: 0px; padding: 0;  height:13px" value="'.$row['compo_id'].'" disabled="true"></td>';
                     echo '<td><input type="number" disabled="true" class="twweight" min="5" max="40"  placeholder="Weightage" name="weight_'.$row["compo_id"].'" style="width:49%; border: 1; text-align: center;"/>';
                     echo '&nbsp<input type="number" disabled="true" class="twcount" min="1" max="25" placeholder="Total Count" name="compo_nos_'.$row["compo_id"].'" style="width:49%; border: 1; text-align: center;"/></td>';
                     echo '</tr>';
                 }
echo <<<_END
                <tr>
                    <td width="50%" align="center" colspan="2"><input type="button" style="width:100%; margin:0;" class="button" name="createca" id="createca" onclick="submitForm('CA.php')" value="Create CA Sheets" /></td>
                </tr>        
            </table>
                            <input type="hidden" name="title" id="title" value=""/>
_END;
                            echo '<input type="hidden" name="ffac_id" id="ffac_id" value="'.$_SESSION['fac_id'].'">';
echo <<<_END
   
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

 else echo'<br><br>Please sign up and/or login to use the system';
    require_once 'functions/footer.php';
?>