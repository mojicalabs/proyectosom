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
  $updateSQL = sprintf("UPDATE indicadores SET nombreIndicador=%s, tipoIndicador=%s, formaCalculo=%s, estadoIndicador=%s WHERE id=%s",
                       GetSQLValueString($_POST['nombreIndicador'], "text"),
                       GetSQLValueString($_POST['tipoIndicador'], "text"),
                       GetSQLValueString($_POST['formaCalculo'], "text"),
                       GetSQLValueString($_POST['estadoIndicador'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_tarifasrd, $tarifasrd);
  $Result1 = mysql_query($updateSQL, $tarifasrd) or die(mysql_error());

  $updateGoTo = "indicadores_update.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    //$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    //$updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_comRSIndicador = "-1";
if (isset($_GET['idi'])) {
  $colname_comRSIndicador = $_GET['idi'];
}
mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSIndicador = sprintf("SELECT * FROM indicadores WHERE id = %s", GetSQLValueString($colname_comRSIndicador, "int"));
$comRSIndicador = mysql_query($query_comRSIndicador, $tarifasrd) or die(mysql_error());
$row_comRSIndicador = mysql_fetch_assoc($comRSIndicador);
$totalRows_comRSIndicador = mysql_num_rows($comRSIndicador);

mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSIndicadores = "SELECT * FROM indicadores ind ORDER BY nombreIndicador ASC";
$comRSIndicadores = mysql_query($query_comRSIndicadores, $tarifasrd) or die(mysql_error());
$row_comRSIndicadores = mysql_fetch_assoc($comRSIndicadores);
$totalRows_comRSIndicadores = mysql_num_rows($comRSIndicadores);

mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSTiposEmpresas = "SELECT * FROM tipos_empresas WHERE estadoTipo = 'A' ORDER BY nombreTipo ASC";
$comRSTiposEmpresas = mysql_query($query_comRSTiposEmpresas, $tarifasrd) or die(mysql_error());
$row_comRSTiposEmpresas = mysql_fetch_assoc($comRSTiposEmpresas);
$totalRows_comRSTiposEmpresas = mysql_num_rows($comRSTiposEmpresas);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar / Borrar Indicadores</title>
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
</style>
</head>

<body>
    <div align="center" style="font-family:Verdana, Geneva, sans-serif">
        <span><a href="indicadores_add.php">Crear Indicadores</a></span>&nbsp;&nbsp;|&nbsp;
        <span><a href="indicadores_update.php">Editar / Eliminar Indicadores</a></span>&nbsp;&nbsp;|&nbsp;
        <span><a href="menu.php">Ir al Menú</a></span></div>
    <br>
    <form action="<?php echo $editFormAction; ?>" method="post" name="formulario" id="formulario">
      <table align="center" cellpadding="1" cellspacing="1" xbgcolor="#CCCCCC" style="border:1px solid #cccccc;">
        <tr valign="baseline" class="normalTextTitleTop">
          <td colspan="2" align="center" nowrap="nowrap">Editar Indicadores</td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Nombre:</td>
          <td><input type="text" name="nombreIndicador" value="<?php echo htmlentities($row_comRSIndicador['nombreIndicador'], ENT_COMPAT, 'utf-8'); ?>" size="50" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Tipo:</td>
          <td><select name="tipoIndicador">
            <option value="0" <?php if (!(strcmp("0", htmlentities($row_comRSIndicador['tipoIndicador'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Seleccione tipo indicador</option>
            <option value="numerico" <?php if (!(strcmp("numerico", htmlentities($row_comRSIndicador['tipoIndicador'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Numérico</option>
            <option value="porcentaje" <?php if (!(strcmp("porcentaje", htmlentities($row_comRSIndicador['tipoIndicador'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Porcentaje</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Forma de Cálculo:</td>
          <td><select name="formaCalculo">
            <option value="0" <?php if (!(strcmp(0, htmlentities($row_comRSIndicador['formaCalculo'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Seleccione forma de cálculo</option>
            <option value="menosesmejor" <?php if (!(strcmp("menosesmejor", htmlentities($row_comRSIndicador['formaCalculo'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Menos es mejor</option>
            <option value="masesmejor" <?php if (!(strcmp("masesmejor", htmlentities($row_comRSIndicador['formaCalculo'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Más es mejor</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Estado:</td>
          <td><select name="estadoIndicador">
            <option value="A" <?php if (!(strcmp("A", htmlentities($row_comRSIndicador['estadoIndicador'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Activo</option>
            <option value="I" <?php if (!(strcmp("I", htmlentities($row_comRSIndicador['estadoIndicador'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Inactivo</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" nowrap="nowrap">&nbsp;</td>
          <td valign="middle"><hr color="#CCCCCC" size="1" width="100%" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"><input type="hidden" name="MM_update" value="formulario" />
          <input type="hidden" name="id" value="<?php echo $row_comRSIndicador['id']; ?>" /></td>
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
            <td class="centerText"><strong>Tipo</strong></td>
            <td class="centerText"><strong>Forma Cálculo</strong></td>
            <td><strong>Fecha registro</strong></td>
            <td class="centerText"><strong>Estado</strong></td>
            <td class="centerText"><strong>Editar</strong></td>
            <td class="centerText"><strong>Borrar</strong></td>
          </tr>
          <?php
		  	do {
				
				$tipoIndicadorValue = $row_comRSIndicadores['tipoIndicador'];
				if ($tipoIndicadorValue == "numerico"){
					$tipoIndicador = "Numérico";} 
				else if ($tipoIndicadorValue == "porcentaje"){
					$tipoIndicador = "Porcentaje";
				} else {
					$tipoIndicador = "";
				}
				
				$formaCalculoValue = $row_comRSIndicadores['formaCalculo'];
				if ($formaCalculoValue == "menosesmejor"){
					$formaCalculo = "Menos es mejor";} 
				else if ($formaCalculoValue == "masesmejor"){
					$formaCalculo = "Más es mejor";
				} else {
					$formaCalculo = "";
				}
		   ?>
            <tr bgcolor="#FFFFFF">
              <td width="50" class="centerText"><?php echo $row_comRSIndicadores['id']; ?></td>
              <td><?php echo $row_comRSIndicadores['nombreIndicador']; ?></td>
              <td><?php echo $tipoIndicador; ?></td>
              <td><?php echo $formaCalculo; ?></td>
              <td><?php echo $row_comRSIndicadores['fechaRegistro']; ?></td>
              <td class="centerText"><?php echo $row_comRSIndicadores['estadoIndicador']; ?></td>
              <td class="centerText"><a href="<?php echo($updateGoTo); ?>?action=update&idi=<?php echo($row_comRSIndicadores['id']); ?>">Editar</a></td>
              <td class="centerText"><a href="<?php echo($updateGoTo); ?>?action=delete&idi=<?php echo($row_comRSIndicadores['id']); ?>">Borrar</a></td>
          </tr>
            <?php } while ($row_comRSIndicadores = mysql_fetch_assoc($comRSIndicadores)); ?>
    </table>
</body>
</html>
<?php
mysql_free_result($comRSIndicador);

mysql_free_result($comRSIndicadores);

mysql_free_result($comRSTiposEmpresas);
?>
