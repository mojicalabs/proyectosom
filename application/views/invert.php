<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Indicadores</title>

<link href="<?php echo base_url(); ?>application/css/jquery.mobile-1.0b2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>application/script/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/script/jquery.mobile-1.0b2.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$('#indicadores').change(function() {
			id = $(this).val();
			alert(id);
		  	if (id != "0"){
				window.location.href = ('<?php echo base_url(); ?>index.php/invert/index/' + id + '/<?php echo($tipo_empresa->id); ?>');
				alert(window.location.href);
			}
		});

	});
</script>

<style type="text/css">
.fontFormat {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
body {
	xbackground-color: #F0F1DF;
}
.centerText {
	text-align: center;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
.WingdingsFonts {
	font-family: Wingdings;
	text-align: center;
}
.WingdingsFontsGreen {
	font-family: Wingdings;
	text-align: center;
	color:#090;
}
.WingdingsFontsYellow {
	font-family: Wingdings;
	text-align: center;
	color:#F90;
}
.Wingdings3Fonts {
	font-family: Wingdings 3;
	text-align: center;
}
.WebdingsFonts {
	font-family: Webdings;
	text-align: center;
}
.WebdingsFontsGreen {
	font-family: Webdings;
	text-align: center;
	color:#090;
}
.WebdingsFontsYellow{
	font-family: Webdings;
	text-align: center;
	color:#F90;
}
.copyright{
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
	color:#666;
	margin-bottom:10px;
}
</style>

<body>

<!--<div class="fontFormat"><strong>Indicadores:</strong></div>-->
<select id="indicadores" name="indicadores" data-native-menu="false" xmultiple="multiple" tabindex="-1">
    <option value="0" data-placeholder="true">Indicadores</option>
	<?php foreach ($tasas as $id => $tasa): ?>
    <option value="<?php echo($tasa->idEmpresa); ?>" <?php if ($tasa->id == $idIndicador){echo('selected="selected"');} ?>><?php echo($tasa->nombreEmpresa); ?></option>
	<?php endforeach; ?>
</select>
<br>
<table border="0" width="100%" cellspacing="1" cellpadding="5" bgcolor="#CCCCCC" style="font-family:Verdana, Geneva, sans-serif; font-size:12px;">
  <tr>
    <td bgcolor="#EEEEEE" align="center">Posición</td>
    <td bgcolor="#EEEEEE" align="center" width="200"><?php echo($tipo_empresa->nombreTipo); ?></td>
    <td bgcolor="#EEEEEE" width="75" align="center">Valor</td>
    <td bgcolor="#EEEEEE" xwidth="71" align="center">Tendencia</td>
    <td bgcolor="#EEEEEE" xwidth="78" align="center">Histórico</td>
    <td bgcolor="#EEEEEE" xwidth="93" align="center">Calificación</td>
  </tr>
<?php
	$counter = 0;
	foreach ($indicadores as $id => $indicador):
		$counter++;
?>
  <tr>
    <td bgcolor="#FFFFFF" align="center"><?php echo($counter) ?></td>
    <td bgcolor="#FFFFFF"><?php echo($indicador->nombreIndicador) ?></td>
    <td bgcolor="#FFFFFF" align="right" ><?php //echo($indicador->valorIndicador) ?></td>
    <td bgcolor="#FFFFFF" class="WingdingsFontsGreen"><?php //echo($tasa->tendencia) ?></td>
    <td bgcolor="#FFFFFF" class="WingdingsFonts"><a href="#<?php echo($counter) ?>">·</a></td>
    <td bgcolor="#FFFFFF" class="WingdingsFontsYellow">«««««</td>
  </tr>
<?php
	endforeach;
?>
</table>

<p align="center" class="copyright">Generado al: <strong><?php echo(date("d-M-Y / h:i:s a")) ?></strong></p>
</body>
</html>