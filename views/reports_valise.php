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
                        
                   
							<h3> Correspondencia    
                     <span>SH</span> <?php echo "- José" ?>   
                      
                    
                       
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
            
       			<div class="tab-content" id="bandeja">
                <strong> <h2 align="center">Reporte de Valijas por Hoy</h2> </strong>
                
                <table class='footable table table-striped table-bordered' data-page-size='5'>
        		<thead bgcolor'#FF0000'>
        			<tr>
            			<th style="text-align:center">Origen</th>
                		<th style="text-align:center" data-sort-ignore="true">Destino</th>
                		<th style="text-align:center" data-sort-ignore="true">Tipo</th>
                        <th style="text-align:center" data-sort-ignore="true">Fecha</th>
                        <th style="text-align:center" data-sort-ignore="true">Con Respuesta</th>
           		 	</tr>
        		</thead>
                
        		<tbody>
        			<tr>
            			<td style="text-align:center">Pedro Peréz</td>
              			<td style="text-align:center">María Mora</td>
                		<td style="text-align:center">Obj</td>
                        <td style="text-align:center">03/02/2014</td>
                        <td style="text-align:center">[]</td>
            		</tr>
                    
            		<tr>
            			<td style="text-align:center">María Mora</td>
              			<td style="text-align:center">Sandra Sanchez</td>
                		<td style="text-align:center">Obj</td>
                        <td style="text-align:center">03/02/2014</td>
                        <td style="text-align:center">[]</td>
            		</tr>
                    
            		<tr>
            			<td style="text-align:center">Sandra Sanchez</td>
              			<td style="text-align:center">José Moncada</td>
                		<td style="text-align:center">Doc Dig</td>
                        <td style="text-align:center">03/02/2014</td>
                        <td style="text-align:center">[X]</td>
                    </tr>
                    
         		</tbody>
        		</table>
                <ul id="pagination" class="footable-nav"><span>Pag:</span></ul>
                
                <br>
       			<br>
       			<div id="grafico" style="min-width: 150px; max-width: 850px; height: 350px; margin: 0 auto">   	
        		</div>
                
           		</div>
      		</div>	  

    	</div>
	
    </div>
	
    <!-- /container -->
	<div id="footer" class="container">    	
	</div>
    


    
<script src="../js/footable.js" type="text/javascript"></script>
<script src="../js/footable.paginate.js" type="text/javascript"></script>
<script src="../js/footable.sortable.js" type="text/javascript"></script>


<script> /*Funciones de los gráfico*/
	$(function () {
		
		/*Gráfico del total de los enviados por fallas o no, dependiendo de si posee respuesta o no*/
        $('#grafico').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Reporte de Valijas dependiendo del Origen'
            },
            xAxis: {
                categories: [
					'Caracas',
					'San Cristóbal',
					'Margarita'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad Total'
                }
            },
             tooltip: {
                headerFormat: '<span style="font-size:8px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.01,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Procesadas',
                data: [25.5, 35.5, 39]
    
            }, {
                name: 'Fallas',
                data: [39, 25.5, 35.5]
            }]
        });
		
		
    });
	</script>
 
  <script type="text/javascript">
    $(function() {
      $('table').footable();
    });
  </script>
      </body>
</html>