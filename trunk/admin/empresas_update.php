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
  $updateSQL = sprintf("UPDATE empresas SET nombreEmpresa=%s, tipoEmpresa=%s, direccionEmpresa=%s, paisEmpresa=%s, ciudadEmpresa=%s, rncEmpresa=%s, emailEmpresa=%s, telefonoEmpresa=%s, faxEmpresa=%s, paginaEmpresa=%s, twitterEmpresa=%s, facebookEmpresa=%s, urlDataEmpresa=%s, selectorJQueryEmpresa=%s, keyEmpresa=%s, fechaRegistro=%s, estadoEmpresa=%s WHERE id=%s",
                       GetSQLValueString($_POST['nombreEmpresa'], "text"),
                       GetSQLValueString($_POST['tipoEmpresa'], "int"),
                       GetSQLValueString($_POST['direccionEmpresa'], "text"),
                       GetSQLValueString($_POST['paisEmpresa'], "text"),
                       GetSQLValueString($_POST['ciudadEmpresa'], "text"),
                       GetSQLValueString($_POST['rncEmpresa'], "text"),
                       GetSQLValueString($_POST['emailEmpresa'], "text"),
                       GetSQLValueString($_POST['telefonoEmpresa'], "text"),
                       GetSQLValueString($_POST['faxEmpresa'], "text"),
                       GetSQLValueString($_POST['paginaEmpresa'], "text"),
                       GetSQLValueString($_POST['twitterEmpresa'], "text"),
                       GetSQLValueString($_POST['facebookEmpresa'], "text"),
                       GetSQLValueString($_POST['urlDataEmpresa'], "text"),
                       GetSQLValueString($_POST['selectorJQueryEmpresa'], "text"),
                       GetSQLValueString($_POST['keyEmpresa'], "text"),
                       GetSQLValueString($_POST['fechaRegistro'], "date"),
                       GetSQLValueString($_POST['estadoEmpresa'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_tarifasrd, $tarifasrd);
  $Result1 = mysql_query($updateSQL, $tarifasrd) or die(mysql_error());

  $updateGoTo = "empresas_update.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    //$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    //$updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_comRSEmpresa = "-1";
if (isset($_GET['ide'])) {
  $colname_comRSEmpresa = $_GET['ide'];
}
mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSEmpresa = sprintf("SELECT * FROM empresas WHERE id = %s", GetSQLValueString($colname_comRSEmpresa, "int"));
$comRSEmpresa = mysql_query($query_comRSEmpresa, $tarifasrd) or die(mysql_error());
$row_comRSEmpresa = mysql_fetch_assoc($comRSEmpresa);
$totalRows_comRSEmpresa = mysql_num_rows($comRSEmpresa);

mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSTiposEmpresas = "SELECT id, nombreTipo FROM tipos_empresas WHERE estadoTipo = 'A' ORDER BY nombreTipo ASC";
$comRSTiposEmpresas = mysql_query($query_comRSTiposEmpresas, $tarifasrd) or die(mysql_error());
$row_comRSTiposEmpresas = mysql_fetch_assoc($comRSTiposEmpresas);
$totalRows_comRSTiposEmpresas = mysql_num_rows($comRSTiposEmpresas);

mysql_select_db($database_tarifasrd, $tarifasrd);
$query_comRSEmpresas = "SELECT *, (SELECT nombreTipo FROM tipos_empresas tiem WHERE tiem.id = emp.tipoEmpresa) AS nombreTipoEmpresa FROM empresas emp ORDER BY nombreEmpresa ASC";
$comRSEmpresas = mysql_query($query_comRSEmpresas, $tarifasrd) or die(mysql_error());
$row_comRSEmpresas = mysql_fetch_assoc($comRSEmpresas);
$totalRows_comRSEmpresas = mysql_num_rows($comRSEmpresas);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<title>Editar / Borrar Empresas</title>
</head>

<body>
<div align="center" style="font-family:Verdana, Geneva, sans-serif">
    <span><a href="empresas_add.php">Crear Empresas</a></span>&nbsp;&nbsp;|&nbsp;
    <span><a href="empresas_update.php">Editar / Eliminar Empresas</a></span>&nbsp;&nbsp;|&nbsp;
    <span><a href="menu.php">Ir al Menú</a></span>
</div>
<br>
    <form method="post" name="formulario" action="<?php echo $editFormAction; ?>">
      <table align="center" cellpadding="1" cellspacing="1" xbgcolor="#CCCCCC" style="border:1px solid #cccccc;">
        <tr valign="baseline" class="normalTextTitleTop">
          <td colspan="2" align="center" nowrap>Editar Empresas</td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Nombre:</td>
          <td><input type="text" name="nombreEmpresa" value="<?php echo htmlentities($row_comRSEmpresa['nombreEmpresa'], ENT_COMPAT, ''); ?>" size="75"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Tipo:</td>
          <td><select name="tipoEmpresa">
            <option value="0" >Seleccione tipo de empresa</option>
            <?php 
    do {  
    ?>
            <option value="<?php echo $row_comRSTiposEmpresas['id']?>" <?php if (!(strcmp($row_comRSTiposEmpresas['id'], htmlentities($row_comRSEmpresa['tipoEmpresa'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>><?php echo $row_comRSTiposEmpresas['nombreTipo']?></option>
            <?php
    } while ($row_comRSTiposEmpresas = mysql_fetch_assoc($comRSTiposEmpresas));
    ?>
          </select></td>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Direccion:</td>
          <td><input type="text" name="direccionEmpresa" value="<?php echo htmlentities($row_comRSEmpresa['direccionEmpresa'], ENT_COMPAT, ''); ?>" size="75"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Pais:</td>
          <td><select name="paisEmpresa">
            <option value="0" <?php if (!(strcmp(0, htmlentities($row_comRSEmpresa['paisEmpresa'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>Seleccione un país</option>
            <option value="DR" <?php if (!(strcmp("DR", htmlentities($row_comRSEmpresa['paisEmpresa'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>República Dominican</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Ciudad:</td>
          <td><input type="text" name="ciudadEmpresa" value="<?php echo htmlentities($row_comRSEmpresa['ciudadEmpresa'], ENT_COMPAT, ''); ?>" size="50"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">RNC:</td>
          <td><input type="text" name="rncEmpresa" value="<?php echo htmlentities($row_comRSEmpresa['rncEmpresa'], ENT_COMPAT, ''); ?>" size="30"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Email:</td>
          <td><input type="text" name="emailEmpresa" value="<?php echo htmlentities($row_comRSEmpresa['emailEmpresa'], ENT_COMPAT, ''); ?>" size="75"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Teléfono:</td>
          <td><input type="text" name="telefonoEmpresa" value="<?php echo htmlentities($row_comRSEmpresa['telefonoEmpresa'], ENT_COMPAT, ''); ?>" size="20"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Fax:</td>
          <td><input type="text" name="faxEmpresa" value="<?php echo htmlentities($row_comRSEmpresa['faxEmpresa'], ENT_COMPAT, ''); ?>" size="20"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Página Web:</td>
          <td><input type="text" name="paginaEmpresa" value="<?php echo htmlentities($row_comRSEmpresa['paginaEmpresa'], ENT_COMPAT, ''); ?>" size="75"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Twitter:</td>
          <td><input type="text" name="twitterEmpresa" value="<?php echo htmlentities($row_comRSEmpresa['twitterEmpresa'], ENT_COMPAT, ''); ?>" size="50"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Facebook:</td>
          <td><input type="text" name="facebookEmpresa" value="<?php echo htmlentities($row_comRSEmpresa['facebookEmpresa'], ENT_COMPAT, ''); ?>" size="50"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap="nowrap" bgcolor="#F4F4F4" class="normalTextTitle">Url data automática:</td>
          <td><input type="text" name="urlDataEmpresa" value="<?php echo htmlentities($row_comRSEmpresa['urlDataEmpresa'], ENT_COMPAT, ''); ?>" size="75"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Selector jQuery:</td>
          <td><input type="text" name="selectorJQueryEmpresa" value="<?php echo htmlentities($row_comRSEmpresa['selectorJQueryEmpresa'], ENT_COMPAT, ''); ?>" size="50"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Key empresa:</td>
          <td><input type="text" name="keyEmpresa" value="<?php echo htmlentities($row_comRSEmpresa['keyEmpresa'], ENT_COMPAT, ''); ?>" size="30"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Estado:</td>
          <td><select name="estadoEmpresa">
            <option value="A" <?php if (!(strcmp("A", htmlentities($row_comRSEmpresa['estadoEmpresa'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>Activo</option>
            <option value="I" <?php if (!(strcmp("I", htmlentities($row_comRSEmpresa['estadoEmpresa'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>Inactivo</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right" nowrap>&nbsp;</td>
          <td valign="middle"><hr color="#CCCCCC" size="1" width="100%" /></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" nowrap><input type="hidden" name="MM_update" value="formulario">
          <input type="hidden" name="id" value="<?php echo $row_comRSEmpresa['id']; ?>"></td>
          <td>
          <input name="btnSubmit" type="submit" id="btnSubmit" value=" Guardar ">
          <input name="btnReset" type="reset" id="btnReset" value="Deshacer">
          </td>
        </tr>
      </table>
    </form>
    <hr color="#CCCCCC" size="1" width="100%">
    <table border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC" class="normalText">
          <tr class="normalTextTitle">
            <td width="50" class="centerText"><strong>Id</strong></td>
            <td><strong>Nombre</strong></td>
            <td><strong>Tipo Emoresa</strong></td>
            <td class="centerText"><strong>RNC</strong></td>
            <td><strong>Llave</strong></td>
            <td><strong>Fecha registro</strong></td>
            <td class="centerText"><strong>Estado</strong></td>
            <td class="centerText"><strong>Editar</strong></td>
            <td class="centerText"><strong>Borrar</strong></td>
          </tr>
      <?php do { ?>
            <tr bgcolor="#FFFFFF">
              <td width="50" class="centerText"><?php echo $row_comRSEmpresas['id']; ?></td>
              <td><?php echo $row_comRSEmpresas['nombreEmpresa']; ?></td>
              <td><?php echo $row_comRSEmpresas['nombreTipoEmpresa']; ?></td>
              <td><?php echo $row_comRSEmpresas['rncEmpresa']; ?></td>
              <td><?php echo $row_comRSEmpresas['keyEmpresa']; ?></td>
              <td><?php echo $row_comRSEmpresas['fechaRegistro']; ?></td>
              <td class="centerText"><?php echo $row_comRSEmpresas['estadoEmpresa']; ?></td>
              <td class="centerText"><a href="<?php echo($updateGoTo); ?>?action=update&ide=<?php echo($row_comRSEmpresas['id']); ?>">Editar</a></td>
              <td class="centerText"><a href="<?php echo($updateGoTo); ?>?action=delete&ide=<?php echo($row_comRSEmpresas['id']); ?>">Borrar</a></td>
      </tr>
        <?php } while ($row_comRSEmpresas = mysql_fetch_assoc($comRSEmpresas)); ?>
    </table>
</body>
</html>

<?php
mysql_free_result($comRSEmpresa);

mysql_free_result($comRSTiposEmpresas);

mysql_free_result($comRSEmpresas);
?>
