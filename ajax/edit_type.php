<?php

    session_start();
    try{
		 include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
		$aux= $_POST['ed'];
	$datosB = array('idusu' => $_SESSION["usuedit"],'tipo' => $aux);
	
	$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $res=$client->editarTipoUsuario($datosB);
  
	}catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('index.php');
		}

?>