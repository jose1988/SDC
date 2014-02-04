<?php
include("../recursos/funciones.php");
	if(isset($_POST["guardar"])){
        javaalert("Ha sido confimada la entrega de la valija");
		iraURL("inbox.php");
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
             								
                        					<li><a href="#">editar usuario</a></li>
                        					<li class="divider"></li>
                        					<li><a href="../recursos/cerrarsesion.php" onClick="">Salir</a></li>
                        					<li class="divider"></li>
                        					<li><a href="#">Ayuda</a></li>
                      					</ul>
                                        
                      				</div>
          
          
           
		<!--Caso pantalla uno-->
       <div class="row-fluid">
       
       <div class="span2">
       
      
        <ul class="nav nav-pills nav-stacked">

		<li> <a href="inbox.php">Atrás</a> <li>
    
        <li> <a href="valise_report.php">Reportar Valija</a> <li> 
         
      
     </ul>
     
      </div>
      
       <div class="span10" align="center">
       
       
         <div class="tab-content" id="lista">
       
        <h2> <strong> Desglozar Valija </strong> </h2> 
       
       
    <form class="form-Dvalija" method="post">
  Código de Valija:  <input type="text" class="input-medium search-query">
  <button type="submit" class="btn">Buscar</button>
</form>
               
               </h4>
                
        
        
        
        
           
	<table class='footable table table-striped table-bordered' data-page-size='10'>
    	<thead bgcolor'#FF0000'>
			<tr>
				
            	<th style='width:20%; text-align:center' >Origen</th>
                <th style='width:20%; text-align:center'>Destino</th>
				 <th data-sort-ignore="true" style='width:15%; text-align:center'>Asunto</th>
				 <th  style='width:10%; text-align:center'>Tipo</th>
				<th   data-sort-ignore="true" style='width:15%; text-align:center'>Contenido </th>
				 <th style='width:10%; text-align:center'>C/R</th>
                 <th  data-sort-ignore="true" style='width:30%; text-align:center'>Confirmar</th>
            </tr>
		</thead>
        <tbody>
        		<tr>
                    <td style="text-align:center"> Juan Pérez </td>
                    <td style="text-align:center"> María Chacón </td>
                    <td style="text-align:center"> Entregas </td>
                    <td style="text-align:center"> Doc </td>
                    <td style="text-align:center"> Solicitudes </td>
                    <td style="text-align:center"> Si </td>
                    <td style="text-align:center">  <input name="Confirmar" type="radio" value=""></td>
					 
                </tr>
                
                <tr>
                    <td style="text-align:center"> María Chacón </td>
                    <td style="text-align:center"> Juan Pérez </td>
                    <td style="text-align:center"> Permiso </td>
                    <td style="text-align:center"> Obj</td>
                    <td style="text-align:center"> Varios documentos </td>
                    <td style="text-align:center"> No </td>
                    <td style="text-align:center"> <input name="Confirmar" type="radio" value=""> </td>
					 
                </tr>
                <tr>
                    <td style="text-align:center"> José Moncada </td>
                    <td style="text-align:center"> Mario Gonzalez </td>
                    <td style="text-align:center"> Oficina </td>
                    <td style="text-align:center"> Articulos </td>
                    <td style="text-align:center"> Articulos Varios  </td>
                    <td style="text-align:center"> No </td>
                    <td style="text-align:center"> <input name="Confirmar" type="radio" value=""> </td>
					 
                </tr>
               
	 </tbody>
  	</table>
    
	<ul id="pagination" class="footable-nav"><span>Pag:</span></ul>
			<br>
		<?php /*?><div class='alert alert-block' align='center'>
			<h2 style='color:rgb(255,255,255)' align='center'>Atención</h2>
			<h4 align='center'>No hay usuarios </h4><?php */?>
				
        
       
       <form method="POST">
	    <div align="center"><button type="submit" class="btn" name="guardar" >Confirmar entrega</button></div>
    </form> 
        
	</div>
	
    <!-- /container -->
	<div id="footer" class="container">    	
	</div>

    
 </div>

    <script>
//window.onload = function(){killerSession();}
//
//function killerSession(){
//setTimeout("window.open('../recursos/cerrarsesion.php','_top');",300000);
//}
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
