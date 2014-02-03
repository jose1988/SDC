<?php
//función que direcciona a una pagina especifica
function iraURL($url){
	$ini='<script language="javascript">
				window.location = "';
	$fin='"; </script>';	
	echo $ini.$url.$fin;
}

//alertas
function javaalert($msj){
	$ini='<script language="javascript">	alert("';
	$fin='"); </script>';
	echo $ini.$msj.$fin;
}


if(isset($_POST["reenviar"]) || isset($_POST["reportar"])){
	javaalert('Solicitud Procesada con Exito');
	iraURL('../views/inbox.php');
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
    <script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharts.com/modules/exporting.js"></script>

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
                                          
                    		<h3>Correspondencia
                            
                        		<span>SH</span> - <?php echo "José"; ?>
                                
                          			<div class="btn-group">
                                        
                      					<ul class="dropdown-menu" role="menu">
                        					<li> <a href="../pages/verDocumento.php">Ver Documentos</a> </li>
                      					</ul>
                                        
                      				</div>
                                               
                      				<div class="btn-group">
                      					
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">				
                      						<span class="icon-cog" style="color:rgb(255,255,255)"> </span>
                                        </button>
                                        
                      					<ul class="dropdown-menu" role="menu">                                        
             								<li><a href="../pages/verCuenta.php?id=<?php echo $_SESSION["Usuario"]->return->idusu ?>">Mi Cuenta</a> </li>
                         					<li><a href="../pages/adminUsuario.php" id="idusu">           
             									<h5 align="center"> Administracion Usuario </h5>
                                                </a>
           									</li>
                        					<li><a href="#">Configuración</a></li>
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
      					<a href="inbox.php" style="text-align:center">
             			<?php echo "Atrás" ?>         
          				</a>
           			</li>
     			</ul>
      		</div>
      
			<div class="span10">
            	<form class="form-search" method="post">
       				<div class="tab-content" id="bandeja">
                		<strong> <h2>Paquete Excedente</h2> </strong>                
                		<div align="center">
  							Código de Correspondencia:  <input type="text" class="input-medium search-query">
  							<button type="submit" class="btn" id="reenviar" name="reenviar" >Reenviar</button>
                		</div>               
       		  		</div>
              
              		<div class="tab-content" id="bandeja"> 
              			<strong> <h2>Ausencia de Paquete</h2> </strong>              
              			<div align="center">
                			Por favor detalle el error de la valija, e indique los datos de los paquetes faltantes
  							<textarea rows="10" cols="23" id="reporte" name="reporte" style="width:600px">Detalle...</textarea>
                    		<br>
                    		<br>
  							<button type="submit" class="btn"  id="reportar" name="reportar">Reportar</button>			
              			</div>
              		</div>	  
				</form>
			</div>
    	</div>
	
    </div>
	
    <!-- /container -->
	<div id="footer" class="container">    	
	</div>
    
 </div>
    
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