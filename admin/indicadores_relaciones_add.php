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
  $insertSQL = sprintf("INSERT INTO relacion_indicadores (idProceso, idEmpresa, idIndicador, valorIndicador) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['idProceso'], "int"),
                       GetSQLValueString($_POST['idEmpresa'], "int"),
                       GetSQLValueString($_POST['idIndicador'], "int"),
                       GetSQLValueString($_POST['valorIndicador'], "double"));

  mysql_select_db($database_tarifasrd, $tarifasrd);
  $Result1 = mysql_query($insertSQL, $tarifasrd) or die(mysql_error());

	echo(mysql_error());

  $insertGoTo = "indicadores_relaciones_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    //$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    //$insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSEmpresas = "SELECT id, nombreEmpresa FROM empresas ORDER BY nombreEmpresa ASC";
$comRSEmpresas = mysql_query($query_comRSEmpresas, $tarifasrd) or die(mysql_error());
$row_comRSEmpresas = mysql_fetch_assoc($comRSEmpresas);
$totalRows_comRSEmpresas = mysql_num_rows($comRSEmpresas);

mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSIndicadores = "SELECT id, nombreIndicador FROM indicadores ORDER BY nombreIndicador ASC";
$comRSIndicadores = mysql_query($query_comRSIndicadores, $tarifasrd) or die(mysql_error());
$row_comRSIndicadores = mysql_fetch_assoc($comRSIndicadores);
$totalRows_comRSIndicadores = mysql_num_rows($comRSIndicadores);

mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSIndicadoresProcesos = "SELECT id, fechaRegistroProceso FROM relacion_indicadores_proceso ORDER BY id DESC";
$comRSIndicadoresProcesos = mysql_query($query_comRSIndicadoresProcesos, $tarifasrd) or die(mysql_error());
$row_comRSIndicadoresProcesos = mysql_fetch_assoc($comRSIndicadoresProcesos);
$totalRows_comRSIndicadoresProcesos = mysql_num_rows($comRSIndicadoresProcesos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crear Relación Indicadores</title>
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
        <span><a href="indicadores_relaciones_add.php">Crear Relación Indicadores</a></span>&nbsp;&nbsp;|&nbsp;
        <span><a href="indicadores_relaciones_update.php">Editar / Eliminar Relación Indicadores</a></span>&nbsp;&nbsp;|&nbsp;
        <span><a href="menu.php">Ir al Menú</a></span></div>
    <br>
    <form action="<?php echo $editFormAction; ?>" method="post" name="formulario" id="formulario">
      <table align="center" cellpadding="1" cellspacing="1" xbgcolor="#CCCCCC" style="border:1px solid #cccccc;">
    <tr valign="baseline" class="normalTextTitleTop">
      <td colspan="2" align="center" nowrap="nowrap">Crear Indicador Proceso</td>
    </tr>
    <tr valign="baseline">
      <td width="150" align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Proceso:</td>
    <td><select name="idProceso">
            <option value="0">Seleccione el proceso</option>
        <?php 
		do {  
		?>
		  <option value="<?php echo $row_comRSIndicadoresProcesos['id']; ?>" ><?php echo $row_comRSIndicadoresProcesos['id']?> - <?php echo $row_comRSIndicadoresProcesos['fechaRegistroProceso']; ?></option>
				<?php
		} while ($row_comRSIndicadoresProcesos = mysql_fetch_assoc($comRSIndicadoresProcesos));
		?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td width="150" align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Empresa:</td>
    <td><select name="idEmpresa">
            <option value="0">Seleccione la empresa</option>
        <?php 
		do {  
		?>
				<option value="<?php echo $row_comRSEmpresas['id']?>" ><?php echo $row_comRSEmpresas['nombreEmpresa']?></option>
				<?php
		} while ($row_comRSEmpresas = mysql_fetch_assoc($comRSEmpresas));
		?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td width="150" align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Indicador:</td>
    <td><select name="idIndicador">
            <option value="0">Seleccione el indicador</option>
        <?php 
		do {  
		?>
				<option value="<?php echo $row_comRSIndicadores['id']?>" ><?php echo $row_comRSIndicadores['nombreIndicador']?></option>
				<?php
		} while ($row_comRSIndicadores = mysql_fetch_assoc($comRSIndicadores));
		?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td width="150" align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Valor:</td>
      <td><input type="text" name="valorIndicador" value="" size="20" /></td>
    </tr>
    <tr>
      <td class="rightText">&nbsp;</td>
      <td><hr color="#CCCCCC" size="1" width="100%" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><input type="hidden" name="MM_insert" value="formulario" /></td>
      <td><input name="btnSubmit" type="submit" id="btnSubmit" value=" Guardar " />
      <input name="btnReset" type="reset" id="btnReset" value="Deshacer" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($comRSEmpresas);

mysql_free_result($comRSIndicadores);

mysql_free_result($comRSIndicadoresProcesos);
?>
