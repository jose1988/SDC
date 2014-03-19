<?php
session_start();
//try{
include("../recursos/funciones.php");
require_once("../lib/nusoap.php");

if(isset($_SESSION["Usuario"])){
	eliminarSesion();
	}

if (isset($_POST["Biniciar"])) {
   try{
  $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $Usuario= array('user' => $_POST["usuario"]);
  $UsuarioLogIn = $client->consultarUsuarioXUser($Usuario);
  $_SESSION["Usuario"]=$UsuarioLogIn;
  $idUsu= array('idusu' =>$UsuarioLogIn->return->idusu);
  $registroUsu= array('registroUsuario' =>$idUsu);
  $Sedes=$client->consultarSedeDeUsuario($registroUsu);
 
  
  if(isset($UsuarioLogIn->return) && isset($Sedes->return)){
  if(count($Sedes->return)==1){
  $_SESSION["Sede"]=$Sedes;
// echo '<pre>'; print_r($_SESSION["Sede"]); 
 $UsuarioRol = array('idusu' => $_SESSION["Usuario"]->return->idusu, 'sede' => $_SESSION["Sede"]->return->nombresed);
 $SedeRol = $client->consultarSedeRol($UsuarioRol);
 if ($SedeRol->return->idrol->idrol == "2" || $SedeRol->return->idrol->idrol == "5") {
  iraURL("headquarters_operator.php");
 }elseif ($SedeRol->return->idrol->idrol == "1" || $SedeRol->return->idrol->idrol == "3") {
  iraURL("operator_level.php");
 }else{
 javaalert("No tiene privilegios para entrar");
 }
 
  }else{
  $_SESSION["Sedes"]=$Sedes;
  iraURL("headquartersdv.php");

  }
  }else{
  javaalert("Usuario o contraseña incorrectos , por favor verifique");
  }
	

  } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
}
}
	

include("../views/indexSh.php");
 
?>
