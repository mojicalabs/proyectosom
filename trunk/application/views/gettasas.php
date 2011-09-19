
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
 
		$("#resulttricom").load("http://tarifasrd.com/web/index.php/gethtml/index/tricom #hor-zebra tbody", {"url":"http://tricom.net/SiteArticlesview.aspx?ArticleID=31"}, function(response, status, xhr) {
			var contenido = $("#resulttricom").html();
			$("#contenidotricom").val($("#resulttricom").html());
			var tasas = getTasasJSON("tricom", contenido, 11);
			$("#textotricom").html(tasas[0]);
			
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#errortricom").html(msg + xhr.status + " " + xhr.statusText);
			} else {
				setTasas($("#tasastricom").attr('name'));
			}
		});

		$("#resultviva").load("http://tarifasrd.com/web/index.php/gethtml/index/viva #plan-fees table tbody p", {"url":"http://www.viva.com.do/planes/nuevo-plan-prepago"}, function(response, status, xhr) {
			var contenido = $("#resultviva").html();
			$("#contenidoviva").val($("#resultviva").html());
			var tasas = getTasasJSON("viva", contenido, 11);
			$("#textoviva").html(tasas[0]);
			
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#errorviva").html(msg + xhr.status + " " + xhr.statusText);
			} else {
				setTasas($("#tasasviva").attr('name'));
			}
		});

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
				case 'viva': 
					tasaDolarCompra = $(contenido).eq(0).text().trim();
					tasaDolarVenta = $(contenido).eq(1).text().trim();
					tasaEuroCompra = 0;
					tasaEuroVenta = 0;
					break;
				case 'tricom':
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
			alert(myData);
			
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
			
			//$.ajax({
//			   type: "POST",
//			   url: "/web/index.php/settasas/index",
//			   data: tasasObj[key],
//			   dataType: "text",
//			   success: function(msg){
//				 //alert( "Data Saved: " + msg );
//			   },
//			   error: function(msg){
//				 alert( "error: " + msg );
//			   },
//			 });
		}
		
	});
</script> 
 
<body> 

<h3 style="font-family:Verdana, Geneva, sans-serif">Tasas Dolar y Euro de los Principales Bancos de República Dominicana</h3> 
<font face="Verdana, Geneva, sans-serif" size="2">Generado al: <strong>16-Sep-2011 / 04:07:20 pm</strong></font> 
<BR> 
<BR> 
<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#CCCCCC" style="font-family:Verdana, Geneva, sans-serif; font-size:12px;"> 
  <tr> 
    <td bgcolor="#FFFFFF" style="display:block;" valign="top"><div style="display:block; border:1px solid #cccccc; height:100%;" id="resulttricom"></div></td> 
    <td bgcolor="#FFFFFF" width="200" valign="middle" align="left">Banco BDI</td> 
    <td bgcolor="#FFFFFF" valign="top"><div id="textotricom" name="textotricom" style="width:100%"></div></td> 
    <td bgcolor="#FFFFFF" valign="top"><input type="button" id="tasastricom" name="tricom" value="Tasas: Banco BDI" /></td>
    <td bgcolor="#FFFFFF" width="200" valign="top"><textarea id="contenidotricom" name="contenidotricom" rows="7" style="width:100%"></textarea></td>
  </tr> 
  <tr> 
    <td bgcolor="#FFFFFF" colspan="4"><div style="border:1px solid #cccccc;" id="errortricom"></div></td> 
  </tr> 
	<script type="text/javascript"> 
    	tasasObj['tricom'] = null;
    </script> 
  <tr> 
    <td bgcolor="#FFFFFF" style="display:block;" valign="top"><div style="display:block; border:1px solid #cccccc; height:100%;" id="resultviva"></div></td> 
    <td bgcolor="#FFFFFF" width="200" valign="middle" align="left">Banco BDI</td> 
    <td bgcolor="#FFFFFF" valign="top"><div id="textoviva" name="textoviva" style="width:100%"></div></td> 
    <td bgcolor="#FFFFFF" valign="top"><input type="button" id="tasasviva" name="viva" value="Tasas: Banco BDI" /></td>
    <td bgcolor="#FFFFFF" width="200" valign="top"><textarea id="contenidoviva" name="contenidoviva" rows="7" style="width:100%"></textarea></td>
  </tr> 
  <tr> 
    <td bgcolor="#FFFFFF" colspan="4"><div style="border:1px solid #cccccc;" id="errorviva"></div></td> 
  </tr> 
	<script type="text/javascript"> 
    	tasasObj['viva'] = null;
    </script> 
</table> 
</body> 
</html>