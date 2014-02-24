	<?php  
	session_start();
  require_once('../lib/nusoap.php');
  $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/mariela?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $idPaquete= array('idPaquete' => $_POST['idpaq']);
  $rowPaquete = $client->ConsultarPaqueteXId($idPaquete); 
$idsed= array('idsed' => $_SESSION["Sede"]->return->idsed);
  $parametros=array('registroSede' => $idsed);
   $PaquetesConfirmados = $client->consultarPaquetesConfirmadosXSedeAlDia($parametros); 
  //echo '<pre>';
 // print_r($rowPaquete);
	?>
	
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

<div id="data">
	 <?php		
   if(isset($rowPaquete->return)){        
           		  if($rowPaquete->return->respaq=="0"){
				  $rta="No";
				  }else{
				  $rta="Si";
				  }
		 
       echo "<br>";
	?><table class='footable table table-striped table-bordered' align='center' data-page-size='10'>
                                <thead bgcolor='#FF0000'>
                                    <tr>	
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Origen</th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Destino</th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Asunto </th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Tipo</th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Contenido</th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Con Respuesta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>     
                                        <td  style='text-align:center'><?php echo $rowPaquete->return->origenpaq->nombreusu." ".$rowPaquete->return->origenpaq->apellidousu;?></td>
                                        <td style='text-align:center'><?php echo $rowPaquete->return->destinopaq->nombreusu." ".$rowPaquete->return->destinopaq->apellidousu;?></td>
                                        <td style='text-align:center'><?php echo $rowPaquete->return->asuntopaq;?></td>
                                        <td style='text-align:center'><?php echo $rowPaquete->return->iddoc->nombredoc;?></td>
                                        <td style='text-align:center'><?php echo $rowPaquete->return->textopaq;?></td>
                                        <td style='text-align:center'><?php echo $rta;?></td>  
                                    </tr>
                                </tbody>
                            </table>
							<h3></h3><h3></h3>
                                <div align="center"><button type="button" class="btn" onClick="Confirma();" name="confirma" >Confirmar</button></div>

			 <?php		
   if(isset($PaquetesConfirmados->return)){        
   
       echo "<br>";
	?>
	
         <h2>Correspondencia hoy en la Sede</h2>
                            <table class='footable table table-striped table-bordered' data-page-size='10'>    
                                <thead bgcolor='#FF0000'>
                                    <tr>	
                                        <th style='width:7%; text-align:center'>Origen</th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Destino</th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Asunto </th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Tipo</th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Contenido</th>
                                        <th style='width:7%; text-align:center' data-sort-ignore="true">Con Respuesta</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								if(count($PaquetesConfirmados->return)==1){
								  if($PaquetesConfirmados->return->respaq=="0"){
									  $rta="No";
									  }else{
									  $rta="Si";
								  }
								?>
                                    <tr>     
                                       <td  style='text-align:center'><?php echo $PaquetesConfirmados->return->origenpaq->nombreusu." ".$PaquetesConfirmados->return->origenpaq->apellidousu;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return->destinopaq->nombreusu." ".$PaquetesConfirmados->return->destinopaq->apellidousu;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return->asuntopaq;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return->iddoc->nombredoc;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return->textopaq;?></td>
                                        <td style='text-align:center'><?php echo $rta;?></td>  
                                    </tr>   
								<?php	
								}else{
								for($i=0;$i<count($PaquetesConfirmados->return);$i++){
								  if($PaquetesConfirmados->return[$i]->respaq=="0"){
									  $rta="No";
									  }else{
									  $rta="Si";
								  }
								
								?>
                                    <tr>     
                                        <td  style='text-align:center'><?php echo $PaquetesConfirmados->return[$i]->origenpaq->nombreusu." ".$PaquetesConfirmados->return[$i]->origenpaq->apellidousu;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return[$i]->destinopaq->nombreusu." ".$PaquetesConfirmados->return[$i]->destinopaq->apellidousu;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return[$i]->asuntopaq;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return[$i]->iddoc->nombredoc;?></td>
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return[$i]->textopaq;?></td>
                                        <td style='text-align:center'><?php echo $rta;?></td>  
                                    </tr>   
								<?php															
								}
								}//fin else
								?>  
								</tbody>
                            </table>
							<ul id="pagination" class="footable-nav"><span>Pag:</span></ul>								
							
	<?php				
	}
		
	}else {
		echo "<br>";
		echo"<div class='alert alert-block' align='center'>
			<h2 style='color:rgb(255,255,255)' align='center'>Atención</h2>
			<h4 align='center'>No existen Paquetes con ese código </h4>
		</div> ";
	}

    
  ?>  
 	</div>

<script src="../js/footable.js" type="text/javascript"></script>
<script src="../js/footable.paginate.js" type="text/javascript"></script>
<script src="../js/footable.sortable.js" type="text/javascript"></script>
<script>
 	function Confirma(){
			var idpaq= '<?=$_POST['idpaq']?>'; 
			 var parametros = {
                "idpaq" : idpaq
       		 };
			$.ajax({
           	type: "POST",
           	url: "../ajax/confirmadosSede.php",
           	data: parametros,
           	dataType: "text",
			success:  function (response) {
            	$("#data").html(response);
			}
		
	    }); 
		
		
	}
	</script>
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

