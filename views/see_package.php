<?php
session_start();
if($_GET["id"]=="1"){
$origen="Mario Urdaneta";
$destino="Mayra Mora";
$asunto="Artículos";
$tipo="Doc";
$rta="[X]";
$localizacion="Sede Caracas";
}elseif($_GET["id"]=="2"){
$origen="Sandra Sánchez";
$destino="Jose Moncada";
$asunto="Doc. Digital";
$tipo="Doc";
$rta="[X]";
$localizacion="Receptor 1 sede";
}
elseif($_GET["id"]=="3"){
$origen="Juan Salcedo";
$destino="Mayra Benavides";
$asunto="Permiso";
$tipo="Obj";
$rta="[]";
$localizacion="Receptor 1 origen";
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
                        <li> <a href="#">Mi Cuenta</a> </li> <li>   
      <a href=".#" id="idusu"  > 
             <h5 align="center"> Administracion Usuario </h5>   
          </a>
           </li> 
                        <li><a href="#">Configuración</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Salir</a></li>
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

		<li> <a href="enviadosPendientes.php" style="text-align:center">Atrás</a> <li>

     </ul>
     
      </div>
      
       <div class="span10" align="center">
       
       
 <form id="formulario" method="post">      
         <div class="tab-content" id="lista" align="center"> 
         <h2> Datos del Paquete </h2> 
       <table class='footable table table-striped table-bordered'>
			 <tr>
			 <td style="text-align:center" ><b>Origen</b></td>
				 <td style="text-align:center"><?php echo $origen; ?></td>
		     </tr>
			 <tr>
			 
			 <td style="text-align:center"><b>Destino</b></td>
				<td style="text-align:center"><?php echo $destino; ?></td>
		     </tr>
			 <tr>
			 <td style="text-align:center" width="50%"><b>Asunto</b></td>
				 <td style="text-align:center"><?php echo $asunto; ?> </td>		
			 </tr>			
			 <tr>
			 <td style="text-align:center" width="50%"><b>Con Respuesta</b></td>
				 <td style="text-align:center"><?php echo $rta; ?></td>		
			 </tr>
			 <tr>
			 <td style="text-align:center" width="50%"><b>Localización</b></td>
				 <td style="text-align:center"><?php echo $localizacion; ?></td>		
			</tr>
			<tr>
			 <td style="text-align:center" width="50%"><b>Imagen del Paquete</b></td>
				 <td style="text-align:center"><img src="../images/paquete.jpg"></td>		
			</tr>
			
	</table>
    
</form>  
    </div>
    
    <script>
/*window.onload = function(){killerSession();}

function killerSession(){
setTimeout("window.open('../recursos/cerrarsesion.php','_top');",300000);
}
</script>
<script src="../js/footable.js" type="text/javascript"></script>
<script src="../js/footable.paginate.js" type="text/javascript"></script>
<script src="../js/footable.sortable.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery-2.0.3.js" ></script> 
 
<script type="text/javascript">
 $(document).ready(function() {
 
 
 
 <!-- Codigo para verificar si el nombre del usuario ya existe --> 
   $('#usuario').blur(function(){
	   if($(this).val()!=""){
		           $('#Info').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);
		   }
        var nombre = $(this).val();        
        var dataString = 'nombre='+nombre;
		
		 var parametros = {

                "nombre" : nombre
       		 };
        $.ajax({
            type: "POST",
            url: "../ajax/chequeoNombreUsuario.php",
            data: parametros,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
            }
        });     
 });
 

<!-- Codigo para verificar las contraseñas --> 
   $('#contrasena_c').blur(function(){
	 
	 document.getElementById('fortaleza').style.display='none';
	   
        if($(this).val()!="" && document.forms.formulario.contrasena.value!=""){
			$('#contra').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);
			$('#contra1').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);

		}

        var contrasena_c = $(this).val();        
        var dataString = 'contrasena_c='+contrasena_c;
		var con= document.forms.formulario.contrasena.value;

        $.ajax({
            type: "POST",
           	url: "../ajax/chequeoContrasena.php?contra="+con+"",
            data: dataString,
            success: function(data) {
                $('#contra').fadeIn(1000).html(data);
				$('#contra1').fadeIn(1000).html(data);
            }
        });
    });
	
	$('#contrasena').blur(function(){
		document.getElementById('fortaleza').style.display='none';
		
        if($(this).val()!="" && document.forms.formulario.contrasena_c.value!=""){
			$('#contra').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);
			$('#contra1').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);

		}

        var contrasena = $(this).val();        
        var dataString = 'contrasena='+contrasena;
		var con= document.forms.formulario.contrasena_c.value;
		
        $.ajax({
            type: "POST",
            url: "../ajax/chequeoContrasena.php?contra="+con+"",
            data: dataString,
            success: function(data) {
                $('#contra').fadeIn(1000).html(data);
				$('#contra1').fadeIn(1000).html(data);
            }
        });
    });  
 <!-- Codigo para verificar si el Correo lleva el formato correcto --> 
		$('#correo').blur(function(){
			if($(this).val()!=""){
				$('#Info2').html('<img src="../images/loader.gif" alt="" />').fadeOut(1000);
			}
			var correo = $(this).val();
        	var dataString = 'correo='+correo;
        	$.ajax({
            	type: "POST",
            	url: "../ajax/chequeoCorreo.php",
            	data: dataString,
            	success: function(data) {
                	$('#Info2').fadeIn(1000).html(data);
            	}
        	});     
 		});	
});

 <!-- Codigo para verificar la fortaleza de la contraseña --> 

var numeros="0123456789";
var letras="abcdefghyjklmnñopqrstuvwxyz";
var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";

function tiene_numeros(texto){
   for(i=0; i<texto.length; i++){
      if (numeros.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_letras(texto){
   texto = texto.toLowerCase();
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_minusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_mayusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras_mayusculas.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function seguridad_clave(clave){
	var seguridad = 0;
	if (clave.length!=0){
		if (tiene_numeros(clave) && tiene_letras(clave)){
			seguridad += 30;
		}
		if (tiene_minusculas(clave) && tiene_mayusculas(clave)){
			seguridad += 30;
		}
		if (clave.length >= 4 && clave.length <= 5){
			seguridad += 10;
		}else{
			if (clave.length >= 6 && clave.length <= 8){
				seguridad += 30;
			}else{
				if (clave.length > 8){
					seguridad += 40;
				}
			}
		}
	}
	return seguridad				
}	

function muestra_seguridad_clave(clave,formulario){
	seguridad=seguridad_clave(clave);
	document.getElementById('fortaleza').style.color='#FFFFFF'; 
	if(seguridad>0 && seguridad<=40){
		 document.getElementById('fortaleza').style.display='block'; 
		document.getElementById('fortaleza').style.backgroundColor="#2ECCFA"; 
		formulario.fortaleza.value="Debil";
		}else if(seguridad>40 && seguridad<=70){
			formulario.fortaleza.value="Medio";
			document.getElementById('fortaleza').style.backgroundColor="#5882FA"; 
		}else if(seguridad>70){
			formulario.fortaleza.value="Fuerte";
				document.getElementById('fortaleza').style.backgroundColor="#0404B4"; 
		}else{
				document.getElementById('fortaleza').style.display='none'; 
			}		
}*/
 </script>  

</body>
</html>