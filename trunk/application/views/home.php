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
		  	if (id != "0"){
				window.location.href = ('<?php echo base_url(); ?>index.php/home/index/<?php echo($tipo_empresa->id); ?>/' + id);
			}
		});
	});
	
	var showHistoryChart = function(idEmpresa, idIndicador){
		$("#showHistoryChartFrame").attr("src", '<?php echo base_url(); ?>index.php/stocks/index/' + idEmpresa + '/' + idIndicador);
		$("#showHistoryChartDiv").css("top", getPageScroll()[1] + (getPageHeight() / 15));
		$("#showHistoryChartDiv").css("left", 1);
		$("#showHistoryChartDiv").show("slow");
	}

	function getPageScroll() {
		var xScroll, yScroll;
		if (self.pageYOffset) {
			yScroll = self.pageYOffset;
			xScroll = self.pageXOffset;
		} else if (document.documentElement && document.documentElement.scrollTop) {      // Explorer 6 Strict
			yScroll = document.documentElement.scrollTop;
			xScroll = document.documentElement.scrollLeft;
		} else if (document.body) {// all other Explorers
			yScroll = document.body.scrollTop;
			xScroll = document.body.scrollLeft;        
		}
		return new Array(xScroll,yScroll)
	}
   
	function getPageHeight() {
		var windowHeight
		if (self.innerHeight) {      // all except Explorer
			windowHeight = self.innerHeight;
		} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
			windowHeight = document.documentElement.clientHeight;
		} else if (document.body) { // other Explorers
			windowHeight = document.body.clientHeight;
		}             
		return windowHeight
	}
	
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
	<?php foreach ($indicadores as $indicador): ?>
    <option value="<?php echo($indicador->idIndicador); ?>" <?php if ($indicador->idIndicador == $idIndicador){echo('selected="selected"');} ?>><?php echo($indicador->nombreIndicador); ?></option>
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
	foreach ($tasas as $id => $tasa):
		$counter++;
?>
  <tr>
    <td bgcolor="#FFFFFF" align="center"><?php echo($counter) ?></td>
    <td bgcolor="#FFFFFF"><?php echo($tasa->nombreEmpresa) ?></td>
    <td bgcolor="#FFFFFF" align="right" ><?php echo($tasa->valorIndicador) ?></td>
    <td bgcolor="#FFFFFF" align="center" xclass="WingdingsFontsGreen"><?php if ($tasa->tendencia != ''){ ?><img src="<?php echo base_url(); ?>application/images/<?php echo($tasa->color); ?>_<?php echo($tasa->tendencia); ?>_arrow.png" width="10" height="11" /><?php } ?></td>
    <td bgcolor="#FFFFFF" class="WingdingsFonts">
    	<a onclick="showHistoryChart(<?php echo($tasa->idEmpresa); ?>, <?php echo($tasa->idIndicador); ?>);" href=""><img src="<?php echo base_url(); ?>application/images/stocks_small_4.png" width="10" height="10" /></a>
    </td>
    <td bgcolor="#FFFFFF" class="WingdingsFontsYellow">«««««</td>
  </tr>
<?php
	endforeach;
?>
</table>
<br>
<div id="showHistoryChartDiv" align="center" style="display:none; width:99%; height:370px; overflow:hidden;">
   <iframe id="showHistoryChartFrame" frameborder="0" src="" height="310" width="99%" scrolling="no"></iframe>
    <!--<button onclick="javascript:$('#showHistoryChartDiv').hide('slow');">Cerrar</button>-->
</div> 

<p align="center" class="copyright">Generado al: <strong><?php echo(date("d-M-Y / h:i:s a")) ?></strong></p>

</body>
</html>