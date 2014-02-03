<?php

session_start();
try {
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
if(!isset($_SESSION["Usuario"])){
	
	iraURL("../pages/index.php");
	}


  $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $id= array('idUsuario' => $_GET['id']);
  $Usuario = $client->consultarUsuario($id);
  $Permiso = $client->consultarPermisologia($id);
  $Permisologia= $client->listarPermisologia();
  $reg=0;
	if(isset($Usuario->return) && isset($Permiso->return) && isset($Permisologia->return)){
	
	  $reg=count($Usuario->return);
	  $regp=count($Permiso->return);
	  $reglp=count($Permisologia->return);
	}
  } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');	
	}
 // '<pre>';
 //print_r( $BandejaUsu );
  //echo '<pre>';
  
  
			
if(isset($_POST["guardar"])){
	 	if($_POST["nombre"]!=""  && $_POST["clasificacion"]!=""){		
		 try {
	
				$usu= array('user' => $_POST["usuario"]);
				$rowNombreUsuario = $client->consultarUsuario($id);
	    	}catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../views/index.php');
					}
					
			if($rowNombreUsuario->return->idusu!="No"){				
			 if(isset($_POST["ipder"])){
			 $habilitado="1";
			 }else{
			 $habilitado="0";
			 }
			
			 if(!isset($_POST["correo"])){
			 $correo="";
			 }else{
			 if(preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}',$_POST["correo"])){						
						$correo=$_POST["correo"];
						  $per=array('idper' => $_POST["clasificacion"]);
						  $Usuario= 
						  array(
						  'idusu' => $Usuario->return->idusu,
						  'nombreusu' => $_POST["nombre"],
						  'apellidousu' => $_POST["apellido"],
						  'correousu' => $correo,
						  'userusu'=>$Usuario->return->userusu,
						  'passwordusu' => $Usuario->return->passwordusu,			 
						  'statususu' => $habilitado,
						  'idper' => $per);
						  $registroU=array('registroUsuario'=>$Usuario);
							
							try {
							 
							$client->editarUsuario($registroU);
							
								iraURL('../pages/adminUsuario.php');	
								
							} catch (Exception $e) {
								javaalert('Error al editar el usuario');
								iraURL('../pages/index.php');
								}
									}
						else{
							javaalert("El formato del correo es incorrecto, por favor verifique");
						
						}
			 }	
		}else{
				javaalert('El usuario no existe , por favor verifique');
				} 				
		}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
		
	  } 	

include("../views/editarUsuario.php");



?>
 



