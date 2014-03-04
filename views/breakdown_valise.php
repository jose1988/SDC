<?php

if(isset($_POST["guardar"]) && (isset($_POST["idc"]) || isset($_POST["idr"])) ){
		try{
			$registrosFallidos=$_POST["ide"];
			$registrosConfimados=$_POST["idr"];
			$contadorEliminados=0;
			$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
			if(isset($registrosFallidos)){
			$datosValija = array('idval' => $_SESSION["Usuario"]->return->idusu, 'status'=> "entregado con ausente");
			
			
			   
			}else{
				$datosValija = array('idval' => $_SESSION["Usuario"]->return->idusu, 'status'=> "entregado");
			}
			
			
			if(isset($registrosConfimados)){	
				
			for($j=0; $j<$_SESSION["idc"]; $j++){
			    if(isset($registrosConfimados[$j])){
				$datosAct = array('localizacion' => "Sede Destino", 'idpaq'=> $registrosConfimados[$j]);
				$client->actualizacionLocalizacionRecibidoPaquete($datosAct);
			
				$contadorEliminados++;
				}		
				if($contadorEliminados==count($_POST["ide"])){
					break;
				}
			  }	
			}
				
  $idValija = $client->entregarValija($datosValija);
  
  
		 } catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../views/index.php');
		}
		//javaalert("Los registros han sido habilitados");
		//iraURL('inbox.php');
	}else if(isset($_POST["guardar"])){
		javaalert("Debe seleccionar al menos un registro");
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
            </div><!--Caso pantalla uno-->
            <div class="row-fluid">
                <div class="span2">
                    <ul class="nav nav-pills nav-stacked">
                        <li> <a href="inbox.php">Atrás</a> <li>
                        <li> <a href="valise_report.php">Reportar Valija</a> <li>
                    </ul>
                </div>

                <div class="span10">
                    <div class="tab-content" id="lista">
                        <h2> <strong> Desglozar Valija </strong> </h2>
                        <form class="form-Dvalija" method="post" id="fval">
                            Código de Valija:  <input type="text" id="idval" name="idval" class="input-medium search-query">
                            <button type="button"  onClick="Valija();" class="btn">Buscar</button>
                        </form>
                        
                        <div id="valija">
                  
						</div>
                       
                        <?php /* ?><div class='alert alert-block' align='center'>
                          <h2 style='color:rgb(255,255,255)' align='center'>Atención</h2>
                          <h4 align='center'>No hay usuarios </h4><?php */ ?>
                        <form method="POST" id="botn">
                            <div align="center"><button type="submit" class="btn" name="guardar" >Confirmar entrega</button></div>
                        </form> 
                    </div>

                    <!-- /container -->
                    <div id="footer" class="container">    	
                    </div>
                </div>
            </div>
        </div>


<div id="alert">

</div>
        <script>
            //window.onload = function(){killerSession();}
            //
            //function killerSession(){
            //setTimeout("window.open('../recursos/cerrarsesion.php','_top');",300000);
            //}
        </script>
        
        <script>
	
	function Valija(){
			var idval= document.forms.fval.idval.value;
			 var parametros = {
                "idval" : idval
       		 };
			$.ajax({
           	type: "POST",
           	url: "../ajax/breakdown_valise.php",
           	data: parametros,
           	dataType: "text",
			success:  function (response) {
            	$("#valija").html(response);
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