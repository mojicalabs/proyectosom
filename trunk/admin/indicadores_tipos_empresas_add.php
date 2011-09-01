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
  $insertSQL = sprintf("INSERT INTO relacion_indicadores_tipos_empresas (idTipoEmpresa, idIndicador, estado) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['idTipoEmpresa'], "int"),
                       GetSQLValueString($_POST['idIndicador'], "int"),
                       GetSQLValueString($_POST['estado'], "text"));

  mysql_select_db($database_tarifasrd, $tarifasrd);
  $Result1 = mysql_query($insertSQL, $tarifasrd); //or die(mysql_error());

  $insertGoTo = "indicadores_tipos_empresas_add.php";

  if (mysql_errno() == 1062){
  		$insertGoTo = $insertGoTo . "?error=Esta relación se encuentra registrada en la base de datos.";
  }

  if (isset($_SERVER['QUERY_STRING'])) {
    //$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    //$insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSIndicadores = "SELECT id, nombreIndicador FROM indicadores WHERE estadoIndicador = 'A' ORDER BY nombreIndicador ASC";
$comRSIndicadores = mysql_query($query_comRSIndicadores, $tarifasrd) or die(mysql_error());
$row_comRSIndicadores = mysql_fetch_assoc($comRSIndicadores);
$totalRows_comRSIndicadores = mysql_num_rows($comRSIndicadores);

mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSTiposEmpresas = "SELECT id, nombreTipo FROM tipos_empresas WHERE estadoTipo = 'A' ORDER BY nombreTipo ASC";
$comRSTiposEmpresas = mysql_query($query_comRSTiposEmpresas, $tarifasrd) or die(mysql_error());
$row_comRSTiposEmpresas = mysql_fetch_assoc($comRSTiposEmpresas);
$totalRows_comRSTiposEmpresas = mysql_num_rows($comRSTiposEmpresas);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crear Relación Indicadores y Tipos de Empresas</title>
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
.normalText{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
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
.redText {
	color:#F00;
}
</style>
</head>

<body>
    <div align="center" style="font-family:Verdana, Geneva, sans-serif">
        <span><a href="indicadores_tipos_empresas_add.php">Crear Indicadores</a></span>&nbsp;&nbsp;|&nbsp;
        <span><a href="indicadores_tipos_empresas_update.php">Editar / Eliminar Indicadores</a></span>&nbsp;&nbsp;|&nbsp;
        <span><a href="menu.php">Ir al Menú</a></span></div>
    <br>
<form action="<?php echo $editFormAction; ?>" method="post" name="formulario" id="formulario">
  <table align="center" cellpadding="1" cellspacing="1" xbgcolor="#CCCCCC" style="border:1px solid #cccccc;">
        <tr valign="baseline" class="normalTextTitleTop">
          <td colspan="2" align="center" nowrap="nowrap">Crear Relación          Indicadores<br />y Tipos de Empresas</td>
        </tr>
        <tr valign="baseline">
          <td align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Tipo Empresa:</td>
          <td><select name="idTipoEmpresa">
                <option value="0" >Seleccione tipo de empresa</option>
            <?php 
    do {  
    ?>
            <option value="<?php echo $row_comRSTiposEmpresas['id']?>" ><?php echo $row_comRSTiposEmpresas['nombreTipo']?></option>
            <?php
    } while ($row_comRSTiposEmpresas = mysql_fetch_assoc($comRSTiposEmpresas));
    ?>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Indicador:</td>
          <td><select name="idIndicador">
                <option value="0" >Seleccione un indicador</option>
            <?php 
    do {  
    ?>
            <option value="<?php echo $row_comRSIndicadores['id']?>" ><?php echo $row_comRSIndicadores['nombreIndicador']?></option>
            <?php
    } while ($row_comRSIndicadores = mysql_fetch_assoc($comRSIndicadores));
    ?>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Estado:</td>
          <td><select name="estado">
            <option value="A" <?php if (!(strcmp("A", ""))) {echo "SELECTED";} ?>>Activo</option>
            <option value="I" <?php if (!(strcmp("I", ""))) {echo "SELECTED";} ?>>Inactivo</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right" nowrap="nowrap">&nbsp;</td>
          <td valign="middle"><hr color="#CCCCCC" size="1" width="100%" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"><input type="hidden" name="MM_insert" value="formulario" /></td>
          <td><input name="btnSubmit" type="submit" id="btnSubmit" value=" Guardar " />
          <input name="btnReset" type="reset" id="btnReset" value="Deshacer" /></td>
        </tr>
        <?php if ($_GET['error'] != ""){ ?>
        <tr valign="middle">
          <td colspan="2" align="right" nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr valign="middle">
          <td colspan="2" align="right" nowrap="nowrap" class="redText"><?php echo($_GET['error']); ?></td>
        </tr>
        <tr valign="middle">
          <td colspan="2" align="right" nowrap="nowrap">&nbsp;</td>
        </tr>
        <?php } ?>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($comRSIndicadores);

mysql_free_result($comRSTiposEmpresas);
?>
