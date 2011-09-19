<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link type="text/css" href="<?php echo base_url(); ?>application/css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="<?php echo base_url(); ?>application/script/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>application/script/jquery-ui-1.8.16.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){
	
				// Tabs
				$('#tabs').tabs();
				
				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
			});
		</script>
		<style type="text/css">
			/*demo page css*/
			body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 0px;}
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
		</style>	
	</head>
	<body>
	<div id="merchantIdentityBlock" style="margin-top: 15px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; width: 330px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(168, 168, 168); border-right-color: rgb(168, 168, 168); border-bottom-color: rgb(168, 168, 168); border-left-color: rgb(168, 168, 168); ">
      <div id="goldAward" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; float: right; "><a href="javascript:void(0);" onclick="window.open('/info_10kaward.php','award','height=250,width=375,menubar=no,status=no,toolbar=no,resizable=yes,scrollbars=yes');" style="color: rgb(9, 9, 174); "></a><br />
      </div>
      <img src="<?php echo base_url(); ?>application/images/logos/<?php echo($empresa->logoEmpresa); ?>" border="0" alt="<?php echo($empresa->nombreEmpresa); ?>" style="border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; border-style: initial; border-color: initial; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; " /><br />
      <h4 class="blackBold18" style="margin-top: 10px; margin-right: 0px; margin-bottom: 3px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-size: 17px; font-weight: bold; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; "><?php echo($empresa->nombreEmpresa); ?></h4>
      <a href="<?php echo($empresa->paginaEmpresa); ?>" target="_blank" style="color: rgb(9, 9, 174); "><?php echo($empresa->paginaEmpresa); ?></a><br />
      </div>
    <br><br>
		<div id="tabs">
		  <ul>
	    <li><a href="#tabs-1">Informaci&oacute;n de Contacto</a></li>
				<li><a href="#tabs-2">Calificaci&oacute;n</a></li>
				<li><a href="#tabs-3">Comentarios</a></li>
			</ul>
			<div id="tabs-1">
			  <table border="0" cellpadding="0" cellspacing="0" id="contactTable" style="border-collapse: collapse; -webkit-border-horizontal-spacing: 0px; -webkit-border-vertical-spacing: 0px; font-size: inherit; ">
			    <tbody>
			      <tr>
			        <th width="150" class="bottomWhiteBorder" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-style: inherit; font-weight: normal; text-align: right; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(255, 255, 255); background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); ">Direcci&oacute;n:</th>
			        <td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-size: 11px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 0px; border-style: initial; border-color: initial; background-color: rgb(255, 255, 255); border-right-style: solid; border-right-color: rgb(243, 243, 243); border-bottom-style: solid; border-bottom-color: rgb(243, 243, 243); text-align: left; "><?php echo($empresa->direccionEmpresa); ?></td>
		          </tr>
			      <tr>
			        <th width="150" class="bottomWhiteBorder" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-style: inherit; font-weight: normal; text-align: right; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(255, 255, 255); background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); ">Sitio Web:</th>
			        <td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-size: 11px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 0px; border-style: initial; border-color: initial; background-color: rgb(255, 255, 255); border-right-style: solid; border-right-color: rgb(243, 243, 243); border-bottom-style: solid; border-bottom-color: rgb(243, 243, 243); text-align: left; "><a href="<?php echo($empresa->paginaEmpresa); ?>" target="_blank" style="color: rgb(9, 9, 174); "><?php echo($empresa->paginaEmpresa); ?></a></td>
		          </tr>
			      <tr>
			        <th width="150" class="bottomWhiteBorder" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-style: inherit; font-weight: normal; text-align: right; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(255, 255, 255); background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); ">Tel&eacute;fono:</th>
			        <td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-size: 11px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 0px; border-style: initial; border-color: initial; background-color: rgb(255, 255, 255); border-right-style: solid; border-right-color: rgb(243, 243, 243); border-bottom-style: solid; border-bottom-color: rgb(243, 243, 243); text-align: left; "><?php echo($empresa->telefonoEmpresa); ?></td>
		          </tr>
			      <tr>
			        <th width="150" class="bottomWhiteBorder" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-style: inherit; font-weight: normal; text-align: right; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(255, 255, 255); background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); ">Fax:</th>
			        <td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-size: 11px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 0px; border-style: initial; border-color: initial; background-color: rgb(255, 255, 255); border-right-style: solid; border-right-color: rgb(243, 243, 243); border-bottom-style: solid; border-bottom-color: rgb(243, 243, 243); text-align: left; "><?php echo($empresa->faxEmpresa); ?></td>
		          </tr>
			      <tr>
			        <th width="150" class="bottomWhiteBorder" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-style: inherit; font-weight: normal; text-align: right; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(255, 255, 255); background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); ">Correo Electr&oacute;nico:</th>
			        <td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-size: 11px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 0px; border-style: initial; border-color: initial; background-color: rgb(255, 255, 255); border-right-style: solid; border-right-color: rgb(243, 243, 243); border-bottom-style: solid; border-bottom-color: rgb(243, 243, 243); text-align: left; "><a href="mailto:<?php echo($empresa->emailEmpresa); ?>" style="color: rgb(9, 9, 174); "><?php echo($empresa->emailEmpresa); ?></a></td>
		          </tr>
		        </tbody>
		      </table>
			  <p style="font-size:14px;"><strong>Mapa:</strong></p>
			  <img src="<?php echo base_url(); ?>application/images/google-map-2.png" width="490" height="345">
          </div>
			<div id="tabs-2">
			  <table id="scoreTable" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; -webkit-border-horizontal-spacing: 0px; -webkit-border-vertical-spacing: 0px; font-size: inherit; ">
			    <tbody>
			      <tr>
			        <th width="150" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-style: inherit; font-weight: normal; text-align: center; background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); "></th>
			        <th width="100" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-style: inherit; font-weight: normal; text-align: center; background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); "><strong>Totales</strong></th>
		          </tr>
			      <tr>
			        <th width="150" class="bottomWhiteBorder" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-style: inherit; font-weight: normal; text-align: center; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(255, 255, 255); background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); ">Bueno (5)</th>
			        <td width="100" align="center" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-size: 11px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 0px; border-style: initial; border-color: initial; background-color: rgb(255, 255, 255); border-right-style: solid; border-right-color: rgb(243, 243, 243); border-bottom-style: solid; border-bottom-color: rgb(243, 243, 243); text-align: center; ">47950</td>
		          </tr>
			      <tr>
			        <th width="150" class="bottomWhiteBorder" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-style: inherit; font-weight: normal; text-align: center; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(255, 255, 255); background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); ">Regular (4)</th>
			        <td width="100" align="center" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-size: 11px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 0px; border-style: initial; border-color: initial; background-color: rgb(255, 255, 255); border-right-style: solid; border-right-color: rgb(243, 243, 243); border-bottom-style: solid; border-bottom-color: rgb(243, 243, 243); text-align: center; ">2323</td>
		          </tr>
			      <tr>
			        <th width="150" class="bottomWhiteBorder" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-style: inherit; font-weight: normal; text-align: center; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(255, 255, 255); background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); ">Normal (3)</th>
			        <td width="100" align="center" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-size: 11px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 0px; border-style: initial; border-color: initial; background-color: rgb(255, 255, 255); border-right-style: solid; border-right-color: rgb(243, 243, 243); border-bottom-style: solid; border-bottom-color: rgb(243, 243, 243); text-align: center; ">1353</td>
		          </tr>
			      <tr>
			        <th width="150" class="bottomWhiteBorder" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-style: inherit; font-weight: normal; text-align: center; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(255, 255, 255); background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); ">Regular (2)</th>
			        <td width="100" align="center" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-size: 11px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 0px; border-style: initial; border-color: initial; background-color: rgb(255, 255, 255); border-right-style: solid; border-right-color: rgb(243, 243, 243); border-bottom-style: solid; border-bottom-color: rgb(243, 243, 243); text-align: center; ">1572</td>
		          </tr>
			      <tr>
			        <th width="150" class="bottomWhiteBorder" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-style: inherit; font-weight: normal; text-align: center; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(255, 255, 255); background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); ">Malo (1)</th>
			        <td width="100" align="center" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-size: 11px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 0px; border-style: initial; border-color: initial; background-color: rgb(255, 255, 255); border-right-style: solid; border-right-color: rgb(243, 243, 243); border-bottom-style: solid; border-bottom-color: rgb(243, 243, 243); text-align: center; ">478</td>
		          </tr>
			      <tr>
			        <th width="150" class="bottomWhiteBorder" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-style: inherit; font-weight: normal; text-align: center; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(255, 255, 255); background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); ">Total de Comentarios</th>
			        <td width="100" align="center" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-size: 11px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 0px; border-style: initial; border-color: initial; background-color: rgb(255, 255, 255); border-right-style: solid; border-right-color: rgb(243, 243, 243); border-bottom-style: solid; border-bottom-color: rgb(243, 243, 243); text-align: center; ">51381</td>
		          </tr>
			      <tr>
			        <th width="150" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-style: inherit; font-weight: normal; text-align: center; background-color: rgb(243, 243, 243); font-size: 11px; font-family: Verdana, Arial, Helvetica; color: rgb(51, 51, 51); ">Calificaci&oacute;n Promedio</th>
			        <td width="100" align="center" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-size: 11px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 0px; border-style: initial; border-color: initial; background-color: rgb(255, 255, 255); border-right-style: solid; border-right-color: rgb(243, 243, 243); border-bottom-style: solid; border-bottom-color: rgb(243, 243, 243); text-align: center; "><strong><img src="http://i.pgcdn.com/images/rating_4_newo2.gif" height="11" width="60" alt="4 Star Review" border="0" style="border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-style: initial; border-color: initial; " /></strong><br />
		            4.60</td>
		          </tr>
		        </tbody>
		      </table>
		  </div>
			<div id="tabs-3">
            
            <!--INICIO BLOQUE MEJOR Y PEOR COMENTARIO-->
            
<div class="cBox secEyebrow" style="position: relative; width: 100%; margin-bottom: 15px; border-top-width: 1px; border-left-width: 1px; border-top-style: solid; border-left-style: solid; border-top-color: rgb(201, 225, 244); border-left-color: rgb(201, 225, 244); border-right-style: none; border-right-width: initial; border-right-color: initial; border-bottom-style: none; border-bottom-width: initial; border-bottom-color: initial; "><span class="cBoxTL" style="position: absolute; display: block; width: 10px; height: 10px; z-index: 1; top: -1px; left: -1px; background-image: url(http://g-ecx.images-amazon.com/images/G/01/common/sprites/sprite-site-wide-2._V181113497_.png); background-position: 0px -40px; background-repeat: no-repeat no-repeat; "> </span><span class="cBoxTR" style="position: absolute; display: block; width: 10px; height: 10px; z-index: 1; top: -1px; right: -1px; background-image: url(http://g-ecx.images-amazon.com/images/G/01/common/sprites/sprite-site-wide-2._V181113497_.png); background-position: -10px -40px; background-repeat: no-repeat no-repeat; "> </span><span class="cBoxR" style="position: absolute; display: block; width: 1px; height: 251px; top: -1px; right: -1px; background-color: rgb(201, 225, 244); "> </span><span class="cBoxBL" style="position: absolute; display: block; width: 10px; height: 10px; z-index: 1; bottom: -1px; left: -1px; background-image: url(http://g-ecx.images-amazon.com/images/G/01/common/sprites/sprite-site-wide-2._V181113497_.png); background-position: 0px -10px; background-repeat: no-repeat no-repeat; "> </span><span class="cBoxBR" style="position: absolute; display: block; width: 10px; height: 10px; z-index: 1; bottom: -1px; right: -1px; background-image: url(http://g-ecx.images-amazon.com/images/G/01/common/sprites/sprite-site-wide-2._V181113497_.png); background-position: -10px -10px; background-repeat: no-repeat no-repeat; "> </span><span class="cBoxB" style="position: absolute; display: block; width: 100%; height: 1px; bottom: -1px; background-color: rgb(201, 225, 244); "> </span>
  <h2 style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(224, 239, 251); padding-top: 6px; padding-right: 8px; padding-bottom: 6px; padding-left: 8px; font-size: 13px; color: rgb(3, 3, 3); background-color: rgb(234, 243, 254); ">
    <div class="crVS crLeft" style="float: left; width: 449px; text-align: center; white-space: nowrap; ">The most helpful favorable review</div>
    <div class="crVS crRight" style="float: right; width: 449px; text-align: center; white-space: nowrap; ">The most helpful critical review</div>
    <br class="crClear" style="clear: both; " />
  </h2>
  <div class="cBoxInner" style="padding-top: 9px; padding-right: 9px; padding-bottom: 9px; padding-left: 9px; ">
    <table class="viewpointBox" cellspacing="0" cellpadding="0" border="0" style="margin-top: -8px; ">
      <tbody>
        <tr>
          <td width="46%" valign="top" style="font-family: verdana, arial, helvetica, sans-serif; font-size: small; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; "><a name="R2J3SMV6VPIZD2" id="R2J3SMV6VPIZD2"></a><br />
            <div>
              <div style="margin-bottom: 0.5em; ">
                <div class="tiny" style="font-family: verdana, arial, helvetica, sans-serif; font-size: x-small; ">15 of 15 people found the following review helpful:</div>
              </div>
              <div><span class="swSprite s_star_4_0" title="4.0 out of 5 stars" style="display: inline-block; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; position: relative; overflow-x: hidden; overflow-y: hidden; vertical-align: middle; background-image: url(http://g-ecx.images-amazon.com/images/G/01/common/sprites/sprite-site-wide-2._V181113497_.png); background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; width: 65px; height: 13px; background-position: -43px 0px; background-repeat: no-repeat no-repeat; ">4.0 out of 5 stars</span><span class="Apple-converted-space"> </span><strong>Nice Classic Looking Watch</strong><br />
                I just purchased this watch through amazon.com. It was either this or the formula one alarm version at costco. The alarm feature on the other version isn't very useful so I decided against it. Packaging was nice, came in the tag box and case with manual. I like the look of chronograph watches and the additional feature to stopwatch anything is something i wanted to...
                <div><a href="http://www.amazon.com/review/R2J3SMV6VPIZD2/ref=cm_cr_pr_viewpnt#R2J3SMV6VPIZD2" title="Read the full review by Bubbles-Desmo" style="font-family: verdana, arial, helvetica, sans-serif; color: rgb(0, 75, 145); "><strong>Read the full review ›</strong></a></div>
              </div>
              <div class="tiny" style="font-family: verdana, arial, helvetica, sans-serif; font-size: x-small; margin-top: 5px; clear: both; ">Published 17 months ago by Bubbles-Desmo</div>
            </div>
            <br />
            <strong class="h3color" style="font-family: verdana, arial, helvetica, sans-serif; color: rgb(228, 121, 17); font-size: small; ">› </strong>See more<span class="Apple-converted-space"> </span><a href="http://www.amazon.com/TAG-Heuer-CAH1110-BA0850-Formula-Chronograph/product-reviews/B0019FP47E/ref=cm_cr_pr_viewpnt_sr_5?ie=UTF8&amp;showViewpoints=0&amp;filterBy=addFiveStar" style="font-family: verdana, arial, helvetica, sans-serif; color: rgb(0, 75, 145); "><strong>5 star</strong></a>,<span class="Apple-converted-space"> </span><a href="http://www.amazon.com/TAG-Heuer-CAH1110-BA0850-Formula-Chronograph/product-reviews/B0019FP47E/ref=cm_cr_pr_viewpnt_sr_4?ie=UTF8&amp;showViewpoints=0&amp;filterBy=addFourStar" style="font-family: verdana, arial, helvetica, sans-serif; color: rgb(0, 75, 145); "><strong>4 star</strong></a><span class="Apple-converted-space"> </span>reviews</td>
          <td width="8%" align="center" valign="middle" style="font-family: verdana, arial, helvetica, sans-serif; font-size: 32px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; font-weight: bold; background-image: url(http://g-ecx.images-amazon.com/images/G/01/x-locale/communities/reviews/tile-vline._V192249891_.gif); background-attachment: scroll; background-origin: initial; background-clip: initial; background-color: transparent; background-position: 50% 50%; background-repeat: no-repeat repeat; "><img src="http://g-ecx.images-amazon.com/images/G/01/x-locale/communities/reviews/tile-vline-vs._V192249916_.gif" width="33" alt="versus" height="39" border="0" /></td>
          <td width="46%" valign="top" style="font-family: verdana, arial, helvetica, sans-serif; font-size: small; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; "><a name="R370G3C861M0KL" id="R370G3C861M0KL"></a><br />
            <div>
              <div style="margin-bottom: 0.5em; ">
                <div class="tiny" style="font-family: verdana, arial, helvetica, sans-serif; font-size: x-small; ">24 of 28 people found the following review helpful:</div>
              </div>
              <div><span class="swSprite s_star_1_0" title="1.0 out of 5 stars" style="display: inline-block; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; position: relative; overflow-x: hidden; overflow-y: hidden; vertical-align: middle; background-image: url(http://g-ecx.images-amazon.com/images/G/01/common/sprites/sprite-site-wide-2._V181113497_.png); background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; width: 65px; height: 13px; background-position: -82px 0px; background-repeat: no-repeat no-repeat; ">1.0 out of 5 stars</span><span class="Apple-converted-space"> </span><strong>Poor quality</strong><br />
                Bought watch at Longs Jewelers in Burlington MA. The stem (the part you wind up) has popped out three times. The first time, they fixed it under warranty. The second time, it was no longer under warranty, so Tag charged me $275. The watch came back and a week later the stem was gone again. I stuffed it in a drawer for a few months (angry) and when I finally got...
                <div><a href="http://www.amazon.com/review/R370G3C861M0KL/ref=cm_cr_pr_viewpnt#R370G3C861M0KL" title="Read the full review by Rohi" style="font-family: verdana, arial, helvetica, sans-serif; color: rgb(0, 75, 145); "><strong>Read the full review ›</strong></a></div>
              </div>
              <div class="tiny" style="font-family: verdana, arial, helvetica, sans-serif; font-size: x-small; margin-top: 5px; clear: both; ">Published 13 months ago by Rohi</div>
            </div>
            <br />
            <strong class="h3color" style="font-family: verdana, arial, helvetica, sans-serif; color: rgb(228, 121, 17); font-size: small; ">› </strong>See more<span class="Apple-converted-space"> </span><span style="color:rgb(102, 102, 102); ">3 star</span>,<span class="Apple-converted-space"> </span><span style="color:rgb(102, 102, 102); ">2 star</span>,<span class="Apple-converted-space"> </span><a href="http://www.amazon.com/TAG-Heuer-CAH1110-BA0850-Formula-Chronograph/product-reviews/B0019FP47E/ref=cm_cr_pr_viewpnt_sr_1?ie=UTF8&amp;showViewpoints=0&amp;filterBy=addOneStar" style="font-family: verdana, arial, helvetica, sans-serif; color: rgb(0, 75, 145); "><strong>1 star</strong></a><span class="Apple-converted-space"> </span>reviews</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>            
            
            <!--FINAL BLOQUE MEJOR Y PEOR COMENTARIO-->
            
            
              <hr>
			  <div id="getprod_subnav" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 6px; padding-right: 0px; padding-bottom: 6px; padding-left: 10px; background-color: rgb(243, 243, 243); color: rgb(102, 102, 102); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(204, 204, 204); height: 24px; clear: both; font-size: 11px; ">
			    <div style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; position: relative; left: 0px; top: 4px; float: left; ">Ordenar comentarios por:<span class="Apple-converted-space">&nbsp;</span><strong><a href="#ordenfecha" style="color: rgb(102, 102, 102); ">Fecha</a></strong><span class="Apple-converted-space">&nbsp;</span><a href="#ordencalificacion" style="color: rgb(102, 102, 102); ">Calificaci&oacute;n</a></div>
			    <div style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; position: relative; left: 0px; float: right; width: 200px; ">
			      <div style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; "><span style="background-image:url(http; background-attachment:initial; background-origin:initial; background-clip:initial; background-color:transparent; padding-top:6px; padding-right:12px; padding-bottom:5px; padding-left:0px; display:block; background-position:100% 0%; background-repeat:no-repeat no-repeat; color:#666680; font-size: 14px;"><strong><a href="#">Escribe un Comentario &raquo;</a></strong></span>
<div id="clear" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; clear: both; "></div>
		          </div>
		        </div>
			  </div>
			  <table id="merchantRatings" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff" border="0" style="border-collapse: collapse; -webkit-border-horizontal-spacing: 0px; -webkit-border-vertical-spacing: 0px; font-size: inherit; margin-top: 15px; ">
			    <tbody>
			      <?php foreach ($comentarios as $comentario): ?>
                  <tr>
			        <td colspan="3" class="dateReviewed" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 3px; padding-right: 4px; padding-bottom: 3px; padding-left: 4px; font-size: 10px; color: rgb(102, 102, 102); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; background-color: rgb(217, 217, 217); font-weight: bold; vertical-align: top; ">Fecha Comentario: <?php echo($comentario->fechaRegistro); ?></td>
		          </tr>
			      <tr>
			        <td class="userInfoReviews" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 10px; padding-right: 5px; padding-bottom: 10px; padding-left: 5px; font-size: 11px; color: rgb(136, 136, 136); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 1px; border-left-width: 1px; border-style: initial; border-color: initial; background-color: rgb(243, 243, 243); border-bottom-style: solid; border-bottom-color: rgb(225, 225, 225); border-left-style: solid; border-left-color: rgb(225, 225, 225); width: 212px; vertical-align: top; ">
                    <table width="100%" border="0" cellspacing="1" cellpadding="4" >
		              <tr>
		                <td><span class="gold" style="font-size: 12px; font-weight: bold; color: rgb(207, 101, 0); "><?php echo($comentario->name); ?></span></td>
	                  </tr>
		              <tr>
			              <td><span class="userInfoReviews" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 10px; padding-right: 5px; padding-bottom: 10px; padding-left: 5px; font-size: 11px; color: rgb(136, 136, 136); font-family: Verdana, Arial, Helvetica; background-color: rgb(243, 243, 243); width: 212px; vertical-align: top; ">De: <?php echo($comentario->from); ?></span></td>
	                  </tr>
			            <tr>
			              <td><div style="white-space: nowrap; "><span class="tiny" style="font-family: verdana, arial, helvetica, sans-serif; font-size: x-small; "><span class="reportingButton"><a rel="nofollow" class="reportingButton" href="#abuso" onclick="var w = window.open(this.href+'&type=popup','reportAbuse','height=380,width=580');w.focus();return false;" style="font-family: verdana, arial, helvetica, sans-serif; color: rgb(0, 75, 145); ">Reportar abuso</a></span><span class="Apple-converted-space">&nbsp;</span></span><span style="color:rgb(204, 204, 204); ">|</span><span class="Apple-converted-space">&nbsp;</span><span class="tiny" style="font-family: verdana, arial, helvetica, sans-serif; font-size: x-small;"><a href="#enlacepermanente" style="font-family: verdana, arial, helvetica, sans-serif; color: rgb(0, 75, 145); ">Enlace permanente</a></span></div></td>
		                </tr>
	                </table>			          <br></td>
			        <td class="userComments" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 12px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-size: 11px; color: rgb(0, 0, 0); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 1px; border-left-width: 1px; border-style: initial; border-color: initial; border-left-style: solid; border-left-color: rgb(225, 225, 225); border-bottom-style: solid; border-bottom-color: rgb(225, 225, 225); vertical-align: top; "><span class="black11" style="font-size: 11px; color: rgb(0, 0, 0);">
                    <strong><?php echo($comentario->subject); ?></strong><br><br>
			          <span class="black11" style="font-size: 11px; color: rgb(0, 0, 0);"><?php echo($comentario->message); ?></span>		            <br>
			        </span></td>
			        <td class="ratingInfo" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 12px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-size: 10px; color: rgb(102, 102, 102); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-style: initial; border-color: initial; background-color: rgb(243, 243, 243); font-weight: bold; width: 100px; text-align: center; border-left-style: solid; border-left-color: rgb(225, 225, 225); border-right-style: solid; border-right-color: rgb(225, 225, 225); border-bottom-style: solid; border-bottom-color: rgb(225, 225, 225); vertical-align: top; "><table width="100%" border="0" cellspacing="1" cellpadding="2">
			          <tr>
			            <td align="center"><span class="userInfoReviews" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 10px; padding-right: 5px; padding-bottom: 10px; padding-left: 5px; font-size: 11px; color: rgb(136, 136, 136); font-family: Verdana, Arial, Helvetica; background-color: rgb(243, 243, 243); width: 212px; vertical-align: top; ">Calificaci&oacute;n</span></td>
		              </tr>
			          <tr>
			            <td>&nbsp;</td>
		              </tr>
			          <tr>
			            <td align="center"><strong><span class="ratingInfo" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 12px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-size: 10px; color: rgb(102, 102, 102); font-family: Verdana, Arial, Helvetica; background-color: rgb(243, 243, 243); font-weight: bold; width: 150px; text-align: center;">
			              <?php for ($stars = 1; $stars <= $comentario->score; $stars++) { ?>
                          <img src="<?php echo base_url(); ?>application/images/rating-star-on.png" width="13" height="12" border="0" />
                          <?php } ?>
                          <?php for ($stars = 1; $stars <= (5 - $comentario->score); $stars++) { ?>
                          <img src="<?php echo base_url(); ?>application/images/rating-star-off.png" width="13" height="12" border="0" />
                          <?php } ?>
                        </span></strong></td>
		              </tr>
			          </table></td>
		          </tr>
			      <tr>
			        <td colspan="3" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-size: 11px; color: rgb(0, 0, 0); font-family: Verdana, Arial, Helvetica; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; vertical-align: top; ">&nbsp;</td>
		          </tr>
                  <?php endforeach; ?>
		        </tbody>
		      </table>
			  <hr>
			  <div id="footerPagination" style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; font-size: 11px; text-align: center; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial; ">P&aacute;gina: 1 |<span class="Apple-converted-space">&nbsp;</span><a class="" href="#" style="color: rgb(9, 9, 174); ">2</a><span class="Apple-converted-space">&nbsp;</span>|<span class="Apple-converted-space">&nbsp;</span><a href="#" style="color: rgb(9, 9, 174); ">3</a><span class="Apple-converted-space">&nbsp;</span>|<span class="Apple-converted-space">&nbsp;</span><a href="#" style="color: rgb(9, 9, 174); ">4</a><span class="Apple-converted-space">&nbsp;</span>|<span class="Apple-converted-space">&nbsp;</span><a href="#" style="color: rgb(9, 9, 174); ">5</a><span class="Apple-converted-space">&nbsp;</span>|<span class="Apple-converted-space">&nbsp;</span><a class="nextLink" href="#" style="color: rgb(9, 9, 174); padding-left: 20px; ">Pr&oacute;xima &raquo;</a>			  </div>
			  <hr>
            </div>
		</div>
	</body>
</html>


