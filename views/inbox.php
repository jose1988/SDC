
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


         <?php 
		 $i=0;
		  while($i<$reg){
			$aux=$BandejaUsu->return[$i]->nombreiba;
				?>
             <li>   
      <a href="javascript:;" id="<?php echo $aux ?>" onClick="Bandeja(<?php echo "'".$aux."'" ?>);" >  
             
             <?php echo ($BandejaUsu->return[$i]->nombreiba); ?> 
            
            
         
          </a>
           </li>
        
         
          <?php
			 
		  $i++;
		   }
		    
		  ?>
      
     </ul>
     
      
      <?php 
	  
					   if($SedeRol->return->idrol->idrol=="1"|| $SedeRol->return->idrol->idrol=="3"){ ?>
						   
						<a href="operator_level.php" ><button type="button" class="btn btn-info btn-primary " value="Recibir paquete">  Recibir paquete del usuario  </button> </a>
						   
					  <?php }
					    if($SedeRol->return->idrol->idrol=="2"|| $SedeRol->return->idrol->idrol=="5"){ ?>
							
						<a href="headquarters_operator.php" > <button type="button"class="btn btn-info btn-primary"  value="Recibir paquete">  Recibir paquete del usuario   </button> </a>
						   
					  <?php }
					    if($SedeRol->return->idrol->idrol=="4" || $SedeRol->return->idrol->idrol=="5"){ ?>
							
					<a href="create_valise.php" ><button type="button" class="btn btn-info btn-primary" value="Realizar Valija">  Realizar Valija para enviar </button> </a>
						  
					 <?php  }
					   
					   ?>
      </div>
      
       <div class="span10">

         <div class="tab-content" id="bandeja"><strong><h2> Recibidos </h2></strong>
          
	<ul id="pagination" class="footable-nav"><span>Pag:</span></ul>
           
           </div>
      
       
      </div>	  

    	</div>
    
		
    <!-- /container -->
	<div id="footer" class="container">    	
	</div>
 <script>
	
	
	function Bandeja(idban){
			
			 var parametros = {

                "idban" : idban
       		 };
			 

		
			$.ajax({
           	type: "POST",
           	url: "../ajax/bandejas.php",
           	data: parametros,
           	dataType: "text",
			success:  function (response) {
            	$("#bandeja").html(response);
			}
		
	    }); 
		
		
	}
	
	
	function Confirmar(idpaq){
			
			 var parametros = {
                "idpaq" : idpaq
       		 };
			$.ajax({
           	type: "POST",
           	url: "../ajax/packeges_confirm.php",
           	data: parametros,
           	dataType: "text",
			success:  function (response) {
            	$("#footer").html(response);
			}
		
	    }); 
		
		
	}
    
    </script>
    
    <script>
window.onload = function(){killerSession();}

function killerSession(){
setTimeout("window.open('../recursos/cerrarsesion.php','_top');",300000);
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
