<?php
session_start();

include("../recursos/funciones.php");
require_once('../lib/nusoap.php');


?>		 
     
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
	<link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css">
	<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
    <body class="appBg">


	
	 <?php
	
  $aux= $_POST['idval'];
  $_SESSION["valdes"]=$aux;
$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $Val= array('registroValija' =>$aux , 'sede' => $_SESSION["Sede"]->return->nombresed);
  $Valijac = $client->ConsultarValija($Val);
  if(isset($Valijac->return)){
  $Valija = $client->ConsultarPaquetesXValija($Val);
  }
  $reg=0;
  if(isset($Valija->return)){
  $reg=count($Valija->return);
  }else{
	$reg=0;  
  }
   
          
        
          
	
		  
		  
   if($reg!=0){        
          echo "<strong> <h2>  Contenido de la Valija </h2> </strong>";   
          echo "</div>";
		  
		 
       echo "<br>
	   <form id='formv'>";
	echo "<table class='footable table table-striped table-bordered' align='center' data-page-size='10'>
    	 <thead bgcolor='#ff0000'>
                                    <tr>
       <th style='width:7%; text-align:center' >Destino</th>
   <th style='width:7%; text-align:center' data-sort-ignore='true'>Asunto </th>
                                        <th style='width:7%; text-align:center' >Tipo</th>
                                        <th style='width:7%; text-align:center' >Con Respuesta</th>
                                        <th style='width:7%; text-align:center' >Fecha</th>
                                       
                                        <th style='width:7%; text-align:center' data-sort-ignore='true'>Confirmar</th>
										 <th style='width:7%; text-align:center' data-sort-ignore='true'>Reportar</th>

                                    </tr>
         </thead>
        <tbody>
        	<tr>";
			if($reg>1){
				$j=0;
				while($j<$reg){ 
				if(strlen ($Valija->return[$j]->asuntopaq)>10){
								$asunto=substr($Valija->return[$j]->asuntopaq,0,10)."...";
								}else{
									$asunto=$Valija->return[$j]->asuntopaq;
								}
                	
                    echo "<td  style='text-align:center'>".$Valija->return[$j]->destinopaq->idusubuz->nombreusu."</td>";
					 echo "<td  style='text-align:center'>".$asunto."</td>";
					echo "<td style='text-align:center'>".$Valija->return[$j]->iddoc->nombredoc."</td>";
					if($Valija->return[$j]->respaq==0){
					echo "<td style='text-align:center'> No </td>";}else{
						echo "<td style='text-align:center'> Si </td>";
					}
                    echo "<td style='text-align:center'>". date("d/m/Y", strtotime(substr($Valija->return[$j]->fechaenviopaq, 0, 10)))."</td>";  
					echo "
					<td style='text-align:center' width='15%'><input type='checkbox'  onClick='Confirmar(".$Valija->return[$j]->idpaq.");' name='idc[".$j."]' id='idc[".$j."]' value='".$Valija->return[$j]->idpaq."'></td>";                     
					echo " 
					<td style='text-align:center' width='15%'><input type='checkbox' name='idr[".$j."]' id='idr[".$j."]'  onClick='Reportar(".$Valija->return[$j]->idpaq.");' value='".$Valija->return[$j]->idpaq."'></td>";  
			
				            
            echo " </tr>";
			
			
			
					$j++;
				} 
			}else{  
					if(strlen ($Valija->return->asuntopaq)>10){
								$asunto=substr($Valija->return->asuntopaq,0,10)."...";
								}else{
									$asunto=$Valija->return->asuntopaq;
								}
                    echo "<td  style='text-align:center'>".$Valija->return->destinopaq->idusubuz->nombreusu."</td>";
					 echo "<td  style='text-align:center'>".$asunto."</td>";
					echo "<td style='text-align:center'>".$Valija->return->iddoc->nombredoc."</td>";
					if($Valija->return->respaq==0){
					echo "<td style='text-align:center'> No </td>";}else{
						echo "<td style='text-align:center'> Si </td>";
					}
                    echo "<td style='text-align:center'>". date("d/m/Y", strtotime(substr($Valija->return->fechaenviopaq, 0, 10)))."</td>";  
					echo "
					<td style='text-align:center' width='15%'><input type='checkbox'  onClick='Confirmar(".$Valija->return[$j]->idpaq.");' name='idc[0]' id='idc[0]' value='".$Valija->return->idpaq."'></td>";                     
					echo " 
					<td style='text-align:center' width='15%'><input type='checkbox' name='idr[0]' id='idr[0]'  onClick='Reportar(".$Valija->return->idpaq.");' value='".$Valija->return->idpaq."'></td>";  
			          
            echo "</tr>";
			}
	echo " </tbody>
  	</table>
	</form>";
	echo '<ul id="pagination" class="footable-nav"><span>Pag:</span></ul>';
   		
		echo '<form method="POST" id="botn">
                            <div align="center"><button type="submit" class="btn" id="guardar" name="guardar" >Confirmar entrega</button></div>
                        </form> ';
		
	}else {
		echo "<br>";
		echo"<div class='alert alert-block' align='center'>
			<h2 style='color:rgb(255,255,255)' align='center'>Atención</h2>
			<h4 align='center'>la Valija ya fue desglosada o no existe</h4>
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

    