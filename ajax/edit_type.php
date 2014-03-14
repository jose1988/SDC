<?php

    session_start();
    try{
		 include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
		$aux= $_POST['ed'];
	$datosB = array('idusu' => $_SESSION["usuedit"],'tipo' => $aux);
	
	if($aux==""){
	javaalert('Debe seleccionar Tipo de usuario'); 
	 iraURL('../pages/edit_type_user.php');	
	}else{
	
	$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $res=$client->editarTipoUsuario($datosB);
   if($res->return==1){
	 javaalert('Tipo de usuario asignado con exito'); 
	 iraURL('../pages/administration.php');
  }else{
	  javaalert('Error al realizar la operacion'); 
	 iraURL('../pages/administration.php'); 
  }
	}
	}catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('index.php');
		}

?>