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
                                <h3>Correspondecia<span>SH</span> - José
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
                            <li> <a href="enviadosPendientes.php">Atrás</a> <li>
                        </ul>
                    </div>

                    <div class="span10" align="center">
                        <div class="tab-content" id="lista" align="center">                 
                                <h2> Datos del Paquete </h2> 
                                <table class='footable table table-striped table-bordered'>
                                    <tr>			 
                                        <td style="text-align:center"><b>Destino</b></td>
                                        <td style="text-align:center"><?php echo $resultadoPaquete->return->destinopaq->idusubuz->nombreusu.' '.$resultadoPaquete->return->destinopaq->idusubuz->apellidousu?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Asunto</b></td>
                                        <?php if(!isset($resultadoPaquete->return->asuntopaq)){?>
                                        	<td style="text-align:center"><?php echo ""?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><?php echo $resultadoPaquete->return->asuntopaq?></td>
                                        <?php }?>		
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Texto</b></td>
                                        <?php if(!isset($resultadoPaquete->return->textopaq)){?>
                                        	<td style="text-align:center"><?php echo ""?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><?php echo $resultadoPaquete->return->textopaq?></td>
                                        <?php }?>		
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Fecha Paquete</b></td>
                                        <?php if(!isset($resultadoPaquete->return->fechapaq)){?>
                                        	<td style="text-align:center"><?php echo ""?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><?php echo substr($resultadoPaquete->return->fechapaq,0,10)?></td>
                                        <?php }?>		
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Fecha Envio Paquete</b></td>
                                        <?php if(!isset($resultadoPaquete->return->fechaenviopaq)){?>
                                        	<td style="text-align:center"><?php echo ""?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><?php echo substr($resultadoPaquete->return->fechaenviopaq,0,10)?></td>
                                        <?php }?>		
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Fecha Alerta Paquete</b></td>
                                        <?php if(!isset($resultadoPaquete->return->fechaapaq)){?>
                                        	<td style="text-align:center"><?php echo ""?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><?php echo substr($resultadoPaquete->return->fechaapaq,0,10)?></td>
                                        <?php }?>		
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Status</b></td>
                                        <?php if(!isset($resultadoPaquete->return->statuspaq)){ ?>
                                        	<td style="text-align:center"><?php echo ""?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><?php echo $resultadoPaquete->return->statuspaq?></td>
                                        <?php }?>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Localización</b></td>
                                        <?php if(!isset($resultadoPaquete->return->localizacionpaq)){ ?>
                                        	<td style="text-align:center"><?php echo ""?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><?php echo $resultadoPaquete->return->localizacionpaq?></td>
                                        <?php }?>
                                    </tr>                                    
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Prioridad</b></td>
                                        <?php if(!isset($resultadoPaquete->return->idpri)){ ?>
                                        	<td style="text-align:center"><?php echo ""?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><?php echo $resultadoPaquete->return->idpri->nombrepri?></td>
                                        <?php }?>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Mensaje</b></td>
                                        <?php if(!isset($resultadoPaquete->return->idmen)){ ?>
                                        	<td style="text-align:center"><?php echo ""?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><?php echo $resultadoPaquete->return->idmen->nombremen?></td>
                                        <?php }?>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Documento</b></td>
                                        <?php if(!isset($resultadoPaquete->return->iddoc)){ ?>
                                        	<td style="text-align:center"><?php echo ""?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><?php echo $resultadoPaquete->return->iddoc->nombredoc?></td>
                                        <?php }?>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Asunto Valija</b></td>
                                        <?php if(!isset($resultadoPaquete->return->idval)){ ?>
                                        	<td style="text-align:center"><?php echo ""?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><?php echo $resultadoPaquete->return->idval->asuntoval?></td>
                                        <?php }?>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Con Respuesta</b></td>
                                       	<?php if($resultadoPaquete->return->respaq=='0'){?>
                                        	<td style="text-align:center"><?php echo "No"?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><?php echo "Si"?></td>
                                        <?php }?>		
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Sede</b></td>
                                        <?php if(!isset($resultadoPaquete->return->idsed)){ ?>
                                        	<td style="text-align:center"><?php echo ""?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><?php echo $resultadoPaquete->return->idsed->nombresed?></td>
                                        <?php }?>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="50%"><b>Imagen del Paquete</b></td>
                                        <?php if(!isset($resultadoAdjunto->return)){ ?>
                                        	<td style="text-align:center"><?php echo ""?></td>
                                        <?php }
										else{?>
                                        	<td style="text-align:center"><img src="<?php echo $resultadoAdjunto->return->urladj?>"></td>
                                        <?php }?>	
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>