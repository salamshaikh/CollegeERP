<?php
require_once 'functions/header.php';
insertFacultyStaff();
if($loggedin)
{
    if($_SESSION['grid']==='3'||$_SESSION['grid']==='2'||$_SESSION['grid']==='9'){
echo <<<_END
<div class="container">
    <div id="left">
_END;
echo '<br><div id="datepicker" style="font-size:0.7em;"></div>';
echo '<br><br>Important Guidelines<br><br>'
     .$checkmark.' Employee ID could be assigned as Faculty / Staff ID<br><br>'
     .$checkmark.' Name Should be written in following sequence.<br>FirstName MiddleName Surname<br><br>'
     .$checkmark.' Photo Should be of Passport size in .jpg/.png format only.<br><br>'
     .$checkmark.' Max photo upload size is 3MB.<br><br>';
echo <<<_END
   </div>
    <div id="right">    
      <form method="post" enctype="multipart/form-data" action="createfacultystaff.php"  onsubmit="return validateFaculty(this)">
        <center>
          <table cellspacing="8" cellpadding="2" >
            <tr>
            <th colspan="2" align="center">Faculty / Staff Registration</th>
            </tr>
            <tr>
                <td>Faculty/Staff ID</td>
                <td align="right"><input type="text" name="cfsfacid" placeholder="Alloted Unique ID" required></td>
            </tr>
            <tr>
                <td>Name</td>
                <td align="right"><input type="text" name="cfsname" placeholder="Your Full Name" required></td>
            </tr>
            <tr>
                <td>Job Type</td>
                <td align="right">
                    <select name="cfsjob"required size=1 required="true">
                        <option value="">------</option>
                        <option value="Jr. Clerk">Junior Clerk</option>
                        <option value="Sr. Clerk">Senior Clerk</option>
                        <option value="Assistant Professor">Assistant Professor</option>
                        <option value="Associate Professor">Associate Professor</option>
                        <option value="Professor">Professor</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Permanent Address</td>
                <td align="right">
                    <textarea placeholder="Your Full Permanent Address" class="peradd" rows=2 cols=23 required name="cfspaddress" wrap="soft"></textarea>  
            </tr>
            <tr>
                <td align="right" colspan="2">Same as above
                <input type="checkbox" name="cfaddcheck" class="addcheck" style="width:15%; vertical-align: middle; margin: 0px; padding: 0;  height:13px"></td>
            </tr>
            <tr>
                <td>Residential Address</td>
                <td align="right">
                    <textarea placeholder="Your Full Residential Address" class="resiadd" rows=2 cols=23 required name="cfsraddress" wrap="soft"></textarea>  
            </tr>
            <tr>
                <td>Phone Number (Primary)</td>
                <td align="right"><input type="tel" placeholder="10/12 Digits Mobile Number" maxlength="12" required name="cfsphonenop"></td>
            </tr>
            <tr>
                <td>Phone Number (Secondary)</td>
                <td align="right"><input type="tel" placeholder="Type Same as Above if N/A" maxlength="12" required name="cfsphonenos"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td align="right"><input type="email" placeholder="example@example.com" required name="cfsemail"></td>
            </tr>
            <tr>
                <td>Qualification</td>
                <td align="right"><select name="cfsqual" size=1 required="true">
                                    <option value="">------</option>
                                    <option value="SSC/Metric">SSC/Metric</option>
                                    <option value="HSC/Post Metric">HSC/Post Metric</option>
                                    <option value="B.Sc">B.Sc</option>
                                    <option value="B.Com">B.Com</option>
                                    <option value="B.A">B.A</option>
                                    <option value="B.E/B.Tech">B.E/B.Tech</option>
                                    <option value="B.C.A">B.C.A</option>
                                    <option value="M.Com">M.Com</option>
                                    <option value="M.Sc">M.Sc</option>
                                    <option value="M.C.A">M.C.A</option>
                                    <option value="M.E/M.Tech">M.E/M.Tech</option>
                                    <option value="P.hd">P.hd</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Experience</td>
                <td align="right"><input type="number" placeholder="Experience in Years" name="cfsexp" min="0" required></td>
            </tr>
            <tr>    
                <td>Date of Joining</td>  
                <td align="right"><input type="text" class="datepicker" placeholder="dd/mm/yyyy" name="cfsdoj"  required></td>
            </tr>
            <tr>
               <td>Date of Birth</td>
   <td align="right"><input type="text" class="datepicker" placeholder="dd/mm/yyyy" name="cfsdob" required></td>
            </tr>
            
            <tr>
                <td>Salary</td>
                <td align="right"><input type="number" name="cfssalary" min="0" placeholder="renumeration" required="true">&nbsp;
                    <!--<br><font size="2">[Please Enter NULL if Salary is not applicable.]</font></td>-->
            </tr>
            <tr>
                <td>Department</td>
                <td align="right">
                    <select name="cfsdept" required="true" size="1">
_END;
                    loadDept(1);
echo <<<_END
                    </select>
                </td>
            </tr>
            <tr>
                <td>Areas of Interest</td>
                <td align="right"><textarea name="cfareas" placeholder="values seprated by semicolon(;)" required="true"></textarea></td>
            </tr>
            <tr>
                <td>Upload Your Photo<br><font size="2">Max Size 3 MB</font></td>    
                <td align="right">
                    <input type="file" name="image" required="true"/></td>
            <tr>
                <td align="center" colspan=2"><input type="submit" class="button" value="Register"></td>
            </tr>
          </table>
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
 else echo'<br><br><span class="error">Please sign up and/or login to use the system</span>';
 
 
 require_once 'functions/footer.php';  
?>