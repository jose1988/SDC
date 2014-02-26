<?php
session_start();
//try{
include("recursos/funciones.php");
require_once("lib/nusoap.php");

if(isset($_SESSION["Usuario"])){
	
	eliminarSesion();
	}

if (isset($_POST["Biniciar"])) {
   
  $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/mariela?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $Usuario= array('user' => $_POST["usuario"]);
  $UsuarioLogIn = $client->consultarUsuarioXUser($Usuario);
  $_SESSION["Usuario"]=$UsuarioLogIn;
  $idUsu= array('idusu' =>$UsuarioLogIn->return->idusu);
  $registroUsu= array('registroUsuario' =>$idUsu);
  $_SESSION["Sede"]=$client->consultarSedeDeUsuario($registroUsu);
  iraURL("views/inbox.php");
  //echo '<pre>';
  //print_r($UsuarioLogIn);
  //echo '<pre>';
 /* if($UsuarioLogIn->return->idusu!="No"){
		
		//echo '<pre>';
		//print_r($resultadoAnalista);
		
		if($UsuarioLogIn->return->passwordusu==$_POST["password"]){
			$_SESSION["Usuario"]=$UsuarioLogIn;
			iraURL("entrada.php");
		}else{
		javaalert( "Contraseña incorrecta");
		}		
  }else{
  		javaalert("el usuario no registrado");
		
  }

}


  } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');	
	}*/
	}

include("views/index.php");
 
?>
