<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Get Tasas</title>

<script type="text/javascript" src="<?php echo base_url(); ?>application/script/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/script/jquery.dump.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var tasasObj = new Array();
		var idProceso = 0;
		
		$.ajax({
		   type: "POST",
		   url: "<?php echo base_url(); ?>index.php/settasas/addProcess",
		   dataType: "text",
		   success: function(msg){
				idProceso = msg;
			 //alert( "Data Saved: " + msg );
		   },
		   error: function(msg){
			 alert( "error: " + msg );
		   },
		 });

	<?php
		foreach ($empresas as $empresa):
	?>
		$("#result<?php echo($empresa->key); ?>").load("<?php echo base_url(); ?>index.php/gethtml/index/<?php echo($empresa->key); ?><?php if ($empresa->location != ''){echo(' ' . $empresa->location);}; ?>", {"url":"<?php echo($empresa->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($empresa->key); ?>").html();
			$("#contenido<?php echo($empresa->key); ?>").val($("#result<?php echo($empresa->key); ?>").html());
			var tasas = getTasasJSON("<?php echo($empresa->key); ?>", contenido, <?php echo($empresa->id); ?>);
			$("#texto<?php echo($empresa->key); ?>").html(tasas[0]);
			
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($empresa->key); ?>").html(msg + xhr.status + " " + xhr.statusText);
			} else {
				setTasas($("#tasas<?php echo($empresa->key); ?>").attr('name'));
			}
		});
	<?php
		endforeach;
	?>
		function getTasasJSON(key, contenido, id){
			var tasas = new Array();
			switch (key){
				case 'bancopopular': 
					tasaDolarCompra = $(contenido).eq(0).text().trim();
					tasaDolarVenta = $(contenido).eq(1).text().trim();
					tasaEuroCompra = $(contenido).eq(2).text().trim();
					tasaEuroVenta = $(contenido).eq(3).text().trim();
					break;
				case 'bancoleon':
					textoTasas = ($(contenido).text());
					textoTasasSplit = textoTasas.split("\n");
					tasaDolarCompra = textoTasasSplit[0].split("$")[1].trim();
					tasaDolarVenta = textoTasasSplit[1].split("$")[1].trim();
					tasaEuroCompra = 0;
					tasaEuroVenta = 0;
					break;
				case 'bancoprogreso':
					tasaDolarCompra = $(contenido).eq(0).text().trim().split('$')[1].trim();
					tasaDolarVenta = $(contenido).eq(1).text().trim().split('$')[1].trim();
					tasaEuroCompra = $(contenido).eq(2).text().trim().split('$')[1].trim();
					tasaEuroVenta = $(contenido).eq(3).text().trim().split('$')[1].trim();
					break;
				case 'banreservas': 
					tasaDolarCompra = $(contenido).eq(1).text().trim();
					tasaDolarVenta = $(contenido).eq(2).text().trim();
					tasaEuroCompra = $(contenido).eq(4).text().trim();
					tasaEuroVenta = $(contenido).eq(5).text().trim();
					break;
				case 'bancovimenca': 
					tasaDolarCompra = $(contenido).eq(0).text().trim();
					tasaDolarVenta = $(contenido).eq(1).text().trim();
					tasaEuroCompra = $(contenido).eq(2).text().trim();
					tasaEuroVenta = $(contenido).eq(3).text().trim();
					break;
				case 'bancopromerica': 
					tasaDolarCompra = $(contenido).eq(1).text().trim();
					tasaDolarVenta = $(contenido).eq(2).text().trim();
					tasaEuroCompra = 0;
					tasaEuroVenta = 0;
					break;
				case 'bancocaribe': 
					tasaDolarCompra = $(contenido).eq(0).text().trim().split('$')[1].trim();
					tasaDolarVenta = $(contenido).eq(1).text().trim().split('$')[1].trim();
					tasaEuroCompra = $(contenido).eq(2).text().trim().split('$')[1].trim();
					tasaEuroVenta = $(contenido).eq(3).text().trim().split('$')[1].trim();
					break;
				case 'citibank': 
					tasaDolarCompra = $(contenido).eq(0).text().trim();
					tasaDolarVenta = $(contenido).eq(1).text().trim();
					tasaEuroCompra = 0;
					tasaEuroVenta = 0;
					break;
				case 'bancolopezdeharo': 
					tasaDolarCompra = $(contenido).eq(0).text().trim();
					tasaDolarVenta = $(contenido).eq(1).text().trim();
					tasaEuroCompra = $(contenido).eq(2).text().trim();
					tasaEuroVenta = $(contenido).eq(3).text().trim();
					break;
				case 'bancoademi': 
					tasaDolarCompra = $(contenido).eq(0).text().trim();
					tasaDolarVenta = $(contenido).eq(1).text().trim();
					tasaEuroCompra = 0;
					tasaEuroVenta = 0;
					break;
				case 'bancobdi': 
					tasaDolarCompra = $(contenido).eq(0).text().trim();
					tasaDolarVenta = $(contenido).eq(1).text().trim();
					tasaEuroCompra = 0;
					tasaEuroVenta = 0;
					break;
				case 'bancorio':
					textoTasas = (contenido);
					textoTasasSplit = textoTasas.split("&");
					tasaDolarCompra = textoTasasSplit[0].split("$")[1].trim();
					tasaDolarVenta = textoTasasSplit[1].split("$")[1].trim();
					tasaEuroCompra = 0;
					tasaEuroVenta = 0;
					break;
				case 'bancobhd':
					tasasDolarSplit = $(contenido).attr("dolar").split("/");
					tasasEuroSplit = $(contenido).attr("euro").split("/");
					tasaDolarCompra = tasasDolarSplit[0];
					tasaDolarVenta = tasasDolarSplit[1];
					tasaEuroCompra = tasasEuroSplit[0];
					tasaEuroVenta = tasasEuroSplit[1];
					break;
			}
			
			var diferencialCompraVentaDolar = 0;
			var diferencialCompraVentaEuro = 0;
			diferencialCompraVentaDolar = tasaDolarVenta - tasaDolarCompra;
			diferencialCompraVentaEuro = tasaEuroVenta - tasaEuroCompra;
			
			//alert(key + '\ndiferencialCompraVentaDolar: ' + diferencialCompraVentaDolar + "\ndiferencialCompraVentaEuro: " + diferencialCompraVentaEuro);

			tasas[0] = 'tDC: ' + tasaDolarCompra + ' | tDV: ' + tasaDolarVenta + ' | tEC: ' + tasaEuroCompra + ' | tEV: ' + tasaEuroVenta + ' | dCVD: ' + diferencialCompraVentaDolar + ' | dCVE: ' + diferencialCompraVentaEuro + ' | banco: ' + key + ' | id: ' + id + ' | idProceso: ' + idProceso;
			tasas[1] = {data:{indicadores:{tDCXXX1:tasaDolarCompra, tDVXXX2:tasaDolarVenta, tECXXX3:tasaEuroCompra, tEVXXX4:tasaEuroVenta, dCVDXXX25:diferencialCompraVentaDolar, dCVEXXX26:diferencialCompraVentaEuro}, banco:key, id:id, idProceso:idProceso}};
			tasasObj[key] = tasas[1];
			return tasas;
		}
		
		$("input").click(function() {
			setTasas($(this).attr('name'));
		});
		
		function setTasas(key){
			var myData = $('#texto' + key).html();
			
			$.ajaxSetup({
				error:function(x,e){
					if(x.status==0){
					alert('You are offline!!\n Please Check Your Network.');
					}else if(x.status==404){
					alert('Requested URL not found.');
					}else if(x.status==500){
					alert('Internel Server Error.');
					}else if(e=='parsererror'){
					alert('Error.\nParsing JSON Request failed.');
					}else if(e=='timeout'){
					alert('Request Time out.');
					}else {
					alert('Unknow Error.\n'+x.responseText);
					}
				}
			});
			
			$.ajax({
			   type: "POST",
			   url: "/web/index.php/settasas/index",
			   data: tasasObj[key],
			   dataType: "text",
			   success: function(msg){
				 //alert( "Data Saved: " + msg );
			   },
			   error: function(msg){
				 alert( "error: " + msg );
			   },
			 });
		}
		
	});
</script>

<body>

<h3 style="font-family:Verdana, Geneva, sans-serif">Tasas Dolar y Euro de los Principales Bancos de República Dominicana</h3>
<font face="Verdana, Geneva, sans-serif" size="2">Generado al: <strong><?php echo(date("d-M-Y / h:i:s a")) ?></strong></font>
<BR>
<BR>
<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#CCCCCC" style="font-family:Verdana, Geneva, sans-serif; font-size:12px;">
<?php
	foreach ($empresas as $id => $empresa):
?>
  <tr>
    <td bgcolor="#FFFFFF" style="display:none;" valign="top"><div style="display:none; border:1px solid #cccccc; height:100%;" id="result<?php echo($empresa->key); ?>"></div><textarea id="contenido<?php echo($empresa->key); ?>" name="contenido<?php echo($empresa->key); ?>" rows="7" style="width:100%"><?php print_r($empresa); ?></textarea></td>
    <td bgcolor="#FFFFFF" width="200" valign="middle" align="left"><?php echo($empresa->name); ?></td>
    <td bgcolor="#FFFFFF" valign="top"><div id="texto<?php echo($empresa->key); ?>" name="texto<?php echo($empresa->key); ?>" style="width:100%"></div></td>
    <td bgcolor="#FFFFFF" valign="top"><input type="button" id="tasas<?php echo($empresa->key); ?>" name="<?php echo($empresa->key); ?>" value="Tasas: <?php echo($empresa->name); ?>" /></div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" colspan="4"><div style="border:1px solid #cccccc;" id="error<?php echo($empresa->key); ?>"></div></td>
  </tr>
	<script type="text/javascript">
    	tasasObj['<?php echo($empresa->key); ?>'] = null;
    </script>
<?php
	endforeach;
?>
</table>
</body>
</html>