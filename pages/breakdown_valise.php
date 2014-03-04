<?php

session_start();
try {
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');

if(!isset($_SESSION["Usuario"])){
	
	iraURL('../index.php');
	}

//echo'<pre>';
// print_r( $_SESSION["Sede"]);
//echo '<pre>';
  $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $i=0;
  $Sede= array('sede' => $_SESSION["Sede"]->return->nombresed);
  
  } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../index.php');	
	}
 $_SESSION["falla"]=0;

include("../views/breakdown_valise.php");



?>
 

