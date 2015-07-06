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
*/
include('../mpdf/mpdf.php');

require_once 'functions/header.php';  

if($loggedin)
{    
if($_POST){
    if(isset($_POST['pdept'])&& isset($_POST['psem'])&& isset($_POST['pyear'])&& isset($_POST['pssem'])&& isset($_POST['psyear']) ){
        $pdept=$_POST['pdept'];
        $psem=$_POST['psem'];
        $pyear=$_POST['pyear'];
        $pssem=$_POST['pssem'];
        $psyear=$_POST['psyear'];
        //$query="select rollno from Student where dept='".$pdept."' AND sem='".$psem."' AND year='".$pyear."'";
          
        if (is_array($_POST['rollno'])) {
               
            foreach($_POST['rollno'] as $value){
                    
                    $multi_sql_query="";
                    $takeserr=0;$testerr=0;$studenterr=0;
                
                    $query="select course_id from Course where dept='".$pdept."' AND sem='".$pssem."'";
                    $result= mysql_query($query);
                    if(!$result)    
                    {
                        echo 'Unable to Execute the Query:'.$query.
                        "\nRecieved following error".  mysql_error();
                        die();
                    }
                    while($row = mysql_fetch_array($result)){
                        $pscourse_id=$row['course_id'];
                        $multi_sql_query.="INSERT INTO Takes VALUES('$value','$pscourse_id','$psyear');";  
                    }
                    
                    $query="select course_id from Course where IA is not null and IA!=0 and IA!='' and dept='".$pdept."' AND sem='".$pssem."'";
                    $result= queryMysql($query);
                     
                    while($row = mysql_fetch_array($result)){
                        $pscourse_id=$row['course_id'];
                        $multi_sql_query.="INSERT INTO Test VALUES('$value','$pscourse_id','$psyear',NULL,NULL,NULL);";
                    }
                    $multi_sql_query.="update Student set sem='".$pssem."',year='".$psyear."' where rollno='".$value."';";
                    
                    $link = mysqli_connect("localhost","root","root","College");
    
                    if (mysqli_connect_errno()) {
                        printf("Connect failed: %s\n", mysqli_connect_error());
                        exit();
                    }
       
                    /* execute multi query */
            
                    //echo ''.$multi_sql_query;
                
                    if (mysqli_multi_query($link, $multi_sql_query)) {
                        echo '<br><font color="green">Record Successfully Updated for Roll no:-'.$value.'</font><br>';   
                    }
                    else {
                        echo "<br><font color='red'>INSERT/UPDATE Failed : ". mysqli_error($link)."</font><br>";
                        die();
                
                    }
                    exit;
                
                    /* close connection */
                    mysqli_close($link);
                    /* execute multi query */
            }
        }
    }
    else {
        echo '<span class="error">something is not set</span>';
    }       
}
 else {
    echo '<br><br><center><span class="error">POST not done</span></center>';
    header('Location:   filterpromote.php');
}

}
 else {
          echo'<br><br><center><span class="error">Please sign up and/or login to use the system</span></center>';
    
}
require_once 'functions/footer.php';
?>