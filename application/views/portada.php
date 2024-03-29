<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:fb="http://www.facebook.com/2008/fbml"> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="title" content="Ahorre dinero en gasolina, tel&eacute;fonos celulares, planes de tel&eacute;fonos celulares y tarjetas de cr&eacute;dito." />
    <meta name="description" content='Ahorre dinero en gasolina, tel&eacute;fonos celulares, planes de tel&eacute;fonos celulares y tarjetas de cr&eacute;dito.'/>
    <link rel="image_src" href="<?php echo base_url(); ?>application/images/bsk_new_logo_24.png" /> 
    <title>Todas las tarifas de la República Dominicana</title>
	<link rel="shortcut icon" href="favicon.png" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/css/v4-main-min.css"/> 
	<script type="text/javascript" src="<?php echo base_url(); ?>application/script/jquery-1.6.1.min.js"></script>

	<style type="text/css">
		.menuItem {
			font-family: Verdana, Geneva, sans-serif;
			font-size: 14px;
			background-color:green;
			color:white;
			border:1px solid #FFF;
			height:25px;
		}
		.menuItemFont {
			font-family: Verdana, Geneva, sans-serif;
			font-size: 14px;
			color:white;
			text-decoration:none;
		}
		.centerText {
			text-align: center;
			font-family: Verdana, Geneva, sans-serif;
			font-size: 12px;
		}
		.centerWhiteText {
			text-align: center;
			font-family: Verdana, Geneva, sans-serif;
			font-size: 14px;
			color:white;
		}
    </style>
    
	<script type="text/javascript">
		$(document).ready(function(){

			$("#portada").click(function() {
				alert('User clicked on.');
			});			

			iFrameHeight('content');
			
            function iFrameHeight(id){
                var h = 0;
                if ( !document.all ){
                    h = document.getElementById(id).contentDocument.height;
                    document.getElementById(id).style.height = h + 60 + 'px';
                } else if( document.all ){
                    h = document.frames(id).document.body.scrollHeight;
                    document.all.blockrandom.style.height = h + 20 + 'px';
                }
            }

		});
    </script>

</head>
			
<body id="portada" class="{page:{name:'landing'},popunder:{url:'',event:'load',h:'',w:''}} billshrink landing yui-skin-sam loggedin lpv tvtrue loggedout inactiveuser landing"> 
<div id="gomez" class="gomez production">
    <div id="container" class="wireless" style="background-color:#EFF0DE;">
    		<div style="width:100%;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="220"><img src="<?php echo base_url(); ?>application/images/logo.jpg" alt="" width="204" height="79" style="margin-top:10px;" /></td>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td valign="middle" align="center"><h1 style="color:green;">Todas las tarifas de la República Dominicana</h1></td>
                          </tr>
                        </table>
                    </td>
                  </tr>
                  <tr>
                    <td width="220"></td>
                    <td>
                        <table width="100%" border="0" cellspacing="1" cellpadding="2">
                          <tr>
                            <td valign="middle" align="center" class="menuItem"><a href="#inicio" class="menuItemFont">Inicio</a></td>
                            <td valign="middle" align="center" class="menuItem"><a href="#quienessomos" class="menuItemFont">¿Quiénes Somos?</a></td>
                            <td valign="middle" align="center" class="menuItem"><a href="#servicios" class="menuItemFont">Servicios</a></td>
                            <td valign="middle" align="center" class="menuItem"><a href="#contactenos" class="menuItemFont">Contáctenos</a></td>
                          </tr>
                        </table>
                    </td>
                  </tr>
                </table>
            </div>
            <div id="bd"> 
                <div id="homepage_layout_tabs" class="_tabs {tabs:{ fx: { 'opacity':'toggle', duration: 250 } }}"> 
                    <div id="homepage_pre" class="">
                      <div id="publicitySpace" class="centerWhiteText">
							<!--Espacio para colocar texto o publicidad-->
                      </div>
                      <div id="homepage_col2" class="col"> 
                            <div id="homepage_vertical_tabs" class="_tabs"> 
                              <ul class="ui-tabs-nav">
									<?php
                                        $counter = 0;
                                        foreach ($tipos_empresas as $id => $tipo_empresa):
                                            $counter++;
                                    ?>
                                    <li class="<?php if ($tipo_empresa->nombreTipo == 'Bancos'){echo('ui-tabs-first ui-state-active ui-tabs-selected');}; ?>"> 
                                        <a id="hompage_tab_<?php echo($tipo_empresa->id); ?>-button" href="#hompage_tab_<?php echo($tipo_empresa->id); ?>" class="_track"> 
                                            <!--<em class="icon-large-wireless"></em>-->
                                            <span class="h2 white">&nbsp;&nbsp;&nbsp;<?php echo($tipo_empresa->nombreTipo); ?></span> 
                                            <span class="p"> 
                                            </span> 
                                        </a> 
                                    </li> 
                                    <?php
                                        endforeach;
                                    ?>
                              </ul> 

									<?php
                                        $counter = 0;
                                        foreach ($tipos_empresas as $id => $tipo_empresa):
                                            $counter++;
                                    ?>
                                    <div id="hompage_tab_<?php echo($tipo_empresa->id); ?>" class="box-white-bevel ui-tabs-hide col"> 
                                      <div class="top" style="width:670px;"><div class="left"></div><div class="right"></div></div> 
                                      <div id="content" class="content" style="width:610px; height:1500px;">
                                      <!--<iframe frameborder="0" src="<?php //echo base_url(); ?>index.php/home/index/<?php echo($tipo_empresa->id); ?>/0" height="100%" width="100%" scrolling="yes"></iframe>-->

                                      <iframe
                                            Xonload="iFrameHeight('blockrandom')"
                                            id="blockrandom"
                                            name="iframe"
                                            src="<?php echo base_url(); ?>index.php/home/index/<?php echo($tipo_empresa->id); ?>/0"
                                            width="100%"
                                            height="1500px"
                                            scrolling="auto"
                                            align="top"
                                            frameborder="0"
                                            class="wrapper">
                                                Esta opción no funcionará correctamente. Desafortunadamente, su navegador no soporta recuadros en línea.
                                      </iframe>                                      
                                      
                                      
                                      </div> 
                                      <div class="bottom" style="width:670px;"><div class="left"></div><div class="right"></div></div> 
                                    </div> 
                                    <?php
                                        endforeach;
                                    ?>
                                <div class="clear"></div> 
                            </div> 
                 
                      </div> 
                        <div class="clear"></div> 
                        <div class="homebot"><div class="left"></div><div class="right"></div></div> 
                    </div> 
              </div> 
      </div> 
  </div> 
            
        <div id="ft"> 
            <div class="copyright">Copyright &copy; 2007-2010 TarifasRD, SRL. Todos los derechos reservados.</div> 
        </div> 
        
        <div id="hidden-content"> 
		  <script type="text/javascript" src="<?php echo base_url(); ?>application/script/quant.js"></script>
            
          <script type="text/javascript" src="<?php echo base_url(); ?>application/script/ga.js"></script>
            
          <script type="text/javascript">
                var pageTracker = null;
                try {
                    pageTracker = _gat._getTracker("UA-3148549-8");		
                    pageTracker._setDomainName("tarifasrd.com");
                    pageTracker._trackPageview('/page/landing/index');
                    pageTracker._trackPageview();
                } catch(err) {}
            </script>
            
          <script type="text/javascript" src="<?php echo base_url(); ?>application/script/v4-base-min.js"></script> 
                    
          <script type="text/javascript" src="<?php echo base_url(); ?>application/script/homepage-min.js"></script> 
                    
          <script type="text/javascript">
                // <![CDATA[
                if('undefined' == typeof(jQuery)) {
                } else {
                    (function($) {
                        $(function(){
                            $.message("health.landing.areyousure","Are you sure you want to delete this record?");
                            $.message("gas.results.wefound","We found");
                            $.message("gas.results.recommended","recommended gas stations on your commute");
                            $.message("gas.results.1recommended","recommended gas station on your commute");
                            $.message("buxwatch.progress.processing","Procesando...");
                            $.message("landing.homelogin.haveanacct","¿Tiene una cuenta? Por favor, inicie sesión a continuación.");
                            $.message("creditcard.compare.cartfull","Su carrito de comparación está lleno. Retire un ítem antes de agregar otro.	");
                            $.message("creditcard.compare.remove","Eliminar");
                        });
                    })(jQuery);
                }
                // ]]>
            </script> 
        </div> 
</div>
<div align="center">
<?php require_once('sitemeter.php'); ?>
</div>
</body> 
</html> 