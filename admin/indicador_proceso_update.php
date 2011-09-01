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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "formulario")) {
  $updateSQL = sprintf("UPDATE relacion_indicadores_proceso SET fechaRegistroProceso=%s, id=%s WHERE id=%s",
                       GetSQLValueString($_POST['fechaRegistroProceso'], "date"),
  					   GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_tarifasrd, $tarifasrd);
  $Result1 = mysql_query($updateSQL, $tarifasrd) or die(mysql_error());

  $updateGoTo = "indicador_proceso_update.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    //$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    //$updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSRelacionIndicadoresProcesos = "SELECT * FROM relacion_indicadores_proceso ORDER BY id DESC";
$comRSRelacionIndicadoresProcesos = mysql_query($query_comRSRelacionIndicadoresProcesos, $tarifasrd) or die(mysql_error());
$row_comRSRelacionIndicadoresProcesos = mysql_fetch_assoc($comRSRelacionIndicadoresProcesos);
$totalRows_comRSRelacionIndicadoresProcesos = mysql_num_rows($comRSRelacionIndicadoresProcesos);

$colname_comRSRelacionIndicadorProceso = "-1";
if (isset($_GET['idp'])) {
  $colname_comRSRelacionIndicadorProceso = $_GET['idp'];
}
mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSRelacionIndicadorProceso = sprintf("SELECT * FROM relacion_indicadores_proceso WHERE id = %s", GetSQLValueString($colname_comRSRelacionIndicadorProceso, "int"));
$comRSRelacionIndicadorProceso = mysql_query($query_comRSRelacionIndicadorProceso, $tarifasrd) or die(mysql_error());
$row_comRSRelacionIndicadorProceso = mysql_fetch_assoc($comRSRelacionIndicadorProceso);
$totalRows_comRSRelacionIndicadorProceso = mysql_num_rows($comRSRelacionIndicadorProceso);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crear / Eliminar Indicador Proceso</title>
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
        <span><a href="indicador_proceso_add.php">Crear Indicador Proceso</a></span>&nbsp;&nbsp;|&nbsp;
        <span><a href="indicador_proceso_update.php">Editar / Eliminar Indicador Proceso</a></span>&nbsp;&nbsp;|&nbsp;
        <span><a href="menu.php">Ir al Menú</a></span></div>
    <br>
    <form action="<?php echo $editFormAction; ?>" method="post" name="formulario" id="formulario">
    <table align="center" cellpadding="1" cellspacing="1" xbgcolor="#CCCCCC" style="border:1px solid #cccccc;">
    <tr valign="baseline" class="normalTextTitleTop">
      <td colspan="2" align="center" nowrap="nowrap">Crear / Eliminar Indicador Proceso</td>
    </tr>
    <tr valign="baseline">
      <td width="150" align="right" valign="middle" nowrap="nowrap">Id:</td>
      <td><input type="text" name="id" value="<?php echo $row_comRSRelacionIndicadorProceso['id']; ?>" size="10" /></td>
    </tr>
    <tr valign="baseline">
      <td width="150" align="right" valign="middle" nowrap="nowrap">Fecha Proceso:</td>
      <td><input type="text" name="fechaRegistroProceso" value="<?php echo htmlentities($row_comRSRelacionIndicadorProceso['fechaRegistroProceso'], ENT_COMPAT, 'utf-8'); ?>" size="30" /></td>
    </tr>
    <tr>
      <td class="rightText">&nbsp;</td>
      <td><hr color="#CCCCCC" size="1" width="100%" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><input type="hidden" name="MM_update" value="formulario" />
      </td>
      <td><input name="btnSubmit" type="submit" id="btnSubmit" value=" Guardar " />
      <input name="btnReset" type="reset" id="btnReset" value="Deshacer" /></td>
    </tr>
  </table>
  </form>
    <hr color="#CCCCCC" size="1" width="100%">
    <table border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC" class="normalText">
      <tr class="normalTextTitle">
            <td width="50" class="centerText"><strong>Id</strong></td>
            <td><strong>Fecha registro</strong></td>
            <td class="centerText"><strong>Editar</strong></td>
            <td class="centerText"><strong>Borrar</strong></td>
      </tr>
      <?php do { ?>
        <tr bgcolor="#FFFFFF">
          <td width="50" class="centerText"><?php echo $row_comRSRelacionIndicadoresProcesos['id']; ?></td>
          <td><?php echo $row_comRSRelacionIndicadoresProcesos['fechaRegistroProceso']; ?></td>
          <td class="centerText"><a href="<?php echo($updateGoTo); ?>?action=update&idp=<?php echo($row_comRSRelacionIndicadoresProcesos['id']); ?>">Editar</a></td>
          <td class="centerText"><a href="<?php echo($updateGoTo); ?>?action=delete&idp=<?php echo($row_comRSRelacionIndicadoresProcesos['id']); ?>">Borrar</a></td>
        </tr>
        <?php } while ($row_comRSRelacionIndicadoresProcesos = mysql_fetch_assoc($comRSRelacionIndicadoresProcesos)); ?>
    </table>
</body>
</html>
<?php
mysql_free_result($comRSRelacionIndicadoresProcesos);

mysql_free_result($comRSRelacionIndicadorProceso);
?>
