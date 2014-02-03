<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
session_start();

 include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
if(!isset($_SESSION["Usuario"])){
	
	iraURL("../pages/index.php");
	}

$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 

  $Permisologia= $client->listarPermisologia();
  if(isset($Permisologia->return)){

	  $reglp=count($Permisologia->return);
	}
if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!=""  && isset($_POST["clasificacion"]) && $_POST["clasificacion"]!="" && isset($_POST["usuario"]) && $_POST["usuario"]!="" && isset($_POST["contrasena"]) && $_POST["contrasena"]!="" && isset($_POST["contrasena_c"]) && $_POST["contrasena_c"]!=""){		
		 try {
	
				$usu= array('user' => $_POST["usuario"]);
				$rowNombreUsuario = $client->consultarUsuarioXUser($usu);
	    	}catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../views/index.php');
					}
					
			if($rowNombreUsuario->return->idusu=="No"){				
			 if(isset($_POST["habilitado"])){
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
						  'nombreusu' => $_POST["nombre"],
						  'apellidousu' => $_POST["apellido"],
						  'correousu' => $correo,
						  'userusu'=>$_POST['usuario'],
						  'passwordusu' => $_POST['contrasena'],			 
						  'statususu' => $habilitado,
						  'idper' => $per);
						  $registroU=array('registroUsuario'=>$Usuario);
							
							try {
							
							$client->insertarUsuario($registroU);
							if(isset($_POST["crear_uno"])){
								iraURL('../pages/adminUsuario.php');		
								}else{
								iraURL('../pages/crearUsuario.php');	
							}	
							} catch (Exception $e) {
								javaalert('Error al crear el usuario');
								iraURL('../pages/index.php');
								}
									}
						else{
							javaalert("El formato del correo es incorrecto, por favor verifique");
						
						}
			 }	
		}else{
				javaalert('El usuario ya existe , por favor verifique');
				} 				
		}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
		
	  } 	
   include("../views/crearUsuario.php");
  
	 
?>
