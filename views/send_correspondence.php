<?php
include("../recursos/funciones.php");
	if(isset($_POST["enviar"])){
        javaalert("La Correspondecia ha sido enviada, Recuerde imprimir el comprobante");
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
                          
                          
                          
                      <div class="btn-group" >
                       
                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">				
                      	<span class="icon-cog" style="color:rgb(255,255,255)"> </span>
                       
                        
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Cuenta</a></li>
                        
						
      <a href="../pages/adminUsuario.php" id="adusu"  >  
             
           
             <h5 align="center"> Administracion Usuario </h5>   
            
         
          </a>
           </li> 
          
          
                        <li><a href="#">Configuracion</a></li>
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
          <li> <a href="crearUsuario.php">Átras</a> <li>
    
        <li> <a href="entrada.php">Inicio</a> <li> 

        </ul>
     
      </div>
      
       <div class="span10">
       
         <div class="tab-content" id="Correspondecia">
           
        
    <table> 
        <tr>
        <td>Para:</td><td><input type="text" id="nombr" name="nombr" value="" maxlength="200" size="100" style="width:800px"><br></td>
        </tr>
        <tr>
        <td>Asunto:</td><td><input type="text" id="elcorreo" name="elcorreo" value="" maxlength="50"  size="100" style="width:800px"><br></td>
        </tr>
         <tr>
        <td>Tipo Doc:</td><td><select name="tipos">
        	<option> Documento</option>
            <option> Objetos </option>
            <option> Articulos </option>
            <option> Material </option>
        </select><br></td>
        </tr>
        <tr>
        <td>Prioridad:</td><td><select name="tipos">
        	<option> Importante</option>
            <option> Alta </option>
            <option> Normal </option>
            <option> Baja </option>
        </select><br></td>
        </tr>
        
        <tr>
        <td></td><td>
         Fecha de alerta: <input type="date" name="fechahora">
         Fecha de limite: <input type="date" name="fechahora2">
        <br></td>
        </tr>
        
        
        <tr>
        <td>Imagen (opcional):</td><td>
        
        <FORM method="POST" ENCTYPE="multipart/form-data" action="cargar.php">
          <INPUT type=hidden name=MAX_FILE_SIZE >
          <INPUT type=file name="nom_del_archivo">
          <!--<INPUT type=submit value="enviar"> -->
</FORM><br>
</td>
        </tr>
        <tr>
        <td>Su mensaje: </td><td><textarea  rows="10" cols= "23" id="elmsg" name="elmsg"  style="width:800px">Su comentario...</textarea><br></td>
        </tr>
        <tr>
        <form method="post">
        <td colspan="2" align="right"><input type="submit" value="Enviar Correspondecia" name="enviar"><br>
        
        </td>
        </form>
        </tr>
     
    </table>


      
       
      </div>	  

    	</div>
    
	</div>
	
    <!-- /container -->
	<div id="footer" class="container">    	
	</div>

    
 </div>
 <script>
	
	
	function cargar(){

			$.ajax({
           	type: "POST",
           	url: "../ajax/cargar.php",
           	data: parametros,
           	dataType: "text",
			success:  function (response) {
            	$("#carga").html(response);
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
