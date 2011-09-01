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
  $updateSQL = sprintf("UPDATE relacion_indicadores_tipos_empresas SET idTipoEmpresa=%s, idIndicador=%s, estado=%s WHERE id=%s",
                       GetSQLValueString($_POST['idTipoEmpresa'], "int"),
                       GetSQLValueString($_POST['idIndicador'], "int"),
                       GetSQLValueString($_POST['estado'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_tarifasrd, $tarifasrd);
  $Result1 = mysql_query($updateSQL, $tarifasrd) or die(mysql_error());

  $updateGoTo = "indicadores_tipos_empresas_update.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    //$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    //$updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
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

$colname_comRSIndicadorTipoEmpresa = "-1";
if (isset($_GET['idr'])) {
  $colname_comRSIndicadorTipoEmpresa = $_GET['idr'];
}
mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSIndicadorTipoEmpresa = sprintf("SELECT * FROM relacion_indicadores_tipos_empresas WHERE id = %s", GetSQLValueString($colname_comRSIndicadorTipoEmpresa, "int"));
$comRSIndicadorTipoEmpresa = mysql_query($query_comRSIndicadorTipoEmpresa, $tarifasrd) or die(mysql_error());
$row_comRSIndicadorTipoEmpresa = mysql_fetch_assoc($comRSIndicadorTipoEmpresa);
$totalRows_comRSIndicadorTipoEmpresa = mysql_num_rows($comRSIndicadorTipoEmpresa);

mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSIndicadoresTiposEmpresas = "SELECT *, (SELECT nombreTipo FROM tipos_empresas te WHERE te.id = rite.idTipoEmpresa) AS nombreTipoEmpresa, (SELECT nombreIndicador FROM indicadores ind WHERE ind.id = rite.idIndicador) AS nombreIndicador FROM relacion_indicadores_tipos_empresas rite ORDER BY idTipoEmpresa ASC";
$comRSIndicadoresTiposEmpresas = mysql_query($query_comRSIndicadoresTiposEmpresas, $tarifasrd) or die(mysql_error());
$row_comRSIndicadoresTiposEmpresas = mysql_fetch_assoc($comRSIndicadoresTiposEmpresas);
$totalRows_comRSIndicadoresTiposEmpresas = mysql_num_rows($comRSIndicadoresTiposEmpresas);
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
</style>
</head>

<body>
    <div align="center" style="font-family:Verdana, Geneva, sans-serif">
        <span><a href="indicadores_tipos_empresas_add.php">Crear Indicadores</a></span>&nbsp;&nbsp;|&nbsp;
        <span><a href="indicadores_tipos_empresas_update.php">Editar / Eliminar Indicadores</a></span>&nbsp;&nbsp;|&nbsp;
    <span><a href="menu.php">Ir al Menú</a></span></div>
    <br>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
<table align="center" cellpadding="1" cellspacing="1" xbgcolor="#CCCCCC" style="border:1px solid #cccccc;">
        <tr valign="baseline" class="normalTextTitleTop">
          <td colspan="2" align="center" nowrap="nowrap">Editar / Borrar Relación  
          Indicadores<br />y Tipos de Empresas</td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Tipo Empresa:</td>
          <td><select name="idTipoEmpresa">
                <option value="0" >Seleccione tipo de empresa</option>
				<?php 
    do {  
    ?>
            <option value="<?php echo $row_comRSTiposEmpresas['id']?>" <?php if (!(strcmp($row_comRSTiposEmpresas['id'], htmlentities($row_comRSIndicadorTipoEmpresa['idTipoEmpresa'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_comRSTiposEmpresas['nombreTipo']?></option>
                <?php
    } while ($row_comRSTiposEmpresas = mysql_fetch_assoc($comRSTiposEmpresas));
    ?>
          </select></td>
    </tr>
            <tr> </tr>
            <tr valign="baseline">
              <td width="150" align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Indicador:</td>
              <td><select name="idIndicador">
                    <option value="0" >Seleccione un indicador</option>
                <?php 
    do {  
    ?>
                <option value="<?php echo $row_comRSIndicadores['id']?>" <?php if (!(strcmp($row_comRSIndicadores['id'], htmlentities($row_comRSIndicadorTipoEmpresa['idIndicador'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_comRSIndicadores['nombreIndicador']?></option>
                <?php
    } while ($row_comRSIndicadores = mysql_fetch_assoc($comRSIndicadores));
    ?>
              </select></td>
            </tr>
            <tr> </tr>
            <tr valign="baseline">
              <td width="150" align="right" valign="middle" nowrap="nowrap" class="normalTextTitle">Estado:</td>
              <td><select name="estado">
                <option value="A" <?php if (!(strcmp("A", htmlentities($row_comRSIndicadorTipoEmpresa['estado'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Activo</option>
                <option value="I" <?php if (!(strcmp("I", htmlentities($row_comRSIndicadorTipoEmpresa['estado'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Inactivo</option>
              </select></td>
            </tr>
            <tr valign="baseline">
              <td align="right" nowrap="nowrap">&nbsp;</td>
              <td valign="middle"><hr color="#CCCCCC" size="1" width="100%" /></td>
            </tr>
            <tr valign="baseline">
              <td width="150" align="right" nowrap="nowrap"><input type="hidden" name="MM_update" value="form1" />
              <input type="hidden" name="id" value="<?php echo $row_comRSIndicadorTipoEmpresa['id']; ?>" /></td>
              <td><input name="btnSubmit" type="submit" id="btnSubmit" value=" Guardar " />
              <input name="btnReset" type="reset" id="btnReset" value="Deshacer" /></td>
            </tr>
          </table>
    </form>
  	<hr color="#CCCCCC" size="1" width="100%" />
  	<table border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC" class="normalText">
  	  <tr class="normalTextTitle">
  	    <td width="50" class="centerText"><strong>Id</strong></td>
  	    <td><strong>Nombre</strong></td>
  	    <td class="centerText"><strong>Forma Cálculo</strong></td>
  	    <td><strong>Fecha registro</strong></td>
  	    <td class="centerText"><strong>Estado</strong></td>
  	    <td class="centerText"><strong>Editar</strong></td>
  	    <td class="centerText"><strong>Borrar</strong></td>
      </tr>
      <?php do { ?>
        <tr bgcolor="#FFFFFF">
          <td width="50" class="centerText"><?php echo $row_comRSIndicadoresTiposEmpresas['id']; ?></td>
          <td><?php echo $row_comRSIndicadoresTiposEmpresas['nombreTipoEmpresa']; ?></td>
          <td><?php echo $row_comRSIndicadoresTiposEmpresas['nombreIndicador']; ?></td>
          <td><span class="centerText"><?php echo $row_comRSIndicadoresTiposEmpresas['fechaRegistro']; ?></span></td>
          <td class="centerText"><?php echo $row_comRSIndicadoresTiposEmpresas['estado']; ?></td>
          <td class="centerText"><a href="<?php echo($updateGoTo); ?>?action=update&amp;idr=<?php echo($row_comRSIndicadoresTiposEmpresas['id']); ?>">Editar</a></td>
          <td class="centerText"><a href="<?php echo($updateGoTo); ?>?action=delete&amp;idr=<?php echo($row_comRSIndicadoresTiposEmpresas['id']); ?>">Borrar</a></td>
      </tr>
        <?php } while ($row_comRSIndicadoresTiposEmpresas = mysql_fetch_assoc($comRSIndicadoresTiposEmpresas)); ?>
    </table>
  	<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($comRSIndicadores);

mysql_free_result($comRSTiposEmpresas);

mysql_free_result($comRSIndicadorTipoEmpresa);

mysql_free_result($comRSIndicadoresTiposEmpresas);
?>
