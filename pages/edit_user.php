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


  $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/mariela?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $usuario= array('user' => $_SESSION["Usuario"]->return->userusu);
  $Usuario = $client->consultarUsuarioXUser($usuario);

			
if(isset($_POST["guardar"])){
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!=""  && isset($_POST["apellido"]) && $_POST["apellido"]!="" && isset($_POST["correo"]) && $_POST["correo"]!="" ){		
			$telefono1="";
			$telefono2="";
			$direccion1="";
			$direccion2="";
			 if(isset($_POST["telefono1"])){
			 $telefono1=$_POST["telefono1"];
			 }
			 if(isset($_POST["telefono2"])){
			 $telefono2=$_POST["telefono2"];
			 }
			 if(isset($_POST["direccion1"])){
			 $direccion1=$_POST["direccion1"];
			 }
			 if(isset($_POST["direccion2"])){
			 $direccion2=$_POST["direccion2"];
			 }
			 if(preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}',$_POST["correo"])){						
						$correo=$_POST["correo"];
						  $registroUsu= 
						  array(
						  'idusu' => $Usuario->return->idusu,
						  'nombreusu' => $_POST["nombre"],
						  'apellidousu' => $_POST["apellido"],
						  'correousu' => $correo,
						  'direccionusu' => $direccion1,
						  'direccion2usu' => $direccion2,
						  'telefonousu' => $telefono1,
						  'telefono2usu' => $telefono2,
						  'userusu'=>$Usuario->return->userusu);
						  $registroU=array('registroUsuario'=>$registroUsu);
						$guardo=$client->editarUsuario($registroU);
						if($guardo->return==0){
						javaalert("No se han Guardado los datos del Usuario, Consulte con el Admininistrador");
						}else{
						javaalert("Se han Guardado los datos del Usuario");
						llenarLog(9, "Edición de Usuario",$_SESSION["Usuario"]->return->idusu,$_SESSION["Sede"]->return->idsed);
						}
						iraURL('../pages/inbox.php');	
			 }	
					
		}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
		
	  } 
	  include("../views/edit_user.php");

 } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/inbox.php');	
	}



?>
 



