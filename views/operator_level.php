
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Seguros Horizonte | HorizonLine</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- javascript -->
        <script type='text/javascript' src="../js/jquery-1.9.1.js"></script>
        <script type='text/javascript' src="../js/bootstrap.js"></script>
        <script type='text/javascript' src="../js/bootstrap-transition.js"></script>
        <script type='text/javascript' src="../js/bootstrap-tooltip.js"></script>
        <script type='text/javascript' src="../js/modernizr.min.js"></script>
<!--<script type='text/javascript' src="../js/togglesidebar.js"></script>-->	
        <script type='text/javascript' src="../js/custom.js"></script>
        <script type='text/javascript' src="../js/jquery.fancybox.pack.js"></script>

        <!-- styles -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="../css/bootstrap-responsive.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/jquery.fancybox.css" rel="stylesheet">
        <!-- [if IE 7]>
          <link rel="stylesheet" href="font-awesome/css/font-awesome-ie7.min.css">
        <![endif]--> 

        <!--Load fontAwesome css-->
        <link rel="stylesheet" type="text/css" media="all" href="../font-awesome/css/font-awesome.min.css">
        <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- [if IE 7]>
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <link href="../css/footable-0.1.css" rel="stylesheet" type="text/css" />
        <link href="../css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />
        <link href="../css/footable.paginate.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="appBg">
        <div id="header">
            <div class="container header-top-top hidden-phone">
                <img alt="" src="../images/header-top-top-left.png" class="pull-left">
                <img alt="" src="../images/header-top-top-right.png" class="pull-right">
            </div>
            <div class="header-top">
                <div class="container">
                    <img alt="" src="../images/header-top-left.png" class="pull-left">
                    <div class="pull-right">
                    </div>
                </div>
                <div class="filter-area">
                    <div class="container">
                        <span lang="es">&nbsp;</span></div>
                </div>
            </div>
        </div>

        <div id="middle">
            <div class="container app-container">
                <div>
                    <ul class="nav nav-pills">
                        <li class="pull-left">
                            <div class="modal-header">
                                <h3> Correspondencia    
                                <span>SH</span> <?php echo "- ".$_SESSION["Usuario"]->return->userusu; ?>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">				
                                            <span class="icon-cog" style="color:rgb(255,255,255)"> </span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Editar Usuario</a></li>
                                            <li class="divider"></li>
                                            <li><a href="../recursos/cerrarsesion.php" onClick="">Salir</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Ayuda</a></li>
                                        </ul>
                                    </div>
                                </h3>
                            </div>
                        </li>
                    </ul>
                </div>

                <!--Caso pantalla uno-->
                <div class="row-fluid">
                    <div class="span2">      
                        <ul class="nav nav-pills nav-stacked">
                            <li>   
                                <a href="inbox.php">Atrás</a>
                            </li>
                        </ul>
                    </div>
                    <div class="span10">
                        <div class="tab-content" id="bandeja">
                            <form class="form-search" id="formulario">
                                <h2>Recibir paquete</h2>
                                Código de Correspondencia:  <input type="text" id="idpaq" name="idpaq" class="input-medium search-query">
                                <button type="button" class="btn" onClick="Paquete();">Recibir Paquete</button>
                          <div id="data">
						  		 <?php		
   if(isset($PaquetesConfirmados->return)){        
   
       echo "<br>";
	?>
	
         <h2>Correspondencia hoy en el Area de Trabajo</h2>
                            <table class='footable table table-striped table-bordered' data-page-size='10'>    
                                <thead bgcolor='#FF0000'>
                                    <tr>	
                                        <th style='width:7%; text-align:center'>Origen</th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Destino</th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Asunto </th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Tipo</th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Contenido</th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Con Respuesta</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								if(count($PaquetesConfirmados->return)==1){
								  if($PaquetesConfirmados->return->respaq=="0"){
									  $rta="No";
									  }else{
									  $rta="Si";
								  }
								?>
                                    <tr>     
                                       <td  style='text-align:center'><?php echo $PaquetesConfirmados->return->origenpaq->nombreusu." ".$PaquetesConfirmados->return->origenpaq->apellidousu;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return->destinopaq->idusubuz->nombreusu." ".$PaquetesConfirmados->return->destinopaq->idusubuz->apellidousu;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return->asuntopaq;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return->iddoc->nombredoc;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return->textopaq;?></td>
                                        <td style='text-align:center'><?php echo $rta;?></td>  
                                    </tr>   
								<?php	
								}else{
								for($i=0;$i<count($PaquetesConfirmados->return);$i++){
								  if($PaquetesConfirmados->return[$i]->respaq=="0"){
									  $rta="No";
									  }else{
									  $rta="Si";
								  }
								
								?>
                                    <tr>     
                                        <td  style='text-align:center'><?php echo $PaquetesConfirmados->return[$i]->origenpaq->nombreusu." ".$PaquetesConfirmados->return[$i]->origenpaq->apellidousu;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return[$i]->destinopaq->idusubuz->nombreusu." ".$PaquetesConfirmados->return[$i]->destinopaq->idusubuz->apellidousu;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return[$i]->asuntopaq;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return[$i]->iddoc->nombredoc;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return[$i]->textopaq;?></td>
                                        <td style='text-align:center'><?php echo $rta;?></td>  
                                    </tr>   
								<?php															
								}
								}//fin else
								?>  
								</tbody>
                            </table>
							<ul id="pagination" class="footable-nav"><span>Pag:</span></ul>								
							
	<?php				
	}
	?>
						  
						  
						  </div>  
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /container -->
            <div id="footer" class="container">    	
            </div>
        </div>
		<script>
	
	function Paquete(){
			var idpaq= document.forms.formulario.idpaq.value;
			 var parametros = {
                "idpaq" : idpaq
       		 };
			$.ajax({
           	type: "POST",
           	url: "../ajax/view_package_area.php",
           	data: parametros,
           	dataType: "text",
			success:  function (response) {
            	$("#data").html(response);
			}
		
	    }); 
		
		
	}

	</script>
        <script src="../js/footable.js" type="text/javascript"></script>
        <script src="../js/footable.paginate.js" type="text/javascript"></script>
        <script src="../js/footable.sortable.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function() {
                $('table').footable();
            });
        </script>

    </body>
</html>