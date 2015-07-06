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
    
 if($_SESSION['grid']==='3'||$_SESSION['grid']==='5'||$_SESSION['grid']==='2'){
updateTest();
echo <<<_END
    <div class="container">
        <div id="left">
_END;
echo '<br><div id="datepicker" style="font-size:0.7em;"></div>';
echo '<br><br>Important Guidelines<br>';
echo '<br>'.$checkmark.'Please check the test marks before making entry.<br>'
        . 'You are not allowed to make the changes once you have submitted the form.<br>'
           .'<br>'.$checkmark.'Following is the color coding scheme on form.<br>'
        .'<br>White --> Pass / Clear<br><br><font color="orange">Orange --></font> Requires 1 Mark to Pass / Clear Subject'
        . '<br><br><font color="red">Red --></font> Fail <br>';

echo <<<_END
   </div>
    <div id="right">    
_END;
    if($_POST){
        if(isset($_POST['tyear'])&& isset($_POST['tsub'])&& isset($_POST['title'])) {
        $tyear=$_POST['tyear'];;
        $tsub=$_POST['tsub'];
        $title=$_POST['title'];
        
        $query="select * from Takes natural join Test natural join (select rollno,name from Student)as s where year='".$tyear."' and course_id='".$tsub."'";
        
       if(!mysql_query($query)){
            echo "<br><font color='red'>Failed to execute query : ".  mysql_error()."</font><br>";
       
            die();
       }
       
        $result=  mysql_query($query); 
        if(mysql_num_rows($result)==0)
        {
            echo '<br><br><center><span class="error">No Records Found</span></center>';
        }
        else {
echo <<<_END
        <form method="post" id="form1" onsubmit="return validateTestMarks(this)">
          <center>
          <table cellspacing="8" cellpadding="2" border="0" bgcolor="#00eeee">
            <th colspan="5" align="center">Test Marks Form</th>
_END;
            echo '<tr><td colspan="5" align="center"><pre><b>Course:</b>'.$title.'    <b>Course ID:</b>'.$tsub.'    <b>Year:</b>'.$tyear.'</pre></td></tr>';            
echo <<<_END
            <tr>
                <th align="center"><b>Rollno</b></th>
                <th align="center"><b>Name</b></th>
                <th align="center"><b>T-1</b></th>
                <th align="center"><b>T-2</b></th>
                <th align="center"><b>AGG</b></th>
            </tr>
_END;
        while($row=  mysql_fetch_array($result))
        {
            echo '<tr>';
            echo '<td align="center"> <input type="text" class="tmroll" name="'.$row["rollno"].'" style="border: 0; background: transparent; text-align: center;" value="'.$row['rollno'].'" readonly="readonly" /></td>';
            echo '<td align="center"><textarea class="readonlytextarea" rows="2" name="'.$row["rollno"].'_name" readonly="readonly">'.$row['name'].'</textarea></td>';
            echo '<td align="center"><input type="text"  class="tmt1" name="'.$row["rollno"].'_t1" id="'.$row["rollno"].'_t1" value="'.$row['t1'].'" style="text-align: center;"';
            if($row['t1']!=NULL){
                echo  ' readonly="readonly"/></td>';
            }
            else {
                echo  '/></td>';
            }
            echo '<td align="center"><input type="text" class="tmt2" name="'.$row[rollno].'_t2" id="'.$row[rollno].'_t2" value="'.$row['t2'].'" style="text-align: center;"';
            if($row['t2']!=NULL){
                echo  ' readonly="readonly"/></td>';
            }
            else {
                echo  '/></td>';
            }
            $agg=  intval(round(($row[t1]+$row[t2])/2, 0, PHP_ROUND_HALF_UP));
            echo '<td align="center"><input type="text" class="tmagg" name="'.$row[rollno].'_agg" id="'.$row[rollno].'_agg" value="'.$agg.'" readonly="readonly"';
           if($agg< 7)
                echo  ' style="background-color: red; text-align: center;" /></td>';
           elseif($agg==7) 
                echo  ' style="background-color: orange; text-align: center;" /></td>';
            else 
                echo  ' style="background-color: white; text-align: center;" /></td>';
            echo '</tr>';
        }
        echo '<tr>'
        . '<td align="center" colspan="2"><input type="submit" class="button" style="width:100%; margin:0;" name="updatetm" id="updatetm" value="Update Marks" onclick="submitForm(\'tm.php\')"></td>'
                . '<td align="center" colspan="3"><input type="submit" class="button" style="width:100%; margin:0;" name="viewtm" id="viewtm" value="View in Printable Format" onclick="submitForm(\'viewtm.php\')"></td></tr>';
        echo '</table>';
        echo '</center>';
        echo '<input type="hidden" name="tmyear" value="'.$tyear.'"/>';
        echo '<input type="hidden" name="tmsub" value="'.$tsub.'"/>';
        echo '<input type="hidden" name="tyear" value="'.$tyear.'"/>';
        echo '<input type="hidden" name="tsub" value="'.$tsub.'"/>';
        echo '<input type="hidden" name="title" value="'.$title.'"/>';
        echo '</form>';
    }
   }
 }
else {
     echo '<br><span class="error">Data not posted</span>';
     header('Location:   index.php');
}
}
else {
      echo '<br><br><center><span class="error">Access Denied! You are not authorized to view this section</span></center>';    
}
echo '</div></div>';
}
 else echo'<br><br><center><span class="error">Please sign up and/or login to use the system</span></center>';
require_once 'functions/footer.php';
?>



