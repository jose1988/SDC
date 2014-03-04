<?php
if (isset($_POST["crear"])) {
    javaalert($_SESSION["usubox"]."  Se ha guardado con exito");
    try{
	$datosB = array('idusu' => $_SESSION["Usuario"]->return->idusu,'idusub' => $_SESSION["usubox"],'sede' => $_SESSION["sedeb"]);
	$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $res=$client->insertarBuzon($datosB);
  
	}catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('index.php');
		}
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Seguros Horizonte | HorizonLine</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- javascript -->
        <script type='text/javascript' src="../js/jquery-2.0.2.js"></script>
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

        <div class="container app-container">
            <div>
                <ul class="nav nav-pills">
                    <li class="pull-left">
                        <div class="modal-header">
                            <h3> Correspondencia    
                                <span>SH</span> <?php echo "- José" ?>
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
                        <li> <a href="send_correspondence.php">Atrás</a> <li>
                    </ul>
                </div>

                <div class="span10" align="center">
                    <div class="tab-content" id="lista" align="center">
                                               
                            <h2>
                            
                             Seleccione la Sede:
                                <select onChange="sede();" name="lista" id="lista"  required  title="Seleccione la Tipo de usuario">
                           <option value="" style="display:none">Seleccionar:</option>
                                            <?php 
								if($reg>1){
									$i=0;
								  while($reg>$i){
								
						echo '<option value="'.$Sedes->return[$i]->nombresed.'" >'.$Sedes->return[$i]->nombresed.'</option>';
						$i++;
						
								  }
								}
								else{
							echo '<option value="'.$Sedes->return->nombresed.'" >'.$Sedes->return->nombresed.'</option>';	  
								}
								?>
                            
                                </select>
                              
                                Seleccione el Usuario:
                                <select onChange="usuario();" id="listau" name="listau"  required  title="Seleccione la Tipo de usuario">
                              <option value="" style="display:none">Seleccionar:</option>  
                                   
                                </select>
                            </h2>
                            <div id="datos">
                            
                            <br>
                            </div>
                            <div class="span11" align="center"></div>
                            <br>
                        
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.onload = function(){killerSession();}
             
             function killerSession(){
             setTimeout("window.open('../recursos/cerrarsesion.php','_top');",300000);
             }
             </script>
      



    </body>
</html>