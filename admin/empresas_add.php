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
  $insertSQL = sprintf("INSERT INTO empresas (nombreEmpresa, tipoEmpresa, direccionEmpresa, paisEmpresa, ciudadEmpresa, rncEmpresa, emailEmpresa, telefonoEmpresa, urlDataEmpresa, faxEmpresa, paginaEmpresa, twitterEmpresa, facebookEmpresa, selectorJQueryEmpresa, keyEmpresa, fechaRegistro, estadoEmpresa) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nombreEmpresa'], "text"),
                       GetSQLValueString($_POST['tipoEmpresa'], "int"),
                       GetSQLValueString($_POST['direccionEmpresa'], "text"),
                       GetSQLValueString($_POST['paisEmpresa'], "text"),
                       GetSQLValueString($_POST['ciudadEmpresa'], "text"),
                       GetSQLValueString($_POST['rncEmpresa'], "text"),
                       GetSQLValueString($_POST['emailEmpresa'], "text"),
                       GetSQLValueString($_POST['telefonoEmpresa'], "text"),
                       GetSQLValueString($_POST['urlDataEmpresa'], "text"),
                       GetSQLValueString($_POST['faxEmpresa'], "text"),
                       GetSQLValueString($_POST['paginaEmpresa'], "text"),
                       GetSQLValueString($_POST['twitterEmpresa'], "text"),
                       GetSQLValueString($_POST['facebookEmpresa'], "text"),
                       GetSQLValueString($_POST['selectorJQueryEmpresa'], "text"),
                       GetSQLValueString($_POST['keyEmpresa'], "text"),
                       GetSQLValueString($_POST['fechaRegistro'], "date"),
                       GetSQLValueString($_POST['estadoEmpresa'], "text"));

  mysql_select_db($database_tarifasrd, $tarifasrd);
  $Result1 = mysql_query($insertSQL, $tarifasrd) or die(mysql_error());

  $insertGoTo = "menu.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    //$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    //$insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_tarifasrd, $tarifasrd);
$query_rsTiposEmpresas = "SELECT id, nombreTipo FROM tipos_empresas WHERE estadoTipo = 'A' ORDER BY nombreTipo ASC";
$rsTiposEmpresas = mysql_query($query_rsTiposEmpresas, $tarifasrd) or die(mysql_error());
$row_rsTiposEmpresas = mysql_fetch_assoc($rsTiposEmpresas);
$totalRows_rsTiposEmpresas = mysql_num_rows($rsTiposEmpresas);
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
<title>Crear Empresas</title>
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
          <td colspan="2" align="center" nowrap>Crear Empresas</td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Nombre:</td>
          <td><input type="text" name="nombreEmpresa" value="" size="75"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Tipo:</td>
          <td>
          <select name="tipoEmpresa">
            <option value="0" >Seleccione tipo de empresa</option>
            <?php
    do {  
    ?>
            <option value="<?php echo $row_rsTiposEmpresas['id']?>" ><?php echo $row_rsTiposEmpresas['nombreTipo']?></option>
            <?php
    } while ($row_rsTiposEmpresas = mysql_fetch_assoc($rsTiposEmpresas));
    ?>
          </select></td>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Direccion:</td>
          <td><input type="text" name="direccionEmpresa" value="" size="75"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Pais:</td>
        <td><select name="paisEmpresa">
              <option value="0" >Seleccione el país</option>
              <option value="DR" >República Dominicana</option>
          </select>
          </td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Ciudad:</td>
          <td><input type="text" name="ciudadEmpresa" value="" size="50"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">RNC:</td>
          <td><input type="text" name="rncEmpresa" value="" size="30"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Email:</td>
          <td><input type="text" name="emailEmpresa" value="" size="75"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Teléfono:</td>
          <td><input type="text" name="telefonoEmpresa" value="" size="20"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Fax:</td>
          <td><input type="text" name="faxEmpresa" value="" size="20"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Página Web:</td>
          <td><input type="text" name="paginaEmpresa" value="" size="75"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Twitter:</td>
          <td><input type="text" name="twitterEmpresa" value="" size="50"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Facebook:</td>
          <td><input type="text" name="facebookEmpresa" value="" size="50"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap="nowrap" bgcolor="#F4F4F4" class="normalTextTitle">Url data automática:</td>
          <td><input type="text" name="urlDataEmpresa2" value="" size="75" /></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Selector jQuery:</td>
          <td><input type="text" name="selectorJQueryEmpresa" value="" size="50"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Key empresa:</td>
          <td><input type="text" name="keyEmpresa" value="" size="30"></td>
        </tr>
        <tr valign="baseline">
          <td width="150" align="right" valign="middle" nowrap bgcolor="#F4F4F4" class="normalTextTitle">Estado:</td>
          <td><select name="estadoEmpresa">
            <option value="A" <?php if (!(strcmp("A", ""))) {echo "SELECTED";} ?>>Activo</option>
            <option value="I" <?php if (!(strcmp("I", ""))) {echo "SELECTED";} ?>>Inactivo</option>
          </select></td>
        </tr>
        <tr>
          <td width="150" class="rightText">&nbsp;</td>
          <td><hr color="#CCCCCC" size="1" width="100%"></td>
        </tr>
        <tr valign="baseline">
          <td align="right" nowrap>
          <input type="hidden" name="MM_insert" value="formulario">
          <input type="hidden" name="logonuser" value="<?php echo(get_current_user()); ?>">
          </td>
          <td><input name="btnSubmit" type="submit" id="btnSubmit" value=" Guardar ">
          <input name="btnReset" type="reset" id="btnReset" value="Deshacer"></td>
        </tr>
      </table>
    </form> 
</body>
</html>
<?php
mysql_free_result($rsTiposEmpresas);
?>
