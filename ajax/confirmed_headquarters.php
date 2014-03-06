	<?php  
	session_start();
  require_once('../lib/nusoap.php');
  try{
  $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $idPaquete= array('idPaquete' => $_POST['idpaq']);
  $Paquete = $client->ConsultarPaqueteXId($idPaquete); 
 $usu= array('idusu' => $_SESSION["Usuario"]->return->idusu);
	 $sede= array('idsed' => $_SESSION["Sede"]->return->idsed); 
 if(isset($Paquete->return)){
     $idPaquete= array('idpaq' => $_POST['idpaq']);
	$parametros=array('registroPaquete' => $idPaquete,
						'registroUsuario'=>$usu,
						'registroSede'=>$sede);
  $seg = $client->registroSeguimiento($parametros); 
   if($seg->return==0){
       echo "<br>";
		echo"<div class='alert alert-block' align='center'>
			<h2 style='color:rgb(255,255,255)' align='center'>Atención</h2>
			<h4 align='center'>El paquete ya fue confirmado </h4>
		</div> ";
	}
  }else{
  echo "<br>";
		echo"<div class='alert alert-block' align='center'>
			<h2 style='color:rgb(255,255,255)' align='center'>Atención</h2>
			<h4 align='center'>No hay Correspondencia con ese código  </h4>
		</div> ";
  
  }
   $parametros=array('registroSede' => $sede);
   $PaquetesConfirmados = $client->consultarPaquetesConfirmadosXSedeAlDia($parametros); 
 
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
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return->destinopaq->idusubuz->nombreusu." ".$PaquetesConfirmados->return->destinopaq->idusubuz->apellidousu;?></td>
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
                                        <td style='text-align:center'><?php echo $PaquetesConfirmados->return[$i]->destinopaq->idusubuz->nombreusu." ".$PaquetesConfirmados->return[$i]->destinopaq->idusubuz->apellidousu;?></td>
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
<?php
 } catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../pages/inbox.php');
}
 ?>  