<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Get Tasas</title>

<script type="text/javascript" src="<?php echo base_url(); ?>application/script/jquery-1.6.1.min.js"></script>

<script type="text/javascript">
	//jQuery(document).ready(function($){
	$(document).ready(function(){
<?php
	//foreach ($bancos as $id => $banco):
?>
//		$("#result<?php //echo($id); ?>").load("<?php //echo base_url(); ?>index.php/gettasas/index/<?php //echo($banco->key); ?> <?php //echo($banco->location); ?>", {url: "<?php //echo($banco->url); ?>"}, function(response, status, xhr) {
//			var result = $("#result<?php //echo($id); ?>").html();
//			alert(result);
//			$("#texto<?php //echo($id); ?>").attr("value", result);
//			if (status == "error") {
//				var msg = "Sorry but there was an error: ";
//				$("#error<?php //echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
//			}
//		});
//		
<?php
	//endforeach;
?>

		<?php $id = "bancopopular"; ?>
		$("#result<?php echo($id); ?>").load("<?php echo base_url(); ?>index.php/gettasas/index/<?php echo($id); ?> .bpd_timp_txt3:not(table)", {"url":"<?php echo($bancos[$id]->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($id); ?>").html();
			var contenido = $("#result<?php echo($id); ?>").html();
			tasaDolarCompra = $(contenido).eq(0).text().trim();
			tasaDolarVenta = $(contenido).eq(1).text().trim();
			tasaEuroCompra = $(contenido).eq(2).text().trim();
			tasaEuroVenta = $(contenido).eq(3).text().trim();
			var tasas = '{"tasaDolarCompra":"' + tasaDolarCompra + '", "tasaDolarVenta":"' + tasaDolarVenta + '", "tasaEuroCompra":"' + tasaEuroCompra + '", "tasaEuroVenta":"' + tasaEuroVenta + '"}';
			$("#texto<?php echo($id); ?>").attr("value", tasas);
			$("#data<?php echo($id); ?>").attr("value", contenido);
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
			}
		});

		<?php $id = "bancoleon"; ?>
		$("#result<?php echo($id); ?>").load("<?php echo base_url(); ?>index.php/gettasas/index/<?php echo($id); ?> .sptlghtIbtasa", {"url":"<?php echo($bancos[$id]->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($id); ?>").html();
			textoTasas = ($(contenido).text());
			textoTasasSplit = textoTasas.split("\n");
			textoTasaSplitCompra = textoTasasSplit[0].split("$");
			textoTasaSplitVenta = textoTasasSplit[1].split("$");
			var tasas = '{"tasaDolarCompra":"' + textoTasaSplitCompra[1].trim() + '", "tasaDolarVenta":"' + textoTasaSplitVenta[1].trim() + '"}';
			$("#texto<?php echo($id); ?>").attr("value", tasas);
			$("#data<?php echo($id); ?>").attr("value", contenido);
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
			}
		});

		<?php $id = "bancoprogreso"; ?>
		$("#result<?php echo($id); ?>").load("<?php echo base_url(); ?>index.php/gettasas/index/<?php echo($id); ?> .denominacion", {"url":"<?php echo($bancos[$id]->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($id); ?>").html();
			tasaDolarCompra = $(contenido).eq(0).text().trim().split('$')[1].trim();
			tasaDolarVenta = $(contenido).eq(1).text().trim().split('$')[1].trim();
			tasaEuroCompra = $(contenido).eq(2).text().trim().split('$')[1].trim();
			tasaEuroVenta = $(contenido).eq(3).text().trim().split('$')[1].trim();
			var tasas = '{"tasaDolarCompra":"' + tasaDolarCompra + '", "tasaDolarVenta":"' + tasaDolarVenta + '", "tasaEuroCompra":"' + tasaEuroCompra + '", "tasaEuroVenta":"' + tasaEuroVenta + '"}';
			$("#texto<?php echo($id); ?>").attr("value", tasas);
			$("#data<?php echo($id); ?>").attr("value", contenido);
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
			}
		});

		<?php $id = "banreservas"; ?>
		$("#result<?php echo($id); ?>").load("<?php echo base_url(); ?>index.php/gettasas/index/<?php echo($id); ?> #table10 tbody td[style='BORDER-BOTTOM: 1px solid; BORDER-TOP: 1px solid']", {"url":"<?php echo($bancos[$id]->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($id); ?>").html();
			tasaDolarCompra = $(contenido).eq(1).text().trim();
			tasaDolarVenta = $(contenido).eq(2).text().trim();
			tasaEuroCompra = $(contenido).eq(4).text().trim();
			tasaEuroVenta = $(contenido).eq(5).text().trim();
			var tasas = '{"tasaDolarCompra":"' + tasaDolarCompra + '", "tasaDolarVenta":"' + tasaDolarVenta + '", "tasaEuroCompra":"' + tasaEuroCompra + '", "tasaEuroVenta":"' + tasaEuroVenta + '"}';
			$("#texto<?php echo($id); ?>").attr("value", tasas);
			$("#data<?php echo($id); ?>").attr("value", contenido);
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
			}
		});

		<?php $id = "bancovimenca"; ?>
		$("#result<?php echo($id); ?>").load("<?php echo base_url(); ?>index.php/gettasas/index/<?php echo($id); ?> .celda2.celda_negro", {"url":"<?php echo($bancos[$id]->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($id); ?>").html();
			tasaDolarCompra = $(contenido).eq(0).text().trim();
			tasaDolarVenta = $(contenido).eq(1).text().trim();
			tasaEuroCompra = $(contenido).eq(2).text().trim();
			tasaEuroVenta = $(contenido).eq(3).text().trim();
			var tasas = '{"tasaDolarCompra":"' + tasaDolarCompra + '", "tasaDolarVenta":"' + tasaDolarVenta + '", "tasaEuroCompra":"' + tasaEuroCompra + '", "tasaEuroVenta":"' + tasaEuroVenta + '"}';
			$("#texto<?php echo($id); ?>").attr("value", tasas);
			$("#data<?php echo($id); ?>").attr("value", contenido);
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
			}
		});

		<?php $id = "bancopromerica"; ?>
		$("#result<?php echo($id); ?>").load("<?php echo base_url(); ?>index.php/gettasas/index/<?php echo($id); ?> #monb1 tr:eq(1) td", {"url":"<?php echo($bancos[$id]->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($id); ?>").html();
			tasaDolarCompra = $(contenido).eq(1).text().trim();
			tasaDolarVenta = $(contenido).eq(2).text().trim();
			var tasas = '{"tasaDolarCompra":"' + tasaDolarCompra + '", "tasaDolarVenta":"' + tasaDolarVenta + '"}';
			$("#texto<?php echo($id); ?>").attr("value", tasas);
			$("#data<?php echo($id); ?>").attr("value", contenido);
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
			}
		});

		<?php $id = "bancocaribe"; ?>
		$("#result<?php echo($id); ?>").load("<?php echo base_url(); ?>index.php/gettasas/index/<?php echo($id); ?> .tasadecambio td", {"url":"<?php echo($bancos[$id]->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($id); ?>").html();
			tasaDolarCompra = $(contenido).eq(0).text().trim();
			tasaDolarVenta = $(contenido).eq(1).text().trim();
			tasaEuroCompra = $(contenido).eq(2).text().trim();
			tasaEuroVenta = $(contenido).eq(3).text().trim();
			var tasas = '{"tasaDolarCompra":"' + tasaDolarCompra + '", "tasaDolarVenta":"' + tasaDolarVenta + '", "tasaEuroCompra":"' + tasaEuroCompra + '", "tasaEuroVenta":"' + tasaEuroVenta + '"}';
			$("#texto<?php echo($id); ?>").attr("value", tasas);
			$("#data<?php echo($id); ?>").attr("value", contenido);
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
			}
		});

		<?php $id = "citibank"; ?>
		$("#result<?php echo($id); ?>").load("<?php echo base_url(); ?>index.php/gettasas/index/<?php echo($id); ?> .tableMoneda tr:eq(1) td", {"url":"<?php echo($bancos[$id]->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($id); ?>").html();
			tasaDolarCompra = $(contenido).eq(0).text().trim();
			tasaDolarVenta = $(contenido).eq(1).text().trim();
			var tasas = '{"tasaDolarCompra":"' + tasaDolarCompra + '", "tasaDolarVenta":"' + tasaDolarVenta + '"}';
			$("#texto<?php echo($id); ?>").attr("value", tasas);
			$("#data<?php echo($id); ?>").attr("value", contenido);
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
			}
		});

		<?php $id = "bancolopezdeharo"; ?>
		$("#result<?php echo($id); ?>").load("<?php echo base_url(); ?>index.php/gettasas/index/<?php echo($id); ?> #curr_exchg [id='usdbuy'],[id='usdsell'],[id='eurbuy'],[id='eursell']", {"url":"<?php echo($bancos[$id]->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($id); ?>").html();
			tasaDolarCompra = $(contenido).eq(0).text().trim();
			tasaDolarVenta = $(contenido).eq(1).text().trim();
			tasaEuroCompra = $(contenido).eq(2).text().trim();
			tasaEuroVenta = $(contenido).eq(3).text().trim();
			var tasas = '{"tasaDolarCompra":"' + tasaDolarCompra + '", "tasaDolarVenta":"' + tasaDolarVenta + '", "tasaEuroCompra":"' + tasaEuroCompra + '", "tasaEuroVenta":"' + tasaEuroVenta + '"}';
			$("#texto<?php echo($id); ?>").attr("value", tasas);
			$("#data<?php echo($id); ?>").attr("value", contenido);
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
			}
		});		

		<?php $id = "bancoademi"; ?>
		$("#result<?php echo($id); ?>").load("<?php echo base_url(); ?>index.php/gettasas/index/<?php echo($id); ?> .img_bottom_der_center [id='ctl00_ContentPlaceHolder1_TasaDelDia1_lblCompra_Dolar'],[id='ctl00_ContentPlaceHolder1_TasaDelDia1_lblVenta_Dolar']", {"url":"<?php echo($bancos[$id]->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($id); ?>").html();
			tasaDolarCompra = $(contenido).eq(0).text().trim();
			tasaDolarVenta = $(contenido).eq(1).text().trim();
			var tasas = '{"tasaDolarCompra":"' + tasaDolarCompra + '", "tasaDolarVenta":"' + tasaDolarVenta + '"}';
			$("#texto<?php echo($id); ?>").attr("value", tasas);
			$("#data<?php echo($id); ?>").attr("value", contenido);
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
			}
		});

		<?php $id = "bancobdi"; ?>
		$("#result<?php echo($id); ?>").load("<?php echo base_url(); ?>index.php/gettasas/index/<?php echo($id); ?> td[style='text-align: right']", {"url":"<?php echo($bancos[$id]->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($id); ?>").html();
			tasaDolarCompra = $(contenido).eq(0).text().trim();
			tasaDolarVenta = $(contenido).eq(1).text().trim();
			var tasas = '{"tasaDolarCompra":"' + tasaDolarCompra + '", "tasaDolarVenta":"' + tasaDolarVenta + '"}';
			$("#texto<?php echo($id); ?>").attr("value", tasas);
			$("#data<?php echo($id); ?>").attr("value", contenido);
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
			}
		});

		<?php $id = "bancorio"; ?>
		$("#result<?php echo($id); ?>").load("<?php echo base_url(); ?>index.php/gettasas/index/<?php echo($id); ?>", {"url":"<?php echo($bancos[$id]->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($id); ?>").html();
			textoTasas = (contenido);
			textoTasasSplit = textoTasas.split("&");
			textoTasaSplitCompra = textoTasasSplit[0].split("$");
			textoTasaSplitVenta = textoTasasSplit[1].split("$");
			var tasas = '{"tasaDolarCompra":"' + textoTasaSplitCompra[1].trim() + '", "tasaDolarVenta":"' + textoTasaSplitVenta[1].trim() + '"}';
			$("#texto<?php echo($id); ?>").attr("value", tasas);
			$("#data<?php echo($id); ?>").attr("value", contenido);
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
			}
		});
		
		<?php $id = "bancobhd"; ?>
		$("#result<?php echo($id); ?>").load("<?php echo base_url(); ?>index.php/gettasas/index/<?php echo($id); ?> item:eq(11)", {"url":"<?php echo($bancos[$id]->url); ?>"}, function(response, status, xhr) {
			var contenido = $("#result<?php echo($id); ?>").html();
			tasasDolarSplit = $(contenido).attr("dolar").split("/");
			tasasEuroSplit = $(contenido).attr("euro").split("/");
			tasaDolarCompra = tasasDolarSplit[0];
			tasaDolarVenta = tasasDolarSplit[1];
			tasaEuroCompra = tasasEuroSplit[0];
			tasaEuroVenta = tasasEuroSplit[1];
			var tasas = '{"tasaDolarCompra":"' + tasaDolarCompra + '", "tasaDolarVenta":"' + tasaDolarVenta + '", "tasaEuroCompra":"' + tasaEuroCompra + '", "tasaEuroVenta":"' + tasaEuroVenta + '"}';
			$("#texto<?php echo($id); ?>").attr("value", tasas);
			$("#data<?php echo($id); ?>").attr("value", contenido);
			if (status == "error") {
				var msg = "Sorry but there was an error: ";
				$("#error<?php echo($id); ?>").html(msg + xhr.status + " " + xhr.statusText);
			}
		});
		
	});
</script>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
	foreach ($bancos as $id => $banco):
?>
  <tr>
    <td width="32%" valign="top"><div style="border:2px solid #000000; height:100%;" id="result<?php echo($banco->key); ?>"></div></td>
    <td valign="middle" align="center"><?php echo($banco->key); ?></td>
    <td width="32%" valign="top"><textarea id="texto<?php echo($banco->key); ?>" name="texto<?php echo($banco->key); ?>" rows="7" style="width:100%"><?php print_r($banco); ?></textarea></td>
    <td valign="middle" align="center"><?php echo($banco->key); ?></td>
    <td width="32%" valign="top"><textarea id="data<?php echo($banco->key); ?>" name="data<?php echo($banco->key); ?>" rows="7" style="width:100%"><?php print_r($banco); ?></textarea></td>
  </tr>
  <tr>
    <td colspan="5"><div style="border:2px solid #000000;" id="error<?php echo($banco->key); ?>"></div></td>
  </tr>
<?php
	endforeach;
?>
</table>

</body>
</html>