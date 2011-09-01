<?php require_once('security.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formulario")) {
  $insertSQL = sprintf("INSERT INTO tipos_empresas (nombreTipo, estadoTipo) VALUES (%s, %s)",
                       GetSQLValueString($_POST['nombreTipo'], "text"),
                       GetSQLValueString($_POST['estadoTipo'], "text"));

  mysql_select_db($database_tarifasrd, $tarifasrd);
  $Result1 = mysql_query($insertSQL, $tarifasrd) or die(mysql_error());

  $insertGoTo = "tipos_empresas_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    //$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    //$insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crear Tipos Empresas</title>
<style type="text/css">
body{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
}
.normalTextTitle{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	background-color:#F4F4F4;
}
.normalTextTitleTop{
	font-family:Verdana, Geneva, sans-serif;
	font-size:16px;
	background-color:#E4E4E4;
	font-weight:bold;
}
.centerText {
	text-align: center;
}
</style>
</head>

<body>
    <div align="center" style="font-family:Verdana, Geneva, sans-serif">
        <span><a href="tipos_empresas_add.php">Crear Tipos Empresas</a></span>&nbsp;&nbsp;|&nbsp;
        <span><a href="tipos_empresas_update.php">Editar / Eliminar Tipos Empresas</a></span>&nbsp;&nbsp;|&nbsp;
        <span><a href="menu.php">Ir al Menú</a></span>
    </div>
    <br>
    <form action="<?php echo $editFormAction; ?>" method="post" name="formulario" id="formulario">
      <table align="center" cellpadding="1" cellspacing="1" xbgcolor="#CCCCCC" style="border:1px solid #cccccc;">
        <tr valign="baseline" class="normalTextTitleTop">
          <td colspan="2" align="center" nowrap="nowrap">Crear Tipos Empresas</td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Nombre:</td>
          <td><input type="text" name="nombreTipo" value="" size="50" /></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Estado:</td>
          <td><select name="estadoTipo">
            <option value="A" <?php if (!(strcmp("A", ""))) {echo "SELECTED";} ?>>Activo</option>
            <option value="I" <?php if (!(strcmp("I", ""))) {echo "SELECTED";} ?>>Inactivo</option>
          </select></td>
        </tr>
        <tr>
          <td width="150" class="rightText">&nbsp;</td>
          <td><hr color="#CCCCCC" size="1" width="100%" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"><input type="hidden" name="MM_insert" value="formulario" /></td>
          <td><input name="btnSubmit" type="submit" id="btnSubmit" value=" Guardar " />
          <input name="btnReset" type="reset" id="btnReset" value="Deshacer" /></td>
        </tr>
      </table>
    </form>
</body>
</html>