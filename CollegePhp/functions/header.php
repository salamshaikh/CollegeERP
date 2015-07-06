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

session_start();
echo "<!DOCTYPE html>\n<html>\n<head><meta charset='UTF-8'>";

require_once 'functions/functions.php';

$userstr='(Guest)';

if(isset($_SESSION['user']))
{
    $user=$_SESSION['user'];
    $loggedin=TRUE;
    $userstr="($user)";
}
 else $loggedin=FALSE;
  
echo "<title>$appname$user</title>".
     "<link rel='stylesheet' href='/CollegePhp/style/coresheet.css' type='text/css' />".
     "<script src='/CollegePhp/jquery/jquery-1.11.2.js'></script>".
     "<script src='/CollegePhp/jquery/jquery-ui-1.11.4/jquery-ui.js'></script>".
     "<script src='/CollegePhp/scripts/assigndependent.js'></script>".
     "<script src='/CollegePhp/scripts/validate_functions.js'></script>".
     "<script src='/CollegePhp/scripts/validate.js'></script>".
     "<script src='/CollegePhp/scripts/misc.js'></script>".
     " <noscript>
      Your browser doesn't support or has disabled JavaScript
    </noscript>". 
     "<noscript><meta http-equiv='refresh' content='0;url=/CollegePhp/nojs.php'></noscript>".   
     "</head><body>".
     "<div id='header'><div class='hcontainer'>"
        . "<div id='logo-image'>"
        . "<img src='/CollegePhp/images/erp_logo.png' style='width:4.6em; height:4.6em;'></div>"
       // . "<div id='logo-image'>"
       // . "<img src='/CollegePhp/images/college_logo.png' style='border-radius:4px;' width='100px' height='100px'></div>"
        . "<div id='colname'>".$appname."<br>".$colname."</div></div>";
        
if($loggedin){
    echo "<ul class='menu'><span id='headerapp'>$appname$userstr</span>&nbsp;&nbsp;"
            ."<a class='menubtn' href='/CollegePhp/logout.php' style='color:white; font-weight:bold;'>Logout</a>" 
            ."<a class='menubtn' href='/CollegePhp/index.php' style='color:white; font-weight:bold;'>Home</a>"
            . "<a class='menubtn' href='/CollegePhp/contact.php' style='color:white; font-weight:bold;'>Contact Us</a>"
            . "</ul>".
        "<link rel='stylesheet' href='/CollegePhp/jquery/jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css' type='text/css' />".   
     
     "<script>$(function() { $('.datepicker').datepicker({"
        ."      dateFormat    : 'dd/mm/yy',"
        ."      changeMonth: true,"
        ."      changeYear: true,"
        . "     yearRange:  '-30:+0'"
       // . "     yearRange:  '1985:'+(new Date).getFullYear()"
        //."      format     : 'yy/mm/dd'"
        . "});});</script>";
     echo '<script>$(function(){$("#datepicker").datepicker();});</script>';
}
echo '</div>';
$checkmark='<span class="checkmark"><div class="checkmark_circle"></div><div class="checkmark_stem"></div>
    <div class="checkmark_kick"></div></span>';

    echo "<br><div class='banner'>Welcome to $appname</div>";
?>