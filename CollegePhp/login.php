<?php ob_start();
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

require_once 'functions/functions.php';
require_once 'functions/header.php';


if($_POST)
{
 if(!$loggedin)
 {
    
    $error=$user=$pass="";    
 if (isset($_POST['username']))
  {
      
    $user = sanitizeString($_POST['username']);
    $pass = sanitizeString($_POST['pass']);
     
    if ($user == "" || $pass == "")
        $error = "<center>Not all fields were entered<br></center>";
    else
    {
      $s1="su*!#er";
      $s2="ts&a@s#";
      $token= hash('ripemd128', "$s1$pass$s2");  
      $result = queryMySQL("SELECT userid,fac_id,grid FROM Access
        WHERE userid='$user' AND pass='$token'");
      $row = mysql_fetch_array($result);
      
      if (!$row)
      {
        $error = "<br><br><center><span class='error'>Username/Password
                  invalid</span><br><br></center>";
        echo ''.$error;
      }
      else
      {
        insertAccessInfo($user);  
        $_SESSION['user'] = $row['userid'];
        $_SESSION['fac_id']=$row['fac_id'];
        $_SESSION['grid'] = $row['grid'];
        $sessionfac_id=$row['fac_id'];
        $loggedin=TRUE;
        echo "<br><center><div class='main'>You are now logged in.<br>"
            . "You are now being redirected to home page."
            . "<a href='index.php' style='font-size:1em; color:white;'>Click here</a> to redirect manually.<br><br></div></center>";
        
        header("Refresh: 1; url=index.php");
        exit();
      }
    }
  }
 }


 
}
ob_end_flush(); ?>
<?php
if(!$loggedin)
{
echo '<div id="container">';      
echo "<center><h3>Please enter your details to log in.</h3></center>";
echo <<<_END
<form method="post" action="login.php">
          <center>
            <table class="shadowbox" cellspacing="10" cellpadding="8" width="25%" border="0" bgcolor="#00eeee">
                <tr><th colspan="2" align="center">Login</th></tr>
                <tr><td colspan="2" align="center"><img src='images/college_logo.png' width='70px' height='70px'></td></tr>
                <tr>
                    <td colspan="2"><input type="text" name="username" placeholder="Username" style="width:100%; margin:0;" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="password" name="pass" placeholder="Password" style="width:100%; margin:0;"  required></td>
                </tr>
                <tr>
                    <td colspan=2 align="center"><input type="submit" class="button" value="Sign In"></td>
                </tr>
            </table><br><br>
          </center>
        </form>
<br>
</div>
_END;
}
else {
     echo "<div class='main'><h3>You are already logged In as ".$user.
          ".\nPlease <a href='logout.php'>Log Out</a> to Sign In as different User </h3></div>";

     header("Refresh: 1; url=index.php");
     //exit();
}
require_once 'functions/footer.php'; 
?>