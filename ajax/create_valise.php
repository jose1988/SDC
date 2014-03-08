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
<body class="appBg">


	 <?php
	 session_start();
	 include("../recursos/funciones.php");
require_once('../lib/nusoap.php');


  $aux= $_POST['sed'];
$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
 $Sedes= array('sede' => $_SESSION["Sede"]->return->nombresed,'sedeDestino'=> $aux,);
  $Registro = $client->ConsultarPaquetesParaValija($Sedes);
  $reg=0;
  if(isset($Registro->return)){
  $reg=count($Registro->return);
  $_SESSION["reg"]=$reg;
  $_SESSION["seded"]=$aux;
  }else{
	$reg=0;  
  }
   
          echo "<br>";
		   echo "<br>";
          echo "<h2> <strong>".$aux."</h2> </strong>";
          
	
		      echo "</div>";
		  
   if($reg!=0){        
       
         
		echo "<form method='post'>  
		  
		 
       <br>";
	echo "<table class='footable table table-striped table-bordered' align='center' data-page-size='10'>
    	 <thead bgcolor='#FF0000'>
		
                                <tr>
                                    <th style='width:20%; text-align:center' >Origen</th>
                                    <th style='width:20%; text-align:center'>Destino</th>
                                    <th data-sort-ignore='true' style='width:15%; text-align:center'>Asunto</th>
                                    
                                    
                                    <th style='width:10%; text-align:center'>C/R</th>
									<th  style='width:10%; text-align:center'>Fecha</th>
                                    <th  data-sort-ignore='true' style='width:30%; text-align:center'>Agregar</th>
                                </tr>
                            </thead>
        <tbody>
        	<tr>";
			if($reg>1){
				$j=0;
				while($j<$reg){ 
                	
                    echo "<td  style='text-align:center'>".$Registro->return[$j]->origenpaq->nombreusu."</td>";
					 echo "<td  style='text-align:center'>".$Registro->return[$j]->destinopaq->idusubuz->nombreusu."</td>";
					echo "<td style='text-align:center'>".$Registro->return[$j]->asuntopaq."</td>";
					if($Registro->return[$j]->respaq==0){
					echo "<td style='text-align:center'> No </td>";}else{
						echo "<td style='text-align:center'> Si </td>";
					}
                    echo "<td style='text-align:center'>".substr($Registro->return[$j]->fechapaq,0,10)."</td>";  
					
					       
				echo '<td style="text-align:center" width="15%"><input type="checkbox" name="ide['.$j.']" id="ide['.$j.']" value='.$Registro->return[$j]->idpaq.'></td>';                                 
            echo "</tr>";
					$j++;
				} 
			}else{  
					   echo "<td  style='text-align:center'>".$Registro->return->origenpaq->nombreusu."</td>";
					 echo "<td  style='text-align:center'>".$Registro->return->destinopaq->idusubuz->nombreusu."</td>";
					echo "<td style='text-align:center'>".$Registro->return->asuntopaq."</td>";
					if($Registro->return->respaq==0){
					echo "<td style='text-align:center'> No </td>";}else{
						echo "<td style='text-align:center'> Si </td>";
					}
                    echo "<td style='text-align:center'>".substr($Registro->return->fechapaq,0,10)."</td>";  
					
					       
				echo '<td style="text-align:center" width="15%"><input type="checkbox" name="ide[0]" id="ide[0]" value='.$Registro->return->idpaq.'></td>';                                 
            echo "</tr>";
			}
	echo " </tbody>
	
  	</table>
	
	";
	echo '<ul id="pagination" class="footable-nav"><span>Pag:</span></ul>';
   		
		echo "
                                <div align=´'center'><button  class='btn' id='guardar' name='guardar' >Crear Valija</button></div>
     </form>";              
		
	}else {
		echo "<br>";
		echo"<div class='alert alert-block' align='center'>
			<h2 style='color:rgb(255,255,255)' align='center'>Atención</h2>
			<h4 align='center'>No hay Paquetes en Bandeja </h4>
		</div> ";
	}
	
		  
		  
		
		  
  ?>  
 

<script src="../js/footable.js" type="text/javascript"></script>
<script src="../js/footable.paginate.js" type="text/javascript"></script>
<script src="../js/footable.sortable.js" type="text/javascript"></script>
 
  <script type="text/javascript">
    $(function() {
      $('table').footable();
    });
  </script> 
	</div>
	
    <!-- /container -->
	<div id="footer" class="container">    	
	</div>

    
 </div>
