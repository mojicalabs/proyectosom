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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tipos_empresas SET nombreTipo=%s, estadoTipo=%s WHERE id=%s",
                       GetSQLValueString($_POST['nombreTipo'], "text"),
                       GetSQLValueString($_POST['estadoTipo'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_tarifasrd, $tarifasrd);
  $Result1 = mysql_query($updateSQL, $tarifasrd) or die(mysql_error());

  $updateGoTo = "tipos_empresas_update.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    //$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    //$updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_comRSTipoEmpresa = "-1";
if (isset($_GET['idt'])) {
  $colname_comRSTipoEmpresa = $_GET['idt'];
}
mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSTipoEmpresa = sprintf("SELECT * FROM tipos_empresas WHERE id = %s", GetSQLValueString($colname_comRSTipoEmpresa, "int"));
$comRSTipoEmpresa = mysql_query($query_comRSTipoEmpresa, $tarifasrd) or die(mysql_error());
$row_comRSTipoEmpresa = mysql_fetch_assoc($comRSTipoEmpresa);
$totalRows_comRSTipoEmpresa = mysql_num_rows($comRSTipoEmpresa);

mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSTiposEmpresas = "SELECT * FROM tipos_empresas ORDER BY nombreTipo ASC";
$comRSTiposEmpresas = mysql_query($query_comRSTiposEmpresas, $tarifasrd) or die(mysql_error());
$row_comRSTiposEmpresas = mysql_fetch_assoc($comRSTiposEmpresas);
$totalRows_comRSTiposEmpresas = mysql_num_rows($comRSTiposEmpresas);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar / Borrar Tipos Empresas</title>
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
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
    <table align="center" cellpadding="1" cellspacing="1" xbgcolor="#CCCCCC" style="border:1px solid #cccccc;">
        <tr valign="baseline" class="normalTextTitleTop">
          <td colspan="2" align="center" nowrap="nowrap"><p>Editar / Borrar Tipos Empresas</p></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" nowrap="nowrap">Nombre:</td>
          <td><input type="text" name="nombreTipo" value="<?php echo htmlentities($row_comRSTipoEmpresa['nombreTipo'], ENT_COMPAT, 'utf-8'); ?>" size="50" /></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" nowrap="nowrap">Estado:</td>
          <td><select name="estadoTipo">
            <option value="A" <?php if (!(strcmp("A", htmlentities($row_comRSTipoEmpresa['estadoTipo'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Activo</option>
            <option value="I" <?php if (!(strcmp("I", htmlentities($row_comRSTipoEmpresa['estadoTipo'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Inactivo</option>
          </select></td>
        </tr>
        <tr>
          <td class="rightText">&nbsp;</td>
          <td><hr color="#CCCCCC" size="1" width="100%" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"><input type="hidden" name="MM_update" value="form1" />
          <input type="hidden" name="id" value="<?php echo $row_comRSTipoEmpresa['id']; ?>" /></td>
          <td><input name="btnSubmit" type="submit" id="btnSubmit" value=" Guardar " />
          <input name="btnReset" type="reset" id="btnReset" value="Deshacer" /></td>
        </tr>
      </table>
    </form>
    <hr color="#CCCCCC" size="1" width="100%">
    <table border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC" class="normalText">
      <tr class="normalTextTitle">
            <td width="50" class="centerText"><strong>Id</strong></td>
            <td><strong>Nombre</strong></td>
            <td><strong>Fecha registro</strong></td>
            <td class="centerText"><strong>Estado</strong></td>
            <td class="centerText"><strong>Editar</strong></td>
            <td class="centerText"><strong>Borrar</strong></td>
      </tr>
	  <?php do { ?>
        <tr bgcolor="#FFFFFF">
          <td width="50" class="centerText"><?php echo $row_comRSTiposEmpresas['id']; ?></td>
          <td><?php echo $row_comRSTiposEmpresas['nombreTipo']; ?></td>
          <td><?php echo $row_comRSTiposEmpresas['fechaRegistro']; ?></td>
          <td class="centerText"><?php echo $row_comRSTiposEmpresas['estadoTipo']; ?></td>
          <td class="centerText"><a href="<?php echo($updateGoTo); ?>?action=update&idt=<?php echo($row_comRSTiposEmpresas['id']); ?>">Editar</a></td>
          <td class="centerText"><a href="<?php echo($updateGoTo); ?>?action=delete&idt=<?php echo($row_comRSTiposEmpresas['id']); ?>">Borrar</a></td>
        </tr>
        <?php } while ($row_comRSTiposEmpresas = mysql_fetch_assoc($comRSTiposEmpresas)); ?>
    </table>
</body>
</html>
<?php
mysql_free_result($comRSTipoEmpresa);

mysql_free_result($comRSTiposEmpresas);
?>
