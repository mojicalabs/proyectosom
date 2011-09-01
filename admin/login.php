<?php require_once('../Connections/tarifasrd.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['nombreUsuario'])) {
  $loginUsername=$_POST['nombreUsuario'];
  $password=$_POST['claveUsuario'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "menu.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_tarifasrd, $tarifasrd);
  
  $LoginRS__query=sprintf("SELECT nombreUsuario, claveUsuario FROM usuarios WHERE nombreUsuario=%s AND claveUsuario=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 

  $LoginRS = mysql_query($LoginRS__query, $tarifasrd) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<style type="text/css">
.centerText {
	text-align: center;
}
.rightText {
	text-align: right;
}
.leftText {
	text-align: left;
}
</style>
<form action="<?php echo $loginFormAction; ?>" method="POST">
  <table width="300" border="0" align="center" cellpadding="1" cellspacing="2" style="border:1px solid #cccccc;">
    <tr>
      <td colspan="2" bgcolor="#F3F3F3" class="centerText">LOGIN</td>
    </tr>
    <tr>
      <td class="rightText">Usuario:</td>
      <td><input type="text" name="nombreUsuario" id="nombreUsuario"></td>
    </tr>
    <tr>
      <td class="rightText">Clave:</td>
      <td><input type="password" name="claveUsuario" id="claveUsuario"></td>
    </tr>
    <tr>
      <td class="rightText">&nbsp;</td>
      <td><hr color="#CCCCCC" size="1" width="100%"></td>
    </tr>
    <tr>
      <td class="rightText">&nbsp;</td>
      <td><span class="leftText">
        <input type="submit" name="btnSubmit" id="btnSubmit" value="  Enviar  ">
        <input type="reset" name="btnReset" id="btnReset" value="Deshacer">
      </span></td>
    </tr>
  </table>
</form>