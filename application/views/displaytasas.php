<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Display Tasas</title>

<script type="text/javascript" src="<?php echo base_url(); ?>application/script/jquery-1.6.1.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
	});
</script>

<style type="text/css">
.fontFormat {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
body {
	background-color: #F0F1DF;
}
</style>
<body>

<img src="http://www.tarifasrd.com/web/images/logo.jpg" width="204" height="79" />
<h4 style="font-family:Verdana, Geneva, sans-serif">Tasas Dolar y Euro - Bancos de República Dominicana</h4>
<font face="Verdana, Geneva, sans-serif" size="2">Generado al: <strong><?php echo(date("d-M-Y / h:i:s a")) ?></strong></font>
<br />
<br />
<table border="0" cellspacing="1" cellpadding="1">
  <tr class="fontFormat">
    <td><a href="1">Tasa Dolar Compra</a></td>
    <td width="20">&nbsp;</td>
    <td><a href="2">Tasa Dolar Venta</a></td>
    <td width="20">&nbsp;</td>
    <td><a href="3">Tasa Euro Compra</a></td>
    <td width="20">&nbsp;</td>
    <td><a href="4">Tasa Euro Venta</a></td>
  </tr>
</table>
<BR>

<table border="0" cellspacing="1" cellpadding="3" bgcolor="#CCCCCC" style="font-family:Verdana, Geneva, sans-serif; font-size:12px;">
  <tr>
    <td bgcolor="#EEEEEE" align="center"><strong>Posición</strong></td>
    <td bgcolor="#EEEEEE" align="center" width="200"><strong>Banco</strong></td>
    <td bgcolor="#EEEEEE" width="100" align="center"><strong>Tasa Dolar</strong></td>
  </tr>
<?php
	$counter = 0;
	foreach ($tasas as $id => $tasa):
		$counter++;
?>
  <tr>
    <td bgcolor="#FFFFFF" align="center"><?php echo($counter) ?></td>
    <td bgcolor="#FFFFFF"><?php echo($tasa->nombreEmpresa) ?></td>
    <td bgcolor="#FFFFFF" align="right" ><?php echo($tasa->valorIndicador) ?></td>
  </tr>
<?php
	endforeach;
?>
</table>
</body>
</html>