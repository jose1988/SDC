<?php
session_start();
$_SESSION["Usuario"]="LUZ";
try {
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
if(!isset($_SESSION["Usuario"])){
	
	iraURL("../pages/index.php");
	}


  $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $usuario= array('user' => $_SESSION["Usuario"]);
  $Usuario = $client->consultarUsuarioXUser($usuario);
  //echo "<pre>";
  //print_r($Usuario);
  $reg=0;
	if(isset($Usuario->return)){

	}
			
if(isset($_POST["guardar"])){
	 	if($_POST["nombre"]!="" ){		
			$apellido="";
			$telefono1="";
			$telefono2="";
			$direccion1="";
			$direccion2="";
			 if(isset($_POST["habilitado"])){
			 $habilitado="1";
			 }else{
			 $habilitado="0";
			 }
			 if(isset($_POST["apellido"])){
			 $apellido=$_POST["apellido"];
			 }
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
			 if(!isset($_POST["correo"])){
			 $correo="";
			 }else{
			 if(preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}',$_POST["correo"])){						
$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/mariela?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
						$correo=$_POST["correo"];
						  $rol=array('id' => $Usuario->return->idrol->idrol);
						  $Usuario= 
						  array(
						  'idusu' => $Usuario->return->idusu,
						  'nombreusu' => $_POST["nombre"],
						  'apellidousu' => $apellido,
						  'correousu' => $correo,
						  'direccionusu' => $direccion1,
						  'direccion2usu' => $direccion2,
						  'telefonousu' => $telefono1,
						  'telefono2usu' => $telefono2,
						  'userusu'=>$Usuario->return->userusu,
						  'statususu' => $habilitado,
						  'idrol' => $rol);
						  $registroU=array('registroUsuario'=>$Usuario);
							
							try {
							 
							$client->editarUsuario($registroU);
							
								//iraURL('../pages/adminUsuario.php');	
								
							} catch (Exception $e) {
								javaalert('Error al editar el usuario');
								//iraURL('../pages/index.php');
								}
									}
						else{
							javaalert("El formato del correo es incorrecto, por favor verifique");
						
						}
			 }	
					
		}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
		
	  } 
	  include("../views/edit_user.php");

 } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');	
	}



?>
 



