<?php
session_start();
try {
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
if(!isset($_SESSION["Usuario"])){
	
	iraURL("../pages/index.php");
	}elseif(!usuarioCreado()){
	iraURL("../pages/create_user.php");
	}
  $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $usuario= array('user' => $_SESSION["Usuario"]->return->userusu);
  $Usuario = $client->consultarUsuarioXUser($usuario);

			

	  include("../views/view_user.php");

 } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/inbox.php');	
	}



?>
 



