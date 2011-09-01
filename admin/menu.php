<?php require_once('security.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menú Administración</title>
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
	background-color:#F4F4F4;
	font-weight:bold;
}
.centerText {
	text-align: center;
}
</style>
</head>

<body>
<h2 class="centerText">Menú Administración</h2>
<table border="0" cellspacing="1" cellpadding="3" bgcolor="#CCCCCC" align="center" style="border:1px solid #cccccc;">
  <tr>
    <td width="20" bgcolor="#FFFFFF" class="centerText">-</td>
    <td bgcolor="#FFFFFF"><a href="empresas_add.php">Administrar empresas</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#FFFFFF" class="centerText">-</td>
    <td bgcolor="#FFFFFF"><a href="indicadores_add.php">Administrar indicadores</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#FFFFFF" class="centerText">-</td>
    <td bgcolor="#FFFFFF"><a href="tipos_empresas_add.php">Administrar tipos de empresas</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#FFFFFF" class="centerText">-</td>
    <td bgcolor="#FFFFFF"><a href="indicadores_tipos_empresas_add.php">Relacionar indicadores y tipos de empresas</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#FFFFFF" class="centerText">-</td>
    <td bgcolor="#FFFFFF"><a href="indicador_proceso_add.php">Administrar indicadores de procesos</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#FFFFFF" class="centerText">-</td>
    <td bgcolor="#FFFFFF"><a href="indicadores_relaciones_add.php">Relacionar indicadores</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#FFFFFF" class="centerText">-</td>
    <td bgcolor="#FFFFFF">Relacionar indicadores histórico</td>
  </tr>
  <tr>
    <td width="20" bgcolor="#FFFFFF" class="centerText">-</td>
    <td bgcolor="#FFFFFF">Administrar usuarios</td>
  </tr>
</table>
</body>
</html>