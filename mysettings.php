<?php 

include 'dbc.php';
page_protect();

$err = array();
$msg = array();

if($_POST['doUpdate'] == 'Update')  
{
$rs_pwd = mysql_query("select password from user where email='$_SESSION[email]'");
list($old) = mysql_fetch_row($rs_pwd);
//$old_salt = substr($old);

//check for old password in md5 format
	if($old === PwdHash($_POST['pwd_old']))
	{
	$newsha1 = PwdHash($_POST['pwd_new']);
	mysql_query("update user set password='$newsha1' where email='$_SESSION[email]'");
	$msg[] = "Your new password is updated";
	//header("Location: mysettings.php?msg=Your new password is updated");
	} else
	{
	 $err[] = "Your old password is invalid";
	 //header("Location: mysettings.php?msg=Your old password is invalid");
	}

}

?>
<html>
<head>
<title>My Account Settings</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>
  <script>
  $(document).ready(function(){
    $("#myform").validate();
	 $("#pform").validate();
  });
  </script>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr> 
    <td width="160" valign="top"><?php 

if (isset($_SESSION['user_name'])) {?>
<div class="myaccount">
  <p><strong>My Account</strong></p>
  <a href="library.php">My Account</a><br>
  <a href="mysettings.php">Settings</a><br>
    <a href="logout.php">Logout </a>
  </div>
<?php } 

?>

      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="732" valign="top">
<h3 class="titlehdr">User Account - Settings</h3>
      <p> 
        <?php	
	if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "* Error - $e <br>";
	    }
	  echo "</div>";	
	   }
	   if(!empty($msg))  {
	    echo "<div class=\"msg\">" . $msg[0] . "</div>";

	   }
	  ?>
      </p>
      <p>Please note that you will not be able to change your email which has been already registered.</p>

      <h3 class="titlehdr">Change Password</h3>
      <p>In order to do change your password, please input your old and new password 
        to make changes.</p>
      <form name="pform" id="pform" method="post" action="">
        <table width="80%" border="0" align="center" cellpadding="3" cellspacing="3" class="forms">
          <tr> 
            <td width="31%">Old Password</td>
            <td width="69%"><input name="pwd_old" type="password" class="required password"  id="pwd_old"></td>
          </tr>
          <tr> 
            <td>New Password</td>
            <td><input name="pwd_new" type="password" id="pwd_new" class="required password"  ></td>
          </tr>
        </table>
        <p align="center"> 
          <input name="doUpdate" type="submit" id="doUpdate" value="Update">
        </p>
        <p>&nbsp; </p>
      </form>
      <p>&nbsp; </p>
      <p>&nbsp;</p>
	   
      <p align="right">&nbsp; </p></td>
    <td width="196" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>

</body>
</html>
